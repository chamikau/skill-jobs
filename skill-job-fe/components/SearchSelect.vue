<template>
  <div>
    <input class="form-control dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
           v-model="attributes.selected.name" @keyup="search()" autocomplete="off">
    <ul class="dropdown-menu select-menu" aria-labelledby="dropdownMenuButton1"
    :style="{width: getWidth()+'px'}">
      <li v-for="data in attributes.data" :class="[data.value===attributes.selected.value ? 'active-item' : '']">
        <a class="dropdown-item" @click.prevent="setValue(data)">{{ data.name }}</a>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "SearchSelect",
  data () {
    return {
      query: null
    }
  },
  props: [
    'attributes'
  ],
  methods: {
    getWidth() {
      let elemInput = document.getElementById('dropdownMenuButton1');
      if (elemInput)  return elemInput.clientWidth
    },
    setValue(data) {
      this.attributes.selected = data
      this.$emit('selectUpdates')
      this.$emit('queryUpdates', '')
    },
    search() {
      this.$emit('queryUpdates', this.attributes.selected.name)
    }
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
