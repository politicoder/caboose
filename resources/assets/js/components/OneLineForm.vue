<template>
	<div class="modal-content">
		<h1>{{ form.headline }}</h1>
		<input type="text" class="text-input" v-model="input">
		<button class="yes modal-button"><img src="img/icons/check.png" class="button-icon" alt="Submit" v-on:click.prevent="submit()"></button>
		<button class="no modal-button" v-on:click.prevent="killModal()"><img src="img/icons/x.png" alt="Close" class="button-icon"></button>
	</div>
</template>

<script>
	export default {
		props: ['form'],
		data: function() {
			return {
				input: ''
			}
		},
		methods: {
			submit: function() {

				var request = {
					key: this.form.type,
					value: this.input
				};

				this.$http.post(this.form.url, request).then((response) => {
					this.$emit('updateproject', response.body);
				});

			},
			killModal: function() {
				this.$emit('killmodal');
			}
		}
	}
</script>