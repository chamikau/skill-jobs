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
                <h3 class="card-title">Reference Details</h3>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="p-2">
                    <div class="row">
                      <div class="col-md-6">
                        <ul style="list-style-type:none;padding-left:0rem">
                          <li>Mr.Ajith Kumar</li>
                          <li>Director of ABC Company</li>
                          <li>9411 356 4789</li>
                        </ul>
                      </div>
                    </div>
<!--                    <hr style="margin: 1rem">-->
                    <div class="row">
                      <div class="col-md-6">
                        <ul style="list-style-type:none;padding-left:0rem">
                          <li>Mr.Ram Balha</li>
                          <li>Officer of Army</li>
                          <li>9433 456 4559</li>
                        </ul>
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
  name: "references",
  layout: 'dashboard-admin',
}
</script>

<style scoped>

</style>
