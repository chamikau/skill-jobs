<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a href="#" @click="$router.back()">News</a></li>
          <li><a>News Details</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">News Details</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
        <form @submit.prevent="registerForEvent">
            <div class="card">
                <div class="card-body">
                  <div class="align-items-center">
                    <div class="row">
                      <div class="col-md-4">
                        <div v-for="document in news.documents" class="col-auto">
                          <FileNewsIdView
                            :document='document'
                          />
                        </div>
                      </div>
                      <div class="col-md-8">
                      <span class="fs-2 fw-bold">
                        {{ news.headline }}
                      </span>
                        <div class="mt-3" v-html="news.content">
                        </div>
                      </div>
                    </div>
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
  name: "application",
  layout: 'dashboard-user',
  data(){
    return{
      news:{
        headline:'',
        news_category_type:{
          name:''
        }
      },
      create_news_form:{
        fields:{}
      }
    }

  },
  mounted() {
    this.getEvents()
  },
  methods:{
    async registerForEvent() {
      this.create_news_form.fields.news_id = `${this.$route.params.id}`
      try {
        let news = await this.$axios.$post(`api/student/enrol-news`, this.create_news_form.fields)
        await this.$router.back();
      } catch (e) {
      }
    },

    async getEvents() {
      try {
        this.news = (await this.$axios.$get(`/api/student/news/${this.$route.params.id}`)).data;
      } catch (error) {
        return error;
      }
    },
  }
}
</script>

<style scoped>
.text-style-headline{
  color: #1a202c;
  font-weight: bold;
}
.text-style-content{
  color: #4e545e;
  font-weight: bold;
}
.news-category-type{
  color: #0a66c2;
  font-weight: bold;
}
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
