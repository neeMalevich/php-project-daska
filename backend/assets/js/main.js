$(document).ready(function () {
    /*
    * Авторизация
    */
    $('#account-login').click(function (e) {
        e.preventDefault();

        $('.error-message').empty();
        $('input').removeClass('_is-error');
        $('.alert-danger').removeClass('_is-error');

        let email = $('input[name="email"]').val(),
            password = $('input[name="password"]').val();

        $.ajax({
            url: 'vendor/auth/login.php',
            type: 'POST',
            dataType: 'json',
            data: {
                email: email,
                password: password
            },
            success(data) {
                if (data.status) {
                    document.location.href = '/profile.php';
                } else {
                    if (data.type === 1) {
                        data.fields.forEach(function (field) {
                            $(`input[name="${field}"]`).addClass('_is-error');
                            $(`input[name="${field}"]`).next('.error-message').text(data.message[field]);
                        });
                    } else {

                        if (data.type === 2) {
                            // $('input[name="email"]').addClass('_is-error');
                            $('.alert-danger').text(data.message);
                            $(`.alert-danger`).addClass('_is-error');
                        }
                    }
                }
            }
        });
    });

    /*
    * Регистрация
    */
    $('#account-register').click(function (e) {
        e.preventDefault();

        $('.error-message').empty();
        $('input').removeClass('_is-error');

        let username = $('input[name="username"]').val(),
            email = $('input[name="email"]').val(),
            password = $('input[name="password"]').val(),
            password_confirm = $('input[name="password_confirm"]').val();

        let formData = new FormData();

        formData.append('username', username);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('password_confirm', password_confirm);

        $.ajax({
            url: 'vendor/auth/register.php',
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            success(data) {

                if (data.status) {
                    document.location.href = '/login.php?register=success&email=' + email;
                } else {
                    if (data.type === 1) {
                        data.fields.forEach(function (field) {
                            $(`input[name="${field}"]`).addClass('_is-error');
                            $(`input[name="${field}"]`).next('.error-message').text(data.message[field]);
                        });
                    }
                }
            }
        });
    });
});