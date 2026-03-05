<template>
  <div class="page page-center">
    <div class="container-tight py-4">
      <div class="text-center mb-4">
        <a class="navbar-brand navbar-brand-autodark" href="."><img alt="" height="36" src='#'>MoxyLogo</a>
      </div>
      <form @submit.prevent=sendResetLink class="card card-md">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Forgot password</h2>
          <p class="text-muted mb-4">Enter your email address and your password will be reset and emailed to you.</p>
<!--          <div class="alert alert-danger" role="alert" v-if="forgot_password_form.message">-->
<!--            {{ forgot_password_form.message }}-->
<!--          </div>-->
          <div class="alert alert-success" role="alert" v-if="forgot_password_form.message_success">
            {{ forgot_password_form.message_success }}
          </div>
          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input v-model="forgot_password_form.fields.email"
                   class="form-control"
                   :class="[forgot_password_form.errors.email ? 'is-invalid' : '']"
                   placeholder="Enter email" type="email"
                   @input="clearValidationEmailError">
            <div class="invalid-feedback" v-if="forgot_password_form.errors.email">{{ forgot_password_form.errors.email[0] }}</div>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100" v-if="!forgot_password_form.loading">
              <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
              <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                   stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                <rect height="14" rx="2" width="18" x="3" y="5"/>
                <polyline points="3 7 12 13 21 7"/>
              </svg>
              Send me new password
            </button>
            <button class="btn btn-primary w-100" disabled v-else>
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </button>
          </div>
        </div>
      </form>
      <div class="text-center text-muted mt-3">
        Forget it, <NuxtLink to="login">send me back</NuxtLink> to the sign in screen.
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "login",
  auth: 'guest',
  data() {
    return {
      forgot_password_form : {
        fields: {
          email: ''
        },
        errors: [],
        message: '',
        message_success :'',
        loading: false
      }
    }
  },
  methods: {
    clearValidationEmailError() {
      this.forgot_password_form.errors.email = false;
    },
    async sendResetLink() {
      try {
        this.forgot_password_form.errors=[]
        this.forgot_password_form.message=''
        this.forgot_password_form.message_success=''
        this.forgot_password_form.loading = true

        await this.$axios.$get('sanctum/csrf-cookie')
        let response = await this.$axios.$post('forgot-password?portal=student', this.forgot_password_form.fields)
        this.forgot_password_form.message_success = response.message

        this.forgot_password_form.loading = false
      }catch (error) {
        this.forgot_password_form.errors = error.response.data.errors
        this.forgot_password_form.message = error.response.data.message
        this.forgot_password_form.loading = false
      }
    },
  }
}
</script>

<style scoped>

</style>
