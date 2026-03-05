<template>
  <div>
    <form ref="create_patient" @submit.prevent="createCompanyJobData">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Edit Description</h5>
        </div>
        <div class="card-body">
         <div class="row">
              <div class="col-md-12">
                <div>
<!--                  <label-->
<!--                    :class="[update_job_form.errors.description ? 'text-danger' : '']"-->
<!--                    class="form-label">Description</label>-->
                  <ckeditor :editor="editor" v-model="update_job_form.fields.description"
                            :config="editorConfig"
                            :class="[update_job_form.errors.description ? 'is-invalid' : '']"
                            @input="clearValidationDescriptionError"
                  ></ckeditor>
                  <div v-if="update_job_form.errors.description" class="invalid-feedback">
                    {{ update_job_form.errors.description[0] }}
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="card-footer text-end">
          <div class="d-flex">
            <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="resetJob">Reset</button>
            <button class="btn btn-primary" type="submit">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import {job_location_type} from "@/constants/constants";
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
  name: "create",
  layout: 'dashboard-admin',
  data() {
    return {
      editor: ClassicEditor,
      editorConfig: {
      },
      update_job_form: {
        fields: {
          application: null,
          description:null,
        },
        error_message: '',
        errors: [],
      }
    }
  },
  mounted() {
    this.getJobs()
  },
  methods: {
    clearValidationDescriptionError() {
      this.update_job_form.errors.description = false;
    },
    async createCompanyJobData() {
      try {
        let job = await this.$axios.$put(`/api/company/jobs/${this.$route.params.id}`, this.update_job_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push(`/admin/job`);

      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_job_form.errors = e.response.data.errors
        this.update_job_form.error_message = e.response.data.message
      }
    },
    async getJobs() {
      try {
        this.job = (await this.$axios.$get(`/api/company/jobs/${this.$route.params.id}`)).data
        this.update_job_form.fields = this.job
      }catch (e){
        return e;
      }
    },
    async resetJob() {
      try {
        this.job = (await this.$axios.$get(`/api/company/jobs/${this.$route.params.id}`)).data
        this.update_job_form.fields = this.job
      }catch (e){
        return e;
      }
    }
  },
}
</script>

<style scoped>
.required:after {
  content: "*";
  color: red;
}
</style>
