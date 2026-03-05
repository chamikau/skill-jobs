export default async function ({$axios, $auth, redirect, app}, inject) {

  inject('setGlobalOrganization', async function (organization_id) {
    let organization = (await $axios.$get(`api/admin/organizations/${organization_id}`)).data

    organization['permissions'] = [].concat.apply([], organization.admin_organization_roles.map(admin_organization_role => {
      return admin_organization_role.role.permissions;
    }));

    await localStorage.setItem('organization', JSON.stringify(organization));
  })

  inject('checkOrganizationPermission', function (code, portal='admin') {
    if (localStorage.getItem('organization')) {
      const current_organization = JSON.parse(localStorage.getItem('organization'))
      const permission = current_organization.permissions.find(permission => permission.code === code && permission.portal===portal)
      return typeof permission === "object";
    }

    return false;
  })

  //reset organization
  if (localStorage.getItem('organization') && typeof app.$auth != 'undefined') {
    let organization = JSON.parse(localStorage.getItem('organization'))
    organization = (await $axios.$get(`api/admin/organizations/${organization.id}`)).data

    organization['permissions'] = [].concat.apply([], organization.admin_organization_roles.map(admin_organization_role => {
      return admin_organization_role.role.permissions;
    }));

    await localStorage.setItem('organization', JSON.stringify(organization));
  }
}
