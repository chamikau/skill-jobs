<template>
  <div id="">

    <div class="card">

      <div class="card-header row">
        <div class="col mb-md-0 mb-2">
          <h3 class="card-title">User Roles</h3>
        </div>
        <div class="col-12 col-md-auto ms-auto d-print-none">
<!--          v-if="$checkOrganizationPermission('create-role')"-->
          <div class="btn-list">
            <NuxtLink class="btn btn-primary" to="/admin/settings/roles/create">
              <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                   stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                   xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                <line x1="12" x2="12" y1="5" y2="19"/>
                <line x1="5" x2="19" y1="12" y2="12"/>
              </svg>
              Create User Role
            </NuxtLink>
          </div>
        </div>
      </div>

      <Table :attributes="attributes" @inputUpdates="inputUpdates">
        <template v-slot:action="props">
          <NuxtLink
            :to="`/admin/settings/roles/${props.record.id}`"
            class="btn"
            v-if="!props.record.is_super"
          >
            Edit
          </NuxtLink>
          <span v-else class="ms-3">-</span>
        </template>
      </Table>
    </div>
  </div>
</template>

<script>
export default {
  name: "roles",
  data() {
    return {
      attributes: {
        table_id: 'roles_table',
        cache: true,
        loading: false,
        labels: [
          {key: 'name', name: 'Role', sort: true},
          {key: 'action', name: 'Action'},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      }
    }
  },
  methods: {
    async getRoleTableData(page = 1, sort = '', search = '', per_page = 15) {
      try {
        this.attributes.api_response = await this.$axios.$get('api/admin/roles',
          {
            params: {
              per_page: per_page,
              page: page,
              sort: sort,
              'filter[search]': search,
              ...this.attributes.filters
            }
          }
        );
      } catch (error) {
      }
    },
    inputUpdates(values) {
      this.attributes.table_component_values = values;
      this.getRoleTableData(values.page, values.sort.sort_input, values.search, values.per_page)
    },
  }
}
</script>

<style scoped>

</style>
