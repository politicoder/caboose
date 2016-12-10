@extends('layouts.app')

@section('content')
<div class="container" id="login-app">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel-header">
                <h1>Hi!</h1>
            </div>

            {{-- Choose Login or Register --}}
            <div class="row toggle-container">
                <div class="col-sm-6">
                    <button class="toggle" :class="{ 'toggle-chosen': formChosen == 'login', 'toggle-unchosen': formChosen == 'register' }" v-on:click.prevent="formChosen = 'login'">We've met before</button>
                </div>
                <div class="col-sm-6">
                    <button class="toggle" :class="{ 'toggle-chosen': formChosen == 'register', 'toggle-unchosen': formChosen == 'login' }" v-on:click.prevent="formChosen = 'register'">I'm new here</button>
                </div>
            </div>

            {{-- Login --}}
            <form class="login-form" role="form" method="POST" action="{{ url('/login') }}" v-if="formChosen == 'login'">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">Electronic Mailing Address</label>
                    <input type="email" class="text-input handwritten" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password <span>(for your eyes only)</span></label>
                    <input id="password" class="text-input" name="password" type="password" required>
                </div>

                <div class="form-group align-center">
                    <button class="yes" type="submit">All Aboard</button>
                </div>

            </form>

            {{-- Register --}}
            <form class="login-form" role="form" method="POST" action="{{ url('/register') }}" v-if="formChosen == 'register'">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Hello, my name is</label>
                    <input type="text" class="text-input handwritten" name="name" value="{{ old('name') }}" id="name" required autofocus>
                </div>
                <div class="form-group">
                    <label for="email">Electronic Mailing Address</label>
                    <input type="email" class="text-input handwritten" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password <span>(for your eyes only)</span></label>
                    <input id="password" class="text-input" name="password" type="password" required>
                </div>
                <div class="form-group">
                    <label for="password-confirm">Once more, with feeling</label>
                    <input id="password-confirm" class="text-input" type="password" name="password_confirmation" required>
                </div>
                <div class="form-group align-center">
                    <button class="yes" type="submit">All Aboard</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
