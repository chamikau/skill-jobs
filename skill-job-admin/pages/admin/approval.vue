<template>

<!--  <div class="page">-->
<!--&lt;!&ndash;    <div>&ndash;&gt;-->
<!--&lt;!&ndash;      <div class="container-xl">&ndash;&gt;-->
<!--&lt;!&ndash;        &lt;!&ndash; Page title &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;        <div class="page-header d-print-none">&ndash;&gt;-->
<!--&lt;!&ndash;          <div class="row g-2 align-items-center">&ndash;&gt;-->
<!--&lt;!&ndash;            <div class="col">&ndash;&gt;-->
<!--&lt;!&ndash;              <div class="d-flex align-items-center">&ndash;&gt;-->
<!--&lt;!&ndash;                <span class="fw-bold fs-2">Verification</span>&ndash;&gt;-->
<!--&lt;!&ndash;              </div>&ndash;&gt;-->
<!--&lt;!&ndash;            </div>&ndash;&gt;-->
<!--&lt;!&ndash;          </div>&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--&lt;!&ndash;      </div>&ndash;&gt;-->
<!--&lt;!&ndash;      <div class="page-body">&ndash;&gt;-->
<!--&lt;!&ndash;        <div class="container-xl">&ndash;&gt;-->
<!--&lt;!&ndash;          <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;            <div class="col-md-3 mb-3 mb-md-0">&ndash;&gt;-->
<!--&lt;!&ndash;              <div class="card">&ndash;&gt;-->
<!--&lt;!&ndash;                <div class="list-group list-group-flush" data-bs-toggle="tabs">&ndash;&gt;-->
<!--&lt;!&ndash;                  <NuxtLink class="list-group-item list-group-item-action" to="/admin/approval/a/pending-approval">&ndash;&gt;-->
<!--&lt;!&ndash;                  <span>&ndash;&gt;-->
<!--&lt;!&ndash;                  <svg class="icon icon-tabler icon-tabler-users mx-1" fill="none" height="24"&ndash;&gt;-->
<!--&lt;!&ndash;                       stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"&ndash;&gt;-->
<!--&lt;!&ndash;                       viewBox="0 0 24 24"&ndash;&gt;-->
<!--&lt;!&ndash;                       width="24" xmlns="http://www.w3.org/2000/svg">&ndash;&gt;-->
<!--&lt;!&ndash;                       <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>&ndash;&gt;-->
<!--&lt;!&ndash;                       <circle cx="9" cy="7" r="4"></circle>&ndash;&gt;-->
<!--&lt;!&ndash;                       <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>&ndash;&gt;-->
<!--&lt;!&ndash;                       <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>&ndash;&gt;-->
<!--&lt;!&ndash;                       <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>&ndash;&gt;-->
<!--&lt;!&ndash;                    </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                  </span>&ndash;&gt;-->
<!--&lt;!&ndash;                    Pending&ndash;&gt;-->
<!--&lt;!&ndash;                  </NuxtLink>&ndash;&gt;-->
<!--&lt;!&ndash;                  <NuxtLink class="list-group-item list-group-item-action" to="/admin/settings/roles">&ndash;&gt;-->
<!--&lt;!&ndash;                  <span>&ndash;&gt;-->
<!--&lt;!&ndash;                    <svg class="icon icon-tabler icon-tabler-lock-access mx-1" fill="none"&ndash;&gt;-->
<!--&lt;!&ndash;                         height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"&ndash;&gt;-->
<!--&lt;!&ndash;                         width="24" xmlns="http://www.w3.org/2000/svg">&ndash;&gt;-->
<!--&lt;!&ndash;                       <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>&ndash;&gt;-->
<!--&lt;!&ndash;                       <path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>&ndash;&gt;-->
<!--&lt;!&ndash;                       <path d="M4 16v2a2 2 0 0 0 2 2h2"></path>&ndash;&gt;-->
<!--&lt;!&ndash;                       <path d="M16 4h2a2 2 0 0 1 2 2v2"></path>&ndash;&gt;-->
<!--&lt;!&ndash;                       <path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>&ndash;&gt;-->
<!--&lt;!&ndash;                       <rect height="5" rx="1" width="8" x="8" y="11"></rect>&ndash;&gt;-->
<!--&lt;!&ndash;                       <path d="M10 11v-2a2 2 0 1 1 4 0v2"></path>&ndash;&gt;-->
<!--&lt;!&ndash;                    </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                  </span>&ndash;&gt;-->
<!--&lt;!&ndash;                    Verified&ndash;&gt;-->
<!--&lt;!&ndash;                  </NuxtLink>&ndash;&gt;-->
<!--&lt;!&ndash;                  <NuxtLink class="list-group-item list-group-item-action" to="/admin/settings/tags">&ndash;&gt;-->
<!--&lt;!&ndash;                  <span>&ndash;&gt;-->
<!--&lt;!&ndash;                   <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tag mx-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>&ndash;&gt;-->
<!--&lt;!&ndash;                       <circle cx="8.5" cy="8.5" r="1" fill="currentColor"></circle>&ndash;&gt;-->
<!--&lt;!&ndash;                       <path d="M4 7v3.859c0 .537 .213 1.052 .593 1.432l8.116 8.116a2.025 2.025 0 0 0 2.864 0l4.834 -4.834a2.025 2.025 0 0 0 0 -2.864l-8.117 -8.116a2.025 2.025 0 0 0 -1.431 -.593h-3.859a3 3 0 0 0 -3 3z"></path>&ndash;&gt;-->
<!--&lt;!&ndash;                   </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                  </span>&ndash;&gt;-->
<!--&lt;!&ndash;                    Blocked&ndash;&gt;-->
<!--&lt;!&ndash;                  </NuxtLink>&ndash;&gt;-->
<!--&lt;!&ndash;                </div>&ndash;&gt;-->
<!--&lt;!&ndash;              </div>&ndash;&gt;-->
<!--&lt;!&ndash;            </div>&ndash;&gt;-->

