@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="loginContainer">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="shape3"></div>
        <div class="container">
            <div class="formRow">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="headingRow">
                        <div class="heading">Log in</div>
                        <!--<a href="{{ route('sign-up') }}" class="redirect">Sign up</a>-->
                    </div>
                    <?php if(isset($_GET['msg']) && $_GET['msg'] == 'error'){ ?>
                        <div class="alert alert-danger alert-dismissible" style="margin: 0 0 15px 0;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            <Strong>Error!</strong> You need to be logged in to view products!
                        </div>
                    <?php } ?>
                    <div class="inputRow">
                        <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                    </div>
                    <div class="inputRow">
                        <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                    </div>
                    <div class="inputRow">
                       <div class="form-check"><input type="checkbox" name="remember" id="remember" class="form-check-input" style="width: 15px;height: 15px;"> <label for="remember" class="form-check-label" style="color: #fff;margin-top: 3px;">
                                        Keep me logged In
                                    </label></div>
                    </div>
                    
                    <div class="rememberLink">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                Don't remember your password?
                                {{-- {{ __('Forgot Your Password?') }} --}}
                            </a>
                        @endif
                    </div>
                    <div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="buttonsRow">
                        <button type="submit" id="adminLogin">Log in</button>
{{--                        <div class="temporaryBtns">--}}
{{--                            <a href="">c</a>--}}
{{--                            <a href="">h</a>--}}
{{--                        </div>--}}
                    </div>
                </form>
                <div class="welcome">
                    <h1>The most reliable provider of high quality, innovative tours to the group market.</h1>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
