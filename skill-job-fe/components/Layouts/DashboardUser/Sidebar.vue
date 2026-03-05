<template>
  <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" data-bs-target="#navbar-menu" data-bs-toggle="collapse" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="navbar-brand navbar-brand-autodark text-white ms-3" style="justify-content: left !important;">
        <a href="#" class=" mt-lg-3 me-lg-1 ms-1">
<!--          <img alt="Tabler" class="navbar-brand-image" src='~/assets/Logo_white.png' style="height:30px;">-->
          MoxyBase
        </a>
      </h1>
      <div class="navbar-nav flex-row d-lg-none">
        <div class="nav-item d-none d-lg-flex me-3">
          <div class="btn-list">
          </div>
        </div>
        <!-- Organizations -->
        <div class="nav-item dropdown">
          <a aria-label="Open user menu" class="nav-link d-flex lh-1 text-reset p-0 nav-link me-2"
             data-bs-toggle="dropdown" href="#">
            <div class="d-xl-block ps-2">
              <span class="pe-2">
                <svg class="icon icon-tabler icon-tabler-building-bank" fill="none" height="24"
                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                     width="24" xmlns="http://www.w3.org/2000/svg">
                   <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                   <line x1="3" x2="21" y1="21" y2="21"></line>
                   <line x1="3" x2="21" y1="10" y2="10"></line>
                   <polyline points="5 6 12 3 19 6"></polyline>
                   <line x1="4" x2="4" y1="10" y2="21"></line>
                   <line x1="20" x2="20" y1="10" y2="21"></line>
                   <line x1="8" x2="8" y1="14" y2="17"></line>
                   <line x1="12" x2="12" y1="14" y2="17"></line>
                   <line x1="16" x2="16" y1="14" y2="17"></line>
                </svg>
              </span>
            </div>
          </a>
<!--          <div id="organization_list" class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">-->
<!--            <div class="dropdown-divider" v-if="organization_data.data && organization_data.data.length!==1"></div>-->
<!--            <a v-for="organization in organization_data.data" v-if="!(current_organization.name === organization.name)"-->
<!--               class="dropdown-item" role="button" @click.prevent="goToOrganization(organization)">-->
<!--              {{ organization.name }}-->
<!--            </a>-->

