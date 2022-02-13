<template>
  <app-layout title="Profile">
    <template #header>
      <h2 class="h4 font-weight-bold">
        Profile
      </h2>
    </template>

    <div v-if="$page.props.jetstream.canUpdateProfileInformation">
      <update-profile-information-form :user="$page.props.user" />

      <jet-section-border />
    </div>

    <div v-if="$page.props.jetstream.canUpdatePassword">
      <update-password-form />

      <jet-section-border />
    </div>

    <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
      <two-factor-authentication-form />

      <jet-section-border />
    </div>

    <logout-other-browser-sessions-form :sessions="sessions" />

    <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
      <jet-section-border />

      <delete-user-form />
    </template>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue'
import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue'
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue'
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue'
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue'

export default defineComponent({
  props: ['sessions'],

  components: {
    AppLayout,
    DeleteUserForm,
    JetSectionBorder,
    LogoutOtherBrowserSessionsForm,
    TwoFactorAuthenticationForm,
    UpdatePasswordForm,
    UpdateProfileInformationForm,
  },
})
</script>
