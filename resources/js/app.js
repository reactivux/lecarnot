/** Import files, plugins */
import './bootstrap';
import store from "./store/index";
/** Import componennts */
import app from "./components";

/*** Laravel/vue i18n */
import { i18nVue } from 'laravel-vue-i18n'
app.use(i18nVue, {
    lang: 'fr',
    resolve: lang => import(`../lang/fr.json`),
})
/*** End Laravel/vue i18n */

/** Get user token one time */
store.dispatch('fetchToken')

/*** Utils */
import StoreUtils from './utils/StoreUtils';
import ProductUtils from './utils/ProductUtils';
import CheckoutUtils from './utils/CheckoutUtils';
import DeliveryAddresses from './utils/DeliveryAddresses';
import DiscountUtils from "./utils/DiscountUtils";
import PlanifiedUtils from "./utils/PlanifiedUtils";
import OrderUtils from "./utils/OrderUtils";
import LoyaltyCardUtils from "./utils/LoyaltyCardUtils";
import global from './utils/global';

app.config.globalProperties.$StoreUtils = StoreUtils;
app.config.globalProperties.$ProductUtils = ProductUtils;
app.config.globalProperties.$CheckoutUtils = CheckoutUtils;
app.config.globalProperties.$DeliveryAddresses = DeliveryAddresses;
app.config.globalProperties.$DiscountUtils = DiscountUtils;
app.config.globalProperties.$PlanifiedUtils = PlanifiedUtils;
app.config.globalProperties.$OrderUtils = OrderUtils;
app.config.globalProperties.$LoyaltyCardUtils = LoyaltyCardUtils;
app.config.globalProperties.$global = global;
/***End Utils */

/** Config vee-validate */
import * as rules from "@vee-validate/rules";
import { defineRule, Form, Field, ErrorMessage, configure } from "vee-validate";
import { localize } from '@vee-validate/i18n';
import en from '@vee-validate/i18n/dist/locale/en.json';
import fr from '@vee-validate/i18n/dist/locale/fr.json';

Object.keys(rules)
    .filter((k) => k !== "default")
    .forEach((rule) => {
        defineRule(rule, rules[rule]);
    });
let messages = null
let lang = 'fr' /// nuxtApp.$i18n
if (lang == 'fr') {
    messages = fr['messages']
} else if (lang == 'en') {
    messages = en['messages']
}
configure({
    generateMessage: localize(lang,
        { messages: messages }
    ),
});
/*** End config vee-validate */


app.use(store)
app.mount('#app');
