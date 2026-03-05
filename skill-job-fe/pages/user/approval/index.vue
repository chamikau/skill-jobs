<template>
  <div class="page">
    <h1>Search</h1>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <lable class="form-label">Student ID</lable>
            <input type="text" class="form-control" placeholder="Search Student Id">
          </div>
          <div class="col-md-4">
            <lable class="form-label">Student Name</lable>
            <input type="text" class="form-control" placeholder="Search Student Name">
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-4">
      <div class="card-body">
        <h2 style="font-weight: bold">Pending Approval</h2>
        <div class="table-responsive">
          <table class="table table-vcenter card-table">
            <thead>
            <tr>
              <th>Student ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>001</td>
              <td>Paweł Kuna</td>
              <td class="text-muted"><a href="#" class="text-reset">paweluna@howstuffworks.com</a></td>
              <td class="text-muted" >
                <div  class="chip-pending">
                  Pending
                </div>
              </td>
            </tr>
            <tr>
              <td>002</td>
              <td>Jeffie Lewzey</td>
              <td class="text-muted"><a href="#" class="text-reset">jlewzey1@seesaa.net</a></td>
              <td class="text-muted">
                <div class="chip-pending">
                  Pending
                </div>
              </td>
            </tr>
            <tr>
              <td>003</td>
              <td>Mallory Hulme</td>
              <td class="text-muted"><a href="#" class="text-reset">mhulme2@domainmarket.com</a></td>
              <td class="text-muted">
                <div class="chip-pending">
                  Pending
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "index",
  layout: 'dashboard-admin',
}
</script>

<style scoped>

</style>
