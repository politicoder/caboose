
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.component('new-project', require('./components/newProject.vue'));
 Vue.component('project', require('./components/Project.vue'));
 Vue.component('one-line-form', require('./components/OneLineForm.vue'));
 Vue.component('link-form', require('./components/AddLink.vue'));

 if (document.getElementById('login-app')) {

 	var app = new Vue({
 		el: '#login-app',
 		data: function() {
 			return {
 				formChosen: '',
 				ready: false
 			}
 		},
 		mounted: function() {
 			this.ready = true;
 		}
 	});

 }

 if (document.getElementById('app')) {
 	var Caboose = new Vue({
 		el: '#app',
 		data: function() {
 			return {
 				ready: false,
 				currentPanel: 'allProjects',
 				currentProject: {},
 				panels: {
 					projectsList: {
 						open: true
 					},
 					newProject: {
 						open: false
 					}
 				},
 				modal: {
 					on: false,
 					message: '',
 					form: {
 						headline: '',
 						on: false,
 						url: '',
 						type: '',
 						format: ''
 					}
 				}
 			}
 		},
 		methods: {
 			switchPanel: function(to) {
 				this.currentPanel = '';

 				var _caboose = this;
 				setTimeout(function(){
 					_caboose.currentPanel = to;
 				}, 700);
 				if (to != 'project') {
 					window.location.hash = '';
 				}
 			},
 			modalPop(modal) {
 				this.modal.message = modal.message;
 				this.modal.on = true;
 				var _caboose = this;
 				setTimeout(function(){
 					_caboose.modal.on = false;
 				}, modal.duration*1000);
 			},
 			switchToProject(id) {
 				this.$http.get('/api/project/'+id).then((response) => {
 					window.location.hash = 'project'+id;
 					this.currentProject = response.body;
 					this.switchPanel('project');
 				});
 			},
 			modalFormUp(form) {
 				this.modal.form.headline = form.headline;
 				this.modal.form.url = form.url;
 				this.modal.form.type = form.type;
 				this.modal.form.on = true;
 				this.modal.on = true;
 				if (form.type != 'link') {
 					this.modal.form.format = 'oneLine';
 				}
 				if (form.type == 'link') {
 					this.modal.form.format = 'link';
 				}
 			},
 			killModal() {
 				this.modal.on = false;
 			},
 			updateProject(project) {
 				this.currentProject = project;
 				this.killModal();
 			}
 		},
 		mounted: function() {

 			/* Check hash for project */
 			if (window.location.hash.includes('project')) {
 				var projectId = window.location.hash.slice(8);
 				this.switchToProject(projectId);
 			}

 			this.ready = true;
 		}
 	});
 }