<template>
  <div>
    <!-- Page title -->
    <div id="organizations">
      <div class="container-xl">
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Your Companies
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-12 col-md-auto ms-auto d-print-none">
                <div class="btn-list">
                  <NuxtLink class="btn btn-primary d-none d-sm-inline-block"
                            to="/admin/organizations/company/create">
                    <svg class="icon" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                         xmlns="http://www.w3.org/2000/svg">
                      <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                      <path d="M12 5l0 14"></path>
                      <path d="M5 12l14 0"></path>
                    </svg>
                    Create new Company
                  </NuxtLink>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="page-body">
        <div class="container-xl">
          <p v-if="organizations_total === 0 && invitations_total === 0" class="title fs-2 text-center py-5">You don't
            have any active companies...</p>
          <div class="row">
            <div v-for="organization in organizations" class="col-sm-6 col-lg-3 mb-3 ">
              <div class="card card-sm cursor-pointer" @click="goToOrganization(organization)">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                    <span class="col-md-2">
                      <span class="avatar badge bg-x text-white">
                        {{ organization.name.slice(0, 3) }}
                      </span>
                    </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium text-truncate">
                      <span v-if="organization.name.length >= 20">
                        {{ organization.name.slice(0, 20) }}...
                      </span>
                        <span v-else>
                        {{ organization.name }}
                      </span>
                      </div>
                      <div class="text-muted">
                        {{ organization.state }}
                      </div>
                    </div>
                    <div class="col-md-2 btn-list" style="margin-right:0.2rem">
                      <button  data-bs-placement="bottom" data-bs-toggle="tooltip" title="Edit"
                               @click.stop="goToEditCompany(organization)" class="btn  w-100 btn-icon" aria-label="">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-pencil-square text-black" viewBox="0 0 16 16">
                          <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- Invitations -->
    <div id="invitations" v-if="invitations.length > 0">
      <div class="container-xl">
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Your Invitations
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="page-body">
        <span>{{ invitation_state }}</span>
        <div class="container-xl">
          <div class="row">
            <div v-for="invitation in invitations" class="col-sm-6 col-lg-3 mb-3 ">
              <div>
                <div class="card card-sm">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-auto">
                    <span class="">
                      <span class="avatar badge bg-x text-white">
                        {{ invitation.organization.name.slice(0, 3) }}
                      </span>
                    </span>
                      </div>
                      <div class="col">
                        <div class="font-weight-medium">
                      <span v-if="invitation.organization.name.length >= 20">
                        {{ invitation.organization.name.slice(0, 20) }}...
                      </span>
                          <span v-else>
                        {{ invitation.organization.name }}
                      </span>
                        </div>
                        <div class="">
                          <a class="btn btn-sm btn-outline-primary shadow-sm" @click="acceptInvitation(invitation.id)">
                            <svg class="icon icon-tabler icon-tabler-check" fill="none" height="24"
                                 stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 viewBox="0 0 24 24"
                                 width="24" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                              <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                            Accept
                          </a>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {mapState} from "vuex";

export default {
  name: "organizations",
  layout: 'dashboard-admin-organization',
  data() {
    return {
      organizations: [],
      invitations: [],
      invitation_state: '',
      organizations_total: null,
      invitations_total: null
    }
  },
  mounted() {
    this.getOrganizations()
    this.getInvitations()
  },
  computed: {
    ...mapState({
      organizations: (state) => {
        return state.organizations
      }
    })
  },
  methods: {
    async getOrganizations() {
      try {
        let organizations = (await this.$axios.$get('api/admin/organizations',
          {
            params: {
              per_page: 200,
            }
          }
        ));
        this.organizations = organizations.data;
        this.organizations_total = organizations.total
      } catch (error) {
      }
    },

    async getInvitations() {
      try {
        let invitations = (await this.$axios.$get('api/admin/profile/invitations',
          {
            params: {
              per_page: 200,
              'filter[state]': 'sent',
            }
          }
        ));
        this.invitation_state = invitations.data.state
        this.invitations = invitations.data;
        this.invitations_total = invitations.total
      } catch (error) {
      }
    },

    async acceptInvitation(id) {
      try {
        await this.$axios.$post(`api/admin/profile/invitations/${id}/accept`)
        await this.getInvitations()
        await this.getOrganizations()
      } catch (e) {
      }
    },

    async goToOrganization(organization) {
      await this.$setGlobalOrganization(organization.id)
      await this.$router.push('/admin/dashboard')
    },
    async goToEditCompany(organization) {
      await this.$setGlobalOrganization(organization.id)
      await this.$router.push(`/admin/organizations/company/${organization.id}/`)
    },
  }
}
</script>

<style scoped>
.container-xl {
  max-width: 1250px;
}
</style>
