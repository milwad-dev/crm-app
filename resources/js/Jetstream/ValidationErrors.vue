<template>
    <div class="alert alert-danger text-sm p-2" role="alert" v-if="hasErrors">
        <div class="font-weight-bold">Whoops! Something went wrong.</div>

        <ul>
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>

<script>
  import { defineComponent } from 'vue'
	
	export default defineComponent({
		computed: {
			errors() {
				return this.$page.props.errors
			},

			hasErrors() {
				return Object.keys(this.errors).length > 0;
			},
		}
	})
</script>
