<template>
  <div>
    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a href="#" @click.prevent="backToPage">Events</a></li>
          <li><a href="#" @click.prevent="backToPage">Events List</a></li>
          <li><a>Edit Event</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">Edit Event</span>
              <span class="ms-2 mx-2 bold"  style="font-size: 2rem;"> - </span>
              <span class="fw-bold fs-1">{{ event.name }}</span>
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
                <NuxtLink class="list-group-item list-group-item-action" :to="`/admin/events/edit-event/${$route.params.id}/general`">
                  Event Landing
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" :to="`/admin/events/edit-event/${$route.params.id}/description`">
                  Event Description
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
      event:{},
      isLinkEnabled:false,
      event_id:''
    }
  },

  mounted() {
    this.getEvents()
    },
  methods: {
    handleChildEvent(data) {
      if (data !== null) {
        this.isLinkEnabled = true;
        this.event_id = data.id
      } else {
        this.isLinkEnabled = false;
      }
    },
    async getEvents() {
      this.event = (await this.$axios.$get(`/api/admin/events/${this.$route.params.id}`)).data
      this.event_id = this.event.id
      if (this.event_id !== null){
        this.isLinkEnabled = true;
      }else {
        this.isLinkEnabled = false;
      }
    },
    backToPage(){
      this.$router.push(`/admin/events`);
    },
  }
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
