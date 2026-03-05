<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a href="#" @click.prevent="backToPage">Jobs</a></li>
          <li><a href="#" @click.prevent="backToPage">Jobs List</a></li>
          <li><a>Job Details</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">Job Details</span>
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
                  <div v-html="job.description">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div>
                    <h2>
                      Job Details
                    </h2>
                  </div>
                  <div class="">
                    <label for="">Job Title</label>
                    <h4 class="">{{ job.title }}</h4>
                  </div>
                  <div class="">
                    <label for="">Job Type</label>
                    <h4 class="">{{ firstLetterUpperCase(job.location_type) }}</h4>
                  </div>
                  <div class="">
                    <label for="">Work Hours</label>
                    <h4 class="">{{ job.work_hours + ' hours'}}</h4>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <div class="card-body">
                  <div>
                    <h2>
                      Company Details
                    </h2>
                  </div>
                  <div class="">
                    <label for="">Company Name</label>
                    <h4 class="">{{ organization.name }}</h4>
                  </div>
                  <div class="">
                    <label for="">Industry Type</label>
                    <h4 class="">{{ organization.industry_types.name }}</h4>
                  </div>
                  <div class="">
                    <label for="">About Company</label>
                    <h4 class="">{{ organization.about_the_company }}</h4>
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
      job:{
        location_type:''
      },
      organization:{
        industry_types:{}
      }
    }
  },
  mounted(){
    this.getFeedbacks();
  },
  methods:{
    async getFeedbacks() {
      this.job = (await this.$axios.$get(`/api/admin/jobs/${this.$route.params.id}`)).data
      this.organization = this.job.organization
    },
    backToPage(){
      this.$router.push(`/admin/jobs`);
    },
  },
}
</script>

<style scoped>
.circle-radio .circle {
  width: 40px;
  height: 40px;
  background-color: #f0f0f0;
  border-radius: 50%;
  border: 1px solid #000;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 16px;
  font-weight: bold;
  color: black ;
}
.circle-radio {
  position: relative;
  display: inline-block;
  cursor: pointer;
  margin-right: 10px;
}

.circle-radio input[type="radio"] {
  display: none;
}

.circle-radio input[type="radio"]:checked + .circle {
  background-color: #4a4f59;
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
