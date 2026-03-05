<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="createWorkExperienceData" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Add Work Experience</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="">
                    <label :class="[create_work_experience_form.errors.company_name ? 'text-danger' : '']"
                           class="form-label">Company Name</label>
                    <input v-model="create_work_experience_form.fields.company_name"
                           :class="[create_work_experience_form.errors.company_name ? 'is-invalid' : '']" autocomplete="off"
                           placeholder="Enter company name"
                           class="form-control" type="text"
                           @input="clearValidationCompanyNameError">
                    <div v-if="create_work_experience_form.errors.company_name" class="invalid-feedback">
                      {{ create_work_experience_form.errors.company_name[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mt-0">
                    <label
                      :class="[create_work_experience_form.errors.work_experience_job_role_id ? 'text-danger' : '']"
                      class="form-label">Job Role Type</label>
                    <Select
                      :attributes="jobRoleAttributes"
                      :border_color_danger="create_work_experience_form.errors.work_experience_job_role_id"
                      :class="[create_work_experience_form.errors.work_experience_job_role_id ? 'is-invalid' : '']" autocomplete="off"
                      placeholder="Select job role type"
                      @queryUpdates="getJobRole"
                      @selectUpdates="selectJobRole"
                      @input="clearValidationWorkExperienceJobRoleError"
                      :key="selectComponentKey"
                    />
                    <div v-if="create_work_experience_form.errors.work_experience_job_role_id" class="invalid-feedback">
                      {{ create_work_experience_form.errors.work_experience_job_role_id[0] }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-3">
                    <label :class="[create_work_experience_form.errors.name ? 'text-danger' : '']"
                           class="form-label">Work Experience</label>
                    <input v-model="create_work_experience_form.fields.name"
                           :class="[create_work_experience_form.errors.name ? 'is-invalid' : '']" autocomplete="off"
                           placeholder="Enter work experience"
                           class="form-control" type="text"
                           @input="clearValidationNameError">
                    <div v-if="create_work_experience_form.errors.name" class="invalid-feedback">
                      {{ create_work_experience_form.errors.name[0] }}
                    </div>
                  </div>
                </div>
                  <div class="col-md-6 mt-3">
                    <label
                      :class="[create_work_experience_form.errors.duration ? 'text-danger' : '']"
                      class="form-label">Duration(Month)</label>
                    <input
                      v-model="create_work_experience_form.fields.duration"
                      :class="[create_work_experience_form.errors.duration ? 'is-invalid' : '']"
                      autocomplete="off"
                      placeholder="Enter duration"
                      class="form-control" type="number"
                      @input="clearValidationDurationError"
                    >
                    <div v-if="create_work_experience_form.errors.duration" class="invalid-feedback">
                      {{ create_work_experience_form.errors.duration[0] }}
                    </div>
                  </div>
                </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-3">
                    <label
                      :class="[create_work_experience_form.errors.description ? 'text-danger' : '']"
                      class="form-label">Description</label>
                    <textarea
                      v-model="create_work_experience_form.fields.description"
                      :class="[create_work_experience_form.errors.description ? 'is-invalid' : '']"
                      autocomplete="off"
                      placeholder="Enter description"
                      class="form-control"
                      @input="clearValidationDescriptionError"></textarea>
                    <div v-if="create_work_experience_form.errors.description" class="invalid-feedback">
                      {{ create_work_experience_form.errors.description[0] }}
                    </div>
                  </div>
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
      selectComponentKey:1,
      job: "",
      jobs_list: "",
      create_work_experience_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
      jobRoleAttributes: {
        data: [],
        selected: {}
      },
    }
  },
  mounted() {
    this.getJobRole();
  },
  methods: {
    clearValidationNameError() {
      this.create_work_experience_form.errors.name = false;
    },
    clearValidationWorkExperienceJobRoleError() {
      this.create_work_experience_form.errors.work_experience_job_role_id = false;
      this.selectComponentKey++
    },
    clearValidationCompanyNameError() {
      this.create_work_experience_form.errors.company_name = false;
    },
    clearValidationDurationError() {
      this.create_work_experience_form.errors.duration = false;
    },
    clearValidationDescriptionError() {
      this.create_work_experience_form.errors.description = false;
    },
    async createWorkExperienceData() {
      try {
        let work = await this.$axios.$post(`/api/student/work-experiences`, this.create_work_experience_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.back();
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_work_experience_form.errors = e.response.data.errors
        this.create_work_experience_form.error_message = e.response.data.message
      }
    },
    async getJobRole(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/student/work_experience_job_roles', {params: {'filter[search]': query}});
        this.jobRoleAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectJobRole() {
      this.create_work_experience_form.fields.work_experience_job_role_id = this.jobRoleAttributes.selected.value;
    },
    async reset() {
      this.create_work_experience_form.errors.name = false;
      this.create_work_experience_form.errors.work_experience_job_role_id = false;
      this.create_work_experience_form.errors.company_name = false;
      this.create_work_experience_form.errors.duration = false;
      this.create_work_experience_form.errors.description = false;
      this.create_work_experience_form.fields = ""
      this.jobRoleAttributes.selected = {}
    }
  },
}
</script>

<style scoped>

</style>
