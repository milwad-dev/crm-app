<template>
  <Head title="Privacy Policy" />
    <div class="row justify-content-center pt-4">
      <div class="col-6">
        <div>
          <jet-authentication-card-logo />
        </div>

        <div class="card shadow-sm">
          <div v-html="policy" class="card-body">
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
  props: ['policy'],

  components: {
    Head,
    JetAuthenticationCardLogo,
  },
})
</script>
