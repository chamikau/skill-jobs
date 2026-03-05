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
              <div class="col mb-md-0 mb-2"><h3 class="card-title">Personal Details</h3></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class=" p-1" >
                    <div class="row">
                      <div class="col-md-6">
                        <div class="">
                          <label class="form-label">Full Name </label>
                          <input type="text" class="form-control" value="Paweł Ram" disabled>
                        </div>
                        <div class="">
                          <label class="form-label mt-3">Address </label>
                          <textarea class="form-control" disabled>No.50,Kurunegala Road,Kandy</textarea>
                        </div>
                        <div class="">
                          <label class="form-label mt-3">Tele </label>
                          <input type="text" class="form-control" value="+94123456789" disabled>
                        </div>
                        <div class="">
                          <label class="form-label mt-3">mail </label>
                          <input type="text" class="form-control" value="paweluna@howstuffworks.com" disabled>
                        </div>
                        <div class="">
                          <label class="form-label mt-3">Website </label>
                          <input type="text" class="form-control" value="ram@ul.uk" disabled>
                        </div>
                      </div>
                      <div class="col-md-6 mt-auto">
                        <input type="checkbox" v-model="check" class="form-check-input m-1" aria-label="Select task"
                               checked="" data-bs-toggle="modal" data-bs-target="#document-verify">
                        verified
                        <textarea type="text" class="form-control mt-3" placeholder="Comment"></textarea>{{check}}
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
    <!--    start verify popup form-->
    <div class="modal modal-blur fade w-10" id="document-verify" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Document Approval</h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-4">
                <div class="mt-3">
                  <label class="form-label">Document approve</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button @click="documentDisapproved()" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button @click="documentApproved()" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
          </div>
        </div>
      </div>
    </div>
    <!--    end verify popup form-->
  </div>

</template>

<script>
export default {
  name: "personal",
  layout: 'dashboard-admin',
  data() {
    return {
      check:true
    }
  },
  methods:{
    documentApproved(){
        this.check = true
    },
    documentDisapproved(){
      this.check = false
    }
  },
}
</script>

<style scoped>

</style>
