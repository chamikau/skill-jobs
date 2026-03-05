<template>
  <div>
    <div class="">
      <div class="">
        <div class="card">
          <div>
            <form @submit.prevent="createCompanyJobData" ref="create_organization">
              <div class="card-header">
                <h5 class="card-title">Edit Job</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mt-0">
                        <label :class="[update_job_form.errors.title ? 'text-danger' : '']"
                               class="form-label">Job Title</label>
                        <input v-model="update_job_form.fields.title"
                               :class="[update_job_form.errors.title ? 'is-invalid' : '']" autocomplete="off"
                               placeholder="Enter job title"
                               class="form-control" type="text"
                               @input="clearValidationJobTitleError">
                        <div v-if="update_job_form.errors.title" class="invalid-feedback">
                          {{ update_job_form.errors.title[0] }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mt-3">
                        <label
                          :class="[update_job_form.errors.city_id ? 'text-danger' : '']"
                          class="form-label">City</label>
                        <Select
                          :attributes="cityAttributes"
                          :border_color_danger="update_job_form.errors.city_id"
                          :class="[update_job_form.errors.city_id ? 'is-invalid' : '']" autocomplete="off"
                          placeholder="Select city"
                          @queryUpdates="getCities"
                          @selectUpdates="selectCity"
                          @input="clearValidationCityError"
                          :key="selectComponentKey"
                        />
                        <div v-if="update_job_form.errors.city_id" class="invalid-feedback">
                          {{ update_job_form.errors.city_id[0] }}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="mt-3">
                        <label
                          :class="[update_job_form.errors.number_of_openings ? 'text-danger' : '']"
                          class="form-label">Openings</label>
                        <input
                          v-model="update_job_form.fields.number_of_openings"
                          :class="[update_job_form.errors.number_of_openings ? 'is-invalid' : '']"
                          autocomplete="off"
                          placeholder=""
                          class="form-control w-100" type="number"
                          @input="clearValidationNumberOfOpeningError"
                        >
                        <div v-if="update_job_form.errors.number_of_openings" class="invalid-feedback">
                          {{ update_job_form.errors.number_of_openings[0] }}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="mt-3">
                        <label
                          :class="[update_job_form.errors.probation_duration ? 'text-danger' : '']"
                          class="form-label">Duration (Months)</label>
                        <input
                          v-model="update_job_form.fields.probation_duration"
                          :class="[update_job_form.errors.probation_duration ? 'is-invalid' : '']"
                          autocomplete="off"
                          placeholder=""
                          class="form-control w-100" type="number"
                          @input="clearValidationProbationDurationError">
                        <div v-if="update_job_form.errors.probation_duration" class="invalid-feedback">
                          {{ update_job_form.errors.probation_duration[0] }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mt-3">
                        <label
                          :class="[update_job_form.errors.location_type ? 'text-danger' : '']"
                          class="form-label">Work Mode</label>
                        <Select
                          :border_color_danger="update_job_form.errors.location_type"
                          :class="[update_job_form.errors.location_type ? 'is-invalid' : '']"
                          :attributes="locationTypeAttributes"
                          placeholder="Enter work mode"
                          @queryUpdates="getLocationTypeList"
                          @selectUpdates="selectLocationTypeList"
                          @input="clearValidationLocationTypeError"
                          :key="selectComponentKey"
                        >
                        </Select>
                        <div v-if="update_job_form.errors.location_type" class="invalid-feedback">
                          {{ update_job_form.errors.location_type[0] }}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="mt-3">
                        <label
                          :class="[update_job_form.errors.work_hours ? 'text-danger' : '']"
                          class="form-label">Working Hours</label>
                        <input
                          v-model="update_job_form.fields.work_hours"
                          :class="[update_job_form.errors.work_hours ? 'is-invalid' : '']"
                          autocomplete="off"
                          placeholder=""
                          class="form-control w-100" type="number"
                          @input="clearValidationWorkHourError">
                        <div v-if="update_job_form.errors.work_hours" class="invalid-feedback">
                          {{ update_job_form.errors.work_hours[0] }}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="mt-3">
                        <label
                          :class="[update_job_form.errors.work_hour_rate ? 'text-danger' : '']"
                          class="form-label">Salary ($)</label>
                        <input
                          v-model="update_job_form.fields.work_hour_rate"
                          :class="[update_job_form.errors.work_hour_rate ? 'is-invalid' : '']"
                          autocomplete="off"
                          placeholder=""
                          class="form-control w-100" type="number"
                          @input="clearValidationWorkHourRateError">
                        <div v-if="update_job_form.errors.work_hour_rate" class="invalid-feedback">
                          {{ update_job_form.errors.work_hour_rate[0] }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer text-end">
                <div class="d-flex">
                  <a class="btn btn-outline-secondary ms-auto me-2" href="#" @click="reset()">Reset</a>
                  <button class="btn btn-primary" type="submit">Edit Job</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {job_location_type} from "@/constants/constants";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
  name: "general",
  layout: 'dashboard-admin',
  data() {
    return {
      selectComponentKey:1,
      job_location_type,
      locationTypeAttributes: {
        data: [],
        selected: {}
      },
      job: "",
      jobs_list: "",
      cityAttributes: {
        data: [],
        selected: {}
      },
      update_job_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
    }
  },
  async mounted() {
    await this.getCities()
    await this.getJobs()
    this.getLocationTypeList();
    // this.getLocation()
  },
  methods: {
    clearValidationJobTitleError() {
      this.update_job_form.errors.title = false;
    },
    clearValidationCityError() {
      this.update_job_form.errors.city_id = false;
      this.selectComponentKey++
    },
    clearValidationNumberOfOpeningError() {
      this.update_job_form.errors.number_of_openings = false;
    },
    clearValidationLocationTypeError() {
      this.update_job_form.errors.location_type = false;
      this.selectComponentKey++
    },
    clearValidationProbationDurationError() {
      this.update_job_form.errors.probation_duration = false;
    },
    clearValidationWorkHourError() {
      this.update_job_form.errors.work_hours = false;
    },
    clearValidationWorkHourRateError() {
      this.update_job_form.errors.work_hour_rate = false;
    },
    async createCompanyJobData() {
      try {
        let job = await this.$axios.$put(`/api/company/update-job/${this.$route.params.id}`, this.update_job_form.fields)
        this.$toast.success('Saved successfully!')
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_job_form.errors = e.response.data.errors
        this.update_job_form.error_message = e.response.data.message
      }
    },
    async getJobs() {
      try {
        this.job = (await this.$axios.$get(`/api/company/jobs/${this.$route.params.id}`)).data
        this.update_job_form.fields = this.job
        this.locationTypeAttributes.data = this.job.location_type
        this.locationTypeAttributes.selected['name'] = this.job.location_type
        this.cityAttributes.selected = this.cityAttributes.data.find((x)=>x.value === this.job.city_id);
      }catch (e){
        return e;
      }
    },

    async getCities(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/company/cities',{params:{'filter[search]':query}});
        this.cityAttributes.data = attributes.data.map((x) => ({
          name: `${x.name} - ${x.country.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectCity() {
      this.update_job_form.fields.city_id = this.cityAttributes.selected.value;
    },
    selectLocationTypeList() {
      this.update_job_form.fields.location_type = this.locationTypeAttributes.selected.value;
    },
    getLocationTypeList() {
      this.locationTypeAttributes.data = this.job_location_type
    },
    async reset() {
      try {
        this.job = (await this.$axios.$get(`/api/company/jobs/${this.$route.params.id}`)).data
        this.update_job_form.fields = this.job
        this.cityAttributes.selected = this.cityAttributes.data.find((x)=>x.value === this.job.city_id);
        this.locationTypeAttributes.selected['name'] = this.job.location_type
      }catch (e){
        return e;
      }
    }
  },
}
</script>

<style scoped>

</style>
