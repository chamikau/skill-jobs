<template>
  <div>
    <div class="">
      <form ref="create_invitation" @submit.prevent="UpdateInvitation">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-icon me-3" href="#" @click="$router.back()">
              <svg class="icon icon-tabler icon-tabler-arrow-narrow-left" fill="none"
                   height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                   viewBox="0 0 24 24"
                   width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                <line x1="5" x2="19" y1="12" y2="12"></line>
                <line x1="5" x2="9" y1="12" y2="16"></line>
                <line x1="5" x2="9" y1="12" y2="8"></line>
              </svg>
            </a>
            <h5 class="card-title">Edit Invitation</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label :class="[update_invitation_form.errors.email ? 'text-danger' : '']"
                         class="form-label">Email</label>
                  <input v-model="update_invitation_form.fields.email"
                         :class="[update_invitation_form.errors.email ? 'is-invalid' : '']" autocomplete="off"
                         class="form-control" type="email">
                  <div v-if="update_invitation_form.errors.email" class="invalid-feedback">
                    {{ update_invitation_form.errors.email[0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label :class="[update_invitation_form.errors.role_id ? 'text-danger' : '']"
                         class="form-label">Role</label>
                  <select v-model="update_invitation_form.fields.role_id"
                          :class="[update_invitation_form.errors.role_id ? 'is-invalid' : '']"
                          class="form-control ">
                    <template v-for="role in roles_list">
                      <option :value="role.value">{{ role.text }}</option>
                    </template>
                  </select>
                  <div v-if="update_invitation_form.errors.role_id" class="invalid-feedback">
                    {{ update_invitation_form.errors.role_id[0] }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <a class="btn btn-outline-secondary ms-auto me-2" @click="reset()">Reset</a>
              <button class="btn btn-primary" type="submit">Edit Invitation</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "create",
  data() {
    return {
      invitation: {},
      roles_list: {},
      update_invitation_form: {
        fields: {},
        error_message: '',
        errors: [],
      }
    }
  },
  methods: {
    async UpdateInvitation() {
      try {
        let role = await this.$axios.$put(`/api/admin/user-invitations/${this.$route.params.id}`, this.update_invitation_form.fields)
        await this.$router.push(`/admin/settings/users/`)
      } catch (e) {
        this.update_invitation_form.errors = e.response.data.errors
        this.update_invitation_form.error_message = e.response.data.message
      }
    },
    async reset() {
      this.update_invitation_form = {
        fields: {},
        error_message: '',
        errors: [],
      }
      this.update_invitation_form.fields = (await this.$axios.$get(`/api/admin/user-invitations/${this.$route.params.id}`)).data
      this.$refs.create_invitation.reset()
    },
    async getInvitation() {
      this.invitation = (await this.$axios.$get(`/api/admin/user-invitations/${this.$route.params.id}`)).data
      this.update_invitation_form.fields = this.invitation
    },
  },
  async mounted() {
    this.roles_list = (await this.$axios.$get('/api/admin/roles')).data.map((x) => ({
      text: x.name,
      value: x.id
    }))
    await this.getInvitation()
  }
}
</script>

<style scoped>

</style>
