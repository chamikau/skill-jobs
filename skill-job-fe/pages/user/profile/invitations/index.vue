<template>
      <div class="row">
        <div class="col-md-12">
          <div class="card">

            <div class="card-header row">
              <div class="col mb-md-0 mb-2">
                <h3 class="card-title">Invitations</h3>
              </div>
            </div>

            <Table :attributes="attributes" @inputUpdates="inputUpdates">
<!--              <template v-slot:name="props">{{ props.record.first_name }} {{props.record.last_name}}</template>-->
<!--              <template v-slot:state="props">{{ firstLetterUpperCase(props.record.state) }}</template>-->
<!--              <template v-slot:action="props">-->
<!--                <NuxtLink class="btn" :to="`/admin/trainers/${props.record.id}/general`"-->
<!--                >Edit</NuxtLink>-->
<!--                <button class="btn" @click="changeState(props.record)"-->
<!--                >{{ props.record.state==='active' ? 'Inactive' : 'Active'}}</button>-->
<!--              </template>-->

            </Table>
          </div>
        </div>
      </div>
</template>

<script>
export default {
  name: "general",
  data() {
    return {
      attributes: {
        table_id: 'profile_invite_table',
        cache: true,
        loading: false,
        labels: [
          {key: 'email', name: 'Email'},
          {key: 'state', name: 'status'},
          {key: 'action', name: 'Action'},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      }
    }
  },
  methods: {
    async getProfileInviteTableData(page = 1, sort = '', search = '', per_page = 15) {
      try {
        this.attributes.api_response = await this.$axios.$get('api/admin/user-invitations',
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
      this.getProfileInviteTableData(values.page, values.sort.sort_input, values.search, values.per_page)
    },
    filterUpdates() {
      const values = this.attributes.table_component_values
      this.getProfileInviteTableData(1, values.sort.sort_input, values.search, values.per_page)
    },
    filterClear() {
      this.attributes.filters = {}
      this.filterUpdates()
    }
  }
}
</script>

<style scoped>

</style>
