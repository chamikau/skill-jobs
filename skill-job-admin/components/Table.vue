<!-- Please remove this file from your project -->
<template>
  <div style="display: contents" >
      <div class="card-body border-bottom py-3">
        <div class="d-flex row">
          <div class="text-muted col-sm-6 mb-3 mb-sm-0">
            Show
            <div class="mx-2 d-inline-block">
              <select v-model="table_date.per_page" class="form-control form-control-sm"
                      @change.prevent="perPageUpdate">
                <option selected value="15">15</option>
                <option selected value="50">50</option>
                <option selected value="100">100</option>
                <option selected value="200">200</option>
              </select>
            </div>
            entries
          </div>
<!--          <div class="ms-auto text-muted col-sm-6 d-flex justify-content-sm-end">-->
<!--            Search:-->
<!--            <div class="ms-2 d-inline-block">-->
<!--              <input v-model="table_date.search" placeholder="Search.." class="form-control form-control-sm"-->
<!--                     type="text"-->
<!--                     autocomplete="off"-->
<!--                     @keyup="searchUpdate"-->
<!--              >-->
<!--            </div>-->
<!--            <div class="btn-group">-->
<!--              <button aria-expanded="false" class="btn btn-sm btn-outline btn-icon" data-bs-toggle="dropdown" href="#"-->
<!--                      type="button">-->
<!--                &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/brand-facebook &ndash;&gt;-->
<!--                <svg class="icon icon-tabler icon-tabler-download" fill="none" height="24"-->
<!--                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                     viewBox="0 0 24 24"-->
<!--                     width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                  <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>-->
<!--                  <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>-->
<!--                  <polyline points="7 11 12 16 17 11"></polyline>-->
<!--                  <line x1="12" x2="12" y1="4" y2="16"></line>-->
<!--                </svg>-->
<!--              </button>-->
<!--              <ul class="dropdown-menu">-->
<!--                <li><a class="dropdown-item" href="#" @click.prevent="download('csv')">Download CSV</a></li>-->
<!--                <li><a class="dropdown-item" href="#" @click.prevent="download('xls')">Download XLS</a></li>-->
<!--                <li><a class="dropdown-item" href="#" @click.prevent="download('xml')">Download XML</a></li>-->
<!--              </ul>-->
<!--            </div>-->
<!--          </div>-->
        </div>
      </div>
      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable d-none d-md-table">
          <thead>
          <tr>
<!--            <th class="w-1"><input aria-label="Select all invoices" class="form-check-input m-0 align-middle"-->
<!--                                   type="checkbox"></th>-->
            <th v-for="label in attributes.labels">
              <div v-if="label.sort" role="button" @click.prevent="sortChange(label.key)">
                {{ label.name }}
<!--                <svg v-if="table_date.sort.key===label.key && table_date.sort.direction===false"-->
<!--                     class="icon icon-tabler icon-tabler-sort-ascending" fill="none" height="24"-->
<!--                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                     viewBox="0 0 24 24"-->
<!--                     width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                  <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>-->
<!--                  <line x1="4" x2="11" y1="6" y2="6"></line>-->
<!--                  <line x1="4" x2="11" y1="12" y2="12"></line>-->
<!--                  <line x1="4" x2="13" y1="18" y2="18"></line>-->
<!--                  <polyline points="15 9 18 6 21 9"></polyline>-->
<!--                  <line x1="18" x2="18" y1="6" y2="18"></line>-->
<!--                </svg>-->
<!--                <svg v-else-if="table_date.sort.key===label.key && table_date.sort.direction===true"-->
<!--                     class="icon icon-tabler icon-tabler-sort-descending" fill="none" height="24"-->
<!--                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                     viewBox="0 0 24 24"-->
<!--                     width="24" xmlns="http://www.w3.org/2000/svg">-->
<!--                  <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>-->
<!--                  <line x1="4" x2="13" y1="6" y2="6"></line>-->
<!--                  <line x1="4" x2="11" y1="12" y2="12"></line>-->
<!--                  <line x1="4" x2="11" y1="18" y2="18"></line>-->
<!--                  <polyline points="15 15 18 18 21 15"></polyline>-->
<!--                  <line x1="18" x2="18" y1="6" y2="18"></line>-->
<!--                </svg>-->
              </div>
              <div v-else>{{ label.name }}</div>
            </th>
          </tr>
          </thead>
          <tbody>
          <tr v-if="attributes.loading">
            <td class="text-center" colspan="100%">Loading.. {{attributes.api_response.data}}</td>
          </tr>
          <tr v-if="Array.isArray(attributes.api_response.data) && !attributes.api_response.data.length">
            <td class="text-center" colspan="100%">No records available</td>
          </tr>
          <tr v-for="record in attributes.api_response.data" v-else>
