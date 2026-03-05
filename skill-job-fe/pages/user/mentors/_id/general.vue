<template>
  <div class="page">
    <div class="">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-auto">
             <span class="col-md-2">
               <span class="avatar badge bg-x text-white">
                {{ mentor.name.slice(0,3) }}
              </span>
             </span>
            </div>
            <div class="col-md-8">
              <div class="fw-bold text-truncate">
                <span v-if="mentor.name > 40">
                    {{ mentor.name.slice(0, 40) }}...
                </span>
                <span v-else>
                    {{ mentor.name }}
                 </span>
              </div>
              <div>
                 <span v-if="mentor.position > 40" class="fs-5">
                    {{ mentor.position.slice(0, 40) }}
                </span>
                <span v-else class="fs-5">
                   {{ mentor.position }}
                </span>
              </div>
            </div>
<!--            <div class="col-md-2 text-end">-->
<!--              <button class="mt-2 btn btn-secondary">Book</button>-->
<!--            </div>-->
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <span class="fs-5">
              {{mentor.about_mentor}}
              </span>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h3>Work Experience</h3>
                  <div class="row">
                    <div v-for="mentor_experience in mentor_experiences">
                      <div class="row mb-3">
                        <div class="col-md-1">
                       <span class="avatar badge bg-x text-white mt-2">
                        {{ mentor_experience.work_experience_job_type.name.slice(0,3) }}
                      </span>
                        </div>
                        <div class="col-md-11">
                          <div>
                            <span class="fw-bold">
                              {{ mentor_experience.work_experience_job_type.name }}
                            </span>
                          </div>
                          <div>
                            <span>
                              {{mentor_experience.name}}
                            </span>
                          </div>
                          <div>
                            <span>
                              {{mentor_experience.start_date + " to " + mentor_experience.end_date}}
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h3>Education</h3>
                  <div class="row">
                    <p v-if="mentor_educations.length === 0" class="title fs-3 text-center">No records available</p>
                    <div v-for="mentor_education in mentor_educations">
                      <div class="row mb-3">
                        <div class="col-md-1">
                       <span class="avatar badge bg-x text-white mt-2">
                        {{ mentor_education.field_of_study_types.name.slice(0,3) }}
                      </span>
                        </div>
                        <div class="col-md-11">
                          <div>
                      <span class="fw-bold">
                        {{ mentor_education.field_of_study_types.name }}
                      </span>
                          </div>
                          <div>
                      <span>
                        {{mentor_education.course_name}}
                      </span>
                          </div>
                          <div>
                      <span>
                        {{mentor_education.start_year + " - " + mentor_education.end_year}}
                      </span>
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
      <div class="mt-3">
        <div class="card">
          <div class="card-body">
            <div class="row">
             <span class="col-md-2">
               <h3>Sessions</h3>
             </span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div v-for="mentor_session in mentor_sessions">
                <div class="card mt-3">
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-10">
                            <div>
                            <span class="fw-bold">
                              {{ mentor_session.session_types.name }}
                            </span>
                            </div>
                            <div>
                            <span>
                              {{mentor_session.description}}
                            </span>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div>
                              <button class="btn btn-secondary">Book Now</button>
                            </div>
                          </div>
                      </div>
                    <div class="row mt-2">
                      <div class="col-md-10">
                        <span class="fs-3">
                          {{mentor_session.available_time}}
                        </span>
                      </div>
                      <div class="col-md-2">
                       <span class="fs-2 text-end fw-bold">
                         {{mentor_session.fees + "LKR/hr"}}
                       </span>
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
  name: "general",
  layout: 'dashboard-user',
  data() {
    return {
      mentor: {
        name:""
      },
      mentor_educations:{},
      mentor_education:{
        field_of_study_types:{
          name:""
        }
      },
      mentor_experiences:{},
      mentor_experience:{
        work_experience_job_type:{
        }
      },
      mentor_sessions:{},
      mentor_session:{

      },
    }
  },
  mounted() {
    this.getMentors()
    this.getMentorEducations()
    this.getMentorWorkExperiences()
    this.getMentorSessions()
  },
  methods: {
    async getMentors() {
      try {
        this.mentor = (await this.$axios.$get(`/api/student/mentors/${this.$route.params.id}`)).data
      } catch (e) {
        return e;
      }
    },
    async getMentorEducations() {
      try {
        this.mentor_educations = (await this.$axios.$get(`/api/student/mentor-educations/${this.$route.params.id}`)).data
      } catch (e) {
        return e;
      }
    },
    async getMentorWorkExperiences() {
      try {
        this.mentor_experiences = (await this.$axios.$get(`/api/student/mentor-work-experiences/${this.$route.params.id}`)).data
      } catch (e) {
        return e;
      }
    },
    async getMentorSessions() {
      try {
        this.mentor_sessions = (await this.$axios.$get(`/api/student/mentor-sessions/${this.$route.params.id}`)).data
      } catch (e) {
        return e;
      }
    },
  },
}
</script>

<style scoped>
.required:after {
  content: "*";
  color: red;
}
</style>
