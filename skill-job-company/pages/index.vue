<template>
  <div></div>
</template>

<script>
export default {
  name: 'IndexPage',
  async mounted() {
    if (this.$auth.loggedIn) {
      this.clinics = (await this.$axios.$get('api/company/organizations',
        { params: { per_page: 3,} }
      )).data;
      if (this.clinics.length === 1) {
        await this.$setGlobalOrganization(this.clinics[0].id)
        await this.$router.push('/admin/dashboard')
      } else await this.$router.push('/admin/organizations/')
    }
  }
}
</script>
