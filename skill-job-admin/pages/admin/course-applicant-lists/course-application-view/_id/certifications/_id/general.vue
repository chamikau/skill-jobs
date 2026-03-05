<template>
  <div>
    <div class="">
      <div class="card">
        <div>
            <div class="card-header">
              <h5 class="card-title">Edit Certification</h5>
            </div>
            <div class="card-body">
              <div class="">
                <label
                  class="form-label">Certification</label>
                <input
                  v-model="view_certification_form.fields.title"
                  type="text" class="form-control" placeholder="Enter certification title"
                  disabled>
                <label
                  class="form-label mt-2">Certification Link</label>
                <input
                  v-model="view_certification_form.fields.links"
                  type="text" class="form-control" placeholder="Enter certification link"
                  disabled>
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
      job: "",
      jobs_list: "",
      view_certification_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
    }
  },
  mounted() {
    this.getCertificationData()
  },
  methods: {
    async getCertificationData() {
      this.certifications = (await this.$axios.$get(`api/admin/certifications/${this.$route.params.id}`)).data
      this.view_certification_form.fields = this.certifications
    },
  },
}
</script>

<style scoped>

</style>
