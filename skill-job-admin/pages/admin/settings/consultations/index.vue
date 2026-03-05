<template>
  <div>
    <!-- Users table -->
    <div>
      <div class="">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <Table :attributes="attributes" @inputUpdates="inputUpdates">
                <template v-slot:tag="props">
                  {{ props.record.tag.name }}
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