<!--&lt;!&ndash;            <div class="col-md-9">&ndash;&gt;-->
<!--&lt;!&ndash;              <NuxtChild/>&ndash;&gt;-->
<!--&lt;!&ndash;            </div>&ndash;&gt;-->

<!--&lt;!&ndash;          </div>&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--&lt;!&ndash;      </div>&ndash;&gt;-->
<!--&lt;!&ndash;    </div>&ndash;&gt;-->
<!--    <h1>Search</h1>-->
<!--    <div class="card">-->
<!--      <div class="card-body">-->
<!--        <div class="row">-->
<!--          <div class="col-md-4">-->
<!--            <lable class="form-label">StudentOld ID</lable>-->
<!--            <input type="text" class="form-control" placeholder="Search StudentOld Id">-->
<!--          </div>-->
<!--          <div class="col-md-4">-->
<!--            <lable class="form-label">StudentOld Name</lable>-->
<!--            <input type="text" class="form-control" placeholder="Search StudentOld Name">-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="card mt-4">-->
<!--      <div class="card-body">-->
<!--        <div class="">-->
<!--          <h1 style="font-weight: bold">Verification</h1>-->
<!--          <div class="card-header">-->

<!--            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">-->
<!--              <li class="nav-item" role="presentation">-->
<!--                <a href="#tabs-pending" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">-->
<!--                  <h3 style="font-weight: bold">Pending</h3>-->
<!--                </a>-->
<!--              </li>-->
<!--              <li class="nav-item" role="presentation">-->
<!--                <a href="#tabs-verify" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">-->
<!--                  <h3 style="font-weight: bold">Verified</h3>-->
<!--                </a>-->
<!--              </li>-->
<!--              <li class="nav-item" role="presentation">-->
<!--                <a href="#tabs-block" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">-->
<!--                  <h3 style="font-weight: bold">Blocked</h3>-->
<!--                </a>-->
<!--              </li>-->
<!--            </ul>-->
<!--          </div>-->
<!--          <div class="card-body">-->
<!--            <div class="tab-content">-->
<!--              <div class="tab-pane active" id="tabs-pending" role="tabpanel">-->
<!--                <div class="table-responsive">-->
<!--                  <table class="table table-vcenter card-table">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                      <th>StudentOld ID</th>-->
<!--                      <th>Name</th>-->
<!--                      <th>Email</th>-->
<!--                      <th>Status</th>-->
<!--                      <th>Action</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                      <td>001</td>-->
<!--                      <td>Paweł Kuna</td>-->
<!--                      <td class="text-muted"><NuxtLink to="#" class="text-reset">paweluna@howstuffworks.com</NuxtLink></td>-->
<!--                      <td class="text-muted" >-->
<!--                        <div  class="chip-pending">-->
<!--                          Pending-->
<!--                        </div>-->
<!--                      </td>-->
<!--                      <td>-->
<!--                        <div class="col-6 col-sm-4 col-md-6 col-xl py-3">-->
<!--                          <NuxtLink to="../admin/approval/student-approval" class="btn btn-outline-info active w-100">-->
<!--                            View-->
<!--                          </NuxtLink>-->
<!--                        </div>-->
<!--                      </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                      <td>002</td>-->
<!--                      <td>Jeffie Lewzey</td>-->
<!--                      <td class="text-muted"><NuxtLink to="#" class="text-reset">jlewzey1@seesaa.net</NuxtLink></td>-->
<!--                      <td class="text-muted">-->
<!--                        <div class="chip-pending">-->
<!--                          Pending-->
<!--                        </div>-->
<!--                      </td>-->
<!--                      <td>-->
<!--                        <div class="col-6 col-sm-4 col-md-6 col-xl py-3">-->
<!--                          <NuxtLink to="#" class="btn btn-outline-info active w-100">-->
<!--                            View-->
<!--                          </NuxtLink>-->
<!--                        </div>-->
<!--                      </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                      <td>003</td>-->
<!--                      <td>Mallory Hulme</td>-->
<!--                      <td class="text-muted"><NuxtLink to="#" class="text-reset">mhulme2@domainmarket.com</NuxtLink></td>-->
<!--                      <td class="text-muted">-->
<!--                        <div class="chip-pending">-->
<!--                          Pending-->
<!--                        </div>-->
<!--                      </td>-->
<!--                      <td>-->
<!--                        <div class="col-6 col-sm-4 col-md-6 col-xl py-3">-->
<!--                          <NuxtLink to="#" class="btn btn-outline-info active w-100">-->
<!--                            View-->
<!--                          </NuxtLink>-->
<!--                        </div>-->
<!--                      </td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                  </table>-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="tab-pane" id="tabs-verify" role="tabpanel">-->
<!--                <div class="table-responsive">-->
<!--                  <table class="table table-vcenter card-table">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                      <th>StudentOld ID</th>-->
<!--                      <th>Name</th>-->
<!--                      <th>Email</th>-->
<!--                      <th>Status</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                      <td>006</td>-->
<!--                      <td>Rames</td>-->
<!--                      <td class="text-muted"><NuxtLink to="#" class="text-reset">paweluna@howstuffworks.com</NuxtLink></td>-->
<!--                      <td class="text-muted" >-->
<!--                        <div  class="chip-verify">-->
<!--                          Verified-->
<!--                        </div>-->
<!--                      </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                      <td>002</td>-->
<!--                      <td>G Lewzey</td>-->
<!--                      <td class="text-muted"><NuxtLink to="#" class="text-reset">jlewzey1@seesaa.net</NuxtLink></td>-->
<!--                      <td class="text-muted">-->
<!--                        <div class="chip-verify">-->
<!--                          Verified-->
<!--                        </div>-->
<!--                      </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                      <td>007</td>-->
<!--                      <td>A Hulme</td>-->
<!--                      <td class="text-muted"><NuxtLink to="#" class="text-reset">mhulme2@domainmarket.com</NuxtLink></td>-->
<!--                      <td class="text-muted">-->
<!--                        <div class="chip-verify">-->
<!--                          Verified-->
<!--                        </div>-->
<!--                      </td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                  </table>-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="tab-pane" id="tabs-block" role="tabpanel">-->
<!--                <div class="table-responsive">-->
<!--                  <table class="table table-vcenter card-table">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                      <th>StudentOld ID</th>-->
<!--                      <th>Name</th>-->
<!--                      <th>Email</th>-->
<!--                      <th>Status</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                      <td>011</td>-->
<!--                      <td>Rsmes</td>-->
<!--                      <td class="text-muted"><NuxtLink to="#" class="text-reset">paweluna@howstuffworks.com</NuxtLink></td>-->
<!--                      <td class="text-muted" >-->
<!--                        <div  class="chip-block">-->
<!--                          Blocked-->
<!--                        </div>-->
<!--                      </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                      <td>012</td>-->
<!--                      <td>GA Lewzey</td>-->
<!--                      <td class="text-muted"><NuxtLink to="#" class="text-reset">jlewzey1@seesaa.net</NuxtLink></td>-->
<!--                      <td class="text-muted">-->
<!--                        <div class="chip-block">-->
<!--                          Blocked-->
<!--                        </div>-->
<!--                      </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                      <td>027</td>-->
<!--                      <td>Hulme</td>-->
<!--                      <td class="text-muted"><NuxtLink to="#" class="text-reset">mhulme2@domainmarket.com</NuxtLink></td>-->
<!--                      <td class="text-muted">-->
<!--                        <div class="chip-block">-->
<!--                          Blocked-->
<!--                        </div>-->
<!--                      </td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                  </table>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->

<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
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
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/approval/pending-list">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-history-toggle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M12 8v4l3 3"></path>
                     <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                     <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                     <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                     <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                     <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                     <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                     <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                     <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                  </svg>
                  </span>
                  Pending
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/approval/verified-list">
                  <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-discount-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7c.412 .41 .97 .64 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1c0 .58 .23 1.138 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1"></path>
                  <path d="M9 12l2 2l4 -4"></path>
                </svg>
                  </span>
                  Verified
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/admin/approval/blocked-list">
                  <span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M5.576 5.595a1.994 1.994 0 0 0 -.576 1.405v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2m0 -4v-8a2 2 0 0 0 -2 -2h-2"></path>
                     <path d="M9 5a2 2 0 0 1 2 -2h2a2 2 0 1 1 0 4h-2"></path>
                     <path d="M3 3l18 18"></path>
                  </svg>
                  </span>
                  Blocked
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
