<template>
  <div>
    <div class="">
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
          <h5 class="card-title">Create Consultation Form</h5>
        </div>
        <form @submit.prevent="createForm">
          <div class="row p-3 mx-0">
            <div class="col-md-6">
              <label :class="[create_consultation_form.errors.name ? 'text-danger' : '']"
                     class="form-label">Name</label>
              <input v-model="create_consultation_form.fields.name" :class="[create_consultation_form.errors.name ? 'is-invalid' : '']" autocomplete="off"
                     class="form-control " type="text">
              <div v-if="create_consultation_form.errors.name" class="invalid-feedback">
                {{ create_consultation_form.errors.name[0] }}
              </div>
            </div>
            <div class="col-md-6">
              <label :class="[create_consultation_form.errors.tag_id ? 'text-danger' : '']"
                     class="form-label">Tag</label>
              <select v-model="create_consultation_form.fields.tag_id" :class="[create_consultation_form.errors.tag_id ? 'is-invalid' : '']"
                      class="form-select">
                <template v-for="tag in tag_list">
                  <option :value="tag.id">{{ tag.name }}</option>
                </template>
              </select>
              <div v-if="create_consultation_form.errors.tag_id" class="invalid-feedback">
                {{ create_consultation_form.errors.tag_id[0] }}
              </div>
            </div>
            <div class="col-12 mt-3">
              <label :class="[create_consultation_form.errors.description ? 'text-danger' : '']" class="form-label">Description
                (optional)</label>
              <textarea v-model="create_consultation_form.fields.description" :class="[create_consultation_form.errors.description ? 'is-invalid' : '']"
                        class="form-control"
                        rows="2"></textarea>
              <div v-if="create_consultation_form.errors.description" class="invalid-feedback">
                {{ create_consultation_form.errors.description[0] }}
              </div>
            </div>
          </div>
          <div class="card-body row">
            <label class="form-label">Form Data</label>
            <div class="col-12">
              <draggable
                v-model="create_consultation_form.fields.data"
                draggable=".item"
                handle=".handle"
              >
                <div
                  v-for="(element, idx) in create_consultation_form.fields.data"
                  class="row my-2 mx-0 border rounded item p-3"
                >
                  <div class="col-1 mt-4">
                    <a class="handle cursor-pointer text-black">
                      <svg class="icon icon-tabler icon-tabler-menu-2" fill="none" height="24"
                           stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                           width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                        <line x1="4" x2="20" y1="6" y2="6"></line>
                        <line x1="4" x2="20" y1="12" y2="12"></line>
                        <line x1="4" x2="20" y1="18" y2="18"></line>
                      </svg>
                    </a>
                  </div>

                  <div class="col-10 row">
                    <div class="col-md-4">
                      <label :class="[create_consultation_form.errors['data.'+idx+'.type'] ? 'text-danger' : '']"
                             class="form-label"
                      >Type</label>
                      <select v-model="element.type" :class="[create_consultation_form.errors['data.'+idx+'.type'] ? 'border-danger' : '']"
                              class="form-select"
                              @change="resetDataField(element,idx)">
                        <template v-for="type in types">
                          <option :value="type.value">{{ type.name }}</option>
                        </template>
                      </select>
                      <div v-if="create_consultation_form.errors['data.'+idx+'.type']" class="text-danger fs-5 mt-2">
                        {{ create_consultation_form.errors['data.' + idx + '.type'][0] }}
                      </div>
                    </div>
                    <div v-if="element.type==='TITLE'" class="col-md-6">
                      <label :class="[create_consultation_form.errors['data.'+idx+'.name'] ? 'text-danger' : '']"
                             class="form-label">Name</label>
                      <input v-model="element.name" :class="[create_consultation_form.errors['data.'+idx+'.name'] ? 'border-danger' : '']" class="form-control"
                             type="text"/>
                      <div v-if="create_consultation_form.errors['data.'+idx+'.name']" class="text-danger fs-5 mt-2">
                        {{ create_consultation_form.errors['data.' + idx + '.name'][0] }}
                      </div>
                    </div>
                    <div v-if="element.type==='TITLE'" class="col-12 mt-3">
                      <label :class="[create_consultation_form.errors['data.'+idx+'.description'] ? 'text-danger' : '']"
                             class="form-label">Description
                        (optional)</label>
                      <textarea v-model="element.description" :class="[create_consultation_form.errors['data.'+idx+'.description'] ? 'border-danger' : '']"
                                autocomplete="off"
                                class="form-control" rows="2"></textarea>
                      <div v-if="create_consultation_form.errors['data.'+idx+'.description']"
                           class="text-danger fs-5 mt-2">
                        {{ create_consultation_form.errors['data.' + idx + '.description'][0] }}
                      </div>
                    </div>
                    <div v-if="element.type!=='TITLE'" class="col-md-4">
                      <label :class="[create_consultation_form.errors['data.'+idx+'.label'] ? 'text-danger' : '']"
                             class="form-label">Label</label>
                      <input v-model="element.label" :class="[create_consultation_form.errors['data.'+idx+'.label'] ? 'border-danger' : '']" class="form-control"
                             type="text"/>
                      <div v-if="create_consultation_form.errors['data.'+idx+'.label']" class="text-danger fs-5 mt-2">
                        {{ create_consultation_form.errors['data.' + idx + '.label'][0] }}
                      </div>
                    </div>
                    <div v-if="element.type!=='TITLE'" class="col-md-4">
                      <label :class="[create_consultation_form.errors['data.'+idx+'.is_required'] ? 'text-danger' : '']"
                             class="form-label">Required</label>
                      <select v-model="element.is_required" :class="[create_consultation_form.errors['data.'+idx+'.is_required'] ? 'border-danger' : '']"
                              class="form-select">
                        <option :value="true">True</option>
                        <option :value="false">False</option>
                      </select>
                      <div v-if="create_consultation_form.errors['data.'+idx+'.is_required']"
                           class="text-danger fs-5 mt-2">
                        {{ create_consultation_form.errors['data.' + idx + '.is_required'][0] }}
                      </div>
                    </div>
                    <div v-if="element.type==='SELECT'" class="mt-3 p-1">
                      <label class="form-label">Options</label>
                      <draggable v-model="element.options" class="row" draggable=".item" handle=".handle-option">
                        <div v-for="(option,index) in element.options" :key="index" class="item col-12 mb-2">
                          <div class="input-group">
                             <span class="input-group-text" style="border: none!important;">
                              <a class="handle-option cursor-pointer text-black">
                                <svg class="icon icon-tabler icon-tabler-menu-2" fill="none"
                                     height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                  <line x1="4" x2="20" y1="6" y2="6"></line>
                                  <line x1="4" x2="20" y1="12" y2="12"></line>
                                  <line x1="4" x2="20" y1="18" y2="18"></line>
                                </svg>
                              </a>
                            </span>
                            <input v-model="element.options[index]" class="form-control" type="text"/>
                            <span class="input-group-text" style="border: none!important;"
                                  @click.prevent="removeOption(element, index)">
                              <svg class="icon icon-tabler icon-tabler-circle-minus" fill="none"
                                   height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                   viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                               <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                               <circle cx="12" cy="12" r="9"></circle>
                               <line x1="9" x2="15" y1="12" y2="12"></line>
                              </svg>
                            </span>
                            <div v-if="create_consultation_form.errors['data.'+idx+'.options']"
                                 class="text-danger fs-5 mt-2">
                              {{ create_consultation_form.errors['data.' + idx + '.options'][0] }}
                            </div>
                          </div>
                        </div>
                        <div v-if="element.options.length<10" class="col-md-6 mb-2 mt-2 ms-2">
                          <a aria-label="Facebook" class="w-50 text-black" href="#" @click.prevent="addOption(element)">
                            <svg class="icon icon-tabler icon-tabler-plus mx-1" fill="none" height="24"
                                 stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 viewBox="0 0 24 24"
                                 width="24" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                              <line x1="12" x2="12" y1="5" y2="19"></line>
                              <line x1="5" x2="19" y1="12" y2="12"></line>
                            </svg>
                            Add Option
                          </a>
                        </div>
                      </draggable>
                    </div>
                  </div>

                  <div class="col-1 mt-4">
                    <a class="text-black cursor-pointer" @click="removeAt(idx)">
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
              </draggable>
            </div>
            <div class="mt-2 text-center col-12">
              <a aria-label="Facebook" class="btn w-100" href="#" @click.prevent="add">
                <svg class="icon icon-tabler icon-tabler-plus" fill="none" height="24"
                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     viewBox="0 0 24 24"
                     width="24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                  <line x1="12" x2="12" y1="5" y2="19"></line>
                  <line x1="5" x2="19" y1="12" y2="12"></line>
                </svg>
                Add New Form Section
              </a>
            </div>
          </div>

          <div class="card-footer text-end">
            <div class="d-flex">
              <a class="btn btn-outline-secondary ms-auto me-2" @click="reset()">Reset</a>
              <button class="btn btn-primary" type="submit">Create Consultation Form</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import {consultation_form_types} from '@/constants/constants.js';

