<template>
  <ul class="menu_icon d-flex flex-wrap navbar-nav-cart">
    <li class="nav-item">
      <div class="cart_icon ">
        <span class="icon icon-navbar-desktop icon-cart position-relative"></span>
        <span class="count-number " v-if="cartStore?.products.length > 0"> {{ cartStore?.products.length || 0 }} </span>
      </div>
      <header-desktop-cart />
    </li>
    <li class="nav-item">
      <div v-if="userStore?.isLoggedIn">
        <div class="cart_icon  ">
          <span class="icon icon-navbar-desktop icon-user"></span>
          <span class="count-number " v-if="counUnreadOrders > 0"> {{ counUnreadOrders || 0 }} </span>
        </div>
        <header-desktop-profile />
      </div>
      <div v-else>
        <div class="cart_icon  " @click="redirectTo('/signin')">
          <span class="icon icon-navbar-desktop icon-user"></span>
        </div>
      </div>
    </li>
  </ul>
</template>
<script lang="ts">
import { mapActions, mapState, mapMutations, Store, mapGetters } from "vuex";
export default {
  props: ['store'],
  data() {
    return {
      isCartOpen: false,
      isUserInfosOpen: false,
    };
  },
  computed: {
    ...mapState(['cartStore', 'counUnreadOrders', 'userStore'])
  },
  async created() {


  },
  async mounted() {
    this.$store.commit('SET_DETAILS_STORE', this.store)

    if (this.userStore?.isLoggedIn)
      await this.getCountUnreadOrders()
    this.getLocalPanier();
  },
  methods: {
    ...mapActions(['getCountUnreadOrders', 'getLocalPanier']),
    toggleCarte() {
      this.isCartOpen = !this.isCartOpen;
      this.isUserInfosOpen = false;
    },
    toggleUserInfos() {
      this.isCartOpen = false;
      this.isUserInfosOpen = !this.isUserInfosOpen;
    },
    redirectTo(page) {
      window.location.href = page
    }
  },
};
</script>