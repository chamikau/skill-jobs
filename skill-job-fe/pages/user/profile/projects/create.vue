<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="updateProjectData" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Add Project</h5>
            </div>
            <div class="card-body">
              <div class="">
                <div class="mt-3">
                  <label
                    :class="[create_education_form.errors.project_title ? 'text-danger' : '']"
                    class="form-label">Project Title</label>
                  <input
                    v-model="create_education_form.fields.project_title"
                    :class="[create_education_form.errors.project_title ? 'is-invalid' : '']"
                    type="text" class="form-control" placeholder="Enter project title"
                    @input="clearValidationProjectTitleError">
                  <div v-if="create_education_form.errors.project_title" class="invalid-feedback">
                    {{ create_education_form.errors.project_title[0] }}
                  </div>
                  <label
                    :class="[create_education_form.errors.project_links ? 'text-danger' : '']"
                    class="form-label mt-2">Project Link</label>
                  <input
                    v-model="create_education_form.fields.project_links"
                    :class="[create_education_form.errors.project_links ? 'is-invalid' : '']"
                    type="text" class="form-control" placeholder="Enter project link"
                    @input="clearValidationProjectLinkError">
                  <div v-if="create_education_form.errors.project_links" class="invalid-feedback">
                    {{ create_education_form.errors.project_links[0] }}
                  </div>
                </div>
                <label
                  :class="[create_education_form.errors.project_description ? 'text-danger' : '']"
                  class="form-label mt-2">Project Description</label>
                <textarea
                  v-model="create_education_form.fields.project_description"
                  :class="[create_education_form.errors.project_description ? 'is-invalid' : '']"
                  type="text" class="form-control" placeholder="Enter project description"
                  @input="clearValidationProjectDescriptionError">
                  </textarea>
                <div v-if="create_education_form.errors.project_description" class="invalid-feedback">
                  {{ create_education_form.errors.project_description[0] }}
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
      create_education_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
      student_year_attributes: {
        data: [],
        selected: {}
      },
    }
  },
  async mounted() {
  },
  methods: {
    clearValidationProjectTitleError() {
      this.create_education_form.errors.project_title = false;
    },
    clearValidationProjectLinkError() {
      this.create_education_form.errors.project_links = false;
    },
    clearValidationProjectDescriptionError() {
      this.create_education_form.errors.project_description = false;
    },
    async updateProjectData() {
      try {
        let project = await this.$axios.$post(`api/student/projects`, this.create_education_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.back();
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_education_form.errors = e.response.data.errors
        this.create_education_form.error_message = e.response.data.message
      }
    },
    async reset() {
        this.create_education_form.errors.project_title = false;
        this.create_education_form.errors.project_links = false;
        this.create_education_form.errors.project_description = false;
        this.create_education_form.fields = ""
    }
  },
}
</script>

<style scoped>

</style>
