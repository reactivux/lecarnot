import { Order } from "../interfaces/checkout/Order";
import { ElementsOrder } from "../interfaces/checkout/ElementsOrder";
import { SubElementsOrder } from "../interfaces/checkout/SubElementsOrder";
import store from '../store/index' 

  
export default class CheckoutUtils {

  static preparCheckout(cart :any) {
    store.state.checkout.type = cart.deliveryMode;
    store.state.checkout.table = cart.table;
    let checkout = store.state?.checkout; 
    const preparedOrder: Order = {
       
      order_by: "website",
      type: cart.deliveryMode,
      is_paid: checkout?.isPaymentCard,
      comment: checkout?.comment,
      delivery_address_id: checkout?.liv?.id || null,
      cac_address_id: checkout?.cac?.id || null,
      uuid: process.env.MIX_UUID || '',
      card_token: checkout?.cardToken || null,
      at_place: cart.deliveryMode == "at_place" ? true : false,
      payment_at_checkout: checkout?.isPayementAtCheckout,
      code_number: store.state.storeData?.couponCode?.code_number || null,
      table_id: checkout?.table?.id || null,
      fees: cart.deliveryTotal,
      planified: checkout?.planified.isPlanified,
      planified_at: checkout?.planified.planifiedAt,
      loyalty_percentage: store.state.storeData?.data?.config_loyalty[0]?.percentage || 0,
      loyalty_nb_orders: store.state.storeData?.data?.config_loyalty[0]?.nb_orders || 0,
      elementsOrder: cart.products.map((product :any, indexProduct: number) => {
        var subElementsOrder = [];
        var UnitePriceProduct = product.price;
        product.groups.map((group:any, indexGroup: number) => {
          if (group.used) {
            if (group.button_type == "CheckboxButton") {
              group.sub_products.map((subProduct:any, indexSubProduct: number) => {
                // if (group?.max == null && !subProduct.checked) {
                //   let UnitePriceSubProduct = subProduct.quantity > 0 ? (subProduct.price / subProduct.quantity) : subProduct.price
                //   const preparesubElementsOrder: SubElementsOrder = {
                //     type: group.type,
                //     price: UnitePriceSubProduct,
                //     quantity: subProduct.quantity,
                //     sub_product_id: subProduct.id,
                //   };
                //   subElementsOrder.push(preparesubElementsOrder);
                // } else if (group?.max != null && subProduct.checked) {
                //   let UnitePriceSubProduct = subProduct.quantity > 0 ? (subProduct.price / subProduct.quantity) : subProduct.price
                //   const preparesubElementsOrder: SubElementsOrder = {
                //     type: group.type,
                //     price: UnitePriceSubProduct,
                //     quantity: subProduct.quantity,
                //     sub_product_id: subProduct.id,
                //   };
                //   subElementsOrder.push(preparesubElementsOrder);
                // }
                if (subProduct.checked) {
                  let UnitePriceSubProduct = subProduct.quantity > 0 ? (subProduct.price / subProduct.quantity) : subProduct.price
                  const preparesubElementsOrder: SubElementsOrder = {
                    type: group.type,
                    price: UnitePriceSubProduct,
                    quantity: subProduct.quantity,
                    sub_product_id: subProduct.id,
                    promo: subProduct?.promo ?? null
                  };
                  subElementsOrder.push(preparesubElementsOrder);
                }

              });
            } else if (
              group.button_type == "RadioButton" ||
              group.button_type == "PlusMinusButton"
            ) {
              group.sub_products.map((subProduct :any, indexSubProduct: number) => {
                if (subProduct.checked || subProduct.quantity) {
                  UnitePriceProduct = group.type == "size" ? subProduct.price : UnitePriceProduct;
                  let UnitePriceSubProduct = subProduct.quantity > 0 ? (subProduct.price / subProduct.quantity) : subProduct.price
                  const preparesubElementsOrder: SubElementsOrder = {
                    type: group.type,
                    price: UnitePriceSubProduct,
                    quantity: subProduct.quantity,
                    sub_product_id: subProduct.id,
                    promo: product?.promos?.find((item: any) => item["product_id"] === product.id && item["sub_product_id"] === subProduct.id),
                  };
                  subElementsOrder.push(preparesubElementsOrder);
                }
              });
            }
          }
        });
        const elementsOrder: ElementsOrder = {
          UnitPriceSize: UnitePriceProduct,
          price: product.price,
          quantity: product.quantity,
          comment: null,
          product_id: product.id,
          subElementsOrder: subElementsOrder,
          promo: product?.promos?.find((item: any) => item["product_id"] === product.id && item["sub_product_id"] == null)
        };
        return elementsOrder;
      }),
    };
    return preparedOrder;
  }

