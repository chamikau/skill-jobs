<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="createSessionData( mentors.id)" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Add Session</h5>
            </div>
            <div class="card-body">
              <div class="mt-3">
                <label
                  :class="[create_session_form.errors.fees ? 'text-danger' : '']"
                  class="form-label">Session Fees</label>
                <input
                  v-model="create_session_form.fields.fees"
                  :class="[create_session_form.errors.fees ? 'is-invalid' : '']"
                  autocomplete="off"
                  placeholder="Enter session fees"
                  class="form-control" type="number"
                  @input="clearValidationSessionFeesError">
                <div v-if="create_session_form.errors.fees" class="invalid-feedback">
                  {{ create_session_form.errors.fees[0] }}
                </div>
              </div>
              <div class="row">
                <div class="mt-3 col-6">
                  <div class="mt-0">
                    <label
                      :class="[create_session_form.errors.session_type_id ? 'text-danger' : '']"
                      class="form-label">Session Type</label>
                    <Select
                      :attributes="sessionTypeAttributes"
                      :border_color_danger="create_session_form.errors.session_type_id"
                      :class="[create_session_form.errors.session_type_id ? 'is-invalid' : '']" autocomplete="off"
                      placeholder="Select session type"
                      @queryUpdates="getSessionType"
                      @selectUpdates="selectSessionType"
                      @input="clearValidationSessionTypeError"
                      :key="selectComponentKey"
                    />
                    <div v-if="create_session_form.errors.session_type_id" class="invalid-feedback">
                      {{ create_session_form.errors.session_type_id[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <label
                    :class="[create_session_form.errors.available_time ? 'text-danger' : '']"
                    class="form-label">Available Time</label>
                  <input
                    v-model="create_session_form.fields.available_time"
                    :class="[create_session_form.errors.available_time ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter available time"
                    class="form-control" type="time"
                    @input="clearValidationAvailableTimeError">
                  <div v-if="create_session_form.errors.available_time" class="invalid-feedback">
                    {{ create_session_form.errors.available_time[0] }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 mt-3">
                  <label
                    :class="[create_session_form.errors.description ? 'text-danger' : '']"
                    class="form-label">Description</label>
                  <textarea
                    v-model="create_session_form.fields.description"
                    :class="[create_session_form.errors.description ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter description"
                    class="form-control" type="text"
                    @input="clearValidationDescriptionError">
                  </textarea>
                  <div v-if="create_session_form.errors.description" class="invalid-feedback">
                    {{ create_session_form.errors.description[0] }}
                  </div>
                </div>
            </div>
            <div class="card-footer text-end mt-3">
              <div class="d-flex">
                <a class="btn btn-outline-secondary ms-auto me-2" href="#" @click="reset()">Reset</a>
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "general",
  data() {
    return {
      selectComponentKey:1,
      session_type_id:null,
      mentors:"",
      create_session_form: {
        fields: {},
        error_message: '',
        errors: []
      },
      sessionTypeAttributes: {
        data: [],
        selected: {}
      },
    }
  },
  mounted() {
    this.getSessionType()
    this.getMentors()
  },
  methods: {
    clearValidationSessionFeesError() {
      this.create_session_form.errors.fees = false;
    },
    clearValidationSessionTypeError() {
      this.create_session_form.errors.session_type_id = false;
      this.selectComponentKey++
    },
    clearValidationAvailableTimeError() {
      this.create_session_form.errors.available_time = false;
    },
    clearValidationDescriptionError() {
      this.create_session_form.errors.description = false;
    },
    async getMentors() {
      this.mentors = (await this.$axios.$get(`/api/admin/mentors/${this.$route.params.id}`)).data
    },
    selectSessionType() {
      this.create_session_form.fields.session_type_id = this.sessionTypeAttributes.selected.value;
    },
    async getSessionType(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/admin/session-types', {params: {'filter[search]': query}});
        this.sessionTypeAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    async createSessionData(mentor_id) {
      try {
        this.mentor_id = mentor_id
        this.create_session_form.fields.mentor_id = this.mentor_id;
        let session = await this.$axios.$post(`api/admin/sessions`, this.create_session_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push(`/admin/mentors/add-mentor/${mentor_id}/sessions`)
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_session_form.errors = e.response.data.errors
        this.create_session_form.error_message = e.response.data.message
      }
    },
    selectCity() {
      this.create_session_form.fields.city_id = this.cityAttributes.selected.value;
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
    },
    async reset() {
      this.create_session_form.fields = ""
      this.create_session_form.errors = {}
      this.sessionTypeAttributes.selected = {}
    }
  },
}
</script>

<style scoped>

</style>
