<template>
  <div>
    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a href="#" @click.prevent="backToPage">Jobs</a></li>
          <li><a href="#" @click.prevent="backToPage">Job Applicants</a></li>
          <li><a>View Applicant</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">Applicant</span>
              <span class="ms-2 mx-2 bold"  style="font-size: 2rem;"> - </span>
              <span class="fw-bold fs-1">{{ student.first_name + " " + student.last_name }}</span>
              <span class="ms-2 mx-2 bold"  style="font-size: 2rem;"> | </span>
              <span class="fw-bold fs-1">Job</span>
              <span class="ms-2 mx-2 bold"  style="font-size: 2rem;"> - </span>
              <span class="fw-bold fs-1">{{ job.title }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-body">
      <div class="container-xl">
        <div class="row">
          <div class="col-md-3 mb-3 mb-md-0">
            <div class="card">
              <div class="list-group list-group-flush" data-bs-toggle="tabs">
                <NuxtLink class="list-group-item list-group-item-action" :to="`/admin/job-applicant-lists/job-application-view/${student.id}/general`">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M12 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                       <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                    </svg>
                  </span>
                  General Details
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action"  :to="`/admin/job-applicant-lists/job-application-view/${student.id}/educations`">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                       <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                       <path d="M3 6l0 13"></path>
                       <path d="M12 6l0 13"></path>
                       <path d="M21 6l0 13"></path>
                    </svg>
                  </span>
                  Educational Details
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action"  :to="`/admin/job-applicant-lists/job-application-view/${student.id}/projects`">
                  <span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-align-box-bottom-center" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                     <path d="M9 15v2"></path>
                     <path d="M12 11v6"></path>
                     <path d="M15 13v4"></path>
                  </svg>
                  </span>
                  Project Details
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action"  :to="`/admin/job-applicant-lists/job-application-view/${student.id}/certifications`">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                       <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                    </svg>
                  </span>
                  Certification Details
                </NuxtLink>
                <NuxtLink
                  class="list-group-item list-group-item-action"  :to="`/admin/job-applicant-lists/job-application-view/${student.id}/hobbies-and-list`">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hourglass-empty" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 20v-2a6 6 0 1 1 12 0v2a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1z"></path>
                    <path d="M6 4v2a6 6 0 1 0 12 0v-2a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1z"></path>
                  </svg>
                  Career Interests & Hobbies
                </NuxtLink>
              </div>
            </div>
          </div>

          <div class="col-md-9">
            <NuxtChild/>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "_id",
  layout: 'dashboard-admin',

  data() {
    return {
      job:'',
      jobId:'',
      studentId:'',
      student:{}
    }
    },

  mounted() {
    this.getStudents()
    this.getJobs()
    },

  methods:{
    async getStudents() {
      const studentId = this.$route.query.studentId;
      this.student = (await this.$axios.$get(`/api/admin/students/${studentId}`)).data
    },
    async getJobs() {
      try {
        const jobId = this.$route.query.jobId;
        this.job = (await this.$axios.$get(`/api/admin/jobs/${jobId}`)).data
      }catch (e){

      }
    },
    backToPage(){
      this.$router.push(`/admin/job-applicant-lists`);
    },
  }
}
</script>

<style scoped>
.container-xl {
  max-width: 1250px;
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
