<template>
    <div v-if="show" class="modal fade show" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm "
            style="visibility:visible;animation-duration:0.3s;animation-name:fadeInUp;">
            <div class="modal-content text-center pb_25 pt_25">
                <div class="modal-body">
                    <div v-if="sweetOption?.icon == 'valide'" class="order_valide">
                        <div class="text-center  icon_valide">
                        </div>
                    </div>
                    <h3 class="title title-h3 custom-alert-title" v-if="sweetOption?.title">{{
                        sweetOption.title
                        }}</h3>
                    <p v-if="sweetOption?.text" class="custom-alert-text">{{ sweetOption.text }}</p>
                </div>
                <div class="custom-alert-buttons">
                    <button v-for="(button, index) in sweetOption.alertButtons" :key="index"
                        @click="onButtonClick(button.action)" class="custom-alert-button m-2" :class="button.color">
                        {{ button.text }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: false,
            resolve: null,
            reject: null,
            sweetOption: {},
        };
    },
    mounted() {
    },
    methods: {
        open(sweetOption) {
            this.sweetOption = sweetOption
            this.show = true;
            return new Promise((resolve, reject) => {
                this.resolve = resolve;
                this.reject = reject;
            });
        },
        close() {
            this.show = false;
        },
        onButtonClick(action) {
            // Resolve the Promise with the selected action
            this.resolve(action);
            this.close();
        },
    },
};
</script>
