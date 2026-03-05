export { default as Notification } from '../..\\components\\Notification.vue'
export { default as NuxtLogo } from '../..\\components\\NuxtLogo.vue'
export { default as RichBoxEditor } from '../..\\components\\RichBoxEditor.vue'
export { default as SearchSelect } from '../..\\components\\SearchSelect.vue'
export { default as Select } from '../..\\components\\Select.vue'
export { default as Table } from '../..\\components\\Table.vue'
export { default as Tutorial } from '../..\\components\\Tutorial.vue'
export { default as LayoutsDashboardAdminFooter } from '../..\\components\\Layouts\\DashboardAdmin\\Footer.vue'
export { default as LayoutsDashboardAdminHeader } from '../..\\components\\Layouts\\DashboardAdmin\\Header.vue'
export { default as LayoutsDashboardAdminSidebar } from '../..\\components\\Layouts\\DashboardAdmin\\Sidebar.vue'
export { default as LayoutsDashboardAdminOrganizationFooter } from '../..\\components\\Layouts\\DashboardAdminOrganization\\Footer.vue'
export { default as LayoutsDashboardAdminOrganizationHeader } from '../..\\components\\Layouts\\DashboardAdminOrganization\\header.vue'

// nuxt/nuxt.js#8607
function wrapFunctional(options) {
  if (!options || !options.functional) {
    return options
  }

  const propKeys = Array.isArray(options.props) ? options.props : Object.keys(options.props || {})

  return {
    render(h) {
      const attrs = {}
      const props = {}

      for (const key in this.$attrs) {
        if (propKeys.includes(key)) {
          props[key] = this.$attrs[key]
        } else {
          attrs[key] = this.$attrs[key]
        }
      }

      return h(options, {
        on: this.$listeners,
        attrs,
        props,
        scopedSlots: this.$scopedSlots,
      }, this.$slots.default)
    }
  }
}
