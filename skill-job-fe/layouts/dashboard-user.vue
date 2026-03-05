<template>
  <div>
    <div class="page">
      <LayoutsDashboardUserSidebar/>
      <LayoutsDashboardUserHeader/>
      <div class="page-wrapper p-2">
        <Nuxt/>
        <LayoutsDashboardUserFooter/>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "dashboard-user",
}
</script>

<style scoped>

</style>
