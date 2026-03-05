<template>
  <div class="page">
    <div class="container-xl">
        <div class="page-header d-print-none">
          <ul class="breadcrumb mb-1">
            <li><a>News</a></li>
          </ul>
          <div  class="col d-flex align-items-center mb-2">
            <span class="fw-bold fs-1">News</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="">
              <div v-for="news in news.slice(0, Math.ceil(news.length/3))" class="card mb-3 card-height">
                <div class="card-body cursor-pointer" @click="goToNews(news.id)">
                  <div class="row">
                    <div class="col-md-12">
<!--                        <img src="~/assets/images/no-image.jpg" alt="Description of the image">-->
                      <div v-for="document in news.documents" class="col-auto">
                        <FileView
                          :document='document'
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mt-2">
                      <div>
                        <span v-if="news.headline.length > 80" class="fs-4 fw-bold">
                          {{ news.headline.slice(0, 80) }}
                          <a href="" class="a-text-color">Read more...</a>
                        </span>
                        <span v-else class="fs-4 fw-bold">
                         {{ news.headline }}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="">
              <div v-for="news in news.slice(Math.ceil(news.length/3), Math.ceil((news.length/3)*2))" class="card mb-3 card-height">
                <div class="card-body cursor-pointer" @click="goToNews(news.id)">
                  <div class="row">
                    <div class="col-md-12">
<!--                      <img src="~/assets/images/no-image.jpg" alt="Description of the image">-->
                      <div v-for="document in news.documents" class="col-auto">
                        <FileView
                          :document='document'
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mt-2">
                      <div>
                        <span v-if="news.headline.length > 80" class="fs-4 fw-bold">
                          {{ news.headline.slice(0, 80) }}
                          <a href="" class="a-text-color">Read more...</a>
                        </span>
                        <span v-else class="fs-4 fw-bold">
                         {{ news.headline }}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="">
              <div v-for="news in news.slice(Math.ceil((news.length/3)*2))" class="card mb-3 card-height">
                <div class="card-body cursor-pointer" @click="goToNews(news.id)">
                  <div class="row">
                    <div class="col-md-12">
<!--                      <img src="~/assets/images/no-image.jpg" alt="Description of the image">-->
                      <div v-for="document in news.documents" class="col-auto">
                        <FileView
                          :document='document'
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mt-2">
                      <div>
                        <span v-if="news.headline.length > 80" class="fs-4 fw-bold">
                          {{ news.headline.slice(0, 80) }}
                          <a href="" class="a-text-color">Read more...</a>
                        </span>
                        <span v-else class="fs-4 fw-bold">
                         {{ news.headline }}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <p v-if="news.length === 0" class="title fs-3 text-center">No records available</p>
        </div>
      </div>
  </div>
</template>

<script>


export default {
  name: "news",
  layout: 'dashboard-user',
  data() {
    return {
      news: '',
      length:0,
      filters: {},
    }
  },
  mounted() {
    this.getNews();
  },
  methods: {
    async goToNews(id) {
      await this.$router.push(`/user/news/${id}/application`)
    },
    async getNews() {
      try {
        const response = await this.$axios.$get('/api/student/news');
        this.news_data = response.news || [];
        this.news = this.news_data.data
        console.log(this.news);
      } catch (error) {
        console.error(error); // Use console.error for better error visibility
      }
    }
  }
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
.a-text-color{
  color: #8D80D1 !important
}
.card-height {
  height: 285px;
}
</style>
