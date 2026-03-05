<template>
  <div>
    <div class="container-xl">
      <!-- Page title -->
      <div class="card-header">
        <NuxtLink class="btn btn-icon me-3 mt-3" to="/admin/news" @click="$router.back()">
          <svg class="icon icon-tabler icon-tabler-arrow-narrow-left" fill="none"
               height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
               viewBox="0 0 24 24"
               width="24" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
            <line x1="5" x2="19" y1="12" y2="12"></line>
            <line x1="5" x2="9" y1="12" y2="16"></line>
            <line x1="5" x2="9" y1="12" y2="8"></line>
          </svg>
        </NuxtLink>
        <h5 class="card-title mt-3">Edit News</h5>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
        <form ref="create_patient" @submit.prevent="createNewsData">
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
                        :class="[update_news_form.errors.content ? 'text-danger' : '']"
                        class="form-label">
                        Content</label>
                      <input
                        v-model="update_news_form.fields.content"
                        :class="[update_news_form.errors.content ? 'is-invalid' : '']"
                        type="text" class="form-control "
                        placeholder="Enter news content"
                        autocomplete="off"
                        @input="clearValidationContentError" />
                      <div v-if="update_news_form.errors.content" class="invalid-feedback">
                        {{ update_news_form.errors.content[0] }}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mt-3 mb-1">
                      <label
                        :class="[update_news_form.errors.image ? 'text-danger' : '']"
                        class="form-label">
                        Upload Image</label>
                      <FileUpload
                        :documents="update_news_form.fields.image"
                        @setFileKey="setFileKey"
                        @setUploadingStatus="setUploadingStatus"
                        :class="[update_news_form.errors.image ? 'is-invalid' : '']"
                        @removeFileKey="removeFileKey"
                        :isUploading="isUploading"
                        @input="clearValidationImageError"
                        :key="selectComponentKey"
                      >
                      </FileUpload>
<!--                      {{update_news_form.fields.document_images}}-->
                      <div v-if="update_news_form.errors.image" class="invalid-feedback">
                        {{ update_news_form.errors.image[0] }}
                      </div>
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
  </div>
</template>

<script>

import FileUpload from "../../../../components/FileUpload";
export default {
  name: "create",
  components: {FileUpload},
  layout: 'dashboard-admin',
  data() {
    return {
      selectComponentKey:1,
      NewsAttributes: {
        data: [],
        selected: {}
      },
      roles_list: {},
      update_news_form: {
        fields: {
          document_images:[{
            documentUrl:""
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
      News:{
        News_type:{}
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
    clearValidationContentError() {
      this.update_news_form.errors.content = false;
    },
    clearValidationImageError() {
      this.update_news_form.errors.image = false;
      this.selectComponentKey++
    },
    async resetNews(){
      try {

        this.news = (await this.$axios.$get(`/api/admin/news/${this.$route.params.id}`)).data
        this.update_news_form.errors = []
        this.update_news_form.fields = this.news
        this.NewsAttributes.selected =  this.news.news_category_type;
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

      this.$set(this.update_news_form.upload, "current", this.fileKeys.length)
    },
    async removeFileKey(key)
    {
      this.fileKeys.splice(this.fileKeys.indexOf(key)
        , 1)
      this.$set(this.update_news_form.upload, "current", this.fileKeys.length)
    },
    async createNewsData() {
      try {
        this.update_news_form.upload.total = this.fileKeys.length
        this.update_news_form.fields.image = this.fileKeys
        let news = await this.$axios.$put(`/api/admin/update-news/${this.$route.params.id}`, this.update_news_form.fields)
        this.component_key++
        this.$toast.success('Saved successfully!')
        await this.$router.back();

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
        this.NewsAttributes.selected =  this.news.news_category_type;
      }catch (e){
        return e;
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
      this.update_news_form.fields.category_id = this.NewsAttributes.selected.value;
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
