<template>
  <div class="page">
    <div class="container-xl mb-2">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a href="#" @click.prevent="backToPage">News</a></li>
          <li><a>Edit News</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">Edit News</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-xl">
      <form ref="create_patient" @submit.prevent="updateNewsData">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Edit News</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mt-0">
                  <label :class="[update_news_form.errors.headline ? 'text-danger' : '']"
                         class="form-label">News Headline</label>
                  <input v-model="update_news_form.fields.headline"
                         :class="[update_news_form.errors.headline ? 'is-invalid' : '']" autocomplete="off"
                         placeholder="Enter news headline"
                         class="form-control" type="text"
                         @input="clearValidationHeadlineError">
                  <div v-if="update_news_form.errors.headline" class="invalid-feedback">
                    {{ update_news_form.errors.headline[0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mt-0">
                  <label :class="[update_news_form.errors.category_id ? 'text-danger' : '']"
                         class="form-label">News Type</label>
                  <Select
                    :attributes="NewsAttributes"
                    :border_color_danger="update_news_form.errors.category_id"
                    :class="[update_news_form.errors.category_id ? 'is-invalid' : '']" autocomplete="off"
                    placeholder="Select news type"
                    @queryUpdates="getNewsTypes"
                    @selectUpdates="selectNews"
                    @input="clearValidationCategoryError"
                    :key="selectComponentKey"
                  />
                  <div v-if="update_news_form.errors.category_id" class="invalid-feedback">
                    {{ update_news_form.errors.category_id[0] }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[update_news_form.errors.image ? 'text-danger' : '']"
                      class="form-label">
                      Upload Image</label>
                    <FileUpload
                      :documents="documents"
                      @setFileKey="setFileKey"
                      @setUploadingStatus="setUploadingStatus"
                      :class="[update_news_form.errors.image ? 'is-invalid' : '']"
                      @removeFileKey="removeFileKey"
                      :isUploading="isUploading"
                      @input="clearValidationImageError"
                      :key="selectComponentKey"
                    >
                    </FileUpload>
<!--                    {{update_news_form.fields.document_images}}-->
<!--                    {{documents}}-->
                    <div v-if="update_news_form.errors.image" class="invalid-feedback">
                      {{ update_news_form.errors.image[0] }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="mt-3 mb-1">
                    <label
                      :class="[update_news_form.errors.content ? 'text-danger' : '']"
                      class="form-label">
                      Description</label>
                    <ckeditor :editor="editor" v-model="update_news_form.fields.content"
                              :config="editorConfig"
                              :class="[update_news_form.errors.content ? 'is-invalid' : '']"
                              @input="clearValidationContentError"></ckeditor>
                    <div v-if="update_news_form.errors.content" class="invalid-feedback">
                      {{ update_news_form.errors.content[0] }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="resetNews">Reset</button>
              <button class="btn btn-primary" type="submit">Edit News</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>

import FileUpload from "../../../../../components/FileUpload";
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
  name: "general",
  components: {FileUpload},
  layout: 'dashboard-admin',
  data() {
    return {
      selectComponentKey: 1,
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
      },
      NewsAttributes: {
        data: [],
        selected: {}
      },
      roles_list: {},
      update_news_form: {
        fields: {
          document_images: [{
            documentUrl: ""
          }]
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
      documents: [],
      image: [],
      News: {
        News_type: {}
      }
    }
  },
  mounted() {
    this.getNews()
    this.getNewsTypes()
    this.fileList = this.documents;
  },
  watch: {
    documents(newDocuments) {
      this.fileList = newDocuments;
    },
  },
  computed: {
    fileList() {
      return this.documents;
    },
  },

  methods: {
    clearValidationHeadlineError() {
      this.update_news_form.errors.headline = false;
    },
    clearValidationCategoryError() {
      this.update_news_form.errors.category_id = false;
      this.selectComponentKey++
    },
    clearValidationImageError() {
      this.update_news_form.errors.image = false;
      this.selectComponentKey++
    }, clearValidationContentError() {
      this.update_news_form.errors.content = false;
    },
    async resetNews() {
      try {
        this.news = (await this.$axios.$get(`/api/admin/news/${this.$route.params.id}`)).data
        this.update_news_form.errors = []
        this.update_news_form.fields = this.news
        this.NewsAttributes.selected = this.news.news_category_type;
      } catch (e) {
        return e;
      }
    },

    setUploadingStatus(isUploading) {
      this.errorMessage = "";
      this.isUploading = isUploading;
    },
    async setFileKey(key) {
      this.isUploading = true;
      this.fileKeys.push(key);
      this.$set(this.documents, "current", this.fileKeys.length);
      this.isUploading = false;
    },
    async removeFileKey(key) {
      this.fileKeys.splice(this.fileKeys.indexOf(key), 1);
      this.$set(this.documents, "current", this.fileKeys.length);
    },
    async updateNewsData() {
      try {
        this.update_news_form.upload.total = this.fileKeys.length
        this.update_news_form.fields.image = this.fileKeys
        let news = await this.$axios.$put(`/api/admin/update-news/${this.$route.params.id}`, this.update_news_form.fields)
        this.component_key++
        this.$toast.success('Saved successfully!')
        // await this.$router.push(`/admin/news/edit-news/${this.$route.params.id}/description`);
        await this.$router.push(`/admin/news`)
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_news_form.errors = e.response.data.errors
        this.update_news_form.error_message = e.response.data.message
      }
    },
    async getNews() {
      try {
        this.news = (await this.$axios.$get(`/api/admin/news/${this.$route.params.id}`)).data
        this.update_news_form.fields = this.news
        this.NewsAttributes.selected = this.news.news_category_type;
        this.image = this.update_news_form.fields.document_images
      } catch (e) {
        return e;
      }
    },
    async getNewsTypes(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/admin/news-types', {params: {'filter[search]': query}});
        this.NewsAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectNews() {
      this.update_news_form.fields.category_id = this.NewsAttributes.selected.value;
    },
    backToPage() {
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
