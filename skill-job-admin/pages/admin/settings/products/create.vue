<template>
  <div>
    <div class="">
      <form ref="create_invitation" @submit.prevent="createProduct">
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
            <h5 class="card-title">Create New Product</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label :class="[create_product_form.errors.name ? 'text-danger' : '']"
                         class="form-label">Name</label>
                  <input v-model="create_product_form.fields.name"
                         :class="[create_product_form.errors.name ? 'is-invalid' : '']" autocomplete="off"
                         class="form-control" type="text">
                  <div v-if="create_product_form.errors.name" class="invalid-feedback">
                    {{ create_product_form.errors.name[0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label :class="[create_product_form.errors.quantity ? 'text-danger' : '']"
                         class="form-label">Quantity</label>
                  <input v-model="create_product_form.fields.quantity"
                         :class="[create_product_form.errors.quantity ? 'is-invalid' : '']" autocomplete="off"
                         class="form-control" type="number">
                  <div v-if="create_product_form.errors.quantity" class="invalid-feedback">
                    {{ create_product_form.errors.quantity[0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label :class="[create_product_form.errors.price ? 'text-danger' : '']"
                         class="form-label">Price</label>
                  <div class="input-group mb-2">
                    <span class="input-group-text">£</span>
                    <input v-model="create_product_form.fields.price"
                           :class="[create_product_form.errors.price ? 'is-invalid' : '']" autocomplete="off"
                           class="form-control" type="number" step="0.01">
                  </div>
                  <div v-if="create_product_form.errors.price" class="invalid-feedback">
                    {{ create_product_form.errors.price[0] }}
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label :class="[create_product_form.errors.description ? 'text-danger' : '']"
                         class="form-label">Description (optional)</label>
                  <textarea class="form-control" rows="2"
                            :class="[create_product_form.errors.description ? 'is-invalid' : '']"
                            v-model="create_product_form.fields.description"></textarea>
                  <div v-if="create_product_form.errors.description" class="invalid-feedback">
                    {{ create_product_form.errors.description[0] }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <a class="btn btn-outline-secondary ms-auto me-2" @click="reset()">Reset</a>
              <button class="btn btn-primary" type="submit">Create New Product</button>
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
      create_product_form: {
        fields: {},
        error_message: '',
        errors: [],
      }
    }
  },
  methods: {
    async createProduct() {
      try {
        let role = await this.$axios.$post('/api/admin/products', this.create_product_form.fields)
        await this.$router.push(`/admin/settings/products/`)
      } catch (e) {
        this.create_product_form.errors = e.response.data.errors
        this.create_product_form.error_message = e.response.data.message
      }
    },
    async reset() {
      this.create_product_form = {
        fields: {},
        error_message: '',
        errors: [],
      }
    }
  },
}
</script>

<style scoped>

</style>
