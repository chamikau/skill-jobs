<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="createCertificationData" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Add Certification</h5>
            </div>
            <div class="card-body">
              <div class="">
                <label
                  :class="[update_certification_form.errors.title ? 'text-danger' : '']"
                  class="form-label">Certification</label>
                <input
                  v-model="update_certification_form.fields.title"
                  :class="[update_certification_form.errors.title ? 'is-invalid' : '']"
                  type="text" class="form-control" placeholder="Enter certification title"
                  @input="clearValidationTitleError">
                <div v-if="update_certification_form.errors.title" class="invalid-feedback">
                  {{ update_certification_form.errors.title[0] }}
                </div>
                <label
                  :class="[update_certification_form.errors.links ? 'text-danger' : '']"
                  class="form-label mt-2">Certification Link</label>
                <input
                  v-model="update_certification_form.fields.links"
                  :class="[update_certification_form.errors.links ? 'is-invalid' : '']"
                  type="text" class="form-control" placeholder="Enter certification link"
                  @input="clearValidationLinkError">
                <div v-if="update_certification_form.errors.links" class="invalid-feedback">
                  {{ update_certification_form.errors.links[0] }}
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
      update_certification_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
    }
  },
  async mounted() {
  },
  methods: {
    clearValidationTitleError() {
      this.update_certification_form.errors.title = false;
    },
    clearValidationLinkError() {
      this.update_certification_form.errors.links = false;
    },
    async createCertificationData() {
      try {
        let certifications = await this.$axios.$post(`api/student/certifications`, this.update_certification_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.back();
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_certification_form.errors = e.response.data.errors
        this.update_certification_form.error_message = e.response.data.message
      }
    },

    async reset() {
      this.update_certification_form.errors.title = false;
      this.update_certification_form.errors.links = false;
      this.update_certification_form.fields = ""
    }
  },
}
</script>

<style scoped>

</style>
