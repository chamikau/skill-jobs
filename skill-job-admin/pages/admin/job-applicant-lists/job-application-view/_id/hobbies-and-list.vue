<template>
  <div id="tab-1" class="card tab-pane">
    <div class="row">
      <div class="col ms-3 mt-3">
        <h3 class="card-title ">
          Career Interests & Hobbies
        </h3>
      </div>
    </div>
      <div class="card-body">
        <div class="mt-3 col-12">
          <div class="mt-3">
            <label
              class="form-label">Skills</label>
            <MultiSelectDisabled
              :attributes="skillAttributes"
            />
          </div>
        </div>
        <div class="mt-3 col-12">
          <div class="mt-3">
            <label
              class="form-label">Hobbies</label>
            <MultiSelectDisabled
              :attributes="hobbyAttributes"
            />
          </div>
        </div>
<!--        <hr/>-->
<!--        <div class="">-->
<!--          <h2 class="card-title text-left">Your Interest Fields</h2>-->
<!--          <div class="mt-3 col-12">-->
<!--            <div class="mt-3">-->
<!--              <label-->
<!--                class="form-label">Job Types</label>-->
<!--              <MultiSelectDisabled-->
<!--                :attributes="jobTypeAttributes"-->
<!--              />-->
<!--            </div>-->
<!--          </div>-->

<!--          <div class="mt-3 col-12">-->
<!--            <div class="mt-3">-->
<!--              <label-->
<!--                class="form-label">Industry Types</label>-->
<!--              <MultiSelectDisabled-->
<!--                :attributes="industryTypeAttributes"-->
<!--              />-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
      </div>
  </div>
</template>

<script>

export default {

  data() {
    return {
      skillAttributes: {
        data: [],
        selected: [],
      },
      create_skill_form: {
        fields: {
          skill_ids: [],
          hobby_ids: [],
          job_type_ids: [],
          industry_type_ids: [],
        },
      },
      hobbyAttributes: {
        data: [],
        selected: [],
      },
      industryTypeAttributes: {
        data: [],
        selected: [],
      },
      jobTypeAttributes: {
        data: [],
        selected: [],
      },
      hobbies_and_list: {
        fields: {},
        error_message: '',
        errors: [],
      },
    }
  },
  mounted() {
    this.getCities()
    this.getSkills()
    this.getHobbies()
    this.getIndustryTypes()
    this.getJobTypes()
    this.getHobbiesAndInterestList()
  },
  methods: {
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
    async getIndustryTypes(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/student/industry-type', {params: {'filter[search]': query}});
        this.industryTypeAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
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
    async getHobbiesAndInterestList() {
      this.hobbies_and_list = (await this.$axios.$get(`/api/admin/student-hobbies/${this.$route.params.id}`)).data;
      const window = this
      this.hobbies_and_list.skills.forEach(function(x){
        window.create_skill_form.fields.skill_ids.push(x.id)
        const data = window.skillAttributes.data.find(job=>job.value === x.id)
        window.skillAttributes.selected.push(data)
      })
      this.hobbies_and_list.hobbies.forEach(function(x){
        window.create_skill_form.fields.hobby_ids.push(x.id)
        const data = window.hobbyAttributes.data.find(job=>job.value === x.id)
        window.hobbyAttributes.selected.push(data)
      })
      this.hobbies_and_list.industry_type_students.forEach(function(x){
        window.create_skill_form.fields.industry_type_ids.push(x.id)
        const data = window.industryTypeAttributes.data.find(job=>job.value === x.id)
        window.industryTypeAttributes.selected.push(data)
      })
      this.hobbies_and_list.job_types.forEach(function(x){
        window.create_skill_form.fields.job_type_ids.push(x.id)
        const data = window.jobTypeAttributes.data.find(job=>job.value === x.id)
        window.jobTypeAttributes.selected.push(data)
      })
    },
    skip() {
      this.$router.push('/user/dashboard')
    },
  }
}
</script>

<style scoped>

</style>
