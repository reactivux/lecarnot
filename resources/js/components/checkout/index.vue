 <template>
    <dialog-confirmation ref="deleteDialog" />

    <div v-if="loader" :class="{ checkout_loader: loader }">
        <div style="text-align: center;">
            <img width="75" height="75" fetchpriority="high" src="../../../../public/svg/loader_svg.svg"
                alt="Pizza mama">
            <p class="text-color  ">Votre commande est en cours de création, veuillez patienter...</p>
        </div>
    </div>

    <div v-if="alertStore?.titre" class="container  mt_50">
        <div class="row">
            <div class="col-md-12">
                <div :class="`mb_0 alert-store alert alert-${alertStore?.type}`">
                    <strong v-if="alertStore?.titre">{{ alertStore?.titre }} : </strong>
                    <p class="text-color  " v-if="alertStore?.content">{{ alertStore?.content }}</p>
                </div>
            </div>
        </div>
    </div>


    <section v-if="cartStore?.products" class=" df__pt df__pb  ">
        <div class="container">

            <div class="row">

                <div class="col-xl-7 col-lg-7  " data-wow-duration="1s"
                    style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp">
                    <div class="row">
                        <!-- start delivery mode -->
                        <div v-if="(distance > storeData?.data?.distance_km) && cartStore?.deliveryMode == 'liv'"
                            class="col-md-12 mb_20">
                            <div class="alert-store alert alert-danger"><strong>Vous êtes à une distance de {{
                                    distance }} km
                                </strong>
                                <p>La distance maximale est de {{ storeData?.data?.distance_km }} Km</p>
                            </div>
                        </div>
                        <distance-component
                            v-if="(distance <= storeData?.data?.distance_km) && cartStore?.deliveryMode == 'liv' && checkout.isEnabledToOrder"
                            :distance="distance" :distance_km="storeData?.data?.distance_km" />
                        <div class="col-xl-12 mb_40" v-if="cartStore?.deliveryMode != 'at_place'">
                            <div class="box_booking item-bg-color overflow-unset">
                                <div class="main">
                                    <div class="row   mb_20">
                                        <div class="col-md-12 ">
                                            <h5 class="title title-h5">Veuillez choisissez le mode de livraison</h5>
                                        </div>
                                    </div>
                                    <div class="row mb_20">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input @change="filterByDeliveryMode('cac')" class="form-check-input"
                                                    type="radio" id="cac" name="deliveryMode" value="cac"
                                                    v-model="cartStore.deliveryMode" />
                                                <label class="form-check-label" for="cac">
                                                    <span class="icon mt_2 text-color">{{
                                                        $t('components.pages.store.searchBar.deliverymode.cac')
                                                        }}
                                                        <i v-if="storeData?.data?.option?.preparation_time_cac">
                                                            ({{
                                                            storeData?.data?.option?.preparation_time_cac ?? null }})
                                                        </i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input @change="filterByDeliveryMode('liv')" class="form-check-input"
                                                    type="radio" id="liv" name="deliveryMode" value="liv"
                                                    v-model="cartStore.deliveryMode" />
                                                <label class="form-check-label" for="liv">
                                                    <span class="icon mt_2 text-color">{{
                                                        $t('components.pages.store.searchBar.deliverymode.liv')
                                                        }}  
                                                        <i v-if="storeData?.data?.option?.preparation_time_liv">
                                                            ({{
                                                                storeData?.data?.option?.preparation_time_liv ?? null }})
                                                        </i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end delivery mode  -->
                        </div>
                        <div v-if="cartStore?.deliveryMode == 'liv'" class="col-xl-12 mb_40">

                            <div class="box_booking item-bg-color ">
                                <div class="tf__check_form">
                                    <div class="row   mb_20">
                                        <div class="col-md-12">
                                            <h5 class=" title title-h5">
                                                Adresse de livraison
                                            </h5>
                                        </div>
                                        <div class="col-md-12 text-end mt-2">
                                            <AddAddressComponent />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="tf__menu_search">
                                                <div class="select_area">
                                                    <div @click="openListDelivery" class="nice-select select_js"
                                                        :class="{ open: isListDeliveryOpen }" tabindex="0">
                                                        <span v-if="checkout.liv?.address" class="current ">
                                                            {{ checkout.liv?.address }}
                                                        </span>
                                                        <span v-else class="current "> Choisir une adresse de livraison
                                                        </span>
                                                        <ul class="list">

                                                            <li class="option "
                                                                v-for="(liv, index) in deliveryAddresses"
                                                                @click="selectDelivery(liv, index)">
                                                                {{ liv.address }},
                                                                {{ liv.distance }} Km
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div v-if="checkout.liv?.address" class="row mt_30">
                                        <div class="col-md-12 equal">
                                            <div class="card-content deliveries_addresses ">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <span class="icon text-color"><i class="fas fa-home"
                                                                aria-hidden="true"></i>
                                                            {{ checkout.liv.firstName }}
                                                            {{ checkout.liv.lastName }}</span>
                                                        <span class="address text-color">
                                                            {{ checkout.liv.address }}, {{ checkout.liv.distance }} Km
                                                        </span>

                                                        <span v-if="checkout.liv.phone" class="text-color">
                                                            <small>
                                                                <span class="fs1" aria-hidden="true"
                                                                    data-icon=""></span>
                                                            </small>
                                                            <small>{{ checkout.liv.phone }}</small>
                                                        </span>
                                                        <span class="address text-color">
                                                            Frais de livraison : € {{
                                                            cartStore?.deliveryTotal?.toFixed(2) }}
                                                        </span>
                                                        <span v-if="cartStore?.totalFinal < selectedZone?.minAmount"
                                                            class="address text-color">
                                                            <small v-if="selectedZone">
                                                                🚚 Livraison minimum dans la zone : {{
                                                                selectedZone.minAmount }} €
                                                            </small>
                                                            <small v-else>
                                                                ⚠️ Cette adresse n’est pas dans les zones de livraison
                                                            </small>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="buttons buttons-crud">
                                                    <EditAddressComponent :index="indexOfSelectedDelivery"
                                                        :address="checkout.liv" :key="indexOfSelectedDelivery" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="cartStore?.deliveryMode == 'cac'" class="col-xl-12 mb_40">
                            <!-- start cac addresses -->
                            <div class="box_booking item-bg-color ">
                                <div class="tf__check_form">

                                    <div class="row   mb_20">
                                        <div class="col-md-12">
                                            <h5 class="title title-h5">Adresse click and collect</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="tf__menu_search">
                                                <div class="select_area">
                                                    <div @click="openListCAC" class="nice-select select_js"
                                                        :class="{ open: isListCACOpen }" tabindex="0">
                                                        <span v-if="cacSelected?.address" class="current ">
                                                            {{ cacSelected?.address }}
                                                        </span>
                                                        <span v-else class="current "> Select your address
                                                        </span>
                                                        <ul class="list">
                                                            <li class="option "
                                                                v-for="(cac, index) in storeData?.cacAddresses"
                                                                @click="selectCAC(cac)">
                                                                {{ cac.address }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End cac addresses -->
                        </div>
                        <div class="col-xl-12 mb_40">
                            <!-- start pnalified -->
                            <div v-if="checkout" class="box_booking item-bg-color overflow-unset">
                                <div class="main">
                                    <div class="row   mb_20">
                                        <div class="col-md-12">
                                            <h5 class="title title-h5"> Veuillez planifier votre commande</h5>
                                        </div>
                                    </div>
                                    <div v-if="!checkout.planified.isRequired" class="row mb_20">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="now" name="planified"
                                                    :value="false" v-model="checkout.planified.isPlanified" />
                                                <label class="form-check-label" for="now">
                                                    <span class="icon mt_2 text-color">Maintenant</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="planified"
                                                    name="planified" :value="true"
                                                    v-model="checkout.planified.isPlanified" />
                                                <label class="form-check-label" for="planified">
                                                    <span class="icon mt_2 text-color">Planifié</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="checkout.planified.isPlanified" class="row">
                                        <div class="col-md-12">
                                            <div class="dropdown day">
                                                <a @click="ShowDate" :class="{ show: show_date }">
                                                    <span class="text-color">Jour <span id="selected_day">{{
                                                            planifiedDay }}
                                                        </span></span></a>
                                                <div class="dropdown-menu" :class="{ show: show_date }">
                                                    <div class="dropdown-menu-content">
                                                        <div class="mt_10 mb_10">
                                                            <strong class="text-color">Quel jour:</strong>
                                                        </div>
                                                        <div class="radio_select chose_day">
                                                            <ul>
                                                                <li v-for="(date, indexDay) in listDays" :key="day">
                                                                    <div>
                                                                        <input type="radio"
                                                                            :class="{ 'disabled-date': date?.status == false }"
                                                                            @click="selectDay(date, indexDay)"
                                                                            :id="`day_${indexDay}`" name="day"
                                                                            class="displaynon" v-model="planified_date"
                                                                            :value="date?.date" />
                                                                        <label
                                                                            :class="{ 'disabled-date': date?.status == false }"
                                                                            :for="`day_${indexDay}`">
                                                                            <p class=" "
                                                                                v-if="date?.date != currentDate">
                                                                                {{ date?.dayName }}
                                                                            </p>
                                                                            <p v-if="date?.date == currentDate"
                                                                                class=" ">
                                                                                {{ $t("opening.dayOfWeek.today") }}
                                                                            </p>
                                                                            <em>{{ date?.date }}</em>
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown time">
                                                <a @click="ShowHour" :class="{ show: show_time }">
                                                    <span class="text-color">Heure <span id="selected_time"> {{
                                                            planifiedTime }}
                                                        </span></span></a>
                                                <div class="dropdown-menu overflow" :class="{ show: show_time }">
                                                    <div class="dropdown-menu-content">
                                                        <div class="radio_select add_bottom_15">
                                                            <ul v-if="times?.length">
                                                                <li v-for="(hour, indexT) in times">
                                                                    <input type="radio" @click="selectTime(hour)"
                                                                        :id="`time_${indexT}`" name="hour"
                                                                        class="displaynon" :value="hour" />
                                                                    <label class=" " :for="`time_${indexT}`">{{
                                                                        hour }}<em></em>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                            <ul v-else>
                                                                <li class="text-color">Selection la date</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end pnalified  -->
                        </div>
                        <div class="col-xl-12 mb_40">
                            <div class="box_booking item-bg-color overflow-unset">
                                <div class="main">
                                    <div class="row  mb_20">
                                        <div class="col-md-12">
                                            <h5 class="title title-h5">
                                                <small><em>(optionnel)</em></small>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <textarea class="form-controls"
                                                placeholder="Communiquez au restaurant ce dont ils doivent tenir compte"
                                                rows="4" maxlength="100" v-model="checkout.comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12  "> 

                            <div class="box_booking item-bg-color">
                                <div class="main">
                                    <div class="row">
                                        <div class="col-12">
                                            <div v-if="cartStore?.deliveryMode == 'at_place'" class="row mt_10 mb_10">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            id="isPayementAtCheckout" name="payement" :value="true"
                                                            v-model="checkout.isPayementAtCheckout" />
                                                        <label class="form-check-label text-color"
                                                            for="isPayementAtCheckout">
                                                            <span class="icon mt_2">Paiement sur place</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input @click="checkStripe" class="form-check-input"
                                                            type="radio" id="isPaymentCard" name="payement"
                                                            :value="false" v-model="checkout.isPayementAtCheckout" />
                                                        <label class="form-check-label text-color" for="isPaymentCard">
                                                            <span class="icon mt_2">Paiement par carte</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="checkout.isPayementAtCheckout &&
                                            cartStore?.deliveryMode == 'at_place'
                                        " class="col-xl-12 mb_40"> 
                                            <div class="row">
                                                <div class="col-md-12 mt_35">
                                                    <button class="buttons buttons-theme buttons-md w-100"
                                                        @click="prepareOrder">Valider</button>
                                                </div>
                                            </div> 
                                        </div> 
                                        <div v-if="!checkout.isPayementAtCheckout" class="col-xl-12 mb_40">

                                            <div class="row" v-if="cartStore?.products?.length">
                                                <div class="col-md-12 mb_20">
                                                    <h5 class="title title-h5">Informations de paiement</h5>
                                                </div>
                                                <div class="col-md-12">
                                                    <form @submit.prevent="purchase">
                                                        <div id="card-element"></div>
                                                        <div v-if="cardError" class="error">{{ cardError }}</div>
                                                        <button class="buttons buttons-theme buttons-md w-100 mt_20"
                                                            type="submit" Purchase :disabled="isSubmitting">
                                                            <small class="fs1" aria-hidden="true" data-icon="~"></small>
                                                            Payer
                                                            <small>
                                                                {{
                                                                (
                                                                cartStore?.subTotal -
                                                                cartStore?.discountTotal +
                                                                cartStore?.deliveryTotal
                                                                ).toFixed(2)
                                                                }}
                                                            </small>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>  

                        <!-- <div class="col-xl-12 mb_40 ">
 
                            <div class="row">
                                <div class="col-md-12  ">
                                    <button class="buttons buttons-theme buttons-md w-100"
                                        @click="prepareOrder">Valider</button>
                                </div>
                            </div>
                         </div> -->
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5    ">
                    <!-- Amount -->
                    <div id="sticky_sidebar" class="cart-list top-20 sticky-top cart">

                        <div class="cart-content checkout item-bg-color">
                            <h6 class="cart-title title title-h6">Récapitulatif de la commande</h6>
                            <p class="text-color  ">
                                Paiement :
                                <span class="text-end" v-if="checkout?.isPayementAtCheckout">
                                    à la caisse</span>
                                <span class="text-end" v-else>Par carte bancaire</span>
                            </p>
                            <p class="text-color  " v-if="checkout?.planified?.isPlanified &&
                                checkout?.planified?.planifiedAt
                            ">
                                Planifiée :
                                <span class="text-end">
                                    {{ checkout?.planified?.planifiedAt }}
                                </span>
                            </p>
                            <p class="text-color  ">
                                Mode de livraison :
                                <span class="text-end"
                                    v-if="cartStore?.deliveryMode == 'liv' && checkout?.liv?.id">Livraison</span>
                                <span class="text-end"
                                    v-if="cartStore?.deliveryMode == 'cac' && checkout?.cac?.id">click
                                    and
                                    collect</span>
                                <span class="text-end" v-if="cartStore?.deliveryMode == 'at_place'">Sur place</span>
                            </p>
                            <p class="text-color  " v-if="checkout?.table?.id">
                                Numéro de la table :
                                <span class="text-end"> {{ checkout?.table?.table_number }}</span>
                            </p>
                            <p class="text-color  " v-if="cartStore?.deliveryMode == 'cac' && checkout?.cac?.id">
                                Adresse :
                                <span class="text-end"> {{ checkout?.cac?.address }} </span>
                            </p>
                            <p class="text-color  " v-if="cartStore?.deliveryMode == 'cac'  ">
                                Temps de préparation :
                                <span class="text-end"> {{ storeData?.data?.option?.preparation_time_cac?? null }}
                                </span>
                            </p>
                            <p class="text-color  " v-if="cartStore?.deliveryMode == 'liv'">
                                Temps de préparation :
                                <span class="text-end"> {{ storeData?.data?.option?.preparation_time_liv ?? null }}
                                </span>
                            </p>



                            <hr />
                            <!-- <p class="text-color  ">
                                Sous-Total: <span class="text-end">€ {{ cartStore?.subTotal.toFixed(2) }} </span>
                            </p>
                            <p class="text-color  " v-if="cartStore?.deliveryMode == 'liv'">
                                Frais de livraison:
                                <span class="text-end">€ {{ cartStore?.deliveryTotal.toFixed(2) }} </span>
                            </p> -->
                            <p class="text-color  " v-if="cartStore.discountPromotions > 0">
                                Promo actuelle :
                                <span class="text-end">€ -{{ cartStore.discountPromotions.toFixed(2) }} </span>
                            </p>
                            <p class="text-color  " v-if="cartStore.discountFidelite > 0">
                                Réduction carte fidélité
                                {{ storeData?.data?.config_loyalty[0]?.percentage }} % :
                                <span class="text-end">€ -{{ cartStore.discountFidelite.toFixed(2) }} </span>
                            </p>
                            <p class="text-color  " v-if="cartStore?.discountCouponcode > 0">
                                Code promo : {{ storeData?.couponCode?.code_number }},
                                {{ storeData?.couponCode?.percentage }} %
                                <span class="text-end">
                                    € -{{ (cartStore?.discountCouponcode).toFixed(2) }}
                                </span>
                            </p>
                            <p class="total text-color" v-if="cartStore?.discountTotal > 0">
                                <span class=" ">Total réductions :</span>
                                <span class="text-end">€ - {{ (cartStore?.discountTotal).toFixed(2) }}</span>
                            </p>
                            <p class="total text-color">
                                <span><b>Total:</b></span>
                                <span class="text-end">€
                                    {{ (cartStore?.totalFinal).toFixed(2) }}
                                </span>
                            </p>
                            <hr />
                            <!-- Coupon code -->
                            <!-- <div>
                                <p class="text-color  "><b>Vous avez un code promo ?</b></p>
                                <form class="form-coupon-code" @submit.prevent="applyCouponCode">
                                    <input type="text-color  " placeholder="Code promo" v-model="coupon_code" />
                                    <button class="buttons buttons-theme-raduis" type="submit">Appliquer</button>
                                </form>
                            </div> -->
                            <!-- end Coupon code -->
                        </div>
                    </div>
                    <!-- End amount -->
                </div>
            </div>
        </div>
    </section>
    <CustomModal v-if="isModalTableOpen" @close="closeModalTable" :modalsize="'modal-sm'">
        <template v-slot:content>
            <div class="row justify-content-center  ">
                <div class="col-md-12">
                    <h4 class="title title-h4 mb_4 text-center">Sélectionner une table</h4>
                    <div class="list-tables">
                        <div class="item-table" v-for="(table, indexT) in storeData?.tables"
                            @click="selectTable(table)">
                            <svgTable style="margin: 0 auto" />
                            <p class="text-color  ">Table : {{ table.table_number }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </CustomModal>
    <dialog-confirmation ref="dialogConfirmation" />
    <dialog-confirmation ref="productAddedDialog" />
</template>
<script>

import { mapActions, mapState, mapMutations, Store, mapGetters } from "vuex";

import AddAddressComponent from "../deliveries/Add.vue";
import EditAddressComponent from "../deliveries/Edit.vue";

import dayjs from 'dayjs'

export default {
    components: {
        AddAddressComponent,
        EditAddressComponent,
    },
    data() {
        return {
            isCustomerCanOrder: {},
            /**Delivery address */
            isListDeliveryOpen: false,
            indexOfSelectedDelivery: -1,
            /**Cac addresse */
            isListCACOpen: false,
            cacSelected: {},
            /**planified */
            show_date: false,
            show_time: false,
            times: [],
            planifiedDay: null,
            planifiedTime: null,
            listDays: [],
            deliveryType: null,
            currentDate: dayjs().format('YYYY-MM-DD'),
            /**coupon_code */
            coupon_code: null,
            /**end coupon code */
            /**Payement */
            stripe: null,
            cardToken: "",
            elements: null,
            card: undefined,
            cardError: false,
            /**end payement */
            loader: false,
            /** table */
            isModalTableOpen: false,
            isSubmitting: false,
            distance: 0
        };
    },
    async mounted() {

        this.getLocalPanier();
        this.isCustomerCanOrder = this.$CheckoutUtils.checkIsAllGoodToOrder("order");
        if (this.cartStore?.products.length <= 0) {

            let sweetOption = {
                text: "Votre panier est actuellement vide. Ajoutez des produits avant de passer à la commande",
                title: "⚠️ Aucun produit dans le panier",
                icon: 'icon',
                alertButtons: [
                    { text: "Voir nos produits", action: 'confirm', color: "confirmColor" }
                ],
            }
            const selectedAction = await this.$refs.deleteDialog.open(sweetOption);
            if (selectedAction == "confirm") {
                window.location.href = "/produits"
            }

        }
        else if (!this.isCustomerCanOrder?.status) {
             
            let sweetOption = {
                text: this.isCustomerCanOrder?.option?.toastMessage,
                title: this.isCustomerCanOrder?.option?.toastText,
                icon: 'icon',
                alertButtons: [
                    { text: "D'accord", action: 'confirm', color: "confirmColor" }
                ],
            }
            const selectedAction = await this.$refs.deleteDialog.open(sweetOption);
            if (selectedAction == "confirm") {
                console.log("hello ayoub dialog")
            }

        } else {
            this.checkout.planified.isRequired = this.$CheckoutUtils.isRequiredToPlanified();
            this.checkout.planified.isPlanified = this.checkout.planified.isRequired;
            this.checkout.type = this.cartStore?.deliveryMode;
            this.checkout.table = this.cartStore?.table;
            /**Loyalty card */
            await this.getLoyaltyCard();
            this.$DiscountUtils.ReCalculateAllDiscounts();

            /**Delivery addresses */
            if (this.cartStore?.deliveryMode == 'liv') {
                await this.getDeliveriesAddresses()
                /***Check default address if delivery mode is LIV */
                let defaultAdd = this.$DeliveryAddresses.defaultAddress(this.deliveryAddresses);
                if (defaultAdd) {
                    this.checkout.liv = defaultAdd.defaultAddress;
                    this.indexOfSelectedDelivery = defaultAdd.defaultAddressIndex;
                }

            }
            /**end Delivery addresses */
            /**cac addresses */
            if (this.cartStore?.deliveryMode == 'cac') {
                await this.getCacAddresses()
                if (this.storeData?.cacAddresses.length > 0) {
                    this.cacSelected = this.storeData?.cacAddresses[0];
                    this.checkout.cac = this.cacSelected;
                }
            }
            /*end cac addresses  */
            /**at place */

            // if (this.cartStore?.deliveryMode == 'at_place' && !this.cartStore?.table?.id) {
            //     this.isModalTableOpen = true
            //     document.body.classList.add('modal-open');
            //     await this.getTables()
            // }
            /**end at palce*/

            /**Planified */
            /**Get list days */
            this.deliveryType = this.cartStore?.deliveryMode
            //let workingTimes = this.storeData?.data?.new_work_times[this.deliveryType];
            this.listDays = this.storeData?.data?.opening_hours[this.deliveryType]?.dayToPlanified; // PlanifiedUtils.getDaysArrayByMonth(workingTimes)
            /**end planified */
            this.checkStripe();
            /** end stripe element */
            this.getAlertStore()
        }




    },

    methods: {



        ...mapActions(['getLocalPanier', 'getLoyaltyCard', 'getDeliveriesAddresses', 'getCacAddresses', 'checkCouponCode', 'stripeStatus', 'createOrder', 'getTables', 'checkTableIsExist', 'getAlertStore']),
        /**Delivery address */
        openListDelivery() {
            this.isListDeliveryOpen = !this.isListDeliveryOpen;
        },
        async selectDelivery(value, index) {

            this.distance = await this.$DeliveryAddresses.calculateDistance(value.latitude, value.longitude)

            if (this.distance <= this.storeData?.data?.distance_km) {
                this.checkout.liv = {};
                this.indexOfSelectedDelivery = index;
                this.checkout.liv = value;
            } else {
                let sweetOption = {
                    title: "Nous ne pouvons pas assurer la livraison à une distance de plus " + this.storeData?.data?.distance_km + " km",
                    text: "",
                    icon: 'icon',
                    alertButtons: [
                        { text: this.$t("button.ok"), action: 'confirm', color: "confirmColor" }
                    ],
                }
                const selectedAction = await this.$refs.deleteDialog.open(sweetOption);
                if (selectedAction == "confirm") {
                    this.checkout.liv = {};
                    this.indexOfSelectedDelivery = null;
                    this.checkout.liv = null;
                    this.cartStore.deliveryTotal = this.storeData?.data?.feeses[0]?.price;
                }
            }

        },
        /**end delivery address */
        /** cac addresses */
        openListCAC() {
            this.isListCACOpen = !this.isListCACOpen;
        },
        /**
         * Functions
         */
        selectCAC(value) {
            this.cacSelected = value;
            this.checkout.cac = value;
        },
        /**end cac addresses */

        /**planified */
        ShowDate() {
            this.show_date = !this.show_date;
            this.show_time = false;
        },
        ShowHour() {
            this.show_time = !this.show_time;
            this.show_date = false;
        },

        selectDay(date, indexD) {
            if (date?.status == true) {
                this.planifiedDay = date?.date;
                this.times = this.listDays[indexD]?.times
                this.show_date = false;
                this.ShowHour();
                if (this.planifiedTime) this.selectTime(this.planifiedTime);
            }
        },
        selectTime(time) {
            this.show_date = false;
            this.show_time = false;
            this.planifiedTime = time;
            this.checkout.planified.planifiedAt = dayjs(
                new Date(this.planifiedDay + " " + this.planifiedTime)
            ).format("YYYY-MM-DD HH:mm");
            this.checkout.planified.isPlanified = true;
        },
        /**Coupond code */
        async applyCouponCode() {
            //let data = { coupon_code: this.coupon_code, subTotal: this.cartStore.subTotal }
            let data = { coupon_code: this.coupon_code, subTotal: this.cartStore.totalFinal }
            await this.checkCouponCode(data);
            this.$DiscountUtils.ReCalculateAllDiscounts();
        },
        /**end coupon code */
        /**Payement */
        /** Stripe element */
        async checkStripe() {
            try {
                await this.stripeStatus();
                if (this.storeData?.stripe_status?.stripe_status == 1) {
                    if (this.storeData.stripe_status.stripe_pk) {
                        this.stripe = Stripe(this.storeData.stripe_status.stripe_pk);
                        this.elements = this.stripe.elements();
                        this.card = this.elements.getElement("card");
                        if (this.card == "null" || this.card == null || this.card == undefined) {
                            this.card = this.elements.create(
                                "card",
                                { hidePostalCode: true },
                                { iconStyle: "solid" }
                            );
                            this.card.mount("#card-element");
                        } else {
                            this.card.mount("#card-element");
                        }
                    } else {
                    }
                } else {
                }
            } catch (error) {
            }
        },
        async confirmCardPayment(clientSecret) {
            let sweetOption = {
                icon: "error",
                title: "Échec de la commande",
                text: "Impossible d'envoyer la commande. Veuillez réessayer plus tard.",
                alertButtons: [
                    { text: "Ok", action: 'cancel', color: "cancleColor" },
                ]
            }
            let self = this
            await this.stripe?.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: this.card,
                },
            }).then(async (res) => {
                if (res?.paymentIntent?.status == 'succeeded' || res?.paymentIntent?.status === 'succeeded') {
                    if (self.cartStore?.products?.length > 0) {
                        let order = self.$CheckoutUtils.preparCheckout(self.cartStore);
                        order.is_3d_secure = true
                        order._3d_secure_pi = res?.paymentIntent?.id // result._3d_secure_pi
                        await self.createOrder(order);
                        self.loader = false;
                    } else {
                        self.loader = false;
                    }
                }
                else {
                    const selectedAction = await self.$refs.dialogConfirmation.open(sweetOption);
                    this.isSubmitting = false // Re-enable Enter key submiting if error or exception founded
                    self.loader = false;
                }
            }).catch(async (err) => {
                const selectedAction = await self.$refs.dialogConfirmation.open(sweetOption);
                this.isSubmitting = false // Re-enable Enter key submiting if error or exception founded
                self.loader = false;

            })
        },
        async purchase() {
            this.isCustomerCanOrder = this.$CheckoutUtils.checkIsAllGoodToOrder("order");
            if (this.cartStore?.products.length <= 0) {

                let sweetOption = {
                    text: "Votre panier est actuellement vide. Ajoutez des produits avant de passer à la commande",
                    title: "⚠️ Aucun produit dans le panier",
                    icon: 'icon',
                    alertButtons: [
                        { text: "Voir nos produits", action: 'confirm', color: "confirmColor" }
                    ],
                }
                const selectedAction = await this.$refs.deleteDialog.open(sweetOption);
                if (selectedAction == "confirm") {
                    window.location.href = "/produits"
                }

            }
            else if (!this.isCustomerCanOrder?.status) {
                let sweetOption = {
                    title: this.isCustomerCanOrder?.option?.toastMessage,
                    text: this.isCustomerCanOrder?.option?.toastText,
                    icon: 'icon',
                    alertButtons: [
                        { text: "D'accord", action: 'confirm', color: "confirmColor" }
                    ],
                }
                const selectedAction = await this.$refs.deleteDialog.open(sweetOption);
                if (selectedAction == "confirm") {
                    return false
                }
                return false
            }

            if (this.isSubmitting) return; // Prevent duplicate submissions
            this.isSubmitting = true; // Disable form submission
            let self = this
            const is_paid = await self.stripe?.createToken(self.card).then(function (result) {
                if (result.error) {
                    self.cardError = result.error.message;
                    return false;
                } else if (typeof result.token != "undefined") {
                    self.cardError = false;
                    let stripe_status = self.storeData?.stripe_status?.stripe_status;
                    self.cardToken = result.token;
                    if (stripe_status && self.cardToken) {
                        self.checkout.cardToken = self.cardToken?.id;
                        self.checkout.isPaymentCard = self.cardToken?.id ? true : false;
                        self.checkout.isPayementAtCheckout = false;
                        self.prepareOrder(); // ayb back
                    }
                    return true;
                }
            }).catch((error) => {
                self.isSubmitting = false; // Re-enable Enter key
            }).finally(() => {
                self.isSubmitting = false; // Re-enable Enter key
            })
            return is_paid;

        },
        async prepareOrder() {

            this.loader = true;
            this.isCustomerCanOrder = this.$CheckoutUtils.verifyFields();
            if (!this.isCustomerCanOrder?.status) {


                let sweetOption = {
                    text: this.isCustomerCanOrder?.option?.toastMessage,
                    title: this.isCustomerCanOrder?.option?.toastText,

                    icon: 'icon',
                    alertButtons: [
                        { text: "D'accord", action: 'confirm', color: "confirmColor" }
                    ],
                }
                const selectedAction = await this.$refs.deleteDialog.open(sweetOption);
                if (selectedAction == "confirm") {
                    this.loader = false;
                }

            }
            if (this.cartStore?.deliveryMode == "at_place") {
                await this.checkTableIsExist({ tableID: this.cartStore?.table?.id })

                if (!this.cartStore?.table?.id) {
                    let sweetOption = {
                        title: "Table n'existe pas ou déja reserver",
                        text: "Scanner d'autre table",
                        icon: 'icon',
                        alertButtons: [
                            { text: "Ok", action: 'cancel', color: "cancleColor" },
                        ],
                    }
                    const selectedAction = await this.$refs.dialogConfirmation.open(sweetOption);
                    this.loader = false;
                    this.isSubmitting = false // Re-enable Enter key submiting if error or exception founded
                    return false
                }
            }
            if (this.cartStore?.products?.length > 0 && this.isCustomerCanOrder?.status) {
                let order = this.$CheckoutUtils.preparCheckout(this.cartStore);
                try {
                    const result = await this.createOrder(order);
                    if (result?.payment_intent_client_secret) {
                        if (result.payment_intent_client_secret) {
                            this.confirmCardPayment(result.payment_intent_client_secret)
                        }
                    } else if (result?.data?.type == "CardException") {
                        this.cardError = "Paiement échoué, veuillez vérifier vos informations bancaires"
                        this.isSubmitting = false // Re-enable Enter key submiting if error or exception founded
                    }
                } catch (e) {
                    console.log(e)
                    this.isSubmitting = false // Re-enable Enter key submiting if error or exception founded
                }
                this.loader = false;
            } else {
                this.loader = false;
            }
        },
        /**end payement */
        /*** change mode liv */
        async filterByDeliveryMode(mode) {
            let switchToDeliveryMode = true
            /** First check if cart has products not avaliable on the mode selected */
            let productsToDelete = this.$ProductUtils.CheckingAvailabilityProducts(
                this.cartStore?.products,
                mode
            );
            /**If array productsToDelete has products delete them first before switch to delivery mode selected */
            if (productsToDelete?.length > 0) {
                let sweetOption = {
                    title: this.$t("alerts.productsToDelete.title"),
                    text: this.$t("alerts.productsToDelete.text"),
                    icon: 'icon',
                    alertButtons: [
                        { text: this.$t("button.yes"), action: 'confirm', color: "confirmColor" },
                        { text: this.$t("button.no"), action: 'cancel', color: "cancleColor" },
                    ],
                }
                const selectedAction = await this.$refs.dialogConfirmation.open(sweetOption);
                if (selectedAction == "confirm") {
                    this.cartStore.products = this.cartStore?.products.filter(product => !productsToDelete.includes(product));
                    // re-calculate total
                    this.cartStore.subTotal = this.cartStore?.products.reduce(
                        (sum, product) => sum + product.total,
                        0
                    );
                    switchToDeliveryMode = true
                    let option = {
                        showToast: true,
                        type: 'success',
                        toastMessage: this.$t("notification.product.remove"),
                        duration: 3200
                    }
                    this.$store.commit('showCustomNotification', option);
                } else {
                    switchToDeliveryMode = false
                    let fees = this.storeData?.data?.feeses[0]?.price || 0;
                    this.cartStore.deliveryMode = mode == "liv" ? 'cac' : 'liv';
                    let deliveryTotal = this.cartStore.deliveryMode == "liv" ? fees : 0;
                    this.cartStore.deliveryTotal = deliveryTotal;
                }
            }
            /* if switchToDeliveryMode = false, we don't neeed to swtich the delivery mode */
            if (switchToDeliveryMode) {
                let fees = this.storeData?.data?.feeses[0]?.price || 0;
                let deliveryTotal = mode == "liv" ? fees : 0;
                this.cartStore.deliveryMode = mode;
                this.cartStore.deliveryTotal = deliveryTotal;
                this.cartStore.table = {};
                /** Check if customer can make an order**/
                let title = ''
                let status = this.$StoreUtils.isCustomerCanPlaceOrder()
                if (status == 'closed') {
                    title = this.$t("alerts.beforeOrder.closed")
                } else if (status == 'not-available') {
                    title = this.$t(`alerts.beforeOrder.deliveryMode.${this.cartStore.deliveryMode}.isOrder`);
                }
                this.$store.state.storeData['isOpenToOrder'] = { status: status, message: title };
                /**Check if products has promo */
                this.$DiscountUtils.isProductOnPromotion()
                /**Re-calculate total for all discounts */
                this.$DiscountUtils.ReCalculateAllDiscounts();
                /** After changing delivery mode, change it on localstorage with fees  */
                localStorage?.setItem("cart", JSON.stringify(this.cartStore));
                window.location.reload()
            }
        },
        /**end mode liv */
        /** Select table when mode is at_palce */
        selectTable(table) {
            if (table?.id) {
                this.cartStore.table = { id: table?.id, table_number: table?.table_number };
                localStorage?.setItem("cart", JSON.stringify(this.cartStore));
                document.body.classList.remove('modal-open');
                this.isModalTableOpen = false
                window.location.reload()
            }
        },
        closeModalTable() {
            this.$emit("toggleSelectTable", false);
            this.isModalTableOpen = false
        },
        /**end tables */
    },
    async created() {
    },
    watch: {
        'geolocation.latitude'(newVal, oldVal) {
            this.distance = this.$DeliveryAddresses.calculateDistance(this.geolocation.latitude, this.geolocation.longitude)


        }
    },
    computed: {
        ...mapGetters(['getCartStore']),
        ...mapState(['cartStore', 'storeData', 'checkout', 'deliveryAddresses', 'alertStore', 'geolocation']),

    }
};
</script>