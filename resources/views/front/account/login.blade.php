@extends('front.layout.master')
@section('title','Login')

@section('body')
<!-- login section -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Login</h2>

                    @if(session('notification'))
                        <div class="alert alert-danger" role="alert">
                            {{session('notification')}}
                        </div>
                    @endif
                    <form action="" method="post">
                        @csrf
                        <div class="group-input">
                            <label for="username">Username or email address *</label>
                            <input type="text" id="username" name="email">
                        </div>
                        <div class="group-input">
                            <label for="password">Password *</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Save Password
                                    <input type="checkbox" id="save-pass" name="remember">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#" class="forget-pass">Forget password</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Sign In</button>
                    </form>
                    <div class="switch-login">
                        <a href="./account/register" class="or-login">Create account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

