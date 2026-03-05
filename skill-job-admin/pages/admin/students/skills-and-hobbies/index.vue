<template>
  <div id="tab-1" class="card tab-pane active show">
    <form @submit.prevent="hobbiesDetailsSubmit" method="post">
      <div class="card-body">
        <div class="alert alert-danger" role="alert" v-if="change_password_form.error_message">
          {{ change_password_form.error_message }}
        </div>
        <div class="mt-3 col-12">
          <div class="mt-3">
            <label
              :class="[update_education_form.errors.skill_ids ? 'text-danger' : '']"
              class="form-label">Skills</label>
            <MultiSelect
              :border_color_danger="update_education_form.errors.skill_ids"
              :class="[update_education_form.errors.skill_ids ? 'is-invalid' : '']"
              :attributes="skillAttributes"
              placeholder="select skill"
              @queryUpdates="getSkills"
              @selectUpdates="selectStudentSkillList"
            />
            <div v-if="update_education_form.errors.skill_ids" class="invalid-feedback">
              {{ update_education_form.errors.skill_ids[0] }}
            </div>
          </div>
        </div>
        <div class="mt-3 col-12">
          <div class="mt-3">
            <label
              :class="[update_education_form.errors.hobby_ids ? 'text-danger' : '']"
              class="form-label">Hobbies</label>
            <MultiSelect
              :border_color_danger="update_education_form.errors.hobby_ids"
              :class="[update_education_form.errors.hobby_ids ? 'is-invalid' : '']"
              :attributes="hobbyAttributes"
              placeholder="select hobby"
              @queryUpdates="getHobbies"
              @selectUpdates="selectStudentHobbyList"
            />
            <div v-if="update_education_form.errors.hobby_ids" class="invalid-feedback">
              {{ update_education_form.errors.hobby_ids[0] }}
            </div>
          </div>
        </div>
<!--        <hr/>-->
<!--        <div class="">-->
<!--          <h2 class="card-title text-left">Your Interest Fields</h2>-->
<!--          <div class="mt-3 col-12">-->
<!--            <div class="mt-3">-->
<!--              <label-->
<!--                :class="[update_education_form.errors.industry_type_ids ? 'text-danger' : '']"-->
<!--                class="form-label">Job Types</label>-->
<!--              <MultiSelect-->
<!--                :border_color_danger="update_education_form.errors.industry_type_ids"-->
<!--                :class="[update_education_form.errors.industry_type_ids ? 'is-invalid' : '']"-->
<!--                :attributes="jobTypeAttributes"-->
<!--                placeholder="select job type"-->
<!--                @queryUpdates="getJobTypes"-->
<!--                @selectUpdates="selectStudentJobTypeList"-->
<!--              />-->
<!--              <div v-if="update_education_form.errors.industry_type_ids" class="invalid-feedback">-->
<!--                {{ update_education_form.errors.industry_type_ids[0] }}-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->

<!--          <div class="mt-3 col-12">-->
<!--            <div class="mt-3">-->
<!--              <label-->
<!--                :class="[update_education_form.errors.job_type_ids ? 'text-danger' : '']"-->
<!--                class="form-label">Industry Types</label>-->
<!--              <MultiSelect-->
<!--                :border_color_danger="update_education_form.errors.job_type_ids"-->
<!--                :class="[update_education_form.errors.job_type_ids ? 'is-invalid' : '']"-->
<!--                :attributes="industryTypeAttributes"-->
<!--                placeholder="select industry type"-->
<!--                @queryUpdates="getIndustryTypes"-->
<!--                @selectUpdates="selectStudentIndustryTypeList"-->
<!--              />-->
<!--              <div v-if="update_education_form.errors.job_type_ids" class="invalid-feedback">-->
<!--                {{ update_education_form.errors.job_type_ids[0] }}-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
      </div>
      <div class="card-footer text-end">
        <div class="d-flex">
          <a class="btn btn-outline-secondary ms-auto me-2" href="#" @click.prevent="reset">Reset</a>
          <button class="btn btn-primary" type="submit">Save Changes</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      change_password_form: {
        fields: {},
        error_message: '',
        errors: [],
      },
      skillAttributes: {
        data: [],
        selected: [{name: '', value: null}],
      },
      student_year_attributes: {
        data: [],
        selected: {}
      },
      update_education_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
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
    this.getSkills()
    this.getHobbies()
    // this.getIndustryTypes()
    // this.getJobTypes()
  },
  methods: {
    hobbiesDetailsSubmit() {
      try {
        this.$axios.$post('/api/students/register-hobby-steps', this.update_education_form.fields);
      } catch (error) {
        this.update_education_form.errors = error.response.data.errors
        this.update_education_form.message = error.response.data.message
      }
    },
    async getJobTypes(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/students/job-types', {params: {'filter[search]': query}});
        this.jobTypeAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectStudentJobTypeList() {
      this.update_education_form.fields.name = this.jobTypeAttributes.selected.value;
    },
    async getIndustryTypes(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/students/industry-type', {params: {'filter[search]': query}});
        this.industryTypeAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectStudentIndustryTypeList() {
      this.update_education_form.fields.name = this.industryTypeAttributes.selected.value;
    },
    async getHobbies(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/students/hobbies', {params: {'filter[search]': query}});
        this.hobbyAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectStudentHobbyList() {
      this.update_education_form.fields.name = this.hobbyAttributes.selected.value;
    },
    async getSkills(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/students/skills', {params: {'filter[search]': query}});
        this.skillAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectStudentSkillList() {
      this.update_education_form.fields.name = this.skillAttributes.selected.value;
    },
    reset() {
      this.change_password_form = {
        fields: {},
        error_message: '',
        errors: [],
      },
      this.student_year_attributes.selected = {}
      this.hobbyAttributes.selected = {}
      this.industryTypeAttributes.selected = {}
      this.jobTypeAttributes.selected = {}
    }
  }
}
</script>

<style scoped>

</style>
