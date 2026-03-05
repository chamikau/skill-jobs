<template xmlns="http://www.w3.org/1999/html">
  <div class="page page-center">
    <div class="container-tight py-4">
      <div class="text-center mb-4"><a class="navbar-brand navbar-brand-autodark" href="."><img src="@/assets/moxy_logo_final.png" alt=""
                                                                                                height="36"></a>
      </div>
      <form class="card card-md" autocomplete="off" @submit.p.prevent="login">
<!--        <form class="card card-md" autocomplete="off" @submit.p.prevent="login">-->
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Login to Your Account</h2>
          <div class="alert alert-danger" role="alert" v-if="login_form.message === 'These credentials do not match our records.' && login_form.message !== 'The email field is required.' && login_form.message !== 'The password field is required.'"
               style="background-color: #d63939;color: white">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24"
                 stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
              <path d="M12 8v4"></path>
              <path d="M12 16h.01"></path>
            </svg>
            {{ login_form.message }}
          </div>
          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input v-model="login_form.fields.email" type="email" class="form-control "
                   :class="[login_form.errors.email ? 'is-invalid' : '']"
                   placeholder="Enter Email" autocomplete="off"
                   @input="clearValidationEmailError">
            <div class="invalid-feedback" v-if="login_form.errors.email && credentials === false">{{ login_form.errors.email[0] }}</div>
          </div>
          <div class="mb-2">
            <label class="form-label">
              Password
            </label>
            <div class="input-group input-group-flat">
              <input v-model="login_form.fields.password"
                     :type="show_password?'text':'password'" class="form-control"
                     :class="[login_form.errors.password ? 'is-invalid' : '']"
                     placeholder="Password"  autocomplete="off"
                     @input="clearValidationPasswordError">
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
              <div class="invalid-feedback" v-if="login_form.errors.password && credentials === false">{{ login_form.errors.password[0] }}</div>
            </div>
<!--            <span class="form-label-description mt-2 mb-3">-->
<!--                  <NuxtLink to="forgot-password" class="link-color">I forgot password</NuxtLink>-->
<!--            </span>-->
          </div>
<!--          <div class="mb-2">-->
<!--            <label class="form-check">-->
<!--              <input type="checkbox" class="form-check-input"/>-->
<!--              <span class="form-check-label">Remember me on this device</span>-->
<!--            </label>-->
<!--          </div>-->
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100" v-if="!login_form.loading">Sign in</button>
            <button class="btn btn-primary w-100" disabled v-else>
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </button>
          </div>
        </div>
      </form>
      <div class="text-center text-muted mt-3">
        Don't have account yet? <NuxtLink to="/user/auth/registration/signup-steps" tabindex="-1" class="link-color">Sign up</NuxtLink>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "login",
  auth: 'guest',
  head () {
    return {
      bodyAttrs: {
        class: ' d-flex flex-column'
      }
    }
  },
  data() {
    return {
      credentials:false,
      login_form: {
        fields: {
          email: '',
          password: ''
        },
        errors: [],
        message: '',
        loading: false
      },
      show_password: false
    }
  },
  methods: {
    clearValidationEmailError() {
      this.login_form.errors.email = false;
      this.login_form.message = false;
    },
    clearValidationPasswordError() {
      this.login_form.errors.password = false;
      this.login_form.message = false;
    },
    async login() {
      try {
        this.loading = true
        await this.$auth.loginWith('cookie', {
          data: this.login_form.fields
        })

      }catch (error) {
        this.login_form.message = error.response.data.message
        if (this.login_form.message === 'These credentials do not match our records.' && this.login_form.message !== 'The email field is required.' && this.login_form.message !== 'The password field is required.'){
          this.credentials = true
        }
        else
        {
          this.credentials = false
          this.login_form.errors = error.response.data.errors
        }
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
.link-color{
  color:#8D80D1;
}
</style>
