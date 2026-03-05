<template>
  <div>
   <div class="container-xl">
        <form ref="create_patient" @submit.prevent="createCompanyEventData">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Create Description</h5>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-12">
                    <div class="mt-3 mb-1">
                      <label
                        :class="[create_news_form.errors.content ? 'text-danger' : '']"
                        class="form-label">
                        Description</label>
                      <ckeditor :editor="editor" v-model="create_news_form.fields.content"
                                :config="editorConfig"
                                :class="[create_news_form.errors.content ? 'is-invalid' : '']"
                                @input="clearValidationContentError"></ckeditor>
                      <div v-if="create_news_form.errors.content" class="invalid-feedback">
                        {{ create_news_form.errors.content[0] }}
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

      create_news_form: {
        fields: {
          content:null,
        },
        error_message: '',
        errors: [],
      },
    }
  },
  mounted() {
    this.getNews()
  },
  methods: {
    clearValidationContentError() {
      this.create_news_form.errors.content = false;
    },
    resetJob(){
      this.create_news_form.fields = {}
      this.create_news_form.errors = []
    },
    async createCompanyEventData() {
      try {
        let news = await this.$axios.$put(`/api/admin/update-news/${this.$route.params.id}`, this.create_news_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push(`/admin/news`);

      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_news_form.errors = e.response.data.errors
        this.create_news_form.error_message = e.response.data.message
      }
    },
    async getNews() {
      try {
        this.news = (await this.$axios.$get(`/api/admin/news/${this.$route.params.id}`)).data
        this.create_news_form.fields = this.news
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
