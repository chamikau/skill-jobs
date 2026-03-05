<template>
  <div>
    <div class="">
      <div class="card">
        <div>
            <div class="card-header">
              <h5 class="card-title">Educational Details</h5>
            </div>
            <div class="card-body">
              <div class="mt-3">
                <label
                  class="form-label">University Name</label>
                <input
                  v-model="view_education_form.fields.university_name"
                  autocomplete="off"
                  placeholder="Enter university name"
                  class="form-control" type="text"
                  disabled>
              </div>
              <div class="row">
                <div class="mt-3 col-6">
                  <div class="mt-0">
                    <label
                      class="form-label">Study Field Type</label>
                    <SelectDisabled
                      :attributes="studyFieldTypeAttributes"
                      placeholder="Select study field type"
                      @queryUpdates="getStudyFieldType"
                    />
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <label
                    class="form-label">Course</label>
                  <input
                    v-model="view_education_form.fields.course_name"
                    autocomplete="off"
                    placeholder="Enter course"
                    class="form-control" type="text"
                    disabled>
                </div>
              </div>

              <div class="row">
                <div class="mt-3 col-6">
                  <label
                    class="form-label">Start Year</label>
                  <SelectDisabled
                    :attributes="studentStartYearAttributes"
                    placeholder="Enter start year"
                    @queryUpdates="getStudentStartYearList"
                  >
                  </SelectDisabled>
                </div>
                <div class="mt-3 col-6">
                  <label
                    class="form-label">End Year</label>
                  <SelectDisabled
                    :attributes="studentEndYearAttributes"
                    placeholder="Enter end year"
                    @queryUpdates="getStudentEndYearList"
                  >
                  </SelectDisabled>
                </div>
              </div>
              <div class="mt-3 col-6">
                <div class="mt-0">
                  <label
                    class="form-label">City</label>
                  <SelectDisabled
                    :attributes="cityAttributes"
                    placeholder="Select city"
                    @queryUpdates="getCities"
                  />
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {student_end_year_list, student_start_year_list} from "@/constants/constants";
export default {
  name: "general",
  data() {
    return {
      selectComponentKey:1,
      student_end_year_list,
      student_start_year_list,
      job: "",
      jobs_list: "",
      cityAttributes: {
        data: [],
        selected: {}
      },
      studyFieldTypeAttributes: {
        data: [],
        selected: {}
      },
      view_education_form: {
        fields: {},
        error_message: '',
        errors: [],
      },
      studentStartYearAttributes: {
        data: [],
        selected: {
          name:""
        }
      },
      studentEndYearAttributes: {
        data: [],
        selected: {
          name:""
        }
      },
    }
  },
  async mounted() {
    await this.getCities()
    this.getStudentStartYearList()
    this.getStudentEndYearList()
    this.getEducationData()
    this.getStudyFieldType()
  },
  methods: {
    async getStudyFieldType(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/admin/field-of-study-types', {params: {'filter[search]': query}});
        this.studyFieldTypeAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    async getEducationData() {
      this.education = (await this.$axios.$get(`api/admin/educations/${this.$route.params.id}`)).data
      this.view_education_form.fields = this.education
      this.cityAttributes.selected = this.cityAttributes.data.find((x)=>x.value === this.education.city_id);
      this.studyFieldTypeAttributes.selected.name = this.education.field_of_study_types.name;
      this.studentStartYearAttributes.selected['name'] =  this.education.start_year;
      this.studentEndYearAttributes.selected['name'] = this.education.end_year ;
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
    getStudentStartYearList() {
      this.studentStartYearAttributes.data = this.student_start_year_list.map((x) => ({
        name: `${x.name}`
      }));
      this.getStudentEndYearList();
    },
    getStudentEndYearList() {
      this.studentEndYearAttributes.data = this.student_end_year_list
    },
  },
}
</script>

<style scoped>

</style>
