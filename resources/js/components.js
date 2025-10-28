import { createApp } from 'vue';
const app = createApp({});
import VueLazyload from 'vue-lazyload'


/**Home components */
import HomepeningTimesComponent from './components/home/openingTimes.vue';
import HomecategoryProductsComponent from './components/home/categoryProducts.vue';

/**Store Components */
import CartComponent from './components/store/cart';
import CustomModalAddToCart from "./components/store/CustomModalAddToCart.vue"
import PromosComponent from "./components/store/inputs/Promos.vue"
import loyaltyCardComponent from "./components/store/loyaltyCard.vue"
import ModalTablesComponent from "./components/store/tables.vue"
import singleProductComponent from "./components/store/singleProduct.vue"
import openingTimesComponent from './components/store/openingTimes';
import modalOpeningTimesComponent from './components/store/modalOpeningTimes';
import productsComponent from './components/store/products';
import cartsComponent from './components/cart/index';
/**customer components */
import deliveriesAddresses from './components/deliveries/index';
import commandesComponent from './components/commandes/index';
import detailsCommandeComponent from './components/commandes/detailsCommande';
import checkoutComponent from './components/checkout/index';

/**Elements components */
import ToastComponent from './components/elements/CustomNotification.vue';
import DistanceComponent from './components/elements/Distance.vue';
import CustomDialogConfirmationComponent from './components/elements/CustomDialogConfirmation.vue';
import CustomModalComponent from './components/elements/CustomModal.vue';
import NotFoundComponent from './components/elements/NotFound.vue';
import LazyImage from './components/elements/LazyImage.vue';

import LayoutsDesktopHeaderLinksRight from './components/header/desktop/LinksRight.vue';
import HeaderDesktopCart from './components/header/desktop/Cart.vue'
import HeaderDesktopProfile from './components/header/desktop/Profile.vue'
import ModalEditUserInfo from './components/header/desktop/ModalEditUserInfo.vue'

import LayoutsMobileHeaderLinksLeft from './components/header/mobile/LinksLeft.vue';
import LayoutsMobileHeaderLinksRight from './components/header/mobile/LinksRight.vue';


/** End Components */

/**Vue app use component on blade */
app.component('home-opening-times', HomepeningTimesComponent);
app.component('home-category-products', HomecategoryProductsComponent);


app.component('lazy-image', LazyImage);

app.component('cart-component', CartComponent);
app.component('custom-modal-add-to-cart', CustomModalAddToCart);
app.component('promos-component', PromosComponent);
app.component('loyaltycard-component', loyaltyCardComponent)
app.component('modal-tables-component', ModalTablesComponent)
app.component('singleproduct-component', singleProductComponent)
app.component('modal-openingtimes', modalOpeningTimesComponent)
app.component('opening-times', openingTimesComponent)
app.component('products-component', productsComponent)
app.component('page-cart-component', cartsComponent)

app.component('deliveries-addresses', deliveriesAddresses);
app.component('commandes-component', commandesComponent);
app.component('details-commande', detailsCommandeComponent);
app.component('checkout-component', checkoutComponent);
app.component('modal-edit-user-info', ModalEditUserInfo)

app.component('toast-component', ToastComponent);
app.component('dialog-confirmation', CustomDialogConfirmationComponent)
app.component('distance-component', DistanceComponent)
app.component('notfound-component', NotFoundComponent)
app.component('CustomModal', CustomModalComponent)

/**header components */
app.component('layouts-desktop-header-links-right', LayoutsDesktopHeaderLinksRight)
app.component('header-desktop-cart', HeaderDesktopCart)
app.component('header-desktop-profile', HeaderDesktopProfile)

app.component('layouts-mobile-header-links-left', LayoutsMobileHeaderLinksLeft)
app.component('layouts-mobile-header-links-right', LayoutsMobileHeaderLinksRight)



app.use(VueLazyload);

export default app;