  static checkIsAllGoodToOrder(status) {
        let option = {
            showToast: true,
            type: "error",
            toastText: "",
            toastMessage: "",
            duration: 5500,
        };
        let title = "";
        if (
            !store.state.storeData?.data?.option?.is_open ||
            !store.state.storeData?.data?.option?.is_store_open
        ) {
            option = {
                showToast: true,
                type: "error",
                toastText: "",
                toastMessage: "Restaurant fermé", // nuxtApp.$i18n.t(`alerts.beforeOrder.closed`),
                duration: 4500,
            };
            store.commit("showCustomNotification", option);
            store.state.storeData.isOpenToOrder = false;

            //return false;
            return {
                status: false,
                option: option,
            };
        }
        if (store.state.storeData?.data?.option) {
            if (
                (store.state.cartStore.deliveryMode == "liv" &&
                    !store.state.storeData?.data?.option?.is_delivery_time) ||
                (store.state.cartStore.deliveryMode == "liv" &&
                    !store.state.storeData?.data?.option?.order_delivery) ||
                (store.state.cartStore.deliveryMode == "cac" &&
                    !store.state.storeData?.data?.option?.is_cac_time) ||
                (store.state.cartStore.deliveryMode == "cac" &&
                    !store.state.storeData?.data?.option?.order_cac) ||
                (store.state.cartStore.deliveryMode == "at_place" &&
                    !store.state.storeData?.data?.option?.is_at_place_time) ||
                (store.state.cartStore.deliveryMode == "at_place" &&
                    !store.state.storeData?.data?.option?.order_at_place)
            ) {
                let isOrder: any = {
                    liv: "Livraison non disponible",
                    cac: "Click and collect non disponible",
                    at_place: "Sur place non disponible",
                };

                title = isOrder[store.state.cartStore.deliveryMode];
                option = {
                    showToast: true,
                    type: "error",
                    toastText: "",
                    toastMessage: title,
                    duration: 3200,
                };
                store.commit("showCustomNotification", option);
                // return false;
                return {
                    status: false,
                    option: option,
                };
            }
        }
        if (store.state.storeData?.data?.feeses[0] && status == "order") {
            let fees = store.state.storeData?.data?.feeses[0];
            let TotalAmount =
                store.state.cartStore?.totalFinal -
                store.state.cartStore?.deliveryTotal; // store.state.cartStore?.subTotal + store.state.cartStore?.discountTotal;

            if (
                fees[`min_price_${store?.state?.cartStore?.deliveryMode}`] > TotalAmount
            ) {
                title = store.state.cartStore.deliveryMode;
                let minOrder: any = {
                    liv: `La livraison est disponible à partir d'un minimum de commande de ${
                        fees[`min_price_${store?.state?.cartStore?.deliveryMode}`] ?? 0
                    }€`,
                    cac: `Click and collect est disponible à partir d'un minimum de commande de ${
                        fees[`min_price_${store?.state?.cartStore?.deliveryMode}`] ?? 0
                    }€`,
                    at_place: `Sur place est disponible à partir d'un minimum de commande de ${
                        fees[`min_price_${store?.state?.cartStore?.deliveryMode}`] ?? 0
                    }€`,
                };
                title = minOrder[store.state.cartStore.deliveryMode] ;

                option = {
                    showToast: true,
                    type: "error",
                    toastText: "Commande minimum requise",
                    toastMessage: title,
                    duration: 5500,
                };
                store.commit("showCustomNotification", option);
                // return false;
                return {
                    status: false,
                    option: option,
                };
            }
        }
        //return true;
        return {
            status: true,
            option: option,
        };
    }

  static isRequiredToPlanified() {
    let next_opening_hours = store.state.storeData?.data?.opening_hours[store.state.cartStore.deliveryMode]?.nextOpening
    
     
    let nextOpening = next_opening_hours?.status != 'open' ? next_opening_hours : null;
    if (nextOpening?.openTime) {
      return true
    }
    return false;
  }

   static verifyFields() {
        let option = {
            showToast: true,
            type: "error",
            toastText: "",
            toastMessage: "",
            duration: 5500,
        };
        let error = "";
        if (store.state.checkout.type == "liv") {
            if (
                store.state.checkout.liv == null ||
                Object.keys(store.state.checkout.liv).length === 0
            ) {
                option = {
                    showToast: true,
                    type: "error",
                    toastText: "Choisir ou ajouter une adresse de livraison",
                    toastMessage:
                        "Veuillez ajouter une adresse de livraison pour pouvoir continuer votre commande.",
                    duration: 5500,
                };
                return {
                    status: false,
                    option: option,
                };
            }
        }
        if (store.state.checkout.type == "cac") {
            if (
                store.state.checkout.cac == null ||
                Object.keys(store.state.checkout.cac).length === 0
            ) {
                option = {
                    showToast: true,
                    type: "error",
                    toastText: "Choisir une adresse Click & Collect",
                    toastMessage:
                        "Veuillez sélectionner une adresse Click & Collect afin de finaliser votre commande.",
                    duration: 5500,
                };
                return {
                    status: false,
                    option: option,
                };
            }
        }
        if (
            (store.state.checkout.type != "at_place" &&
                store.state.checkout.planified.planifiedAt == null &&
                store.state.checkout.planified.isRequired) ||
            (store.state.checkout.type != "at_place" &&
                store.state.checkout.planified.planifiedAt == null &&
                store.state.checkout.planified.isPlanified)
        ) {
            option = {
                showToast: true,
                type: "error",
                toastText:
                    "Sélectionner le créneau de collecte qui vous convient",
                toastMessage:
                    "Veuillez planifier un créneau de collecte afin de finaliser votre commande.",
                duration: 5500,
            };
            return {
                status: false,
                option: option,
            };
        }
        if (
            store.state.checkout.planified.planifiedAt == null &&
            store.state.checkout.planified.isPlanified
        ) {
            option = {
                showToast: true,
                type: "error",
                toastText: "Sélectionner une date valide",
                toastMessage:
                    "Veuillez choisir une date valide pour votre créneau de collecte.",
                duration: 5500,
            };
            return {
                status: false,
                option: option,
            };
        }
        if (store.state.checkout.isPaymentCard) {
            if (store.state.checkout.cardToken == "") {
                option = {
                    showToast: true,
                    type: "error",
                    toastText: "cardToken required",
                    toastMessage:
                        "Veuillez renseigner les informations de votre carte pour procéder au paiement.",
                    duration: 5500,
                };
                return {
                    status: false,
                    option: option,
                };
            }
        }

        return {
            status: true,
            option: option,
        };
    }
}