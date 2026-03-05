import Vue from 'vue'
import Router from 'vue-router'
import { normalizeURL, decode } from 'ufo'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _92c8d9d6 = () => interopDefault(import('..\\pages\\user\\applied-course-lists\\index.vue' /* webpackChunkName: "pages/user/applied-course-lists/index" */))
const _5420ac4c = () => interopDefault(import('..\\pages\\user\\applied-event-lists\\index.vue' /* webpackChunkName: "pages/user/applied-event-lists/index" */))
const _7d5f7e85 = () => interopDefault(import('..\\pages\\user\\approval\\index.vue' /* webpackChunkName: "pages/user/approval/index" */))
const _778b80bc = () => interopDefault(import('..\\pages\\user\\confirm-password.vue' /* webpackChunkName: "pages/user/confirm-password" */))
const _f51a4a98 = () => interopDefault(import('..\\pages\\user\\courses\\index.vue' /* webpackChunkName: "pages/user/courses/index" */))
const _290d2f6a = () => interopDefault(import('..\\pages\\user\\dashboard.vue' /* webpackChunkName: "pages/user/dashboard" */))
const _9bf94d22 = () => interopDefault(import('..\\pages\\user\\events\\index.vue' /* webpackChunkName: "pages/user/events/index" */))
const _059d2e8f = () => interopDefault(import('..\\pages\\user\\job\\index.vue' /* webpackChunkName: "pages/user/job/index" */))
const _16472216 = () => interopDefault(import('..\\pages\\user\\news\\index.vue' /* webpackChunkName: "pages/user/news/index" */))
const _e2df6d14 = () => interopDefault(import('..\\pages\\user\\organizations.vue' /* webpackChunkName: "pages/user/organizations" */))
const _837ae046 = () => interopDefault(import('..\\pages\\user\\organizations\\clinics\\index.vue' /* webpackChunkName: "pages/user/organizations/clinics/index" */))
const _75c5dbe4 = () => interopDefault(import('..\\pages\\user\\organizations\\invitations\\index.vue' /* webpackChunkName: "pages/user/organizations/invitations/index" */))
const _31c3b681 = () => interopDefault(import('..\\pages\\user\\organizations\\clinics\\create.vue' /* webpackChunkName: "pages/user/organizations/clinics/create" */))
const _19fce585 = () => interopDefault(import('..\\pages\\user\\organizations\\clinics\\_id.vue' /* webpackChunkName: "pages/user/organizations/clinics/_id" */))
const _70819902 = () => interopDefault(import('..\\pages\\user\\profile.vue' /* webpackChunkName: "pages/user/profile" */))
const _3a590423 = () => interopDefault(import('..\\pages\\user\\profile\\index.vue' /* webpackChunkName: "pages/user/profile/index" */))
const _62be1b78 = () => interopDefault(import('..\\pages\\user\\profile\\2fa\\index.vue' /* webpackChunkName: "pages/user/profile/2fa/index" */))
const _6cfca1d2 = () => interopDefault(import('..\\pages\\user\\profile\\certification\\index.vue' /* webpackChunkName: "pages/user/profile/certification/index" */))
const _e732df10 = () => interopDefault(import('..\\pages\\user\\profile\\educations\\index.vue' /* webpackChunkName: "pages/user/profile/educations/index" */))
const _2b6b5ef9 = () => interopDefault(import('..\\pages\\user\\profile\\general.vue' /* webpackChunkName: "pages/user/profile/general" */))
const _45d8c4d2 = () => interopDefault(import('..\\pages\\user\\profile\\invitations\\index.vue' /* webpackChunkName: "pages/user/profile/invitations/index" */))
const _0dec3f5a = () => interopDefault(import('..\\pages\\user\\profile\\password.vue' /* webpackChunkName: "pages/user/profile/password" */))
const _30c2e6ae = () => interopDefault(import('..\\pages\\user\\profile\\projects\\index.vue' /* webpackChunkName: "pages/user/profile/projects/index" */))
const _a4ff0058 = () => interopDefault(import('..\\pages\\user\\profile\\skills-and-hobbies\\index.vue' /* webpackChunkName: "pages/user/profile/skills-and-hobbies/index" */))
const _818c3294 = () => interopDefault(import('..\\pages\\user\\profile\\work-experiences\\index.vue' /* webpackChunkName: "pages/user/profile/work-experiences/index" */))
const _e32f02f2 = () => interopDefault(import('..\\pages\\user\\profile\\certification\\create.vue' /* webpackChunkName: "pages/user/profile/certification/create" */))
const _281fc946 = () => interopDefault(import('..\\pages\\user\\profile\\educations\\create.vue' /* webpackChunkName: "pages/user/profile/educations/create" */))
const _33e75335 = () => interopDefault(import('..\\pages\\user\\profile\\projects\\create.vue' /* webpackChunkName: "pages/user/profile/projects/create" */))
const _4fb73ac8 = () => interopDefault(import('..\\pages\\user\\profile\\work-experiences\\create.vue' /* webpackChunkName: "pages/user/profile/work-experiences/create" */))
const _4582bf39 = () => interopDefault(import('..\\pages\\user\\profile\\certification\\_id\\general.vue' /* webpackChunkName: "pages/user/profile/certification/_id/general" */))
const _7ee0beb8 = () => interopDefault(import('..\\pages\\user\\profile\\educations\\_id\\general.vue' /* webpackChunkName: "pages/user/profile/educations/_id/general" */))
const _1be24d32 = () => interopDefault(import('..\\pages\\user\\profile\\projects\\_id\\general.vue' /* webpackChunkName: "pages/user/profile/projects/_id/general" */))
const _536cf28c = () => interopDefault(import('..\\pages\\user\\profile\\work-experiences\\_id\\general.vue' /* webpackChunkName: "pages/user/profile/work-experiences/_id/general" */))
const _a0e0996a = () => interopDefault(import('..\\pages\\user\\profile\\_id.vue' /* webpackChunkName: "pages/user/profile/_id" */))
const _09ae293d = () => interopDefault(import('..\\pages\\user\\settings.vue' /* webpackChunkName: "pages/user/settings" */))
const _1131c04c = () => interopDefault(import('..\\pages\\user\\settings\\collections\\index.vue' /* webpackChunkName: "pages/user/settings/collections/index" */))
const _208433f6 = () => interopDefault(import('..\\pages\\user\\settings\\consultations\\index.vue' /* webpackChunkName: "pages/user/settings/consultations/index" */))
const _552d08fe = () => interopDefault(import('..\\pages\\user\\settings\\products\\index.vue' /* webpackChunkName: "pages/user/settings/products/index" */))
const _01bf4d72 = () => interopDefault(import('..\\pages\\user\\settings\\roles\\index.vue' /* webpackChunkName: "pages/user/settings/roles/index" */))
const _347f3b2c = () => interopDefault(import('..\\pages\\user\\settings\\tags\\index.vue' /* webpackChunkName: "pages/user/settings/tags/index" */))
const _050d3d72 = () => interopDefault(import('..\\pages\\user\\settings\\users\\index.vue' /* webpackChunkName: "pages/user/settings/users/index" */))
const _1d312624 = () => interopDefault(import('..\\pages\\user\\settings\\collections\\create.vue' /* webpackChunkName: "pages/user/settings/collections/create" */))
const _2fb32559 = () => interopDefault(import('..\\pages\\user\\settings\\consultations\\create.vue' /* webpackChunkName: "pages/user/settings/consultations/create" */))
const _010b8146 = () => interopDefault(import('..\\pages\\user\\settings\\products\\create.vue' /* webpackChunkName: "pages/user/settings/products/create" */))
const _5ddeab8c = () => interopDefault(import('..\\pages\\user\\settings\\roles\\create.vue' /* webpackChunkName: "pages/user/settings/roles/create" */))
const _f9c715dc = () => interopDefault(import('..\\pages\\user\\settings\\tags\\create.vue' /* webpackChunkName: "pages/user/settings/tags/create" */))
const _2ecf8e18 = () => interopDefault(import('..\\pages\\user\\settings\\users\\invitation.vue' /* webpackChunkName: "pages/user/settings/users/invitation" */))
const _0e0f50c2 = () => interopDefault(import('..\\pages\\user\\settings\\collections\\_id.vue' /* webpackChunkName: "pages/user/settings/collections/_id" */))
const _3b3b3b96 = () => interopDefault(import('..\\pages\\user\\settings\\consultations\\_id\\index.vue' /* webpackChunkName: "pages/user/settings/consultations/_id/index" */))
const _0f1b2bae = () => interopDefault(import('..\\pages\\user\\settings\\products\\_id.vue' /* webpackChunkName: "pages/user/settings/products/_id" */))
const _e973f74c = () => interopDefault(import('..\\pages\\user\\settings\\roles\\_id.vue' /* webpackChunkName: "pages/user/settings/roles/_id" */))
const _6a8bced8 = () => interopDefault(import('..\\pages\\user\\settings\\tags\\_id.vue' /* webpackChunkName: "pages/user/settings/tags/_id" */))
const _44ad096f = () => interopDefault(import('..\\pages\\user\\settings\\users\\_id.vue' /* webpackChunkName: "pages/user/settings/users/_id" */))
const _6f58d831 = () => interopDefault(import('..\\pages\\user\\settings\\consultations\\_id\\form.vue' /* webpackChunkName: "pages/user/settings/consultations/_id/form" */))
const _efe3475e = () => interopDefault(import('..\\pages\\user\\student\\index.vue' /* webpackChunkName: "pages/user/student/index" */))
const _92842d9a = () => interopDefault(import('..\\pages\\user\\auth\\forgot-password.vue' /* webpackChunkName: "pages/user/auth/forgot-password" */))
const _2c111817 = () => interopDefault(import('..\\pages\\user\\auth\\login.vue' /* webpackChunkName: "pages/user/auth/login" */))
const _5d0384ca = () => interopDefault(import('..\\pages\\user\\auth\\reset-password.vue' /* webpackChunkName: "pages/user/auth/reset-password" */))
const _bb28504c = () => interopDefault(import('..\\pages\\user\\auth\\signup.vue' /* webpackChunkName: "pages/user/auth/signup" */))
const _c41795f0 = () => interopDefault(import('..\\pages\\user\\auth\\two-factor-challenge.vue' /* webpackChunkName: "pages/user/auth/two-factor-challenge" */))
const _3aafbfea = () => interopDefault(import('..\\pages\\user\\auth\\two-factor-challenge-recovery.vue' /* webpackChunkName: "pages/user/auth/two-factor-challenge-recovery" */))
const _0f4aaaa4 = () => interopDefault(import('..\\pages\\user\\student\\cv-print.vue' /* webpackChunkName: "pages/user/student/cv-print" */))
const _cc5fc752 = () => interopDefault(import('..\\pages\\user\\auth\\registration\\education-steps.vue' /* webpackChunkName: "pages/user/auth/registration/education-steps" */))
const _24554eed = () => interopDefault(import('..\\pages\\user\\auth\\registration\\signup-steps.vue' /* webpackChunkName: "pages/user/auth/registration/signup-steps" */))
const _a3ecf380 = () => interopDefault(import('..\\pages\\user\\auth\\registration\\skill-steps.vue' /* webpackChunkName: "pages/user/auth/registration/skill-steps" */))
const _45d4a344 = () => interopDefault(import('..\\pages\\user\\auth\\registration\\student-steps-old.vue' /* webpackChunkName: "pages/user/auth/registration/student-steps-old" */))
const _3bb2aa56 = () => interopDefault(import('..\\pages\\user\\auth\\registration\\welcome-page.vue' /* webpackChunkName: "pages/user/auth/registration/welcome-page" */))
const _ab5296da = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages/index" */))
const _a8e6f37c = () => interopDefault(import('..\\pages\\user\\mentors\\_id.vue' /* webpackChunkName: "pages/user/mentors/_id" */))
const _4f2910d4 = () => interopDefault(import('..\\pages\\user\\mentors\\_id\\general.vue' /* webpackChunkName: "pages/user/mentors/_id/general" */))
const _24711463 = () => interopDefault(import('..\\pages\\user\\applied-course-lists\\_id\\application.vue' /* webpackChunkName: "pages/user/applied-course-lists/_id/application" */))
const _1887807e = () => interopDefault(import('..\\pages\\user\\applied-event-lists\\_id\\application.vue' /* webpackChunkName: "pages/user/applied-event-lists/_id/application" */))
const _f525b938 = () => interopDefault(import('..\\pages\\user\\courses\\_id\\application.vue' /* webpackChunkName: "pages/user/courses/_id/application" */))
const _25f49c6e = () => interopDefault(import('..\\pages\\user\\events\\_id\\application.vue' /* webpackChunkName: "pages/user/events/_id/application" */))
const _40613102 = () => interopDefault(import('..\\pages\\user\\feedbacks\\_id\\create.vue' /* webpackChunkName: "pages/user/feedbacks/_id/create" */))
const _549968a9 = () => interopDefault(import('..\\pages\\user\\job\\_id\\application.vue' /* webpackChunkName: "pages/user/job/_id/application" */))
const _321a0c83 = () => interopDefault(import('..\\pages\\user\\news\\_id\\application.vue' /* webpackChunkName: "pages/user/news/_id/application" */))

