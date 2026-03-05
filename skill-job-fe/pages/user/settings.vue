<template>
  <div>
    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-2">Settings</span>
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
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/settings/users">
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
                  Users
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/settings/roles">
                  <span>
                    <svg class="icon icon-tabler icon-tabler-lock-access mx-1" fill="none"
                         height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                         width="24" xmlns="http://www.w3.org/2000/svg">
                       <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                       <path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>
                       <path d="M4 16v2a2 2 0 0 0 2 2h2"></path>
                       <path d="M16 4h2a2 2 0 0 1 2 2v2"></path>
                       <path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>
                       <rect height="5" rx="1" width="8" x="8" y="11"></rect>
                       <path d="M10 11v-2a2 2 0 1 1 4 0v2"></path>
                    </svg>
                  </span>
                  Roles & Permissions
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/settings/tags">
                  <span>
                   <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tag mx-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <circle cx="8.5" cy="8.5" r="1" fill="currentColor"></circle>
                       <path d="M4 7v3.859c0 .537 .213 1.052 .593 1.432l8.116 8.116a2.025 2.025 0 0 0 2.864 0l4.834 -4.834a2.025 2.025 0 0 0 0 -2.864l-8.117 -8.116a2.025 2.025 0 0 0 -1.431 -.593h-3.859a3 3 0 0 0 -3 3z"></path>
                   </svg>
                  </span>
                  Tags
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/settings/consultations">
                  <span>
                   <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notes mx-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                     <line x1="9" y1="7" x2="15" y2="7"></line>
                     <line x1="9" y1="11" x2="15" y2="11"></line>
                     <line x1="9" y1="15" x2="13" y2="15"></line>
                  </svg>
                  </span>
                  Consultation Forms
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/settings/products">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box mx-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                       <line x1="12" y1="12" x2="20" y2="7.5"></line>
                       <line x1="12" y1="12" x2="12" y2="21"></line>
                       <line x1="12" y1="12" x2="4" y2="7.5"></line>
                    </svg>
                  </span>
                  Products
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/settings/collections">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack-3 mx-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M12 2l-8 4l8 4l8 -4l-8 -4"></path>
                       <path d="M4 10l8 4l8 -4"></path>
                       <path d="M4 18l8 4l8 -4"></path>
                       <path d="M4 14l8 4l8 -4"></path>
                    </svg>
                  </span>
                  Product Collections
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
  name: "settings",
  layout: 'dashboard-user'
}
</script>

<style scoped>

</style>
