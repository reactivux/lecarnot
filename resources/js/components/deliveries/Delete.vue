<template>
    <div class="item">
        <a class="cursor-pointer d-flex justify-content-center align-items-center icon icon-crud icon-delete"
            @click="confirmAlertBeforeSave">
        </a>
    </div>
    <dialog-confirmation ref="deleteDialog" />
</template>
<script lang="ts">
import { mapActions } from 'vuex';

export default {
    components: {
    },
    props: ["index", "address"],
    setup() {
    },
    data() {
        return {
        };
    },
    methods: {
        ...mapActions(['deleteDeliveryAddress']),
        async confirmAlertBeforeSave() {
            let sweetOption = {
                title: this.$t("alerts.delete.title", { champ: "Adresse" }),
                text: "",
                icon: 'icon',
                alertButtons: [
                    { text: this.$t("button.yes"), action: 'confirm', color: "confirmColor" },
                    { text: this.$t("button.no"), action: 'cancel', color: "cancleColor" },
                ],
            }
            const selectedAction = await this.$refs.deleteDialog.open(sweetOption);
            if (selectedAction == "confirm") {
                this.deleteDeliveryAddress(this?.address.id, this.index);
            }
        },
    },
};
</script>
