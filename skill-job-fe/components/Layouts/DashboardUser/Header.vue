<template>
  <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
    <div class="container-xl">
      <button class="navbar-toggler" data-bs-target="#navbar-menu" data-bs-toggle="collapse" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-nav flex-row order-md-last">

        <!-- Notification -->
<!--        <div class="d-none d-md-flex">-->
<!--          <a class="nav-link px-0 hide-theme-light" data-bs-placement="bottom" data-bs-toggle="tooltip"-->
<!--             href="?theme=light" title="Enable light mode">-->
<!--            &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/sun &ndash;&gt;-->
<!--            <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"-->
<!--                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"-->
<!--                 xmlns="http://www.w3.org/2000/svg">-->
<!--              <path d="M0 0h24v24H0z" fill="none" stroke="none"/>-->
<!--              <circle cx="12" cy="12" r="4"/>-->
<!--              <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"/>-->
<!--            </svg>-->
<!--          </a>-->
<!--          <div class="nav-item dropdown d-none d-md-flex me-3">-->
<!--            <a aria-label="Show notifications" class="nav-link px-0" data-bs-toggle="dropdown" href="#" tabindex="-1">-->
<!--              &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/bell &ndash;&gt;-->
<!--              <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"-->
<!--                   stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"-->
<!--                   xmlns="http://www.w3.org/2000/svg">-->
<!--                <path d="M0 0h24v24H0z" fill="none" stroke="none"/>-->
<!--                <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"/>-->
<!--                <path d="M9 17v1a3 3 0 0 0 6 0v-1"/>-->
<!--              </svg>-->
<!--              <span class="badge bg-red"></span>-->
<!--            </a>-->
<!--            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">-->
<!--              <div class="card">-->
<!--                <div class="card-header">-->
<!--                  <h3 class="card-title">Last updates</h3>-->
<!--                </div>-->
<!--                <div class="list-group list-group-flush list-group-hoverable">-->
<!--                  <div class="list-group-item">-->
<!--                    <div class="row align-items-center">-->
<!--                      <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>-->
<!--                      <div class="col text-truncate">-->
<!--                        <a class="text-body d-block" href="#">Example 1</a>-->
<!--                        <div class="d-block text-muted text-truncate mt-n1">-->
<!--                          Change deprecated html tags to text decoration classes (#29604)-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="col-auto">-->
<!--                        <a class="list-group-item-actions" href="#">-->
<!--                          &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/star &ndash;&gt;-->
<!--                          <svg class="icon text-muted" fill="none" height="24" stroke="currentColor"-->
<!--                               stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"-->
<!--                               width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path d="M0 0h24v24H0z" fill="none" stroke="none"/>-->
<!--                            <path-->
<!--                              d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>-->
<!--                          </svg>-->
<!--                        </a>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div class="list-group-item">-->
<!--                    <div class="row align-items-center">-->
<!--                      <div class="col-auto"><span class="status-dot d-block"></span></div>-->
<!--                      <div class="col text-truncate">-->
<!--                        <a class="text-body d-block" href="#">Example 2</a>-->
<!--                        <div class="d-block text-muted text-truncate mt-n1">-->
<!--                          justify-content:between ⇒ justify-content:space-between (#29734)-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="col-auto">-->
<!--                        <a class="list-group-item-actions show" href="#">-->
<!--                          &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/star &ndash;&gt;-->
<!--                          <svg class="icon text-yellow" fill="none" height="24" stroke="currentColor"-->
<!--                               stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"-->
<!--                               width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path d="M0 0h24v24H0z" fill="none" stroke="none"/>-->
<!--                            <path-->
<!--                              d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>-->
<!--                          </svg>-->
<!--                        </a>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div class="list-group-item">-->
<!--                    <div class="row align-items-center">-->
<!--                      <div class="col-auto"><span class="status-dot d-block"></span></div>-->
<!--                      <div class="col text-truncate">-->
<!--                        <a class="text-body d-block" href="#">Example 3</a>-->
<!--                        <div class="d-block text-muted text-truncate mt-n1">-->
<!--                          Update change-version.js (#29736)-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="col-auto">-->
<!--                        <a class="list-group-item-actions" href="#">-->
<!--                          &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/star &ndash;&gt;-->
<!--                          <svg class="icon text-muted" fill="none" height="24" stroke="currentColor"-->
<!--                               stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"-->
<!--                               width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path d="M0 0h24v24H0z" fill="none" stroke="none"/>-->
<!--                            <path-->
<!--                              d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>-->
<!--                          </svg>-->
<!--                        </a>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div class="list-group-item">-->
<!--                    <div class="row align-items-center">-->
<!--                      <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>-->
<!--                      <div class="col text-truncate">-->
<!--                        <a class="text-body d-block" href="#">Example 4</a>-->
<!--                        <div class="d-block text-muted text-truncate mt-n1">-->
<!--                          Regenerate package-lock.json (#29730)-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="col-auto">-->
<!--                        <a class="list-group-item-actions" href="#">-->
<!--                          &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/star &ndash;&gt;-->
<!--                          <svg class="icon text-muted" fill="none" height="24" stroke="currentColor"-->
<!--                               stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"-->
<!--                               width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path d="M0 0h24v24H0z" fill="none" stroke="none"/>-->
<!--                            <path-->
<!--                              d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>-->
<!--                          </svg>-->
<!--                        </a>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
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
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <NuxtLink class="dropdown-item" to="/user/profile/general">
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
    }
  },
  methods: {
    logout() {
      this.$auth.logout();
    },
  }
}
</script>

<style scoped>
</style>
