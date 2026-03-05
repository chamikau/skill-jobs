<template>
  <div>
    <div class="">
      <form ref="create_invitation" @submit.prevent="createCollection">
        <div class="card">
          <div class="card-header">
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
            <h5 class="card-title">Create Product Collection</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label :class="[create_product_collection_form.errors.name ? 'text-danger' : '']"
                         class="form-label">Name</label>
                  <input v-model="create_product_collection_form.fields.name"
                         :class="[create_product_collection_form.errors.name ? 'is-invalid' : '']" autocomplete="off"
                         class="form-control" type="text">
                  <div v-if="create_product_collection_form.errors.name" class="invalid-feedback">
                    {{ create_product_collection_form.errors.name[0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label :class="[create_product_collection_form.errors.consultation_form_id ? 'text-danger' : '']"
                         class="form-label">Consultation Form</label>
                  <select v-model="create_product_collection_form.fields.consultation_form_id"
                         :class="[create_product_collection_form.errors.consultation_form_id ? 'is-invalid' : '']" autocomplete="off"
                         class="form-select" >
                    <template v-for="form in consultation_form">
                      <option :value="form.id">{{ form.name }} - Tag : {{ form.tag }}</option>
                    </template>
                  </select>
                  <div v-if="create_product_collection_form.errors.consultation_form_id" class="invalid-feedback">
                    {{ create_product_collection_form.errors.consultation_form_id[0] }}
                  </div>
                </div>
              </div>
              <div class="col-12 row">
                <label class="form-label">Products</label>
                <div class="col-12 row" v-for="(product,index) in create_product_collection_form.fields.products">
                  <div class="col-10 mb-2">
                    <select class="form-select" v-model="create_product_collection_form.fields.products[index]"
                            :class="[create_product_collection_form.errors['products.'+index] ? 'is-invalid' : '']"
                            >
                      <template v-for="item in product_list">
                        <option :value="item.id"
                                v-show="item.id!==(create_product_collection_form.fields.products.find(x => x===item.id))"
                        >{{ item.name }}</option>
                      </template>
                    </select>
                    <span v-if="create_product_collection_form.errors['products.'+index]" class="invalid-feedback">
                      {{ create_product_collection_form.errors['products.'+index][0] }}
                    </span>
                  </div>
                  <div class="col-2 text-center pt-2">
                    <a class="text-black cursor-pointer" @click="remove(index)">
                      <svg class="icon icon-tabler icon-tabler-trash" fill="none" height="24"
                           stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           viewBox="0 0 24 24"
                           width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                        <line x1="4" x2="20" y1="7" y2="7"></line>
                        <line x1="10" x2="10" y1="11" y2="17"></line>
                        <line x1="14" x2="14" y1="11" y2="17"></line>
                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                      </svg>
                    </a>
                  </div>
                </div>
                <div class="col-12 pt-3" v-if="product_list.length>create_product_collection_form.fields.products.length">
                  <a aria-label="Facebook" class="w-50 text-black mt-3" href="#" @click.prevent="addProduct">
                    <svg class="icon icon-tabler icon-tabler-plus mx-1" fill="none" height="24"
                         stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         viewBox="0 0 24 24"
                         width="24" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                      <line x1="12" x2="12" y1="5" y2="19"></line>
                      <line x1="5" x2="19" y1="12" y2="12"></line>
                    </svg>
                    Add Product
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <a class="btn btn-outline-secondary ms-auto me-2" @click="reset()">Reset</a>
              <button class="btn btn-primary" type="submit">Create Product Collection</button>
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
  data() {
    return {
      roles_list: {},
      create_product_collection_form: {
        fields: {
          products: ['']
        },
        error_message: '',
        errors: [],
      },
      consultation_form: [],
      product_list: []
    }
  },
  mounted() {
    this.getConsultationForm()
    this.getProducts()
  },
  methods: {
    addProduct() {
      this.create_product_collection_form.fields.products.push('')
    },
    remove(index) {
      this.create_product_collection_form.fields.products.splice(index, 1)
    },
    async getProducts() {
      try {
        this.product_list = (await this.$axios.$get('/api/admin/products')).data.map((x) => ({
          id: x.id,
          name: x.name
        }))
      } catch (e) {}
    },
    async getConsultationForm() {
      try {
        this.consultation_form = (await this.$axios.$get('api/admin/consultation-forms')).data.map((x) => ({
          id: x.id,
          name: x.name,
          tag: x.tag.name
        }))
      } catch (e) {}
    },
    async createCollection() {
      try {
        this.create_product_collection_form.fields.products = this.create_product_collection_form.fields.products
          .filter(x => x !== '')
        let role = await this.$axios.$post('/api/admin/product-collections', this.create_product_collection_form.fields)
        await this.$router.push(`/admin/settings/collections/`)
      } catch (e) {
        this.create_product_collection_form.errors = e.response.data.errors
        this.create_product_collection_form.error_message = e.response.data.message
      }
    },
    async reset() {
      this.create_product_collection_form = {
        fields: {
          products: ['']
        },
        error_message: '',
        errors: [],
      }
    }
  },
}
</script>

<style scoped>

</style>
