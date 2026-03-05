import Vue from 'vue'
import Router from 'vue-router'
import { normalizeURL, decode } from 'ufo'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _7e896aba = () => interopDefault(import('..\\pages\\admin\\confirm-password.vue' /* webpackChunkName: "pages/admin/confirm-password" */))
const _79adcf52 = () => interopDefault(import('..\\pages\\admin\\dashboard.vue' /* webpackChunkName: "pages/admin/dashboard" */))
const _6ddee8b2 = () => interopDefault(import('..\\pages\\admin\\job\\index.vue' /* webpackChunkName: "pages/admin/job/index" */))
const _636c7964 = () => interopDefault(import('..\\pages\\admin\\organizations\\index.vue' /* webpackChunkName: "pages/admin/organizations/index" */))
const _3f52a532 = () => interopDefault(import('..\\pages\\admin\\profile.vue' /* webpackChunkName: "pages/admin/profile" */))
const _5cee5fa8 = () => interopDefault(import('..\\pages\\admin\\profile\\2fa\\index.vue' /* webpackChunkName: "pages/admin/profile/2fa/index" */))
const _348aebde = () => interopDefault(import('..\\pages\\admin\\profile\\general.vue' /* webpackChunkName: "pages/admin/profile/general" */))
const _7ad3137f = () => interopDefault(import('..\\pages\\admin\\profile\\invitations\\index.vue' /* webpackChunkName: "pages/admin/profile/invitations/index" */))
const _c4fb117c = () => interopDefault(import('..\\pages\\admin\\profile\\password.vue' /* webpackChunkName: "pages/admin/profile/password" */))
const _0405ec55 = () => interopDefault(import('..\\pages\\admin\\settings.vue' /* webpackChunkName: "pages/admin/settings" */))
const _119666f2 = () => interopDefault(import('..\\pages\\admin\\settings\\collections\\index.vue' /* webpackChunkName: "pages/admin/settings/collections/index" */))
const _3b37c71d = () => interopDefault(import('..\\pages\\admin\\settings\\consultations\\index.vue' /* webpackChunkName: "pages/admin/settings/consultations/index" */))
const _fe45692e = () => interopDefault(import('..\\pages\\admin\\settings\\products\\index.vue' /* webpackChunkName: "pages/admin/settings/products/index" */))
const _2657c68a = () => interopDefault(import('..\\pages\\admin\\settings\\roles\\index.vue' /* webpackChunkName: "pages/admin/settings/roles/index" */))
const _1ce73f14 = () => interopDefault(import('..\\pages\\admin\\settings\\tags\\index.vue' /* webpackChunkName: "pages/admin/settings/tags/index" */))
const _2211da5f = () => interopDefault(import('..\\pages\\admin\\settings\\users\\index.vue' /* webpackChunkName: "pages/admin/settings/users/index" */))
const _48eac20c = () => interopDefault(import('..\\pages\\admin\\settings\\collections\\create.vue' /* webpackChunkName: "pages/admin/settings/collections/create" */))
const _53756741 = () => interopDefault(import('..\\pages\\admin\\settings\\consultations\\create.vue' /* webpackChunkName: "pages/admin/settings/consultations/create" */))
const _7aff2716 = () => interopDefault(import('..\\pages\\admin\\settings\\products\\create.vue' /* webpackChunkName: "pages/admin/settings/products/create" */))
const _67555518 = () => interopDefault(import('..\\pages\\admin\\settings\\roles\\create.vue' /* webpackChunkName: "pages/admin/settings/roles/create" */))
const _b09623ac = () => interopDefault(import('..\\pages\\admin\\settings\\tags\\create.vue' /* webpackChunkName: "pages/admin/settings/tags/create" */))
const _f350a248 = () => interopDefault(import('..\\pages\\admin\\settings\\users\\invitation.vue' /* webpackChunkName: "pages/admin/settings/users/invitation" */))
const _5dd5044c = () => interopDefault(import('..\\pages\\admin\\settings\\collections\\_id.vue' /* webpackChunkName: "pages/admin/settings/collections/_id" */))
const _143d1fc6 = () => interopDefault(import('..\\pages\\admin\\settings\\consultations\\_id\\index.vue' /* webpackChunkName: "pages/admin/settings/consultations/_id/index" */))
const _66e91411 = () => interopDefault(import('..\\pages\\admin\\settings\\products\\_id.vue' /* webpackChunkName: "pages/admin/settings/products/_id" */))
const _354c391c = () => interopDefault(import('..\\pages\\admin\\settings\\roles\\_id.vue' /* webpackChunkName: "pages/admin/settings/roles/_id" */))
const _64bc1308 = () => interopDefault(import('..\\pages\\admin\\settings\\tags\\_id.vue' /* webpackChunkName: "pages/admin/settings/tags/_id" */))
const _c27e2ef2 = () => interopDefault(import('..\\pages\\admin\\settings\\users\\_id.vue' /* webpackChunkName: "pages/admin/settings/users/_id" */))
const _8b67256e = () => interopDefault(import('..\\pages\\admin\\settings\\consultations\\_id\\form.vue' /* webpackChunkName: "pages/admin/settings/consultations/_id/form" */))
const _c1b425ca = () => interopDefault(import('..\\pages\\admin\\auth\\forgot-password.vue' /* webpackChunkName: "pages/admin/auth/forgot-password" */))
const _51ed4402 = () => interopDefault(import('..\\pages\\admin\\auth\\login.vue' /* webpackChunkName: "pages/admin/auth/login" */))
const _2b921cb3 = () => interopDefault(import('..\\pages\\admin\\auth\\reset-password.vue' /* webpackChunkName: "pages/admin/auth/reset-password" */))
const _567c4ef2 = () => interopDefault(import('..\\pages\\admin\\auth\\signup.vue' /* webpackChunkName: "pages/admin/auth/signup" */))
const _60fa6220 = () => interopDefault(import('..\\pages\\admin\\auth\\two-factor-challenge.vue' /* webpackChunkName: "pages/admin/auth/two-factor-challenge" */))
const _4e2ecdd2 = () => interopDefault(import('..\\pages\\admin\\auth\\two-factor-challenge-recovery.vue' /* webpackChunkName: "pages/admin/auth/two-factor-challenge-recovery" */))
const _0d7fc4e7 = () => interopDefault(import('..\\pages\\admin\\job\\create-job.vue' /* webpackChunkName: "pages/admin/job/create-job" */))
const _3493e291 = () => interopDefault(import('..\\pages\\admin\\job\\create-job\\general.vue' /* webpackChunkName: "pages/admin/job/create-job/general" */))
const _d08b42ae = () => interopDefault(import('..\\pages\\admin\\job\\create-job\\_id\\description.vue' /* webpackChunkName: "pages/admin/job/create-job/_id/description" */))
const _015679f6 = () => interopDefault(import('..\\pages\\admin\\organizations\\invitations\\index.vue' /* webpackChunkName: "pages/admin/organizations/invitations/index" */))
const _4d7cf08b = () => interopDefault(import('..\\pages\\admin\\organizations\\company\\create.vue' /* webpackChunkName: "pages/admin/organizations/company/create" */))
const _910e9a96 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages/index" */))
const _91a79056 = () => interopDefault(import('..\\pages\\admin\\job\\edit-job\\_id.vue' /* webpackChunkName: "pages/admin/job/edit-job/_id" */))
const _f265fa12 = () => interopDefault(import('..\\pages\\admin\\job\\edit-job\\_id\\description.vue' /* webpackChunkName: "pages/admin/job/edit-job/_id/description" */))
const _7d0edb63 = () => interopDefault(import('..\\pages\\admin\\job\\edit-job\\_id\\general.vue' /* webpackChunkName: "pages/admin/job/edit-job/_id/general" */))
const _0bcaf7bb = () => interopDefault(import('..\\pages\\admin\\organizations\\company\\_id.vue' /* webpackChunkName: "pages/admin/organizations/company/_id" */))

