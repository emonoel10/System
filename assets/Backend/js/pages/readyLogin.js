/*
 *  Document   : readyLogin.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Login page
 */

var ReadyLogin = function () {

    return {
        init: function () {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Login form - Initialize Validation */
            $('#form-login').validate({
                errorClass: 'help-block shake animated', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function (error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function (e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function (e) {
                    e.closest('.form-group').removeClass('has-success has-error');
                    e.closest('.help-block').remove();
                },
                rules: {
                    'login-username': {
                        required: true
                    },
                    'login-password': {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    'login-username': {
                        required: "Please enter Administrator's username."
                    },
                    'login-password': {
                        required: "Please provide Administrator's password.",
                        minlength: 'Your password must be at least 5 characters long.'
                    }
                }
            });

            $("#form-login").submit(function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();

                $.ajax({
                    url: url,
                    type: method,
                    data: data
                }).done(function (data) {
                    if (data !== '') {
                        $('#response').show('slow');
                        $('#responseMsg').effect('shake', 300);
                        $("#form-login")[0].reset();
                        $('#login-username').focus();
                    } else {
                        window.location.href = 'Login/login';
                        $('#response').hide('fast');
                    }
                });
            });

            $("#response").each(function () {
                $(this).hide();
            });
        }
    };
}();
