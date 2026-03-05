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
<!--                     Active Jobs-->
<!--                  </div>-->
<!--                  <div class="fw-bold fs-3">-->
<!--                    {{active_jobs_count}}-->
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
<!--                    Inactive Jobs-->
<!--                  </div>-->
<!--                  <div class="fw-bold fs-3">-->
<!--                    {{inactive_jobs_count}}-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
      </div>
    </div>

  </div>

</div>
</template>

<script>
import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);
export default {
  name: "dashboard",
  layout: 'dashboard-admin',
  data() {
    return {
      active_jobs_count:"",
      inactive_jobs_count:""
    };
  },
  mounted() {
    this.getJobCount();
  },
  methods: {
    async getJobCount() {
      try {
        this.active_jobs_count = (await this.$axios.$get('/api/admin/get-job-count',
        {
          params: {
            per_page: 200,
              'filter[state]': 'active',
          }
        }))
        this.inactive_jobs_count = (await this.$axios.$get('/api/admin/get-job-count',
          {
            params: {
              per_page: 200,
              'filter[state]': 'inactive',
            }
          }))
      } catch (error) {
        return error;
      }
    },
  }

}
</script>

<style scoped>

</style>
