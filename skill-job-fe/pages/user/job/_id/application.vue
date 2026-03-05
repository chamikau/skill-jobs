<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <ul class="breadcrumb">
          <li><a href="#"  @click="$router.back()">Jobs</a></li>
          <li>Job Details</li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
<!--              <a class="btn btn-icon me-3" href="#" @click="$router.back()">-->
<!--                <svg class="icon icon-tabler icon-tabler-arrow-narrow-left" fill="none"-->
<!--                     height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                     viewBox="0 0 24 24"-->
<!--                     width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                  <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>-->
<!--                  <line x1="5" x2="19" y1="12" y2="12"></line>-->
<!--                  <line x1="5" x2="9" y1="12" y2="16"></line>-->
<!--                  <line x1="5" x2="9" y1="12" y2="8"></line>-->
<!--                </svg>-->
<!--              </a>-->
              <span class="fw-bold fs-1">Job Details</span>
<!--              <span class="mt-1 mx-1">-->
<!--                <svg class="icon icon-tabler icon-tabler-chevrons-right" fill="none" height="24"-->
<!--                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                     viewBox="0 0 24 24"-->
<!--                     width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>-->
<!--                <polyline points="7 7 12 12 7 17"></polyline>-->
<!--                <polyline points="13 7 18 12 13 17"></polyline>-->
<!--              </svg>-->
<!--              </span>-->
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
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <div>
                  <h3>
                    {{ job.title }}
                  </h3>
                </div>
                  <div v-html="job.description">
                  </div>
                  <div class="col-md-12">
                    <div class="card-footer text-end">
                      <div class="d-flex">
                        <button v-if="user_id_is_match === false" class="btn btn-primary ms-auto me-2" @click="applyPopUp">Apply</button>
                        <button v-else class="btn btn-secondary ms-auto me-2" type="submit" disabled>
                          Applied
                        </button>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                  <label class="fs-3 fw-bold" for="">Hourly Rate</label>
                  <p class="fs-4 text-facebook">{{ "$" + job.work_hour_rate + " hr" }}</p>
                  <label class="fs-3 fw-bold" for="">Duration</label>
                  <p class="fs-4 text-facebook">{{ job.probation_duration + " months" }}</p>
                  <label class="fs-3 fw-bold" for="">Working Hours</label>
                  <p class="fs-4 text-facebook">{{ job.work_hours + " hrs/day"}}</p>
                  <label class="fs-3 fw-bold" for="">Office Location</label>
                  <p class="fs-4 text-facebook">{{ firstLetterUpperCase(job.location_type) }}</p>
              </div>
            </div>
            <div class="card mt-3">
              <div class="card-body">
                <div class="">
                  <div class="row justify-content-center">
                  <span class="d-flex align-items-center">
                  <span class="avatar rounded-circle badge bg-x text-white">{{job.organization.name.slice(0,3)}}</span>
                  <span class="fs-4 fw-bold mx-2">{{ "About " + job.organization.name }}</span>
                  </span>
                  </div>
                  <p class="mt-3 fs-4 text-break">{{ job.organization.about_the_company}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div v-if="applyJobData" class="modal modal-blur fade-in show" id="modal-success" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
            <button @click.stop="returnToPage()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-success"></div>
            <div class="modal-body text-center py-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M9 12l2 2l4 -4"></path></svg>
              <h3>Apply for Job</h3>
              <div class="text-muted">
                Please review the information added to your profile carefully before proceeding. Once you click 'Apply' your application will be submitted, and the information added in your profile will be shared with our administrators as a CV. Are you sure you want to proceed with your application?
              </div>
            </div>
            <div class="modal-footer">
              <div class="w-100">
                <div class="row">
                  <div class="col">
                    <a @click.stop="returnToPage()" class="btn w-100" data-bs-dismiss="modal">
                      Cancel
                    </a>
                  </div>
                  <div class="col">
                    <a @click.stop="appliedForJob" class="btn btn-primary w-100" data-bs-dismiss="modal">
                      Apply
                    </a>
                  </div>
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
  layout: 'dashboard-user',

  data(){
    return {
      applyJobData:false,
      user_id_is_match:'',
      create_job_form: {
        fields: {},
      },
      job:{
        application:'',
        organization:{
          industry_types:{
            name:''
          },
          name:''
        },
        city:{
          name:''
        },
        location_type:''
      },
    }
  },
  mounted(){
    this.getJobs();
  },
  methods:{
    async getJobs() {
      this.data  = (await this.$axios.$get(`/api/student/jobs/${this.$route.params.id}`)).data
      this.job = this.data.job
      this.user_id_is_match = this.data.user_id_is_match;
    },
    async appliedForJob() {
      this.create_job_form.fields.job_id = `${this.$route.params.id}`
      try {
        let job = await this.$axios.$post(`api/student/jobs`, this.create_job_form.fields)
        this.$toast.success('Successfully applied')
        this.applyJobData = false;
        await this.$router.back();
        } catch (e) {
      }
    },
    applyPopUp(){
      this.applyJobData = true;
    },
    returnToPage(){
      this.applyJobData = false;
    },
  },
}
</script>

<style scoped>
.fade-in {
  animation: fade-in 0.5s;
  overflow: hidden;
  backdrop-filter: blur(2px);
  background-color: rgba(0, 0, 0, 0.5);
}
@keyframes fade-in {
  from { opacity: 0; }
  to { opacity: 1; }
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
