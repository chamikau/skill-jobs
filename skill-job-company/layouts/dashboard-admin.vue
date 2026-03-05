<template>
  <div>
    <div class="page">
      <LayoutsDashboardAdminSidebar/>
      <LayoutsDashboardAdminHeader/>
      <div class="page-wrapper p-2">
        <Nuxt/>
        <LayoutsDashboardAdminFooter/>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "dashboard-admin",
  middleware: 'organizationChecker'
}
</script>

<style scoped>
</style>
