<template>
  <button :type="type" class="btn btn-outline-secondary text-uppercase">
    <slot></slot>
  </button>
</template>

<script>
  import { defineComponent } from 'vue'

  export default defineComponent({
    props: {
      type: {
        type: String,
        default: 'button',
      },
    }
  })
</script>
