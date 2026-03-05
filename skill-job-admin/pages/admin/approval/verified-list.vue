<template>
  <div class="">
    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="card">

              <div class="card-header row">
                <div class="col mb-md-0 mb-2">
                  <h3 class="card-title">Verified</h3>
                </div>
              </div>
            <div style="display: contents;">
              <div class="card-body border-bottom py-3">
                <div class="d-flex row">
                  <div class="text-muted col-sm-6 mb-3 mb-sm-0">
                    Show
                    <div class="mx-2 d-inline-block"><select class="form-control form-control-sm">
                      <option selected="selected" value="15">15</option>
                      <option selected="selected" value="50">50</option>
                      <option selected="selected" value="100">100</option>
                      <option selected="selected" value="200">200</option>
                    </select></div>
                    entries
                  </div>
                  <div class="ms-auto text-muted col-sm-6 d-flex justify-content-sm-end">
                    Search:
                    <div class="ms-2 d-inline-block"><input placeholder="Search.." type="text" autocomplete="off"
                                                            class="form-control form-control-sm"></div>
                    <div class="btn-group">
                      <button aria-expanded="false" data-bs-toggle="dropdown" href="#" type="button"
                              class="btn btn-sm btn-outline btn-icon">
                        <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                             xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download">
                          <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                          <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                          <polyline points="7 11 12 16 17 11"></polyline>
                          <line x1="12" x2="12" y1="4" y2="16"></line>
                        </svg>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="#" class="dropdown-item">Download CSV</a></li>
                        <li><a href="#" class="dropdown-item">Download XLS</a></li>
                        <li><a href="#" class="dropdown-item">Download XML</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-vcenter card-table">
                  <thead>
                  <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>006</td>
                    <td>Rames</td>
                    <td class="text-muted">
                      <NuxtLink to="#" class="text-reset">paweluna@howstuffworks.com</NuxtLink>
                    </td>
                    <td class="text-muted">
                      <div class="chip-verify">
                        Verified
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>002</td>
                    <td>G Lewzey</td>
                    <td class="text-muted">
                      <NuxtLink to="#" class="text-reset">jlewzey1@seesaa.net</NuxtLink>
                    </td>
                    <td class="text-muted">
                      <div class="chip-verify">
                        Verified
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>007</td>
                    <td>A Hulme</td>
                    <td class="text-muted">
                      <NuxtLink to="#" class="text-reset">mhulme2@domainmarket.com</NuxtLink>
                    </td>
                    <td class="text-muted">
                      <div class="chip-verify">
                        Verified
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="tabs-verify" role="tabpanel">
              <div class="d-md-none p-3">
                <div class="row"><!---->
                  <div>
                    No records available
                  </div>
                </div>
              </div>
              <div class="card-footer d-flex align-items-center row mx-2"><p
                class="m-0 text-muted col-sm-6 mb-2 mb-sm-0">Showing
                <span>1</span> to 5<span>
                  </span> of <span>5</span> entries</p>
                <ul class="pagination m-0 ms-auto col-sm-6 d-flex justify-content-sm-end">
                  <li class="page-item disabled"><a aria-disabled="true" href="#" tabindex="-1" class="page-link">
                    <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"
                         class="icon">
                      <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                      <polyline points="15 6 9 12 15 18"></polyline>
                    </svg>
                    prev
                  </a></li>
                  <li class="page-item disabled"><a href="#" class="page-link">
                    next
                    <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"
                         class="icon">
                      <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                      <polyline points="9 6 15 12 9 18"></polyline>
                    </svg>
                  </a></li>
                </ul>
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
  name: "pending-approval",
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
