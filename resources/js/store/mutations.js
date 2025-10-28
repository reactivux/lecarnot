import DeliveryAddresses from "../utils/DeliveryAddresses";

export const SET_AUTH = (state, value) => {
    let token = value?.token?.accessToken || null
    //check route 
    const currentRoute = window.location.href;

    if (!value?.token?.accessToken && (currentRoute.includes("signin") || currentRoute.includes("signup"))) { // go to signin or signup
        return true
    }
    if (!value?.token?.accessToken && (currentRoute.includes("order-sent") || currentRoute.includes("edit-password") || currentRoute.includes("commandes") || currentRoute.includes("checkout") || currentRoute.includes("adresses-livraison"))) {
        window.location.href = "/signin";
    }
    if (
        value?.token?.accessToken &&
        (currentRoute.includes("signin") || currentRoute.includes("signup"))
    ) {
        //user already connected
        window.location.href = "/";
    }

    state.userStore.headers = {
        "content-type": "application/json",
        "Authorization": `Bearer ${token}`
    }
    state.userStore.data = value?.customer || state?.userStore?.data
    state.userStore.isLoggedIn = value?.token ? true : false
}
export const SET_CUSTOMER_INFO = (state, value) => {
    const auth = localStorage.getItem("auth");
    const authJson = JSON.parse(auth)
    authJson.customer = value
    localStorage.setItem("auth", JSON.stringify(authJson))
    window.location.href = '/'
}

export const CART_STRORE = (state, value) => {
    state.cartStore = value || state.cartStore
}

export const PRODUCT_STRORE = (state, value) => {
    state.productsStore.product = value
}

export const SET_DETAILS_STORE = (state, value) => {
    state.storeData.data = value
}

export const SET_CATAGORIES = (state, value) => {
    state.categoriesData = value
}
export const SET_CAC_ADDRESSE = (state, value) => {
    state.storeData.cacAddresses = value
}

export const SET_COUPON_CODE = (state, value) => {
    state.storeData.couponCode = value
}

export const SET_STRIPE_STATUS = (state, value) => {
    state.storeData.stripe_status = value
}

export const SET_LIST_TABLES = (state, value) => {
    state.storeData.tables = value
}

export const SET_TABLE = (state, value) => {
    state.cartStore.table = value
}

export const SET_ALERT_STORE = (state, value) => {
    state.alertStore = value
}

/*** All request for connected customer  */
/*** Set list of deliveries addresses on after mounted */
export const SET_LIST_DELIVERIES_ADDRESSES = (state, value) => {
    state.deliveryAddresses = value
}
/** Set one item of delivery address when post is added with successfull  */
export const SET_DELIVERY_ADDRESSE = (state, value) => {
    state.deliveryAddresses = value
}
export const ADD_DELIVERY_ADDRESSE = (state, value) => {
    const dist = DeliveryAddresses.calculateDistance(value.latitude, value.longitude)
    value.distance = dist
    state.deliveryAddresses.push(value)
}
export const EDIT_DELIVERY_ADDRESSE = (state, value) => {
    let FoundIndex = null
    const dist = DeliveryAddresses.calculateDistance(value.latitude, value.longitude)
    value.distance = dist
    state.deliveryAddresses.forEach((liv, index) => {
        if (liv.id == value.id)
            FoundIndex = index
    });
    if (FoundIndex != null)
        state.deliveryAddresses[FoundIndex] = value
}
export const DELETE_DELIVERY_ADDRESSE = (state, value) => {
    let FoundIndex = null
    state.deliveryAddresses.forEach((liv, index) => {
        if (liv.id == value.id)
            FoundIndex = index
    });
    if (FoundIndex != null)
        state.deliveryAddresses.splice(FoundIndex, 1);

}
export const DEFAULT_DELIVERY_ADDRESSE = (state, value) => {
    state.deliveryAddresses.forEach((liv) => {
        if (liv.id == value.id)
            liv.default = 1;
        else
            liv.default = 0;
    });
}
/*** ALL requestes google place */
export const ADDRESSES_GOOGLE_PLACE = (state, value) => {
    state.addressesGooglePlace = value?.data
}
export const SET_ADDRESSES_GOOGLE_PLACE_NULL = (state, value) => {
    state.addressesGooglePlace = []
}
export const GEO_LOCATION = (state, value) => {
    state.geolocation.latitude = value.geometry.location.lat;
    state.geolocation.longitude = value.geometry.location.lng;
    state.geolocation.formatted_address = value.formatted_address;
}
export const SET_GEO_LOCATION_NULL = (state, value) => {
    state.geolocation.latitude = null
    state.geolocation.longitude = null
    state.geolocation.formatted_address = null
}

/**All Requests for orders */
export const SET_LIST_ORDERS = (state, value) => {
    state.ordersData = []
    state.ordersData = value
}
export const SET_DETAILS_ORDER = (state, value) => {
    state.detailsOrder = value
}

export const SET_UNREAD_ORDERS = (state, value) => {
    state.counUnreadOrders = value == -1 ? state.counUnreadOrders - 1 : value
}

/** Loyalty card  */
export const SET_LOYALTY_CARD = (state, value) => {
    state.userStore.loyaltyCard = value
}

/*** Toast */
export const showCustomNotification = (state, value) => {
    //this.hideToast()
    state.toast.optionToast = value
    // Hide the toast after a specific duration
    state.toast.timeoutId = setTimeout(() => {
        state.toast.optionToast.showToast = false;
    }, state.toast.optionToast.duration);
}
export const hideToast = (state) => {
    if (state.toast.timeoutId) {
        clearTimeout(state.toast.timeoutId);
    }
    state.toast.optionToast = {
        showToast: false,
        type: null,
        toastMessage: '',
        duration: 3200
    }
}
// export const startProgressBar = (state) => {
//     state.toast.startTime = Date.now();
//     state.toast.progress = 0;
//     state.toast.interval = setInterval(updateProgressBar(), 50); // Update the progress bar every 50ms
// }

// function updateProgressBar() {
//     const currentTime = Date.now();
//     const elapsedTime = currentTime - state.toast.startTime;
//     state.toast.progress = Math.min(100, (elapsedTime / state.toast.optionToast.duration) * 100);
//     if (state.toast.progress >= 100) {
//         clearInterval(state.toast.interval);
//         clearTimeout(state.toast.timeoutId)
//         state.toast.optionToast.showToast = false
//     }
// }
