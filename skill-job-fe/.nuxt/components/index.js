export { default as FileNewsIdView } from '../..\\components\\FileNewsIdView.vue'
export { default as FileView } from '../..\\components\\FileView.vue'
export { default as MultiSelect } from '../..\\components\\MultiSelect.vue'
export { default as Notification } from '../..\\components\\Notification.vue'
export { default as NuxtLogo } from '../..\\components\\NuxtLogo.vue'
export { default as SearchSelect } from '../..\\components\\SearchSelect.vue'
export { default as Select } from '../..\\components\\Select.vue'
export { default as SelectNoneBorder } from '../..\\components\\SelectNoneBorder.vue'
export { default as SingleFileUpload } from '../..\\components\\SingleFileUpload.vue'
export { default as Table } from '../..\\components\\Table.vue'
export { default as Tutorial } from '../..\\components\\Tutorial.vue'
export { default as LayoutsDashboardUserFooter } from '../..\\components\\Layouts\\DashboardUser\\Footer.vue'
export { default as LayoutsDashboardUserHeader } from '../..\\components\\Layouts\\DashboardUser\\Header.vue'
export { default as LayoutsDashboardUserSidebar } from '../..\\components\\Layouts\\DashboardUser\\Sidebar.vue'

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
