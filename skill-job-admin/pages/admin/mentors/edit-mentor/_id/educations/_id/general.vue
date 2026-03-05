<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="createEducationData()" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Edit Educational Details</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <label
                    :class="[update_education_form.errors.university_name ? 'text-danger' : '']"
                    class="form-label">University Name</label>
                  <input
                    v-model="update_education_form.fields.university_name"
                    :class="[update_education_form.errors.university_name ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter university name"
                    class="form-control" type="text"
                    @input="clearValidationNameError">
                  <div v-if="update_education_form.errors.university_name" class="invalid-feedback">
                    {{ update_education_form.errors.university_name[0] }}
                  </div>
                </div>
                <div class="col-6">
                  <label
                    :class="[update_education_form.errors.course_name ? 'text-danger' : '']"
                    class="form-label">Course Name</label>
                  <input
                    v-model="update_education_form.fields.course_name"
                    :class="[update_education_form.errors.course_name ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter course name"
                    class="form-control" type="text"
                    @input="clearValidationCourseNameError">
                  <div v-if="update_education_form.errors.course_name" class="invalid-feedback">
                    {{ update_education_form.errors.course_name[0] }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="mt-3">
                    <label
                      :class="[update_education_form.errors.city_id ? 'text-danger' : '']"
                      class="form-label">City</label>
                    <Select
                      :attributes="cityAttributes"
                      :border_color_danger="update_education_form.errors.city_id"
                      :class="[update_education_form.errors.city_id ? 'is-invalid' : '']" autocomplete="off"
                      placeholder="Select city"
                      @queryUpdates="getCities"
                      @selectUpdates="selectCity"
                      @input="clearValidationCityError"
                      :key="selectComponentKey"
                    />
                    <div v-if="update_education_form.errors.city_id" class="invalid-feedback">
                      {{ update_education_form.errors.city_id[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="mt-3">
                    <label
                      :class="[update_education_form.errors.field_of_study_id ? 'text-danger' : '']"
                      class="form-label">Field of Study Type</label>
                    <Select
                      :attributes="fieldOfStudyTypeAttributes"
                      :border_color_danger="update_education_form.errors.field_of_study_id"
                      :class="[update_education_form.errors.field_of_study_id ? 'is-invalid' : '']" autocomplete="off"
                      placeholder="Select study type"
                      @queryUpdates="getFieldOfStudies"
                      @selectUpdates="selectFieldOfStudy"
                      @input="clearValidationFieldOfStudyError"
                      :key="selectComponentKey"
                    />
                    <div v-if="update_education_form.errors.field_of_study_id" class="invalid-feedback">
                      {{ update_education_form.errors.field_of_study_id[0] }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-6 mt-3">
                  <label
                    :class="[update_education_form.errors.start_year ? 'text-danger' : '']"
                    class="form-label">Start Date</label>
                  <input
                    v-model="update_education_form.fields.start_year"
                    :class="[update_education_form.errors.start_year ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter description"
                    class="form-control" type="date"
                    @input="clearValidationStartYearError">
                  <div v-if="update_education_form.errors.start_year" class="invalid-feedback">
                    {{ update_education_form.errors.start_year[0] }}
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <label
                    :class="[update_education_form.errors.end_year ? 'text-danger' : '']"
                    class="form-label">End Date</label>
                  <input
                    v-model="update_education_form.fields.end_year"
                    :class="[update_education_form.errors.end_year ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter end"
                    class="form-control" type="date"
                    @input="clearValidationEndYearError">
                  <div v-if="update_education_form.errors.end_year" class="invalid-feedback">
                    {{ update_education_form.errors.end_year[0] }}
                  </div>
                </div>
              </div>
              <div class="card-footer text-end">
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
      update_education_form: {
        fields: {},
        error_message: '',
        errors: []
      },
      fieldOfStudyTypeAttributes: {
        data: [],
        selected: {}
      },
      cityAttributes: {
        data: [],
        selected: {}
      },
    }
  },
  mounted() {
    this.getCities()
    this.getFieldOfStudies()
    this.getEducations()
  },
  methods: {
    clearValidationNameError() {
      this.update_education_form.errors.university_name = false;
    },
    clearValidationSessionTypeError() {
      this.update_education_form.errors.session_type_id = false;
    },
    clearValidationCourseNameError() {
      this.update_education_form.errors.course_name = false;
    },
    clearValidationCityError() {
      this.update_education_form.errors.city_id = false;
      this.selectComponentKey++
    },
    clearValidationFieldOfStudyError() {
      this.update_education_form.errors.field_of_study_id = false;
      this.selectComponentKey++
    },
    clearValidationStartYearError() {
      this.update_education_form.errors.start_year = false;
    },
    clearValidationEndYearError() {
      this.update_education_form.errors.end_year = false;
    },
    async getEducations() {
      this.education = (await this.$axios.$get(`/api/admin/mentor-educations/${this.$route.params.id}`)).data
      this.update_education_form.fields = this.education
      this.cityAttributes.selected = this.cityAttributes.data.find((x)=>x.value === this.education.city_id)
      this.fieldOfStudyTypeAttributes.selected = this.fieldOfStudyTypeAttributes.data.find((x)=>x.value === this.education.field_of_study_id);
    },
    async getCities(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/admin/cities',{params:{'filter[search]':query}});
        this.cityAttributes.data = attributes.data.map((x) => ({
          name: `${x.name} - ${x.country.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectCity() {
      this.update_education_form.fields.city_id = this.cityAttributes.selected.value;
    },
    async getFieldOfStudies(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/admin/field-of-study-types',{params:{'filter[search]':query}});
        this.fieldOfStudyTypeAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectFieldOfStudy() {
      this.update_education_form.fields.field_of_study_id = this.cityAttributes.selected.value;
    },
    async createEducationData() {
      try {
        this.mentor = this.update_education_form.fields.mentor
        this.mentor_id = this.mentor.id
        let education = await this.$axios.$put(`api/admin/update-mentor-educations/${this.$route.params.id}`, this.update_education_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push(`/admin/mentors/edit-mentor/${this.mentor_id}/educations`)
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_education_form.errors = e.response.data.errors
        this.update_education_form.error_message = e.response.data.message
      }
    },

    async reset() {
      this.education = (await this.$axios.$get(`/api/admin/mentor-educations/${this.$route.params.id}`)).data
      this.update_education_form.fields = this.education
      this.cityAttributes.selected = this.cityAttributes.data.find((x)=>x.value === this.education.city_id)
      this.fieldOfStudyTypeAttributes.selected = this.fieldOfStudyTypeAttributes.data.find((x)=>x.value === this.education.field_of_study_id);

    }
  },
}
</script>

<style scoped>

</style>
