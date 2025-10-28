
import axios from 'axios'
import { i18nVue } from 'laravel-vue-i18n';

import { translate } from '../utils/i18nTranslate';

export const fetchToken = async (context) => {
  const auth = localStorage.getItem("auth") || {}
  if (Object.keys(auth).length > 0) {
    context.commit("SET_AUTH", JSON.parse(auth));
  } else {
    context.commit("SET_AUTH", {});
  }
}

export const logOut = async (context) => {
  const _GET = process.env.MIX_CUSTOMER_BASE_URL + "signout"
  try {
    const response = await axios.get(_GET,
      {
        headers: context.state.userStore.headers,
      }
    );
    if (response?.status == 200) {
      localStorage.removeItem("auth");
      window.location.href = "/";
    } else {
    }
  } catch (error) { }
}

/***All request store */
/** CAC ADDRESSES */
export const fetchtDetailsStore = async (context) => {
  const _GET = process.env.MIX_CUSTOMER_BASE_URL + "stores/" + process.env.MIX_UUID;
  try {
    const response = await axios.get(_GET, {
      method: "GET",
    });
    if (response?.status) {
      context.commit('SET_DETAILS_STORE', response?.data?.data)
    }
  } catch (error) { }
}

export const getCacAddresses = async (context) => {
  const _GET = process.env.MIX_CUSTOMER_BASE_URL + "cac_addresses/" + process.env.MIX_UUID;
  try {
    const response = await axios.get(_GET, {
      method: "GET",
    });
    if (response?.status) {
      context.commit('SET_CAC_ADDRESSE', response?.data?.data)
    }
  } catch (error) { }
}
export const checkCouponCode = async (context, payload) => {
  const _GET = process.env.MIX_CUSTOMER_BASE_URL + "promocode/code/" + payload.coupon_code + '/' + process.env.MIX_UUID + '/' + payload.subTotal;
  try {
    const response = await axios.get(_GET, {
      method: "GET",
    });
    if (response?.status) {
      context.commit('SET_COUPON_CODE', response?.data?.data)
      let option = {
        showToast: true,
        type: 'success',
        toastMessage: "Appliqué", ///nuxtApp.$i18n.t("notification.address.delete"),
        duration: 3200
      }
      context.commit('showCustomNotification', option)
    }
  } catch (error) {
    let option = {
      showToast: true,
      type: 'warning',
      toastMessage: await translate('notification.codepromo.incorrect'),
      duration: 3200
    }
    context.commit('showCustomNotification', option)
  }
}

export const stripeStatus = async (context, payload) => {
  const _GET = process.env.MIX_CUSTOMER_BASE_URL + "stripe_status/" + process.env.MIX_UUID
  try {
    const response = await axios.get(_GET, {
      method: "GET",
    });
    if (response?.status) {
      context.commit('SET_STRIPE_STATUS', response?.data)
    }
  } catch (error) { }
}


export const getTables = async (context, payload) => {
  const _GET = process.env.MIX_CUSTOMER_BASE_URL + "tables/" + process.env.MIX_UUID;
  try {
    // Perform the API request or fetch the data
    const response = await axios.get(_GET, {
      method: "GET",
    });
    context.commit('SET_LIST_TABLES', response?.data?.data)
  } catch (error) {
    return false
    //console.error("Failed to fetch store data:", error);
  }
}

export const checkTableIsExist = async (context, payload) => {
  const _GET = process.env.MIX_CUSTOMER_BASE_URL + "store-table/" + payload?.tableID + '/' + process.env.MIX_UUID;
  try {
    // Perform the API request or fetch the data
    const response = await axios.get(_GET, {
      method: "GET",
    });
    if (response?.status == 200 && response?.data?.data != null) {
      context.commit('SET_TABLE', response?.data?.data)
      //return true
    } else {
      context.commit('SET_TABLE', {})
      //return false
    }
  } catch (error) {
    //console.error("Failed to fetch store data:", error);
  }
}

export const getAlertStore = async (context) => {
  const _GET = process.env.MIX_CUSTOMER_BASE_URL + "alertstore/" + process.env.MIX_UUID;
  try {
    // Perform the API request or fetch the data
    const response = await axios.get(_GET, {
      method: "GET",
    });
    if (response?.status == 200 && response?.data) {
      context.commit('SET_ALERT_STORE', response?.data?.data)
    }
  } catch (error) {
    //console.error("Failed to fetch store data:", error);
  }
}

/**end request store */


export const getLocalPanier = async (context) => {
  const cart = localStorage.getItem("cart") || {}
  if (Object.keys(cart).length > 0)
    context.commit('CART_STRORE', JSON.parse(cart))
}

