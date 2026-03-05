<template>
  <div>
    <div class="container-xl">

      <div class="card row">
        <div>
          <form @submit.prevent="createOrganization" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Create New Clinic</h5>
            </div>
            <div class="row mt-2 card-body">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" :class="[create_organization_form.errors.name ? 'text-danger' : '']">Clinic Name</label>
                  <input v-model="create_organization_form.fields.name" type="text" class="form-control " :class="[create_organization_form.errors.name ? 'is-invalid' : '']" placeholder="clinic name" autocomplete="off">
                  <div class="invalid-feedback" v-if="create_organization_form.errors.name">{{ create_organization_form.errors.name[0] }}</div>
                </div>
              </div>
            </div>

            <div class="card-footer text-end">
              <div class="d-flex">
                <a class="btn btn-outline-secondary ms-auto me-2" href="#" @click="reset()">Reset</a>
                <button class="btn btn-primary" type="submit">Create New Clinic</button>
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
  name: "create",
  data() {
    return {
      create_organization_form: {
        fields: {},
        error_message: '',
        errors: [],
      }
    }
  },
  methods: {
    async createOrganization() {
      try {
        let student = await this.$axios.$post(`/api/admin/organizations/`, this.create_organization_form.fields)
        await this.$router.push(`/admin/organizations/clinics`)
      } catch (e) {
        this.create_organization_form.errors = e.response.data.errors
        this.create_organization_form.error_message = e.response.data.message
      }
    },
    async reset() {
      this.create_organization_form = {
        fields: {},
        error_message: '',
        errors: [],
      }
    }
  },
}
</script>

<style scoped>

</style>
