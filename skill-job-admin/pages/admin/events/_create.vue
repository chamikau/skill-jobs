<template>
  <div>
    <div class="container-xl">
      <!-- Page title -->
      <div class="card-header">
        <NuxtLink class="btn btn-icon me-3 mt-3" to="/admin/events">
          <svg class="icon icon-tabler icon-tabler-arrow-narrow-left" fill="none"
               height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
               viewBox="0 0 24 24"
               width="24" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
            <line x1="5" x2="19" y1="12" y2="12"></line>
            <line x1="5" x2="9" y1="12" y2="16"></line>
            <line x1="5" x2="9" y1="12" y2="8"></line>
          </svg>
        </NuxtLink>
        <h5 class="card-title mt-3 fs-2">Event</h5>
      </div>
    </div>

    <div class="page-body">
      <div class="container-xl">
        <div class="row">
          <div class="col-md-3 mb-3 mb-md-0">
            <div class="card">
              <div class="list-group list-group-flush" data-bs-toggle="tabs">
                <NuxtLink v-if="!isLinkEnabled" class="list-group-item list-group-item-action" to="/admin/events/_create/general">
                  Basic Details
                </NuxtLink>
                <NuxtLink v-else class="list-group-item list-group-item-action disabled-link" to="/admin/events/_create/general">
                  Basic Details
                </NuxtLink>
                <NuxtLink v-if="isLinkEnabled" class="list-group-item list-group-item-action" :to="`/admin/events/_create/${this.event.id}/description`">
                  Description
                </NuxtLink>
                <NuxtLink v-else class="list-group-item list-group-item-action disabled-link" :to="`/admin/events/_create/${this.event.id}/description`">
                  Description
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
  name: "_create",
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
        this.job_id = data.id
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
  }
}
</script>

<style scoped>
.disabled-link {
  opacity: 0.5;
  cursor: not-allowed;
  pointer-events: none;
}
</style>
