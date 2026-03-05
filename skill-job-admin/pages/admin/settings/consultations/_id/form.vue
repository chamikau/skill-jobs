<template>
  <div>
    <div class="">
      <div class="card">
        <div class="card-header">
          <div class="col">
            <div class="d-flex align-items-center">
              <a class="btn btn-icon me-3" href="#" @click="$router.back()">
                <svg class="icon icon-tabler icon-tabler-arrow-narrow-left" fill="none"
                     height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     viewBox="0 0 24 24"
                     width="24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                  <line x1="5" x2="19" y1="12" y2="12"></line>
                  <line x1="5" x2="9" y1="12" y2="16"></line>
                  <line x1="5" x2="9" y1="12" y2="8"></line>
                </svg>
              </a>
              <h5 class="card-title">Consultation Form - {{ form.name }}</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form >
            <div class="card-body row">
              <div v-for="data in form.data"
                   :class="(data.type==='TEXTAREA' || data.type==='TITLE') ? 'col-md-12' : 'col-md-6'">
                <div class="mb-3">
                  <h2 class="" v-if="data.type==='TITLE'">{{ data.name }}</h2>

                  <label v-if="data.type!=='TITLE'"
                         class="form-label"
                  >{{ data.label }} {{ data.is_required ? '' : '(optional)' }}
                  </label>

                  <input v-if="data.type==='TEXT' || data.type==='NUMBER'" readonly
                         class="form-control " :type="data.type">

                  <select v-if="data.type==='SELECT'"
                          autocomplete="off"
                          class="form-select">
                    <template v-for="option in data.options">
                      <option :value="option" hidden>{{ option }}</option>
                    </template>
                  </select>

                  <textarea class="form-control" rows="2" v-if="data.type==='TEXTAREA'" readonly></textarea>

                  <span v-if="data.description">Note: {{ data.description }}</span>

                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "form",
  layout: "dashboard-patient",
  data() {
    return {
      form: {},
    }
  },
  mounted() {
    this.getConsultationForm()
  },
  methods: {
    async getConsultationForm() {
      try {
        this.form = (await this.$axios.$get(`/api/admin/consultation-forms/${this.$route.params.id}`))
      } catch (e) {}
    },
  }
}
</script>

<style scoped>

</style>