const emptyFn = () => {}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: '/',
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/user/applied-course-lists",
    component: _92c8d9d6,
    name: "user-applied-course-lists"
  }, {
    path: "/user/applied-event-lists",
    component: _5420ac4c,
    name: "user-applied-event-lists"
  }, {
    path: "/user/approval",
    component: _7d5f7e85,
    name: "user-approval"
  }, {
    path: "/user/confirm-password",
    component: _778b80bc,
    name: "user-confirm-password"
  }, {
    path: "/user/courses",
    component: _f51a4a98,
    name: "user-courses"
  }, {
    path: "/user/dashboard",
    component: _290d2f6a,
    name: "user-dashboard"
  }, {
    path: "/user/events",
    component: _9bf94d22,
    name: "user-events"
  }, {
    path: "/user/job",
    component: _059d2e8f,
    name: "user-job"
  }, {
    path: "/user/news",
    component: _16472216,
    name: "user-news"
  }, {
    path: "/user/organizations",
    component: _e2df6d14,
    name: "user-organizations",
    children: [{
      path: "clinics",
      component: _837ae046,
      name: "user-organizations-clinics"
    }, {
      path: "invitations",
      component: _75c5dbe4,
      name: "user-organizations-invitations"
    }, {
      path: "clinics/create",
      component: _31c3b681,
      name: "user-organizations-clinics-create"
    }, {
      path: "clinics/:id",
      component: _19fce585,
      name: "user-organizations-clinics-id"
    }]
  }, {
    path: "/user/profile",
    component: _70819902,
    children: [{
      path: "",
      component: _3a590423,
      name: "user-profile"
    }, {
      path: "2fa",
      component: _62be1b78,
      name: "user-profile-2fa"
    }, {
      path: "certification",
      component: _6cfca1d2,
      name: "user-profile-certification"
    }, {
      path: "educations",
      component: _e732df10,
      name: "user-profile-educations"
    }, {
      path: "general",
      component: _2b6b5ef9,
      name: "user-profile-general"
    }, {
      path: "invitations",
      component: _45d8c4d2,
      name: "user-profile-invitations"
    }, {
      path: "password",
      component: _0dec3f5a,
      name: "user-profile-password"
    }, {
      path: "projects",
      component: _30c2e6ae,
      name: "user-profile-projects"
    }, {
      path: "skills-and-hobbies",
      component: _a4ff0058,
      name: "user-profile-skills-and-hobbies"
    }, {
      path: "work-experiences",
      component: _818c3294,
      name: "user-profile-work-experiences"
    }, {
      path: "certification/create",
      component: _e32f02f2,
      name: "user-profile-certification-create"
    }, {
      path: "educations/create",
      component: _281fc946,
      name: "user-profile-educations-create"
    }, {
      path: "projects/create",
      component: _33e75335,
      name: "user-profile-projects-create"
    }, {
      path: "work-experiences/create",
      component: _4fb73ac8,
      name: "user-profile-work-experiences-create"
    }, {
      path: "certification/:id/general",
      component: _4582bf39,
      name: "user-profile-certification-id-general"
    }, {
      path: "educations/:id/general",
      component: _7ee0beb8,
      name: "user-profile-educations-id-general"
    }, {
      path: "projects/:id/general",
      component: _1be24d32,
      name: "user-profile-projects-id-general"
    }, {
      path: "work-experiences/:id?/general",
      component: _536cf28c,
      name: "user-profile-work-experiences-id-general"
    }, {
      path: ":id",
      component: _a0e0996a,
      name: "user-profile-id"
    }]
  }, {
    path: "/user/settings",
    component: _09ae293d,
    name: "user-settings",
    children: [{
      path: "collections",
      component: _1131c04c,
      name: "user-settings-collections"
    }, {
      path: "consultations",
      component: _208433f6,
      name: "user-settings-consultations"
    }, {
      path: "products",
      component: _552d08fe,
      name: "user-settings-products"
    }, {
      path: "roles",
      component: _01bf4d72,
      name: "user-settings-roles"
    }, {
      path: "tags",
      component: _347f3b2c,
      name: "user-settings-tags"
    }, {
      path: "users",
      component: _050d3d72,
      name: "user-settings-users"
    }, {
      path: "collections/create",
      component: _1d312624,
      name: "user-settings-collections-create"
    }, {
      path: "consultations/create",
      component: _2fb32559,
      name: "user-settings-consultations-create"
    }, {
      path: "products/create",
      component: _010b8146,
      name: "user-settings-products-create"
    }, {
      path: "roles/create",
      component: _5ddeab8c,
      name: "user-settings-roles-create"
    }, {
      path: "tags/create",
      component: _f9c715dc,
      name: "user-settings-tags-create"
    }, {
      path: "users/invitation",
      component: _2ecf8e18,
      name: "user-settings-users-invitation"
    }, {
      path: "collections/:id",
      component: _0e0f50c2,
      name: "user-settings-collections-id"
    }, {
      path: "consultations/:id",
      component: _3b3b3b96,
      name: "user-settings-consultations-id"
    }, {
      path: "products/:id",
      component: _0f1b2bae,
      name: "user-settings-products-id"
    }, {
      path: "roles/:id",
      component: _e973f74c,
      name: "user-settings-roles-id"
    }, {
      path: "tags/:id",
      component: _6a8bced8,
      name: "user-settings-tags-id"
    }, {
      path: "users/:id",
      component: _44ad096f,
      name: "user-settings-users-id"
    }, {
      path: "consultations/:id/form",
      component: _6f58d831,
      name: "user-settings-consultations-id-form"
    }]
  }, {
    path: "/user/student",
    component: _efe3475e,
    name: "user-student"
  }, {
    path: "/user/auth/forgot-password",
    component: _92842d9a,
    name: "user-auth-forgot-password"
  }, {
    path: "/user/auth/login",
    component: _2c111817,
    name: "user-auth-login"
  }, {
    path: "/user/auth/reset-password",
    component: _5d0384ca,
    name: "user-auth-reset-password"
  }, {
    path: "/user/auth/signup",
    component: _bb28504c,
    name: "user-auth-signup"
  }, {
    path: "/user/auth/two-factor-challenge",
    component: _c41795f0,
    name: "user-auth-two-factor-challenge"
  }, {
    path: "/user/auth/two-factor-challenge-recovery",
    component: _3aafbfea,
    name: "user-auth-two-factor-challenge-recovery"
  }, {
    path: "/user/student/cv-print",
    component: _0f4aaaa4,
    name: "user-student-cv-print"
  }, {
    path: "/user/auth/registration/education-steps",
    component: _cc5fc752,
    name: "user-auth-registration-education-steps"
  }, {
    path: "/user/auth/registration/signup-steps",
    component: _24554eed,
    name: "user-auth-registration-signup-steps"
  }, {
    path: "/user/auth/registration/skill-steps",
    component: _a3ecf380,
    name: "user-auth-registration-skill-steps"
  }, {
    path: "/user/auth/registration/student-steps-old",
    component: _45d4a344,
    name: "user-auth-registration-student-steps-old"
  }, {
    path: "/user/auth/registration/welcome-page",
    component: _3bb2aa56,
    name: "user-auth-registration-welcome-page"
  }, {
    path: "/",
    component: _ab5296da,
    name: "index"
  }, {
    path: "/user/mentors/:id?",
    component: _a8e6f37c,
    name: "user-mentors-id",
    children: [{
      path: "general",
      component: _4f2910d4,
      name: "user-mentors-id-general"
    }]
  }, {
    path: "/user/applied-course-lists/:id?/application",
    component: _24711463,
    name: "user-applied-course-lists-id-application"
  }, {
    path: "/user/applied-event-lists/:id?/application",
    component: _1887807e,
    name: "user-applied-event-lists-id-application"
  }, {
    path: "/user/courses/:id/application",
    component: _f525b938,
    name: "user-courses-id-application"
  }, {
    path: "/user/events/:id/application",
    component: _25f49c6e,
    name: "user-events-id-application"
  }, {
    path: "/user/feedbacks/:id?/create",
    component: _40613102,
    name: "user-feedbacks-id-create"
  }, {
    path: "/user/job/:id/application",
    component: _549968a9,
    name: "user-job-id-application"
  }, {
    path: "/user/news/:id/application",
    component: _321a0c83,
    name: "user-news-id-application"
  }],

  fallback: false
}

export function createRouter (ssrContext, config) {
  const base = (config._app && config._app.basePath) || routerOptions.base
  const router = new Router({ ...routerOptions, base  })

  // TODO: remove in Nuxt 3
  const originalPush = router.push
  router.push = function push (location, onComplete = emptyFn, onAbort) {
    return originalPush.call(this, location, onComplete, onAbort)
  }

  const resolve = router.resolve.bind(router)
  router.resolve = (to, current, append) => {
    if (typeof to === 'string') {
      to = normalizeURL(to)
    }
    return resolve(to, current, append)
  }

  return router
}
