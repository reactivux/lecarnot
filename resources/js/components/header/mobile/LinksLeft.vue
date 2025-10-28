<template>
  <ul class="links-left menu-mobile">
    <li class="userInfos" :class="{ 'w-100': $store.state.isSideLeftOpening }">
      <div @click="this.$global.openSideLeft()" class="cursor-pointer">
        <div class="cart_icon ">
          <span class="icon    icon-navbar-mobile icon-burger_menu"></span>
        </div>
      </div>
      <div class="liv-dropleft-cart" :class="{ 'open-cart': $store.state.isSideLeftOpening }">
        <div id="header_menu">
          <div class="open_close cursor-pointer  " @click="this.$global.openSideLeft">
            <span class="icon   icon-close"></span>
          </div>
          <img class="logoMobile" layout="responsive" width="75" height="75" fetchpriority="high"
            v-lazy="this.$global.getImageUrl('img/logo-le-cinq-5-white.webp', 'logo')"
            alt="Le Carnot - Street Food Croustillante et Savoureuse" />
        </div>
        <ul>
          <li v-if="userStore?.isLoggedIn" class="border-bottom droap_menu_p">
            <h6 class="white-color title title-h6">Bonjour, {{ userStore?.data?.firstName }}
              {{ userStore?.data?.lastName }} </h6>
          </li>
          <li v-if="userStore?.isLoggedIn" class="border-bottom droap_menu_p">
            <div class="dd_profile_content">
              <span class="dd_profile_edit">
                <a @click="opneModalEditInfo"> {{ $t("button.edit") }} </a>
              </span>
              <div class="profile_row dd_profile_p ">
                <div class="profile_pair">
                  <div class="profile_hint text-color"> {{ $t("header.dropdowns.profile.userInfos.name") }}</div>
                  <div class="profile_text text-color">
                    {{ userStore?.data?.firstName }}
                    {{ userStore?.data?.lastName }}
                  </div>
                </div>
              </div>
              <div data-e2e-id="profile-row-email" class="profile_row dd_profile_p ">
                <div class="profile_pair">
                  <div class="profile_hint text-color"> {{ $t("header.dropdowns.profile.userInfos.email") }}</div>
                  <div class="profile_text text-color">
                    {{ userStore?.data?.email }}
                  </div>
                </div>
              </div>
              <div data-e2e-id="profile-row-email" class="profile_row dd_profile_p ">
                <div class="profile_pair">
                  <div class="profile_hint text-color"> {{ $t("header.dropdowns.profile.userInfos.phone") }}</div>
                  <div class="profile_text text-color">
                    {{ userStore?.data?.phone }}
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="droap_menu_p">
            <a href="/" class="page-link cursor-pointer">
              <b>{{ $t("header.home") }} </b></a>
          </li>
          <li class="droap_menu_p">
            <a href="/a-propos" class="page-link cursor-pointer">
              <b>{{ $t("header.about") }}</b></a>
          </li>
          <li class="droap_menu_p">
            <a href="/produits" class="page-link cursor-pointer">
              <b>{{ $t("header.products") }}</b></a>
          </li>
          <li v-if="userStore?.isLoggedIn" class="droap_menu_p">
            <a href="/commandes" class="page-link cursor-pointer">
              <b>{{ $t("header.orders") }}</b>
              <span v-if="counUnreadOrders" class="count-number-order "> {{ counUnreadOrders || 0 }} </span>
            </a>
          </li>
          <li v-if="userStore?.isLoggedIn" class="droap_menu_p">
            <a href="/adresses-livraison" class="page-link cursor-pointer"><b>{{
                $t("header.addresses") }}</b></a>
          </li>
          <li class="droap_menu_p">
            <a href="/contactez-nous" class="page-link cursor-pointer"><b>{{ $t("header.contact")
                }}</b></a>
          </li>
          <li v-if="!userStore?.isLoggedIn" class="droap_menu_p">
            <a href="/signin" class="page-link cursor-pointer"><b>{{ $t("header.signin")
                }}</b></a>
          </li>
          <li v-if="userStore?.isLoggedIn" class="border-top droap_menu_p">
            <span @click="logOut()" class="float-end btn-logout logout-desktop cursor-pointer">
              <b> {{ $t("header.dropdowns.profile.logout") }}</b></span>
          </li>
        </ul>
      </div>
    </li>
  </ul>
  <modal-edit-user-info v-if="isModalEditInfo" :isModalEditInfo="isModalEditInfo" @toggleModal="handleToggleModal" />
</template>
<script>
import { mapActions, mapState } from "vuex";

export default {
  data() {
    return {
      isSideLeftOpening: false,
      isModalEditInfo: false
    }

  },
  methods: {
    ...mapActions(['logOut']),
    handleToggleModal(payload) {
      this.$nextTick(() => {
        if (this.$refs['dropdown-profile']) {
          this.$refs['dropdown-profile'].style.opacity = 1;
        }
      });
      this.isModalEditInfo = payload;
    },
    opneModalEditInfo() {
      this.$global.openSideLeft()
      this.isModalEditInfo = true
    },
  }, 
  computed: {
    ...mapState(['cartStore', 'counUnreadOrders', 'userStore'])
  },

};
</script>
