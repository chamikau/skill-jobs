<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="createWorkExperienceData(mentors_id = mentors.id)" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Add Work Experience</h5>
            </div>
            <div class="card-body">
              <div class="mt-3">
                <div class="col-6 mt-3">
                  <label
                    :class="[create_work_experience_form.errors.name ? 'text-danger' : '']"
                    class="form-label">Company Name</label>
                  <input
                    v-model="create_work_experience_form.fields.name"
                    :class="[create_work_experience_form.errors.name ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter work company name"
                    class="form-control" type="text"
                    @input="clearValidationNameError">
                  <div v-if="create_work_experience_form.errors.name" class="invalid-feedback">
                    {{ create_work_experience_form.errors.name[0] }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 mt-3">
                  <label
                    :class="[create_work_experience_form.errors.start_date ? 'text-danger' : '']"
                    class="form-label">Start Date</label>
                  <input
                    v-model="create_work_experience_form.fields.start_date"
                    :class="[create_work_experience_form.errors.start_date ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter duration"
                    class="form-control" type="date"
                    @input="clearValidationStartDateError">
                  <div v-if="create_work_experience_form.errors.start_date" class="invalid-feedback">
                    {{ create_work_experience_form.errors.start_date[0] }}
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <label
                    :class="[create_work_experience_form.errors.end_date ? 'text-danger' : '']"
                    class="form-label">End Date</label>
                  <input
                    v-model="create_work_experience_form.fields.end_date"
                    :class="[create_work_experience_form.errors.end_date ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter duration"
                    class="form-control" type="date"
                    @input="clearValidationEndDateError">
                  <div v-if="create_work_experience_form.errors.end_date" class="invalid-feedback">
                    {{ create_work_experience_form.errors.end_date[0] }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="mt-3 col-6">
                  <label
                    :class="[create_work_experience_form.errors.work_experience_job_role_id ? 'text-danger' : '']"
                    class="form-label">Job Type</label>
                  <Select
                    :attributes="workExperienceAttributes"
                    :border_color_danger="create_work_experience_form.errors.work_experience_job_role_id"
                    :class="[create_work_experience_form.errors.work_experience_job_role_id ? 'is-invalid' : '']" autocomplete="off"
                    placeholder="Select job type"
                    @queryUpdates="getMentorJobRoleTypes"
                    @selectUpdates="selectMentorJobRoleTypes"
                    @input="clearValidationJobRoleError"
                    :key="selectComponentKey"
                  />
                  <div v-if="create_work_experience_form.errors.work_experience_job_role_id" class="invalid-feedback">
                    {{ create_work_experience_form.errors.work_experience_job_role_id[0] }}
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <label
                    :class="[create_work_experience_form.errors.description ? 'text-danger' : '']"
                    class="form-label">Description</label>
                  <textarea
                    v-model="create_work_experience_form.fields.description"
                    :class="[create_work_experience_form.errors.description ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter description"
                    class="form-control" type="text"
                    @input="clearValidationDescriptionError">
                  </textarea>
                  <div v-if="create_work_experience_form.errors.description" class="invalid-feedback">
                    {{ create_work_experience_form.errors.description[0] }}
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
      selectComponentKey:1,
      mentors:"",
      create_work_experience_form: {
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
      this.create_work_experience_form.errors.name = false;
    },
    clearValidationJobRoleError() {
      this.create_work_experience_form.errors.work_experience_job_role_id = false;
      this.selectComponentKey++
    },
    clearValidationCourseNameError() {
      this.create_work_experience_form.errors.course_name = false;
    },
    clearValidationDescriptionError() {
      this.create_work_experience_form.errors.description = false;
    },
    clearValidationStartDateError() {
      this.create_work_experience_form.errors.start_date = false;
    },
    clearValidationEndDateError() {
      this.create_work_experience_form.errors.end_date = false;
    },
    async getMentors() {
      this.mentors = (await this.$axios.$get(`/api/admin/mentors/${this.$route.params.id}`)).data
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
      this.create_work_experience_form.fields.work_experience_job_role_id = this.workExperienceAttributes.selected.value;
    },
    async createWorkExperienceData(mentor_id) {
      try {
        this.mentor_id = mentor_id
        this.create_work_experience_form.fields.mentor_id = this.mentor_id;
        let workExperience = await this.$axios.$post(`api/admin/mentor-work-experiences`, this.create_work_experience_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push(`/admin/mentors/edit-mentor/${mentor_id}/work-experiences`)
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_work_experience_form.errors = e.response.data.errors
        this.create_work_experience_form.error_message = e.response.data.message
      }
    },

    async reset() {
        this.create_work_experience_form.fields = ""
        this.create_work_experience_form.errors = {}
        this.workExperienceAttributes.selected = {}
    }
  },
}
</script>

<style scoped>

</style>
