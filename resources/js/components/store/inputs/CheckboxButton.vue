<template>
  <div @click="CheckboxButtonSubProduct()"  class="elementCheckbox checkboxColor text-color">
    <span :class="{
      'checked': subProduct.checked, 'checkboxDisabled cursor-no-drop ': (group.total_qte_sub_products == group.max) && subProduct.quantity == 0
    }" class="font-weight-300 first-letter-maj text-break">
      {{ subProduct?.ingredient?.name || subProduct?.supplement?.name || subProduct?.name }}
    </span>
  </div>
</template>
<script lang="ts">
export default {
  props: ["product", "group", "subProduct"],
  data() {
    return {};
  },
  created() { },
  methods: {
    CheckboxButtonSubProduct() {
      if ((this.group.total_qte_sub_products < this.group.max) || this.subProduct.quantity > 0 || this.group.max == null) {
        this.subProduct.checked = !this.subProduct.checked;
        this.product.total = this.$ProductUtils.totalProduct(this.product);
        this.product.ingredient_names = this.$ProductUtils.concatenateNamesIngredients(
          this.group
        );
        this.group.used = false;
        if (this.subProduct.checked) {
          this.subProduct.quantity = 1
          this.group.total_qte_sub_products += 1;
        } else {
          this.subProduct.quantity = 0
          this.group.total_qte_sub_products -= 1
        }
      }
    },
  },
  computed: {
    shouldCheckCheckbox() {
      return (
        (this.group.total_qte_sub_products < this.group.max ||
          this.subProduct.quantity > 0) && this.subProduct.checked
      );
    },
  },
};
</script>