const emptyFn = () => {}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: '/',
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/admin/confirm-password",
    component: _7e896aba,
    name: "admin-confirm-password"
  }, {
    path: "/admin/dashboard",
    component: _79adcf52,
    name: "admin-dashboard"
  }, {
    path: "/admin/job",
    component: _6ddee8b2,
    name: "admin-job"
  }, {
    path: "/admin/organizations",
    component: _636c7964,
    name: "admin-organizations"
  }, {
    path: "/admin/profile",
    component: _3f52a532,
    name: "admin-profile",
    children: [{
      path: "2fa",
      component: _5cee5fa8,
      name: "admin-profile-2fa"
    }, {
      path: "general",
      component: _348aebde,
      name: "admin-profile-general"
    }, {
      path: "invitations",
      component: _7ad3137f,
      name: "admin-profile-invitations"
    }, {
      path: "password",
      component: _c4fb117c,
      name: "admin-profile-password"
    }]
  }, {
    path: "/admin/settings",
    component: _0405ec55,
    name: "admin-settings",
    children: [{
      path: "collections",
      component: _119666f2,
      name: "admin-settings-collections"
    }, {
      path: "consultations",
      component: _3b37c71d,
      name: "admin-settings-consultations"
    }, {
      path: "products",
      component: _fe45692e,
      name: "admin-settings-products"
    }, {
      path: "roles",
      component: _2657c68a,
      name: "admin-settings-roles"
    }, {
      path: "tags",
      component: _1ce73f14,
      name: "admin-settings-tags"
    }, {
      path: "users",
      component: _2211da5f,
      name: "admin-settings-users"
    }, {
      path: "collections/create",
      component: _48eac20c,
      name: "admin-settings-collections-create"
    }, {
      path: "consultations/create",
      component: _53756741,
      name: "admin-settings-consultations-create"
    }, {
      path: "products/create",
      component: _7aff2716,
      name: "admin-settings-products-create"
    }, {
      path: "roles/create",
      component: _67555518,
      name: "admin-settings-roles-create"
    }, {
      path: "tags/create",
      component: _b09623ac,
      name: "admin-settings-tags-create"
    }, {
      path: "users/invitation",
      component: _f350a248,
      name: "admin-settings-users-invitation"
    }, {
      path: "collections/:id",
      component: _5dd5044c,
      name: "admin-settings-collections-id"
    }, {
      path: "consultations/:id",
      component: _143d1fc6,
      name: "admin-settings-consultations-id"
    }, {
      path: "products/:id",
      component: _66e91411,
      name: "admin-settings-products-id"
    }, {
      path: "roles/:id",
      component: _354c391c,
      name: "admin-settings-roles-id"
    }, {
      path: "tags/:id",
      component: _64bc1308,
      name: "admin-settings-tags-id"
    }, {
      path: "users/:id",
      component: _c27e2ef2,
      name: "admin-settings-users-id"
    }, {
      path: "consultations/:id/form",
      component: _8b67256e,
      name: "admin-settings-consultations-id-form"
    }]
  }, {
    path: "/admin/auth/forgot-password",
    component: _c1b425ca,
    name: "admin-auth-forgot-password"
  }, {
    path: "/admin/auth/login",
    component: _51ed4402,
    name: "admin-auth-login"
  }, {
    path: "/admin/auth/reset-password",
    component: _2b921cb3,
    name: "admin-auth-reset-password"
  }, {
    path: "/admin/auth/signup",
    component: _567c4ef2,
    name: "admin-auth-signup"
  }, {
    path: "/admin/auth/two-factor-challenge",
    component: _60fa6220,
    name: "admin-auth-two-factor-challenge"
  }, {
    path: "/admin/auth/two-factor-challenge-recovery",
    component: _4e2ecdd2,
    name: "admin-auth-two-factor-challenge-recovery"
  }, {
    path: "/admin/job/create-job",
    component: _0d7fc4e7,
    name: "admin-job-create-job",
    children: [{
      path: "general",
      component: _3493e291,
      name: "admin-job-create-job-general"
    }, {
      path: ":id?/description",
      component: _d08b42ae,
      name: "admin-job-create-job-id-description"
    }]
  }, {
    path: "/admin/organizations/invitations",
    component: _015679f6,
    name: "admin-organizations-invitations"
  }, {
    path: "/admin/organizations/company/create",
    component: _4d7cf08b,
    name: "admin-organizations-company-create"
  }, {
    path: "/",
    component: _910e9a96,
    name: "index"
  }, {
    path: "/admin/job/edit-job/:id?",
    component: _91a79056,
    name: "admin-job-edit-job-id",
    children: [{
      path: "description",
      component: _f265fa12,
      name: "admin-job-edit-job-id-description"
    }, {
      path: "general",
      component: _7d0edb63,
      name: "admin-job-edit-job-id-general"
    }]
  }, {
    path: "/admin/organizations/company/:id?",
    component: _0bcaf7bb,
    name: "admin-organizations-company-id"
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
