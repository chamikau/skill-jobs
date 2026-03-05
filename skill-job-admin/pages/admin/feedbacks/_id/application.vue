<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a href="#" @click.prevent="backToPage">Feedbacks</a></li>
          <li><a>Feedback Details</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">Feedbacks</span>
              <span class="ms-2 mx-2 bold"  style="font-size: 2rem;"> - </span>
              <span class="fw-bold fs-1">{{ student.first_name + " " + student.last_name }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <div>
                    <h2>
                      Student Details
                    </h2>
                  </div>
                  <div class="">
                    <label for="">Name</label>
                    <h4 class="">{{ student.first_name + " " + student.last_name }}</h4>
                  </div>
                  <div class="">
                    <label for="">Email</label>
                    <h4 class="">{{ student.email }}</h4>
                  </div>
                  <div class="">
                    <label for="">Phone</label>
                    <h4 class="">{{ student.phone_number_1 }}</h4>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <div class="card-body">
                  <div>
                    <h2>
                      Feedback Details
                    </h2>
                  </div>
                  <div class="">
                    <label for="">Feedback</label>
                    <h4 class="mt-2">{{ feedback.message }}</h4>
                  </div>
                  <div class="">
                    <label for="">Feedback Rate</label>
                    <div class="mb-3 mt-3">
                      <label class="circle-radio mx-1">
                        <input v-model="feedback.number_of_rating"
                               type="radio" class="form-check-input" name="form-stars" value="1" checked="" disabled>
                        <span class="circle">1</span>
                      </label>
                      <label class="circle-radio mx-1">
                        <input v-model="feedback.number_of_rating"
                               type="radio" class="form-check-input" name="form-stars" value="2" disabled>
                        <span class="circle">2</span>
                      </label>
                      <label class="circle-radio mx-1">
                        <input v-model="feedback.number_of_rating"
                               type="radio" class="form-check-input" name="form-stars" value="3" disabled>
                        <span class="circle">3</span>
                      </label>
                      <label class="circle-radio mx-1">
                        <input v-model="feedback.number_of_rating"
                               type="radio" class="form-check-input fa fa-star " name="form-stars" value="4" disabled>
                        <span class="circle">4</span>
                      </label>
                      <label class="circle-radio mx-1">
                        <input  v-model="feedback.number_of_rating"
                               type="radio" class="form-check-input circle" name="form-stars" value="5" disabled>
                        <span class="circle">5</span>
                      </label>
                      <label class="circle-radio mx-1">
                        <input v-model="feedback.number_of_rating"
                               type="radio" class="form-check-input" name="form-stars" value="6" disabled>
                        <span class="circle">6</span>
                      </label>
                      <label class="circle-radio mx-1">
                        <input  v-model="feedback.number_of_rating"
                                type="radio" class="form-check-input" name="form-stars" value="7" disabled>
                        <span class="circle">7</span>
                      </label>
                      <label class="circle-radio mx-1">
                        <input v-model="feedback.number_of_rating"
                               type="radio" class="form-check-input" name="form-stars" value="8" disabled>
                        <span class="circle">8</span>
                      </label>
                      <label class="circle-radio mx-1">
                        <input v-model="feedback.number_of_rating"
                               type="radio" class="form-check-input fa fa-star " name="form-stars" value="9" disabled>
                        <span class="circle">9</span>
                      </label>
                      <label class="circle-radio mx-1">
                        <input v-model="feedback.number_of_rating"
                               type="radio" class="form-check-input circle" name="form-stars" value="10" disabled>
                        <span class="circle">10</span>
                      </label>
                    </div>
                  </div>
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
  name: "application",
  layout: 'dashboard-admin',

  data(){
    return {
      feedback:{},
      student:{}
    }
  },
  mounted(){
    this.getFeedbacks();
  },
  methods:{
    async getFeedbacks() {
      this.feedback = (await this.$axios.$get(`/api/admin/feedbacks/${this.$route.params.id}`)).data
      this.student = this.feedback.student
    },
    backToPage(){
      this.$router.push(`/admin/feedbacks`);
    },
  },
}
</script>

<style scoped>
.circle-radio .circle {
  width: 40px;
  height: 40px;
  background-color: #D8C7FF;
  border-radius: 50%;
  border:#D8C7FF;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 16px;
  font-weight: bold;
  color: black ;
}
.circle-radio {
  position: relative;
  display: inline-block;
  cursor: pointer;
  margin-right: 10px;
}

.circle-radio input[type="radio"] {
  display: none;
}

.circle-radio input[type="radio"]:checked + .circle {
  background-color: #6F5BD9;
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
