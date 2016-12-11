<template>
	<div class="container caboose-panel new-project-panel">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel-header">
					<h1>{{ project.name }}</h1>
					<h2>added by <strong>{{ project.user }}</strong></h2>
				</div>
				<div class="row">
					<div class="col-sm-5 col-sm-offset-1">

						<!-- Basecamp -->
						<div class="form-group">
							<label>Basecamp</label>
							<a v-bind:href="project.basecamp_url" target="_blank" class="button-link" v-if="project.basecamp_url">
								Climb that mountain
								<img src="img/icons/flag.png" class="button-icon">
							</a>
							<a v-else href="#" v-on:click.prevent="getForm('Add Basecamp Link', 'basecamp_url')" class="button-link ghost">
								Add Basecamp URL
								<img src="img/icons/plus.png" class="button-icon">
							</a>
						</div>

						<!-- Invision -->
						<div class="form-group">
							<label>Invision</label>
							<a v-bind:href="project.invision_url" target="_blank" class="button-link" v-if="project.invision_url">
								Visualize It
								<img src="img/icons/lightbulb.png" class="button-icon">
							</a>
							<a v-else href="#" v-on:click.prevent="getForm('Add Invision Link', 'invision_url')" class="button-link ghost">
								Add Invision URL
								<img src="img/icons/plus.png" class="button-icon">
							</a>
						</div>

						<!-- Invision Password -->
						<div class="form-group">
							<label>Invision Password</label>
							<span class="text-box" v-if="project.invision_password">{{ project.invision_password }}</span>
							<a v-else href="#" v-on:click.prevent="getForm('Add Invision Password', 'invision_password')" class="button-link ghost">
								Add Invision Password
								<img src="img/icons/plus.png" class="button-icon">
							</a>
						</div>

					</div>

					<div class="col-sm-5">

						<!-- Staging -->
						<div class="form-group">
							<label>Staging Site</label>
							<a v-bind:href="project.staging_url" target="_blank" class="button-link" v-if="project.staging_url">
								{{ project.name }}
								<img src="img/icons/engage.png" class="button-icon">
							</a>
							<a v-else href="#" v-on:click.prevent="getForm('Add Staging Link', 'staging_url')" class="button-link ghost">
								Add Staging URL
								<img src="img/icons/plus.png" class="button-icon">
							</a>
						</div>

						<!-- Links -->
						<div class="form-group">
							<label>Links</label>
							<a target="_blank" class="button-link" v-for="link in project.links" v-bind:href="link.link_url">
								{{ link.link_text }}
								<img src="img/icons/link.png" class="button-icon">
							</a>
							<a href="#" v-on:click.prevent="getForm('Add Link', 'link')" class="button-link ghost">
								Add a link
								<img src="img/icons/plus.png" class="button-icon">
							</a>
						</div>

					</div>

				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4">
							<a href="#" class="button-link no" v-on:click.prevent="backToList()">
								Back to Projects
								<img src="img/icons/peace.png" class="button-icon">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['project'],
		computed: {
			api_url: function() {
				return 'api/project/'+this.project.id;
			}
		},
		methods: {

			getForm: function(headline, type) {
				var form = {
					headline: headline,
					url: this.api_url,
					type: type
				}
				this.$emit('getform', form);
			},

			backToList: function() {
				this.$emit('backtolist');
			},
		}
	}
</script>