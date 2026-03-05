<template>
  <div>
    <!-- Page title -->
    <div class="container-xl">
      <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <div class="col-md-2 col-xl-auto me-3 my-2">
                <a aria-label="Facebook" class="btn btn-primary w-100 btn-icon" href="#" @click="$router.back()">
                  <svg class="icon icon-tabler icon-tabler-arrow-narrow-left" fill="none"
                       height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       viewBox="0 0 24 24"
                       width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                    <line x1="5" x2="19" y1="12" y2="12"></line>
                    <line x1="5" x2="9" y1="12" y2="16"></line>
                    <line x1="5" x2="9" y1="12" y2="8"></line>
                  </svg>

                </a>
              </div>
              <span class="fw-bold fs-2">Clinics</span>
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
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/organizations/clinics">
                  <span>
                    <svg class="icon icon-tabler icon-tabler-building-bank mx-1" data-v-46173a10="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path data-v-46173a10="" stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <line data-v-46173a10="" x1="3" y1="21" x2="21" y2="21"></line>
                      <line data-v-46173a10="" x1="3" y1="10" x2="21" y2="10"></line>
                      <polyline data-v-46173a10="" points="5 6 12 3 19 6"></polyline>
                      <line data-v-46173a10="" x1="4" y1="10" x2="4" y2="21"></line>
                      <line data-v-46173a10="" x1="20" y1="10" x2="20" y2="21"></line>
                      <line data-v-46173a10="" x1="8" y1="14" x2="8" y2="17"></line>
                      <line data-v-46173a10="" x1="12" y1="14" x2="12" y2="17"></line>
                      <line data-v-46173a10="" x1="16" y1="14" x2="16" y2="17"></line>
                    </svg>
                  </span>
                  Clinics
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/organizations/invitations">
                  <span>
                    <svg class="icon icon-tabler icon-tabler-users mx-1" fill="none" height="24"
                         stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         viewBox="0 0 24 24"
                         width="24" xmlns="http://www.w3.org/2000/svg">
                       <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                       <circle cx="9" cy="7" r="4"></circle>
                       <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                       <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                       <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                    </svg>
                  </span>
                  Invitations
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
  name: "organizations",
  layout: 'dashboard-admin-organization',
  data() {
    return {

    }
  },
  mounted() {
  },
  methods: {
  }
}
</script>

<style scoped>
.container-xl {
  max-width: 1250px;
}
</style>
