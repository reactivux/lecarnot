<template>
    <div class="item">
        <a class="cursor-pointer d-flex justify-content-center align-items-center icon icon-crud icon-edit  "
            @click="isModalAddOpened = true">
        </a>
    </div>
    <CustomModal v-if="isModalAddOpened" @close="isModalAddOpened = false" :modalsize="'modal-sm'">
        <template v-slot:header>
            <div class="header-modal">
                <h4 class="title title-h4 mb-4 mt-4 text-center">Modifier votre adresse</h4>
            </div>
        </template>
        <template v-slot:content>
            <div class="row justify-content-center wow fadeInUp">
                <div class="col-md-12">

                    <Form @submit="handleSubmit">
                        <div class="mb_25 position-relative">
                            <input type="text" :placeholder="$t('components.pages.delivery_addresses.form.address')"
                                @input="searchPlaces(search)" v-model="search" />
                            <div v-if="addressesGooglePlace" class="google-addresses">
                                <div v-for="place in addressesGooglePlace.predictions">
                                    <span @click="SelectedPlace(place)" class="search-items cursor-pointer">
                                        {{ place.description }}
                                    </span>
                                </div>
                            </div>
                            <span v-if="errorAddresse" class="text-start help error-danger"> Champ est obligatoire
                            </span>
                        </div>

                        <div class="mb_25">
                            <Field name="firstName"
                                :placeholder="$t('components.pages.delivery_addresses.form.firstName')"
                                :label="$t('components.pages.delivery_addresses.form.firstName')" rules="required|min:2"
                                :value="initialValues?.firstName" />
                            <ErrorMessage class="text-start help error-danger" name="firstName" />
                        </div>
                        <div class="mb_25">
                            <Field name="lastName"
                                :placeholder="$t('components.pages.delivery_addresses.form.lastName')"
                                :label="$t('components.pages.delivery_addresses.form.lastName')" rules="required|min:3"
                                :value="initialValues?.lastName" />
                            <ErrorMessage class="text-start help error-danger" name="lastName" />
                        </div>
                        <div class="mb_25">
                            <Field name="phone" :placeholder="$t('components.pages.delivery_addresses.form.phone')"
                                :label="$t('components.pages.delivery_addresses.form.phone')"
                                rules="required|min:9|max:12|numeric" :value="initialValues?.phone" />
                            <ErrorMessage class="text-start help error-danger" name="phone" />
                        </div>
                        <button class="buttons buttons-theme buttons-md w-100" type="submit"> {{
                            $t('components.pages.delivery_addresses.form.buttonedit') }}</button>
                    </Form>

                </div>
            </div>
        </template>
    </CustomModal>
    <dialog-confirmation ref="editDialog" />
</template>
<script>
import { mapActions, mapState } from "vuex";
import { Form, Field, ErrorMessage } from 'vee-validate';


export default {
    props: ["index", "address"],
    components: {
        Form, Field, ErrorMessage,
    },
    data() {
        return {
            isModalAddOpened: false,
            errorAddresse: false,
            search: null,
            initialValues: {
                address: this.address?.address,
                latitude: this.address?.latitude,
                longitude: this.address?.longitude,
                firstName: this.address?.firstName,
                lastName: this.address?.lastName,
                phone: this.address?.phone,
                default: this.address?.default,
                id: this.address?.id
            }
        }
    },
    mounted() {
        this.geolocation.formatted_address = this.address?.address;
        this.geolocation.latitude = this.address?.latitude;
        this.geolocation.longitude = this.address?.longitude;
        this.search = this.initialValues?.address
    },
    methods: {
        ...mapActions(['getAddresseFromGooglePlaces', 'getLatLongByPlaceID', 'editDeliveryAddress']),
        async handleSubmit(values, actions) {
            if ((this.geolocation?.formatted_address && this.geolocation?.latitude && this.geolocation?.longitude)) {
                let sweetOption = {
                    title: this.$t("alerts.edit.title"),
                    text: "",
                    icon: 'icon',
                    alertButtons: [
                        { text: this.$t("button.yes"), action: 'confirm', color: "confirmColor" },
                        { text: this.$t("button.no"), action: 'cancel', color: "cancleColor" },
                    ],
                }
                const selectedAction = await this.$refs.editDialog.open(sweetOption);
                if (selectedAction == "confirm") {
                    let result = await this.editDeliveryAddress(
                        {
                            address: this.geolocation?.formatted_address,
                            latitude: this.geolocation?.latitude,
                            longitude: this.geolocation?.longitude,
                            firstName: values.firstName,
                            lastName: values.lastName,
                            phone: values.phone,
                            default: this.initialValues.default,
                            id: this.initialValues.id,
                            index: this.index
                        },
                    );
                    document.body.classList.remove('modal-open');
                    this.isModalAddOpened = false;
                    //checkoutStore.checkout.liv = result;
                }
            } else {
                errorAddresse = true
            }
        },

        searchPlaces(search) {
            this.getAddresseFromGooglePlaces(search);
        },
        async SelectedPlace(place) {
            let place_id = place.place_id;
            this.errorAddresse = false;
            this.search = place.description;
            await this.getLatLongByPlaceID(place_id);
            this.$store.commit('SET_ADDRESSES_GOOGLE_PLACE_NULL');
        }
    },
    computed: {
        ...mapState(['addressesGooglePlace', 'geolocation', 'toast'])
    }


};
</script>
