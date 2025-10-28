import store from "../store/index";

import DiscountUtils from "./DiscountUtils";
import CheckoutUtils from "./CheckoutUtils";

export default class DeliveryAddresses {
    /** Select default address on page checkout or select one when default address not existe */
    static defaultAddress(deliveryAddresses: any) {
        let selectedAddress = null;
        let distance_km = store.state.storeData?.data?.distance_km ?? 0;
        // Step 1: Find any nearby address
        for (let i = 0; i < deliveryAddresses.length; i++) {
            const addr = deliveryAddresses[i];
            const dist = DeliveryAddresses.calculateDistance(
                addr.latitude,
                addr.longitude
            );
            deliveryAddresses[i].distance = dist;
            if (dist <= distance_km) {
                selectedAddress = {
                    defaultAddress: addr,
                    defaultAddressIndex: i,
                };
            }
        }
        if (selectedAddress == null) {
            const defaultIndexAddress = deliveryAddresses.findIndex(
                (addr: any) => addr.default === 1
            );
            // 2. Check if the default address is valid
            if (defaultIndexAddress !== -1) {
                const defaultAddr = deliveryAddresses[defaultIndexAddress];
                const dist = DeliveryAddresses.calculateDistance(
                    defaultAddr.latitude,
                    defaultAddr.longitude
                );
                if (dist <= distance_km) {
                    selectedAddress = {
                        defaultAddress: defaultAddr,
                        defaultAddressIndex: defaultIndexAddress,
                    };
                }
            }
        }

        return selectedAddress;
    }

    static calculateDistance(latCustomer: any, lngCustomer: any) {
        const R = 6371; // Radius of the Earth in kilometers

        const latStoreRad =
            (Math.PI * store.state.storeData?.data?.latitude) / 180;
        const latCustomerRad = (Math.PI * latCustomer) / 180;
        const latCustomerDiff =
            (Math.PI * (latCustomer - store.state.storeData?.data?.latitude)) /
            180;
        const lngCustomerDiff =
            (Math.PI * (lngCustomer - store.state.storeData?.data?.longitude)) /
            180;
        const a =
            Math.sin(latCustomerDiff / 2) * Math.sin(latCustomerDiff / 2) +
            Math.cos(latStoreRad) *
                Math.cos(latCustomerRad) *
                Math.sin(lngCustomerDiff / 2) *
                Math.sin(lngCustomerDiff / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        const distance = R * c;

        let deliveryMode = store.state.cartStore.deliveryMode;
        let deliveryFees = store.state.storeData?.data?.feeses[0]?.price || 15;

        let fees = store.state.storeData?.data?.feeses[0];
        let minOrderDelivery = fees[`min_price_${deliveryMode}`] ?? 13;
        //
        // console.log("distance");
        // console.log(distance);
        /*if (distance >= 0 && distance <= 5) {
            deliveryFees = 0;
            minOrderDelivery = 13; // min order 13
        } else if (distance > 5 && distance <= 10) {
            deliveryFees = 0;
            minOrderDelivery = 30; // min order 30
        } else if (distance > 10  ) {
            deliveryFees = 0;
            minOrderDelivery = 30; // min order 30
        }*/

        store.state.cartStore.deliveryTotal = deliveryFees;
        if (store?.state?.storeData?.data?.feeses?.[0]?.[`min_price_liv`])
            store.state.storeData.data.feeses[0][`min_price_liv`] =
                minOrderDelivery;

        /**Re-calculate total for all discounts */
        DiscountUtils.ReCalculateAllDiscounts();
        //  console.log(store.state.storeData.data.feeses[0]);

        let isCustomerCanOrder = CheckoutUtils.checkIsAllGoodToOrder("order");

        /** After changing delivery mode, change it on localstorage with fees  */
        localStorage?.setItem("cart", JSON.stringify(store.state.cartStore));
        return distance.toFixed(2); // Rounded to two decimal places
    }
}
