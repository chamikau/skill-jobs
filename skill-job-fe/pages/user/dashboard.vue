<template>
<div>
  <div class="m-4">
    <div class="col-12">
      <div class="row row-cards">
<!--        <div class="col-sm-6 col-lg-3">-->
<!--          <div class="card card-sm">-->
<!--            <div class="card-body">-->
<!--              <div class="row align-items-center">-->
<!--                <div class="col-auto">-->
<!--                  <span class="bg-blue text-white avatar">&lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/home &ndash;&gt;-->
<!--                    <svg class="icon icon-tabler icon-tabler-calendar-event" fill="none"-->
<!--                         height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"-->
<!--                         stroke-width="2" viewBox="0 0 24 24"-->
<!--                         width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                       <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>-->
<!--                       <rect height="16" rx="2" width="16" x="4" y="5"></rect>-->
<!--                       <line x1="16" x2="16" y1="3" y2="7"></line>-->
<!--                       <line x1="8" x2="8" y1="3" y2="7"></line>-->
<!--                       <line x1="4" x2="20" y1="11" y2="11"></line>-->
<!--                       <rect height="2" width="2" x="8" y="15"></rect>-->
<!--                    </svg>-->
<!--                   </span>-->
<!--                </div>-->
<!--                <div class="col">-->
<!--                  <div class="font-weight-medium">-->
<!--                     Active Bookings-->
<!--                  </div>-->
<!--                  <div class="fw-bold fs-3">-->
<!--                    12-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="col-sm-6 col-lg-3">-->
<!--          <div class="card card-sm">-->
<!--            <div class="card-body">-->
<!--              <div class="row align-items-center">-->
<!--                <div class="col-auto">-->
<!--                  <span class="bg-green text-white avatar">-->
<!--                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-off mx-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">-->
<!--                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>-->
<!--                       <path d="M19.823 19.824a2 2 0 0 1 -1.823 1.176h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 1.175 -1.823m3.825 -.177h9a2 2 0 0 1 2 2v9"></path>-->
<!--                       <line x1="16" y1="3" x2="16" y2="7"></line>-->
<!--                       <line x1="8" y1="3" x2="8" y2="4"></line>-->
<!--                       <path d="M4 11h7m4 0h5"></path>-->
<!--                       <line x1="11" y1="15" x2="12" y2="15"></line>-->
<!--                       <line x1="12" y1="15" x2="12" y2="18"></line>-->
<!--                       <line x1="3" y1="3" x2="21" y2="21"></line>-->
<!--                    </svg>-->
<!--                  </span>-->
<!--                </div>-->
<!--                <div class="col">-->
<!--                  <div class="font-weight-medium">-->
<!--                    Cancelled Bookings-->
<!--                  </div>-->
<!--                  <div class="fw-bold fs-3">-->
<!--                    2-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="col-sm-6 col-lg-3">-->
<!--          <div class="card card-sm">-->
<!--            <div class="card-body">-->
<!--              <div class="row align-items-center">-->
<!--                <div class="col-auto">-->
<!--                  <span class="bg-twitter text-white avatar">-->
<!--                    <svg class="icon icon-tabler icon-tabler-user" fill="none" height="24"-->
<!--                                   stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                                   viewBox="0 0 24 24"-->
<!--                                   width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                     <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>-->
<!--                     <circle cx="12" cy="7" r="4"></circle>-->
<!--                     <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>-->
<!--                    </svg>-->
<!--                  </span>-->
<!--                </div>-->
<!--                <div class="col">-->
<!--                  <div class="font-weight-medium">-->
<!--                    Users-->
<!--                  </div>-->
<!--                  <div class="fw-bold fs-3">-->
<!--                    16-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="col-sm-6 col-lg-3">-->
<!--          <div class="card card-sm">-->
<!--            <div class="card-body">-->
<!--              <div class="row align-items-center">-->
<!--                <div class="col-auto">-->
<!--                  <span class="bg-facebook text-white avatar">-->
<!--                    <svg class="icon icon-tabler icon-tabler-users" fill="none" height="24"-->
<!--                         stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                         viewBox="0 0 24 24"-->
<!--                         width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                       <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>-->
<!--                       <circle cx="9" cy="7" r="4"></circle>-->
<!--                       <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>-->
<!--                       <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>-->
<!--                       <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>-->
<!--                    </svg>-->
<!--                  </span>-->
<!--                </div>-->
<!--                <div class="col">-->
<!--                  <div class="font-weight-medium">-->
<!--                    Patients-->
<!--                  </div>-->
<!--                  <div class="fw-bold fs-3">-->
<!--                    12-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->

        <div class="row">
          <div class="col-md-4">
            <div class="pt-3">
              <div class="card">
                <div class="card-header-style">
                  <div class="">
                    <div class="row">
                      <div class="col-md-8">
                        <h3 class="">Profile Completion</h3>
                      </div>
                      <div class="col-md-4" style="text-align: end;font-weight: bold;font-size: 18px; ">
                        {{student.total_progress}} %
                      </div>
                    </div>
                    <div>
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-color-style" :style="{width:(student.total_progress)+'%'}" ></div>
                      </div>
                    </div>
