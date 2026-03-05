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
<!--            <span class="mt-1 mx-1">-->
<!--                <svg class="icon icon-tabler icon-tabler-chevrons-right" fill="none" height="24"-->
<!--                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                     viewBox="0 0 24 24"-->
<!--                     width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>-->
<!--                <polyline points="7 7 12 12 7 17"></polyline>-->
<!--                <polyline points="13 7 18 12 13 17"></polyline>-->
<!--              </svg>-->
<!--              </span>-->
          </div>
          <div class="card">
            <div class="card-body"><h3 class="card-title">Filters</h3>
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
                <div class="col-md-4">
                  <lable class="form-label">Status</lable>
                  <Select
                    :attributes="job_state_attributes"
                    @selectUpdates="selectJobState"
                    @queryUpdates="getJobStateList"
                    placeholder="Search status"
                  >
                  </Select>
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
                <div class="col-md-auto ms-auto d-print-none">
                  <div class="btn-list">
                    <NuxtLink class="btn btn-primary" to="/admin/job/create-job/general">
                      <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                           xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                        <line x1="12" x2="12" y1="5" y2="19"/>
                        <line x1="5" x2="19" y1="12" y2="12"/>
                      </svg>
                      Create Job
                    </NuxtLink>
                  </div>
                </div>
              </div>
              <div class="contents">
                <Table :attributes="attributes" @inputUpdates="inputUpdates">
                  <template v-slot:state="props">
                    <span class="badge"
                          :class="'bg-' + (state_with_colors.find((x)=>x.state === props.record.state)).color + '-lt'">{{
                        firstLetterUpperCase(props.record.state)
                      }}</span>
                  </template>
                  <template v-slot:location_type="props">
                    <span>{{
                        firstLetterUpperCase(props.record.location_type)
                      }}</span>
                  </template>
<!--                  <template v-slot:action="props">-->
<!--                    <a class="btn" @click="$router.push(`/admin/organizations/clinics/${props.record.id}`)"></a>-->
<!--                  </template>-->
                  <template v-slot:action="props">
                    <button
                            data-bs-placement="bottom" data-bs-toggle="tooltip" title="Edit"
                            @click.stop="goToEditJob(props)" class="btn btn-sm btn-icon" aria-label="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                           class="bi bi-pencil-square text-black" viewBox="0 0 16 16">
                        <path
                          d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd"
                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                    </button>
                    <button class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-placement="right" title="Active"
                            v-if="props.record.state === 'inactive'" @click.prevent="activeOrInactiveJob(props.record)">
                      <svg style="margin:0" xmlns="http://www.w3.org/2000/svg"
                           class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                      </svg>
                    </button>
                    <button class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-placement="right" title="Inactive"
                            v-if="props.record.state === 'active'" @click.prevent="activeOrInactiveJob(props.record)">
                      <svg style="margin:0" xmlns="http://www.w3.org/2000/svg"
                           class="icon icon-tabler icon-tabler-minus" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l14 0"></path>
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
import {mapState} from "vuex";
import {state_with_colors, job_state_list} from '@/constants/constants.js';


export default {
  name: "index",
  layout: 'dashboard-admin',
  data() {
    return {
      state_with_colors,
      job_state_list,
      job_state_attributes: {
        data: [],
        selected: {}
      },
      jobs: "",
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
    async goToEditJob(props) {
      // await this.$setGlobalOrganization(props.record.id)
      await this.$router.push(`/admin/job/edit-job/${props.record.id}/general`)
    },
    async activeOrInactiveJob(job) {
      try {
        if (job.state === 'inactive') {
          await this.$axios.$post(`/api/company/jobs/${job.id}/active`)
          this.$toast.success('Active')
        } else if (job.state === 'active') {
          await this.$axios.$post(`/api/company/jobs/${job.id}/inactive`)
          this.$errorToast('Inactive')
        }
        await this.getJobs();
      } catch (e) {
        return e;
      }
    },
    async getJobs(page = 1, sort = '', search = '', per_page = 15,) {
      try {
        this.attributes.api_response = await this.$axios.$get('/api/company/jobs',
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
    selectJobState() {
      this.attributes.filters['filter[state]'] = this.job_state_attributes.selected.value;
      this.filterUpdates()
    },
    getJobStateList() {
      this.job_state_attributes.data = this.job_state_list
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
    this.getJobStateList();
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
