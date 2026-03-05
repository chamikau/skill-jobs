<template>
  <div>
    <div class="page-center">
      <div class="container-tight py-4">
        <form @submit.prevent="updateCompanyData" ref="create_organization">
          <div class="card">
            <div class="m-2">
              <div class="card-header">
                <a class="btn btn-icon me-3" to="/admin/company" @click="$router.back()">
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
                <h4 class="title">Update Company</h4>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="text-end">
                    <button v-if="company.state === 'inactive'" class="btn btn-outline-primary" @click.prevent="getActiveCompany(company)">Active</button>
                    <button v-if="company.state === 'active'" class="btn btn-outline-warning" @click.prevent="getActiveCompany(company)">Inactive</button>
                  </div>
                  <div class="">
                    <label
                      class="form-label"
                      :class="[update_company_form.errors.name ? 'text-danger' : '']">Company Name</label>
                    <input
                      v-model="update_company_form.fields.name"
                      :class="[update_company_form.errors.name ? 'is-invalid' : '']"
                      type="text" class="form-control"
                      placeholder="enter company name" autocomplete="off">
                    <div v-if="update_company_form.errors.name" class="invalid-feedback">
                      {{ update_company_form.errors.name[0] }}
                    </div>
                  </div>
                  <div class="mt-3">
                    <label
                      class="form-label"
                      :class="[update_company_form.errors.industry_type_id ? 'text-danger' : '']">Industry Type</label>
                    <SearchSelect
                      :attributes="industryTypeAttributes"
                      :class="[update_company_form.errors.industry_type_id ? 'is-invalid' : '']"
                      :border_color_danger="update_company_form.errors.industry_type_id"
                      placeholder="select industry type"
                      @queryUpdates="getIndustryTypes"
                      @selectUpdates="selectIndustryTypes"
                    />
                    <div v-if="update_company_form.errors.industry_type_id" class="invalid-feedback">
                      {{ update_company_form.errors.industry_type_id[0] }}
                    </div>
                  </div>
                  <div class="mt-3">
                    <label
                      class="form-label"
                      :class="[update_company_form.errors.city_id ? 'text-danger' : '']">City</label>
                    <SearchSelect
                      :attributes="cityAttributes"
                      :class="[update_company_form.errors.city_id ? 'is-invalid' : '']"
                      :border_color_danger="update_company_form.errors.city_id"
                      placeholder="select city"
                      @queryUpdates="getCities"
                      @selectUpdates="selectCity"
                    />
                    <div v-if="update_company_form.errors.city_id" class="invalid-feedback">
                      {{ update_company_form.errors.city_id[0] }}
                    </div>
                  </div>
                  <div class="mt-3">
                    <label
                      class="form-label"
                      :class="[update_company_form.errors.about_the_company ? 'text-danger' : '']">
                      Company Description</label>
                    <textarea
                      v-model="update_company_form.fields.about_the_company"
                      :class="[update_company_form.errors.about_the_company ? 'is-invalid' : '']"
                      type="text" class="form-control "
                      placeholder="enter company description"
                      autocomplete="off"></textarea>
                    <div v-if="update_company_form.errors.about_the_company" class="invalid-feedback">
                      {{ update_company_form.errors.about_the_company[0] }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <div class="d-flex">
                <button class="btn btn-outline-secondary ms-auto me-2" @click.prevent="reset">Reset</button>
                <button class="btn btn-primary" type="submit">Update Company</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "_id",
  layout: 'dashboard-admin-organization',
  data() {
    return {
      company:"",
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
      update_company_form: {
        fields: {},
        error_message: '',
        errors: [],
      }
    }
  },
  mounted() {
    this.getCities();
    this.getIndustryTypes();
    this.getOrganization()
  },
  methods: {
    async updateCompanyData() {
      try {
        let company = await this.$axios.$put(`/api/admin/organizations/${this.$route.params.id}`, this.update_company_form.fields)
        await this.$router.back();
      } catch (e) {
        this.update_company_form.errors = e.response.data.errors
        this.update_company_form.error_message = e.response.data.message
      }
    },
    async getActiveCompany(company) {
        try {
          if (company.state === 'inactive') {
            await this.$axios.$post(`/api/admin/organizations/${this.$route.params.id}/active`)
          } else if (company.state === 'active') {
            await this.$axios.$post(`/api/admin/organizations/${this.$route.params.id}/inactive`)
          }
          this.getOrganization();
        } catch (e) {
          return e;
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
      this.update_company_form.fields.city_id = this.cityAttributes.selected.value;
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
      this.update_company_form.fields.industry_type_id = this.industryTypeAttributes.selected.value;
    },
    async getOrganization() {
      try {
        this.company = (await this.$axios.$get(`/api/admin/organizations/${this.$route.params.id}`, this.update_company_form.fields)).data
        this.update_company_form.fields = this.company
        this.cityAttributes.selected = this.cityAttributes.data.find((x)=>x.value === this.company.city_id);
        this.industryTypeAttributes.selected = this.industryTypeAttributes.data.find((x)=>x.value === this.company.industry_type_id);
      } catch (e) {
        this.update_company_form.errors = e.response.data.errors
        this.update_company_form.error_message = e.response.data.message
      }
    },
    inputUpdates(values) {
      this.attributes.table_component_values = values;
      this.updateCompanyData(values.page, values.sort.sort_input, values.search, values.per_page)
    },
    async reset() {
      try {
        this.company = (await this.$axios.$get(`/api/admin/organizations/${this.$route.params.id}`)).data
        this.update_company_form.fields = this.company
        this.cityAttributes.selected = this.cityAttributes.data.find((x)=>x.value === this.job.city_id);
        this.industryTypeAttributes.selected = this.industryTypeAttributes.data.find((x)=>x.value === this.company.industry_type_id);
      }catch (e){
        return e;
      }
    },
  },
}
</script>

<style scoped>

</style>
