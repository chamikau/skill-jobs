<template>
  <div>
    <div class="">
      <form ref="update_role" @submit.prevent="updateRole">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-icon me-3" href="#" @click="$router.back()">
              <svg class="icon icon-tabler icon-tabler-arrow-narrow-left" fill="none"
                   height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                   width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                <line x1="5" x2="19" y1="12" y2="12"></line>
                <line x1="5" x2="9" y1="12" y2="16"></line>
                <line x1="5" x2="9" y1="12" y2="8"></line>
              </svg>
            </a>
            <h5 class="card-title">Update User Role</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label :class="[update_role_form.errors.name ? 'text-danger' : '']" class="form-label">User
                    Role</label>
                  <input v-model="update_role_form.fields.name"
                         :class="[update_role_form.errors.name ? 'is-invalid' : '']" autocomplete="off"
                         class="form-control " placeholder="user role"
                         type="text">
                  <div v-if="update_role_form.errors.name" class="invalid-feedback">{{
                      update_role_form.errors.name[0]
                    }}
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-2">
                <h3>Permissions</h3>
              </div>
            </div>
            <div class="row mb-2" v-for="permission_group in permission_groups">
              <div class="col-md-12 mb-2">
                {{ permission_group.name }}
              </div>
              <div class="col-md-3" v-for="permission in permission_group.permissions">
                <label class="form-check">
                  <input v-model="update_role_form.fields.permissions" :value="permission.id" class="form-check-input" type="checkbox" >
                  <span class="form-check-label">{{ permission.name }}</span>
                </label>
              </div>
              <hr class="my-2"/>
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <a class="btn btn-outline-secondary ms-auto me-2" @click="reset()">Reset</a>
              <button class="btn btn-primary" type="submit">Update User Role</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "_id",
  data() {
    return {
      role: {},
      permission_groups: {},
      update_role_form: {
        fields: {
          name: '',
          permissions: []
        },
        error_message: '',
        errors: [],
      }
    }
  },
  methods: {
    async updateRole() {
      try {
        let role = await this.$axios.$put(`/api/admin/roles/${this.$route.params.id}`, this.update_role_form.fields)
        await this.$router.push(`/admin/settings/roles/`)
      } catch (e) {
        this.update_role_form.errors = e.response.data.errors
        this.update_role_form.error_message = e.response.data.message
      }
    },
    async getPermissions() {
      this.permission_groups = (await this.$axios.$get(`/api/admin/permission-groups`)).data
    },
    async getRole() {
      let response = (await this.$axios.$get(`/api/admin/roles/${this.$route.params.id}`))
      this.role = response.data
      this.update_role_form.fields.name = response.data.name
      response.data.permissions.forEach((permission) => {
        this.update_role_form.fields.permissions.push(permission.id)
      })
    },
    async reset() {
      this.$refs.update_role.reset()
      this.update_role_form = {
        fields: {
          name: this.role.name,
          permissions: []
        },
        error_message: '',
        errors: [],
      }
      setTimeout(() => {
        this.role.permissions.forEach((permission) => {
          this.update_role_form.fields.permissions.push(permission.id)
        })
      }, 300)
    }
  },
  async mounted() {
    await this.getPermissions()
    await this.getRole()
  }
}
</script>

<style scoped>

</style>
