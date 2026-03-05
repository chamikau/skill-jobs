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
                  <h3 class="card-title">Consultation Forms</h3>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                  <div class="btn-list">
                    <NuxtLink class="btn btn-primary" to="/admin/settings/consultations/create">
                      <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                           xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                        <line x1="12" x2="12" y1="5" y2="19"/>
                        <line x1="5" x2="19" y1="12" y2="12"/>
                      </svg>
                      Create Consultation Form
                    </NuxtLink>
                  </div>
                </div>
              </div>

              <Table :attributes="attributes" @inputUpdates="inputUpdates">
                <template v-slot:tag="props">
                  {{ props.record.tag.name }}
                </template>
                <template v-slot:action="props">
                  <NuxtLink :to="`/admin/settings/consultations/${props.record.id}/form`" class="btn">View</NuxtLink>
                  <NuxtLink :to="`/admin/settings/consultations/${props.record.id}`" class="btn">Edit</NuxtLink>
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
  name: "index",
  layout: "dashboard-admin",
  data() {
    return {
      attributes: {
        table_id: 'consultation_forms_table',
        cache: true,
        loading: false,
        labels: [
          {key: 'name', name: 'Name', sort: true},
          {key: 'tag', name: 'Tag'},
          {key: 'description', name: 'Description', sort: true},
          {key: 'action', name: 'Action'},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      },
    }
  },
  methods: {
    async getConsultationsTableData(page = 1, sort = '', search = '', per_page = 15) {
      try {
        this.attributes.api_response = await this.$axios.$get('api/admin/consultation-forms',
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
      this.getConsultationsTableData(values.page, values.sort.sort_input, values.search, values.per_page)
    },
  }
}
</script>

<style scoped>

</style>
