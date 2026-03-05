<template>
  <div class="page page-center">
    <div class="container container-narrow">
<!--      <div class="text-center pt-5">-->
<!--        <a href="../../profile" class="navbar-brand navbar-brand-autodark text-primary">-->
<!--          Moxy-logo-->
<!--        </a>-->
<!--      </div>-->
      <!--      step 01 start-->
      <div v-if="educationStep">
        <div class="text-center pt-5"><a class="navbar-brand navbar-brand-autodark" href="."><img src="@/assets/moxy_logo_final.png" alt=""
                                                                                                  height="36"></a>
        </div>
        <!--      step 01 start-->
        <div class="card card-md mt-4">
          <div class="align-content-end">
            <ul class="steps steps-green steps-counter mt-4">
              <li class="step-item active"></li>
              <li class="step-item"></li>
            </ul>
          </div>
          <div class="ms-5 mx-5 ">
            <h2 class="card-title text-left">Step 01: Educational Details</h2>
            <div class="mt-3">
              <label
                :class="[create_education_form.errors.university_name ? 'text-danger' : '']"
                class="form-label">University Name</label>
              <input
                v-model="create_education_form.fields.university_name"
                :class="[create_education_form.errors.university_name ? 'is-invalid' : '']"
                autocomplete="off"
                placeholder="Enter University Name"
                class="form-control" type="text">
              <div v-if="create_education_form.errors.university_name" class="invalid-feedback">
                {{ create_education_form.errors.university_name[0] }}
              </div>
            </div>
            <div class="mt-3">
              <label
                :class="[create_education_form.errors.field_of_study ? 'text-danger' : '']"
                class="form-label">Course</label>
              <input
                v-model="create_education_form.fields.field_of_study"
                :class="[create_education_form.errors.field_of_study ? 'is-invalid' : '']"
                autocomplete="off"
                placeholder="Enter Course"
                class="form-control" type="text">
              <div v-if="create_education_form.errors.field_of_study" class="invalid-feedback">
                {{ create_education_form.errors.field_of_study[0] }}
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
                  :attributes="student_start_year_attributes"
                  placeholder="Enter Start Year"
                  @queryUpdates="getStudentStartYearList"
                  @selectUpdates="selectStudentStartYearList"
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
                  :attributes="student_end_year_attributes"
                  placeholder="Enter End Year"
                  @queryUpdates="getStudentEndYearList"
                  @selectUpdates="selectStudentEndYearList"
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
                  placeholder="Select City"
                  @queryUpdates="getCities"
                  @selectUpdates="selectCity"
                />
                <div v-if="create_education_form.errors.city_id" class="invalid-feedback">
                  {{ create_education_form.errors.city_id[0] }}
                </div>
              </div>
            </div>
<!--            <hr class="hr" style="margin:1.2rem 0" />-->
<!--            <h2 class="card-title text-left">Projects and Certifications</h2>-->
<!--            <div class="">-->
<!--              <div class="mt-3">-->
<!--                <label-->
<!--                  :class="[create_education_form.errors.project_title ? 'text-danger' : '']"-->
<!--                  class="form-label">Project Title</label>-->
<!--                <input-->
<!--                  v-model="create_education_form.fields.project_title"-->
<!--                  :class="[create_education_form.errors.project_title ? 'is-invalid' : '']"-->
<!--                  type="text" class="form-control" placeholder="Enter Project Title">-->
<!--                <div v-if="create_education_form.errors.project_title" class="invalid-feedback">-->
<!--                  {{ create_education_form.errors.project_title[0] }}-->
<!--                </div>-->
<!--                <label-->
<!--                  :class="[create_education_form.errors.project_links ? 'text-danger' : '']"-->
<!--                  class="form-label mt-2">Project Link</label>-->
<!--                <input-->
<!--                  v-model="create_education_form.fields.project_links"-->
<!--                  :class="[create_education_form.errors.project_links ? 'is-invalid' : '']"-->
<!--                  type="text" class="form-control" placeholder="Enter Project Link">-->
<!--                <div v-if="create_education_form.errors.project_links" class="invalid-feedback">-->
<!--                  {{ create_education_form.errors.project_links[0] }}-->
<!--                </div>-->
<!--              </div>-->
<!--              <label-->
<!--                :class="[create_education_form.errors.project_description ? 'text-danger' : '']"-->
<!--                class="form-label mt-2">Project Description</label>-->
<!--              <textarea-->
<!--                v-model="create_education_form.fields.project_description"-->
<!--                :class="[create_education_form.errors.project_description ? 'is-invalid' : '']"-->
<!--                type="text" class="form-control" placeholder="Enter Project Description">-->
<!--                  </textarea>-->
<!--              <div v-if="create_education_form.errors.project_description" class="invalid-feedback">-->
<!--                {{ create_education_form.errors.project_description[0] }}-->
<!--              </div>-->
<!--            </div>-->
          </div>
          <div class="ms-5 mx-5 mt-2 mb-4">
