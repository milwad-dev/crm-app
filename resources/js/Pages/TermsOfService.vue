<template>
  <Head title="Terms of Service" />

  <div class="row justify-content-center pt-4">
    <div class="col-6">
      <div>
        <jet-authentication-card-logo />
      </div>

      <div class="card shadow-sm">
        <div v-html="terms" class="card-body">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue"
import { Head } from '@inertiajs/inertia-vue3'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'

export default defineComponent({
  props: ['terms'],

  components: {
    Head,
    JetAuthenticationCardLogo,
  },
})
</script>
