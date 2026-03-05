<template>
  <div class="page">
    <div class="container-xl mb-2">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a href="#" @click.prevent="backToPage">News</a></li>
          <li><a>Create News</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">Create News</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-xl">
      <form ref="create_patient" @submit.prevent="createNewsData">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Create News</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mt-0">
                  <label :class="[create_news_form.errors.headline ? 'text-danger' : '']"
                         class="form-label">News Headline</label>
                  <input v-model="create_news_form.fields.headline"
                         :class="[create_news_form.errors.headline ? 'is-invalid' : '']" autocomplete="off"
                         placeholder="Enter news headline"
                         class="form-control" type="text"
                         @input="clearValidationHeadlineError">
                  <div v-if="create_news_form.errors.headline" class="invalid-feedback">
                    {{ create_news_form.errors.headline[0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mt-0">
                  <label :class="[create_news_form.errors.category_id ? 'text-danger' : '']"
                         class="form-label">News Type</label>
                  <Select
                    :attributes="NewsAttributes"
                    :border_color_danger="create_news_form.errors.category_id"
                    :class="[create_news_form.errors.category_id ? 'is-invalid' : '']" autocomplete="off"
                    placeholder="Select news type"
                    @queryUpdates="getNewsTypes"
                    @selectUpdates="selectNews"
                    @input="clearValidationCategoryError"
                    :key="selectComponentKey"
                  />
                  <div v-if="create_news_form.errors.category_id" class="invalid-feedback">
                    {{ create_news_form.errors.category_id[0] }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[create_news_form.errors.image ? 'text-danger' : '']"
                      class="form-label">
                      Upload Image</label>
                    <FileUpload
                      :documents="image"
                      @setFileKey="setFileKey"
                      @setUploadingStatus="setUploadingStatus"
                      :class="[create_news_form.errors.image ? 'is-invalid' : '']"
                      @removeFileKey="removeFileKey"
                      :isUploading="isUploading"
                      @input="clearValidationImageError"
                      :key="selectComponentKey"
                    >
                    </FileUpload>
                    <div v-if="create_news_form.errors.image" class="invalid-feedback">
                      {{ create_news_form.errors.image[0] }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
              <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="resetNews">Reset</button>
              <button class="btn btn-primary" type="submit">Create News</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import FileUpload from "../../../../components/FileUpload";
export default {
  name: "create",
  components: {FileUpload},
  layout: 'dashboard-admin',
  data() {
    return {
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
      },
      selectComponentKey:1,
      create_news_form: {
        fields: {},
        error_message: '',
        errors: [],
        location_type: "",
        upload: {
          current: 0,
          total: 0
        },
      },
      isUploading: false,
      fileKeys: [],
      image: [],
      NewsAttributes: {
        data: [],
        selected: {}
      },
    }
  },
  mounted() {
    this.getNewsTypes()
  },
  methods: {
    clearValidationHeadlineError() {
      this.create_news_form.errors.headline = false;
    },
    clearValidationCategoryError() {
      this.create_news_form.errors.category_id = false;
      this.selectComponentKey++
    },
    clearValidationImageError() {
      this.create_news_form.errors.image = false;
      this.selectComponentKey++
    },    clearValidationContentError() {
      this.create_news_form.errors.content = false;
    },
    resetNews(){
      this.create_news_form.fields = {}
      this.create_news_form.errors = []
      this.NewsAttributes.selected =  "";
    },

    setUploadingStatus(isUploading){
      this.isUploading = isUploading
    },
    async setFileKey(key)
    {
      this.isUploading = true
      this.fileKeys.push(key)

      this.$set(this.create_news_form.upload, "current", this.fileKeys.length)
    },
    async removeFileKey(key)
    {
      this.fileKeys.splice(this.fileKeys.indexOf(key)
        , 1)
      this.$set(this.create_news_form.upload, "current", this.fileKeys.length)
    },
    async createNewsData() {
      try {
        this.create_news_form.upload.total = this.fileKeys.length
        this.create_news_form.fields.image = this.fileKeys
        this.news = await this.$axios.$post(`/api/admin/news`, this.create_news_form.fields)
        this.$toast.success('Saved successfully!')
        // this.$emit('child-event', this.news);
        // await this.$router.push({
        //   path: `/admin/news/create-news/${this.news.data.id}/description`
        // });
        await this.$router.push(`/admin/news`)

      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_news_form.errors = e.response.data.errors
        this.create_news_form.error_message = e.response.data.message
      }
    },
    async getNewsTypes(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/admin/news-types',{params:{'filter[search]':query}});
        this.NewsAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectNews() {
      this.create_news_form.fields.category_id = this.NewsAttributes.selected.value;
    },
    backToPage(){
      this.$router.push(`/admin/news`);
    },
  },
}
</script>

<style scoped>
.required:after {
  content: "*";
  color: red;
}
.disabled-link {
  opacity: 0.5;
  cursor: not-allowed;
  pointer-events: none;
}
.breadcrumb {
  list-style: none;
  padding: 0;
  margin: 0;
}

.breadcrumb li {
  display: inline;
  color: #888;
}

.breadcrumb li:not(:last-child)::after {
  content: ">";
  margin-left: 0.7rem;
  margin-right: 0.7rem;
  color: #888;
}

.breadcrumb li:last-child {
  color: #888;
}
</style>
