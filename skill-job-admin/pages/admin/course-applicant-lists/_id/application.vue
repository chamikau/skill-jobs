<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <NuxtLink class="btn btn-icon me-3" href="#" to="/admin/course-applicant-lists">
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
              <span class="fw-bold fs-2">Student</span>
              <span class="mt-1 mx-1">
                <svg class="icon icon-tabler icon-tabler-chevrons-right" fill="none" height="24"
                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     viewBox="0 0 24 24"
                     width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                <polyline points="7 7 12 12 7 17"></polyline>
                <polyline points="13 7 18 12 13 17"></polyline>
              </svg>
              </span>
              <span class="mt-1 font-weight-normal">{{ student.first_name + " " + student.last_name }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <div class="">
                    <label for="">Name</label>
                    <h4 class="">{{ student.first_name + " " + student.last_name }}</h4>
                  </div>
                  <div class="">
                    <label for="">Email</label>
                    <h4 class="">{{ student.email }}</h4>
                  </div>
                  <div class="">
                    <label for="">Phone</label>
                    <h4 class="">{{ student.phone_number_1 }}</h4>
                  </div>
                  <div class="">
                    <label for="">Facebook Link</label>
                    <a class="link-underline-primary" target="_blank"  :href="facebook_link">{{ student.facebook_link }}</a>
                  </div>
                  <div class="">
                    <label for="">Instagram Link</label>
                    <a class="link-underline-primary" target="_blank"  :href="instagram_link">{{ student.instagram_link }}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "application",
  layout: 'dashboard-admin',

  data(){
    return {
      student:{
        application:"",
      },
      facebook_link:"",
      instagram_link:"",
    }
  },
  mounted(){
    this.getStudents();
  },
  methods:{
    async getStudents() {
      this.student = (await this.$axios.$get(`/api/admin/students/${this.$route.params.id}`)).data
      this.facebook_link = this.student.facebook_link
      this.instagram_link = this.student.instagram_link
    },
  },
}
</script>

<style scoped>

</style>
