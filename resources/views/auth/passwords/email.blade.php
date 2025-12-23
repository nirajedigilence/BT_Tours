@extends('layouts.front')

@section('content')

    <div class="notIndexContainer">

        <div class="loginContainer">
            <div class="shape1"></div>
            <div class="shape2"></div>
            <div class="shape3"></div>
            <div class="container">
                <div class="formRow">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="headingRow">
                            <div class="heading small">{{ __('Reset Password') }}</div>
{{--                            <a href="#" class="redirect">Sign up</a>--}}
                        </div>
                        <div class="inputRow">
                            <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                        </div>

                        <div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span><br>
                            @enderror

                            @if (session('status'))
                                <div class="success-feedback" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <div class="buttonsRow">
                            <button type="submit">{{ __('Send Password Reset Link') }}</button>
{{--                            <div class="temporaryBtns">--}}
{{--                                <a href="">c</a>--}}
{{--                                <a href="">h</a>--}}
{{--                            </div>--}}
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
