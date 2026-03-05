<template>
  <div class="page page-center">
    <div class="container container-narrow">
      <!--      step 03 start-->
      <div>
        <div class="text-center pt-5"><a class="navbar-brand navbar-brand-autodark" href="."><img src="@/assets/moxy_logo_final.png" alt=""
                                                                                                  height="36"></a>
        </div>
        <div class="card card-md mt-4">
          <ul class="steps steps-counter">
            <li class="step-item">Educational Details</li>
            <li class="step-item active">Career Interests & Hobbies</li>
          </ul>
          <div class="ms-5 mx-5 mb-4">
            <div class="mx-5">
              <div class="row">
                <div class="col-md-12">
                  <div class="">
                    <label
                      :class="[create_skill_form.errors.student_goal ? 'text-danger' : '']"
                      class="form-text mb-3">Tell us what your future goal is?</label>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label"
                             :class="[create_skill_form.errors.student_goal ? 'text-danger' : '']">I want to</label>
                      <div class="col-md-10">
                        <SelectNoneBorder
                          :attributes="studentGoalAttributes"
                          :class="[create_skill_form.errors.student_goal ? 'is-invalid' : '']"
                          autocomplete="off"
                          placeholder="become a ui/ux designer"
                          @queryUpdates="getGoalList"
                          @selectUpdates="selectGoalList"
                          :key="selectComponentKey">
                        </SelectNoneBorder>
                        <div v-if="create_skill_form.errors.student_goal" class="invalid-feedback">
                          {{ create_skill_form.errors.student_goal[0] }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="mt-4">
                    <label
                      :class="[create_skill_form.errors.skill_ids ? 'text-danger' : '']"
                      class="form-label">Your Skills</label>
                    <MultiSelect
                      :border_color_danger="create_skill_form.errors.skill_ids"
                      :class="[create_skill_form.errors.skill_ids ? 'is-invalid' : '']"
                      :attributes="skillAttributes"
                      placeholder="Select your skills"
                      @queryUpdates="getSkills"
                      @selectUpdates="selectStudentSkillList"
                    />
                    <div v-if="create_skill_form.errors.skill_ids" class="invalid-feedback">
                      {{ create_skill_form.errors.skill_ids[0] }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="mt-3">
                    <label
                      :class="[create_skill_form.errors.hobby_ids ? 'text-danger' : '']"
                      class="form-label">Your Interests</label>
                    <MultiSelect
                      :border_color_danger="create_skill_form.errors.hobby_ids"
                      :class="[create_skill_form.errors.hobby_ids ? 'is-invalid' : '']"
                      :attributes="hobbyAttributes"
                      placeholder="Select your interests"
                      @queryUpdates="getHobbies"
                      @selectUpdates="selectStudentHobbyList"
                    />
                    <div v-if="create_skill_form.errors.hobby_ids" class="invalid-feedback">
                      {{ create_skill_form.errors.hobby_ids[0] }}
                    </div>
                  </div>
                </div>
              </div>
<!--            <hr style="margin:1.2rem 0"/>-->
<!--            <div class="">-->
<!--              <h2 class="card-title text-left">Your Interest Fields</h2>-->
<!--              <div class="mt-3 col-12">-->
<!--                <div class="mt-3">-->
<!--                  <label-->
<!--                    :class="[create_skill_form.errors.job_type_ids ? 'text-danger' : '']"-->
<!--                    class="form-label">Job Type</label>-->
<!--                  <MultiSelect-->
<!--                    :border_color_danger="create_skill_form.errors.job_type_ids"-->
<!--                    :class="[create_skill_form.errors.job_type_ids ? 'is-invalid' : '']"-->
<!--                    :attributes="jobTypeAttributes"-->
<!--                    placeholder="Select job types"-->
<!--                    @queryUpdates="getJobTypes"-->
<!--                    @selectUpdates="selectStudentJobTypeList"-->
<!--                  />-->
<!--                  <div v-if="create_skill_form.errors.job_type_ids" class="invalid-feedback">-->
<!--                    {{ create_skill_form.errors.job_type_ids[0] }}-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->

<!--              <div class="mt-3 col-12">-->
<!--                <div class="mt-3">-->
<!--                  <label-->
<!--                    :class="[create_skill_form.errors.industry_type_ids ? 'text-danger' : '']"-->
<!--                    class="form-label">Industries Type</label>-->
<!--                  <MultiSelect-->
<!--                    :border_color_danger="create_skill_form.errors.industry_type_ids"-->
<!--                    :class="[create_skill_form.errors.industry_type_ids ? 'is-invalid' : '']"-->
<!--                    :attributes="industryTypeAttributes"-->
<!--                    placeholder="Select industry types"-->
<!--                    @queryUpdates="getIndustryTypes"-->
<!--                    @selectUpdates="selectStudentIndustryTypeList"-->
<!--                  />-->
<!--                  <div v-if="create_skill_form.errors.industry_type_ids" class="invalid-feedback">-->
<!--                    {{ create_skill_form.errors.industry_type_ids[0] }}-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
            <div class="form-footer text-end">
<!--              <button @click="backHobbies()" class="btn btn-secondary w-10">Back</button>-->
<!--              <button @click="skip()" class="btn btn-warning w-10">Skip</button>-->
              <button @click="hobbiesDetailsSubmit()" class="btn btn-primary w-100">Finish</button>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!--      step 03 end-->
    </div>
  </div>
</template>

<script>

import {goal_types} from "../../../../constants/constants";
export default {
  name: "skill-steps",

  data() {
    return {
      selectComponentKey :1,
      goal_types,
      studentGoalAttributes: {
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
          student_goal:'',
          length:0
        },
        error_message: '',
        errors: [],
      },
      hobbyAttributes: {
        data: [],
        selected: [{name: '', value: null}],
      },
      // industryTypeAttributes: {
      //   data: [],
      //   selected: [{name: '', value: null}],
      // },
      // jobTypeAttributes: {
      //   data: [],
      //   selected: [{name: '', value: null}],
      // },
      student_goals:{
        student_goal:"",
      }
    }
  },
  mounted() {
    this.getSkills()
    this.getHobbies()
    // this.getIndustryTypes()
    // this.getJobTypes()
    this.getGoalList()
  },
  methods: {
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
      this.create_skill_form.errors.skill_ids = '';
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
      this.create_skill_form.errors.hobby_ids = '';
    },
    // async getIndustryTypes(query = '') {
    //   try {
    //     let attributes = await this.$axios.$get('/api/student/industry-types', {params: {'filter[search]': query}});
    //     this.industryTypeAttributes.data = attributes.data.map((x) => ({
    //       name: `${x.name}`,
    //       value: x.id
    //     }));
    //   } catch (error) {
    //     return error;
    //   }
    // },
    // selectStudentIndustryTypeList(id) {
    //   this.create_skill_form.fields.industry_type_ids.push(id)
    //   this.create_skill_form.errors.industry_type_ids = '';
    // },
    // async getJobTypes(query = '') {
    //   try {
    //     let attributes = await this.$axios.$get('/api/student/job-types', {params: {'filter[search]': query}});
    //     this.jobTypeAttributes.data = attributes.data.map((x) => ({
    //       name: `${x.name}`,
    //       value: x.id
    //     }));
    //   } catch (error) {
    //     return error;
    //   }
    // },
    // selectStudentJobTypeList(id) {
    //   this.create_skill_form.fields.job_type_ids.push(id)
    //   this.create_skill_form.errors.job_type_ids = '';
    // },
    async hobbiesDetailsSubmit() {
      try {
        await this.$axios.$post('/api/student/hobbies', this.create_skill_form.fields);
        await this.$router.push('/user/dashboard')
      } catch (error) {
        this.create_skill_form.errors = error.response.data.errors
        this.create_skill_form.message = error.response.data.message
      }
    },
    getGoalList() {
      this.studentGoalAttributes.data = this.goal_types
    },
    selectGoalList() {
      this.create_skill_form.fields.student_goal = this.studentGoalAttributes.selected.value;
      this.create_skill_form.errors.student_goal = false;
      this.selectComponentKey++
    },
    // backHobbies(){
    //   this.$router.push('/user/auth/registration/education-steps')
    // },
    // skip() {
    //     this.$router.push('/user/dashboard')
    // },
  }
}
</script>

<style scoped>
.steps-counter{
  width: 75%;
  margin: 2rem auto;
}
.steps
.step-item:after,
.steps
.step-item:before {
    color: inherit;
    background: #877aef;
 }
.steps .step-item.active:before {
  color: inherit;
  border-color: #877aef;
  background: #ffffff;
}
</style>
