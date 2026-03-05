<template>
  <div class="page">
    <div class="container-xl">
      <div class="row">
        <div class="col-md-12">
<!--          <div class="row g-2 align-items-center">-->
<!--            <div class="col">-->
<!--            <h2 class="page-title">-->
<!--              Verification-->
<!--            </h2>-->
<!--            </div>-->
<!--          </div>-->
          <div class="card">
            <div class="card-header row">
              <div class="col mb-md-0 mb-2">
                <h3 class="card-title">Educational Details</h3>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="p-2">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="">
                          <label class="form-label">Course </label>
                          <input type="text" class="form-control" value="HND in Software Engineering" disabled>
                        </div>
                        <div class="">
                          <label class="form-label">Institute </label>
                          <input type="text" class="form-control" value="NIBM - 2019" disabled>
                        </div>
                        <div class="">
                          <label class="form-label">Contact </label>
                          <input type="text" class="form-control" value="9411 356 4789" disabled>
                        </div>
                        <div>
                          <button class="btn btn-outline-primary mt-3">
                            Download Document
                          </button>
                        </div>
                      </div>
                      <div class="col-md-6 mt-auto">
                        <input type="checkbox" class="form-check-input m-1" aria-label="Select task"
                               checked="">
                        verified
                        <textarea type="text" class="form-control mt-3" placeholder="Comment"></textarea>
                        <div class="col-6 col-sm-4 col-md-2 d-flex align-items-end mt-2">
                          <a href="#" class="btn btn-outline-primary">
                            Submit
                          </a>
                        </div>
                      </div>
                    </div>
                    <hr style="margin: 1rem">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="">
                          <label class="form-label">Course </label>
                          <input type="text" class="form-control" value="Diploma in ICT" disabled>
                        </div>
                        <div class="">
                          <label class="form-label">Institute </label>
                          <input type="text" class="form-control" value="University of Colombo - 2018" disabled>
                        </div>
                        <div class="">
                          <label class="form-label">Contact </label>
                          <input type="text" class="form-control" value="9464 106 4789" disabled>
                        </div>
                        <div>
                          <button class="btn btn-outline-primary mt-3">
                            Download Document
                          </button>
                        </div>
                      </div>
                      <div class="col-md-6 mt-auto">
                        <input type="checkbox" class="form-check-input m-1" aria-label="Select task"
                               checked="">
                        verified
                        <textarea type="text" class="form-control mt-3" placeholder="Comment"></textarea>
                        <div class="col-6 col-sm-4 col-md-2 d-flex align-items-end mt-2">
                          <a href="#" class="btn btn-outline-primary">
                            Submit
                          </a>
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
  name: "educations",
  layout: 'dashboard-admin',
}
</script>

<style scoped>

</style>
