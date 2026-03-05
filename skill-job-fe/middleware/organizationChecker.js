export default function ({redirect}) {
  // Add the userAgent property to the context
    if (!localStorage.getItem('organization')) {
    return redirect('/user/dashboard')
  }
}
