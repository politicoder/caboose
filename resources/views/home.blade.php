@extends('layouts.app')

@section('content')

<main id="app">

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
                            <a href="#" class="button-link">
                                Ed Gillespie
                                <img src="{{ asset('img/icons/arrow-right.png') }}" class="button-icon">
                            </a>
                            <a href="#" class="button-link">
                                Garden State Initiative
                                <img src="{{ asset('img/icons/arrow-right.png') }}" class="button-icon">
                            </a>
                            <a href="#" class="button-link">
                                SPN Phase III
                                <img src="{{ asset('img/icons/arrow-right.png') }}" class="button-icon">
                            </a>
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
        <div class="container caboose-panel new-project-panel" v-if="currentPanel == 'newProject'">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel-header">
                        <h1>New Project</h1>
                        <h2>it will be lovely</h2>
                    </div>
                    <div class="form-group">
                        <label for="project-name">On what do we have the pleasure of working?</label>
                        <input type="text" id="project-name" placeholder="Something Amazing" class="text-input handwritten">
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="button-link no" v-on:click.prevent="switchPanel('allProjects')">
                                Just Kidding
                                <img src="{{ asset('img/icons/peace.png') }}" class="button-icon">
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" class="button-link yes">
                                Let's Do This
                                <img src="{{ asset('img/icons/plus.png') }}" class="button-icon">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>


</main>

@endsection
