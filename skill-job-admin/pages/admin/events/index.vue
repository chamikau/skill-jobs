<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a>Events</a></li>
          <li><a>Events List</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col d-flex align-items-center">
            <span class="fw-bold fs-1">Events List</span>
          </div>
          <div class="card">
            <div class="card-body"><h3 class="card-title">Filters</h3>
              <div class="row test-1">
                <div class="col-md-4">
                  <lable class="form-label">Event Name</lable>
                  <input
                    v-model="attributes.filters['filter[name]']"
                    @keyup="filterUpdates"
                    type="text"
                    class="form-control"
                    placeholder="Search event name">
                </div>
                <div class="col-md-4">
                  <lable class="form-label">Event Type</lable>
                  <Select
                    :attributes="eventAttributes"
                    placeholder="Select event type"
                    @queryUpdates="getEventTypes"
                    @selectUpdates="selectEvent"
                  />
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
                    Events List
                  </h3>
                </div>
                <div class="col-md-auto ms-auto d-print-none">
                  <div class="btn-list">
                    <NuxtLink class="btn btn-primary" to="/admin/events/create-event/general">
                      <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                           xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                        <line x1="12" x2="12" y1="5" y2="19"/>
                        <line x1="5" x2="19" y1="12" y2="12"/>
                      </svg>
                      Create Event
                    </NuxtLink>
                  </div>
                </div>
              </div>
              <div class="contents">
                <Table :attributes="attributes" @inputUpdates="inputUpdates">
                  <template v-slot:event_type_name="props">
                    {{props.record.event_type.name}}
                  </template>
                  <template v-slot:action="props">
                    <button
                      data-bs-placement="bottom" data-bs-toggle="tooltip" title="Edit"
                      @click.stop="goToViewDetails(props)" class="btn btn-sm btn-icon" aria-label="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                           class="bi bi-pencil-square text-black" viewBox="0 0 16 16">
                        <path
                          d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd"
                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
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


export default {
  name: "courses",
  layout: 'dashboard-admin',
  data() {
    return {
      courses: "",
      filters: {},
      attributes: {
        table_id: 'courses_table',
        cache: false,
        loading: false,
        labels: [
          {key: 'name', name: 'Event Name', sort: true},
          {key: 'event_type_name', name: 'Event Type', sort: true},
          {key: 'date', name: 'Date', sort: true},
          {key: 'location', name: 'Location Type', sort: true},
          // {key: 'description', name: 'Description', sort: true},
          {key: 'action', name: 'Action'},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      },
      eventAttributes: {
        data: [],
        selected: {}
      },
    }
  },
  mounted() {
    this.getEvents();
    this.getEventTypes()
  },
  methods: {
    async goToViewDetails(props) {
      await this.$router.push(`/admin/events/edit-event/${props.record.id}/general`)
    },
    async getEvents(page = 1, sort = '', search = '', per_page = 15,) {
      try {
        this.attributes.api_response = await this.$axios.$get('/api/admin/events',
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
        this.courses = this.data
      } catch (error) {
        return error;
      }
    },
    async getEventTypes(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/admin/event-types',{params:{'filter[search]':query}});
        this.eventAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectEvent() {
      this.attributes.filters['filter[event_type_id]'] = this.eventAttributes.selected.value;
      this.filterUpdates()
    },
    inputUpdates(values) {
      this.attributes.table_component_values = values;
      this.getEvents(values.page, values.sort.sort_input, values.search, values.per_page)
    },
    filterUpdates() {
      const values = this.attributes.table_component_values
      this.getEvents(1, values.sort.sort_input, values.search, values.per_page)
    },
    filterClear() {
      this.attributes.filters = {}
      this.eventAttributes.selected =  "";
      this.getEvents()
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
