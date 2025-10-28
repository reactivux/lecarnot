<template>
    <div class="item" v-if="!address.default">
        <a class="cursor-pointer d-flex justify-content-center align-items-center icon icon-crud icon-default"
            @click="confirmAlertBeforeSave()">
        </a>
    </div>
    <dialog-confirmation ref="defaultDialog" />
</template>
<script>
import { mapActions } from 'vuex';

export default {
    components: {
    },
    props: ["index", "address"],

    methods: {
        ...mapActions(['defaultDeliveryAddress']),
        async confirmAlertBeforeSave() {
            let sweetOption = {
                title: this.$t("alerts.default_address.title"),
                text: this.$t("alerts.default_address.text"),
                icon: 'icon',
                alertButtons: [
                    { text: this.$t("button.yes"), action: 'confirm', color: "confirmColor" },
                    { text: this.$t("button.no"), action: 'cancel', color: "cancleColor" },
                ],
            }
            const selectedAction = await this.$refs.defaultDialog.open(sweetOption);
            if (selectedAction == "confirm") {
                this.defaultDeliveryAddress(this.address.id)
            }
        },
    },
    beforeMount() { },
    mounted() { },
    computed: {
    },
};
</script>