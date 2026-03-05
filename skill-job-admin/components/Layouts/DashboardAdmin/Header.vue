<template>
  <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
    <div class="container-xl">
      <button class="navbar-toggler" data-bs-target="#navbar-menu" data-bs-toggle="collapse" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-nav flex-row order-md-last">
        <!-- Organizations -->
<!--        <div class="nav-item dropdown">-->
<!--          <a aria-label="Open user menu" class="nav-link d-flex lh-1 text-reset p-0 nav-link dropdown-toggle me-3"-->
<!--             data-bs-toggle="dropdown" href="#">-->
<!--            <div class="d-none d-lg-block ps-2 me-1">-->
<!--              <div class="nav-link-title">{{ current_organization.name }}</div>-->
<!--            </div>-->
<!--          </a>-->
<!--          <div id="organization_list" class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">-->

<!--            <NuxtLink to="/admin/organizations" class="dropdown-item" role="button">-->
<!--              <span class="pe-2">-->
<!--                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-bank" width="24"-->
<!--                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"-->
<!--                     stroke-linecap="round" stroke-linejoin="round">-->
<!--                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>-->
<!--                   <line x1="3" y1="21" x2="21" y2="21"></line>-->
<!--                   <line x1="3" y1="10" x2="21" y2="10"></line>-->
<!--                   <polyline points="5 6 12 3 19 6"></polyline>-->
<!--                   <line x1="4" y1="10" x2="4" y2="21"></line>-->
<!--                   <line x1="20" y1="10" x2="20" y2="21"></line>-->
<!--                   <line x1="8" y1="14" x2="8" y2="17"></line>-->
<!--                   <line x1="12" y1="14" x2="12" y2="17"></line>-->
<!--                   <line x1="16" y1="14" x2="16" y2="17"></line>-->
<!--                </svg>-->
<!--              </span>-->
<!--              Manage Companies-->
<!--            </NuxtLink>-->
<!--            <div class="dropdown-divider" v-if="organization_data.data && organization_data.data.length!==1"></div>-->
<!--            <a v-for="organization in organization_data.data" v-if="!(current_organization.name === organization.name)"-->
<!--               class="dropdown-item" role="button" @click.prevent="goToOrganization(organization)">-->
<!--              {{ organization.name }}-->
<!--            </a>-->

<!--          </div>-->
<!--        </div>-->
        <!-- StudentProfileController -->
        <div class="nav-item dropdown">
          <a aria-label="Open user menu" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" href="#">
            <span class="avatar avatar-sm">
                          {{ $auth.user.first_name.slice(0, 1) + $auth.user.last_name.slice(0, 1) }}
            </span>
            <div class="d-none d-xl-block ps-2">
              <div>{{ $auth.user.first_name + ' ' + $auth.user.last_name }}</div>
              <div class="mt-1 small text-muted">{{role.name}}</div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <NuxtLink class="dropdown-item" to="/admin/profile/general">
              <span>
                <svg class="icon icon-tabler icon-tabler-user mx-1" fill="none" height="24"
                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     viewBox="0 0 24 24"
                     width="24" xmlns="http://www.w3.org/2000/svg">
                     <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                     <circle cx="12" cy="7" r="4"></circle>
                     <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                </svg>
              </span>
              Profile & Account
            </NuxtLink>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" @click.prevent="logout">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout mx-1" width="24"
                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                   <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                </svg>
              </span>
              Logout
            </a>
          </div>
        </div>
      </div>
      <div id="navbar-menu" class="collapse navbar-collapse">

      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "Header",
  data() {
    return {
      organization_data: {},
      current_organization: {},
      role:""
    }
  },
  mounted() {
    this.getOrganizations()
    this.getCurrentOrganization()
    // this.getRole()
  },
  methods: {
    logout() {
      localStorage.setItem('organization', '');
      this.$auth.logout();
    },
    async getOrganizations() {
      this.organization_data = await this.$axios.$get('api/admin/organizations', {'params': {'per_page': 100}});
    },
    // async getRole() {
    //   let response = (await this.$axios.$get('/api/admin/profile/roles'))
    //   this.role = response.data
    // },
    getCurrentOrganization() {
      if (localStorage.getItem('organization')) {
        this.current_organization = JSON.parse(localStorage.getItem('organization'))
      }
    },
    async goToOrganization(organization) {
      await this.$setGlobalOrganization(organization.id)
      window.location.reload(true)
    },
  }
}
</script>

<style scoped>
#organization_list {
  max-height: 280px;
  overflow-y: auto;
}
</style>
