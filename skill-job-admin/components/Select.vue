<template>
  <div id="dropdownMenuButton">
    <input id="dropdownMenuButton1" v-model="attributes.selected.name" :class="[border_color_danger ? 'is-invalid' : '']" aria-expanded="false"
           autocomplete="off" :placeholder="placeholder"
           class="form-control dropdown-toggle" data-bs-toggle="dropdown" readonly>
    <ul :style="{width: getWidth()+'px'}" aria-labelledby="dropdownMenuButton1"
        class="dropdown-menu select-menu">
      <li v-if="attributes.data.length===0" class="text-center">No data available</li>
      <li v-for="data in attributes.data" v-if="attributes.data.length!==0 && ((data.state && data.state === 'active') || !data.state)"
          :class="[data.value===attributes.selected.value ? 'active-item' : '']">
        <a class="dropdown-item" @click.prevent="setValue(data)">
          <slot :record="data" name="list_item">{{ data.name }}</slot>
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "Select",
  data() {
    return {
      query: null
    }
  },
  props: {
    attributes: {
      type: Object,
      default: () => ({})
    },
    border_color_danger: {
      type: String,
      default: ''
    },
    placeholder: {
      type: String,
      default: ''
    }
  },
  methods: {
    getWidth() {
      let elemInput = document.getElementById('dropdownMenuButton');
      if (elemInput) return elemInput.clientWidth
    },
    setValue(data) {
      this.attributes.selected = data
      this.$emit('selectUpdates')
      this.$emit('input')
    },
  }
}
</script>

<style scoped>
.dropdown-item {
  white-space: normal;
}

.select-menu {
  max-height: 230px;
  overflow: auto
}

li:hover {
  background-color: #cbcacf5c;
}

.active-item {
  background-color: #cbcacf;
}
</style>
