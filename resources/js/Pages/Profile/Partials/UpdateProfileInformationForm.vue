<template>
  <jet-form-section @submitted="updateProfileInformation">
    <template #title>
      Profile Information
    </template>

    <template #description>
      Update your account's profile information and email address.
    </template>

    <template #form>
      <jet-action-message :on="form.recentlySuccessful">
        Saved.
      </jet-action-message>

      <!-- Profile Photo -->
      <div class="mb-3" v-if="$page.props.jetstream.managesProfilePhotos">
        <!-- Profile Photo File Input -->
        <input type="file" hidden
               ref="photo"
               @change="updatePhotoPreview">

        <jet-label for="photo" value="Photo" />

        <!-- Current Profile Photo -->
        <div class="mt-2" v-show="! photoPreview">
          <img :src="user.profile_photo_url" alt="Current Profile Photo" class="rounded-circle">
        </div>

        <!-- New Profile Photo Preview -->
        <div class="mt-2" v-show="photoPreview">
          <img :src="photoPreview" class="rounded-circle" width="80px" height="80px">
        </div>

        <jet-secondary-button class="mt-2 me-2" type="button" @click.prevent="selectNewPhoto">
          Select A New Photo
        </jet-secondary-button>

        <jet-secondary-button type="button" class="mt-2" @click.prevent="deletePhoto" v-if="user.profile_photo_path">
          Remove Photo
        </jet-secondary-button>

        <jet-input-error :message="form.errors.photo" class="mt-2" />
      </div>

      <div class="w-75">
        <!-- Name -->
        <div class="mb-3">
          <jet-label for="name" value="Name" />
          <jet-input id="name" type="text" v-model="form.name"
                     :class="{ 'is-invalid': form.errors.name }" autocomplete="name" />
          <jet-input-error :message="form.errors.name" />
        </div>

        <!-- Email -->
        <div class="mb-3">
          <jet-label for="email" value="Email" />
          <jet-input id="email" type="email" v-model="form.email"
                     :class="{ 'is-invalid': form.errors.email }" />
          <jet-input-error :message="form.errors.email" />
        </div>
      </div>
    </template>

    <template #actions>
      <jet-button :class="{ 'text-white-50': form.processing }" :disabled="form.processing">
        <div v-show="form.processing" class="spinner-border spinner-border-sm" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>

        Save
      </jet-button>
    </template>
  </jet-form-section>
</template>

<script>
import { defineComponent } from 'vue'
import JetButton from '@/Jetstream/Button.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

export default defineComponent({
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
  },

  props: ['user'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        name: this.user.name,
        email: this.user.email,
        photo: null,
      }),

      photoPreview: null,
    }
  },

  methods: {
    updateProfileInformation() {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0]
      }

      this.form.post(route('user-profile-information.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => (this.clearPhotoFileInput()),
      });
    },

    selectNewPhoto() {
      this.$refs.photo.click();
    },

    updatePhotoPreview() {
      const photo = this.$refs.photo.files[0];

      if (! photo) return;

      const reader = new FileReader();

      reader.onload = (e) => {
        this.photoPreview = e.target.result;
      };

      reader.readAsDataURL(photo);
    },

    deletePhoto() {
      this.$inertia.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
          this.photoPreview = null;
          this.clearPhotoFileInput();
        },
      });
    },

    clearPhotoFileInput() {
      if (this.$refs.photo?.value) {
        this.$refs.photo.value = null;
      }
    },
  },
})
</script>