<!--          </div>-->
        </div>
        <!-- Notification -->
        <div class="d-none d-lg-flex">
          <a class="nav-link px-0 hide-theme-dark" data-bs-placement="bottom" data-bs-toggle="tooltip"
             href="?theme=dark"
             title="Enable dark mode">
            <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
            <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                 xmlns="http://www.w3.org/2000/svg">
              <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
              <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"/>
            </svg>
          </a>
          <a class="nav-link px-0 hide-theme-light" data-bs-placement="bottom" data-bs-toggle="tooltip"
             href="?theme=light" title="Enable light mode">
            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
            <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                 xmlns="http://www.w3.org/2000/svg">
              <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
              <circle cx="12" cy="12" r="4"/>
              <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"/>
            </svg>
          </a>
          <div class="nav-item dropdown d-none d-md-flex me-3">
            <a aria-label="Show notifications" class="nav-link px-0" data-bs-toggle="dropdown" href="#" tabindex="-1">
              <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
              <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                   stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                   xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"/>
                <path d="M9 17v1a3 3 0 0 0 6 0v-1"/>
              </svg>
              <span class="badge bg-red"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Last updates</h3>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                      <div class="col text-truncate">
                        <a class="text-body d-block" href="#">Example 1</a>
                        <div class="d-block text-muted text-truncate mt-n1">
                          Change deprecated html tags to text decoration classes (#29604)
                        </div>
                      </div>
                      <div class="col-auto">
                        <a class="list-group-item-actions" href="#">
                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                          <svg class="icon text-muted" fill="none" height="24" stroke="currentColor"
                               stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                               width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                            <path
                              d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="status-dot d-block"></span></div>
                      <div class="col text-truncate">
                        <a class="text-body d-block" href="#">Example 2</a>
                        <div class="d-block text-muted text-truncate mt-n1">
                          justify-content:between ⇒ justify-content:space-between (#29734)
                        </div>
                      </div>
                      <div class="col-auto">
                        <a class="list-group-item-actions show" href="#">
                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                          <svg class="icon text-yellow" fill="none" height="24" stroke="currentColor"
                               stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                               width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                            <path
                              d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="status-dot d-block"></span></div>
                      <div class="col text-truncate">
                        <a class="text-body d-block" href="#">Example 3</a>
                        <div class="d-block text-muted text-truncate mt-n1">
                          Update change-version.js (#29736)
                        </div>
                      </div>
                      <div class="col-auto">
                        <a class="list-group-item-actions" href="#">
                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                          <svg class="icon text-muted" fill="none" height="24" stroke="currentColor"
                               stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                               width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                            <path
                              d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                      <div class="col text-truncate">
                        <a class="text-body d-block" href="#">Example 4</a>
                        <div class="d-block text-muted text-truncate mt-n1">
                          Regenerate package-lock.json (#29730)
                        </div>
                      </div>
                      <div class="col-auto">
                        <a class="list-group-item-actions" href="#">
                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                          <svg class="icon text-muted" fill="none" height="24" stroke="currentColor"
                               stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                               width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                            <path
                              d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
                <svg class="icon icon-tabler icon-tabler-logout mx-1" fill="none" height="24"
                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                     width="24" xmlns="http://www.w3.org/2000/svg">
                   <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                   <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                   <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                </svg>
              </span>
              Logout
            </a>
          </div>
        </div>
      </div>
      <div id="navbar-menu" class="collapse navbar-collapse mx-2">
        <ul class="navbar-nav pt-lg-3">
          <li class="nav-item mb-2">
            <NuxtLink class="nav-link" to="/user/dashboard">
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg class="icon icon-tabler icon-tabler-device-desktop-analytics"
                         fill="none" height="24" stroke="currentColor"
                         stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                         xmlns="http://www.w3.org/2000/svg">
                     <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                     <rect height="12" rx="1" width="18" x="3" y="4"></rect>
                     <path d="M7 20h10"></path>
                     <path d="M9 16v4"></path>
                     <path d="M15 16v4"></path>
                     <path d="M9 12v-4"></path>
                     <path d="M12 12v-1"></path>
                     <path d="M15 12v-2"></path>
                     <path d="M12 12v-1"></path>
                    </svg>
                  </span>
              <span class="nav-link-title">
                Dashboard
              </span>
            </NuxtLink>
          </li>
          <li class="nav-item mb-2">
            <NuxtLink class="nav-link" to="/user/job">
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                       <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path>
                       <path d="M12 12l0 .01"></path>
                       <path d="M3 13a20 20 0 0 0 18 0"></path>
                    </svg>
                  </span>
              <span class="nav-link-title">
                Jobs
              </span>
            </NuxtLink>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                  <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z"/>
                  <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
                </svg>
              </span>
              <span class="nav-link-title">
                Courses
              </span>
            </a>
            <div class="dropdown-menu">
              <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                  <NuxtLink class="dropdown-item" to="/user/courses">
                    <span class="nav-link-title">
                      Courses List
                    </span>
                  </NuxtLink>
                  <NuxtLink class="dropdown-item" to="/user/applied-course-lists">
                    <span class="nav-link-title">
                      Applied Courses
                    </span>
                  </NuxtLink>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
                       <path d="M18 14v4h4"></path>
                       <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path>
                       <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                       <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                       <path d="M8 11h4"></path>
                       <path d="M8 15h3"></path>
                    </svg>
              </span>
              <span class="nav-link-title">
                Events
              </span>
            </a>
            <div class="dropdown-menu">
              <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                  <NuxtLink class="dropdown-item" to="/user/events">
                    <span class="nav-link-title">
                      Events List
                    </span>
                  </NuxtLink>
                  <NuxtLink class="dropdown-item" to="/user/applied-event-lists">
                    <span class="nav-link-title">
                      Applied Events
                    </span>
                  </NuxtLink>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item mb-2">
            <NuxtLink class="nav-link" to="/user/news">
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-license" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path>
                     <path d="M9 7l4 0"></path>
                     <path d="M9 11l4 0"></path>
                  </svg>
                  </span>
                  </span>
              <span class="nav-link-title">
                News
              </span>
            </NuxtLink>
          </li>
<!--          <li class="nav-item">-->
<!--            <NuxtLink class="nav-link" to="/user/mentors">-->
<!--              <span class="nav-link-icon d-md-none d-lg-inline-block">&lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/home &ndash;&gt;-->
<!--                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb" viewBox="0 0 16 16">-->
<!--                  <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"/>-->
<!--                </svg>-->
<!--              </span>-->
<!--              <span class="nav-link-title">-->
<!--                Mentorships-->
<!--              </span>-->
<!--            </NuxtLink>-->
<!--          </li>-->
          <li class="nav-item mt-6" style="margin-top: 5rem">
            <NuxtLink class="nav-link" to="/user/feedbacks/create">
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-dots" width="24" height="24"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                   <path d="M12 11l0 .01"></path>
                   <path d="M8 11l0 .01"></path>
                   <path d="M16 11l0 .01"></path>
                </svg>
                  </span>
              <span class="nav-link-title">
                Feedbacks
              </span>
            </NuxtLink>
          </li>
<!--          <li class="nav-item mb-2">-->
<!--            <NuxtLink class="nav-link" to="/user/settings">-->
<!--              <span class="nav-link-icon d-md-none d-lg-inline-block">&lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/home &ndash;&gt;-->
<!--                    <svg class="icon icon-tabler icon-tabler-settings" fill="none" height="24"-->
<!--                         stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                         viewBox="0 0 24 24"-->
<!--                         width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                       <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>-->
<!--                       <path-->
<!--                         d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>-->
<!--                       <circle cx="12" cy="12" r="3"></circle>-->
<!--                    </svg>-->
<!--                  </span>-->
<!--              <span class="nav-link-title">-->
<!--                Settings-->
<!--              </span>-->
<!--            </NuxtLink>-->
<!--          </li>-->
        </ul>
      </div>
    </div>
  </aside>
</template>

<script>
export default {
  name: "Sidebar",
  data() {
    return {
      // organization_data: {},
      // current_organization: {}
    }
  },
  watch: {
    '$route.path'(val) {
      if (val==='/user/settings') this.$router.push('/user/settings/users')
    }
  },
  methods: {
    logout() {
      localStorage.setItem('student', '');
      this.$auth.logout();
    },
  }
}
</script>

<style scoped>
a.nuxt-link-active {
  font-weight: bold;
  background-color: #8D80D1 !important;
  border-left: none!important;
}
</style>
