<template>
  <div>
    <div class="container-xl">
      <form ref="create_patient" @submit.prevent="createCourseData">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Edit Course</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="mt-3 mb-1">
                  <label
                    :class="[update_course_form.errors.description ? 'text-danger' : '']"
                    class="form-label">
                    Description</label>
                  <ckeditor :editor="editor" v-model="update_course_form.fields.description"
                            :config="editorConfig"
                            :class="[update_course_form.errors.description ? 'is-invalid' : '']"
                            @input="clearValidationDescriptionError"></ckeditor>
                  <div v-if="update_course_form.errors.description" class="invalid-feedback">
                    {{ update_course_form.errors.description[0] }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <button class="btn btn-link ms-auto me-2" @click.prevent="resetJob">Reset</button>
              <button class="btn btn-primary" type="submit">Edit Course</button>
            </div>
          </div>
        </div>
      </form>
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
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
      },
      roles_list: {},
      update_course_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: ""
      },
    }
  },
  mounted() {
    this.getCourses()
  },
  methods: {
    clearValidationDescriptionError() {
      this.update_course_form.errors.description = false;
    },
    async resetJob(){
      try {
        this.course = (await this.$axios.$get(`/api/admin/courses/${this.$route.params.id}`)).data
        this.update_course_form.fields = this.course
        this.update_course_form.errors = []
      }catch (e){
        return e;
      }
    },
    async createCourseData() {
      try {
        let company = await this.$axios.$put(`/api/admin/courses/${this.$route.params.id}`, this.update_course_form.fields)
        this.$toast.success('Saved successfully!')
        // await this.$router.back();

      } catch (e) {
        this.$errorToast('Error: Incomplete Form Submission')
        this.update_course_form.errors = e.response.data.errors
        this.update_course_form.error_message = e.response.data.message
      }
    },
    async getCourses() {
      try {
        this.course = (await this.$axios.$get(`/api/admin/courses/${this.$route.params.id}`)).data
        this.update_course_form.fields = this.course
      }catch (e){
        return e;
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
