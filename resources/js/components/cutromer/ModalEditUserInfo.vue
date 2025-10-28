<template>
  <CustomModal v-if="isModalOpen" @close="closeModal()" :modalsize="'modal-sm'" ref="customModal">
    <template v-slot:header>
      <div class="header-modal">
        <h4 class="title title-h4  mb-2 mt-2 text-center">Modifier votre profil</h4>
      </div>
    </template>
    <template v-slot:content>
      <div class="row justify-content-center wow fadeInUp">
        <div class="col-md-12">
          <Form @submit="handleSubmit">
            <div class="mb_25">
              <Field name="Email" placeholder="Email" label="Email" rules="required|email"
                :value="initialValues.email" />
              <ErrorMessage class="text-start help error-danger" name="Email" />
              <span v-if="errorsValues?.email">
                {{ $t(errorsValues?.email[0]) }}
              </span>
            </div>
            <div class="mb_25">
              <Field name="firstName" placeholder="Prénom" label="Prénom" rules="required|min:2"
                :value="initialValues.firstName" />
              <ErrorMessage class="text-start help error-danger" name="firstName" />
              <span v-if="errorsValues?.firstName">
                {{ $t(errorsValues?.firstName[0]) }}
              </span>
            </div>
            <div class="mb_25">
              <Field name="lastName" placeholder="Nom" label="Nom" rules="required|min:3"
                :value="initialValues.lastName" />
              <ErrorMessage class="text-start help error-danger" name="lastName" />
              <span v-if="errorsValues?.lastName">
                {{ $t(errorsValues?.lastName[0]) }}
              </span>
            </div>
            <div class="mb_25">
              <Field name="phone" placeholder="Téléphone" label="Téléphone" rules="required|min:3|numeric"
                :value="initialValues.phone" />
              <ErrorMessage class="text-start help error-danger" name="phone" />
              <span v-if="errorsValues?.phone">
                {{ $t(errorsValues?.phone[0]) }}
              </span>
            </div>
            <button class="buttons buttons-theme buttons-md w-100" type="submit"> Enregistrer</button>
          </Form>
        </div>
      </div>
    </template>
  </CustomModal>
  <dialog-confirmation ref="CustomDialogConfirmation" />
</template>
<script>

import { Form, Field, ErrorMessage } from 'vee-validate';
import { mapActions, mapState } from "vuex";
export default {
  components: {
    Form, Field, ErrorMessage
  },
  props: ["user", "isModalEditInfo"],
  data() {
    return {
      isModalOpen: this.isModalEditInfo,
      errorsValues: [],
      initialValues: {}
    }
  },
  mounted() {
    this.initialValues = {
      email: this.userStore?.user?.data?.email,
      firstName: this.userStore?.user?.data?.firstName,
      lastName: this.userStore?.user?.data?.lastName,
      phone: this.userStore?.user?.data?.phone,
    }
  },
  methods: {
    ...mapActions(['UpdateInformationCustomer']),
    closeModal() {
      this.isModalOpen = false
      this.$emit("toggleModal", false);
    },
    async handleSubmit(values, actions) {
      let sweetOption = {
        title: this.$t("alerts.edit.title"),
        text: '',
        icon: 'icon',
        alertButtons: [
          { text: this.$t("button.yes"), action: 'confirm', color: "confirmColor" },
          { text: this.$t("button.no"), action: 'cancel', color: "cancleColor" },
        ],
      }
      const selectedAction = await this.$refs.CustomDialogConfirmation.open(sweetOption);
      if (selectedAction == "confirm") {
        let result = await this.UpdateInformationCustomer({
          email: values.Email,
          firstName: values.firstName,
          lastName: values.lastName,
          phone: values.phone,
        });
        this.errorsValues = result?.errors || [];
        if (result) {
          this.$refs.customModal.$emit("toggleModal", false);
          this.isModalOpen = false
          document.body.classList.remove('modal-open');
        }
      }
    }
  },
  computed: {
    ...mapState(['userStore'])
  }
};
</script>
