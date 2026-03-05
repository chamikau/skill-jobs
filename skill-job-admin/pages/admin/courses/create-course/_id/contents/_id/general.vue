<template>
  <div>
    <div class="">
      <div class="container-xl">
        <form ref="create_patient" @submit.prevent="updateContentData()">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Edit Content</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[update_content_form.errors.content_name ? 'text-danger' : '']"
                      class="form-label">
                      Content Name</label>
                    <input
                      v-model="update_content_form.fields.content_name"
                      :class="[update_content_form.errors.content_name ? 'is-invalid' : '']"
                      type="text" class="form-control "
                      placeholder="Enter content name"
                      autocomplete="off"
                      @input="clearValidationContentNameError">
                    <div v-if="update_content_form.errors.content_name" class="invalid-feedback">
                      {{ update_content_form.errors.content_name[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[update_content_form.errors.number_of_lectures ? 'text-danger' : '']"
                      class="form-label">
                      Number Of Lectures</label>
                    <input
                      v-model="update_content_form.fields.number_of_lectures"
                      :class="[update_content_form.errors.number_of_lectures ? 'is-invalid' : '']"
                      type="number" class="form-control "
                      placeholder="Enter number of lectures"
                      autocomplete="off"
                      @input="clearValidationNumberOfLecturesError">
                    <div v-if="update_content_form.errors.number_of_lectures" class="invalid-feedback">
                      {{ update_content_form.errors.number_of_lectures[0] }}
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[update_content_form.errors.lecture_hours ? 'text-danger' : '']"
                      class="form-label">
                      Lecture Hours</label>
                    <input
                      v-model="update_content_form.fields.lecture_hours"
                      :class="[update_content_form.errors.lecture_hours ? 'is-invalid' : '']"
                      type="number" class="form-control "
                      placeholder="Enter lecture hours"
                      autocomplete="off"
                      @input="clearValidationLectureHourError">
                    <div v-if="update_content_form.errors.lecture_hours" class="invalid-feedback">
                      {{ update_content_form.errors.lecture_hours[0] }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[update_content_form.errors.content_description ? 'text-danger' : '']"
                      class="form-label">
                      Content Description</label>
                    <textarea
                      v-model="update_content_form.fields.content_description"
                      :class="[update_content_form.errors.content_description ? 'is-invalid' : '']"
                      type="text" class="form-control "
                      placeholder="Enter content description"
                      autocomplete="off"
                      @input="clearValidationContentDescriptionError"></textarea>
                    <div v-if="update_content_form.errors.content_description" class="invalid-feedback">
                      {{ update_content_form.errors.content_description[0] }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <div class="d-flex">
                <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="reset">Reset</button>
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
  name: "general",
  data() {
    return {
      mentors:"",
      update_content_form: {
        fields: {},
        error_message: '',
        errors: []
      },
    }
  },
  mounted() {
    this.getContents()
  },
  methods: {
    clearValidationContentNameError() {
      this.update_content_form.errors.content_name = false;
    },
    clearValidationNumberOfLecturesError() {
      this.update_content_form.errors.number_of_lectures = false;
    },
    clearValidationLectureHourError() {
      this.update_content_form.errors.lecture_hours = false;
    },
    clearValidationContentDescriptionError() {
      this.update_content_form.errors.content_description = false;
    },
    async getContents() {
      this.contents = (await this.$axios.$get(`/api/admin/contents/${this.$route.params.id}`)).data
      this.update_content_form.fields=this.contents
},

    async updateContentData() {
      try {
        let contents = await this.$axios.$put(`api/admin/contents/${this.$route.params.id}`, this.update_content_form.fields)
        this.contents = this.contents.data
        this.$toast.success('Saved successfully!')
        await this.$router.back();
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_content_form.errors = e.response.data.errors
        this.update_content_form.error_message = e.response.data.message
      }
    },
    async reset() {
      this.contents = (await this.$axios.$get(`/api/admin/contents/${this.$route.params.id}`)).data
      this.update_content_form.fields=this.contents
    }
  },
}
</script>

<style scoped>

</style>