<!--                      <div class="mt-3 text-end">-->
<!--                        <NuxtLink class="btn btn-primary" to="/user/profile/general">Go To Profile</NuxtLink>-->
<!--                      </div>-->
                  </div>
                </div>
                <div class="list-group list-group-flush" data-bs-toggle="tabs">
                  <NuxtLink v-if="student.facebook_link != null && student.github_link != null && student.instagram_link != null && student.linkedin_link != null " class="nuxt-link-style list-group-item list-group-item-action" to="/#">
                  <span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                         <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                         <path d="M9 12l2 2l4 -4"></path>
                      </svg>
                  </span>
                    Basic Details
                  </NuxtLink>
                  <NuxtLink v-if="student.facebook_link == null || student.github_link == null || student.instagram_link == null || student.linkedin_link == null" class="nuxt-link-style list-group-item list-group-item-action" to="/user/profile/general">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                      <path d="M12 8v4"></path>
                      <path d="M12 16h.01"></path>
                    </svg>
                  </span>
                    Basic Details
                  </NuxtLink>
                  <NuxtLink v-if="student.educations != 0" class="nuxt-link-style list-group-item list-group-item-action" to="/#">
                  <span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                         <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                         <path d="M9 12l2 2l4 -4"></path>
                      </svg>
                  </span>
                    Educational Details
                  </NuxtLink>
                  <NuxtLink v-if="student.educations == 0" class="nuxt-link-style list-group-item list-group-item-action" to="/user/profile/educations">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                      <path d="M12 8v4"></path>
                      <path d="M12 16h.01"></path>
                    </svg>
                  </span>
                  Educational Details
                </NuxtLink>
                  <NuxtLink v-if="student.projects.length != 0" class="nuxt-link-style list-group-item list-group-item-action" to="/#">
                  <span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                         <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                         <path d="M9 12l2 2l4 -4"></path>
                      </svg>
                  </span>
                    Projects
                  </NuxtLink>
                  <NuxtLink v-if="student.projects.length == 0" class="nuxt-link-style list-group-item list-group-item-action" to="/user/profile/projects">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                      <path d="M12 8v4"></path>
                      <path d="M12 16h.01"></path>
                    </svg>
                  </span>
                    Projects
                  </NuxtLink>
                  <NuxtLink v-if="student.certifications.length != 0" class="nuxt-link-style list-group-item list-group-item-action" to="/#">
                  <span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                         <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                         <path d="M9 12l2 2l4 -4"></path>
                      </svg>
                  </span>
                    Certifications
                  </NuxtLink>
                  <NuxtLink v-if="student.certifications.length == 0" class="nuxt-link-style list-group-item list-group-item-action" to="/user/profile/certification">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                      <path d="M12 8v4"></path>
                      <path d="M12 16h.01"></path>
                    </svg>
                  </span>
                    Certifications
                  </NuxtLink>
                  <NuxtLink v-if="student.skills != 0" class="nuxt-link-style list-group-item list-group-item-action" to="/#">
                  <span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                         <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                         <path d="M9 12l2 2l4 -4"></path>
                      </svg>
                  </span>
                    Skill & Hobbies
                  </NuxtLink>
                  <NuxtLink v-if="student.skills == 0" class="nuxt-link-style list-group-item list-group-item-action" to="/user/profile/skills-and-hobbies">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                      <path d="M12 8v4"></path>
                      <path d="M12 16h.01"></path>
                    </svg>
                  </span>
                    Skill & Hobbies
                  </NuxtLink>
                  </div>
