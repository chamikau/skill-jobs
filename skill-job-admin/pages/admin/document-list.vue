<template>
  <div>
    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-2">Verification</span>
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
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/document-list/personal/">
                  <span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <circle cx="12" cy="7" r="4"></circle>
                     <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                  </svg>
                  </span>
                  Personal Details
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/document-list/references/">
                  <span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <circle cx="9" cy="7" r="4"></circle>
                     <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                     <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                     <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                  </svg>
                  </span>
                  References
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/document-list/educations">
                  <span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                     <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                  </svg>
                  </span>
                  Educations
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/document-list/achievements">
                  <span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M5.576 5.595a1.994 1.994 0 0 0 -.576 1.405v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2m0 -4v-8a2 2 0 0 0 -2 -2h-2"></path>
                     <path d="M9 5a2 2 0 0 1 2 -2h2a2 2 0 1 1 0 4h-2"></path>
                     <path d="M3 3l18 18"></path>
                  </svg>
                  </span>
                  Achievements
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/document-list/work-experience">
                  <span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M5.576 5.595a1.994 1.994 0 0 0 -.576 1.405v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2m0 -4v-8a2 2 0 0 0 -2 -2h-2"></path>
                     <path d="M9 5a2 2 0 0 1 2 -2h2a2 2 0 1 1 0 4h-2"></path>
                     <path d="M3 3l18 18"></path>
                  </svg>
                  </span>
                  Work Experience
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/document-list/projects">
                  <span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                     <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                     <line x1="9" y1="9" x2="10" y2="9"></line>
                     <line x1="9" y1="13" x2="15" y2="13"></line>
                     <line x1="9" y1="17" x2="15" y2="17"></line>
                  </svg>
                  </span>
                  Projects
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
  name: "index",
  layout: 'dashboard-admin',
}
</script>

<style scoped>
.chip-pending {
  display: inline-block;
  padding: 0 10px;
  height: 28px;
  font-size: 14px;
  line-height: 25px;
  border-radius: 25px;
  background-color: #1a91da;
  color: white;
  opacity: 0.5;
}
.chip-verify {
  display: inline-block;
  padding: 0 10px;
  height: 28px;
  font-size: 14px;
  line-height: 25px;
  border-radius: 25px;
  background-color: #0ca678;
  color: white;
  opacity: 0.5;
}
.chip-block {
  display: inline-block;
  padding: 0 10px;
  height: 28px;
  font-size: 14px;
  line-height: 25px;
  border-radius: 25px;
  background-color: #8e0615;
  color: white;
  opacity: 0.5;
}
</style>
