<template>
  <div>
      <div class="container-xl">
        <form ref="create_patient" @submit.prevent="createMentorsData">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Edit Mentor</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-0">
                    <label :class="[update_mentors_form.errors.name ? 'text-danger' : '']"
                           class="form-label">Mentor Name</label>
                    <input v-model="update_mentors_form.fields.name"
                           :class="[update_mentors_form.errors.name ? 'is-invalid' : '']" autocomplete="off"
                           placeholder="Enter mentor name"
                           class="form-control" type="text"
                           @input="clearValidationNameError">
                    <div v-if="update_mentors_form.errors.name" class="invalid-feedback">
                      {{ update_mentors_form.errors.name[0] }}
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mt-0 mb-0">
                    <label
                      :class="[update_mentors_form.errors.position ? 'text-danger' : '']"
                      class="form-label">
                      Position</label>
                    <input
                      v-model="update_mentors_form.fields.position"
                      :class="[update_mentors_form.errors.position ? 'is-invalid' : '']"
                      type="text" class="form-control "
                      placeholder="Enter mentor position"
                      autocomplete="off"
                      @input="clearValidationPositionError"  />
                    <div v-if="update_mentors_form.errors.position" class="invalid-feedback">
                      {{ update_mentors_form.errors.position[0] }}
                    </div>
                  </div>
                </div>
                <!--                <div class="col-md-6">-->
                <!--                  <div class="mt-0">-->
                <!--                    <label :class="[update_mentors_form.errors.mentor_type_id ? 'text-danger' : '']"-->
                <!--                           class="form-label">Session Type</label>-->
                <!--                    <Select-->
                <!--                      :attributes="SessionAttributes"-->
                <!--                      :border_color_danger="update_mentors_form.errors.mentor_type_id"-->
                <!--                      :class="[update_mentors_form.errors.mentor_type_id ? 'is-invalid' : '']" autocomplete="off"-->
                <!--                      placeholder="Select Session Type"-->
                <!--                      @queryUpdates="getMentorTypes"-->
                <!--                      @selectUpdates="selectMentors"-->
                <!--                    />-->
                <!--                    <div v-if="update_mentors_form.errors.mentor_type_id" class="invalid-feedback">-->
                <!--                      {{ update_mentors_form.errors.mentor_type_id[0] }}-->
                <!--                    </div>-->
                <!--                  </div>-->
                <!--                </div>-->
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[update_mentors_form.errors.phone_number_1 ? 'text-danger' : '']"
                      class="form-label">
                      Phone Number</label>
                    <input
                      v-model="update_mentors_form.fields.phone_number_1"
                      :class="[update_mentors_form.errors.phone_number_1 ? 'is-invalid' : '']"
                      type="tel" class="form-control "
                      placeholder="Enter phone number"
                      autocomplete="off"
                      @input="clearValidationPhoneError" />
                    <div v-if="update_mentors_form.errors.phone_number_1" class="invalid-feedback">
                      {{ update_mentors_form.errors.phone_number_1[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[update_mentors_form.errors.about_mentor ? 'text-danger' : '']"
                      class="form-label">
                      About Mentor</label>
                    <textarea
                      v-model="update_mentors_form.fields.about_mentor"
                      :class="[update_mentors_form.errors.about_mentor ? 'is-invalid' : '']"
                      type="text" class="form-control "
                      placeholder="Enter about mentor"
                      autocomplete="off"
                      @input="clearValidationAboutMentorError" />
                    <div v-if="update_mentors_form.errors.about_mentor" class="invalid-feedback">
                      {{ update_mentors_form.errors.about_mentor[0] }}
                    </div>
                  </div>
                </div>
                <!--                  <div class="col-md-6">-->
                <!--                    <div class="mt-3 mb-1">-->
                <!--                      <label-->
                <!--                        :class="[update_mentors_form.errors.image ? 'text-danger' : '']"-->
                <!--                        class="form-label">-->
                <!--                        Upload Image</label>-->
                <!--                      <FileUpload-->
                <!--                        :documents="image"-->
                <!--                        @setFileKey="setFileKey"-->
                <!--                        @setUploadingStatus="setUploadingStatus"-->
                <!--                        :class="[update_mentors_form.errors.image ? 'is-invalid' : '']"-->
                <!--                        @removeFileKey="removeFileKey"-->
                <!--                        :isUploading="isUploading"-->
                <!--                      >-->
                <!--                      </FileUpload>-->
                <!--                      <div v-if="update_mentors_form.errors.image" class="invalid-feedback">-->
                <!--                        {{ update_mentors_form.errors.image[0] }}-->
                <!--                      </div>-->
                <!--                    </div>-->
                <!--                  </div>-->
              </div>
            </div>
            <div class="card-footer text-end">
              <div class="d-flex">
                <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="resetMentors">Reset</button>
                <button class="btn btn-primary" type="submit">Edit Mentor</button>
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>
</template>

<script>

// import FileUpload from "../../../../components/FileUpload";
export default {
  name: "create",
  // components: {FileUpload},
  layout: 'dashboard-admin',
  data() {
    return {
      // SessionAttributes: {
      //   data: [],
      //   selected: {}
      // },
      roles_list: {},
      update_mentors_form: {
        fields: {
        },
        error_message: '',
        errors: [],
        location_type: "",
        upload: {
          current: 0,
          total: 0
        },
      },
      isUploading: false,
      component_key: 1,
      fileKeys: [],
      image: [],
      Mentors:{
        Mentors_type:{}
      }
    }
  },
  mounted() {
    this.getMentors()
    // this.getMentorsTypes()
  },
  methods: {
    clearValidationNameError() {
      this.update_mentors_form.errors.name = false;
    },
    clearValidationPositionError() {
      this.update_mentors_form.errors.position = false;
    },
    clearValidationPhoneError() {
      this.update_mentors_form.errors.phone_number_1 = false;
    },
    clearValidationAboutMentorError() {
      this.update_mentors_form.errors.about_mentor = false;
    },
    async resetMentors(){
      try {

        this.mentors = (await this.$axios.$get(`/api/admin/mentors/${this.$route.params.id}`)).data
        this.update_mentors_form.errors = []
        this.update_mentors_form.fields = this.mentors
        // this.SessionAttributes.selected =  this.mentors.mentor_types;
      }catch (e){
        return e;
      }
    },

    setUploadingStatus(isUploading){
      this.isUploading = isUploading
    },
    async setFileKey(key)
    {
      this.isUploading = true
      this.fileKeys.push(key)

      this.$set(this.update_mentors_form.upload, "current", this.fileKeys.length)
    },
    async removeFileKey(key)
    {
      this.fileKeys.splice(this.fileKeys.indexOf(key)
        , 1)
      this.$set(this.update_mentors_form.upload, "current", this.fileKeys.length)
    },
    async createMentorsData() {
      try {
        this.update_mentors_form.upload.total = this.fileKeys.length
        this.update_mentors_form.fields.image = this.fileKeys
        let Mentors = await this.$axios.$put(`/api/admin/update-mentors/${this.$route.params.id}`, this.update_mentors_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.back();

      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_mentors_form.errors = e.response.data.errors
        this.update_mentors_form.error_message = e.response.data.message
      }
    },
    async getMentors() {
      try {
        this.Mentors = (await this.$axios.$get(`/api/admin/mentors/${this.$route.params.id}`)).data
        this.update_mentors_form.fields = this.Mentors
        // this.SessionAttributes.selected =  this.Mentors.mentor_types;
      }catch (e){
        return e;
      }
    },
    // async getMentorsTypes(query = '') {
    //   try {
    //     let attributes = await this.$axios.$get('/api/admin/get-mentors',{params:{'filter[search]':query}});
    //     this.SessionAttributes.data = attributes.data.map((x) => ({
    //       name: `${x.name}`,
    //       value: x.id
    //     }));
    //   } catch (error) {
    //     return error;
    //   }
    // },
    // selectMentors() {
    //   this.update_mentors_form.fields.mentor_type_id = this.SessionAttributes.selected.value;
    // },
  },
}
</script>

<style scoped>
.required:after {
  content: "*";
  color: red;
}
</style>
