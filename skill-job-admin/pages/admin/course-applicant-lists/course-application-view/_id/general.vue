<template>
  <div id="tab-1" class="card tab-pane active show">
    <div class="row">
      <div class="col mt-3 ms-3">
        <h3 class="card-title">
          General Details
        </h3>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">First Name</label>
            <input v-model="student_form.first_name" type="text" class="form-control " Disabled autocomplete="off">
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input v-model="student_form.last_name" type="text" class="form-control " Disabled autocomplete="off">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Phone</label>
          <input v-model="student_form.phone_number_1" type="text" class="form-control " Disabled  autocomplete="off">
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "general",
  layout: 'dashboard-admin',
  data() {
    return {
      student_form:{
           },
      update_job_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
    }
  },
  mounted() {
    this.getStudentDetails()
  },
  methods: {
    async getStudentDetails() {
      try {
        this.student =(await this.$axios.$get(`/api/admin/students/${this.$route.params.id}`)).data;
        this.student_form = this.student
      } catch (error) {
        return error;
      }
    },
  }
}
</script>

<style scoped>

</style>
