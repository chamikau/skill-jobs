<template>
  <div>
    <!-- Users table -->
    <div>
      <div class="">
        <div class="row">
          <div class="col-md-12">
            <div class="card">

              <div class="card-header row">
                <div class="col mb-md-0 mb-2">
                  <h3 class="card-title">Products</h3>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                  <div class="btn-list">
                    <NuxtLink class="btn btn-primary" to="/admin/settings/products/create">
                      <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                           xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                        <line x1="12" x2="12" y1="5" y2="19"/>
                        <line x1="5" x2="19" y1="12" y2="12"/>
                      </svg>
                      Create New Product
                    </NuxtLink>
                  </div>
                </div>
              </div>

              <Table :attributes="attributes" @inputUpdates="inputUpdates">
                <template v-slot:price="props">{{ getPrice(props.record.price) }}</template>
                <template v-slot:state="props">{{ firstLetterUpperCase(props.record.state) }}</template>
                <template v-slot:action="props">
                  <div class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                      Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item text-black text-center cursor-pointer"
                         @click="$router.push(`/admin/settings/products/${props.record.id}`)">
                        Edit</a>
                      <a class="dropdown-item text-black text-center cursor-pointer" @click="changeState(props.record)"
                      >{{ props.record.state==='active' ? 'Inactive' : 'Active'}}</a>
                    </div>
                  </div>
                </template>
              </Table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "index",
  data() {
    return {
      attributes: {
        table_id: 'products_table',
        cache: true,
        loading: false,
        labels: [
          {key: 'name', name: 'Name', sort: true},
          {key: 'description', name: 'Description', sort: true},
          {key: 'quantity', name: 'Quantity', sort: true},
          {key: 'price', name: 'Price', sort: true},
          {key: 'state', name: 'Status', sort: true},
          {key: 'action', name: 'Action'},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      },
    }
  },
  methods: {
    async changeState (product) {
      try {
        if (product.state === 'active') await this.$axios.$post(`api/admin/products/${product.id}/inactive`)
        else if (product.state === 'inactive') await this.$axios.$post(`api/admin/products/${product.id}/active`)
        // await this.showSuccessMessage('Status changed successfully')
        await this.getProductsTableData()
      } catch (e) {
        // await this.showErrorMessage(e)
      }
    },
    async getProductsTableData(page = 1, sort = '', search = '', per_page = 15) {
      try {
        this.attributes.api_response = await this.$axios.$get('api/admin/products',
          {
            params: {
              per_page: per_page,
              page: page,
              sort: sort,
              'filter[search]': search,
              ...this.attributes.filters
            }
          }
        );
      } catch (error) {
      }
    },
    inputUpdates(values) {
      this.attributes.table_component_values = values;
      this.getProductsTableData(values.page, values.sort.sort_input, values.search, values.per_page)
    },
  }
}
</script>

<style scoped>

</style>
