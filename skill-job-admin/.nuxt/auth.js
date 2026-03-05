import Middleware from './middleware'
import { Auth, authMiddleware, ExpiredAuthSessionError } from '~auth/runtime'

// Active schemes
import { CookieScheme } from '~auth/runtime'

Middleware.auth = authMiddleware

export default function (ctx, inject) {
  // Options
  const options = {
  "resetOnError": false,
  "ignoreExceptions": false,
  "scopeKey": "scope",
  "rewriteRedirects": true,
  "fullPathRedirect": false,
  "watchLoggedIn": true,
  "redirect": {
    "login": "/admin/auth/login",
    "logout": "/admin/auth/login",
    "home": "/",
    "callback": "/admin/auth/login"
  },
  "vuex": {
    "namespace": "auth"
  },
  "cookie": {
    "prefix": "auth.",
    "options": {
      "path": "/"
    }
  },
  "localStorage": {
    "prefix": "auth."
  },
  "defaultStrategy": "cookie"
}

  // Create a new Auth instance
  const $auth = new Auth(ctx, options)

  // Register strategies
  // cookie
  $auth.registerStrategy('cookie', new CookieScheme($auth, {
  "cookie": {
    "name": "XSRF-TOKEN"
  },
  "user": {
    "property": "data"
  },
  "endpoints": {
    "csrf": {
      "url": "http://localhost:8000/sanctum/csrf-cookie"
    },
    "login": {
      "url": "http://localhost:8000/login?portal=admin",
      "method": "post"
    },
    "logout": {
      "url": "http://localhost:8000/logout?portal=admin",
      "method": "post"
    },
    "user": {
      "url": "http://localhost:8000/api/admin/profile?portal=admin",
      "method": "get"
    }
  },
  "name": "cookie"
}))

  // Inject it to nuxt context as $auth
  inject('auth', $auth)
  ctx.$auth = $auth

  // Initialize auth
  return $auth.init().catch(error => {
    if (process.client) {
      // Don't console log expired auth session errors. This error is common, and expected to happen.
      // The error happens whenever the user does an ssr request (reload/initial navigation) with an expired refresh
      // token. We don't want to log this as an error.
      if (error instanceof ExpiredAuthSessionError) {
        return
      }

      console.error('[ERROR] [AUTH]', error)
    }
  })
}
