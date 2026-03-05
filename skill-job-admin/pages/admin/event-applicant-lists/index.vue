<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a>Events</a></li>
          <li><a>Event Applicants</a></li>
        </ul>
        <div class="row g-2 align-items-center">
            <div class="col d-flex align-items-center">
              <span class="fw-bold fs-1">Event Applicants</span>
            </div>
          <div class="card">
            <div class="card-body"><h3 class="card-title">Filters</h3>
              <div class="row test-1">
                <div class="col-md-4">
                  <lable class="form-label">Event Name</lable>
                  <input
                    v-model="attributes.filters['filter[events.name]']"
                    @keyup="filterUpdates"
                    type="text"
                    class="form-control"
                    placeholder="Search event name">
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <div class="d-flex">
                <a
                  class="btn btn-outline-secondary ms-auto"
                  @click="filterClear()">Reset</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header row">
                <div class="col mt-md-0 mt-2">
                  <h3 class="card-title">
                    Event Applicants
                  </h3>
                </div>
              </div>
              <div class="contents">
                <Table :attributes="attributes" @inputUpdates="inputUpdates">
                  <template v-slot:name="props">
                    {{props.record.events.name }}
                  </template>
                  <template v-slot:event_organizer="props">
                    {{props.record.events.event_organizer }}
                  </template>
                  <template v-slot:student_name="props">
                    {{props.record.students.first_name + ' ' + props.record.students.last_name}}
                  </template>
                  <template v-slot:location="props">
                    {{props.record.events.location }}
                  </template>
                  <template v-slot:state="props">
                    <span class="badge"
                          :class="'bg-' + (applicant_state_with_colors.find((x)=>x.state === props.record.state)).color + '-lt'">{{
                        firstLetterUpperCase(props.record.state)
                      }}</span>
                  </template>
                  <template v-slot:action="props">
                    <button
                      data-bs-placement="bottom" data-bs-toggle="tooltip" title="View"
                      @click.stop="goToViewDetails(props)" class="btn  w-25 btn-icon" aria-label="">
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
      events: '',
      filters: {},
      attributes: {
        table_id: 'events_table',
        cache: false,
        loading: false,
        labels: [
          {key: 'name', name: 'Event Name', sort: true},
          {key: 'event_organizer', name: 'Event Organizer', sort: true},
          {key: 'student_name', name: 'Student Name', sort: true},
          {key: 'location', name: 'Location Type', sort: true},
          {key: 'state', name: 'Status', sort: true},
          {key: 'action', name: 'Action'},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      },
    }
  },
  methods: {
    // async goToViewDetails(props) {
    //   await this.$router.push(`/admin/event-applicant-lists/${props.record.students.id}/application`)
    // },
    async goToViewDetails(props) {
      const studentId = props.record.students.id;
      const eventId = props.record.events.id;
      await this.$router.push({
        path: `/admin/event-applicant-lists/event-application-view/${studentId}/general`,
        query: { studentId ,eventId },
      });
    },
    async getEventApplicantLists(page = 1, sort = '', search = '', per_page = 15,) {
      try {
        this.attributes.api_response = await this.$axios.$get('/api/admin/student-applied-events',
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
        this.courses = this.data.data
      } catch (error) {
        return error;
      }
    },
    inputUpdates(values) {
      this.attributes.table_component_values = values;
      this.getEventApplicantLists(values.page, values.sort.sort_input, values.search, values.per_page)
    },
    filterUpdates() {
      const values = this.attributes.table_component_values
      this.getEventApplicantLists(1, values.sort.sort_input, values.search, values.per_page)
    },
    filterClear() {
      this.attributes.filters = {}
      this.getEventApplicantLists()
    }
  },

}
</script>

<style scoped>
.breadcrumb {
  list-style: none;
  padding: 0;
  margin: 0;
}

.breadcrumb li {
  display: inline;
  color: #888;
}

.breadcrumb li:not(:last-child)::after {
  content: ">";
  margin-left: 0.7rem;
  margin-right: 0.7rem;
  color: #888;
}

.breadcrumb li:last-child {
  color: #888;
}
</style>
