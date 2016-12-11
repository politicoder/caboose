@extends('layouts.app')

@section('content')
<main id="app">

    <div class="modal" v-if="modal.on">
    
        <div class="modal-content" v-if="!modal.form.on">
            <img src="img/icons/plus.png" class="spinner">
            <span class="modal-message">@{{ modal.message }}</span>
        </div>

        <one-line-form v-if="modal.form.format == 'oneLine'" :form="modal.form" v-on:killmodal="killModal()" v-on:updateproject="updateProject($event)"></one-line-form>

        <link-form v-if="modal.form.format == 'link'" :form="modal.form" v-on:killmodal="killModal()" v-on:updateproject="updateProject($event)"></link-form>
    </div>

    <transition name="slide-fade">
        <div class="container caboose-panel all-projects-panel" v-if="currentPanel == 'allProjects'">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="panel-header">
                        <h1>Engage DC's Projects</h1>
                    </div>

                    <div class="projects-list">
                        <div class="corner-circle" id="circle1"></div>
                        <div class="corner-circle" id="circle2"></div>
                        <div class="corner-circle" id="circle3"></div>
                        <div class="corner-circle" id="circle4"></div>
                        <div class="projects-list-inner">
                            @foreach(App\Project::get() as $project)
                            <a href="#" class="button-link" v-on:click.prevent="switchToProject({{ $project->project_id }})">{{ $project->name }}<img src="{{ asset('img/icons/arrow-right.png') }}" class="button-icon"></a>
                            @endforeach
                        </div>
                    </div>

                    <div class="projects-list-new">
                        <a href="#" class="button-link yes" v-on:click.prevent="switchPanel('newProject')">
                            New Project
                            <img src="{{ asset('img/icons/plus.png') }}" class="button-icon">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </transition>

    {{-- New Project --}}
    <transition name="slide-fade">
        <new-project v-if="currentPanel == 'newProject'" v-on:backtolist="switchPanel('allProjects')" :token="'{{ csrf_token() }}'" user-id="{{ Auth::user()->id }}" v-on:modalpop="modalPop($event)" v-on:projectrequested="switchToProject($event)"></new-project>
    </transition>

    {{-- Project View --}}
    <transition name="slide-fade">
        <project v-if="currentPanel == 'project'" v-on:backtolist="switchPanel('allProjects')" v-on:getform="modalFormUp($event)" v-bind:project="currentProject"></project>
    </transition>



</main>

@endsection
