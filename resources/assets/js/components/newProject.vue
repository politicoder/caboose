<template>
    <div class="container caboose-panel new-project-panel">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel-header">
                    <h1>New Project</h1>
                    <h2>it will be lovely</h2>
                    <h1>{{ user_id }}</h1>
                </div>
                <div class="form-group">
                    <label for="project-name">On what do we have the pleasure of working?</label>
                    <input type="text" id="project-name" placeholder="Something Amazing" class="text-input handwritten" v-model="request.name">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="button-link no" v-on:click.prevent="backToList()">
                                Just Kidding
                                <img src="img/icons/peace.png" class="button-icon">
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" class="button-link yes" v-on:click.prevent="submitForm()">
                                Let's Do This
                                <img src="img/icons/plus.png" class="button-icon">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group" v-if="nameTaken">
                    <span class="error"><strong>Oops!</strong> That name is taken.</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['token', 'userId'],
        data: function() {
            return {
                nameTaken: false,
                request: {
                    name: '',
                    _token: this.token,
                    user_id: this.userId
                }
            }
        },
        methods: {
            backToList: function() {
                this.$emit('backtolist');
            },
            submitForm: function() {
                this.$http.post("/api/project", this.request).then((response) => {
                    if (response.body.error) {
                        this.nameTaken = true;
                    } else {
                        var modal = {
                            message: 'Building your caboose...',
                            duration: 3
                        }
                        this.$emit('modalpop', modal);
                        var _panel = this;
                        setTimeout(function() {
                            _panel.$emit('projectrequested', response.body.new_project_id);
                        }, modal.duration*1000);
                    }
                });
            }
        }
    }
</script>