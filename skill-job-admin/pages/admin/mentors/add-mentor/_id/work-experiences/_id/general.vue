<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="updateWorkExperienceData()" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Edit Work Experience</h5>
            </div>
            <div class="card-body">
              <div class="mt-3">
                <div class="col-6 mt-3">
                  <label
                    :class="[update_work_experience_form.errors.name ? 'text-danger' : '']"
                    class="form-label">Company Name</label>
                  <input
                    v-model="update_work_experience_form.fields.name"
                    :class="[update_work_experience_form.errors.name ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter work company name"
                    class="form-control" type="text"
                    @input="clearValidationNameError">
                  <div v-if="update_work_experience_form.errors.name" class="invalid-feedback">
                    {{ update_work_experience_form.errors.name[0] }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-6 mt-3">
                  <label
                    :class="[update_work_experience_form.errors.start_date ? 'text-danger' : '']"
                    class="form-label">Start Date</label>
                  <input
                    v-model="update_work_experience_form.fields.start_date"
                    :class="[update_work_experience_form.errors.start_date ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter duration"
                    class="form-control" type="date"
                    @input="clearValidationStartDateError">
                  <div v-if="update_work_experience_form.errors.start_date" class="invalid-feedback">
                    {{ update_work_experience_form.errors.start_date[0] }}
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <label
                    :class="[update_work_experience_form.errors.end_date ? 'text-danger' : '']"
                    class="form-label">End Date</label>
                  <input
                    v-model="update_work_experience_form.fields.end_date"
                    :class="[update_work_experience_form.errors.end_date ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter duration"
                    class="form-control" type="date"
                    @input="clearValidationEndDateError">
                  <div v-if="update_work_experience_form.errors.end_date" class="invalid-feedback">
                    {{ update_work_experience_form.errors.end_date[0] }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="mt-3 col-6">
                  <label
                    :class="[update_work_experience_form.errors.work_experience_job_role_id ? 'text-danger' : '']"
                    class="form-label">Job Type</label>
                  <Select
                    :attributes="workExperienceAttributes"
                    :border_color_danger="update_work_experience_form.errors.work_experience_job_role_id"
                    :class="[update_work_experience_form.errors.work_experience_job_role_id ? 'is-invalid' : '']" autocomplete="off"
                    placeholder="Select job type"
                    @queryUpdates="getMentorJobRoleTypes"
                    @selectUpdates="selectMentorJobRoleTypes"
                    @input="clearValidationJobRoleError"
                    :key="selectComponentKey"
                  />
                  <div v-if="update_work_experience_form.errors.work_experience_job_role_id" class="invalid-feedback">
                    {{ update_work_experience_form.errors.work_experience_job_role_id[0] }}
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <label
                    :class="[update_work_experience_form.errors.description ? 'text-danger' : '']"
                    class="form-label">Description</label>
                  <textarea
                    v-model="update_work_experience_form.fields.description"
                    :class="[update_work_experience_form.errors.description ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter description"
                    class="form-control" type="text"
                    @input="clearValidationDescriptionError">
                  </textarea>
                  <div v-if="update_work_experience_form.errors.description" class="invalid-feedback">
                    {{ update_work_experience_form.errors.description[0] }}
                  </div>
                </div>
              </div>
              <div class="card-footer text-end mt-3">
                <div class="d-flex">
                  <a class="btn btn-outline-secondary ms-auto me-2" href="#" @click="reset()">Reset</a>
                  <button class="btn btn-primary" type="submit">Save</button>
                </div>
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
      mentors:"",
      update_work_experience_form: {
        fields: {},
        error_message: '',
        errors: []
      },
      workExperienceAttributes: {
        data: [],
        selected: {}
      },
    }
  },
  mounted() {
    this.getMentorJobRoleTypes()
    this.getMentors()
  },
  methods: {
    clearValidationNameError() {
      this.update_work_experience_form.errors.name = false;
    },
    clearValidationJobRoleError() {
      this.update_work_experience_form.errors.work_experience_job_role_id = false;
      this.selectComponentKey++
    },
    clearValidationCourseNameError() {
      this.update_work_experience_form.errors.course_name = false;
    },
    clearValidationDescriptionError() {
      this.update_work_experience_form.errors.description = false;
    },
    clearValidationStartDateError() {
      this.update_work_experience_form.errors.start_date = false;
    },
    clearValidationEndDateError() {
      this.update_work_experience_form.errors.end_date = false;
    },
    async getMentors() {
      this.mentors = (await this.$axios.$get(`/api/admin/mentor-work-experiences/${this.$route.params.id}`)).data
      this.update_work_experience_form.fields=this.mentors
      this.workExperienceAttributes.selected = this.workExperienceAttributes.data.find((x)=>x.value === this.mentors.work_experience_job_role_id);
    },
    async getMentorJobRoleTypes(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/admin/get-mentor-job-role-types',{params:{'filter[search]':query}});
        this.workExperienceAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectMentorJobRoleTypes() {
      this.update_work_experience_form.fields.work_experience_job_role_id = this.workExperienceAttributes.selected.value;
    },
    async updateWorkExperienceData() {
      try {
        this.mentor = this.update_work_experience_form.fields.mentor
        this.mentor_id = this.mentor.id
        let workExperience = await this.$axios.$put(`api/admin/update-mentor-work-experiences/${this.$route.params.id}`, this.update_work_experience_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push(`/admin/mentors/add-mentor/${this.mentor_id}/work-experiences`)
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_work_experience_form.errors = e.response.data.errors
        this.update_work_experience_form.error_message = e.response.data.message
      }
    },
    async reset() {
      this.mentors = (await this.$axios.$get(`/api/admin/mentor-work-experiences/${this.$route.params.id}`)).data
      this.update_work_experience_form.fields=this.mentors
      this.workExperienceAttributes.selected = this.workExperienceAttributes.data.find((x)=>x.value === this.mentors.work_experience_job_role_id);
    }
  },
}
</script>

<style scoped>

</style>
