<template>
  <div>
    <div class="input-group d-flex justify-content-start border rounded dropdown-toggle"
         id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      <input class="form-control"
             v-for="(selected,index) in attributes.selected" v-if="selected.name==='' && attributes.selected.length===1"
             :class="[border_color_danger ? 'is-invalid' : '', attributes.selected.length>1 ? 'border-0': '']"
             v-model="selected.name" @keyup="search()" autocomplete="off">
      <div class="form-selectgroup form-selectgroup-pills" v-else-if="selected.name!==''">
        <label class="form-selectgroup-item">
          <span class="form-selectgroup-label m-1">
                {{ attributes.selected[index].name }}
            <a @click="removeItem(index,selected.value)">
            </a>
          </span>
        </label>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "MultiSelectDisabled",
  data () {
    return {
      displayStyle: false,
      query: null,
    }
  },
  props: [
    'attributes', 'border_color_danger'
  ],
  methods: {
    removeItem(index,value) {
      this.displayStyle = true
      this.attributes.selected.splice(index, 1)
      this.$emit('removeData',value)
      if(this.attributes.selected.length === 0){
        this.attributes.selected.push({
          name: '',
          value: null
        })
      }
      setTimeout((x) => { this.displayStyle = false }, 100)
    },
    getWidth() {
      let elemInput = document.getElementById('dropdownMenuButton1');
      if (elemInput)  return elemInput.clientWidth
    },
    setValue(data) {
      this.attributes.selected.push(data)
      this.$emit('selectUpdates',data.value)
      this.$emit('queryUpdates', '')
    },
    search() {
      this.$emit('queryUpdates', this.attributes.selected[this.attributes.selected.length].name)
      // if (this.attributes.selected.name==='') {
      //   this.attributes.selected = {}
      //   this.$emit('selectUpdates', this.attributes.selected.name)
      // }
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
.dropdown-toggle:after {
  display: none!important;
}
.form-selectgroup-label{
  font-size: small;
  padding: 0.2rem 0.4rem;
}

.form-selectgroup-label svg {
  height: 15px;
}
</style>
