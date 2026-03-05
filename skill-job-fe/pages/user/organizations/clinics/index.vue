<template>
  <div>
    <div class="card">
      <div class="card-header row">
        <div class="col mb-md-0 mb-2">
          <h3 class="card-title">Clinics</h3>
        </div>
        <div class="col-12 col-md-auto ms-auto d-print-none">
          <div class="btn-list">
            <NuxtLink class="btn btn-primary" to="/admin/organizations/clinics/create">
              <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                   stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                   xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                <line x1="12" x2="12" y1="5" y2="19"/>
                <line x1="5" x2="19" y1="12" y2="12"/>
              </svg>
              Create new Clinic
            </NuxtLink>
          </div>
        </div>
      </div>
      <Table :attributes="attributes" @inputUpdates="inputUpdates">
        <!--          <template v-slot:action="props">{{ props.record.owner.name}}</template>-->
        <template v-slot:action="props">
          <a class="btn" @click="$router.push(`/admin/organizations/clinics/${props.record.id}`)">Edit</a>
          <a class="btn" @click="goToOrganization(props.record)">Go To Clinic</a>
        </template>
      </Table>


    </div>
<!--    <div v-if="$checkOrganizationPermission('create-user')">dsdsd</div>-->
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  name: "index",
  layout: 'dashboard-admin',
  data() {
    return {
      attributes: {
        table_id: 'organizations_table',
        cache: true,
        loading: false,
        labels: [
          {key: 'name', name: 'Clinic', sort: true},
          // {key: 'owner', name: 'Owner' },
          {key: 'created_at', name: 'Created Date'},
          {key: 'action', name: 'Action'},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      }
    }
  },
  mounted() {
  },
  async fetch({ store }) {
    await store.dispatch('organization/index')
  },
  computed: {
    ...mapState({
      organizations: (state) => {
        return state.organization.organizations
      }
    })
  },
  methods: {
    async goToOrganization(organization) {
      await this.$setGlobalOrganization(organization.id)
      await this.$router.push('/admin/recruitments')
    },
    async getStudentTableData(page = 1, sort = '', search = '', per_page = 15) {
      try {
        this.attributes.api_response = await this.$axios.$get('api/admin/organizations',
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
      this.getStudentTableData(values.page, values.sort.sort_input, values.search, values.per_page)
    },
  }
}
</script>

<style scoped>

</style>
