<template>
  <div id="tab-1" class="card tab-pane active show">
    <div class="row">
      <div class="col mt-3 ms-3">
        <h3 class="card-title">
          Educational Details
        </h3>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
        <p v-if="educations.length === 0" class="title fs-3 text-center">No records available</p>
        <div class="row">
          <div v-for="education in educations" class="col-sm-5 col-lg-5 mb-3">
            <div class="card card-sm cursor-pointer" @click="goToViewEducations(education.id)">
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
  name: "index",
  layout: 'dashboard-admin',
  data() {
    return {
      educations:[{
        field_of_study_types:{
          name:""
        }
      }],
    }
  },
  mounted() {
    this.getStudentDetails()
  },
  methods: {
    async goToViewEducations(id) {
      await this.$router.push(`/admin/event-applicant-lists/event-application-view/${this.$route.params.id}/educations/${id}/general`)
    },
    async getStudentDetails(page = 1, sort = '', search = '', per_page = 15,) {
      try {
        this.students = (await this.$axios.$get(`/api/admin/students/${this.$route.params.id}`,
          {
            params: {
              per_page: per_page,
            }
          }
        )).data;
        this.educations = this.students.educations
      } catch (error) {
        return error;
      }
    },
  }
}
</script>

<style scoped>

</style>