<!--            <label-->
<!--              :class="[create_education_form.errors.title ? 'text-danger' : '']"-->
<!--              class="form-label">Certification</label>-->
<!--            <input-->
<!--              v-model="create_education_form.fields.title"-->
<!--              :class="[create_education_form.errors.title ? 'is-invalid' : '']"-->
<!--              type="text" class="form-control" placeholder="Enter Certification Title">-->
<!--            <div v-if="create_education_form.errors.title" class="invalid-feedback">-->
<!--              {{ create_education_form.errors.title[0] }}-->
<!--            </div>-->
<!--            <label-->
<!--              :class="[create_education_form.errors.links ? 'text-danger' : '']"-->
<!--              class="form-label mt-2">Certification Link</label>-->
<!--            <textarea-->
<!--              v-model="create_education_form.fields.links"-->
<!--              :class="[create_education_form.errors.links ? 'is-invalid' : '']"-->
<!--              type="text" class="form-control" placeholder="Enter Certification Description">-->
<!--           </textarea>-->
<!--            <div v-if="create_education_form.errors.links" class="invalid-feedback">-->
<!--              {{ create_education_form.errors.links[0] }}-->
<!--            </div>-->
            <div class="form-footer text-end">
<!--              <button @click="skipHobbies()" class="btn btn-warning w-10">Skip</button>-->
              <button @click="educationDetailsSubmit()" class="btn btn-primary w-10">Next</button>
            </div>
          </div>
        </div>
      </div>
      <!--      step 02 end-->
      <!--      step 03 start-->
      <div v-if="skillsAndHobbiesStep">
        <div class="text-center pt-5"><a class="navbar-brand navbar-brand-autodark" href="."><img src="@/assets/moxy_logo_final.png" alt=""
                                                                                                  height="36"></a>
        </div>
        <div class="card card-md mt-4">
          <ul class="steps steps-green steps-counter mt-4">
            <li class="step-item"></li>
            <li class="step-item active"></li>
          </ul>
          <div class="ms-5 mx-5 mb-4">
            <h2 class="card-title text-left">Step 02: Skills and Hobbies</h2>
            <div class="mt-3 col-12">
              <div class="mt-3">
                <label
                  :class="[create_skill_form.errors.skill_ids ? 'text-danger' : '']"
                  class="form-label">Skills</label>
                <MultiSelect
                  :border_color_danger="create_skill_form.errors.skill_ids"
                  :class="[create_skill_form.errors.skill_ids ? 'is-invalid' : '']"
                  :attributes="skillAttributes"
                  placeholder="Select Skills"
                  @queryUpdates="getSkills"
                  @selectUpdates="selectStudentSkillList"
                />
                <div v-if="create_skill_form.errors.skill_ids" class="invalid-feedback">
                  {{ create_skill_form.errors.skill_ids[0] }}
                </div>
              </div>
            </div>
            <div class="mt-3 col-12">
              <div class="mt-3">
                <label
                  :class="[create_skill_form.errors.hobby_ids ? 'text-danger' : '']"
                  class="form-label">Hobby</label>
                <MultiSelect
                  :border_color_danger="create_skill_form.errors.hobby_ids"
                  :class="[create_skill_form.errors.hobby_ids ? 'is-invalid' : '']"
                  :attributes="hobbyAttributes"
                  placeholder="Select Hobbies"
                  @queryUpdates="getHobbies"
                  @selectUpdates="selectStudentHobbyList"
                />
                <div v-if="create_skill_form.errors.hobby_ids" class="invalid-feedback">
                  {{ create_skill_form.errors.hobby_ids[0] }}
                </div>
              </div>
            </div>
            <hr style="margin:1.2rem 0"/>
            <div class="">
              <h2 class="card-title text-left">Your Interest Fields</h2>
              <div class="mt-3 col-12">
                <div class="mt-3">
                  <label
                    :class="[create_skill_form.errors.job_type_ids ? 'text-danger' : '']"
                    class="form-label">Job Type</label>
                  <MultiSelect
                    :border_color_danger="create_skill_form.errors.job_type_ids"
                    :class="[create_skill_form.errors.job_type_ids ? 'is-invalid' : '']"
                    :attributes="jobTypeAttributes"
                    placeholder="Select Job Types"
                    @queryUpdates="getJobTypes"
                    @selectUpdates="selectStudentJobTypeList"
                  />
                  <div v-if="create_skill_form.errors.job_type_ids" class="invalid-feedback">
                    {{ create_skill_form.errors.job_type_ids[0] }}
                  </div>
                </div>
              </div>

              <div class="mt-3 col-12">
                <div class="mt-3">
                  <label
                    :class="[create_skill_form.errors.industry_type_ids ? 'text-danger' : '']"
                    class="form-label">Industries Type</label>
                  <MultiSelect
                    :border_color_danger="create_skill_form.errors.industry_type_ids"
                    :class="[create_skill_form.errors.industry_type_ids ? 'is-invalid' : '']"
                    :attributes="industryTypeAttributes"
                    placeholder="Select Industry Types"
                    @queryUpdates="getIndustryTypes"
                    @selectUpdates="selectStudentIndustryTypeList"
                  />
                  <div v-if="create_skill_form.errors.industry_type_ids" class="invalid-feedback">
                    {{ create_skill_form.errors.industry_type_ids[0] }}
                  </div>
                </div>
              </div>
            </div>
            <div class="form-footer text-end">
              <button @click="backHobbies()" class="btn btn-secondary w-10">Back</button>
