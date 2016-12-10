
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

 Vue.component('example', require('./components/Example.vue'));

 if (document.getElementById('login-app')) {

 	var app = new Vue({
 		el: '#login-app',
 		data: function() {
 			return {
 				formChosen: ''
 			}
 		}
 	});

 }

 if (document.getElementById('app')) {
 	var Caboose = new Vue({
 		el: '#app',
 		data: function() {
 			return {
 				currentPanel: 'allProjects',
 				panels: {
 					projectsList: {
 						open: true
 					},
 					newProject: {
 						open: false
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
 			}
 		}
 	})
 }