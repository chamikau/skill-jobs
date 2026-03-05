<template>
  <div id="tab-1" class="card tab-pane active show">
    <div class="contents">
      <Table :attributes="attributes" @inputUpdates="inputUpdates">
        <template v-slot:state="props">
        </template>
      </Table>
    </div>
  </div>
</template>

<script>

export default {
  name: "certification",
  layout: 'dashboard-admin',
  data() {
    return {
      cityAttributes: {
        data: [],
        selected: {}
      },
      change_password_form: {
        fields: {},
        error_message: '',
        errors: [],
      },
      skillAttributes: {
        data: [],
        selected: {}
      },
      student_year_attributes: {
        data: [],
        selected: {}
      },
      update_education_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
      hobbyAttributes: {
        data: [],
        selected: {}
      },
      industryTypeAttributes: {
        data: [],
        selected: {}
      },
      jobTypeAttributes: {
        data: [],
        selected: {}
      },
      attributes: {
        table_id: 'student_certification_table',
        cache: false,
        loading: false,
        labels: [
          {key: 'title', name: 'Certification Title', sort: true},
          {key: 'links', name: 'Certification Link', sort: true},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      },
    }
  },
  mounted() {
  },
  methods: {
    inputUpdates(values) {
      this.attributes.table_component_values = values;
      this.getEducationDetails(values.page, values.sort.sort_input, values.search, values.per_page)
    },
    async getEducationDetails(page = 1, sort = '', search = '', per_page = 15,) {
      try {
        this.attributes.api_response = await this.$axios.$get(`/api/admin/students/${this.$route.params.id}/certifications`,
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
        return error;
      }
    },
  }
}
</script>

<style scoped>

</style>
