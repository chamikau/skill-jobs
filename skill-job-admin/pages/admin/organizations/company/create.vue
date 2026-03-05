<template>
  <div class="page-center">
    <div class="container-tight py-4">
      <form @submit.prevent="getStudentTableData" ref="create_organization">
        <div class="card">
          <div class="m-2">
            <div class="card-header">
              <a class="btn btn-icon me-3" to="/admin/job" @click="$router.back()">
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
              <h4 class="title">Create New Company</h4>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="">
                  <label
                    class="form-label"
                    :class="[create_company_form.errors.name ? 'text-danger' : '']">Company Name</label>
                  <input
                    v-model="create_company_form.fields.name"
                    :class="[create_company_form.errors.name ? 'is-invalid' : '']"
                    type="text" class="form-control"
                    placeholder="enter company name" autocomplete="off">
                  <div v-if="create_company_form.errors.name" class="invalid-feedback">
                    {{ create_company_form.errors.name[0] }}
                  </div>
                </div>
                <div class="mt-3">
                  <label
                    class="form-label"
                    :class="[create_company_form.errors.industry_type_id ? 'text-danger' : '']">Industry Type</label>
                  <SearchSelect
                    :attributes="industryTypeAttributes"
                    :class="[create_company_form.errors.industry_type_id ? 'is-invalid' : '']"
                    :border_color_danger="create_company_form.errors.industry_type_id"
                    placeholder="select industry type"
                    @queryUpdates="getIndustryTypes"
                    @selectUpdates="selectIndustryTypes"
                  />
                  <div v-if="create_company_form.errors.industry_type_id" class="invalid-feedback">
                    {{ create_company_form.errors.industry_type_id[0] }}
                  </div>
                </div>
                <div class="mt-3">
                  <label
                    class="form-label"
                    :class="[create_company_form.errors.city_id ? 'text-danger' : '']">City</label>
                  <SearchSelect
                    :attributes="cityAttributes"
                    :class="[create_company_form.errors.city_id ? 'is-invalid' : '']"
                    :border_color_danger="create_company_form.errors.city_id"
                    placeholder="select city"
                    @queryUpdates="getCities"
                    @selectUpdates="selectCity"
                  />
                  <div v-if="create_company_form.errors.city_id" class="invalid-feedback">
                    {{ create_company_form.errors.city_id[0] }}
                  </div>
                </div>
                <div class="mt-3">
                  <label
                    class="form-label"
                    :class="[create_company_form.errors.about_the_company ? 'text-danger' : '']">
                    Company Description</label>
                  <textarea
                    v-model="create_company_form.fields.about_the_company"
                    :class="[create_company_form.errors.about_the_company ? 'is-invalid' : '']"
                    type="text" class="form-control "
                    placeholder="enter company description"
                    autocomplete="off"></textarea>
                  <div v-if="create_company_form.errors.about_the_company" class="invalid-feedback">
                    {{ create_company_form.errors.about_the_company[0] }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="reset">Reset</button>
              <button class="btn btn-primary" type="submit">Create New Company</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "create",
  layout: 'dashboard-admin-organization',
  data() {
    return {
      cityAttributes: {
        data: [],
        selected: {},
      },
      industryTypeAttributes: {
        data: [],
        selected: {},
      },
      filterCityList: [],
      filterIndustryTypeList: [],
      filters: {},
      attributes: {
        table_id: 'organizations_table',
        cache: false,
        loading: false,
        api_response: {},
        filters: {},
        table_component_values: {}
      },
      create_company_form: {
        fields: {},
        error_message: '',
        errors: [],
      }
    }
  },
  methods: {
    async getStudentTableData() {
      try {
        let company = await this.$axios.$post(`/api/admin/organizations`, this.create_company_form.fields)
        await this.$router.back();
      } catch (e) {
        this.create_company_form.errors = e.response.data.errors
        this.create_company_form.error_message = e.response.data.message
      }
    },
    async getCities(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/admin/cities',{params:{'filter[search]':query}});
        this.cityAttributes.data = attributes.data.map((x) => ({
          name: `${x.name} - ${x.country.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectCity() {
      this.create_company_form.fields.city_id = this.cityAttributes.selected.value;
    },
    async getIndustryTypes(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/admin/industry-types',{params:{'filter[search]':query}});
        this.industryTypeAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        this.industryTypeAttributes.errors = e.response.data.errors
        this.industryTypeAttributes.error_message = e.response.data.message
      }
    },
    selectIndustryTypes() {
      this.create_company_form.fields.industry_type_id = this.industryTypeAttributes.selected.value;
    },
    async getOrganization() {
      try {
        let company = await this.$axios.$get(`/api/admin/organizations`)
        await this.$router.back();
      } catch (e) {
        this.create_company_form.errors = e.response.data.errors
        this.create_company_form.error_message = e.response.data.message
      }
    },
    inputUpdates(values) {
      this.attributes.table_component_values = values;
      this.getStudentTableData(values.page, values.sort.sort_input, values.search, values.per_page)
    },
    async reset() {
      this.industryTypeAttributes.selected = ""
      this.cityAttributes.selected = ""
      this.create_company_form = {
        fields: {},
        error_message: '',
        errors: [],
      }
    },
  },
  mounted() {
    this.getCities();
    this.getIndustryTypes();
  },
}
</script>

<style scoped>

</style>