<!--                <div class="card-body">-->
<!--                  <div class="display-flex">-->
<!--                    <div class="row">-->
<!--                      <div class="col-md-8">-->
<!--                        <h3 class="">Profile Completion</h3>-->
<!--                      </div>-->
<!--                      <div class="col-md-4" style="text-align: end;font-weight: bold;font-size: 18px">-->
<!--                        {{student.total_progress}} %-->
<!--                      </div>-->
<!--                    </div>-->
<!--                    <div>-->
<!--                      <div class="progress progress-xs">-->
<!--                        <div class="progress-bar bg-primary" :style="{width:(student.total_progress)+'%'}" ></div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                    <div class="mt-3 text-end">-->
<!--                      <NuxtLink class="btn btn-primary" to="/user/profile/general">Go To Profile</NuxtLink>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
              </div>
            </div>
<!--            <div class="pt-3">-->
<!--              <div class="card">-->
<!--                <div class="card-header-style">-->
<!--                  <div class="">-->
<!--                    <div class="row">-->
<!--                      <div class="col-md-8">-->
<!--                        <h3 class="">Courses</h3>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->

<!--                <div class="list-group list-group-flush" data-bs-toggle="tabs">-->
<!--                    <div-->
<!--                      :key="indextr"-->
<!--                      v-for="indextr in course_list">-->
<!--                      <NuxtLink  class="nuxt-link-style list-group-item list-group-item-action" :to="`/user/courses/${indextr.id}/application`">-->
<!--                        {{indextr.name}}-->
<!--                      </NuxtLink>-->
<!--                    </div>-->
<!--                </div>-->

<!--                &lt;!&ndash;                <div class="card-body">&ndash;&gt;-->
<!--                &lt;!&ndash;                  <div class="display-flex">&ndash;&gt;-->
<!--                &lt;!&ndash;                    <div class="row">&ndash;&gt;-->
<!--                &lt;!&ndash;                      <div class="col-md-8">&ndash;&gt;-->
<!--                &lt;!&ndash;                        <h3 class="">Profile Completion</h3>&ndash;&gt;-->
<!--                &lt;!&ndash;                      </div>&ndash;&gt;-->
<!--                &lt;!&ndash;                      <div class="col-md-4" style="text-align: end;font-weight: bold;font-size: 18px">&ndash;&gt;-->
<!--                &lt;!&ndash;                        {{student.total_progress}} %&ndash;&gt;-->
<!--                &lt;!&ndash;                      </div>&ndash;&gt;-->
<!--                &lt;!&ndash;                    </div>&ndash;&gt;-->
<!--                &lt;!&ndash;                    <div>&ndash;&gt;-->
<!--                &lt;!&ndash;                      <div class="progress progress-xs">&ndash;&gt;-->
<!--                &lt;!&ndash;                        <div class="progress-bar bg-primary" :style="{width:(student.total_progress)+'%'}" ></div>&ndash;&gt;-->
<!--                &lt;!&ndash;                      </div>&ndash;&gt;-->
<!--                &lt;!&ndash;                    </div>&ndash;&gt;-->
<!--                &lt;!&ndash;                    <div class="mt-3 text-end">&ndash;&gt;-->
<!--                &lt;!&ndash;                      <NuxtLink class="btn btn-primary" to="/user/profile/general">Go To Profile</NuxtLink>&ndash;&gt;-->
<!--                &lt;!&ndash;                    </div>&ndash;&gt;-->
<!--                &lt;!&ndash;                  </div>&ndash;&gt;-->
<!--                &lt;!&ndash;                </div>&ndash;&gt;-->
<!--              </div>-->
<!--            </div>-->
          </div>
