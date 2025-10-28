<template>
    <div v-if="toast.optionToast.showToast" class="custom-toast">
        <div class="d-flex justify-center align-items-start">
            <div class="custom-toast-message"> {{ toast.optionToast.toastMessage }}</div>
            <div class="hideToast" @click="$store.commit('hideToast')">
                <span>
                    X
                </span>
            </div>
        </div>
        <div class="progress-bar" :class="toast.optionToast.type" :style="{ width: toast.progress + '%' }"></div>
    </div>
</template>
<script lang="ts">
import { mapState } from "vuex";
export default {
    data() {
        return {
        }
    },
    mounted() {
    },
    methods: {
    },
    computed: {
        ...mapState(['toast'])
    }
};
</script>
