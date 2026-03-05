\<template>
  <div>
    <div class="input-group d-flex justify-content-start border rounded dropdown-toggle"
         id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      <input class="form-control"
             v-for="(selected,index) in attributes.selected" v-if="selected.name==='' && attributes.selected.length===1"
             :class="[border_color_danger ? 'is-invalid' : '', attributes.selected.length>1 ? 'border-0': '']"
             :placeholder="placeholder"
             v-model="selected.name" @keyup="search()" autocomplete="off">
      <div class="form-selectgroup form-selectgroup-pills" v-else-if="selected.name!==''">
        <label class="form-selectgroup-item">
          <input type="radio" class="form-selectgroup-input"
                 v-model="selected.name">
<!--          remove m-1 in form-selectgroup-label-->
          <span class="form-selectgroup-label badge badge-outline text-purple m-1">
                {{ attributes.selected[index].name }}
            <a @click="removeItem(index,selected.value)">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                 <line x1="18" y1="6" x2="6" y2="18"></line>
                 <line x1="6" y1="6" x2="18" y2="18"></line>
              </svg>
            </a>
          </span>
        </label>
      </div>
    </div>
    <ul class="dropdown-menu select-menu" aria-labelledby="dropdownMenuButton1" :class="[displayStyle ? 'd-none': '']"
        :style="{width: getWidth()+'px'}">
      <li class="text-center"  v-if="attributes.data.length===0 || attributes.data.length+1===attributes.selected.length">No data available</li>
      <li v-for="data in attributes.data" :class="[data.value===attributes.selected.value ? 'active-item' : '']"
          v-if="attributes.data.length!==0 && !(attributes.selected.find(x => data.value===x.value))">
        <!--        <li v-for="data in attributes.data" :class="[data.value===attributes.selected ? 'active-item' : '']">-->
        <a class="dropdown-item" @click.prevent="setValue(data)">{{ data.name }}</a>
      </li>
    </ul>

  </div>
</template>

<script>
export default {
  name: "MultiSelect",
  data () {
    return {
      displayStyle: false,
      query: null,
    }
  },

  // props: [
  //   'attributes', 'border_color_danger'
  // ],
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
  border-color: var(--tblr-purple)!important;
  font-size: small;
  padding: 0.2rem 0.4rem;
}

.form-selectgroup-label svg {
  height: 15px;
}

</style>
