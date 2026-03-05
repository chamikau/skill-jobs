<template>
  <div id="tab-1" class="card tab-pane active show">
    <div class="contents">
      <div class="row">
        <div class="col mt-3 ms-3">
          <h3 class="card-title">
            Projects Details
          </h3>
        </div>
      </div>
      <div class="page-body">
        <div class="container-xl">
          <p v-if="projects.length === 0" class="title fs-3 text-center">No records available</p>
          <div class="row">
            <div v-for="project in projects" class="col-sm-5 col-lg-5 mb-3">
              <div class="card card-sm cursor-pointer" @click="goToViewProjects(project.id)">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-md-2">
                    <span class="col-md-2">
                      <span class="avatar badge bg-x text-white">
                        {{ project.project_title.slice(0,3) }}
                      </span>
                    </span>
                    </div>
                    <div class="col-md-7">
                      <div class="font-weight-medium text-truncate">
                      <span v-if="project.project_title.length >= 40">
                        {{ project.project_title.slice(0,40) }}...
                      </span>
                        <span v-else>
                        {{project.project_title}}
                      </span>
                      </div>
                      <div class="text-style-project-description">
                        {{ project.project_description.slice(0,25) }}
                      </div>
                      <div class="text-muted" v-if="project.project_links != null">
                        {{project.project_links.slice(0,25)}}
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
      projects:[{
        project_title:'',
        project_links:'',
        project_description:''
      }],
    }
  },
  mounted() {
    this.getStudentDetails()
  },
  methods: {
    async goToViewProjects(id) {
      await this.$router.push(`/admin/course-applicant-lists/course-application-view/${this.$route.params.id}/projects/${id}/general`)
    },
    async getStudentDetails() {
      try {
        this.students = (await this.$axios.$get(`/api/admin/students/${this.$route.params.id}`,
          {
            params: {
              per_page: 200,
            }
          }
        )).data;
        this.projects = this.students.projects
      } catch (error) {
        return error;
      }
    },
  }
}
</script>

<style scoped>
.text-style-project-description{
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
