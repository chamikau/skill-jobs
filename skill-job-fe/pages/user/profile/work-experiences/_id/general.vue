<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="createWorkExperienceData" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Edit Work Experience</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="">
                    <label :class="[update_work_experience_form.errors.company_name ? 'text-danger' : '']"
                           class="form-label">Company Name</label>
                    <input v-model="update_work_experience_form.fields.company_name"
                           :class="[update_work_experience_form.errors.company_name ? 'is-invalid' : '']" autocomplete="off"
                           placeholder="Enter company name"
                           class="form-control" type="text"
                           @input="clearValidationCompanyNameError">
                    <div v-if="update_work_experience_form.errors.company_name" class="invalid-feedback">
                      {{ update_work_experience_form.errors.company_name[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mt-0">
                    <label
                      :class="[update_work_experience_form.errors.work_experience_job_role_id ? 'text-danger' : '']"
                      class="form-label">Job Role Type</label>
                    <Select
                      :attributes="jobRoleAttributes"
                      :border_color_danger="update_work_experience_form.errors.work_experience_job_role_id"
                      :class="[update_work_experience_form.errors.work_experience_job_role_id ? 'is-invalid' : '']" autocomplete="off"
                      placeholder="Select job role type"
                      @queryUpdates="getJobRole"
                      @selectUpdates="selectJobRole"
                      @input="clearValidationWorkExperienceJobRoleError"
                      :key="selectComponentKey"
                    />
                    <div v-if="update_work_experience_form.errors.work_experience_job_role_id" class="invalid-feedback">
                      {{ update_work_experience_form.errors.work_experience_job_role_id[0] }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-3">
                    <label :class="[update_work_experience_form.errors.name ? 'text-danger' : '']"
                           class="form-label">Work Experience</label>
                    <input v-model="update_work_experience_form.fields.name"
                           :class="[update_work_experience_form.errors.name ? 'is-invalid' : '']" autocomplete="off"
                           placeholder="Enter work experience"
                           class="form-control" type="text"
                           @input="clearValidationNameError">
                    <div v-if="update_work_experience_form.errors.name" class="invalid-feedback">
                      {{ update_work_experience_form.errors.name[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <label
                    :class="[update_work_experience_form.errors.duration ? 'text-danger' : '']"
                    class="form-label">Duration(Month)</label>
                  <input
                    v-model="update_work_experience_form.fields.duration"
                    :class="[update_work_experience_form.errors.duration ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter duration"
                    class="form-control" type="number"
                    @input="clearValidationDurationError"
                  >
                  <div v-if="update_work_experience_form.errors.duration" class="invalid-feedback">
                    {{ update_work_experience_form.errors.duration[0] }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-3">
                    <label
                      :class="[update_work_experience_form.errors.description ? 'text-danger' : '']"
                      class="form-label">Description</label>
                    <textarea
                      v-model="update_work_experience_form.fields.description"
                      :class="[update_work_experience_form.errors.description ? 'is-invalid' : '']"
                      autocomplete="off"
                      placeholder="Enter description"
                      class="form-control"
                      @input="clearValidationDescriptionError"></textarea>
                    <div v-if="update_work_experience_form.errors.description" class="invalid-feedback">
                      {{ update_work_experience_form.errors.description[0] }}
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
      jobRoleAttributes: {
        data: [],
        selected: {}
      },
      update_work_experience_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
    }
  },
  async mounted() {
    await this.getJobRole()
    await this.getWorkExperiences()
  },
  methods: {
    clearValidationNameError() {
      this.update_work_experience_form.errors.name = false;
    },
    clearValidationWorkExperienceJobRoleError() {
      this.update_work_experience_form.errors.work_experience_job_role_id = false;
      this.selectComponentKey++
    },
    clearValidationCompanyNameError() {
      this.update_work_experience_form.errors.company_name = false;
    },
    clearValidationDurationError() {
      this.update_work_experience_form.errors.duration = false;
    },
    clearValidationDescriptionError() {
      this.update_work_experience_form.errors.description = false;
    },
    resetJob(){
      this.update_work_experience_form.fields = {}
      this.jobRoleAttributes.selected = {}
      this.update_work_experience_form.errors = []
    },
    async createWorkExperienceData() {
      try {
        let work_experience = await this.$axios.$put(`/api/student/work-experiences/${this.$route.params.id}`, this.update_work_experience_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push(`/user/profile/work-experiences/`)

      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_work_experience_form.errors = e.response.data.errors
        this.update_work_experience_form.error_message = e.response.data.message
      }
    },
    async getWorkExperiences() {
      try {
        this.work_experience = (await this.$axios.$get(`/api/student/work-experiences/${this.$route.params.id}`)).data
        this.update_work_experience_form.fields = this.work_experience
        this.jobRoleAttributes.selected = this.jobRoleAttributes.data.find((x)=>x.value === this.work_experience.work_experience_job_role_id);
      }catch (e){
        return e;
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
      this.update_work_experience_form.fields.work_experience_job_role_id = this.jobRoleAttributes.selected.value;
    },
    async reset() {
      try {
        this.update_work_experience_form.errors.name = false;
        this.update_work_experience_form.errors.work_experience_job_role_id = false;
        this.update_work_experience_form.errors.company_name = false;
        this.update_work_experience_form.errors.duration = false;
        this.update_work_experience_form.errors.description = false;
        this.work_experience = (await this.$axios.$get(`/api/student/work-experiences/${this.$route.params.id}`)).data
        this.update_work_experience_form.fields = this.work_experience
        this.jobRoleAttributes.selected = this.jobRoleAttributes.data.find((x)=>x.value === this.work_experience.work_experience_job_role_id);
      }catch (e){
        return e;
      }
    }
  },
}
</script>

<style scoped>

</style>
