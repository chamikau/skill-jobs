<template>
  <div id="tab-1" class="card tab-pane active show">
    <div class="row">
      <div class="col mt-3 ms-3 mb-2">
        <h3 class="card-title mt-2">
          Change Password
        </h3>
      </div>
    </div>
    <form @submit.prevent="changePassword" method="post">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">

              <div class="mb-3">
                <label class="form-label" :class="[change_password_form.errors.current_password ? 'text-danger' : '']">Current Password</label>
                <div class="input-group input-group-flat">
                  <input v-model="change_password_form.fields.current_password"
                         :class="[change_password_form.errors.current_password ? 'is-invalid' : '']"
                         :type="change_password_form.password_show?'text':'password'"
                         autocomplete="off"
                         class="form-control" placeholder="Enter current password"
                         @input="clearValidationCurrentPasswordError">
                  <span class="input-group-text">
                  <a class="link-secondary" data-bs-toggle="tooltip"
                     href="#" title="Show password" @click.prevent="passwordVisibilityToggle('password_current')"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg v-if="!change_password_form.password_show" class="icon" fill="none"
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
                  <div v-if="change_password_form.errors.current_password" class="invalid-feedback">
                    {{ change_password_form.errors.current_password[0] }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" :class="[change_password_form.errors.password ? 'text-danger' : '']">New Password</label>
              <div class="input-group input-group-flat">
                <input v-model="change_password_form.fields.password"
                       :class="[change_password_form.errors.password ? 'is-invalid' : '']"
                       :type="change_password_form.password_new_show?'text':'password'"
                       autocomplete="off"
                       class="form-control" placeholder="Enter new password"
                       @input="clearValidationPasswordError">
                <span class="input-group-text">
                  <a class="link-secondary" data-bs-toggle="tooltip"
                     href="#" title="Show password" @click.prevent="passwordVisibilityToggle('password_new_show')"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg v-if="!change_password_form.password_new_show" class="icon" fill="none"
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
                <div v-if="change_password_form.errors.password" class="invalid-feedback">
                  {{ change_password_form.errors.password[0] }}
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" :class="[change_password_form.errors.password_confirmation ? 'text-danger' : '']">Password Confirmation</label>
              <div class="input-group input-group-flat">
                <input v-model="change_password_form.fields.password_confirmation"
                       :class="[change_password_form.errors.password_confirmation ? 'is-invalid' : '']"
                       :type="change_password_form.password_confirmation_show?'text':'password'"
                       autocomplete="off"
                       class="form-control" placeholder="Enter confirmation password"
                       @input="clearValidationConfirmError">
                <span class="input-group-text">
                  <a class="link-secondary" data-bs-toggle="tooltip"
                     href="#" title="Show password" @click.prevent="passwordVisibilityToggle('password_confirm')"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg v-if="!change_password_form.password_confirmation_show" class="icon" fill="none"
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
                <div v-if="change_password_form.errors.password_confirmation" class="invalid-feedback">
                  {{ change_password_form.errors.password_confirmation[0] }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-end">
        <div class="d-flex">
          <a class="btn btn-outline-secondary ms-auto me-2" href="#" @click.prevent="reset">Reset</a>
          <button class="btn btn-primary" type="submit">Change Password</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      change_password_form: {
        fields: {},
        password_show: false,
        password_new_show: false,
        password_confirmation_show: false,
        error_message: '',
        errors: [],
      }
    }
  },
  methods: {
    clearValidationCurrentPasswordError() {
      this.change_password_form.errors.current_password = false;
    },
    clearValidationPasswordError() {
      this.change_password_form.errors.password = false;
    },
    clearValidationConfirmError() {
      this.change_password_form.errors.password_confirmation = false;
    },
    async changePassword()
    {
      try {
        await this.$axios.$get('sanctum/csrf-cookie');
        await this.$axios.$put('user/password?portal=student', this.change_password_form.fields)
        await this.$auth.fetchUser()
        this.$toast.success('Saved successfully!')
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.change_password_form.errors = e.response.data.errors
        this.change_password_form.error_message = e.response.data.message
      }
    },
    passwordVisibilityToggle(type) {
      switch (type) {
        case 'password_current':
          this.change_password_form.password_show = !this.change_password_form.password_show;
          break
        case 'password_confirm' :
          this.change_password_form.password_confirmation_show = !this.change_password_form.password_confirmation_show;
          break
        case 'password_new_show' :
          this.change_password_form.password_new_show = !this.change_password_form.password_new_show;
          break
      }
    },
    reset() {
      this.change_password_form = {
        fields: {},
        error_message: '',
        errors: [],
      }
    }
  }
}
</script>

<style scoped>

</style>