/*** Request for google place */
export const getAddresseFromGooglePlaces = async (context, query) => {
  let formData = { query: encodeURIComponent(query) };
  const _POST = process.env.MIX_CUSTOMER_BASE_URL + "google_places";
  try {
    if (formData.query != " in France") {
      const response = await axios.post(_POST, formData, {
        method: "POST",
        headers: context.state.userStore.headers,
      });
      context.commit('ADDRESSES_GOOGLE_PLACE', response.data) 
    }
  } catch (error) { }
  finally { }
}

export const getLatLongByPlaceID = async (context, place_id) => {
  try {
    let formData = { query: place_id };
    const _POST = process.env.MIX_CUSTOMER_BASE_URL + "get_lat_lng";
    const response = await axios.post(_POST, formData, {
      method: "POST",
      headers: context.state.userStore.headers
    })
    if (response.data) {
      context.commit('GEO_LOCATION', response?.data?.data?.result)
    }
  } catch (error) {
    return null;
  }
  finally { }
}
/*** End Request google place */
/*** Request for Deliveries addresses */
export const getDeliveriesAddresses = async (context) => {
  const _GET = process.env.MIX_CUSTOMER_BASE_URL + "delivery_addresses";
  try {
    const response = await axios.get(_GET, {
      method: "GET",
      headers: context.state.userStore.headers,
    });
    if (response?.data.data) {
      context.commit('SET_DELIVERY_ADDRESSE', response?.data?.data)
    }
  } catch (error) { }
}
export const addDeliveryAddress = async (context, delivery) => {
  const _POST = process.env.MIX_CUSTOMER_BASE_URL + "delivery_addresses";
  try {
    const response = await axios.post(_POST, delivery, {
      method: "POST",
      headers: context.state.userStore.headers,
    });
    if (response?.data.data) {
      context.commit('ADD_DELIVERY_ADDRESSE', response?.data?.data)
      let option = {
        showToast: true,
        type: 'success',
        toastMessage: "Adresse ajoutée avec succès", ///nuxtApp.$i18n.t("notification.address.delete"),
        duration: 3200
      }
      context.commit('showCustomNotification', option)
    }
  } catch (error) { }
}

export const editDeliveryAddress = async (context, delivery) => {
  const _PUT = process.env.MIX_CUSTOMER_BASE_URL + "delivery_addresses/" + delivery.id;
  try {
    const response = await axios.put(_PUT, delivery, {
      method: "POST",
      headers: context.state.userStore.headers,
    });
    if (response?.data.data) {
      if (delivery.index != null) {
        let option = {
          showToast: true,
          type: 'success',
          toastMessage: "Adresse modifiée avec succès", ///nuxtApp.$i18n.t("notification.address.delete"),
          duration: 3200
        }
        context.commit('showCustomNotification', option)
        context.commit('EDIT_DELIVERY_ADDRESSE', response?.data?.data)
        return response?.data?.data
      }
    } else {
      let option = {
        showToast: true,
        type: 'warning',
        toastMessage: "Probleme de connexion", ///nuxtApp.$i18n.t("notification.address.delete"),
        duration: 3200
      }
      context.commit('showCustomNotification', option)
    }
  } catch (error) { }
}

export const deleteDeliveryAddress = async (context, deliveryID, index) => {
  const _DELETE = process.env.MIX_CUSTOMER_BASE_URL + "delivery_addresses/" + deliveryID;
  await axios.delete(_DELETE, {
    method: "DELETE",
    headers: context.state.userStore.headers
  }).then(response => {
    if (response.status != 404) {
      context.commit('DELETE_DELIVERY_ADDRESSE', { id: deliveryID, index: index })
      // add message alert
      let option = {
        showToast: true,
        type: 'success',
        toastMessage: "Adresse supprimée avec succès", ///nuxtApp.$i18n.t("notification.address.delete"),
        duration: 3200
      }
      context.commit('showCustomNotification', option)
    } else {
      let option = {
        showToast: true,
        type: 'warning',
        toastMessage: "Problème de connexion", // this.$t("notification.connexion"),
        duration: 3200
      }
      context.commit('showCustomNotification', option)
    }
  })
}
export const defaultDeliveryAddress = async (context, deliveryID) => {
  const _GET = process.env.MIX_CUSTOMER_BASE_URL + "delivery_addresses/default/" + deliveryID;
  const response = await axios.get(_GET, { headers: context.state.userStore.headers });
  if (response?.data) {
    context.commit('DEFAULT_DELIVERY_ADDRESSE', { id: deliveryID })
    let option = {
      showToast: true,
      type: 'success',
      toastMessage: "Adresse modifiée avec succès", ///nuxtApp.$i18n.t("notification.address.delete"),
      duration: 3200
    }
    context.commit('showCustomNotification', option)
  } else {
    let option = {
      showToast: true,
      type: 'warning',
      toastMessage: "Probleme de connexion", ///nuxtApp.$i18n.t("notification.address.delete"),
      duration: 3200
    }
    context.commit('showCustomNotification', option)
  }
}
/*** End Request for Deliveries addresses */