export default {
  name: "create",
  data() {
    return {
      create_consultation_form: {
        fields: {data: [{type: ''}]},
        error_message: '',
        errors: [],
      },
      types: consultation_form_types,
      dragging: false,
      tag_list: []
    };
  },
  mounted() {
    this.getTagList()
  },
  methods: {
    reset() {
      this.create_consultation_form = {
        fields: {data: [{type: ''}]},
        error_message: '',
        errors: [],
      }
    },
    resetDataField(element, idx) {
      if (element.type === 'SELECT')
        this.create_consultation_form.fields.data.splice(idx, 1, {type: element.type, options: ['']})
      else this.create_consultation_form.fields.data.splice(idx, 1, {type: element.type})
    },
    removeOption(element, index) {
      element.options.splice(index, 1)
    },
    addOption(element) {
      if (element.options.length < 10) element.options.push('')
    },
    async createForm() {
      try {
        this.create_consultation_form.fields.data.forEach(function (data) {
          if (data.type === 'SELECT') data.options = data.options.filter(x => x !== '')
        })
        let form = (await this.$axios.$post('api/admin/consultation-forms', this.create_consultation_form.fields))
        await this.$router.push(`/admin/settings/consultations`)
      } catch (e) {
        this.create_consultation_form.errors = e.response.data.errors ?? []
        this.create_consultation_form.error_message = e.response.data.message
        this.create_consultation_form.fields.data.forEach(function (data) {
          if (data.type === 'SELECT' && data.options.length === 0) data.options.push('')
        })
      }
    },
    async getTagList() {
      try {
        this.tag_list = (await this.$axios.$get('/api/admin/tags')).data.map((x) => ({
          id: x.id,
          name: x.name
        }))
      } catch (e) {
      }
    },
    removeAt(idx) {
      this.create_consultation_form.fields.data.splice(idx, 1);
    },
    add() {
      this.create_consultation_form.fields.data.push({type: '', label: '', is_required: '', options: ['']});
    }
  },
  computed: {
    draggingInfo() {
      return this.dragging ? "under drag" : "";
    }
  },
}
</script>

<style scoped>

</style>
