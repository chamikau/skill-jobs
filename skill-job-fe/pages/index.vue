<template>
  <div></div>
</template>

<script>
export default {
  name: 'IndexPage',
  mounted() {
    if (this.$auth.loggedIn) {
      this.$router.push('/user/dashboard')
    }
  }
}
</script>
