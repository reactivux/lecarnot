<template>
    <div v-if="storeData?.data?.option" class="openingStore hide-on-mobile d-flex justify-content-center mt_10">
        <div v-if="!storeData?.data?.option.is_open" class="loc_closed closed text-transform-none d-flex">
            {{ $t("components.pages.store.header.modeNotAvaliable.closed") }}
        </div>
        <div v-if="isTypeAtPlace != 'at_place'" class="d-flex">
            <div v-if="storeData?.data?.option.is_open && !storeData?.data?.option.is__order_delivery_open && storeData?.data?.opening_hours?.liv?.nextOpening?.status != 'open'"
                class="loc_closed closed text-transform-none mr_5">
                <span v-if="!storeData?.data?.option.is_delivery_time || !storeData?.data?.option.order_delivery">
                    {{ $t("components.pages.store.header.modeNotAvaliable.liv") }}
                </span>
                <span v-else>
                    {{ $t("components.pages.store.header.modeAvaliable.liv") }}
                    {{ LibelNextOpeningMode(storeData?.data?.opening_hours?.liv?.nextOpening) }}
                </span>
            </div>
            <div v-if="storeData?.data?.option.is_open && !storeData?.data?.option.is__order_cac_open && storeData?.data?.opening_hours?.cac?.nextOpening?.status != 'open'"
                class="loc_closed closed text-transform-none mr_5">
                <span v-if="!storeData?.data?.option.is_cac_time || !storeData?.data?.option.order_cac">
                    {{
                    $t("components.pages.store.header.modeNotAvaliable.cac") }}
                </span>
                <span v-else>
                    {{ $t("components.pages.store.header.modeAvaliable.cac") }}
                    {{ LibelNextOpeningMode(storeData?.data?.opening_hours?.cac?.nextOpening) }}
                </span>
            </div>
        </div>
        <div v-else>
            <div v-if="storeData?.data?.option.is_open && !storeData?.data?.option.is_at_place_time && storeData?.data?.opening_hours?.at_place?.nextOpening?.status != 'open'"
                class="loc_closed closed text-transform-none mr_5">
                <span v-if="storeData?.data?.option.is_at_place_time"> aujourd'hui </span>
                <span v-if="!storeData?.data?.option.is_at_place_time || !storeData?.data?.option.order_at_place">
                    {{ $t("components.pages.store.header.modeNotAvaliable.at_place") }}
                </span>
                <span v-else>
                    {{ $t("components.pages.store.header.modeAvaliable.at_place") }} {{
                    LibelNextOpeningMode(storeData?.data?.opening_hours?.at_place?.nextOpening) }}
                </span>
            </div>
        </div>
    </div>
</template>


<script>
import { mapState, mapActions } from "vuex";
export default {
    components: {
    },
    data() {
        return {
            nextOpening: {},
            isTypeAtPlace: null
        }
    },
    mounted() {
    },
    created() {
    },
    methods: {
        LibelNextOpeningMode(opening) {
            if (opening?.day) {
                let day = this.$t(`opening.dayOfWeek.${opening.dayOfWeek}`);
                let indique = opening.status == "next-hours" ? "" : "ce";
                let title = this.$t(`opening.title`, { day: day, time: opening.openTime, indique: indique });
                return title
            }
            return null
        },
    },
    computed: {
        ...mapState(['storeData'])
    },
};
</script>