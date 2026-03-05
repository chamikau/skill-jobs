<template>
  <div>
    <!-- Users table -->
    <div>
      <div class="">
        <div class="row">
          <div class="col-md-12">
            <div class="card">

              <div class="card-header row">
                <div class="col mb-md-0 mb-2">
                  <h3 class="card-title">Users</h3>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                  <div class="btn-list">
                    <NuxtLink class="btn btn-primary" to="/admin/settings/users/invitation">
                      <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                           xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                        <line x1="12" x2="12" y1="5" y2="19"/>
                        <line x1="5" x2="19" y1="12" y2="12"/>
                      </svg>
                      Invite User
                    </NuxtLink>
                  </div>
                </div>
              </div>

              <Table :attributes="attributes_1" @inputUpdates="inputUpdates1" class="mb-3">
              </Table>
            </div>

            <div class="card mt-3">

              <div class="card-header row">
                <div class="col mb-md-0 mb-2">
                  <h3 class="card-title">Invitations</h3>
                </div>
              </div>

              <Table :attributes="attributes_2" @inputUpdates="inputUpdates2">
                <template v-slot:role="props">{{ props.record.role.name }}</template>
                <template v-slot:invitee="props">{{ props.record.invitee.first_name + ' ' + props.record.invitee.last_name}}</template>
                <template v-slot:state="props">{{ firstLetterUpperCase(props.record.state) }}</template>
                <template v-slot:action="props">
                  <NuxtLink :to="`/admin/settings/users/${props.record.id}`" class="btn">Edit</NuxtLink>
                </template>
              </Table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "users",
  data() {
    return {
      attributes_1: {
        table_id: 'users_table',
        cache: true,
        loading: false,
        labels: [
          // {key: 'name' , name: 'Name', sort: true},
          {key: 'email', name: 'Email', sort: true},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      },
      attributes_2: {
        table_id: 'invitation_table',
        cache: true,
        loading: false,
        labels: [
          {key: 'email', name: 'Email', sort: true},
          {key: 'role', name: 'Role' },
          {key: 'invitee', name: 'Invited By'},
          {key: 'state', name: 'Status', sort: true},
          {key: 'action', name: 'Action'},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      }
    }
  },
  methods: {
    async getUserTableData(page = 1, sort = '', search = '', per_page = 15) {
      try {
        this.attributes_1.api_response = await this.$axios.$get('api/admin/users',
          {
            params: {
              per_page: per_page,
              page: page,
              sort: sort,
              'filter[search]': search,
              ...this.attributes_1.filters
            }
          }
        );

      } catch (error) {
      }
    },
    inputUpdates1(values) {
      this.attributes_1.table_component_values = values;
      this.getUserTableData(values.page, values.sort.sort_input, values.search, values.per_page)
    },
    async getInvitationTableData(page = 1, sort = '', search = '', per_page = 15) {
      try {
        this.attributes_2.api_response = await this.$axios.$get('api/admin/user-invitations',
          {
            params: {
              per_page: per_page,
              page: page,
              sort: sort,
              'filter[search]': search,
              ...this.attributes_2.filters
            }
          }
        );
      } catch (error) {
      }
    },
    inputUpdates2(values) {
      this.attributes_2.table_component_values = values;
      this.getInvitationTableData(values.page, values.sort.sort_input, values.search, values.per_page)
    },
  }
}
</script>

<style scoped>

</style>