<!--          <div class="col-md-8">-->
<!--            <div class="pt-3">-->
<!--              <div class="card">-->
<!--                <div class="card-header">-->
<!--                  <h1>-->
<!--                    Recommendation-->
<!--                  </h1>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                  <div class="col-md-12">-->
<!--                    <div class="card-body">-->
<!--                      <div class="card hover-card-style">-->
<!--                        <div class="card-body">-->
<!--                          <h3>-->
<!--                            Software Engineering Job Vacancies Available-->
<!--                          </h3>-->
<!--                          <div class="mt-3 text-end">-->
<!--                            <NuxtLink class="btn btn-success" to="/user/jobs/">Apply Now</NuxtLink>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="card mt-3 hover-card-style">-->
<!--                        <div class="card-body">-->
<!--                          <h3>-->
<!--                            PHP Course: Fundamentals | Pluralsight-->
<!--                          </h3>-->
<!--                          <div class="mt-3 text-end">-->
<!--                            <NuxtLink class="btn btn-primary" to="/user/courses/">Enroll Now</NuxtLink>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="card mt-3 hover-card-style">-->
<!--                        <div class="card-body">-->
<!--                          <h3>-->
<!--                            Udemy - Courses on Demand - Best-Selling Online Courses-->
<!--                          </h3>-->
<!--                          <div class="mt-3 text-end">-->
<!--                            <NuxtLink class="btn btn-primary" to="/user/courses/">Enroll Now</NuxtLink>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="card mt-3 hover-card-style">-->
<!--                        <div class="card-body">-->
<!--                          <h3>-->
<!--                            UI/UX Job Vacancies Available-->
<!--                          </h3>-->
<!--                          <div class="mt-3 text-end">-->
<!--                            <NuxtLink class="btn btn-success" to="/user/jobs/">Apply Now</NuxtLink>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->

<!--                  </div>-->
<!--                </div>-->

<!--                </div>-->
<!--              </div>-->
<!--          </div>-->
        </div>
      </div>
    </div>
      </div>


</div>
</template>

<script>
export default {
  name: "dashboard",
  layout: 'dashboard-user',
  data() {
    return {
      total_progress:null,
      student:{
        hobbies_progress:0,
        projects:[],
        certifications:[],
        skills:[],
      },
      course_list:[]
    };
  },
  mounted() {
    this.getAllStudentProgress()
    this.getCourses()
  },
  watch:{
  },
  methods: {
    async getAllStudentProgress() {
      try {
        this.student = await (this.$axios.$get('/api/student/get-all-student-progress'));
      }catch (error) {
        return error;
      }
    },
    async getCourses() {
      try {
        this.course = await (this.$axios.$get('/api/student/courses'));
        this.course_list = this.course.data
      }catch (error) {
        return error;
      }
    },
  }

}
</script>

<style scoped>
.card-header-style{
  color: inherit;
  align-items: center;
  background: 0 0;
  padding: var(--tblr-card-cap-padding-y) var(--tblr-card-cap-padding-x);
  margin-bottom: 0;
  color: var(--tblr-card-cap-color);
  background-color: var(--tblr-card-cap-bg);
  border-bottom: var(--tblr-card-border-width) solid var(--tblr-card-border-color);
}
.nuxt-link-style{
  flex: 1 1 auto;
  padding: var(--tblr-card-spacer-y) var(--tblr-card-spacer-x);
  color: var(--tblr-card-color);
}
.hover-card-style:hover{
  color: var(--brand_color) !important;
  box-shadow: 0 10px 40px 2px #0a66c2;
  transition:0.8s;
}
.bg-color-style{
  background-color: #423680;
}
.icon-tabler-alert-circle{
  color: #423680;
}
</style>
