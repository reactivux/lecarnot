import store from '../store/index'

export default class StoreUtils {
  static isCustomerCanPlaceOrder() {
    if (!store.state.storeData?.data?.option?.is_open || !store.state.storeData?.data?.option?.is_store_open) {
      return 'closed'
    }
    if (store.state.storeData?.data?.option) {
      if (
        (store.state.cartStore.deliveryMode == "liv" &&
          !store.state.storeData?.data?.option?.is_delivery_time) ||
        (store.state.cartStore.deliveryMode == "liv" &&
          !store.state.storeData?.data?.option?.order_delivery) ||
        (store.state.cartStore.deliveryMode == "cac" && !store.state.storeData?.data?.option?.is_cac_time) ||
        (store.state.cartStore.deliveryMode == "cac" && !store.state.storeData?.data?.option?.order_cac) ||
        (store.state.cartStore.deliveryMode == "at_place" &&
          !store.state.storeData?.data?.option?.is_at_place_time) ||
        (store.state.cartStore.deliveryMode == "at_place" &&
          !store.state.storeData?.data?.option?.order_at_place)
      ) {
        return 'not-available'
      }
    }
    return 'available';
  }
}
