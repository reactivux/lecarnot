<template>
  <div class="elementRadio radioColor text-color">
    <input @click="RadioButtonsubProduct" type="radio" :value="subProduct.id" :name="group.title"
      v-model="checkedProductID" />
    <span class="font-weight-300 first-letter-maj text-break" :class="{ checked: subProduct.checked }">{{
      subProduct?.ingredient?.name || subProduct?.supplement?.name || subProduct?.name }}
      <b v-if="subProduct?.unit_price > 0" class="font-weight-500"> €{{
        subProduct?.unit_price?.toFixed(2) }}
      </b>
      <promos-component v-if="promoSize" :promoSize="promoSize" :product-name="product?.name" />
    </span>
  </div>
</template>
<script lang="ts">
/** import components */
import Promos from "./Promos.vue";
export default {
  setup(props) {
    let promoSize = props?.product?.promos?.filter(
      (promoObj: any) => promoObj.sub_product_id == props.subProduct.id
    );
    promoSize = promoSize.length > 0 ? promoSize[0] : null;
    const checkedProductID = props.subProduct.checked == 1 ? props.subProduct.id : 0;
    return {
      checkedProductID,
      promoSize,
    };
  },
  components: {
    Promos,
  },
  props: ["product", "group", "subProduct", "selectedIndex"],
  data() {
    return {
      fakeIndex: null
    };
  },
  created() { },
  methods: {
    RadioButtonsubProduct() {
      this.fakeIndex = null
      // Update the checked value of the radio button
      if (this.group?.type === "size" && this.group?.required) {
        this.group.sub_products.forEach((subProductObj: any) => {
          subProductObj.quantity = this.subProduct.id === subProductObj.id ? 1 : 0;
          subProductObj.checked = this.subProduct.id === subProductObj.id ? true : false;
          if (this.fakeIndex == null && this.selectedIndex !== null)
            this.fakeIndex = this.subProduct.id === subProductObj.id ? this.selectedIndex : null;
        });
      }
      else {
        this.group.sub_products.forEach((subProductObj: any) => {
          subProductObj.quantity = this.subProduct.id == subProductObj.id && !subProductObj.checked ? 1 : 0;
          subProductObj.checked = this.subProduct.id == subProductObj.id && !subProductObj.checked
            ? true
            : false;
          if (this.fakeIndex == null && this.selectedIndex !== null)
            this.fakeIndex = this.subProduct.id == subProductObj.id && !subProductObj.checked ? this.selectedIndex : null;
        });
      }

      this.group.used = this.$ProductUtils.isGroupUsed(this.group);

      this.product.enabled_to_order = this.$ProductUtils.checkIsEnabledToOrder(this.product);
      if (this.fakeIndex && this.selectedIndex !== null) {
        const init = this.$ProductUtils.initPrice(this.product);
        this.product.selectedSizeIndex = this.fakeIndex
        this.product.hasSize = true
      }

      this.product.total = this.$ProductUtils.totalProduct(this.product);

    },
  },
  computed: {},
};
</script>
