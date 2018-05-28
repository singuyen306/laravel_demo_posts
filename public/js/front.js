/*global $, document, Chart, LINECHART, data, options, window, setTimeout*/

var twentyci = {
    init: function () {
        this.loginForm = $('#loginForm');
        this.registerForm = $('#registerForm');
        this.postForm = $('#createPostForm');
        this.btnLogin = $('.btn-login-submit');
        this.btnRegister = $('.btn-register-submit');
        this.btnPost = $('.btn-create-post');
        this.emailFormat = /\S+@\S+\.\S+/;
        //message
        this.emailEmptyMessage = 'Please enter an email';
        this.emailInvalidMessage = 'The value is invalid email address';
        this.passwordEmptyMessage = 'Please enter a password';
        this.nameEmptyMessage = 'Please enter your name';
        this.coverEmptyMessage = 'Please upload an image cover';
        this.titleEmptyMessage = 'Please enter title post';
        this.bodyEmptyMessage = 'Please enter content post';

        //binding event
        this.bindEvent();
    },
    bindEvent: function () {
        this.showPostDetail();
        this.showModalForm();
        this.hideModalForm();
        this.handleSubmitFormLogin();
        this.handleSubmitFormRegister();
        this.handleSubmitFormCreatePost();
    },
    handleSubmitFormLogin: function(){
        // submit form login
        $(this.btnLogin).click(function (e) {
            e.preventDefault();
            var email = $(twentyci.loginForm).find('input[name="email_login"]');
            var password = $(twentyci.loginForm).find('input[name="password_login"]');

            //validate empty email
            if(twentyci.validateEmpty($(email).val())){
                twentyci.showMessageError(twentyci.loginForm, twentyci.emailEmptyMessage);
                twentyci.focusFieldError(email);
                return false;
            }
            //validate email format
            if(!twentyci.validateEmailFormat(email)){
                twentyci.showMessageError(twentyci.loginForm, twentyci.emailInvalidMessage);
                twentyci.focusFieldError(email);
                return false;
            }
            //validate empty password
            if(twentyci.validateEmpty($(password).val())){
                twentyci.showMessageError(twentyci.loginForm, twentyci.passwordEmptyMessage);
                twentyci.focusFieldError(password);
                return false;
            }

            //hide message warning
            $(twentyci.loginForm).find('.alert-warning').hide();
            //submit form
            $(twentyci.loginForm).submit();
        });
    },
    handleSubmitFormRegister: function(){
        // submit form login
        $(this.btnRegister).click(function (e) {
            e.preventDefault();
            var email = $(twentyci.registerForm).find('input[name="email_register"]');
            var password = $(twentyci.registerForm).find('input[name="password_register"]');
            var name = $(twentyci.registerForm).find('input[name="name_register"]');

            //validate empty name
            if(twentyci.validateEmpty($(name).val())){
                twentyci.showMessageError(twentyci.registerForm, twentyci.nameEmptyMessage);
                twentyci.focusFieldError(name);
                return false;
            }
            //validate empty email
            if(twentyci.validateEmpty($(email).val())){
                twentyci.showMessageError(twentyci.registerForm, twentyci.emailEmptyMessage);
                twentyci.focusFieldError(email);
                return false;
            }
            //validate email format
            if(!twentyci.validateEmailFormat(email)){
                twentyci.showMessageError(twentyci.registerForm, twentyci.emailInvalidMessage);
                twentyci.focusFieldError(email);
                return false;
            }
            //validate empty password
            if(twentyci.validateEmpty($(password).val())){
                twentyci.showMessageError(twentyci.registerForm, twentyci.passwordEmptyMessage);
                twentyci.focusFieldError(password);
                return false;
            }

            //hide message warning
            $(twentyci.registerForm).find('.alert-warning').hide();
            //submit form
            $(twentyci.registerForm).submit();
        });
    },
    handleSubmitFormCreatePost: function(){
        // submit form login
        $(this.btnPost).click(function (e) {
            e.preventDefault();
            var title = $(twentyci.postForm).find('input[name="title"]');
            var body = $(twentyci.postForm).find('textarea[name="body"]');
            var cover = $(twentyci.postForm).find('input[name="cover"]');
            var flag = true;

            //validate empty title
            if(twentyci.validateEmpty($(cover).val())){
                twentyci.showMessageError(twentyci.postForm, twentyci.coverEmptyMessage);
                twentyci.focusFieldError(cover);
                return false;
            }
            //validate empty title
            if(twentyci.validateEmpty($(title).val())){
                twentyci.showMessageError(twentyci.postForm, twentyci.titleEmptyMessage);
                twentyci.focusFieldError(title);
                return false;
            }
            //validate title unique
            $.get('posts/has-exist-post', {title: $(title).val()}, function (response) {
                if(response.status){
                    twentyci.showMessageError(twentyci.postForm, response.message);
                    twentyci.focusFieldError(title);
                    return false;
                }else{
                    //validate empty body
                    if(twentyci.validateEmpty($(body).val())){
                        twentyci.showMessageError(twentyci.postForm, twentyci.bodyEmptyMessage);
                        twentyci.focusFieldError(body);
                        return false;
                    }

                    //hide message warning
                    $(twentyci.postForm).find('.alert-warning').hide();
                    //submit form
                    $(twentyci.postForm).submit();
                }
            });
        });
    },
    hideMessageCreatePost: function (e) {
        setTimeout(function () {
            $('.alert-success').fadeOut();
        },5000);
    },
    hideModalForm: function(){
        $('.search-area .close-btn').on('click', function () {
            $('.search-area').fadeOut();
        });
    },
    showModalForm: function () {
        //show modal form: login, register, create post
        $('.show-form').click(function (e) {
            e.preventDefault();
            var dataForm = $(this).data('form');
            $('.form-modal').removeClass('active');
            $(dataForm).addClass('active').find('form input:first-child').focus();
            $('.search-area').fadeIn();

            return false;
        });
    },
    showPostDetail: function () {
        $('.view-post-detail').click(function () {
            //call ajax to get post detail content
            var post_id = $(this).data('post-id');
            $.ajax({
                url: '/posts/'+ post_id,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    $('#modal-post-detail').html(response.list_view);
                    //show modal to view post detail
                    $('#modal-post-detail').show();
                    $('.ui-modal-overlay').show();
                },
                error: function (e) {

                }
            });
        });

        $('.ui-modal-overlay').click(function () {
            $('#modal-post-detail').hide();
            $('.ui-modal-overlay').hide();
        });
    },
    focusFieldError: function(field){
        $(field).focus();
    },
    validateEmpty: function (value) {
        return value.length == 0;
    },
    showMessageError: function (form, message) {
        $(form).find('.alert-warning').show().html(message);
    },
    validateEmailFormat: function(email){
        return this.emailFormat.test(email.val());
    },
    validateTitleIsUnique: function (title) {
        $.get('posts/has-exist-post', {title: $(title).val()}, function (response) {
            if(!response.status){
                twentyci.showMessageError(twentyci.postForm, response.message);
                twentyci.focusFieldError(title);
                return false;
            }
        });
    }
};
$(document).ready(function () {

    'use strict';

    twentyci.init();
});