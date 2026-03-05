export default function ({$axios, redirect, app}, inject) {

  $axios.onRequest(config => {
    if (localStorage.getItem('organization')) {
      config.params = {...config.params, 'organization_id': JSON.parse(localStorage.getItem('organization')).id}
    }
  })

  $axios.onResponse(response => {
    if (response.data.two_factor === true){
      redirect({name: 'admin-auth-two-factor-challenge'})
    }
  })



  $axios.onError(error => {
    const code = parseInt(error.response && error.response.status)
    if (code === 423) {
      redirect({name: 'admin-confirm-password', query:{ return : app.router.currentRoute.name}})
    }

    if (code === 403 && error.response.error === 'permission') {
      console.log(error.response)
    }
  })
}
