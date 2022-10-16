@extends('voyager::auth.master')

@section('content')
    <div class="login-container" style="margin-top:-300px">

        <h2>S'inscrire</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group form-group-default">
                <label>Name </label>
                <div class="controls">
                    <input type="text" name="name" id="name"  placeholder="Name" class="form-control"value="{{ old('name') }}" required>
                </div>
            </div>
            <div class="form-group form-group-default" >
                <label>E-mail</label>
                <div class="controls">
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="form-group form-group-default">
                <label>{{ __('voyager::generic.password') }}</label>
                <div class="controls">
                    <!-- <input id="password" type="password" name="password" placeholder="Password" class="form-control" required> -->
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group form-group-default" >
                <label>Confirm Password</label>
                <div class="controls">
                    <!-- <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required> -->
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <button type="submit" class="btn btn-block login-button">
                <span class="signingin hidden"><span class="voyager-refresh"></span> Singin up...</span>
                <span class="signin">{{__('Register')}}</span>
            </button>

        </form>

        <div style="clear:both"></div>

        @if(!$errors->isEmpty())
            <div class="alert alert-red">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div> <!-- .login-container -->
@endsection

@section('post_js')

    <script>
        var btn = document.querySelector('button[type="submit"]');
        var form = document.forms[0];
        var email = document.querySelector('[name="email"]');
        var password = document.querySelector('[name="password"]');
        var passwordConfirm = document.querySelector('[name="confirmPassword"]');
        btn.addEventListener('click', function(ev){
            
        });
        email.focus();
        document.getElementById('emailGroup').classList.add("focused");

        // Focus events for email and password fields
        email.addEventListener('focusin', function(e){
            document.getElementById('emailGroup').classList.add("focused");
        });
        email.addEventListener('focusout', function(e){
            document.getElementById('emailGroup').classList.remove("focused");
        });

        password.addEventListener('focusin', function(e){
            document.getElementById('passwordGroup').classList.add("focused");
        });
        password.addEventListener('focusout', function(e){
            document.getElementById('passwordGroup').classList.remove("focused");
        });

    </script>
@endsection
