<template>
  <div>
    <div class="">
      <div class="card">
        <div>
            <div class="card-header">
              <h5 class="card-title">Project Details</h5>
            </div>
            <div class="card-body">
              <div class="">
                <div class="mt-3">
                  <label
                    class="form-label">Project Title</label>
                  <input
                    v-model="view_project_form.fields.project_title"
                    type="text" class="form-control" placeholder="Enter project title"
                    disabled>
                  <label
                    class="form-label mt-2">Project Link</label>
                  <input
                    v-model="view_project_form.fields.project_links"
                    type="text" class="form-control" placeholder="Enter project link"
                    disabled>
                </div>
                <label
                  class="form-label mt-2">Project Description</label>
                <textarea
                  v-model="view_project_form.fields.project_description"
                  type="text" class="form-control" placeholder="Enter project description"
                  disabled>
                  </textarea>
              </div>
            </div>
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
      view_project_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
    }
  },
  async mounted() {
    await this.getProjectData()
  },
  methods: {
    async getProjectData() {
      this.projects = (await this.$axios.$get(`api/admin/projects/${this.$route.params.id}`)).data
      this.view_project_form.fields = this.projects
    },
  },
}
</script>

<style scoped>

</style>
