<template>
  <div id="tab-1" class="card tab-pane active show">
    <div class="contents">
      <Table :attributes="attributes" @inputUpdates="inputUpdates">
        <template v-slot:state="props">
        </template>
        <template v-slot:field_of_study_type_name="props">
          {{props.record.field_of_study_types.name}}
        </template>
      </Table>
    </div>
  </div>
</template>

<script>

export default {
  name: "education",
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
        table_id: 'student_education_table',
        cache: false,
        loading: false,
        labels: [
          {key: 'university_name', name: 'University Name', sort: true},
          {key: 'field_of_study_type_name', name: 'Field Of Study type', sort: true},
          {key: 'course_name', name: 'Course', sort: true},
          {key: 'start_year', name: 'Start Year', sort: true}
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
        this.attributes.api_response = await this.$axios.$get(`/api/admin/students/${this.$route.params.id}/educations`,
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
