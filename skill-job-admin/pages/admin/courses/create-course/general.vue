<template>
  <div class="container-xl">
    <form ref="create_patient" @submit.prevent="createCourseData">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Create Course</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="mt-0">
                <label :class="[create_course_form.errors.name ? 'text-danger' : '']"
                       class="form-label">Course Name</label>
                <input v-model="create_course_form.fields.name"
                       :class="[create_course_form.errors.name ? 'is-invalid' : '']" autocomplete="off"
                       placeholder="Enter course name"
                       class="form-control" type="text"
                       @input="clearValidationNameError">
                <div v-if="create_course_form.errors.name" class="invalid-feedback">
                  {{ create_course_form.errors.name[0] }}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mt-0">
                <label :class="[create_course_form.errors.course_type_id ? 'text-danger' : '']"
                       class="form-label">Course Type</label>
                <Select
                  :attributes="courseAttributes"
                  :border_color_danger="create_course_form.errors.course_type_id"
                  :class="[create_course_form.errors.course_type_id ? 'is-invalid' : '']" autocomplete="off"
                  placeholder="Select course type"
                  @queryUpdates="getCourseTypes"
                  @selectUpdates="selectCourse"
                  @input="clearValidationCourseTypeError"
                  :key="selectComponentKey"
                />
                <div v-if="create_course_form.errors.course_type_id" class="invalid-feedback">
                  {{ create_course_form.errors.course_type_id[0] }}
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="mt-3 mb-3">
                <label
                  :class="[create_course_form.errors.description ? 'text-danger' : '']"
                  class="form-label">
                  Course Description</label>
                <ckeditor :editor="editor" v-model="create_course_form.fields.description"
                          :config="editorConfig"
                          :class="[create_course_form.errors.description ? 'is-invalid' : '']"
                          @input="clearValidationDescriptionError"></ckeditor>
                <div v-if="create_course_form.errors.description" class="invalid-feedback">
                  {{ create_course_form.errors.description[0] }}
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="mt-1">
                <label
                  :class="[create_course_form.errors.instructor_name ? 'text-danger' : '']"
                  class="form-label">
                  Instructor Name</label>
                <input
                  v-model="create_course_form.fields.instructor_name"
                  :class="[create_course_form.errors.instructor_name ? 'is-invalid' : '']"
                  type="text" class="form-control "
                  placeholder="Enter instructor name"
                  autocomplete="off"
                  @input="clearValidationInstructorNameError">
                <div v-if="create_course_form.errors.instructor_name" class="invalid-feedback">
                  {{ create_course_form.errors.instructor_name[0] }}
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="mt-3 mb-1">
                <label
                  :class="[create_course_form.errors.instructor_description ? 'text-danger' : '']"
                  class="form-label">
                  Instructor Description</label>
                <textarea
                  v-model="create_course_form.fields.instructor_description"
                  :class="[create_course_form.errors.instructor_description ? 'is-invalid' : '']"
                  type="text" class="form-control "
                  placeholder="Enter instructor description"
                  autocomplete="off"
                  @input="clearValidationInstructorDescriptionError"></textarea>
                <div v-if="create_course_form.errors.instructor_description" class="invalid-feedback">
                  {{ create_course_form.errors.instructor_description[0] }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-end">
          <div class="d-flex">
            <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="resetJob">Reset</button>
            <button class="btn btn-primary" type="submit">Add Course</button>
          </div>
        </div>
      </div>
    </form>
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
      create_course_form: {
        fields: {},
        error_message: '',
        errors: [],
      },
      courseAttributes: {
        data: [],
        selected: {}
      },
    }
  },
  mounted() {``
    this.getCourseTypes()
  },
  methods: {
    clearValidationNameError() {
      this.create_course_form.errors.name = false;
    },
    clearValidationCourseTypeError() {
      this.create_course_form.errors.course_type_id = false;
      this.selectComponentKey++
    },
    clearValidationInstructorNameError() {
      this.create_course_form.errors.instructor_name = false;
    },
    clearValidationInstructorDescriptionError() {
      this.create_course_form.errors.instructor_description = false;
    },
    clearValidationDescriptionError() {
      this.create_course_form.errors.description = false;
    },
    resetJob(){
      this.create_course_form.fields = {}
      this.create_course_form.errors = []
      this.courseAttributes.selected =  "";
    },
    async createCourseData() {
      try {
        let course = await this.$axios.$post(`/api/admin/courses`, this.create_course_form.fields)
        this.$toast.success('Saved successfully!')
        this.$emit('child-event', course);
        await this.$router.push(`/admin/courses/create-course/${course.id}/contents`);

      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_course_form.errors = e.response.data.errors
        this.create_course_form.error_message = e.response.data.message
      }
    },
    async getCourseTypes(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/admin/course-types',{params:{'filter[search]':query}});
        this.courseAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectCourse() {
      this.create_course_form.fields.course_type_id = this.courseAttributes.selected.value;
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
