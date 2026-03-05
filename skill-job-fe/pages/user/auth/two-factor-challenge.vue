<template>
  <div class="page page-center">
    <div class="container-tight py-4">
      <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"><img src='' height="36" alt="">MoxyLogo</a>
      </div>
      <form class="card card-md" autocomplete="off" @submit.prevent="submitRecoveryChallenge">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Two Factor Challenge</h2>
          <div class="alert alert-danger" role="alert" v-if="challenge_two_factor_form.message">
            {{ challenge_two_factor_form.message }}
          </div>
          <div class="mb-3">
            <label class="form-label">Code</label>
            <input v-model="challenge_two_factor_form.fields.code" type="code" class="form-control " :class="[challenge_two_factor_form.errors.code ? 'is-invalid' : '']" placeholder="Enter code" autocomplete="off">
            <div class="invalid-feedback" v-if="challenge_two_factor_form.errors.code">{{ challenge_two_factor_form.errors.code[0] }}</div>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100" v-if="!challenge_two_factor_form.loading">Submit</button>
            <button class="btn btn-primary w-100" disabled v-else>
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </button>
          </div>
        </div>
      </form>
      <div class="text-center text-muted mt-3">
        Use your <NuxtLink to="two-factor-challenge-recovery" tabindex="-1">recovery code</NuxtLink>
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
      challenge_two_factor_form: {
        fields: {},
        errors: [],
        message: '',
        loading: false
      },
      show_password: false
    }
  },
  methods: {
    async submitRecoveryChallenge() {
      try {
        this.loading = true
        await this.$axios.$get('sanctum/csrf-cookie')
        await this.$axios.$post('two-factor-challenge?portal=admin', this.challenge_two_factor_form.fields)
        await this.$auth.fetchUser()

        this.$router.replace({'name' : 'admin-organizations'});

      }catch (error) {
        this.challenge_two_factor_form.errors = error.response.data.errors
        this.challenge_two_factor_form.message = error.response.data.message
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
