<template>
  <div class="page page-center">
    <div class="container container-narrow">
<!--      <div class="text-center pt-5">-->
<!--        <a href="../../profile" class="navbar-brand navbar-brand-autodark text-primary">-->
<!--          Moxy-logo-->
<!--        </a>-->
<!--      </div>-->
      <!--      step 01 start-->
      <div>
        <div class="text-center pt-5"><a class="navbar-brand navbar-brand-autodark" href="."><img src="@/assets/moxy_logo_final.png" alt=""
                                                                                                  height="36"></a>
        </div>
        <!--      step 02 start-->
        <div class="card card-md mt-4">
          <div class="align-content-end">
            <ul class="steps steps-counter mt-4">
              <li class="step-item active">Educational Details</li>
              <li class="step-item">Career Interests & Hobbies</li>
            </ul>
          </div>
          <div class="mx-5">
          <div class="ms-5 mx-5 ">
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
              <div class="mt-3 col-12">
                <div class="mt-0">
                  <label
                    :class="[create_education_form.errors.field_of_study_id ? 'text-danger' : '']"
                    class="form-label">Field of Study</label>
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
            </div>
            <div class="row">
              <div class="col-12 mt-3">
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
              <div class="mt-3 col-12">
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
            <div class="row">
              <div class="mt-3 col-6">
                <label
                  :class="[create_education_form.errors.start_year ? 'text-danger' : '']"
                  class="form-label">Start Year</label>
                <Select
                  :border_color_danger="create_education_form.errors.start_year"
                  :class="[create_education_form.errors.start_year ? 'is-invalid' : '']"
                  :attributes="studentStartYearAttributes"
                  placeholder="Select start year"
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
                  placeholder="Select end year"
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
          </div>
          <div class="ms-5 mx-5 mt-2 mb-4">
            <div class="form-footer text-end">
              <button @click="educationDetailsSubmit()" class="btn btn-primary w-100">Next</button>
            </div>
          </div>
          </div>
        </div>
      </div>
      <!--      step 02 end-->
    </div>
  </div>
</template>

<script>
import {student_end_year_list, student_start_year_list} from "../../../../constants/constants";

export default {
  name: "education-steps",

  data() {
    return {
      selectComponentKey:1,
      student_end_year_list,
      student_start_year_list,
      cityAttributes: {
        data: [],
        selected: {}
      },
      studyFieldTypeAttributes:{
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
      create_education_form: {
        fields: {
          university_name:'',
          field_of_study_id:'',
          course_name:'',
          start_year:'',
          end_year:'',
          city_id:'',
        },
        error_message: '',
        errors: [
          {
            start_year:'',
            field_of_study_id: [],
          },
        ],
      },
    }
  },
  mounted() {
    this.getCities()
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
    selectCity() {
      this.create_education_form.fields.city_id = this.cityAttributes.selected.value;
    },
    async getCities(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/student/cities', {params: {'filter[search]': query}});
        this.cityAttributes.data = attributes.data.map((x) => ({
          name: `${x.name} - ${x.country.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    async educationDetailsSubmit() {
      try {
        await this.$axios.$post('/api/student/educations', this.create_education_form.fields);
        this.$router.push('/user/auth/registration/skill-steps')
      } catch (error) {
        this.create_education_form.errors = error.response.data.errors
        this.create_education_form.message = error.response.data.message
        this.educationStep = true
        this.skillsAndHobbiesStep = false
      }
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
  }
}
</script>

<style scoped>
.steps-counter{
  width: 75%;
  margin: 2rem auto;
}
.steps
.step-item.active:before {
  color: inherit;
  border-color: #877aef;
}
</style>
