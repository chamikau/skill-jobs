<template>
  <div>
     <form ref="create_patient" @submit.prevent="createCompanyJobData">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Create job</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="row">
                  <div class="col-md-12">
                    <div class="mt-0">
                      <label :class="[create_company_job_form.errors.title ? 'text-danger' : '']"
                             class="form-label">Job Title</label>
                      <input v-model="create_company_job_form.fields.title"
                             :class="[create_company_job_form.errors.title ? 'is-invalid' : '']" autocomplete="off"
                             placeholder="Enter job title"
                             class="form-control" type="text"
                             @input="clearValidationJobTitleError">
                      <div v-if="create_company_job_form.errors.title" class="invalid-feedback">
                        {{ create_company_job_form.errors.title[0] }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mt-3">
                      <label
                        :class="[create_company_job_form.errors.city_id ? 'text-danger' : '']"
                        class="form-label">City</label>
                      <Select
                        :attributes="cityAttributes"
                        :border_color_danger="create_company_job_form.errors.city_id"
                        :class="[create_company_job_form.errors.city_id ? 'is-invalid' : '']" autocomplete="off"
                        placeholder="Select city"
                        @queryUpdates="getCities"
                        @selectUpdates="selectCity"
                        @input="clearValidationCityError"
                        :key="selectComponentKey"
                      />
                      <div v-if="create_company_job_form.errors.city_id" class="invalid-feedback">
                        {{ create_company_job_form.errors.city_id[0] }}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mt-3">
                      <label
                        :class="[create_company_job_form.errors.number_of_openings ? 'text-danger' : '']"
                        class="form-label">Openings</label>
                      <input
                        v-model="create_company_job_form.fields.number_of_openings"
                        :class="[create_company_job_form.errors.number_of_openings ? 'is-invalid' : '']"
                        autocomplete="off"
                        placeholder=""
                        class="form-control w-100" type="number"
                        @input="clearValidationNumberOfOpeningError"
                      >
                      <div v-if="create_company_job_form.errors.number_of_openings" class="invalid-feedback">
                        {{ create_company_job_form.errors.number_of_openings[0] }}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mt-3">
                      <label
                        :class="[create_company_job_form.errors.probation_duration ? 'text-danger' : '']"
                        class="form-label">Duration (Months)</label>
                      <input
                        v-model="create_company_job_form.fields.probation_duration"
                        :class="[create_company_job_form.errors.probation_duration ? 'is-invalid' : '']"
                        autocomplete="off"
                        placeholder=""
                        class="form-control w-100" type="number"
                        @input="clearValidationProbationDurationError">
                      <div v-if="create_company_job_form.errors.probation_duration" class="invalid-feedback">
                        {{ create_company_job_form.errors.probation_duration[0] }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mt-3">
                      <label
                        :class="[create_company_job_form.errors.location_type ? 'text-danger' : '']"
                        class="form-label">Work Mode</label>
                      <Select
                        :border_color_danger="create_company_job_form.errors.location_type"
                        :class="[create_company_job_form.errors.location_type ? 'is-invalid' : '']"
                        :attributes="locationTypeAttributes"
                        placeholder="Enter work mode"
                        @queryUpdates="getLocationTypeList"
                        @selectUpdates="selectLocationTypeList"
                        @input="clearValidationLocationTypeError"
                        :key="selectComponentKey"
                      >
                      </Select>
                      <div v-if="create_company_job_form.errors.location_type" class="invalid-feedback">
                        {{ create_company_job_form.errors.location_type[0] }}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mt-3">
                      <label
                        :class="[create_company_job_form.errors.work_hours ? 'text-danger' : '']"
                        class="form-label">Working Hours</label>
                      <input
                        v-model="create_company_job_form.fields.work_hours"
                        :class="[create_company_job_form.errors.work_hours ? 'is-invalid' : '']"
                        autocomplete="off"
                        placeholder=""
                        class="form-control w-100" type="number"
                        @input="clearValidationWorkHourError">
                      <div v-if="create_company_job_form.errors.work_hours" class="invalid-feedback">
                        {{ create_company_job_form.errors.work_hours[0] }}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mt-3">
                      <label
                        :class="[create_company_job_form.errors.work_hour_rate ? 'text-danger' : '']"
                        class="form-label">Salary ($)</label>
                      <input
                        v-model="create_company_job_form.fields.work_hour_rate"
                        :class="[create_company_job_form.errors.work_hour_rate ? 'is-invalid' : '']"
                        autocomplete="off"
                        placeholder=""
                        class="form-control w-100" type="number"
                        @input="clearValidationWorkHourRateError">
                      <div v-if="create_company_job_form.errors.work_hour_rate" class="invalid-feedback">
                        {{ create_company_job_form.errors.work_hour_rate[0] }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer text-end">
              <div class="d-flex">
                <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="resetJob">Reset</button>
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </div>
          </div>
        </form>
  </div>
</template>

<script>
import {job_location_type} from "@/constants/constants";
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
  name: "create",
  layout: 'dashboard-admin',
  data() {
    return {
      selectComponentKey:1,
      editorConfig: {
        // The configuration of the editor.
      },
      job_location_type,
      locationTypeAttributes: {
        data: [],
        selected: {}
      },
      cityAttributes: {
        data: [],
        selected: {}
      },
      industryTypeAttributes: {
        data: [],
        selected: {}
      },
      roles_list: {},
      create_company_job_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      }
    }
  },
  mounted() {
    this.getCities();
    this.getLocationTypeList();
  },
  methods: {
    clearValidationJobTitleError() {
      this.create_company_job_form.errors.title = false;
    },
    clearValidationCityError() {
      this.create_company_job_form.errors.city_id = false;
      this.selectComponentKey++
    },
    clearValidationNumberOfOpeningError() {
      this.create_company_job_form.errors.number_of_openings = false;
    },
    clearValidationLocationTypeError() {
      this.create_company_job_form.errors.location_type = false;
      this.selectComponentKey++
    },
    clearValidationProbationDurationError() {
      this.create_company_job_form.errors.probation_duration = false;
    },
    clearValidationWorkHourError() {
      this.create_company_job_form.errors.work_hours = false;
    },
    clearValidationWorkHourRateError() {
      this.create_company_job_form.errors.work_hour_rate = false;
    },
    resetJob(){
      this.create_company_job_form.fields = {}
      this.locationTypeAttributes.selected = {}
      this.cityAttributes.selected = {}
      this.create_company_job_form.errors = []
    },
    async createCompanyJobData() {
      try {
        let job = await this.$axios.$post(`/api/company/jobs`, this.create_company_job_form.fields)
        this.$emit('child-event', job);
        this.$toast.success('Saved successfully!')
        await this.$router.push(`/admin/job/create-job/${job.id}/description`);
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_company_job_form.errors = e.response.data.errors
        this.create_company_job_form.error_message = e.response.data.message
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
              'filters[search]': search,
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
    async getCities(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/company/cities', {params: {'filter[search]': query}});
        this.cityAttributes.data = attributes.data.map((x) => ({
          name: `${x.name} - ${x.country.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectCity() {
      this.create_company_job_form.fields.city_id = this.cityAttributes.selected.value;
    },
    async resetColFilters() {
      this.filters = {};
    },
    selectLocationTypeList() {
      this.create_company_job_form.fields.location_type = this.locationTypeAttributes.selected.value;
    },
    getLocationTypeList() {
      this.locationTypeAttributes.data = this.job_location_type
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
      this.filterUpdates()
    }
  },
}
</script>

<style scoped>
.required:after {
  content: "*";
  color: red;
}
</style>
