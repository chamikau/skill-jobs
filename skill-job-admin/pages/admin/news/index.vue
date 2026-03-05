<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a>News</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col d-flex align-items-center">
            <span class="fw-bold fs-1">News</span>
          </div>
          <div class="card">
            <div class="card-body"><h3 class="card-title">Filters</h3>
              <div class="row test-1">
                <div class="col-md-4">
                  <lable class="form-label">News Headline</lable>
                  <input
                    v-model="attributes.filters['filter[headline]']"
                    @keyup="filterUpdates"
                    type="text"
                    class="form-control"
                    placeholder="Search news headline">
                </div>
                <div class="col-md-4">
                  <lable class="form-label">News Type</lable>
                  <Select
                    :attributes="NewsAttributes"
                    placeholder="Select news type"
                    @queryUpdates="getNewsTypes"
                    @selectUpdates="selectNews"
                  />
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <div class="d-flex">
                <a
                  class="btn btn-outline-secondary ms-auto"
                  @click="filterClear()">Reset</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header row">
                <div class="col mt-md-0 mt-2">
                  <h3 class="card-title">
                    News List
                  </h3>
                </div>
                <div class="col-md-auto ms-auto d-print-none">
                  <div class="btn-list">
                    <NuxtLink class="btn btn-primary" to="/admin/news/create-news/general">
                      <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                           xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                        <line x1="12" x2="12" y1="5" y2="19"/>
                        <line x1="5" x2="19" y1="12" y2="12"/>
                      </svg>
                      Create News
                    </NuxtLink>
                  </div>
                </div>
              </div>
              <div class="contents">
                <Table :attributes="attributes" @inputUpdates="inputUpdates">
                  <template v-slot:news_type_name="props">
                    {{props.record.news_category_type.name}}
                  </template>
                  <template v-slot:headline="props">
                    <span v-if="props.record.headline.length >= 35">
                    {{props.record.headline.slice(0,35) + '...'}}
                    </span>
                    <span v-else>
                    {{props.record.headline}}
                    </span>
                  </template>
<!--                  <template v-slot:content="props">-->
<!--                    <span v-if="props.record.content.length <= 20">-->
<!--                    {{props.record.content}}-->
<!--                    </span>-->
<!--                    <span v-if="props.record.content.length > 20">-->
<!--                    {{props.record.content.slice(0,20) + '...'}}-->
<!--                    </span>-->
<!--                  </template>-->
                  <template v-slot:action="props">
                    <button
                      data-bs-placement="bottom" data-bs-toggle="tooltip" title="Edit"
                      @click.stop="goToViewDetails(props)" class="btn btn-sm btn-icon" aria-label="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                           class="bi bi-pencil-square text-black" viewBox="0 0 16 16">
                        <path
                          d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd"
                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                    </button>
                  </template>
                </Table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>


export default {
  name: "News",
  layout: 'dashboard-admin',
  data() {
    return {
      content:'',
      News: "",
      filters: {},
      attributes: {
        table_id: 'News_table',
        cache: false,
        loading: false,
        labels: [
          {key: 'headline', name: 'Headline', sort: true},
          {key: 'news_type_name', name: 'News Type', sort: true},
          // {key: 'content', name: 'Content', sort: true},
          {key: 'action', name: 'Action'},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      },
      NewsAttributes: {
        data: [],
        selected: {}
      },
    }
  },
  mounted() {
    this.getNews();
    this.getNewsTypes()
  },
  methods: {
    async goToViewDetails(props) {
      await this.$router.push(`/admin/news/edit-news/${props.record.id}/general`)
    },
    async getNews(page = 1, sort = '', search = '', per_page = 15,) {
      try {
        this.attributes.api_response = await this.$axios.$get('/api/admin/news',
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
        this.data = this.attributes.api_response;
        this.News = this.data
      } catch (error) {
        return error;
      }
    },
    async getNewsTypes(query = '') {
      try {
        let attributes = await this.$axios.$get('/api/admin/news-types',{params:{'filter[search]':query}});
        this.NewsAttributes.data = attributes.data.map((x) => ({
          name: `${x.name}`,
          value: x.id
        }));
      } catch (error) {
        return error;
      }
    },
    selectNews() {
      this.attributes.filters['filter[category_id]'] = this.NewsAttributes.selected.value;
      this.filterUpdates()
    },
    inputUpdates(values) {
      this.attributes.table_component_values = values;
      this.getNews(values.page, values.sort.sort_input, values.search, values.per_page)
    },
    filterUpdates() {
      const values = this.attributes.table_component_values
      this.getNews(1, values.sort.sort_input, values.search, values.per_page)
    },
    filterClear() {
      this.attributes.filters = {}
      this.NewsAttributes.selected =  "";
      this.getNews()
    }
  },

}
</script>

<style scoped>
.breadcrumb {
  list-style: none;
  padding: 0;
  margin: 0;
}

.breadcrumb li {
  display: inline;
  color: #888;
}

.breadcrumb li:not(:last-child)::after {
  content: ">";
  margin-left: 0.7rem;
  margin-right: 0.7rem;
  color: #888;
}

.breadcrumb li:last-child {
  color: #888;
}
</style>
