<template>
  <div>
    <div class="">
      <div class="card">
        <div>
          <form @submit.prevent="updateSessionData()" ref="create_organization">
            <div class="card-header">
              <h5 class="card-title">Edit Session</h5>
            </div>
            <div class="card-body">
              <div class="mt-3">
                <label
                  :class="[update_session_form.errors.fees ? 'text-danger' : '']"
                  class="form-label">Session Fees</label>
                <input
                  v-model="update_session_form.fields.fees"
                  :class="[update_session_form.errors.fees ? 'is-invalid' : '']"
                  autocomplete="off"
                  placeholder="Enter session fees"
                  class="form-control" type="number"
                  @input="clearValidationSessionFeesError">
                <div v-if="update_session_form.errors.fees" class="invalid-feedback">
                  {{ update_session_form.errors.fees[0] }}
                </div>
              </div>
              <div class="row">
                <div class="mt-3 col-6">
                  <div class="mt-0">
                    <label
                      :class="[update_session_form.errors.session_type_id ? 'text-danger' : '']"
                      class="form-label">Session Type</label>
                    <Select
                      :attributes="sessionTypeAttributes"
                      :border_color_danger="update_session_form.errors.session_type_id"
                      :class="[update_session_form.errors.session_type_id ? 'is-invalid' : '']" autocomplete="off"
                      placeholder="Select session type"
                      @queryUpdates="getSessionType"
                      @selectUpdates="selectSessionType"
                      @input="clearValidationSessionTypeError"
                      :key="selectComponentKey"
                    />
                    <div v-if="update_session_form.errors.session_type_id" class="invalid-feedback">
                      {{ update_session_form.errors.session_type_id[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <label
                    :class="[update_session_form.errors.available_time ? 'text-danger' : '']"
                    class="form-label">Available Time</label>
                  <input
                    v-model="update_session_form.fields.available_time"
                    :class="[update_session_form.errors.available_time ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter available time"
                    class="form-control" type="time"
                    @input="clearValidationAvailableTimeError">
                  <div v-if="update_session_form.errors.available_time" class="invalid-feedback">
                    {{ update_session_form.errors.available_time[0] }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 mt-3">
                  <label
                    :class="[update_session_form.errors.description ? 'text-danger' : '']"
                    class="form-label">Description</label>
                  <textarea
                    v-model="update_session_form.fields.description"
                    :class="[update_session_form.errors.description ? 'is-invalid' : '']"
                    autocomplete="off"
                    placeholder="Enter description"
                    class="form-control" type="text"
                    @input="clearValidationDescriptionError">
                  </textarea>
                  <div v-if="update_session_form.errors.description" class="invalid-feedback">
                    {{ update_session_form.errors.description[0] }}
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
      session:"",
      update_session_form: {
        fields: {},
        error_message: '',
        errors: [],
      },
      sessionTypeAttributes: {
        data: [],
        selected: {}
      },
    }
  },
  mounted() {
    this.getSessionType()
    this.getSession()
  },
  methods: {
    clearValidationSessionFeesError() {
      this.update_session_form.errors.fees = false;
    },
    clearValidationSessionTypeError() {
      this.update_session_form.errors.session_type_id = false;
      this.selectComponentKey++
    },
    clearValidationAvailableTimeError() {
      this.update_session_form.errors.available_time = false;
    },
    clearValidationDescriptionError() {
      this.update_session_form.errors.description = false;
    },
    async getSession() {
      this.session = (await this.$axios.$get(`/api/admin/sessions/${this.$route.params.id}`)).data
      this.update_session_form.fields = this.session
      this.sessionTypeAttributes.selected = this.sessionTypeAttributes.data.find((x)=>x.value === this.session.session_type_id);
    },
    selectSessionType() {
      this.update_session_form.fields.session_type_id = this.sessionTypeAttributes.selected.value;
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
    async updateSessionData() {
      try {
        let session = await this.$axios.$put(`/api/admin/update-session/${this.$route.params.id}`, this.update_session_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push(`/admin/mentors/edit-mentor/${this.mentor_id}/sessions`)
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_session_form.errors = e.response.data.errors
        this.update_session_form.error_message = e.response.data.message
      }
    },
    async reset() {
      this.session = (await this.$axios.$get(`/api/admin/sessions/${this.$route.params.id}`)).data
      this.update_session_form.fields = this.session
      this.sessionTypeAttributes.selected = this.sessionTypeAttributes.data.find((x)=>x.value === this.session.session_type_id);
      this.update_session_form.errors = {}
    }
  },
}
</script>

<style scoped>

</style>
