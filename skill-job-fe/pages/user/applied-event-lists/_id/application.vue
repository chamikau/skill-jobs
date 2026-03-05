<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a href="#" @click="$router.back()">Events</a></li>
          <li><a href="#" @click="$router.back()">Applied Events</a></li>
          <li><a>Applied Events</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">Event Details</span>
              <span class="ms-2 mx-2 bold"  style="font-size: 2rem;"> - </span>
              <span class="fw-bold fs-1">{{ event.event_organizer }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
       <div class="">
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="col-md-2">
                      <span class="avatar badge bg-x text-white">
                        {{ event.name.slice(0,3) }}
                      </span>
                    </span>
                  </div>
                  <div class="col-md-9">
                    <div class="font-weight-medium text-truncate">
                      <span>
                        {{ event.name }}
                      </span>
                    </div>
                    <div class="text-style-course-name">
                      Hosted By
                      <span class="text-muted">
                        {{ event.event_organizer }}
                      </span>
                    </div>
                    <div class="font-weight-medium text-secondary">
                      <span>
                        Closing Date : <span class="fs-3 bold"> {{ event.date }} </span>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-2 ms-4 mb-4  ms-md-auto">
                    <div class="d-flex flex-row-reverse">
                      <button v-if="user_id_and_applicant_list_match === false" class="btn btn-primary"  @click="registerForEvent()">Register</button>
                      <button v-else class="btn btn-secondary"  @click="cancelPopUp()">Cancel Register</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                    <div v-html="event.description">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div v-if="cancelEventData" class="modal modal-blur fade-in show" id="modal-danger" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
            <button @click.stop="returnToPage()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
              <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z"></path><path d="M12 9v4"></path><path d="M12 17h.01"></path></svg>
              <h3>Are you sure?</h3>
              <div class="text-muted">Once you click 'Yes', your enrollment will be cancelled.</div>
            </div>
            <div class="modal-footer">
              <div class="w-100">
                <div class="row">
                  <div class="col">
                    <a @click.stop="returnToPage()" class="btn w-100" data-bs-dismiss="modal">
                      No
                    </a>
                  </div>
                  <div class="col">
                    <a @click.stop="cancelEnrolledCourse" class="btn btn-danger w-100" data-bs-dismiss="modal">
                      Yes
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
</template>

<script>
export default {
  name: "application",
  layout: 'dashboard-user',
  data(){
    return{
      cancelEventData:false,
      user_id_and_applicant_list_match:'',
      courses:{
        instructor_name:""
      },
      event:{
        name:''
      },
      create_event_form:{
        fields:{}
      }
    }

  },
  mounted() {
    this.getEvents()
  },
  methods:{
    async registerForEvent() {
      this.create_event_form.fields.event_id = `${this.$route.params.id}`
      try {
        let event = await this.$axios.$post(`api/student/student-applied-events/`, this.create_event_form.fields)
        this.$toast.success('Successfully register')
        await this.$router.back();
      } catch (e) {
      }
    },
    async cancelEnrolledCourse() {
      this.create_event_form.fields.event_id = `${this.$route.params.id}`
      this.id = this.create_event_form.fields.event_id
      try {
        let event = await this.$axios.$put(`api/student/cancel-enrolled-events/${this.id}`, this.create_event_form.fields)
        this.$errorToast('Canceled')
        this.cancelEventData = false;
        await this.$router.back();
      } catch (e) {
      }
    },
    async getEvents() {
      try {
        this.data = (await this.$axios.$get(`/api/student/events/${this.$route.params.id}`)).data;
        this.event = this.data.event
        this.user_id_and_applicant_list_match = this.data.user_id_and_applicant_list_match;
      } catch (error) {
        return error;
      }
    },
    returnToPage(){
      this.cancelEventData = false;
    },
    cancelPopUp(){
      this.cancelEventData = true;
    },
  }
}
</script>

<style scoped>
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
.breadcrumb {
  list-style: none;
  padding: 0;
  margin: 0;
}

.breadcrumb li {
  display: inline;
  color: #888;
}

.breadcrumb li:not(:last-child)::after {
  content: ">";
  margin-left: 0.7rem;
  margin-right: 0.7rem;
  color: #888;
}

.breadcrumb li:last-child {
  color: #888;
}
</style>
