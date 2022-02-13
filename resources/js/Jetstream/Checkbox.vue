<template>
  <input type="checkbox" :value="value" v-model="proxyChecked"
         class="form-check-input">
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    emits: ['update:checked'],

    props: {
      checked: {
        type: [Array, Boolean],
        default: false,
      },
      value: {
        default: null,
      },
    },

    computed: {
      proxyChecked: {
        get() {
          return this.checked;
        },

        set(val) {
          this.$emit("update:checked", val);
        },
      },
    },
  })
</script>

