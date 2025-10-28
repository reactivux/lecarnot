<template>
  <div class="divPlusMines text-color">
    <p>
      <span class=" font-weight-300 first-letter-maj text-break">{{ subProduct?.supplement?.name ||
        subProduct?.name }}
      </span>
      <span v-if="subProduct.unit_price > 0">
        <b class="font-weight-500  "> €{{ subProduct?.unit_price?.toFixed(2) }} </b>
      </span>
    </p>
    <div class="btnPlusMines text-color">
      <span class="btnQte  " :class="{
        'btnDisabled cursor-no-drop ':
          subProduct.quantity == 0 || group.total_qte_sub_products == 0,
      }" @click="decreaseSubProductQuantity()">
        -
      </span>
      <span class="QteProduct  ">

        {{ subProduct.quantity }}

      </span>
      <span class="btnQte  " :class="{
        'btnDisabled cursor-no-drop ':
          subProduct.quantity == subProduct.max ||
          group.total_qte_sub_products == group.max,
      }" @click="increaseSubProductQuantity()">
        +
      </span>
    </div>
  </div>
</template>

<script lang="ts">
export default {
  props: ["product", "group", "subProduct"],
  methods: {
    increaseSubProductQuantity() {
      if (this.group.total_qte_sub_products < this.group.max || this.group.max == null) {
        if (this.subProduct.quantity >= 0) {
          if (
            this.subProduct.quantity < this.subProduct.max ||
            this.subProduct.max == 0 ||
            this.subProduct.max == null
          ) {
            this.subProduct.quantity += 1;
            this.subProduct.price = this.subProduct?.unit_price * this.subProduct.quantity;
            this.group.total_qte_sub_products += 1;
            this.group.used = true;
            this.group.is_disabled =
              this.group.total_qte_sub_products == this.group.max ? true : false;
            this.subProduct.disabled_plus =
              this.subProduct.max == this.subProduct.quantity ||
                this.group.total_qte_sub_products == this.group.max
                ? true
                : false;
            this.product.total = this.$ProductUtils.totalProduct(this.product);
          } else {

            let error = this.$t('button.max_sub_product', { max_sub_product: this.subProduct.max })
            let option = {
              showToast: true,
              type: 'error',
              toastMessage: error,
              duration: 3200
            }
            this.$store.commit('showCustomNotification', option);
          }
        }
      } else {

        let error = this.$t('button.max_group', { max_group: this.group.max })
        let option = {
          showToast: true,
          type: 'error',
          toastMessage: error,
          duration: 3200
        }
        this.$store.commit('showCustomNotification', option);
      }
      this.product.enabled_to_order = this.$ProductUtils.checkIsEnabledToOrder(this.product);
    },
    decreaseSubProductQuantity() {
      if (this.group.total_qte_sub_products >= 0) {
        if (this.subProduct.quantity > 0) {
          this.group.used = true;
          this.subProduct.quantity -= 1;
          this.group.total_qte_sub_products -= 1;
          this.subProduct.price = this.subProduct?.unit_price * this.subProduct.quantity;
          this.group.is_disabled =
            this.group.max > this.group.total_qte_sub_products ? false : true;
          this.subProduct.disabled_minus =
            this.subProduct.quantity == 0 || this.group.total_qte_sub_products == 0
              ? true
              : false;
          this.product.total = this.$ProductUtils.totalProduct(this.product);
        }
      }
      if (this.subProduct.quantity == 0) {
        this.group.used = false;
      }
      this.product.enabled_to_order = this.$ProductUtils.checkIsEnabledToOrder(this.product);
    },
  },
};
</script>