<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="createEducationData(mentors_id = mentors.id)" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Add Educational Details</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <label
                    :class="[create_education_form.errors.university_name ? 'text-danger' : '']"
                    class="form-label">University Name</label>
                  <input
                    v-model="create_education_form.fields.university_name"
                    :class="[create_education_form.errors.university_name ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter university name"
                    class="form-control" type="text"
                    @input="clearValidationNameError">
                  <div v-if="create_education_form.errors.university_name" class="invalid-feedback">
                    {{ create_education_form.errors.university_name[0] }}
                  </div>
                </div>
                <div class="col-6">
                  <label
                    :class="[create_education_form.errors.course_name ? 'text-danger' : '']"
                    class="form-label">Course Name</label>
                  <input
                    v-model="create_education_form.fields.course_name"
                    :class="[create_education_form.errors.course_name ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter course name"
                    class="form-control" type="text"
                    @input="clearValidationCourseNameError">
                  <div v-if="create_education_form.errors.course_name" class="invalid-feedback">
                    {{ create_education_form.errors.course_name[0] }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="mt-3">
                    <label
                      :class="[create_education_form.errors.city_id ? 'text-danger' : '']"
                      class="form-label">City</label>
                    <Select
                      :attributes="cityAttributes"
                      :border_color_danger="create_education_form.errors.city_id"
                      :class="[create_education_form.errors.city_id ? 'is-invalid' : '']" autocomplete="off"
                      placeholder="Select city"
                      @queryUpdates="getCities"
                      @selectUpdates="selectCity"
                      @input="clearValidationCityError"
                      :key="selectComponentKey"
                    />
                    <div v-if="create_education_form.errors.city_id" class="invalid-feedback">
                      {{ create_education_form.errors.city_id[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="mt-3">
                    <label
                      :class="[create_education_form.errors.field_of_study_id ? 'text-danger' : '']"
                      class="form-label">Field of Study Type</label>
                    <Select
                      :attributes="fieldOfStudyTypeAttributes"
                      :border_color_danger="create_education_form.errors.field_of_study_id"
                      :class="[create_education_form.errors.field_of_study_id ? 'is-invalid' : '']" autocomplete="off"
                      placeholder="Select study type"
                      @queryUpdates="getFieldOfStudies"
                      @selectUpdates="selectFieldOfStudy"
                      @input="clearValidationFieldOfStudyError"
                      :key="selectComponentKey"
                    />
                    <div v-if="create_education_form.errors.field_of_study_id" class="invalid-feedback">
                      {{ create_education_form.errors.field_of_study_id[0] }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-6 mt-3">
                  <label
                    :class="[create_education_form.errors.start_year ? 'text-danger' : '']"
                    class="form-label">Start Date</label>
                  <input
                    v-model="create_education_form.fields.start_year"
                    :class="[create_education_form.errors.start_year ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter description"
                    class="form-control" type="date"
                    @input="clearValidationStartYearError">
                  <div v-if="create_education_form.errors.start_year" class="invalid-feedback">
                    {{ create_education_form.errors.start_year[0] }}
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <label
                    :class="[create_education_form.errors.end_year ? 'text-danger' : '']"
                    class="form-label">End Date</label>
                  <input
                    v-model="create_education_form.fields.end_year"
                    :class="[create_education_form.errors.end_year ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter end"
                    class="form-control" type="date"
                    @input="clearValidationEndYearError">
                  <div v-if="create_education_form.errors.end_year" class="invalid-feedback">
                    {{ create_education_form.errors.end_year[0] }}
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
      create_education_form: {
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
    this.getMentors()
  },
  methods: {
    clearValidationNameError() {
      this.create_education_form.errors.university_name = false;
    },
    clearValidationSessionTypeError() {
      this.create_education_form.errors.session_type_id = false;
    },
    clearValidationCourseNameError() {
      this.create_education_form.errors.course_name = false;
    },
    clearValidationCityError() {
      this.create_education_form.errors.city_id = false;
      this.selectComponentKey++
    },
    clearValidationFieldOfStudyError() {
      this.create_education_form.errors.field_of_study_id = false;
      this.selectComponentKey++
    },
    clearValidationStartYearError() {
      this.create_education_form.errors.start_year = false;
    },
    clearValidationEndYearError() {
      this.create_education_form.errors.end_year = false;
    },
    async getMentors() {
      this.mentors = (await this.$axios.$get(`/api/admin/mentors/${this.$route.params.id}`)).data
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
      this.create_education_form.fields.city_id = this.cityAttributes.selected.value;
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
      this.create_education_form.fields.field_of_study_id = this.fieldOfStudyTypeAttributes.selected.value;
    },
    async createEducationData(mentor_id) {
      try {
        this.mentor_id = mentor_id
        this.create_education_form.fields.mentor_id = this.mentor_id;
        let education = await this.$axios.$post(`api/admin/mentor-educations`, this.create_education_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push(`/admin/mentors/edit-mentor/${mentor_id}/educations`)
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_education_form.errors = e.response.data.errors
        this.create_education_form.error_message = e.response.data.message
      }
    },

    inputUpdates(values) {
      this.attributes.table_component_values = values;
      this.getJobs(values.page, values.sort.sort_input, values.search, values.per_page)
    },
    filterUpdates() {
      const values = this.attributes.table_component_values
      this.getJobs(1, values.sort.sort_input, values.search, values.per_page)
    },
    filterClear() {
      this.attributes.filters = {}
      this.filterUpdates()
    },
    async reset() {
        this.create_education_form.fields = ""
      this.create_education_form.errors = {}
      this.cityAttributes.selected = {}
      this.fieldOfStudyTypeAttributes.selected = {}
    }
  },
}
</script>

<style scoped>

</style>
