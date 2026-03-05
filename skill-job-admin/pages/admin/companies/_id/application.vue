<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a href="#" @click.prevent="backToPage">Companies</a></li>
          <li><a href="#">Company Details</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">Company</span>
              <span class="ms-2 mx-2 bold"  style="font-size: 2rem;"> - </span>
              <span class="fw-bold fs-1">{{ company.name }}</span>
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
                    <h2>
                      Company Details
                    </h2>
                  </div>
                  <div class="">
                    <label for="">Company Name</label>
                    <h4 class="">{{ company.name }}</h4>
                  </div>
                  <div class="">
                    <label for="">About Company</label>
                    <h4 class="">{{ company.about_the_company }}</h4>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div>
                    <h2>
                      Industry Details
                    </h2>
                  </div>
                  <div class="">
                    <label for="">Industry Type</label>
                    <h4 class="">{{ company.industry_types.name }}</h4>
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
      company:{
        name:'',
        industry_types:{},
        owner:{},
      },

    }
  },
  mounted(){
    this.getCompanies();
  },
  methods:{
    async getCompanies() {
      this.company = (await this.$axios.$get(`/api/admin/get-company-lists/${this.$route.params.id}`)).data
      this.industry_types = this.company.industry_types
      this.owner = this.company.owner
    },
    backToPage(){
      this.$router.push(`/admin/companies`);
    },
  },
}
</script>

<style scoped>
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
