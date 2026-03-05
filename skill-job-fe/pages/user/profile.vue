<template>
  <div>
    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <ul class="breadcrumb mb-1">
          <li><a>Profile & Account</a></li>
          <li v-if="handleGeneral"><a>General Details</a></li>
          <li v-if="handlePassword"><a>Change Password</a></li>
          <li v-if="handleEducational"><a>Educational Details</a></li>
          <li v-if="handleProjects"><a>Projects</a></li>
          <li v-if="handleCertification"><a>Certifications</a></li>
          <li v-if="handleWork"><a>Work Experience</a></li>
          <li v-if="handleSkills"><a>Skills and Hobbies</a></li>
        </ul>
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center">
              <span class="fw-bold fs-1">Profile & Account</span>
              <span class="ms-2 mx-2 bold"  style="font-size: 2rem;"> - </span>
              <span class="fw-bold fs-1">{{$auth.user.first_name}} {{$auth.user.last_name}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-body">
      <div class="container-xl">
        <div class="row">
          <div class="col-md-3 mb-3 mb-md-0">
            <div class="card">
              <div class="list-group list-group-flush" data-bs-toggle="tabs">
                <NuxtLink class="list-group-item list-group-item-action" to="/user/profile/general" @click.native="handleGeneralClick()">
                   <span>
                        <svg class="icon icon-tabler icon-tabler-user mx-1" fill="none" height="24"
                             stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             viewBox="0 0 24 24"
                             width="24" xmlns="http://www.w3.org/2000/svg">
                             <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                             <circle cx="12" cy="7" r="4"></circle>
                             <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        </svg>
                     </span>
                  General Details
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/user/profile/password" @click.native="handlePasswordClick()">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-open mx-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                       <circle cx="12" cy="16" r="1"></circle>
                       <path d="M8 11v-5a4 4 0 0 1 8 0"></path>
                    </svg>
                  </span>
                  Change Password
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/user/profile/educations" @click.native="handleEducationalClick()">
                  <span class="mx-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none">
                      <path d="M10.6364 4.82727V3.43636C11.0864 3.24545 11.5466 3.10227 12.017 3.00682C12.4875 2.91136 12.9818 2.86364 13.5 2.86364C13.8545 2.86364 14.2023 2.89091 14.5432 2.94545C14.8841 3 15.2182 3.06818 15.5455 3.15V4.45909C15.2182 4.33636 14.8875 4.24432 14.5534 4.18295C14.2193 4.12159 13.8682 4.09091 13.5 4.09091C12.9818 4.09091 12.4841 4.15568 12.0068 4.28523C11.5295 4.41477 11.0727 4.59545 10.6364 4.82727ZM10.6364 9.32727V7.93636C11.0864 7.74545 11.5466 7.60227 12.017 7.50682C12.4875 7.41136 12.9818 7.36364 13.5 7.36364C13.8545 7.36364 14.2023 7.39091 14.5432 7.44545C14.8841 7.5 15.2182 7.56818 15.5455 7.65V8.95909C15.2182 8.83636 14.8875 8.74432 14.5534 8.68295C14.2193 8.62159 13.8682 8.59091 13.5 8.59091C12.9818 8.59091 12.4841 8.65227 12.0068 8.775C11.5295 8.89773 11.0727 9.08182 10.6364 9.32727ZM10.6364 7.07727V5.68636C11.0864 5.49545 11.5466 5.35227 12.017 5.25682C12.4875 5.16136 12.9818 5.11364 13.5 5.11364C13.8545 5.11364 14.2023 5.14091 14.5432 5.19545C14.8841 5.25 15.2182 5.31818 15.5455 5.4V6.70909C15.2182 6.58636 14.8875 6.49432 14.5534 6.43295C14.2193 6.37159 13.8682 6.34091 13.5 6.34091C12.9818 6.34091 12.4841 6.40568 12.0068 6.53523C11.5295 6.66477 11.0727 6.84545 10.6364 7.07727ZM4.5 9.81818C5.14091 9.81818 5.76477 9.88977 6.37159 10.033C6.97841 10.1761 7.58182 10.3909 8.18182 10.6773V2.61818C7.62273 2.29091 7.02955 2.04545 6.40227 1.88182C5.775 1.71818 5.14091 1.63636 4.5 1.63636C4.00909 1.63636 3.52159 1.68409 3.0375 1.77955C2.55341 1.875 2.08636 2.01818 1.63636 2.20909V10.3091C2.11364 10.1455 2.5875 10.0227 3.05795 9.94091C3.52841 9.85909 4.00909 9.81818 4.5 9.81818ZM9.81818 10.6773C10.4182 10.3909 11.0216 10.1761 11.6284 10.033C12.2352 9.88977 12.8591 9.81818 13.5 9.81818C13.9909 9.81818 14.4716 9.85909 14.942 9.94091C15.4125 10.0227 15.8864 10.1455 16.3636 10.3091V2.20909C15.9136 2.01818 15.4466 1.875 14.9625 1.77955C14.4784 1.68409 13.9909 1.63636 13.5 1.63636C12.8591 1.63636 12.225 1.71818 11.5977 1.88182C10.9705 2.04545 10.3773 2.29091 9.81818 2.61818V10.6773ZM9 13.0909C8.34545 12.5727 7.63636 12.1705 6.87273 11.8841C6.10909 11.5977 5.31818 11.4545 4.5 11.4545C3.92727 11.4545 3.36477 11.5295 2.8125 11.6795C2.26023 11.8295 1.73182 12.0409 1.22727 12.3136C0.940909 12.4636 0.664773 12.4568 0.398864 12.2932C0.132955 12.1295 0 11.8909 0 11.5773V1.71818C0 1.56818 0.0375 1.425 0.1125 1.28864C0.1875 1.15227 0.3 1.05 0.45 0.981818C1.07727 0.654545 1.73182 0.409091 2.41364 0.245455C3.09545 0.0818182 3.79091 0 4.5 0C5.29091 0 6.06477 0.102273 6.82159 0.306818C7.57841 0.511364 8.30455 0.818182 9 1.22727C9.69545 0.818182 10.4216 0.511364 11.1784 0.306818C11.9352 0.102273 12.7091 0 13.5 0C14.2091 0 14.9045 0.0818182 15.5864 0.245455C16.2682 0.409091 16.9227 0.654545 17.55 0.981818C17.7 1.05 17.8125 1.15227 17.8875 1.28864C17.9625 1.425 18 1.56818 18 1.71818V11.5773C18 11.8909 17.867 12.1295 17.6011 12.2932C17.3352 12.4568 17.0591 12.4636 16.7727 12.3136C16.2682 12.0409 15.7398 11.8295 15.1875 11.6795C14.6352 11.5295 14.0727 11.4545 13.5 11.4545C12.6818 11.4545 11.8909 11.5977 11.1273 11.8841C10.3636 12.1705 9.65455 12.5727 9 13.0909Z" fill="#292929"/>
                      </svg>
                  </span>
                  Educational Details
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/user/profile/projects" @click.native="handleProjectsClick()">
                  <span class="mx-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-align-box-bottom-center" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                     <path d="M9 15v2"></path>
                     <path d="M12 11v6"></path>
                     <path d="M15 13v4"></path>
                  </svg>
                  </span>
                  Projects
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/user/profile/certification" @click.native="handleCertificationClick()">
                  <span class="mx-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                      <path d="M9.77778 16L11.5556 15.1111L13.3333 16V9.77778H9.77778M16 0H1.77778C1.30628 0 0.854097 0.187301 0.520699 0.520699C0.187301 0.854097 0 1.30628 0 1.77778V10.6667C0 11.1382 0.187301 11.5903 0.520699 11.9237C0.854097 12.2571 1.30628 12.4444 1.77778 12.4444H8V10.6667H1.77778V1.77778H16V10.6667H15.1111V12.4444H16C16.4715 12.4444 16.9237 12.2571 17.2571 11.9237C17.5905 11.5903 17.7778 11.1382 17.7778 10.6667V1.77778C17.7778 1.30628 17.5905 0.854097 17.2571 0.520699C16.9237 0.187301 16.4715 0 16 0ZM8 4H2.66667V3H8M6.22222 6H2.66667V5H6.22222M8 8H2.66667V7H8V8Z" fill="#292929"/>
                      </svg>
                  </span>
                  Certifications
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/user/profile/work-experiences" @click.native="handleWorkClick()">
                  <span class="mx-1">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21" height="16" viewBox="0 0 21 16" fill="none">
                  <mask id="mask0_134_2428" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="21" height="16">
                  <rect width="20.6869" height="16" fill="url(#pattern0)"/>
                  </mask>
                  <g mask="url(#mask0_134_2428)">
                  <rect width="20.6869" height="15.8788" fill="#292929"/>
                  </g>
                  <defs>
                  <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                  <use xlink:href="#image0_134_2428" transform="matrix(0.00195312 0 0 0.00252525 0 -0.143939)"/>
                  </pattern>
                  <image id="image0_134_2428" width="512" height="512" xlink:href="data:image/png;base64,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"/>
                  </defs>
                  </svg>
                  </span>
                  Work Experience
                </NuxtLink>
                <NuxtLink class="list-group-item list-group-item-action" to="/user/profile/skills-and-hobbies" @click.native="handleSkillsClick()">
                  <span class="mx-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hourglass-empty" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 20v-2a6 6 0 1 1 12 0v2a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1z"></path>
                    <path d="M6 4v2a6 6 0 1 0 12 0v-2a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1z"></path>
                  </svg>
                  </span>
                  Career Interests & Hobbies
                </NuxtLink>
              </div>
            </div>
          </div>

          <div class="col-md-9">
            <NuxtChild/>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "profile",
  layout: 'dashboard-user',

  data(){
    return {
      handleGeneral:true,
      handlePassword:false,
      handleEducational:false,
      handleCertification:false,
      handleProjects:false,
      handleWork:false,
      handleSkills:false,
    }
  },

  methods:{
    // returnToPage(){
    //   this.$router.push('/user/dashboard');
    // }
    handleGeneralClick() {
      this.handleGeneral = true
      this.handlePassword = false
      this.handleEducational = false,
      this.handleCertification = false,
      this.handleProjects = false,
      this.handleWork = false,
      this.handleSkills = false
    },
    handlePasswordClick() {
      this.handlePassword = true
      this.handleGeneral = false,
      this.handleEducational = false,
      this.handleCertification = false,
      this.handleProjects = false,
      this.handleWork = false,
      this.handleSkills = false
    },
    handleEducationalClick() {
      this.handleEducational = true
      this.handleGeneral = false,
      this.handlePassword = false,
      this.handleCertification = false,
      this.handleProjects = false,
      this.handleWork = false,
      this.handleSkills = false
    },
    handleCertificationClick() {
      this.handleCertification = true
      this.handleGeneral = false,
      this.handlePassword = false,
      this.handleEducational = false,
      this.handleProjects = false,
      this.handleWork = false,
      this.handleSkills = false
    },
    handleProjectsClick() {
      this.handleProjects = true
      this.handleGeneral = false,
      this.handlePassword = false,
      this.handleEducational = false,
      this.handleCertification = false,
      this.handleWork = false,
      this.handleSkills = false
    },
    handleWorkClick() {
      this.handleWork = true
      this.handleGeneral = false,
      this.handlePassword = false,
      this.handleEducational = false,
      this.handleCertification = false,
      this.handleProjects = false,
      this.handleSkills = false
    },
    handleSkillsClick() {
      this.handleSkills = true
      this.handleGeneral = false,
      this.handlePassword = false,
      this.handleEducational = false,
      this.handleCertification = false,
      this.handleProjects = false,
      this.handleWork = false
    },

  }
}
</script>

<style scoped>
.container-xl {
  max-width: 1250px;
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
