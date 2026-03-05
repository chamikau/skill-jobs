<template>
  <div class="w-full">


    <!--    Uploaded Files-->
    <div class="row mt-2">
      <div v-for="(file, index) in fileList" class="col-auto">
        <div>
          <a :href="file.src ? file.src : file.tempUrl" class="cursor-pointer" rel="noopener noreferre"
             target="_blank">
            <!--            PDF file view -->
            <div v-if="file.type === 'application/pdf' ? file.type : file.mime_type === 'application/pdf'"
                 :style="[{
                     backgroundImage: `url(https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg)`,
                     height: '110px',
                     width: '110px',
                     backgroundRepeat: 'no-repeat',
                     backgroundColor: '#FDD8D8',
                     backgroundSize: 'auto 100%'}]"
                 class="d-flex mt-1 rounded-3 shadow justify-content-end">

              <!--            <iframe :src="file.tempUrl" height="100px"-->
              <!--                    style="overflow:hidden" width="100%">-->
              <!--            </iframe>-->
              <!--              <a v-if="file.id" class="link-secondary" @click.prevent="downloadImg(file)">-->
              <!--                &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/x &ndash;&gt;-->
              <!--                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download bg-white rounded-circle m-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="blue" fill="none" stroke-linecap="round" stroke-linejoin="round">-->
              <!--                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>-->
              <!--                  <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>-->
              <!--                  <path d="M7 11l5 5l5 -5"></path>-->
              <!--                  <path d="M12 4l0 12"></path>-->
              <!--                </svg>-->
              <!--              </a>-->
              <a class="link-secondary" @click.prevent="remove(index, file)">
                <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash bg-white rounded-circle m-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="red" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M4 7l16 0"></path>
                  <path d="M10 11l0 6"></path>
                  <path d="M14 11l0 6"></path>
                  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                </svg>
              </a>
            </div>
            <!--            Image File view -->
            <div v-else
                 :style="[{
                     backgroundImage: `url(${file.src ? file.src : file.tempUrl})`,
                     height: '110px',
                     backgroundRepeat: 'no-repeat',
                     backgroundColor: '#CFCFCF',
                     backgroundSize: 'auto 100%'}]"
                 class="mt-1 rounded-3 shadow d-flex justify-content-end"
            >
              <!--              <a v-if="file.id" class="link-secondary" @click.prevent="downloadImg(file)">-->
              <!--                &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/x &ndash;&gt;-->
              <!--                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download bg-white rounded-circle m-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="blue" fill="none" stroke-linecap="round" stroke-linejoin="round">-->
              <!--                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>-->
              <!--                  <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>-->
              <!--                  <path d="M7 11l5 5l5 -5"></path>-->
              <!--                  <path d="M12 4l0 12"></path>-->
              <!--                </svg>-->
              <!--              </a>-->

              <a class="link-secondary" @click.prevent="remove(index, file)">
                <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash bg-white rounded-circle m-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="red" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M4 7l16 0"></path>
                  <path d="M10 11l0 6"></path>
                  <path d="M14 11l0 6"></path>
                  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                </svg>
              </a>
            </div>
            <!--            <a :href="file.tempUrl" download="a97c7319-f09c-4f63-af81-d5bb68f5c508" target="_blank">-->
            <!--              <img :src="file.tempUrl" alt="W3Schools">-->
            <!--            </a>-->
          </a>
        </div>

      </div>
      <!--    Upload Files Drop Box-->
      <div class="dropzone mt-1 col-auto mx-2">
        <img v-if="!isUploading" class="upload-icon mt-4 p-1" src="https://100dayscss.com/codepen/upload.svg"/>
        <div v-else class="spinner-border text-secondary mt-4" style="width: 2rem; height: 2rem;" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <input
          ref="fileUpload"
          accept=".jpeg,.jpg,.png,image/jpeg,image/png,application/pdf"
          class="upload-input"
          multiple
          type="file"
          @change="showFile()"
          :key="uploadFieldKey"
        />
      </div>
    </div>

  </div>
</template>

<script>

export default {
  name: 'FileUpload',
  props: {
    documents: {
      type: Array,
      default: () => []
    },
    isUploading: {
      type: Boolean,
      default: true
    }
  },
  data() {
    return {
      readUrl: {},
      fileList: [],
      displayStyle: false,
      uploadFieldKey: 1
    }
  },
  mounted() {
    this.fileList = this.documents
  },
  methods: {
    async showFile() {
      this.$emit('setUploadingStatus', true)
      let files = this.$refs.fileUpload.files
      let fileList = this.fileList
      const file_keys = await Promise.all(Array.from(files).map(async file => {
        const key = (await window.Vapor.store(this.$axios, file, {visibility: `private`, withCredentials: true})).key
        file.key = key
        file.src = URL.createObjectURL(file)
        fileList.push(file)
        this.$emit('setFileKey', key)
      }))
      this.fileList = fileList
      this.$emit('input')
      this.$emit('setUploadingStatus', false)

      // console.log(this.fileList)
    },
    remove(index, file) {
      if (file.id)
        this.$emit('removeFileKey', this.fileList[index].key, file.id)
      else
        this.$emit('removeFileKey', this.fileList[index].key)
      this.fileList.splice(index, 1)
      this.uploadFieldKey++
    },
    async downloadImg(file) {
      const fileLink = file.tempUrl
      const response = await fetch(fileLink);
      const blob = await response.blob();
      const link = document.createElement("a");
      link.href=URL.createObjectURL(blob)
      link.download = "file"
      link.click()
      // try {
      //   await this.$axios.$post(`/api/admin/payment-requests/${this.$route.params.id}/download-file/${file.id}`)
      // }catch (e){
      // }
    },
  },
}
</script>

<style scoped>

.dropzone {
  width: 110px;
  height: 110px;
  border: 1px solid #999;
  border-radius: 10px;
  text-align: center;
}

.upload-icon {
  margin: 25px 2px 2px 2px;
}

.upload-input {
  position: relative;
  top: -62px;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
}

.rounded-3 {
  width: 110px;
  border: 1px solid grey;
}

</style>
