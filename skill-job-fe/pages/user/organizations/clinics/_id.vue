<template>
  <div>
    <div class="container-xl">

      <div class="card row">
        <div>
          <form @submit.prevent="createOrganization" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Edit Clinic</h5>
            </div>
            <div class="row mt-2 card-body">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" :class="[update_organization_form.errors.name ? 'text-danger' : '']">Clinic Name</label>
                  <input v-model="update_organization_form.fields.name" type="text" class="form-control " :class="[update_organization_form.errors.name ? 'is-invalid' : '']" placeholder="clinic name" autocomplete="off">
                  <div class="invalid-feedback" v-if="update_organization_form.errors.name">{{ update_organization_form.errors.name[0] }}</div>
                </div>
              </div>
            </div>

            <div class="card-footer text-end">
              <div class="d-flex">
                <a class="btn btn-outline-secondary ms-auto me-2" href="#" @click="reset()">Reset</a>
                <button class="btn btn-primary" type="submit">Edit Clinic</button>
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
      update_organization_form: {
        fields: {
          name: ''
        },
        error_message: '',
        errors: [],
      }
    }
  },
  async mounted() {
    await this.getOrganization()
  },
  methods: {
    async getOrganization() {
      let response = (await this.$axios.$get(`/api/admin/organizations/${this.$route.params.id}`)).data
      this.update_organization_form.fields.name = response.name
    },
    async createOrganization() {
      try {
        let student = await this.$axios.$put(`/api/admin/organizations/${this.$route.params.id}`, this.update_organization_form.fields)
        await this.$router.push(`/admin/organizations/clinics`)
      } catch (e) {
        this.update_organization_form.errors = e.response.data.errors
        this.update_organization_form.error_message = e.response.data.message
      }
    },
    async reset() {
      this.update_organization_form = {
        fields: {
          name: (await this.$axios.$get(`/api/admin/organizations/${this.$route.params.id}`)).data.name
        },
        error_message: '',
        errors: [],
      }
    }
  },
}
</script>

<style scoped>

</style>
