export const state = () => ({
  organizations: [],
  organization: {}
})

export const mutations = {
  SET_ORGANIZATIONS(state, organizations) {
    state.organizations = organizations
  },
  SET_ORGANIZATION(state, organization) {
    state.organization = organization
  }
}

export const actions = {
  async index({ commit }) {
    const res = await this.$repositories.organization.index()
    const { status, data } = res
    if (status === 200) {
      commit('SET_ORGANIZATIONS', data.data)
    } else {
      // Handle error here
    }
  },

  async show({ commit }, organization) {
    const res = await this.$repositories.organization.show(organization)
    const { status, data } = res
    if (status === 200 && data.success && data.code) {
      const { data } = data
      commit('SET_ORGANIZATION', data)
    } else {
      // Handle error here
    }
  },

  async create({ commit }, id, organization) {
    const res = await this.$repositories.organization.create(id, organization)
    const { status, data } = res
    if (status === 200 && data.success && data.code) {
      const { data } = data
      commit('SET_ORGANIZATION', data)
    } else {
      // Handle error here
    }
  },

  async update({ commit }, id, organization) {
    const res = await this.$repositories.organization.update(id, organization)
    const { status, data } = res
    if (status === 200 && data.success && data.code) {
      const { data } = data
      commit('SET_ORGANIZATION', data)
    } else {
      // Handle error here
    }
  },
}
