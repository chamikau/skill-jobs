<template>
  <div>
    <div class="">
      <div class="">
        <form ref="create_patient" @submit.prevent="createMentorsData">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Create Mentor</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-0">
                    <label :class="[create_mentors_form.errors.name ? 'text-danger' : '']"
                           class="form-label">Mentor Name</label>
                    <input v-model="create_mentors_form.fields.name"
                           :class="[create_mentors_form.errors.name ? 'is-invalid' : '']" autocomplete="off"
                           placeholder="Enter mentor name"
                           class="form-control" type="text"
                           @input="clearValidationNameError">
                    <div v-if="create_mentors_form.errors.name" class="invalid-feedback">
                      {{ create_mentors_form.errors.name[0] }}
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mt-0 mb-0">
                    <label
                      :class="[create_mentors_form.errors.position ? 'text-danger' : '']"
                      class="form-label">
                      Position</label>
                    <input
                      v-model="create_mentors_form.fields.position"
                      :class="[create_mentors_form.errors.position ? 'is-invalid' : '']"
                      type="text" class="form-control "
                      placeholder="Enter mentor position"
                      autocomplete="off"
                      @input="clearValidationPositionError"  />
                    <div v-if="create_mentors_form.errors.position" class="invalid-feedback">
                      {{ create_mentors_form.errors.position[0] }}
                    </div>
                  </div>
                </div>
                <!--                <div class="col-md-6">-->
                <!--                  <div class="mt-0">-->
                <!--                    <label :class="[create_mentors_form.errors.mentor_type_id ? 'text-danger' : '']"-->
                <!--                           class="form-label">Session Type</label>-->
                <!--                    <Select-->
                <!--                      :attributes="SessionAttributes"-->
                <!--                      :border_color_danger="create_mentors_form.errors.mentor_type_id"-->
                <!--                      :class="[create_mentors_form.errors.mentor_type_id ? 'is-invalid' : '']" autocomplete="off"-->
                <!--                      placeholder="Select Session Type"-->
                <!--                      @queryUpdates="getMentorTypes"-->
                <!--                      @selectUpdates="selectMentors"-->
                <!--                    />-->
                <!--                    <div v-if="create_mentors_form.errors.mentor_type_id" class="invalid-feedback">-->
                <!--                      {{ create_mentors_form.errors.mentor_type_id[0] }}-->
                <!--                    </div>-->
                <!--                  </div>-->
                <!--                </div>-->
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[create_mentors_form.errors.phone_number_1 ? 'text-danger' : '']"
                      class="form-label">
                      Phone Number</label>
                    <input
                      v-model="create_mentors_form.fields.phone_number_1"
                      :class="[create_mentors_form.errors.phone_number_1 ? 'is-invalid' : '']"
                      type="tel" class="form-control "
                      placeholder="Enter phone number"
                      autocomplete="off"
                      @input="clearValidationPhoneError" />
                    <div v-if="create_mentors_form.errors.phone_number_1" class="invalid-feedback">
                      {{ create_mentors_form.errors.phone_number_1[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[create_mentors_form.errors.about_mentor ? 'text-danger' : '']"
                      class="form-label">
                      About Mentor</label>
                    <textarea
                      v-model="create_mentors_form.fields.about_mentor"
                      :class="[create_mentors_form.errors.about_mentor ? 'is-invalid' : '']"
                      type="text" class="form-control "
                      placeholder="Enter about mentor"
                      autocomplete="off"
                      @input="clearValidationAboutMentorError" />
                    <div v-if="create_mentors_form.errors.about_mentor" class="invalid-feedback">
                      {{ create_mentors_form.errors.about_mentor[0] }}
                    </div>
                  </div>
                </div>
                <!--                  <div class="col-md-6">-->
                <!--                    <div class="mt-3 mb-1">-->
                <!--                      <label-->
                <!--                        :class="[create_mentors_form.errors.image ? 'text-danger' : '']"-->
                <!--                        class="form-label">-->
                <!--                        Upload Image</label>-->
                <!--                      <FileUpload-->
                <!--                        :documents="image"-->
                <!--                        @setFileKey="setFileKey"-->
                <!--                        @setUploadingStatus="setUploadingStatus"-->
                <!--                        :class="[create_mentors_form.errors.image ? 'is-invalid' : '']"-->
                <!--                        @removeFileKey="removeFileKey"-->
                <!--                        :isUploading="isUploading"-->
                <!--                      >-->
                <!--                      </FileUpload>-->
                <!--                      <div v-if="create_mentors_form.errors.image" class="invalid-feedback">-->
                <!--                        {{ create_mentors_form.errors.image[0] }}-->
                <!--                      </div>-->
                <!--                    </div>-->
                <!--                  </div>-->
              </div>
            </div>
            <div class="card-footer text-end">
              <div class="d-flex">
                <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="resetMentors">Reset</button>
                <button class="btn btn-primary" type="submit">Create Mentor</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "create",
  layout: 'dashboard-admin',
  data() {
    return {
      mentor:'',
      create_mentors_form: {
        fields: {},
        error_message: '',
        errors: [],
        upload: {
          current: 0,
          total: 0
        },
      },
      isUploading: false,
      fileKeys: [],
      image: [],
    }
  },
  mounted() {
  },
  methods: {
    clearValidationNameError() {
      this.create_mentors_form.errors.name = false;
    },
    clearValidationPositionError() {
      this.create_mentors_form.errors.position = false;
    },
    clearValidationPhoneError() {
      this.create_mentors_form.errors.phone_number_1 = false;
    },
    clearValidationAboutMentorError() {
      this.create_mentors_form.errors.about_mentor = false;
    },
    resetMentors(){
      this.create_mentors_form.fields = {}
      this.create_mentors_form.errors = []
    },

    async createMentorsData() {
      try {
        this.create_mentors_form.upload.total = this.fileKeys.length
        this.create_mentors_form.fields.image = this.fileKeys
        this.mentor = await this.$axios.$post(`/api/admin/mentors`, this.create_mentors_form.fields)
        this.$toast.success('Saved successfully!')
        this.mentor_id = this.mentor.id
        this.$emit('child-event', this.mentor);
        await this.$router.push(`/admin/mentors/add-mentor/${this.mentor_id}/sessions`);
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_mentors_form.errors = e.response.data.errors
        this.create_mentors_form.error_message = e.response.data.message
      }
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
