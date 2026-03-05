<template>
  <div id="tab-1" class="card tab-pane active show">
    <div class="row">
      <div class="col ms-3 mt-3">
        <h3 class="card-title ">
          Career Interests & Hobbies
        </h3>
      </div>
    </div>
    <form @submit.prevent="hobbiesDetailsSubmit" method="post">
      <div class="card-body">
        <div class="">
          <div class="">
            <label
              :class="[update_skills_form.errors.student_goal ? 'text-danger' : '']"
              class="form-text mb-3">Tell us what your future goal is?</label>
            <div class="form-group d-flex">
              <label class="col-form-label"
                     :class="[update_skills_form.errors.student_goal ? 'text-danger' : '']">I want to</label>
              <div class="select-none-border">
                <SelectNoneBorder
                  :attributes="studentGoalAttributes"
                  :class="[update_skills_form.errors.student_goal ? 'is-invalid' : '']"
                  autocomplete="off"
                  placeholder="become a ui/ux designer"
                  @queryUpdates="getGoalList"
                  @selectUpdates="selectGoalList"
                  :key="selectComponentKey">
                </SelectNoneBorder>
                <div v-if="update_skills_form.errors.student_goal" class="invalid-feedback">
                  {{ update_skills_form.errors.student_goal[0] }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-3 col-12">
          <div class="mt-3">
            <label
              :class="[update_skills_form.errors.skill_ids ? 'text-danger' : '']"
              class="form-label">Skills</label>
            <MultiSelect
              :border_color_danger="update_skills_form.errors.skill_ids"
              :class="[update_skills_form.errors.skill_ids ? 'is-invalid' : '']"
              :attributes="skillAttributes"
              placeholder="Select skills"
              @queryUpdates="getSkills"
              @selectUpdates="selectStudentSkillList"
              @removeData="removeSkillData"
            />
            <div v-if="update_skills_form.errors.skill_ids" class="invalid-feedback">
              {{ update_skills_form.errors.skill_ids[0] }}
            </div>
          </div>
        </div>
        <div class="mt-3 col-12">
          <div class="mt-3">
            <label
              :class="[update_skills_form.errors.hobby_ids ? 'text-danger' : '']"
              class="form-label">Hobbies</label>
            <MultiSelect
              :border_color_danger="update_skills_form.errors.hobby_ids"
              :class="[update_skills_form.errors.hobby_ids ? 'is-invalid' : '']"
              :attributes="hobbyAttributes"
              placeholder="Select hobbies"
              @queryUpdates="getHobbies"
              @selectUpdates="selectStudentHobbyList"
              @removeData="removeHobbyData"
            />
            <div v-if="update_skills_form.errors.hobby_ids" class="invalid-feedback">
              {{ update_skills_form.errors.hobby_ids[0] }}
            </div>
          </div>
        </div>
<!--        <hr/>-->
<!--        <div class="">-->
<!--          <h2 class="card-title text-left">Your Interest Fields</h2>-->
<!--          <div class="mt-3 col-12">-->
<!--            <div class="mt-3">-->
<!--              <label-->
<!--                :class="[update_skills_form.errors.job_type_ids ? 'text-danger' : '']"-->
<!--                class="form-label">Job Types</label>-->
<!--              <MultiSelect-->
<!--                :border_color_danger="update_skills_form.errors.job_type_ids"-->
<!--                :class="[update_skills_form.errors.job_type_ids ? 'is-invalid' : '']"-->
<!--                :attributes="jobTypeAttributes"-->
<!--                placeholder="Select job types"-->
<!--                @queryUpdates="getJobTypes"-->
<!--                @selectUpdates="selectStudentJobTypeList"-->
<!--                @removeData="removeJobTypeData"-->
<!--              />-->
<!--              <div v-if="update_skills_form.errors.job_type_ids" class="invalid-feedback">-->
<!--                {{ update_skills_form.errors.job_type_ids[0] }}-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->

<!--          <div class="mt-3 col-12">-->
<!--            <div class="mt-3">-->
<!--              <label-->
<!--                :class="[update_skills_form.errors.industry_type_ids ? 'text-danger' : '']"-->
<!--                class="form-label">Industry Types</label>-->
<!--              <MultiSelect-->
<!--                :border_color_danger="update_skills_form.errors.industry_type_ids"-->
<!--                :class="[update_skills_form.errors.industry_type_ids ? 'is-invalid' : '']"-->
<!--                :attributes="industryTypeAttributes"-->
<!--                placeholder="Select industry types"-->
<!--                @queryUpdates="getIndustryTypes"-->
<!--                @selectUpdates="selectStudentIndustryTypeList"-->
<!--                @removeData="removeIndustryTypeData"-->
<!--              />-->
<!--              <div v-if="update_skills_form.errors.industry_type_ids" class="invalid-feedback">-->
<!--                {{ update_skills_form.errors.industry_type_ids[0] }}-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
      </div>
      <div class="card-footer text-end">
        <div class="d-flex">
          <a class="ms-auto me-2" href="#" @click.prevent="reset()"></a>
          <button class="btn btn-primary" type="submit">Save Changes</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import {goal_types} from "../../../../constants/constants";

export default {

  data() {
    return {
      selectComponentKey :1,
      goal_types,
      studentGoalAttributes: {
        data: [],
        selected: {
          name:""
        }
      },
      skillAttributes: {
        data: [],
        selected: [{name: '', value: null}],
      },
      update_skills_form: {
        fields: {
          skill_ids: [],
          hobby_ids: [],
          // job_type_ids: [],
          // industry_type_ids: [],
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
      hobbies_and_list: {
        fields: {},
        error_message: '',
        errors: [],
      },
    }
  },
  mounted() {
    this.getSkills()
    this.getHobbies()
    // this.getIndustryTypes()
    this.getGoalList()
    this.getHobbiesAndInterestList()
  },
  methods: {
    removeSkillData(value){
      const index = this.update_skills_form.fields.skill_ids.indexOf(value);
      this.update_skills_form.fields.skill_ids.splice(index, 1)
    },
    removeHobbyData(value){
      const index = this.update_skills_form.fields.hobby_ids.indexOf(value);
      this.update_skills_form.fields.hobby_ids.splice(index, 1)
    },
    // removeIndustryTypeData(value){
    //   const index = this.update_skills_form.fields.industry_type_ids.indexOf(value);
    //   this.update_skills_form.fields.industry_type_ids.splice(index, 1)
    // },
    // removeJobTypeData(value){
    //   const index = this.update_skills_form.fields.job_type_ids.indexOf(value);
    //   this.update_skills_form.fields.job_type_ids.splice(index, 1)
    // },
    getGoalList() {
      this.studentGoalAttributes.data = this.goal_types
    },
    selectGoalList() {
      this.update_skills_form.fields.student_goal = this.studentGoalAttributes.selected.value;
      this.update_skills_form.errors.student_goal = false;
      this.selectComponentKey++
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
      this.update_skills_form.fields.skill_ids.push(id)
      this.update_skills_form.errors.skill_ids = '';
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
      this.update_skills_form.fields.hobby_ids.push(id)
      this.update_skills_form.errors.hobby_ids = '';
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
    //   this.update_skills_form.fields.industry_type_ids.push(id)
    //   this.update_skills_form.errors.industry_type_ids = '';
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
    //   this.update_skills_form.fields.job_type_ids.push(id)
    //   this.update_skills_form.errors.job_type_ids = '';
    // },
    async hobbiesDetailsSubmit() {
      try {
        await this.$axios.$put('/api/student/update-hobby-profile-steps', this.update_skills_form.fields);
        this.$toast.success('Saved successfully!')

      } catch (error) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_skills_form.errors = error.response.data.errors
        this.update_skills_form.message = error.response.data.message
      }
    },
    async getHobbiesAndInterestList() {
      this.hobbies_and_list = (await this.$axios.$get(`/api/student/hobbies/${this.$auth.user.id}`)).data;
      const window = this
      this.hobbies_and_list.skills.forEach(function(x){
        window.update_skills_form.fields.skill_ids.push(x.id)
        const data = window.skillAttributes.data.find(job=>job.value === x.id)
        window.skillAttributes.selected.push(data)
      })
      this.hobbies_and_list.hobbies.forEach(function(x){
        window.update_skills_form.fields.hobby_ids.push(x.id)
        const data = window.hobbyAttributes.data.find(job=>job.value === x.id)
        window.hobbyAttributes.selected.push(data)
      })
      this.studentGoalAttributes.selected['name'] =  this.hobbies_and_list.student_goal;
      // this.hobbies_and_list.industry_type_students.forEach(function(x){
      //   window.update_skills_form.fields.industry_type_ids.push(x.id)
      //   const data = window.industryTypeAttributes.data.find(job=>job.value === x.id)
      //   window.industryTypeAttributes.selected.push(data)
      // })
      // this.hobbies_and_list.job_types.forEach(function(x){
      //   window.update_skills_form.fields.job_type_ids.push(x.id)
      //   const data = window.jobTypeAttributes.data.find(job=>job.value === x.id)
      //   window.jobTypeAttributes.selected.push(data)
      // })
    },
    async reset(){
    },
    skip() {
      this.$router.push('/user/dashboard')
    },
  }
}
</script>

<style scoped>
.col-form-label{
  width: auto;
}
.select-none-border{
  flex-grow: 1;
}
.form-group{
  flex-grow: 1;
}
</style>
