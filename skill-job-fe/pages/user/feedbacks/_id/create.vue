<template>
  <div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a >Feedback</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">Feedback</span>
<!--              <span class="font-weight-normal">{{$auth.user.first_name}} {{$auth.user.last_name}}</span>-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="">
      <div class="container-xl">
        <form @submit.prevent="createFeedbackData" ref="create_organization">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <label
                    :class="[create_feedback_form.errors.number_of_rating ? 'text-danger' : '']"
                    class="form-label mt-2">How Likely are you to recommend Moxybase to a friend or colleague?</label>
                  <div class="mt-3">
                    <label class="circle-radio mx-1"
                           :class="[create_feedback_form.errors.number_of_rating ? 'is-invalid' : '']">
                      <input v-model="create_feedback_form.fields.number_of_rating"
                             type="radio" class="form-check-input" name="form-stars" value="1" checked=""
                             @input="clearValidationRateError">
                      <span class="circle">1</span>
                    </label>
                    <label class="circle-radio mx-1"
                           :class="[create_feedback_form.errors.number_of_rating ? 'is-invalid' : '']">
                      <input v-model="create_feedback_form.fields.number_of_rating"
                             type="radio" class="form-check-input" name="form-stars" value="2"
                             @input="clearValidationRateError">
                      <span class="circle">2</span>
                    </label>
                    <label class="circle-radio mx-1"
                           :class="[create_feedback_form.errors.number_of_rating ? 'is-invalid' : '']">
                      <input v-model="create_feedback_form.fields.number_of_rating"
                             type="radio" class="form-check-input" name="form-stars" value="3"
                             @input="clearValidationRateError">
                      <span class="circle">3</span>
                    </label>
                    <label class="circle-radio mx-1"
                           :class="[create_feedback_form.errors.number_of_rating ? 'is-invalid' : '']">
                      <input  v-model="create_feedback_form.number_of_rating"
                              type="radio" class="form-check-input fa fa-star " name="form-stars" value="4">
                      <span class="circle">4</span>
                    </label>
                    <label class="circle-radio mx-1"
                           :class="[create_feedback_form.errors.number_of_rating ? 'is-invalid' : '']">
                      <input v-model="create_feedback_form.fields.number_of_rating"
                             type="radio" class="form-check-input circle" name="form-stars" value="5"
                             @input="clearValidationRateError">
                      <span class="circle">5</span>
                    </label>
                    <label class="circle-radio mx-1"
                           :class="[create_feedback_form.errors.number_of_rating ? 'is-invalid' : '']">
                      <input v-model="create_feedback_form.fields.number_of_rating"
                             type="radio" class="form-check-input" name="form-stars" value="6"
                             @input="clearValidationRateError">
                      <span class="circle">6</span>
                    </label>
                    <label class="circle-radio mx-1"
                           :class="[create_feedback_form.errors.number_of_rating ? 'is-invalid' : '']">
                      <input v-model="create_feedback_form.fields.number_of_rating"
                             type="radio" class="form-check-input" name="form-stars" value="7"
                             @input="clearValidationRateError">
                      <span class="circle">7</span>
                    </label>
                    <label class="circle-radio mx-1"
                           :class="[create_feedback_form.errors.number_of_rating ? 'is-invalid' : '']">
                      <input v-model="create_feedback_form.fields.number_of_rating"
                             type="radio" class="form-check-input" name="form-stars" value="8"
                             @input="clearValidationRateError">
                      <span class="circle">8</span>
                    </label>
                    <label class="circle-radio mx-1"
                           :class="[create_feedback_form.errors.number_of_rating ? 'is-invalid' : '']">
                      <input v-model="create_feedback_form.fields.number_of_rating"
                             type="radio" class="form-check-input fa fa-star " name="form-stars" value="9"
                             @input="clearValidationRateError">
                      <span class="circle">9</span>
                    </label>
                    <label class="circle-radio mx-1"
                           :class="[create_feedback_form.errors.number_of_rating ? 'is-invalid' : '']">
                      <input v-model="create_feedback_form.fields.number_of_rating"
                             type="radio" class="form-check-input circle" name="form-stars" value="10"
                             @input="clearValidationRateError">
                      <span class="circle">10</span>
                    </label>
                    <div v-if="create_feedback_form.errors.number_of_rating" class="invalid-feedback">
                      {{ create_feedback_form.errors.number_of_rating[0] }}
                    </div>
                  </div>
                  <div class="mt-4">
                    <label
                      :class="[create_feedback_form.errors.message ? 'text-danger' : '']"
                      class="form-label mb-3">What feature can we add to improve ?</label>
                    <textarea
                      v-model="create_feedback_form.fields.message"
                      :class="[create_feedback_form.errors.message ? 'is-invalid' : '']"
                      type="text" class="form-control change-size" placeholder="We'd love to hear your suggestions"
                      @input="clearValidationMessageError">
                    </textarea>
                    <div v-if="create_feedback_form.errors.message" class="invalid-feedback">
                      {{ create_feedback_form.errors.message[0] }}
                    </div>
                  </div>
                  <div class="col-md-12 mt-3">
                    <div class="card-footer text-end">
                      <div class="d-flex">
                        <button class="btn btn-primary ms-auto me-2" type="submit">Send Feedback</button>
                      </div>
                    </div>
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
  name: "create",
  layout: 'dashboard-user',

  data(){
    return {
      create_feedback_form: {
        fields: {
          number_of_rating:''
        },
        error_message: '',
        errors: [],
        location_type: ""
      },

    }
  },
  components: {
  },
  mounted(){},
  methods:{
    clearValidationRateError() {
      this.create_feedback_form.errors.number_of_rating = false;
    },
    clearValidationMessageError() {
      this.create_feedback_form.errors.message = false;
    },
    async createFeedbackData() {
      try {
        let feedback = await this.$axios.$post(`api/student/feedbacks`, this.create_feedback_form.fields)
        this.$toast.success('Saved successfully!')
        await this.$router.push('/user/dashboard');
      } catch (e) {
        this.$errorToast('Error: Invalid Form Submission')
        this.create_feedback_form.errors = e.response.data.errors
        this.create_feedback_form.error_message = e.response.data.message
      }
    },
    async reset() {
      this.create_feedback_form.fields = ""
    }
  },
}
</script>

<style scoped>
.circle-radio .circle {
  width: 40px;
  height: 40px;
  background-color: #D8C7FF;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 16px;
  font-weight: bold;
  color: black ;
  border:#D8C7FF;
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
.change-size{
  height: 160px;
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
