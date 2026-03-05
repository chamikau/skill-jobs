<template>
  <div id="tab-1" class="card tab-pane active show">
    <div class="contents">
      <div class="row">
        <div class="col mt-3 ms-3">
          <h3 class="card-title">
            Educational Details
          </h3>
        </div>
        <div class="col-md-auto mt-3 mx-3 ms-auto d-print-none">
          <div class="btn-list">
            <NuxtLink class="btn btn-primary" to="/user/profile/educations/create">
              <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                   stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                   xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                <line x1="12" x2="12" y1="5" y2="19"/>
                <line x1="5" x2="19" y1="12" y2="12"/>
              </svg>
              Add
            </NuxtLink>
          </div>
        </div>
      </div>
      <div class="page-body">
        <div class="container-xl">
          <p v-if="educations.length === 0" class="title fs-3 text-center">No records available</p>
          <div class="row">
            <div v-for="education in educations" class="col-sm-5 col-lg-5 mb-3">
              <div class="card card-sm cursor-pointer">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-md-2">
                    <span class="col-md-2">
                      <span class="avatar badge bg-x text-white">
                        {{ education.field_of_study_types.name.slice(0,3) }}
                      </span>
                    </span>
                    </div>
                    <div class="col-md-7">
                      <div class="font-weight-medium text-truncate">
                      <span v-if="education.field_of_study_types.name.length > 40">
                        {{ education.field_of_study_types.name.slice(0,40) }}...
                      </span>
                        <span v-else>
                        {{education.field_of_study_types.name}}
                      </span>
                      </div>
                      <div class="text-style-course-name">
                        {{ education.course_name }}
                      </div>
                      <div class="text-muted" v-if="education.start_year != null">
                        {{"from " + education.start_year + " to " +  education.end_year}}
                      </div>
                    </div>
                    <div class="col-md-3">
                    <span class="mb-5" style="display: flex; justify-content: flex-end;">
                      <span>
                       <a class="btn btn-sm btn-icon" @click.stop="goToEditEducations(education.id)" aria-label="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                             class="bi bi-pencil-square text-black" viewBox="0 0 16 16"
                             stroke-width="2">
                          <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                         </svg>
                       </a>
                      </span>
                      <span>
                       <a class="btn btn-sm btn-icon ms-1" @click.stop="deletePopUp()">
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash2"
                              width="24" height="24" viewBox="3 3 18 19" stroke-width="2"
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <line x1="4" y1="7" x2="20" y2="7" />
                          <line x1="10" y1="11" x2="10" y2="17" />
                          <line x1="14" y1="11" x2="14" y2="17" />
                          <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                          <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                         </svg>
                       </a>
                      </span>
                    </span>
                    </div>
                  </div>
                </div>
              </div>
              <div v-if="deleteEducationData" class="modal modal-blur fade-in show" id="modal-danger" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <button @click.stop="returnToPage()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger">
                    </div>
                    <div class="modal-body text-center py-4">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z"></path><path d="M12 9v4"></path><path d="M12 17h.01"></path></svg>
                      <h3>Are you sure?</h3>
                      <div class="text-muted">
                        This action will permanently remove your data and cannot be undone.
                      </div>
                    </div>
                    <div class="modal-footer">
                      <div class="w-100">
                        <div class="row">
                          <div class="col">
                            <a @click.stop="returnToPage()" class="btn w-100" data-bs-dismiss="modal">
                            Cancel
                          </a>
                          </div>
                          <div class="col">
                            <a @click.stop="deleteData(education.id)" class="btn btn-danger w-100" data-bs-dismiss="modal">
                            Delete
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
  </div>
</template>

<script>
export default {
  data() {
    return {
      deleteEducationData:false,
      refresh:"",
      educations:[{
        field_of_study_types:{
          name:""
        }
      }],
    }
  },
  mounted() {
    this.getEducationDetails()
  },
  methods: {
    async goToEditEducations(id) {
      await this.$router.push(`/user/profile/educations/${id}/general`)
    },
    async getEducationDetails() {
      try {
        this.students = (await this.$axios.$get(`/api/student/users/${this.$auth.user.id}`,
          {
            params: {
              per_page: 200,
            }
          }
        )).data;
        this.educations = this.students.educations
      } catch (error) {
        return error;
      }
    },
    deletePopUp(){
      this.deleteEducationData = true;
    },
    deleteData(id){
      try {
        this.$axios.$delete(`/api/student/educations-records/${id}`);
        this.educations = this.educations.filter(education => education.id !== id);
        this.$errorToast('Successfully deleted')
        this.deleteEducationData = false;
      } catch (error) {
        return error;
      }
    },
    returnToPage(){
      this.deleteEducationData = false;
    },
  }
}
</script>

<style scoped>
.text-style-course-name{
  font-weight: bold;
  color: #4a4f59;
}

.modal-content {
  background-color: #fff; /* Change the color of the modal content */
}
.icon-tabler-trash2{
  color: red;
}
.fade-in {
  animation: fade-in 0.5s;
  overflow: hidden;
  backdrop-filter: blur(2px);
  background-color: rgba(0, 0, 0, 0.5);
}
@keyframes fade-in {
  from { opacity: 0; }
  to { opacity: 1; }
}
</style>
