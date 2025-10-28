<template>
  <div class="tf__notfound_text wow fadeInUp text-center mt_30 mb_30">
    <h2 class="black-color"> {{ title }}</h2>
    <img width="75" height="75" fetchpriority="high" src="/img/notfound.webp" alt="Le Carnot" class="img-fluid w-100" />
    <p class="black-color">{{ description }}</p>
  </div>
</template>
<script>
export default {
  props: ["title", "description", "img"],
  setup() { },
};
</script>
