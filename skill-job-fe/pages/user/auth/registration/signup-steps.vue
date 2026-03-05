<template>
  <div class="page page-center">
    <div class="container-tight">
      <div>
        <div class="text-center pt-5 mb-4"><a class="navbar-brand navbar-brand-autodark" href="."><img src="@/assets/moxy_logo_final.png" alt=""
                                                                                                       height="36"></a>
        </div>
        <!--      step 01 start-->
        <div class="card card-md">
            <h2 class="card-title text-center mb-3 mt-4">Create Your Account</h2>
            <div class="mx-4 mt-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label"
                           :class="[signup_form.errors.first_name ? 'text-danger' : '']">First Name</label>
                    <input v-model="signup_form.fields.first_name"
                           :class="[signup_form.errors.first_name ? 'is-invalid' : '']"
                           class="form-control"
                           placeholder="Enter first name" type="text"
                           @input="clearValidationFirstNameError">
                    <div v-if="signup_form.errors.first_name" class="invalid-feedback">{{
                        signup_form.errors.first_name[0]
                      }}
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label"
                           :class="[signup_form.errors.last_name ? 'text-danger' : '']">Last Name</label>
                    <input v-model="signup_form.fields.last_name" :class="[signup_form.errors.last_name ? 'is-invalid' : '']"
                           class="form-control"
                           placeholder="Enter last name" type="text"
                           @input="clearValidationLastNameError">
                    <div v-if="signup_form.errors.last_name" class="invalid-feedback">{{
                        signup_form.errors.last_name[0]
                      }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label"
                           :class="[signup_form.errors.email ? 'text-danger' : '']">Email</label>
                    <input v-model="signup_form.fields.email" :class="[signup_form.errors.email ? 'is-invalid' : '']"
                           class="form-control"
                           placeholder="Enter email"
                           type="email"
                           @input="clearValidationEmailError">
                    <div v-if="signup_form.errors.email" class="invalid-feedback">
                      {{ signup_form.errors.email[0] }}</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label"
                           :class="[signup_form.errors.phone_number_1 ? 'text-danger' : '']">Phone Number</label>
                    <input v-model="signup_form.fields.phone_number_1"
                           :class="[signup_form.errors.phone_number_1 ? 'is-invalid' : '']"
                           type="tel" class="form-control" placeholder="Enter phone number"
                           @input="clearValidationPhoneError">
                    <div v-if="signup_form.errors.phone_number_1" class="invalid-feedback">{{
                        signup_form.errors.phone_number_1[0]
                      }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label"
                       :class="[signup_form.errors.password ? 'text-danger' : '']">Password</label>
                <div class="input-group input-group-flat">
                  <input v-model="signup_form.fields.password" :class="[signup_form.errors.password ? 'is-invalid' : '']"
                         :type="signup_form.password_show?'text':'password'"
                         autocomplete="off"
                         class="form-control" placeholder="Enter password"
                         @input="clearValidationPasswordError">
                  <span class="input-group-text">
                  <a class="link-secondary" data-bs-toggle="tooltip"
                     href="#" title="Show password" @click.prevent="passwordVisibilityToggle('password')"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg v-if="!signup_form.password_show" class="icon" fill="none" height="24"
                         stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         viewBox="0 0 24 24"
                         width="24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"
                                                                             stroke="none"/><circle cx="12" cy="12"
                                                                                                    r="2"/><path
                      d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/></svg>
                    <svg v-else class="icon icon-tabler icon-tabler-eye-off" fill="none"
                         height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24"
                         width="24" xmlns="http://www.w3.org/2000/svg">
                       <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                       <line x1="3" x2="21" y1="3" y2="21"></line>
                       <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83"></path>
                       <path
                         d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341"></path>
                    </svg>
                  </a>
                </span>
                  <div v-if="signup_form.errors.password" class="invalid-feedback">{{
                      signup_form.errors.password[0]
                    }}
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label"
                       :class="[signup_form.errors.password_confirmation ? 'text-danger' : '']">Password Confirmation</label>
                <div class="input-group input-group-flat">
                  <input v-model="signup_form.fields.password_confirmation"
                         :class="[signup_form.errors.password_confirmation ? 'is-invalid' : '']"
                         :type="signup_form.password_confirmation_show?'text':'password'"
                         autocomplete="off"
                         class="form-control" placeholder="Enter confirmation password"
                         @input="clearValidationConfirmError">
                  <span class="input-group-text">
                  <a class="link-secondary" data-bs-toggle="tooltip"
                     href="#" title="Show password" @click.prevent="passwordVisibilityToggle('password_confirmation')"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg v-if="!signup_form.password_confirmation_show" class="icon" fill="none"
                         height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24"
                         width="24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"
                                                                             stroke="none"/><circle cx="12" cy="12"
                                                                                                    r="2"/><path
                      d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/></svg>
                    <svg v-else class="icon icon-tabler icon-tabler-eye-off" fill="none"
                         height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24"
                         width="24" xmlns="http://www.w3.org/2000/svg">
                       <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                       <line x1="3" x2="21" y1="3" y2="21"></line>
                       <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83"></path>
                       <path
                         d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341"></path>
                    </svg>
                  </a>
                </span>
                  <div v-if="signup_form.errors.password_confirmation" class="invalid-feedback">
                    {{ signup_form.errors.password_confirmation[0] }}
                  </div>
                </div>
                <div class="form-footer">
                  <button @click="signup()" class="btn btn-primary w-100">Sign up</button>
                </div>
                <div class="text-center text-muted mt-3">
                  Already have account?
                  <NuxtLink tabindex="-1" to="/user/auth/login" class="link-color">Sign in</NuxtLink>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "signup-steps",
  auth: 'guest',
  data() {
    return {
      signup_form: {
        fields: {
          first_name: '',
          last_name: '',
          phone_number_1:'',
          email: '',
          password: '',
          password_confirmation: '',
        },
        errors: [],
        message: '',
        password_show: false,
        password_confirmation_show: false
      },
    }
  },
  mounted() {},
  watch: {},
  methods: {
    clearValidationFirstNameError() {
      this.signup_form.errors.first_name = false;
    },
    clearValidationLastNameError() {
      this.signup_form.errors.last_name = false;
    },
    clearValidationPhoneError() {
      this.signup_form.errors.phone_number_1 = false;
    },
    clearValidationEmailError() {
      this.signup_form.errors.email = false;
    },
    clearValidationPasswordError() {
      this.signup_form.errors.password = false;
    },
    clearValidationConfirmError() {
      this.signup_form.errors.password_confirmation = false;
    },

    async signup() {
      try {
        await this.$axios.$get('sanctum/csrf-cookie')
        await this.$axios.$post('/api/student/register?portal=student', this.signup_form.fields);
        await this.$auth.loginWith('cookie', {
          data: this.signup_form.fields
        })
        this.$router.push('/user/auth/registration/welcome-page')
      } catch (error) {
        this.signup_form.errors = error.response.data.errors
        this.signup_form.message = error.response.data.message
      }
    },
    passwordVisibilityToggle(type) {
      switch (type) {
        case 'password':
          this.signup_form.password_show = !this.signup_form.password_show;
          break
        case 'password_confirmation' :
          this.signup_form.password_confirmation_show = !this.signup_form.password_confirmation_show;
          break
      }
    },

  },
}
</script>

<style scoped>
.link-color{
  color:#8D80D1;
}
</style>
