<template>
  <div class="page page-center">
    <div class="container-tight py-4">
      <div class="text-center mb-4">
        <a href="profile" class="navbar-brand navbar-brand-autodark"><img src='' height="36" alt="">MoxyLogo</a>
      </div>
      <form class="card card-md" autocomplete="off" @submit.p.prevent="confirmPassword">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Enter your password to continue</h2>
          <div class="alert alert-danger" role="alert" v-if="confirm_password_form.error_message">
            {{ confirm_password_form.error_message }}
          </div>
          <div class="mb-2">
            <label class="form-label">
              Password
            </label>
            <div class="input-group input-group-flat">
              <input v-model="confirm_password_form.fields.password" :type="show_password?'text':'password'" class="form-control" :class="[confirm_password_form.errors.password ? 'is-invalid' : '']"  placeholder="Password"  autocomplete="off">
              <span class="input-group-text">
                  <a @click.prevent="passwordVisibilityToggle" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg v-if="!show_password" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <line x1="3" y1="3" x2="21" y2="21"></line>
                       <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83"></path>
                       <path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341"></path>
                    </svg>
                  </a>
                </span>
              <div class="invalid-feedback" v-if="confirm_password_form.errors.password">{{ confirm_password_form.errors.password[0] }}</div>
            </div>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100" v-if="!confirm_password_form.loading">Confirm Password</button>
            <button class="btn btn-primary w-100" disabled v-else>
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "login",
  head () {
    return {
      bodyAttrs: {
        class: ' d-flex flex-column'
      }
    }
  },
  data() {
    return {
      confirm_password_form: {
        fields: {},
        errors: [],
        error_message: '',
        loading: false
      },
      show_password: false
    }
  },
  methods: {
    async confirmPassword() {
      try {
        this.loading = true
        await this.$axios.$get('sanctum/csrf-cookie')
        await this.$axios.post('user/confirm-password?portal=admin', this.confirm_password_form.fields)
        await this.$router.replace({name: this.$route.query.return || 'admin-profile-general'})

      }catch (error) {
        this.confirm_password_form.errors = error.response.data.errors
        this.confirm_password_form.error_message = error.response.data.message
        this.loading = false
      }
    },
    passwordVisibilityToggle()
    {
      this.show_password = !this.show_password
    }
  }
}
</script>

<style scoped>

</style>
