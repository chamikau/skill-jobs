<template>
  <div>
    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a href="#" @click.prevent="backToPage">Courses</a></li>
          <li><a href="#" @click.prevent="backToPage">Courses List</a></li>
          <li><a>Create Course</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">Create Course</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-body">
      <div class="container-xl">
        <div class="row">
          <div class="col-md-3 mb-3 mb-md-0">
            <div class="card">
              <div class="list-group list-group-flush" data-bs-toggle="tabs">
                <NuxtLink v-if="!isLinkEnabled" class="list-group-item list-group-item-action" :to="`/admin/courses/create-course/course`">
                  Course Landing
                </NuxtLink>
                <NuxtLink v-else class="list-group-item list-group-item-action disabled-link" :to="`/admin/courses/create-course/course`">
                  Course Landing
                </NuxtLink>
<!--                <NuxtLink v-if="isLinkEnabled" class="list-group-item list-group-item-action" :to="`/admin/courses/create-course/${this.course_id}/description`">-->
<!--                  Description-->
<!--                </NuxtLink>-->
<!--                <NuxtLink v-else class="list-group-item list-group-item-action disabled-link" :to="`/admin/courses/create-course/${this.course_id}/description`">-->
<!--                  Description-->
<!--                </NuxtLink>-->
                <NuxtLink v-if="isLinkEnabled" class="list-group-item list-group-item-action" :to="`/admin/courses/create-course/${this.course_id}/contents/`">
                  Course Content
                </NuxtLink>
                <NuxtLink v-else class="list-group-item list-group-item-action disabled-link" :to="`/admin/courses/create-course/${this.course_id}/contents/`">
                  Course Content
                </NuxtLink>
              </div>
            </div>
          </div>

          <div class="col-md-9">
            <NuxtChild @child-event="handleChildEvent" />
          </div>

        </div>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "_id",
  layout: 'dashboard-admin',

  data(){
    return {
      course:{},
      isLinkEnabled:false,
      course_id:''
    }
  },

  mounted(){
    this.getCourses();
  },
  methods:{
    handleChildEvent(data) {
      if (data !== null){
        this.isLinkEnabled = true;
        this.course_id = data.id
      }else {
        this.isLinkEnabled = false;
      }
    },
    async getCourses() {
      this.course = (await this.$axios.$get(`/api/admin/courses/${this.$route.params.id}`)).data
      this.course_id = this.course.id
      if (this.course_id !== null){
        this.isLinkEnabled = true;
      }else {
        this.isLinkEnabled = false;
      }
    },
    backToPage(){
      this.$router.push(`/admin/courses`);
    },
  },

}
</script>

<style scoped>
.disabled-link {
  opacity: 0.5;
  cursor: not-allowed;
  pointer-events: none;
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
