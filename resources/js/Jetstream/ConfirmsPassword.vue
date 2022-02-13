<template>
  <span>
    <span @click="startConfirmingPassword">
      <slot />
    </span>

    <jet-dialog-modal id="confirmingPasswordModal">
      <template #title>
        {{ title }}
      </template>

      <template #content>
        {{ content }}

        <div class="mt-4">
          <jet-input type="password" placeholder="Password"
                     ref="password"
                     v-model="form.password"
                     :class="{ 'is-invalid': form.error }"
                     @keyup.enter="confirmPassword" />

          <jet-input-error :message="form.error" />
        </div>
      </template>

      <template #footer>
        <jet-secondary-button data-bs-dismiss="modal">
          Cancel
        </jet-secondary-button>

        <jet-button class="ms-2" @click="confirmPassword" :class="{ 'text-black-50': form.processing }" :disabled="form.processing">
          <div v-show="form.processing" class="spinner-border spinner-border-sm" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          
          {{ button }}
        </jet-button>
      </template>
    </jet-dialog-modal>
  </span>
</template>

<script>
  import { defineComponent } from 'vue'
  import JetButton from './Button.vue'
  import JetDialogModal from './DialogModal.vue'
  import JetInput from './Input.vue'
  import JetInputError from './InputError.vue'
  import JetSecondaryButton from './SecondaryButton.vue'

  export default defineComponent({
    emits: ['confirmed'],

    props: {
      title: {
        default: 'Confirm Password',
      },
      content: {
        default: 'For your security, please confirm your password to continue.',
      },
      button: {
        default: 'Confirm',
      }
    },

    components: {
      JetButton,
      JetDialogModal,
      JetInput,
      JetInputError,
      JetSecondaryButton,
    },

    data() {
      return {
        modal: null,

        form: this.$inertia.form({
          password: '',
          error: '',
        }, {
          bag: 'confirmPassword',
        })
      }
    },

    methods: {
      startConfirmingPassword() {
        this.form.error = '';
        let el = document.querySelector('#confirmingPasswordModal')
        this.modal = new bootstrap.Modal(el)

        axios.get(route('password.confirmation')).then(response => {
          if (response.data.confirmed) {
            this.$emit('confirmed');
          } else {
            this.modal.toggle()
            this.form.password = '';

            setTimeout(() => {
              this.$refs.password.focus()
            }, 250)
          }
        })
      },

      confirmPassword() {
        this.form.processing = true;

        axios.post(route('password.confirm'), {
          password: this.form.password,
        }).then(response => {
          this.bootstrap.modal('hide');
          this.form.password = '';
          this.form.error = '';
          this.form.processing = false;

          this.$nextTick(() => this.$emit('confirmed'));
        }).catch(error => {
          this.form.processing = false;
          this.form.error = error.response.data.errors.password[0];
        });
      }
    }
  })
</script>
