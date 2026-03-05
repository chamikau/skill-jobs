<template>
  <div id="tab-1" class="card tab-pane active show">
    <form @submit.prevent="updateProfile" action="" method="post">
      <div class="card-body">
<!--        <div class="alert alert-danger" role="alert" v-if="update_profile_form.error_message">-->
<!--          {{ update_profile_form.error_message }}-->
<!--        </div>-->
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" :class="[update_profile_form.errors.first_name ? 'text-danger' : '']">First Name</label>
              <input v-model="update_profile_form.fields.first_name" type="text" class="form-control "
                     :class="[update_profile_form.errors.first_name ? 'is-invalid' : '']"
                     placeholder="Enter first name" autocomplete="off"
                     @input="clearValidationFirstNameError">
              <div class="invalid-feedback" v-if="update_profile_form.errors.first_name">{{ update_profile_form.errors.first_name[0] }}</div>
            </div>
          </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label" :class="[update_profile_form.errors.last_name ? 'text-danger' : '']">Last Name</label>
                <input v-model="update_profile_form.fields.last_name" type="text" class="form-control "
                       :class="[update_profile_form.errors.last_name ? 'is-invalid' : '']"
                       placeholder="Enter last name" autocomplete="off"
                       @input="clearValidationLastNameError">
                <div class="invalid-feedback" v-if="update_profile_form.errors.last_name">{{ update_profile_form.errors.last_name[0] }}</div>
              </div>
            </div>
        </div>
      </div>
      <div class="card-footer text-end">
        <div class="d-flex">
          <a class="btn btn-outline-secondary ms-auto me-2" href="#" @click.prevent="reset">Reset</a>
          <button class="btn btn-primary" type="submit">Update User</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "general",
  data() {
    return {
      update_profile_form: {
        fields: {
          first_name : this.$auth.user.first_name,
          last_name : this.$auth.user.last_name
        },
        error_message: '',
        errors: [],
      }
    }
  },
  methods: {
    clearValidationFirstNameError() {
      this.update_profile_form.errors.first_name = false;
    },
    clearValidationLastNameError() {
      this.update_profile_form.errors.last_name = false;
    },
    async updateProfile() {
      try {
        await this.$axios.$get('sanctum/csrf-cookie');
        await this.$axios.$post('/api/admin/profile', this.update_profile_form.fields)
        await this.$auth.fetchUser()
        this.$toast.success('Saved successfully!')
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_profile_form.errors = e.response.data.errors
        this.update_profile_form.error_message = e.response.data.message
      }
    },
    reset() {
      this.update_profile_form = {
        fields: {first_name : this.$auth.user.first_name,last_name : this.$auth.user.last_name},
        error_message: '',
        errors: [],
      }
    }
  }
}
</script>

<style scoped>

</style>
