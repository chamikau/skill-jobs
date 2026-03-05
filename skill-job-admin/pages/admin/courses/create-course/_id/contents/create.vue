<template>
  <div>
    <div class="">
      <div class="container-xl">
        <form ref="create_patient" @submit.prevent="createContentData()">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Add Content</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[create_content_form.errors.content_name ? 'text-danger' : '']"
                      class="form-label">
                      Content Name</label>
                    <input
                      v-model="create_content_form.fields.content_name"
                      :class="[create_content_form.errors.content_name ? 'is-invalid' : '']"
                      type="text" class="form-control "
                      placeholder="Enter content name"
                      autocomplete="off"
                      @input="clearValidationContentNameError">
                    <div v-if="create_content_form.errors.content_name" class="invalid-feedback">
                      {{ create_content_form.errors.content_name[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[create_content_form.errors.number_of_lectures ? 'text-danger' : '']"
                      class="form-label">
                      Number Of Lectures</label>
                    <input
                      v-model="create_content_form.fields.number_of_lectures"
                      :class="[create_content_form.errors.number_of_lectures ? 'is-invalid' : '']"
                      type="number" class="form-control "
                      placeholder="Enter number of lectures"
                      autocomplete="off"
                      @input="clearValidationNumberOfLecturesError">
                    <div v-if="create_content_form.errors.number_of_lectures" class="invalid-feedback">
                      {{ create_content_form.errors.number_of_lectures[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[create_content_form.errors.lecture_hours ? 'text-danger' : '']"
                      class="form-label">
                      Lecture Hours</label>
                    <input
                      v-model="create_content_form.fields.lecture_hours"
                      :class="[create_content_form.errors.lecture_hours ? 'is-invalid' : '']"
                      type="number" class="form-control "
                      placeholder="Enter lecture hours"
                      autocomplete="off"
                      @input="clearValidationLectureHourError">
                    <div v-if="create_content_form.errors.lecture_hours" class="invalid-feedback">
                      {{ create_content_form.errors.lecture_hours[0] }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[create_content_form.errors.content_description ? 'text-danger' : '']"
                      class="form-label">
                      Content Description</label>
                    <textarea
                      v-model="create_content_form.fields.content_description"
                      :class="[create_content_form.errors.content_description ? 'is-invalid' : '']"
                      type="text" class="form-control "
                      placeholder="Enter content description"
                      autocomplete="off"
                      @input="clearValidationContentDescriptionError"></textarea>
                    <div v-if="create_content_form.errors.content_description" class="invalid-feedback">
                      {{ create_content_form.errors.content_description[0] }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <div class="d-flex">
                <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="resetJob">Reset</button>
                <button class="btn btn-primary" type="submit">Create Content</button>
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
      create_content_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
      courseAttributes: {
        data: [],
        selected: {}
      },
    }
  },
  mounted() {
  },
  methods: {
    clearValidationContentNameError() {
      this.create_content_form.errors.content_name = false;
    },
    clearValidationNumberOfLecturesError() {
      this.create_content_form.errors.number_of_lectures = false;
    },
    clearValidationLectureHourError() {
      this.create_content_form.errors.lecture_hours = false;
    },
    clearValidationContentDescriptionError() {
      this.create_content_form.errors.content_description = false;
    },
    resetJob(){
      this.create_content_form.fields = {}
      this.create_content_form.errors = []
      this.courseAttributes.selected =  "";
    },
    async createContentData() {
      try {
        this.create_content_form.fields.course_id = this.$route.params.id;
        let content = await this.$axios.$post(`/api/admin/contents`, this.create_content_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push(`/admin/courses/create-course/${this.$route.params.id}/contents`);

      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_content_form.errors = e.response.data.errors
        this.create_content_form.error_message = e.response.data.message
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
