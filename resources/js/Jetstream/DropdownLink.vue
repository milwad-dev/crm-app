<template>
  <button type="submit" @click="$emit('clicked')" class="dropdown-item px-4" v-if="as == 'button'">
    <slot></slot>
  </button>

  <Link :href="href" class="dropdown-item px-4" v-else>
    <slot></slot>
  </Link>
</template>

<script>
  import { defineComponent } from 'vue'
  import { Link } from '@inertiajs/inertia-vue3'

  export default defineComponent({
    components: {
      Link,
    },
    props: ['href', 'as']
  })
</script>
