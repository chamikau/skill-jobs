<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a>Jobs</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col d-flex align-items-center">
            <span class="fw-bold fs-1">Jobs</span>
          </div>
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Filters</h3>
              <div class="row test-1">
                <div class="col-md-4">
                  <lable class="form-label">Job Title</lable>
                  <input
                    v-model="attributes.filters['filter[title]']"
                    @keyup="filterUpdates"
                    type="text"
                    class="form-control"
                    placeholder="Search job title">
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
                    Jobs List
                  </h3>
                </div>
              </div>
              <div class="contents">
                <Table :attributes="attributes" @inputUpdates="inputUpdates">
                  <template v-slot:location_type="props">
                    {{firstLetterUpperCase(props.record.location_type)}}
                  </template>
<!--                  <template v-slot:state="props">-->
<!--                    <span class="badge"-->
<!--                          :class="'bg-' + (state_with_colors.find((x)=>x.state === props.record.state)).color + '-lt'">{{-->
<!--                        props.record.state-->
<!--                      }}</span>-->
<!--                  </template>-->
<!--                  <template v-slot:action="props">-->
<!--                    <a class="btn" @click="$router.push(`/admin/organizations/clinics/${props.record.id}`)"></a>-->
<!--                  </template>-->
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
import {state_with_colors, job_state_list} from '@/constants/constants.js';


export default {
  name: "index",
  layout: 'dashboard-user',
  data() {
    return {
      state_with_colors,
      job_state_list,
      job_state_attributes: {
        data: [],
        selected: {}
      },
      jobs: {
        location_type:'',
      },
      filters: {},
      attributes: {
        table_id: 'jobs_table',
        cache: false,
        loading: false,
        labels: [
          {key: 'title', name: 'Job Title', sort: true},
          {key: 'number_of_openings', name: 'Openings', sort: true},
          {key: 'location_type', name: 'Work Mode', sort: true},
          {key: 'probation_duration', name: 'Duration', sort: true},
          // {key: 'state', name: 'Status', sort: true},
          {key: 'action', name: 'Action'},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      },
    }
  },
  methods: {
    async goToViewDetails(props) {
      // await this.$setGlobalOrganization(props.record.id)
      await this.$router.push(`/user/job/${props.record.id}/application`)
    },
    async getJobs(page = 1, sort = '', search = '', per_page = 15,) {
      try {
        this.attributes.api_response = await this.$axios.$get('/api/student/jobs',
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
        this.jobs = this.data.data
      } catch (error) {
        return error;
      }
    },
    inputUpdates(values) {
      this.attributes.table_component_values = values;
      this.getJobs(values.page, values.sort.sort_input, values.search, values.per_page)
    },
    filterUpdates() {
      const values = this.attributes.table_component_values
      this.getJobs(1, values.sort.sort_input, values.search, values.per_page)
    },
    filterClear() {
      this.attributes.filters = {}
      this.job_state_attributes.selected = {}
      this.getJobs()
    }
  },
  mounted() {
    this.getJobs();
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
