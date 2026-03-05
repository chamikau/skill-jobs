<template>
  <div>
    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a href="#" @click.prevent="backToPage">Jobs</a></li>
          <li><a>Create Job</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <h5 class="card-title mt-3 fs-1">Create Job</h5>
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
                <NuxtLink v-if="!isLinkEnabled" class="list-group-item list-group-item-action" to="/admin/job/create-job/general">
                  Basic Details
                </NuxtLink>
                <NuxtLink v-else class="list-group-item list-group-item-action disabled-link" to="/admin/job/create-job/general">
                  Basic Details
                </NuxtLink>
                <NuxtLink v-if="isLinkEnabled" class="list-group-item list-group-item-action" :to="`/admin/job/create-job/${this.job.id}/description`">
                  Description
                </NuxtLink>
                <NuxtLink v-else class="list-group-item list-group-item-action disabled-link" :to="`/admin/job/create-job/${this.job.id}/description`">
                  Description
                </NuxtLink>
              </div>
            </div>
          </div>

          <div class="col-md-9">
            <NuxtChild @child-event="handleChildEvent" />
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "create-job",
  layout: 'dashboard-admin',

  data(){
    return {
      job:{},
      isLinkEnabled:false,
      job_id:''
    }
  },

  mounted() {
    this.getJobs()
    },
  methods: {
    handleChildEvent(data) {
      if (data !== null) {
        this.isLinkEnabled = true;
        this.job_id = data.id
      } else {
        this.isLinkEnabled = false;
      }
    },
    async getJobs() {
      this.job = (await this.$axios.$get(`/api/admin/jobs/${this.$route.params.id}`)).data
      this.job_id = this.job.id
      if (this.job_id !== null){
        this.isLinkEnabled = true;
      }else {
        this.isLinkEnabled = false;
      }
    },
    backToPage(){
      this.$router.push(`/admin/job`);
    },
  }
}
</script>

<style scoped>
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
