<template>
  <div>
    <div class="container-xl">
      <!-- Page title -->
      <div class="card-header">
        <NuxtLink class="btn btn-icon me-3 mt-3" to="/admin/events">
          <svg class="icon icon-tabler icon-tabler-arrow-narrow-left" fill="none"
               height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
               viewBox="0 0 24 24"
               width="24" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
            <line x1="5" x2="19" y1="12" y2="12"></line>
            <line x1="5" x2="9" y1="12" y2="16"></line>
            <line x1="5" x2="9" y1="12" y2="8"></line>
          </svg>
        </NuxtLink>
        <h5 class="card-title mt-3">Create Event</h5>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
        <form ref="create_patient" @submit.prevent="createCompanyEventData">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Create Event</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-0">
                    <label :class="[create_event_form.errors.name ? 'text-danger' : '']"
                           class="form-label">Event Name</label>
                    <input v-model="create_event_form.fields.name"
                           :class="[create_event_form.errors.name ? 'is-invalid' : '']" autocomplete="off"
                           placeholder="Enter event name"
                           class="form-control" type="text"
                           @input="clearValidationNameError">
                    <div v-if="create_event_form.errors.name" class="invalid-feedback">
                      {{ create_event_form.errors.name[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mt-0">
                    <label :class="[create_event_form.errors.event_type_id ? 'text-danger' : '']"
                           class="form-label">Event Organizer</label>
                    <input v-model="create_event_form.fields.event_organizer"
                           :class="[create_event_form.errors.event_organizer ? 'is-invalid' : '']" autocomplete="off"
                           placeholder="Select event organizer"
                           class="form-control" type="text"
                           @input="clearValidationEventOrganizerError">
                    <div v-if="create_event_form.errors.event_organizer" class="invalid-feedback">
                      {{ create_event_form.errors.event_organizer[0] }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="mt-3 mb-1">
                      <label
                        :class="[create_event_form.errors.date ? 'text-danger' : '']"
                        class="form-label">
                        Date</label>
                      <input
                        v-model="create_event_form.fields.date"
                        :class="[create_event_form.errors.date ? 'is-invalid' : '']"
                        type="date" class="form-control "
                        placeholder="Enter event date"
                        autocomplete="off"
                        @input="clearValidationDateError">
                      <div v-if="create_event_form.errors.date" class="invalid-feedback">
                        {{ create_event_form.errors.date[0] }}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mt-3 mb-1">
                      <label :class="[create_event_form.errors.event_type_id ? 'text-danger' : '']"
                             class="form-label">Event Type</label>
                      <Select
                        :attributes="eventAttributes"
                        :border_color_danger="create_event_form.errors.event_type_id"
                        :class="[create_event_form.errors.event_type_id ? 'is-invalid' : '']" autocomplete="off"
                        placeholder="Select event type"
                        @queryUpdates="getEventTypes"
                        @selectUpdates="selectEvent"
                        @input="clearValidationEventTypeError"
                        :key="selectComponentKey"
                      />
                      <div v-if="create_event_form.errors.event_type_id" class="invalid-feedback">
                        {{ create_event_form.errors.event_type_id[0] }}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mt-3 mb-1">
                      <label
                        :class="[create_event_form.errors.location ? 'text-danger' : '']"
                        class="form-label">
                        Location</label>
                      <input
                        v-model="create_event_form.fields.location"
                        :class="[create_event_form.errors.location ? 'is-invalid' : '']"
                        type="text" class="form-control "
                        placeholder="Enter location"
                        autocomplete="off"
                        @input="clearValidationLocationError">
                      <div v-if="create_event_form.errors.location" class="invalid-feedback">
                        {{ create_event_form.errors.location[0] }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mt-3 mb-1">
                      <label
                        :class="[create_event_form.errors.description ? 'text-danger' : '']"
                        class="form-label">
                        Description</label>
                      <ckeditor :editor="editor" v-model="create_event_form.fields.description"
                                :config="editorConfig"
                                :class="[create_event_form.errors.description ? 'is-invalid' : '']"
                                @input="clearValidationDescriptionError"></ckeditor>
                      <div v-if="create_event_form.errors.description" class="invalid-feedback">
                        {{ create_event_form.errors.description[0] }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <div class="d-flex">
                <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="resetJob">Reset</button>
                <button class="btn btn-primary" type="submit">Create Event</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
  name: "create",
  layout: 'dashboard-admin',
  data() {
    return {
      selectComponentKey:1,
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
      },
      create_event_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
      eventAttributes: {
        data: [],
        selected: {}
      },
    }
  },
  mounted() {
    this.getEventTypes()
  },
  methods: {
    clearValidationNameError() {
      this.create_event_form.errors.name = false;
    },
    clearValidationEventTypeError() {
      this.create_event_form.errors.event_type_id = false;
      this.selectComponentKey++
    },
    clearValidationEventOrganizerError() {
      this.create_event_form.errors.event_organizer = false;
    },
    clearValidationDateError() {
      this.create_event_form.errors.date = false;
    },
    clearValidationLocationError() {
      this.create_event_form.errors.location = false;
    },
    clearValidationDescriptionError() {
      this.create_event_form.errors.description = false;
    },
    resetJob(){
      this.create_event_form.fields = {}
      this.create_event_form.errors = []
      this.eventAttributes.selected =  "";
    },
    async createCompanyEventData() {
      try {
        let company = await this.$axios.$post(`/api/admin/events`, this.create_event_form.fields)
        await this.$router.back();

      } catch (e) {
        this.create_event_form.errors = e.response.data.errors
        this.create_event_form.error_message = e.response.data.message
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
      this.create_event_form.fields.event_type_id = this.eventAttributes.selected.value;
    },
  },
}
</script>

<style scoped>
.required:after {
  content: "*";
  color: red;
}
</style>
