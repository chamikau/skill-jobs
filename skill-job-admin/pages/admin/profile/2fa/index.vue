<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header row">
          <div class="col mb-md-0 mb-2">
            <h3 class="card-title">2FA Authentication</h3>
          </div>
        </div>

        <div v-if="confirm_2fa_form.error_message" class="alert alert-danger" role="alert">
          {{ confirm_2fa_form.error_message }}
        </div>

        <template v-if="!$auth.user.two_factor_confirmed_at">
          <form @submit.prevent="enable2FA">
            <button class="btn btn-primary m-2" type="submit">Enable 2FA</button>
          </form>

          <div v-if="qrCode" v-html="qrCode"></div>
          <form v-if="qrCode" @submit.prevent="confirm2FA">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label :class="[confirm_2fa_form.errors.code ? 'text-danger' : '']" class="form-label">Code</label>
                  <input v-model="confirm_2fa_form.fields.code" :class="[confirm_2fa_form.errors.code ? 'is-invalid' : '']" autocomplete="off"
                         class="form-control " placeholder="Code"
                         type="text">
                  <div v-if="confirm_2fa_form.errors.code" class="invalid-feedback">{{
                      confirm_2fa_form.errors.code[0]
                    }}
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary m-2" type="submit">Confirm Code</button>
          </form>
        </template>
        <form @submit.prevent="disable2FA" v-else>
          <button class="btn btn-danger m-2" type="submit">Disable 2FA</button>
          <h3>Recovery Codes</h3>
          <ul>
            <li v-for="recovery_code in recover_codes">{{recovery_code}}</li>
          </ul>
        </form>


      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "general",
  data() {
    return {
      qrCode: '',
      recover_codes: [],
      confirm_2fa_form: {
        fields: {},
        error_message: '',
        errors: []
      }
    }
  },
  mounted() {
    if (this.$auth.user.two_factor_confirmed_at){
      this.getRecoveryCodes()
    }
  },
  methods: {
    async enable2FA() {
      await this.$axios.$get('sanctum/csrf-cookie')
      await this.$axios.$post('user/two-factor-authentication?portal=admin')

      this.qrCode = (await this.$axios.$get('user/two-factor-qr-code?portal=admin')).svg
    },
    async disable2FA() {
      await this.$axios.$get('sanctum/csrf-cookie')
      await this.$axios.$delete('user/two-factor-authentication?portal=admin')
      await this.$auth.fetchUser();
    },
    async confirm2FA() {
      try {
        await this.$axios.$get('sanctum/csrf-cookie')
        await this.$axios.$post('user/confirmed-two-factor-authentication?portal=admin', this.confirm_2fa_form.fields)
        await this.$auth.fetchUser()
        this.qrCode = ''

      } catch (e) {
        this.confirm_2fa_form.errors = e.response.data.errors
        this.confirm_2fa_form.error_message = e.response.data.message
      }

    },
    async getRecoveryCodes()
    {
      await this.$axios.$get('sanctum/csrf-cookie')
      this.recover_codes = (await this.$axios.$get('user/two-factor-recovery-codes?portal=admin'))
    }
  }
}
</script>

<style scoped>

</style>
