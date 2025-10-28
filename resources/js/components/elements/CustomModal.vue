<template>
    <div class="modal fade show" id="myModal" role="dialog" @click="closeModal">
        <!-- modal dialog -->
        <div class="modal-dialog modal-dialog-centered" @click.stop :class="modalsize"
            style="visibility:visible;animation-duration:0.3s;animation-name:fadeInUp;">
            <div class="modal-content">
                <div class="closeModal  " @click="closeModal">
                    <span class="icon   icon-close"></span>
                </div>
                <slot name="header"></slot>
                <div class="modal-body">
                    <slot name="content"></slot>
                </div>
                <slot name="footer"></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['modalsize'],
    mounted() {
        document.body.classList.add('modal-open');
    },
    methods: {
        closeModal() {
            this.$emit('close');
            document.body.classList.remove('modal-open');
        }
    }
};
</script>