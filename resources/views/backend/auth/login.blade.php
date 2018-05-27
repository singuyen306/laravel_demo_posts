@extends('backend.layouts.login')

@section('content')
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-wrapper">
                    <div class="box">
                        <form id="loginForm" method="post" action="{{ route('backend_login_submit') }}">
                            {{ csrf_field() }}
                            @if(session('error'))
                            <div class="alert alert-warning login-alert">
                                <p>{{ session('error') }}</p>
                            </div>
                            @endif
                            <div class="content-wrap">
                                <h6>Sign In</h6>
                                <input class="form-control" autofocus type="email" name="email_login" placeholder="E-mail address">
                                <input class="form-control" type="password" name="password_login" placeholder="Password">
                                <div class="action">
                                    <button class="btn btn-primary signup" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop