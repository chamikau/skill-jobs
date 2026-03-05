<template>

  <div id="tab-1" class="card tab-pane active show">
<!--    <div class="row">-->
<!--      <div class="col mt-3 ms-3 mb-2">-->
<!--        <h3 class="card-title mt-2">-->
<!--          Basic Details-->
<!--        </h3>-->
<!--      </div>-->
<!--    </div>-->
    <form @submit.prevent="updateProfile" action="" method="post">
      <div class="card-body">
        <div class="row">
         <div class="col-md-6">
           <div class="row">
             <div class="col-md-4">
               <div class="">
                 <SingleFileUpload
                   :documents='profile_image'
                   @setFileKey="setFileKey"
                   @setUploadingStatus="setUploadingStatus"
                   :class="[update_profile_form.errors.profile_image ? 'is-invalid' : '']"
                   @removeFileKey="removeFileKey"
                   :isUploading="isUploading"
                   :key="component_key"
                 >
                 </SingleFileUpload>
                 <div v-if="update_profile_form.errors.profile_image" class="invalid-feedback">
                   {{ update_profile_form.errors.profile_image[0] }}
                 </div>
               </div>
             </div>
             <div class="col-md-8 mt-4">
               <div class="subheader">
                 <span class="fs-6">
                   {{update_profile_form.fields.first_name + " " + update_profile_form.fields.last_name}}
                 </span>
                 <br>
                 <span>
                   {{update_profile_form.fields.email}}
                 </span>
               </div>
             </div>
           </div>
          </div>
              <div class="row">
                <div class="col">
                  <h4 class="card-title mt-3">
                    Basic info
                  </h4>
                </div>
              </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" :class="[update_profile_form.errors.first_name ? 'text-danger' : '']">First Name</label>
              <input v-model="update_profile_form.fields.first_name" type="text" class="form-control "
                     :class="[update_profile_form.errors.first_name ? 'is-invalid' : '']"
                     placeholder="Enter first name" autocomplete="off"
                     @input="clearValidationFirstNameError">
              <div class="invalid-feedback" v-if="update_profile_form.errors.first_name">{{ update_profile_form.errors.first_name[0] }}</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" :class="[update_profile_form.errors.last_name ? 'text-danger' : '']">Last Name</label>
              <input v-model="update_profile_form.fields.last_name"
                     type="text" class="form-control "
                     :class="[update_profile_form.errors.last_name ? 'is-invalid' : '']"
                     placeholder="Enter last name" autocomplete="off"
                     @input="clearValidationLastNameError">
              <div class="invalid-feedback" v-if="update_profile_form.errors.last_name">{{ update_profile_form.errors.last_name[0] }}</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="">
              <label class="form-label">Phone Number</label>
              <input v-model="update_profile_form.fields.phone_number_1"
                     :class="[update_profile_form.errors.phone_number_1 ? 'is-invalid' : '']"
                     type="tel" class="form-control" placeholder="Enter phone number"
                     @input="clearValidationPhoneError">
              <div v-if="update_profile_form.errors.phone_number_1" class="invalid-feedback">{{
                  update_profile_form.errors.phone_number_1[0]
                }}
              </div>
            </div>
          </div>
