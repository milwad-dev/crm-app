<template>
  <div v-show="message" class="invalid-feedback" role="alert">
    <strong>{{ message }}</strong>
  </div>
</template>

<script>
  import { defineComponent } from 'vue'

  export default defineComponent({
    props: ['message']
  })
</script>
