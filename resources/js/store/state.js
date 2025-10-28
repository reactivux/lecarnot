export default {
  cartStore: {
    products: [],
    deliveryMode: "cac",
    table: {},
    subTotal: 0,
    deliveryTotal: 0,
    discountTotal: 0,
    discountCouponcode: 0,
    discountFidelite: 0,
    discountPromotions: 0,
    totalFinal: 0,
    currentProduct: {},
    uuid: process.env.MIX_UUID,
    coverStore: '',
  },
  productsStore: {
    product: {},
    currentProduct: {}
  },
  categoriesData: [],
  storeData: {
    data: {},
    isOpenToOrder: null,
    stripe_status: null,
    cacAddresses: [],
    couponCode: [],
    tables: []
  },
  userStore: {
    loyaltyCard: {},
    data: {},
    isLoggedIn: false,
    headers: {
      "content-type": "application/json",
      Authorization: 'Bearer '
    }
  },
  alertStore: {},
  /** FOR Customer */
  deliveryAddresses: [],
  addressesGooglePlace: [],
  geolocation: { latitude: null, longitude: null, formatted_address: null },
  ordersData: [],
  detailsOrder: [],
  countUnreadOrders: 0,
  /** Custom Toast alert */
  toast: {
    optionToast: {
      showToast: false,
      type: null,
      toastMessage: '',
      duration: 3200
    },
    progress: 0,
    interval: 0,
    startTime: 0,
    timeoutId: null,
  },
  /** End custom Toast alert */

  /**This for checkout page */
  checkout: {
    type: "cac",
    liv: {},
    cac: {},
    planified: {
      isRequired: false,
      isPlanified: false,
      planifiedAt: null,
    },
    comment: null,
    couponcode: {},
    tableId: null,
    table: {},
    isPayementAtCheckout: false,
    isPaymentCard: false,
    cardToken: "",
    loyaltyPercentage: 0,
    loyaltyNbOrders: 0,
    isEnabledToOrder : false
  },
  /**For menu mobile*/
  isSideRightOpening: false,
  isSideLeftOpening: false,
}