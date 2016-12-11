<template>
	<div class="modal-content">
		<h1>{{ form.headline }}</h1>
		<div class="form-group">
			<label for="link-text">Link Name</label>
			<input type="text" class="text-input" v-model="link_text" id="link-text">
		</div>
		<div class="form-group">
			<label for="link-url">Link URL</label>
			<input type="text" class="text-input" v-model="link_url" id="link-url">
		</div>
		<button class="yes modal-button"><img src="img/icons/check.png" class="button-icon" alt="Submit" v-on:click.prevent="submit()"></button>
		<button class="no modal-button" v-on:click.prevent="killModal()"><img src="img/icons/x.png" alt="Close" class="button-icon"></button>
	</div>
</template>

<script>
	export default {
		props: ['form'],
		data: function() {
			return {
				link_text: '',
				link_url: ''
			}
		},
		methods: {
			submit: function() {

				var request = {
					key: this.form.type,
					value: {
						link_text: this.link_text,
						link_url: this.link_url
					}
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