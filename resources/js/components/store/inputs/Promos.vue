<template>
  <!-- Promo shown on product categories -->
  <p v-if="promos?.length" :class="className">
    <label v-if="isSimpleProductPromo">
      <small v-if="isSimpleDiscount">
        - {{ promos[0].percentage }}%
      </small>
      <small v-else-if="isFreePromo">
        <i>{{ promos[0].min }} {{ productName }} achetée(s), la {{ promos[0].free + promos[0].min }} ème offert </i>
      </small>
      <small v-else-if="isHalfPricePromo">
        <i>
          {{ promos[0].min }} {{ productName }} achetée(s), {{ promos[0].free + promos[0].min }} à moitié prix -{{
            promos[0].percentage }}%
        </i>
      </small>
    </label>
    <label v-else>
      <!-- Promo on pizza sizes -->
      Promo sur la taille valable uniquement sur les mégas à emporter
    </label>
  </p>
  <!-- Promo shown on radio buttons (size selection) -->
  <label v-else-if="promoSize" class="mb-0 pb-0 d-block">
    <small v-if="isSizeSimpleDiscount">
      - {{ promoSize.percentage }}%
    </small>
    <small v-else-if="isSizeFreePromo">
      <i>{{ promoSize.min }} {{ productName }} achetée(s), la {{ promoSize.free + promoSize.min }} ème offert </i>
    </small>
    <small v-else-if="isMegaPizzaHalfPrice">
      <i>
        {{ promoSize.min }} {{ productName }} achetée(s), La 2 ème à moitié prix, Uniquement sur les mégas à emporter
      </i>
    </small>
    <small v-else-if="isSizeHalfPricePromo">
      <i>
        {{ promoSize.min }} {{ productName }} achetée(s), la {{ promoSize.free + promoSize.min }} ème à
        moitié prix -{{ promoSize.percentage }}%
      </i>
    </small>
  </label>
</template>
<script lang="ts">
export default {
  props: ["promos", "promoSize", "className", "productName"],
  computed: {
    // Product promo conditions
    isSimpleProductPromo(): boolean {
      const promo = this.promos?.[0];
      return promo && promo.sub_product_id == null && promo.size == null;
    },
    isSimpleDiscount(): boolean {
      const promo = this.promos?.[0];
      return promo?.min === 0 && promo?.free === 0;
    },
    isFreePromo(): boolean {
      const promo = this.promos?.[0];
      return promo?.min > 0 && promo?.free > 0 && promo?.percentage === 100;
    },
    isHalfPricePromo(): boolean {
      const promo = this.promos?.[0];
      return promo?.min > 0 && promo?.free > 0 && promo?.percentage > 0 && promo?.percentage < 100;
    },

    // Size promo conditions
    isSizeSimpleDiscount(): boolean {
      return this.promoSize?.min === 0 && this.promoSize?.free === 0;
    },
    isSizeFreePromo(): boolean {
      return this.promoSize?.min > 0 && this.promoSize?.free > 0 && this.promoSize?.percentage === 100;
    },
    isMegaPizzaHalfPrice(): boolean {
      return this.promoSize?.min === 1 && this.promoSize?.free === 1 && this.promoSize?.percentage > 0;
    },
    isSizeHalfPricePromo(): boolean {
      return this.promoSize?.min > 0 && this.promoSize?.free > 0 && this.promoSize?.percentage > 0;
    },
  }
};
</script>
