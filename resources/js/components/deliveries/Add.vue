<template>
    <a @click="isModalAddOpened = true" class="buttons buttons-theme-cta-2 buttons-md mt-3">
        Ajouter une adresse de livraison
    </a>
    <CustomModal v-if="isModalAddOpened" @close="isModalAddOpened = false" :modalsize="'modal-sm'">
        <template v-slot:header>
            <div class="header-modal">
                <h4 class="title title-h4 mb-4 mt-4 text-center">Nouvelle adresse de livraison</h4>
            </div>
        </template>
        <template v-slot:content>
            <div class="row justify-content-center wow fadeInUp">
                <div class="col-md-12">

                    <Form @submit="handleSubmit">
                        <div class="mb_25 position-relative">
                            <input type="text" :placeholder="$t('components.pages.delivery_addresses.form.address')"
                                @input="searchPlaces(search)" v-model="search" />
                            <div v-if="addressesGooglePlace?.predictions" class="google-addresses">
                                <div v-for="place in addressesGooglePlace.predictions">
                                    <span @click="SelectedPlace(place)" class="search-items cursor-pointer">
                                        {{ place.description }}
                                    </span>
                                </div>
                            </div>

                            <span v-if="errorAddresse" class="text-start help error-danger"> error </span>
                        </div>
                        <div class="mb_25">
                            <Field name="firstName"
                                :placeholder="$t('components.pages.delivery_addresses.form.firstname')"
                                :label="$t('components.pages.delivery_addresses.form.firstname')"
                                rules="required|min:2" />
                            <ErrorMessage class="text-start help error-danger" name="firstName" />
                        </div>
                        <div class="mb_25">
                            <Field name="lastName"
                                :placeholder="$t('components.pages.delivery_addresses.form.lastname')"
                                :label="$t('components.pages.delivery_addresses.form.lastname')"
                                rules="required|min:3" />
                            <ErrorMessage class="text-start help error-danger" name="lastName" />
                        </div>
                        <div class="mb_25">
                            <Field @input="validatePhoneNumber" name="phone"
                                :placeholder="$t('components.pages.delivery_addresses.form.phone')"
                                :label="$t('components.pages.delivery_addresses.form.phone')"
                                rules="required|min:9|max:12|numeric" />
                            <ErrorMessage class="text-start help error-danger" name="phone" />
                        </div>
                        <button class="buttons buttons-theme buttons-md w-100" type="submit">{{
                            $t('components.pages.delivery_addresses.form.buttonadd') }}</button>
                    </Form>

                </div>
            </div>
        </template>
    </CustomModal>
</template>
<script>
import { mapActions, mapState } from "vuex";
import { Form, Field, ErrorMessage } from 'vee-validate';


export default {
    components: {
        Form, Field, ErrorMessage,
    },
    data() {
        return {
            isModalAddOpened: false,
            errorAddresse: false,
            search: null,
        }
    },
    methods: {
        ...mapActions(['getAddresseFromGooglePlaces', 'getLatLongByPlaceID', 'addDeliveryAddress']),
        async handleSubmit(values, actions) {
            if (
                !this.geolocation.latitude ||
                !this.geolocation.longitude ||
                !this.geolocation.formatted_address
            ) {
                this.errorAddresse = true;
            } else {
                this.errorAddresse = false;
                await this.addDeliveryAddress({
                    address: this.geolocation.formatted_address,
                    latitude: this.geolocation.latitude,
                    longitude: this.geolocation.longitude,
                    firstName: values.firstName,
                    lastName: values.lastName,
                    phone: values.phone,
                    default: 0,
                });
                document.body.classList.remove('modal-open');
                this.isModalAddOpened = false;
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
        },
    },
    computed: {
        ...mapState(['addressesGooglePlace', 'geolocation'])
    }
};
</script>