<!--            <td class="w-1"><input aria-label="Select all invoices" class="form-check-input m-0 align-middle"-->
<!--                                   type="checkbox"></td>-->
            <td v-for="label in attributes.labels">
              <slot :name="label.key" :record="record">{{ record[label.key] }}</slot>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="d-md-none p-3">
        <div class="row">
          <div v-if="attributes.loading">Loading.. {{attributes.api_response.data}}</div>
          <div v-if="Array.isArray(attributes.api_response.data) && !attributes.api_response.data.length">
            No records available
          </div>
          <div v-for="record in attributes.api_response.data" v-else class="col-sm-6">
            <div class="p-3 mb-3 pb-1" style="background-color: #f0f0f178; border-radius: 4%">
              <div v-for="label in attributes.labels" class="">
                <span class="fw-bold mb-2">{{ label.name }}</span> <br />
                <slot :name="label.key" :record="record">{{ record[label.key] }}</slot>
              </div>
              <hr />
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex align-items-center row mx-2">
        <p class="m-0 text-muted col-sm-6 mb-2 mb-sm-0">Showing
          <span>{{ attributes.api_response.from }}</span> to <span>{{ attributes.api_response.to }}
                  </span> of <span>{{ attributes.api_response.total }}</span> entries</p>
        <ul class="pagination m-0 ms-auto col-sm-6 d-flex justify-content-sm-end">
          <li :class="[(attributes.api_response.current_page<=1)?'disabled' : '']" class="page-item">
            <a aria-disabled="true" class="page-link" href="#" tabindex="-1"
               @click.prevent="pageChange(attributes.api_response.current_page-1)">
              <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
              <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                   stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                   xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                <polyline points="15 6 9 12 15 18"></polyline>
              </svg>
              prev
            </a>
          </li>
          <li
            v-for="paginate_item in paginationGenerator(attributes.api_response.current_page, Math.ceil(attributes.api_response.total / attributes.api_response.per_page))"
            :class="[(attributes.api_response.current_page===paginate_item?'active' : '')]"
            class="page-item">
            <a v-if="!isNaN(paginate_item)" class="page-link" href="#" @click.prevent="pageChange(paginate_item)"
            >{{ paginate_item }}</a>
            <p v-else class="page-link">{{ paginate_item }}</p>
          </li>
          <li
            :class="[(attributes.api_response.current_page>=Math.ceil(attributes.api_response.total / attributes.api_response.per_page))?'disabled' : '']"
            class="page-item">
            <a class="page-link" href="#" @click.prevent="pageChange(attributes.api_response.current_page+1)">
              next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
              <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                   stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                   xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                <polyline points="9 6 15 12 9 18"></polyline>
              </svg>
            </a>
          </li>
        </ul>
      </div>
  </div>
</template>

<script>
import exportFromJSON from 'export-from-json'

export default {
  name: 'NuxtTutorial',
  props: ['attributes'],
  data() {
    return {
      table_date: {
        sort: {key: '', direction: false, sort_input: ''},
        per_page: 15,
        search: '',
        page: 1,
        pagination_array: []
      }

    }
  },
  mounted() {
    if (localStorage.getItem(this.attributes.table_id)) {
      this.table_date = JSON.parse(localStorage.getItem(this.attributes.table_id));
    }
    this.inputUpdates()
  },
  methods: {
    inputUpdates() {
      this.cacheInput()
      this.$emit('inputUpdates', this.table_date)
    },
    searchUpdate() {
      this.table_date.page = 1
      this.$emit('searchUpdate', this.table_date.search)
      this.inputUpdates()
    },
    perPageUpdate() {
      this.table_date.page = 1
      this.$emit('perPageUpdate', this.table_date.per_page)
      this.inputUpdates()
    },
    sortChange(key) {
      if (this.table_date.sort.key === key) {
        this.table_date.sort.direction = !this.table_date.sort.direction
      } else {
        this.table_date.sort.key = key;
        this.table_date.sort.direction = true
      }

      let sort_direction = ((this.table_date.sort.direction) ? '-' : '') + this.table_date.sort.key
      this.table_date.sort.sort_input = sort_direction;
      this.$emit('sortChange', sort_direction)
      this.inputUpdates()
    },
    pageChange(page) {
      this.table_date.page = page;
      this.$emit('pageChange', page)
      this.inputUpdates()
    },
    cacheInput() {
      if (this.attributes.cache)
        localStorage.setItem(this.attributes.table_id, JSON.stringify(this.table_date))
      else
        localStorage.removeItem(this.attributes.table_id)
    },
    paginationGenerator(count, total_pages) {
      var current = count,
        last = total_pages,
        delta = 2,
        left = current - delta,
        right = current + delta + 1,
        range = [],
        rangeWithDots = [],
        l;

      for (let i = 1; i <= last; i++) {
        if (i == 1 || i == last || i >= left && i < right) {
          range.push(i);
        }
      }

      for (let i of range) {
        if (l) {
          if (i - l === 2) {
            rangeWithDots.push(l + 1);
          } else if (i - l !== 1) {
            rangeWithDots.push('...');
          }
        }
        rangeWithDots.push(i);
        l = i;
      }

      return rangeWithDots;
    },
    download(type) {
      const data = this.attributes.api_response.data
      const fileName = this.attributes.table_id
      let exportType = exportFromJSON.types.txt
      switch (type) {
        case 'csv':
          exportType = exportFromJSON.types.csv
          exportFromJSON({data, fileName, exportType})
          break
        case 'xls' :
          exportType = exportFromJSON.types.xls
          exportFromJSON({data, fileName, exportType})
          break
        case 'xml' :
          exportType = exportFromJSON.types.xml
          exportFromJSON({data, fileName, exportType})
          break
      }
    }
  }
}
</script>
