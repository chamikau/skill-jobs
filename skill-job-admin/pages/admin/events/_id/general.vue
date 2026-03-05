<template>
  <div>
    <div class="container-xl">
      <!-- Page title -->
      <div class="card-header">
        <NuxtLink class="btn btn-icon me-3 mt-3" to="/admin/events" @click="$router.back()">
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
        <h5 class="card-title mt-3">Edit Event</h5>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
        <form ref="create_patient" @submit.prevent="createEventData">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Edit Event</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-0">
                    <label :class="[update_event_form.errors.name ? 'text-danger' : '']"
                           class="form-label">Event Name</label>
                    <input v-model="update_event_form.fields.name"
                           :class="[update_event_form.errors.name ? 'is-invalid' : '']" autocomplete="off"
                           placeholder="Enter event name"
                           class="form-control" type="text"
                           @input="clearValidationNameError">
                    <div v-if="update_event_form.errors.name" class="invalid-feedback">
                      {{ update_event_form.errors.name[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mt-0">
                    <label :class="[update_event_form.errors.event_type_id ? 'text-danger' : '']"
                           class="form-label">Event Organizer</label>
                    <input v-model="update_event_form.fields.event_organizer"
                           :class="[update_event_form.errors.event_organizer ? 'is-invalid' : '']" autocomplete="off"
                           placeholder="Select event organizer"
                           class="form-control" type="text"
                           @input="clearValidationEventOrganizerError">
                    <div v-if="update_event_form.errors.event_organizer" class="invalid-feedback">
                      {{ update_event_form.errors.event_organizer[0] }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="mt-3 mb-1">
                      <label
                        :class="[update_event_form.errors.date ? 'text-danger' : '']"
                        class="form-label">
                        Date</label>
                      <input
                        v-model="update_event_form.fields.date"
                        :class="[update_event_form.errors.date ? 'is-invalid' : '']"
                        type="date" class="form-control "
                        placeholder="Enter event date"
                        autocomplete="off"
                        @input="clearValidationDateError">
                      <div v-if="update_event_form.errors.date" class="invalid-feedback">
                        {{ update_event_form.errors.date[0] }}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mt-3 mb-1">
                      <label :class="[update_event_form.errors.event_type_id ? 'text-danger' : '']"
                             class="form-label">Event Type</label>
                      <Select
                        :attributes="eventAttributes"
                        :border_color_danger="update_event_form.errors.event_type_id"
                        :class="[update_event_form.errors.event_type_id ? 'is-invalid' : '']" autocomplete="off"
                        placeholder="Select event type"
                        @queryUpdates="getEventTypes"
                        @selectUpdates="selectEvent"
                        @input="clearValidationEventTypeError"
                        :key="selectComponentKey"
                      />
                      <div v-if="update_event_form.errors.event_type_id" class="invalid-feedback">
                        {{ update_event_form.errors.event_type_id[0] }}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mt-3 mb-1">
                      <label
                        :class="[update_event_form.errors.location ? 'text-danger' : '']"
                        class="form-label">
                        Location</label>
                      <input
                        v-model="update_event_form.fields.location"
                        :class="[update_event_form.errors.location ? 'is-invalid' : '']"
                        type="text" class="form-control "
                        placeholder="Enter location"
                        autocomplete="off"
                        @input="clearValidationLocationError">
                      <div v-if="update_event_form.errors.location" class="invalid-feedback">
                        {{ update_event_form.errors.location[0] }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mt-3 mb-1">
                      <label
                        :class="[update_event_form.errors.description ? 'text-danger' : '']"
                        class="form-label">
                        Description</label>
                      <ckeditor :editor="editor" v-model="update_event_form.fields.description"
                                :config="editorConfig"
                                :class="[update_event_form.errors.description ? 'is-invalid' : '']"
                                @input="clearValidationDescriptionError"></ckeditor>
                      <div v-if="update_event_form.errors.description" class="invalid-feedback">
                        {{ update_event_form.errors.description[0] }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <div class="d-flex">
                <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="resetJob">Reset</button>
                <button class="btn btn-primary" type="submit">Edit Event</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>

import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
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
      eventAttributes: {
        data: [],
        selected: {}
      },
      roles_list: {},
      update_event_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
      events:{
        event_type:{}
      }
    }
  },
  mounted() {
    this.getEvents()
    this.getEventTypes()
  },
  methods: {
    clearValidationNameError() {
      this.update_event_form.errors.name = false;
    },
    clearValidationEventTypeError() {
      this.update_event_form.errors.event_type_id = false;
      this.selectComponentKey++
    },
    clearValidationEventOrganizerError() {
      this.update_event_form.errors.event_organizer = false;
    },
    clearValidationDateError() {
      this.update_event_form.errors.date = false;
    },
    clearValidationLocationError() {
      this.update_event_form.errors.location = false;
    },
    clearValidationDescriptionError() {
      this.update_event_form.errors.description = false;
    },
    async resetJob(){
      try {
        this.events = (await this.$axios.$get(`/api/admin/events/${this.$route.params.id}`)).data
        this.update_event_form.fields = this.events
        this.eventAttributes.selected =  this.events.event_type;
        this.update_event_form.errors = []
      }catch (e){
        return e;
      }
    },
    async createEventData() {
      try {
        let company = await this.$axios.$put(`/api/admin/events/${this.$route.params.id}`, this.update_event_form.fields)
        await this.$router.back();

      } catch (e) {
        this.update_event_form.errors = e.response.data.errors
        this.update_event_form.error_message = e.response.data.message
      }
    },
    async getEvents() {
      try {
        this.events = (await this.$axios.$get(`/api/admin/events/${this.$route.params.id}`)).data
        this.update_event_form.fields = this.events
        this.eventAttributes.selected =  this.events.event_type;
      }catch (e){
        return e;
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
      this.update_event_form.fields.event_type_id = this.eventAttributes.selected.value;
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
