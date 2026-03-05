<template>
  <div class="page">
    <div class="container-xl">
        <div class="page-header d-print-none">
          <ul class="breadcrumb mb-1">
            <li><a>Mentorships</a></li>
          </ul>
          <div  class="col d-flex align-items-center mb-2">
            <span class="fw-bold fs-1">Mentorships</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="">
              <div class="">
                <div class="row">
                  <div class="col-md-4">
                    <div class="">
                      <div class="">
                        <div class="row">
                          <div v-for="mentor in mentors" class="mb-3">
                            <NuxtLink class="card card-sm cursor-pointer" :to="`/user/mentors/${mentor.id}/general`">
                              <div class="card-body">
                                <div class="row align-items-center">
                                  <div class="col-auto">
                                    <span class="col-md-2">
                                      <span class="avatar badge bg-x text-white">
                                        {{ mentor.name.slice(0, 3) }}
                                      </span>
                                    </span>
                                      </div>
                                     <div class="col">
                                     <div class="fw-bold text-truncate">
                                      <span v-if="mentor.name.length > 40">
                                        {{ mentor.name.slice(0, 40) }}...
                                      </span>
                                       <span v-else>
                                        {{ mentor.name }}
                                      </span>
                                     </div>
                                       <div>
                                       <span v-if="mentor.position.length > 40" class="fs-5">
                                        {{mentor.position.slice(0, 40)}}
                                      </span>
                                         <span v-else class="fs-5">
                                        {{ mentor.position }}
                                      </span>
                                       </div>
                                       <div>
                                      <span v-if="mentor.about_mentor.length > 40" class="fs-5">
                                        {{mentor.about_mentor.slice(0, 40)}}
                                      </span>
                                         <span v-else class="fs-5">
                                        {{ mentor.about_mentor }}
                                      </span>
                                       </div>
                                  </div>
                                </div>
                              </div>
                            </NuxtLink>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <NuxtChild/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <p v-if="mentors.length === 0" class="title fs-3 text-center">No records available</p>
        </div>
      </div>
  </div>
</template>

<script>


export default {
  name: "_id",
  layout: 'dashboard-user',
  data() {
    return {
      mentors: "",
      filters: {},
    }
  },
  mounted() {
    this.getMentors();
  },
  methods: {
    async getMentors() {
      try {
        this.mentors = (await this.$axios.$get('/api/student/mentors'
        )).data;
      } catch (error) {
        return error;
      }
    },
  },

}
</script>
<style scoped>
.content {
  text-align: center;
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
