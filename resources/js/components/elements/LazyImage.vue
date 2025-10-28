<!-- LazyImage.vue -->
<template>
    <img ref="image" :src="placeholder" alt="" />
</template>

<script>
export default {
    props: {
        src: {
            type: String,
            required: true
        },
        placeholder: {
            type: String,
            default: 'placeholder.jpg' // provide a placeholder image
        }
    },
    data() {
        return {
            observer: null
        };
    },
    mounted() {
        this.observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.$refs.image.src = this.src;
                    this.observer.unobserve(this.$refs.image);
                }
            });
        });
        this.observer.observe(this.$refs.image);
    }
};
</script>