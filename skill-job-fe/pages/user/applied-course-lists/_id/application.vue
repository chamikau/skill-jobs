<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a href="#" @click="$router.back()">Courses</a></li>
          <li><a href="#" @click="$router.back()">Applied Courses</a></li>
          <li><a>Course Details</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col-md-10">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">Course Details</span>
              <span class="ms-2 mx-2 bold"  style="font-size: 2rem;"> - </span>
              <span class="fw-bold fs-1">{{ course.name }}</span>
            </div>
          </div>
          <div class="col-md-2 d-flex flex-row-reverse">
            <button v-if="user_id_and_applicant_list_match === false" class="btn btn-primary"  @click="enrolForCourse()">Enroll Now</button>
            <button v-else class="btn btn-secondary"  @click="cancelPopUp()">Cancel Enrolment</button>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <div v-html="course.description">
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <h3 class="">Course Content</h3>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <div v-for="content in contents" class="accordion" role="tablist">
                        <div class="accordion-item">
                          <div class="accordion-header" role="tab">
                        <span class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#content.content_name" aria-expanded="false">
<!--                          <span class="row">-->
                            <span class="col-md-7">
                              {{content.content_name}}
                            </span>
                            <span class="col-md-2">
                              {{content.number_of_lectures + " lectures " }}
                            </span>
                            <span class="col-md-2">
                              {{content.lecture_hours + "min" }}
                            </span>
                          <!--                          </span> -->
                        </span>
                          </div>
                          <div id="content.content_name" class="accordion-collapse collapse" role="tabpanel" style="">
                            <div class="accordion-body pt-0">
                              <div>
                                <p>{{content.content_description}}</p>
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
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="row justify-content-center">
                    <span class="d-flex align-items-center">
                    <span class="avatar badge bg-x text-white">{{course.instructor_name.slice(0,3)}}</span>
                    <span class="fs-4 fw-bold mx-2">{{ course.instructor_name }}</span>
                    </span>
                    <p class="mt-2 fs-4">{{ course.instructor_description}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div v-if="cancelCourseData" class="modal modal-blur fade-in show" id="modal-danger" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
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
      cancelCourseData:false,
      user_id_and_applicant_list_match:'',
        course:{
          instructor_name:""
      },
      contents:{},
      create_course_form:{
        fields:{}
      }
    }

  },
  mounted() {
    this.getCourses()
  },
  methods:{
    async enrolForCourse() {
      this.create_course_form.fields.course_id = `${this.$route.params.id}`
      try {
        let course = await this.$axios.$post(`api/student/student-applied-courses`, this.create_course_form.fields)
        this.$toast.success('Successfully enrolled')
        await this.$router.back();
      } catch (e) {
      }
    },
    async cancelEnrolledCourse() {
      this.create_course_form.fields.course_id = `${this.$route.params.id}`
      this.id = this.create_course_form.fields.course_id
      try {
        let course = await this.$axios.$put(`api/student/cancel-enrolled-course/${this.id}`, this.create_course_form.fields)
        this.$errorToast('Canceled')
        this.cancelCourseData = false;
        await this.$router.back();
      } catch (e) {
      }
    },

    async getCourses() {
      try {
        this.data = (await this.$axios.$get(`/api/student/courses/${this.$route.params.id}`)).data;
        this.course = this.data.course;
        this.contents = this.course.contents;
        this.user_id_and_applicant_list_match = this.data.user_id_and_applicant_list_match;
        this.student_course_applied = this.courses.student_course_applied;
      } catch (error) {
        return error;
      }
    },
    returnToPage(){
      this.cancelCourseData = false;
    },
    cancelPopUp(){
      this.cancelCourseData = true;
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