<!--              <button @click="skip()" class="btn btn-warning w-10">Skip</button>-->
              <button @click="hobbiesDetailsSubmit()" class="btn btn-primary w-10">Finish</button>
            </div>
          </div>
        </div>
      </div>
      <!--      step 03 end-->
    </div>
  </div>
</template>

<script>
// import {student_year_list} from "@/constants/constants";
import {student_end_year_list, student_start_year_list} from "../../../../constants/constants";

export default {
  name: "student-steps",

  data() {
    return {
      student_end_year_list,
      student_start_year_list,
      educationStep: true,
      skillsAndHobbiesStep: false,
      cityAttributes: {
        data: [],
        selected: {}
      },
      skillAttributes: {
        data: [],
        selected: [{name: '', value: null}],
      },
      create_skill_form: {
        fields: {
          skill_ids:[],
          hobby_ids:[],
          job_type_ids:[],
          industry_type_ids:[],
        },
        error_message: '',
        errors: [],
      },
      student_start_year_attributes: {
        data: [],
        selected: {}
      },
      student_end_year_attributes: {
        data: [],
        selected: {}
      },
      create_education_form: {
        fields: {},
        error_message: '',
        errors: [],
      },
      hobbyAttributes: {
        data: [],
        selected: [{name: '', value: null}],
      },
      industryTypeAttributes: {
        data: [],
        selected: [{name: '', value: null}],
      },
      jobTypeAttributes: {
        data: [],
        selected: [{name: '', value: null}],
      },
    }
  },
  mounted() {
    this.getCities()
    this.getStudentStartYearList()
    this.getStudentEndYearList()
    this.getSkills()
    this.getHobbies()
    this.getIndustryTypes()
    this.getJobTypes()
  },
  methods: {
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
    async createEducationData() {
      try {
        let education = await this.$axios.$post(`/api/student/educations`, this.create_education_form.fields)
        await this.$router.back();

      } catch (e) {
        this.create_education_form.errors = e.response.data.errors
        this.create_education_form.error_message = e.response.data.message
      }
    },
    getStudentStartYearList() {
      this.student_start_year_attributes.data = this.student_start_year_list
    },
    getStudentEndYearList() {
      this.student_end_year_attributes.data = this.student_end_year_list
    },
    selectStudentStartYearList() {
      this.create_education_form.fields.start_year = this.student_start_year_attributes.selected.value;
    },
    selectStudentEndYearList() {
      this.create_education_form.fields.end_year = this.student_end_year_attributes.selected.value;
    },
    async getSkills(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/student/skills', {params: {'filter[search]': query}});
        this.skillAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectStudentSkillList(id) {
      this.create_skill_form.fields.skill_ids.push(id)
    },
    async getHobbies(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/student/hobbies', {params: {'filter[search]': query}});
        this.hobbyAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectStudentHobbyList(id) {
      this.create_skill_form.fields.hobby_ids.push(id)
    },
    async getIndustryTypes(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/student/industry-types', {params: {'filter[search]': query}});
        this.industryTypeAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectStudentIndustryTypeList(id) {
      this.create_skill_form.fields.industry_type_ids.push(id)
    },
    async getJobTypes(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/student/job-types', {params: {'filter[search]': query}});
        this.jobTypeAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectStudentJobTypeList(id) {
      this.create_skill_form.fields.job_type_ids.push(id)
    },
    async educationDetailsSubmit() {
      try {
        await this.$axios.$post('/api/student/educations', this.create_education_form.fields);
        this.educationStep = false
        this.skillsAndHobbiesStep = true
      } catch (error) {
        this.create_education_form.errors = error.response.data.errors
        this.create_education_form.message = error.response.data.message
        this.educationStep = true
        this.skillsAndHobbiesStep = false
      }
    },
    async hobbiesDetailsSubmit() {
      try {
        await this.$axios.$post('/api/student/hobbies', this.create_skill_form.fields);
        await this.$router.push('/user/dashboard')
      } catch (error) {
        this.create_skill_form.errors = error.response.data.errors
        this.create_skill_form.message = error.response.data.message
      }
    },
    skipHobbies() {
      this.educationStep = false
      this.skillsAndHobbiesStep = true
    },
    backHobbies(){
      this.educationStep = true
      this.skillsAndHobbiesStep = false
    },
    skip() {
        this.$router.push('/user/dashboard')
    },
  }
}
</script>

<style scoped>
.steps-counter{
  width: 75%;
  margin: 2rem auto;
}
</style>