<!--          <div class="col-md-6">-->
<!--            <div class="">-->
<!--              <label class="form-label">Email</label>-->
<!--              <input v-model="update_profile_form.fields.email" class="form-control" disabled>-->
<!--            </div>-->
<!--          </div>-->
        </div>
        <hr />
        <div class="row">
          <h2 class="card-title text-left">Your Links</h2>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" :class="[update_profile_form.errors.linkedin_link ? 'text-danger' : '']">Linkedin Link</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1" style="font-weight: bold">
                   in
                  </span>
                </div>
              <input v-model="update_profile_form.fields.linkedin_link"
                     type="text" class="form-control "
                     :class="[update_profile_form.errors.linkedin_link ? 'is-invalid' : '']"
                     placeholder="https://www.linkedin.com/in/" autocomplete="off"
                     @input="clearValidationLinkedInError">
            </div>
              <div class="warning-error"v-if="update_profile_form.errors.linkedin_link">{{ update_profile_form.errors.linkedin_link[0] }}</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" :class="[update_profile_form.errors.facebook_link ? 'text-danger' : '']">Facebook Link</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                    </svg>
                  </span>
                </div>
              <input v-model="update_profile_form.fields.facebook_link" type="text"
                     class="form-control "
                     :class="[update_profile_form.errors.facebook_link ? 'is-invalid' : '']"
                     placeholder="https://www.facebook.com/" autocomplete="off"
                     @input="clearValidationFacebookError">
            </div>
              <div class="warning-error" v-if="update_profile_form.errors.facebook_link">{{ update_profile_form.errors.facebook_link[0] }}</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label"
                     :class="[update_profile_form.errors.instagram_link ? 'text-danger' : '']">Instagram Link</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                   <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                   <path d="M16.5 7.5l0 .01"></path>
                </svg>
                  </span>
                </div>
                <input v-model="update_profile_form.fields.instagram_link"
                       :class="[update_profile_form.errors.instagram_link ? 'is-invalid' : '']"
                       type="text" class="form-control" placeholder="https://www.instagram.com/"
                       @input="clearValidationInstagramError">
             </div>
              <div v-if="update_profile_form.errors.instagram_link" class="warning-error">{{
                  update_profile_form.errors.instagram_link[0]
                }}
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label"
                     :class="[update_profile_form.errors.github_link ? 'text-danger' : '']">Github Link</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-github" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"></path>
                    </svg>
                  </span>
                </div>
              <input v-model="update_profile_form.fields.github_link"
                     :class="[update_profile_form.errors.github_link ? 'is-invalid' : '']"
                     type="text" class="form-control" placeholder="https://www.github.com/"
                     @input="clearValidationGitHubError">
              </div>
              <div v-if="update_profile_form.errors.github_link" class="warning-error">{{
                  update_profile_form.errors.github_link[0]
                }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-end">
        <div class="d-flex">
          <a class="btn btn-outline-secondary ms-auto me-2" href="#" @click.prevent="reset">Reset</a>
          <button class="btn btn-primary" type="submit">Update User</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import FileUpload from "../../../components/SingleFileUpload";
export default {
  name: "general",
  components: {FileUpload},
  data() {
    return {
      documents: [],
      image:[{
        image_documents: {}
      }
      ],
      profile_image: [],
      fileKeys: [],
      isUploading: false,
      component_key:"",
      update_profile_form: {
        fields: {
          profile_image : this.$auth.user.profile_image,
          first_name : this.$auth.user.first_name,
          last_name : this.$auth.user.last_name,
          phone_number_1: this.$auth.user.phone_number_1,
          email: this.$auth.user.email,
          linkedin_link: this.$auth.user.linkedin_link,
          facebook_link: this.$auth.user.facebook_link,
          instagram_link: this.$auth.user.instagram_link,
          github_link: this.$auth.user.github_link,
        },
        upload: {
          current: 0,
          total: 0
        },
        error_message: '',
        errors: [],
      }
    }
  },
  mounted() {
    this.getProfileImage()
  },
  methods: {
    clearValidationFirstNameError() {
      this.update_profile_form.errors.first_name = false;
    },
    clearValidationLastNameError() {
      this.update_profile_form.errors.last_name = false;
    },
    clearValidationPhoneError() {
      this.update_profile_form.errors.phone_number_1 = false;
    },
    clearValidationLinkedInError() {
      this.update_profile_form.errors.linkedin_link = false;
    },
    clearValidationFacebookError() {
      this.update_profile_form.errors.facebook_link = false;
    },
    clearValidationInstagramError() {
      this.update_profile_form.errors.instagram_link = false;
    },
    clearValidationGitHubError() {
      this.update_profile_form.errors.github_link = false;
    },

    async updateProfile() {
      try {
        await this.$axios.$get('sanctum/csrf-cookie');
        this.update_profile_form.upload.total = this.fileKeys.length
        this.update_profile_form.fields.profile_image = this.fileKeys
        await this.$axios.$put('/api/student/update-profile', this.update_profile_form.fields)
        this.$toast.success('Saved successfully!')
        this.component_key++
        await this.$auth.fetchUser()
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.update_profile_form.errors = e.response.data.errors
        this.update_profile_form.error_message = e.response.data.message
      }
    },
    async getProfileImage() {
      try {
       this.image =  (await this.$axios.$get(`/api/student/profile/${this.$auth.user.id}`)).data
        this.profile_image = this.image.documents
      } catch (e) {
      }
    },
    setUploadingStatus(isUploading){
      this.isUploading = isUploading
    },
    async setFileKey(key)
    {
      this.isUploading = true

      this.fileKeys.push(key)

      this.$set(this.documents, "current", this.fileKeys.length)
    },
    async removeFileKey(key)
    {
      this.fileKeys.splice(this.fileKeys.indexOf(key)
        , 1)
      this.$set(this.documents, "current", this.fileKeys.length)
    },
    reset() {
      this.update_profile_form = {
        fields:
          {
          first_name : this.$auth.user.first_name,
          last_name : this.$auth.user.last_name,
          phone_number_1 : this.$auth.user.phone_number_1,
          linkedin_link: this.$auth.user.linkedin_link,
          facebook_link: this.$auth.user.facebook_link,
          instagram_link: this.$auth.user.instagram_link,
          github_link: this.$auth.user.github_link,
        },
        error_message: '',
        errors: [],
      }
    }
  }
}
</script>

<style scoped>
.warning-error{
  width: 100%;
  margin-top: 0.25rem;
  font-size: 85.71428571%;
  color: #d63939;
}
</style>
