<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="updateCertificationData" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Edit Certification</h5>
            </div>
              <div class="card-body">
                <div class="">
                  <label
                    :class="[update_education_form.errors.title ? 'text-danger' : '']"
                    class="form-label">Certification</label>
                  <input
                    v-model="update_education_form.fields.title"
                    :class="[update_education_form.errors.title ? 'is-invalid' : '']"
                    type="text" class="form-control" placeholder="Enter certification title"
                    @input="clearValidationTitleError">
                  <div v-if="update_education_form.errors.title" class="invalid-feedback">
                    {{ update_education_form.errors.title[0] }}
                  </div>
                  <label
                    :class="[update_education_form.errors.links ? 'text-danger' : '']"
                    class="form-label mt-2">Certification Link</label>
                  <input
                    v-model="update_education_form.fields.links"
                    :class="[update_education_form.errors.links ? 'is-invalid' : '']"
                    type="text" class="form-control" placeholder="Enter certification link"
                    @input="clearValidationLinkError">
                  <div v-if="update_education_form.errors.links" class="invalid-feedback">
                    {{ update_education_form.errors.links[0] }}
                  </div>
                </div>
              </div>
            <div class="card-footer text-end">
              <div class="d-flex">
                <a class="btn btn-outline-secondary ms-auto me-2" href="#" @click="reset()">Reset</a>
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "general",
  data() {
    return {
      job: "",
      jobs_list: "",
      update_education_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
    }
  },
  mounted() {
    this.getCertificationData()
  },
  methods: {
    clearValidationTitleError() {
      this.update_education_form.errors.title = false;
    },
    clearValidationLinkError() {
      this.update_education_form.errors.links = false;
    },
    async updateCertificationData() {
      try {
        let education = await this.$axios.$put(`api/student/certifications/${this.$route.params.id}`, this.update_education_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push('/user/profile/certification')
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_education_form.errors = e.response.data.errors
        this.update_education_form.error_message = e.response.data.message
      }
    },
    async getCertificationData() {
      this.certifications = (await this.$axios.$get(`api/student/certifications/${this.$route.params.id}`)).data
      this.update_education_form.fields = this.certifications
    },
    async reset() {
      try {
        this.update_education_form.errors.title = false;
        this.update_education_form.errors.links = false;
        this.certifications = (await this.$axios.$get(`api/student/certifications/${this.$route.params.id}`)).data
        this.update_education_form.fields = this.certifications
      }catch (e){
        return e;
      }
    }
  },
}
</script>

<style scoped>

</style>
