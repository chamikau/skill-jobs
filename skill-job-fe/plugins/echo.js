import Echo from 'laravel-echo'

window.Pusher = require('pusher-js')

Pusher.Runtime.createXHR = () => {
  let xhr = new XMLHttpRequest()
  xhr.withCredentials = true
  return xhr
}

export default (_, inject) => {
  const echo = new Echo({
    broadcaster: 'pusher',
    key: 'app-key',
    wsHost: 'socket.10qbit.com',
    wsPort: 6001,
    // wssPort: 6001,
    forceTLS: false,
    encrypted: true,
    disableStats: true,
    // enabledTransports: ['ws', 'wss'],
    authEndpoint: process.env.API_URL +'/broadcasting/auth',
  })

  inject('echo', echo)
}
