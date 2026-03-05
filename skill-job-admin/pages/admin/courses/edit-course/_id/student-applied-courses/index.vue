<template>
  <div id="tab-1" class="card tab-pane active show">
    <div class="contents">
      <div class="row">
        <div class="col mt-3 ms-3">
          <h3 class="card-title">
            Students
          </h3>
        </div>
      </div>
      <div class="page-body">
        <div class="container-xl">
          <div class="contents">
            <Table :attributes="attributes">
              <template v-slot:student_name="props">
                {{props.record.first_name + ' ' + props.record.last_name}}
              </template>
              <template v-slot:state="props">
                    <span class="badge" :class="'bg-' + (applicant_state_with_colors.find(x => x.state === props.record.courses[0].pivot.state)).color + '-lt'">
                      {{ firstLetterUpperCase(props.record.courses[0].pivot.state) }}
                    </span>
              </template>
              <template v-slot:action="props">
                <button
                  data-bs-placement="bottom" data-bs-toggle="tooltip" title="View"
                  @click.stop="goToViewDetails(props.record.id)" class="btn  w-25 btn-icon" aria-label="">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                  </svg>
                </button>
              </template>
            </Table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import {applicant_state_with_colors} from '@/constants/constants.js';

export default {
  name: "index",
  layout: 'dashboard-admin',
  data() {
    return {
      applicant_state_with_colors,
      courses: [{}],
      attributes: {
        table_id: 'courses_table',
        cache: false,
        loading: false,
        labels: [
          {key: 'student_name', name: 'Student Name', sort: true},
          {key: 'email', name: 'Email', sort: true},
          {key: 'state', name: 'Status', sort: true},
          {key: 'action', name: 'Action'},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      },    }
  },
  mounted() {
    this.getCourseApplicantLists()
  },
  methods: {
    async goToViewDetails(id) {
      await this.$router.push(`/admin/students/student-view/${id}/general`)
    },
    async getCourseApplicantLists(page = 1, sort = '', search = '', per_page = 15,) {
      try {
        this.attributes.api_response =  await this.$axios.$get(`/api/admin/student-applied-courses/${this.$route.params.id}`,
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
        this.data = this.attributes.api_response;
        this.students = this.data.students
      } catch (error) {
        return error;
      }
    },
  },

}
</script>

<style scoped>

</style>