export const createOrder = async (context, payload) => {
  const _POST = process.env.MIX_CUSTOMER_BASE_URL + "orders" 
  try {
    const response = await axios.post(_POST, payload, {
      method: "POST",
      headers: context.state.userStore.headers,
    });
    if (response.status == 201) {
      localStorage.removeItem("cart");
      window.location.href = `/order-sent/${response.data?.data?.id}`;
    }
    else if (response.status == 200) {
      if (response.data.data.success == false) {
        const message = await translate('alerts.reorder');
        let option = {
          showToast: true,
          type: 'warning',
          toastMessage: message,
          duration: 3200
        }
        context.commit('showCustomNotification', option)
      } else
        return response?.data?.data
    }


  } catch (error) {

    // Extract and return error as JSON
    if (error.response) {
      // Server responded with a status code outside the 2xx range
      console.error("Error response data:", error.response.data);
      return error.response.data;
    } else if (error.request) {
      // Request was made but no response received
      console.error("No response received:", error.request);
      return {
        message: "No response received from the server",
        data: null,
        status: false,
      };
    } else {
      // Other errors (e.g., request setup issue)
      console.error("Error setting up request:", error.message);
      return {
        message: error.message,
        data: null,
        status: false,
      };
    }
  } finally {
  }
}


export const getCountUnreadOrders = async (context) => {
  const _GET = process.env.MIX_CUSTOMER_BASE_URL + "count-unread-orders/" + process.env.MIX_UUID; 
  try {
    const response = await axios.get(_GET, {
      method: "GET",
      headers: context.state.userStore.headers,
    });
    if (response?.status == 200) {
      context.commit('SET_UNREAD_ORDERS', response?.data?.data)
    }
  } catch (error) { } finally { }
}

export const setOrderAsRead = async (context, payload) => {
  // payload = { order_id: order_id, isRead: 1 }
  const _POST = process.env.MIX_CUSTOMER_BASE_URL + "orders/isread"
  try {
    const response = await axios.post(_POST, payload, {
      method: "POST",
      headers: context.state.userStore.headers,
    });
    if (response?.status == 200) {
      // commit data
      context.commit('SET_UNREAD_ORDERS', -1)
    }
  } catch (error) { } finally { }
}

export const fetchOrders = async (context, current_page) => {
  const _GET = process.env.MIX_CUSTOMER_BASE_URL + "orders/" + process.env.MIX_UUID + "?"  + current_page;
  try {
    const response = await axios.get(_GET, { headers: context.state.userStore.headers });
    if (response?.status == 200)
      context.commit('SET_LIST_ORDERS', response?.data?.data)
  } catch (error) { }
  finally {

  }
}

export const fetchDetailsOrders = async (context, order_id) => {
  if (context.state.userStore.headers) {
    const _GET = process.env.MIX_CUSTOMER_BASE_URL + "orders/" + order_id;
    try {
      const response = await axios.get(_GET, { headers: context.state.userStore.headers });
      if (response?.status == 200) {
        context.commit('SET_DETAILS_ORDER', response?.data?.data)
      }
    } catch (error) {
    }
  }

}


export const UpdateInformationCustomer = async (context, payload) => {

  try {
    const _PUT = process.env.MIX_CUSTOMER_BASE_URL + "profile"
    const response = await axios.put(_PUT, payload, {
      method: "PUT",
      headers: context.state.userStore.headers
    });
    if (response?.status == 200) {
      let option = {
        showToast: true,
        type: 'success',
        toastMessage: "Votre profile modifié avec succès", //  this.$t("notification.user.edit"),
        duration: 3200
      }
      context.commit('showCustomNotification', option)
      context.commit('SET_CUSTOMER_INFO', response?.data?.data)
      return true;
    }
  } catch (e) {
    return false;
  }
}

/**** LoyaltyCard */
export const getLoyaltyCard = async (context) => {
  if (context.state.userStore.isLoggedIn) {
    const _GET = process.env.MIX_CUSTOMER_BASE_URL + "loyalty-card/" + process.env.MIX_UUID;
    try {
      //if (header) {
      // Perform the API request or fetch the data
      const response = await axios.get(_GET, { headers: context.state.userStore.headers });
      context.commit('SET_LOYALTY_CARD', response?.data?.data)

    } catch (error) {
    }
  }

}

