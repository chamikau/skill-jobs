<template>
  <div class="page">
    <div class="container-xl">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header row">
              <div class="col mb-md-0 mb-2"><h3 class="card-title">Educational Details</h3></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="p-1">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="">
                          <label class="form-label">Event </label>
                          <input type="text" class="form-control" value="SLT eSports" disabled>
                        </div>
                        <div class="">
                          <label class="form-label mt-3">Description </label>
                          <textarea class="form-control" disabled>Champion of SLT eSports Regional Challenge on 2020</textarea>
                        </div>
                        <div>
                          <button class="btn btn-outline-primary mt-3">
                            Download Document
                          </button>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <input type="checkbox" class="form-check-input m-1 align-middle" aria-label="Select task"
                               checked="">
                        verified
                        <textarea type="text" class="form-control mr-2" placeholder="Comment"></textarea>
                      </div>
                    </div>
                    <hr style="margin: 1rem">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="">
                          <label class="form-label">Event </label>
                          <input type="text" class="form-control" value="Ideamart super Entrepreneur" disabled>
                        </div>
                        <div class="">
                          <label class="form-label mt-3">Description </label>
                          <textarea class="form-control" disabled>Super entrepreneur on 2020 in ideamart team</textarea>
                        </div>
                        <div>
                          <button class="btn btn-outline-primary mt-3">
                            Download Document
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
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
  name: "achievements",
  layout: 'dashboard-admin',
}
</script>

<style scoped>

</style>
