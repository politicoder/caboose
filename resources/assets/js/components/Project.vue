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
						<div class="form-group">
							<label>Basecamp</label>
							<a href="#" class="button-link" v-if="project.basecamp_url">
								Climb that mountain
								<img src="img/icons/flag.png" class="button-icon">
							</a>
							<a v-else href="#" v-on:click.prevent="getForm('Add Basecamp Link', 'basecamp_url')" class="button-link ghost">
								Add Basecamp URL
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