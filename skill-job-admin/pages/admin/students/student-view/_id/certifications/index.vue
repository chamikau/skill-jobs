<template>
  <div id="tab-1" class="card tab-pane active show">
    <div class="contents">
      <div class="row">
        <div class="col mt-3 ms-3">
          <h3 class="card-title">
            Certification Details
          </h3>
        </div>
      </div>
      <div class="page-body">
        <div class="container-xl">
          <p v-if="certifications.length === 0" class="title fs-3 text-center">No records available</p>
          <div class="row">
            <div v-for="certification in certifications" class="col-sm-5 col-lg-5 mb-3 ">
              <div class="card card-sm cursor-pointer" @click="goToViewCertifications(certification.id)">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-md-2">
                    <span class="col-md-2">
                      <span class="avatar badge bg-x text-white">
                        {{ certification.title.slice(0,3) }}
                      </span>
                    </span>
                    </div>
                    <div class="col-md-7">
                      <div class="font-weight-medium text-truncate">
                      <span v-if="certification.title.length > 40">
                        {{ certification.title.slice(0,40) }}...
                      </span>
                        <span v-else>
                        {{certification.title}}
                      </span>
                      </div>
                      <div class="text-muted" v-if="certification.links != null">
                        {{certification.links}}
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
      deleteCertificationData:false,
      certifications:[{
        title:""
      }],
    }
  },
  mounted() {
    this.getStudentDetails()
  },
  methods: {
    async goToViewCertifications(id) {
      await this.$router.push(`/admin/students/student-view/${this.$route.params.id}/certifications/${id}/general`)
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
        this.certifications = this.students.certifications
      } catch (error) {
        return error;
      }
    },
  }
}
</script>

<style scoped>

</style>
