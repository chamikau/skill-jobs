<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="createEducationData" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Add Educational Details</h5>
            </div>
            <div class="card-body">
              <div class="mt-3">
                <label
                  :class="[create_education_form.errors.university_name ? 'text-danger' : '']"
                  class="form-label">University Name</label>
                <input
                  v-model="create_education_form.fields.university_name"
                  :class="[create_education_form.errors.university_name ? 'is-invalid' : '']"
                  autocomplete="off"
                  placeholder="Enter university name"
                  class="form-control" type="text"
                  @input="clearValidationUniversityNameError">
                <div v-if="create_education_form.errors.university_name" class="invalid-feedback">
                  {{ create_education_form.errors.university_name[0] }}
                </div>
              </div>
              <div class="row">
                <div class="mt-3 col-6">
                  <div class="mt-0">
                    <label
                      :class="[create_education_form.errors.field_of_study_id ? 'text-danger' : '']"
                      class="form-label">Study Field Type</label>
                    <Select
                      :attributes="studyFieldTypeAttributes"
                      :border_color_danger="create_education_form.errors.field_of_study_id"
                      :class="[create_education_form.errors.field_of_study_id ? 'is-invalid' : '']" autocomplete="off"
                      placeholder="Select study field type"
                      @queryUpdates="getStudyFieldType"
                      @selectUpdates="selectStudyFieldType"
                      @input="clearValidationStudyFieldError"
                      :key="selectComponentKey"
                    />
                    <div v-if="create_education_form.errors.field_of_study_id" class="invalid-feedback">
                      {{ create_education_form.errors.field_of_study_id[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <label
                    :class="[create_education_form.errors.course_name ? 'text-danger' : '']"
                    class="form-label">Course</label>
                  <input
                    v-model="create_education_form.fields.course_name"
                    :class="[create_education_form.errors.course_name ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter course"
                    class="form-control" type="text"
                    @input="clearValidationCourseNameError">
                  <div v-if="create_education_form.errors.course_name" class="invalid-feedback">
                    {{ create_education_form.errors.course_name[0] }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="mt-3 col-6">
                  <label
                    :class="[create_education_form.errors.start_year ? 'text-danger' : '']"
                    class="form-label">Start Year</label>
                  <Select
                    :border_color_danger="create_education_form.errors.start_year"
                    :class="[create_education_form.errors.start_year ? 'is-invalid' : '']"
                    :attributes="studentStartYearAttributes"
                    placeholder="Enter start year"
                    @queryUpdates="getStudentStartYearList"
                    @selectUpdates="selectStudentStartYearList"
                    @input="clearValidationStartYearError"
                    :key="selectComponentKey"
                  >
                  </Select>
                  <div v-if="create_education_form.errors.start_year" class="invalid-feedback">
                    {{ create_education_form.errors.start_year[0] }}
                  </div>
                </div>
                <div class="mt-3 col-6">
                  <label
                    :class="[create_education_form.errors.end_year ? 'text-danger' : '']"
                    class="form-label">End Year</label>
                  <Select
                    :border_color_danger="create_education_form.errors.end_year"
                    :class="[create_education_form.errors.end_year ? 'is-invalid' : '']"
                    :attributes="studentEndYearAttributes"
                    placeholder="Enter end year"
                    @queryUpdates="getStudentEndYearList"
                    @selectUpdates="selectStudentEndYearList"
                    @input="clearValidationEndYearError"
                    :key="selectComponentKey"
                  >
                  </Select>
                  <div v-if="create_education_form.errors.end_year" class="invalid-feedback">
                    {{ create_education_form.errors.end_year[0] }}
                  </div>
                </div>
              </div>
              <div class="mt-3 col-6">
                <div class="mt-0">
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
import {student_start_year_list , student_end_year_list} from "@/constants/constants";
export default {
  name: "general",
  data() {
    return {
      selectComponentKey:1,
      student_end_year_list,
      student_start_year_list,
      location_type_attributes: {
        data: [],
        selected: {}
      },
      job: "",
      jobs_list: "",
      cityAttributes: {
        data: [],
        selected: {}
      },
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
      studentStartYearAttributes: {
        data: [],
        selected: {}
      },
      studentEndYearAttributes: {
        data: [],
        selected: {}
      },
      studyFieldTypeAttributes: {
        data: [],
        selected: {}
      },
    }
  },
  async mounted() {
    await this.getCities()
    this.getStudentStartYearList()
    this.getStudentEndYearList()
    this.getStudyFieldType()
  },
  methods: {
    clearValidationUniversityNameError() {
      this.create_education_form.errors.university_name = false;
    },
    clearValidationStudyFieldError() {
      this.create_education_form.errors.field_of_study_id = false;
      this.selectComponentKey++
    },
    clearValidationCourseNameError() {
      this.create_education_form.errors.course_name = false;
    },
    clearValidationStartYearError() {
      this.create_education_form.errors.start_year = false;
      this.selectComponentKey++
    },
    clearValidationEndYearError() {
      this.create_education_form.errors.end_year = false;
      this.selectComponentKey++
    },
    clearValidationCityError() {
      this.create_education_form.errors.city_id = false;
      this.selectComponentKey++
    },
    selectStudyFieldType() {
      this.create_education_form.fields.field_of_study_id = this.studyFieldTypeAttributes.selected.value;
    },
    async getStudyFieldType(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/student/field-of-study-types', {params: {'filter[search]': query}});
        this.studyFieldTypeAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    async createEducationData() {
      try {
        let education = await this.$axios.$post(`api/student/educations`, this.create_education_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.back();
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_education_form.errors = e.response.data.errors
        this.create_education_form.error_message = e.response.data.message
      }
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
    getStudentStartYearList() {
      this.studentStartYearAttributes.data = this.student_start_year_list
      this.getStudentEndYearList();
    },
    getStudentEndYearList() {
      const startYear = parseInt(this.create_education_form.fields.start_year);
      const selectedEndYear = this.create_education_form.fields.end_year;

      this.studentEndYearAttributes.data = this.student_end_year_list.map(year => {
        const yearValue = parseInt(year.value);
        return {
          ...year,
          selected: yearValue === parseInt(selectedEndYear),
        };
      }).filter(year => parseInt(year.value) >= startYear);
    },
    selectStudentStartYearList() {
      this.create_education_form.fields.start_year = this.studentStartYearAttributes.selected.value;
      const selectedEndYear = this.create_education_form.fields.end_year;
      this.studentEndYearAttributes.selected.name = null;
      this.studentEndYearAttributes.selected.value = selectedEndYear;
    },
    selectStudentEndYearList() {
      this.create_education_form.fields.end_year = this.studentEndYearAttributes.selected.value;
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
      this.create_education_form.errors.university_name = false;
      this.create_education_form.errors.field_of_study_id = false;
      this.create_education_form.errors.course_name = false;
      this.create_education_form.errors.start_year = false;
      this.create_education_form.errors.end_year = false;
      this.create_education_form.errors.city_id = false;
      this.create_education_form.fields = ""
      this.student_year_attributes.selected = {}
      this.cityAttributes.selected = {}
    }
  },
}
</script>

<style scoped>

</style>
