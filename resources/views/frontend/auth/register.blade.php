<!--  form -->
<div class="register-page form-modal">
    <div class="form">
        <form class="register-form" id="registerForm" method="post" action="{{ route('frontend_register_submit') }}">
            {{ csrf_field() }}
            <div class="alert alert-warning login-alert">
                <p>
                    {{ $errors->first('email_register') }}
                    {{ $errors->first('name_register') }}
                    {{ $errors->first('password_register') }}
                </p>
            </div>
            <input type="text" name="name_register" placeholder="name"/>
            <input type="email" name="email_register" placeholder="email address"/>
            <input type="password" name="password_register" placeholder="password"/>
            <button type="submit" class="btn-register-submit">Register</button>
            <p class="message">Already registered? <a href="#" class="show-form" data-form=".login-page">Sign In</a></p>
        </form>
    </div>
</div>