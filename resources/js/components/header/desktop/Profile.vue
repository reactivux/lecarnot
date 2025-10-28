<template>
  <div class="droap_menu profile" ref="dropdown-profile">
    <ul>
      <li v-if="userStore?.data" class="">
        <ul class=" ">
          <li class="border-bottom droap_menu_p  ">
            <h6 class="droap_menu-title title title-h6">
              {{
              $t("header.dropdowns.profile.hey", {
              username:
              userStore?.data?.firstName +
              " " +
              userStore?.data?.lastName,
              })
              }}
              !</h6>
          </li>
          <li class="border-bottom droap_menu_p  ">
            <div class="dd_profile_content">
              <span class="dd_profile_edit">
                <a @click="showModalEditInfo"> {{ $t("button.edit") }} </a>
              </span>
              <div class="profile_row  ">
                <div class="profile_pair">
                  <div class="profile_hint text-color">
                    {{ $t("header.dropdowns.profile.userInfos.name") }}
                  </div>
                  <div class="profile_text text-color">
                    {{ userStore?.data?.firstName }}
                    {{ userStore?.data?.lastName }}
                  </div>
                </div>
              </div>
              <div data-e2e-id="profile-row-email" class="profile_row  ">
                <div class="profile_pair">
                  <div class="profile_hint text-color">
                    {{ $t("header.dropdowns.profile.userInfos.email") }}
                  </div>
                  <div class="profile_text text-color">
                    {{ userStore?.data?.email }}
                  </div>
                </div>
              </div>
              <div data-e2e-id="profile-row-email" class="profile_row  ">
                <div class="profile_pair">
                  <div class="profile_hint text-color">
                    {{ $t("header.dropdowns.profile.userInfos.phone") }}
                  </div>
                  <div class="profile_text text-color">
                    {{ userStore?.data?.phone }}
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </li>
      <li class="   border-bottom droap_menu_p  ">
        <a href="/commandes" class="cursor-pointer text-color">
          {{ $t("header.orders") }} <span v-if="counUnreadOrders" class="count-number-order "> {{ counUnreadOrders || 0
            }} </span>
        </a>
      </li>
      <li class=" droap_menu_p   border-bottom">
        <a href="/adresses-livraison" class="cursor-pointer text-color">{{
          $t("header.addresses")
          }}</a>
      </li>
      <li v-if="userStore?.isLoggedIn" class="droap_menu_p   ">
        <span @click="logOut()" class="float-end btn-logout logout-desktop cursor-pointer  text-color">
          {{ $t("header.dropdowns.profile.logout") }}</span>
      </li>
    </ul>
  </div>
  <modal-edit-user-info v-if="isModalEditInfo" :isModalEditInfo="isModalEditInfo" @toggleModal="handleToggleModal" />
</template>
<script lang="ts">

import { mapActions, mapState } from "vuex";
export default {
  data() {
    return {
      customerInfos: [],
      isModalEditInfo: false
    }
  },
  mounted() {
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

    showModalEditInfo() {
      this.isModalEditInfo = true
      this.$nextTick(() => {
        if (this.$refs['dropdown-profile']) {
          this.$refs['dropdown-profile'].style.opacity = '0'
        }
      });
    }
  }, 
  computed: {
    ...mapState(['cartStore', 'counUnreadOrders', 'userStore'])
  },
};
</script>
<style></style>
