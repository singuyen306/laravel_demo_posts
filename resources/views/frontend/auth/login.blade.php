<!-- login form -->
<div class="login-page form-modal">
    <div class="form">
        <form class="login-form" id="loginForm" action="{{ route('frontend_login_submit') }}" method="post">
            {{ csrf_field() }}
            <div class="alert alert-warning login-alert">
                <p></p>
            </div>
            <input type="email" name="email_login" placeholder="email address"/>
            <input type="password" name="password_login" placeholder="password"/>
            <button type="submit" class="btn-login-submit">login</button>
            <p class="message">You don't have a account? <a href="#" class="show-form" data-form=".register-page">Create an account</a></p>
        </form>
    </div>
</div>