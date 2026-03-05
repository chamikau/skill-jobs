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
        <h2 style="font-weight: bold">Student List</h2>
        <div class="table-responsive">
          <table class="table table-vcenter card-table">
            <thead>
            <tr>
              <th>Student ID</th>
              <th>Name</th>
              <th>Title</th>
              <th>Email</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>004</td>
              <td>Dunn Slane</td>
              <td class="text-muted">
                I am first year student
              </td>
              <td class="text-muted"><a href="#" class="text-reset">dslane3@epa.gov</a></td>
              <td class="text-muted">
                <div class="chip-active">
                  Active
                </div>
              </td>
            </tr>
            <tr>
              <td>005</td>
              <td>Emmy Levet</td>
              <td class="text-muted">
                I followed master degree in abc campuse
              </td>
              <td class="text-muted"><a href="#" class="text-reset">elevet4@senate.gov</a></td>
              <td class="text-muted">
                <div class="chip-active">
                  Active
                </div>
              </td>
            </tr>
            <tr>
              <td>006</td>
              <td>Maryjo Lebarree</td>
              <td class="text-muted">
                I am a student
              </td>
              <td class="text-muted"><a href="#" class="text-reset">mlebarree5@unc.edu</a></td>
              <td class="text-muted">
                <div class="chip-active">
                  Active
                </div>
              </td>
            </tr>
            <tr>
              <td>007</td>
              <td>Egan Poetz</td>
              <td class="text-muted">
                I did Research
              </td>
              <td class="text-muted"><a href="#" class="text-reset">epoetz6@free.fr</a></td>
              <td class="text-muted">
                <div class="chip-active">
                  Active
                </div>
              </td>
            </tr>
            <tr>
              <td>008</td>
              <td>Kellie Skingley</td>
              <td class="text-muted">
                I am a Teacher
              </td>
              <td class="text-muted"><a href="#" class="text-reset">kskingley7@columbia.edu</a></td>
              <td class="text-muted">
                <div class="chip-active">
                  Active
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <Table :attributes="attributes" @inputUpdates="inputUpdates">
      <!--          <template v-slot:action="props">{{ props.record.owner.name}}</template>-->
      <template v-slot:action="props">
      </template>
    </Table>
  </div>
</template>

<script>
import {mapState} from "vuex";

export default {
  name: "index",
  layout: 'dashboard-admin',
  data() {
    return {
      attributes: {
        table_id: 'student_table',
        cache: true,
        loading: false,
        labels: [
          {key: 'first_name', name: 'Name', sort: true},
          {key: 'description', name: 'Description' },
          {key: 'created_at', name: 'Created Date'},
          {key: 'last_name', name: 'Action'},
        ],
        api_response: {},
        filters: {},
        table_component_values: {}
      }
    }
  },
  mounted() {
  },
  async fetch({ store }) {
    await store.dispatch('index')
  },
  computed: {
    ...mapState({
      student: (state) => {
        return state.student.student
      }
    })
  },
  methods: {
    async goToOrganization(organization) {
      await this.$setGlobalOrganization(1)
      await this.$router.push('/admin/')
    },
    async getStudentTableData(page = 1, sort = '', search = '', per_page = 15) {
      try {
        this.attributes.api_response = await this.$axios.$get('api/admin/students',
          {
            params: {
              per_page: per_page,
              page: page,
              sort: sort,
              'filter[search]': search,
              ...this.attributes.filters
            }
          }
        );
      } catch (error) {
      }
    },
    inputUpdates(values) {
      this.attributes.table_component_values = values;
      this.getStudentTableData(values.page, values.sort.sort_input, values.search, values.per_page)
    },
  }
}
</script>

<style scoped>
.chip-active {
  display: inline-block;
  padding: 0 10px;
  height: 28px;
  font-size: 14px;
  line-height: 25px;
  border-radius: 25px;
  background-color: #0ca678;
  color: white;
  opacity: 0.5;
}
</style>
