<template>
	<div class="container caboose-panel new-project-panel">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel-header">
					<h1>{{ project.name }}</h1>
					<h2>added by <strong>{{ project.user }}</strong></h2>
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
		methods: {
			backToList: function() {
				this.$emit('backtolist');
			},
		}
	}
</script>