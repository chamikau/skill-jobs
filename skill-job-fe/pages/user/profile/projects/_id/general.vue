<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="updateProjectData" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Edit Project</h5>
            </div>
            <div class="card-body">
              <div class="">
                <div class="mt-3">
                  <label
                    :class="[update_education_form.errors.project_title ? 'text-danger' : '']"
                    class="form-label">Project Title</label>
                  <input
                    v-model="update_education_form.fields.project_title"
                    :class="[update_education_form.errors.project_title ? 'is-invalid' : '']"
                    type="text" class="form-control" placeholder="Enter project title"
                    @input="clearValidationProjectTitleError">
                  <div v-if="update_education_form.errors.project_title" class="invalid-feedback">
                    {{ update_education_form.errors.project_title[0] }}
                  </div>
                  <label
                    :class="[update_education_form.errors.project_links ? 'text-danger' : '']"
                    class="form-label mt-2">Project Link</label>
                  <input
                    v-model="update_education_form.fields.project_links"
                    :class="[update_education_form.errors.project_links ? 'is-invalid' : '']"
                    type="text" class="form-control" placeholder="Enter project link"
                    @input="clearValidationProjectLinkError">
                  <div v-if="update_education_form.errors.project_links" class="invalid-feedback">
                    {{ update_education_form.errors.project_links[0] }}
                  </div>
                </div>
                <label
                  :class="[update_education_form.errors.project_description ? 'text-danger' : '']"
                  class="form-label mt-2">Project Description</label>
                <textarea
                  v-model="update_education_form.fields.project_description"
                  :class="[update_education_form.errors.project_description ? 'is-invalid' : '']"
                  type="text" class="form-control" placeholder="Enter project description"
                  @input="clearValidationProjectDescriptionError">
                  </textarea>
                <div v-if="update_education_form.errors.project_description" class="invalid-feedback">
                  {{ update_education_form.errors.project_description[0] }}
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
export default {
  name: "general",
  data() {
    return {
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
      update_education_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
    }
  },
  async mounted() {
    await this.getCities()
    await this.getProjectData()
  },
  methods: {
    clearValidationProjectTitleError() {
      this.update_education_form.errors.project_title = false;
    },
    clearValidationProjectLinkError() {
      this.update_education_form.errors.project_links = false;
    },
    clearValidationProjectDescriptionError() {
      this.update_education_form.errors.project_description = false;
    },
    async updateProjectData() {
      try {
        let education = await this.$axios.$put(`api/student/projects/${this.$route.params.id}`, this.update_education_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push('/user/profile/projects')
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_education_form.errors = e.response.data.errors
        this.update_education_form.error_message = e.response.data.message
      }
    },
    async getProjectData() {
      this.projects = (await this.$axios.$get(`api/student/projects/${this.$route.params.id}`)).data
      this.update_education_form.fields = this.projects
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
      try {
        this.update_education_form.errors.project_title = false;
        this.update_education_form.errors.project_links = false;
        this.update_education_form.errors.project_description = false;
        this.education = (await this.$axios.$get(`api/student/projects/${this.$route.params.id}`)).data
        this.update_education_form.fields = this.education
        this.cityAttributes.selected = this.cityAttributes.data.find((x)=>x.value === this.education.city_id);
      }catch (e){
        return e;
      }
    }
  },
}
</script>

<style scoped>

</style>
