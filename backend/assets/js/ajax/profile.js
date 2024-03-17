$(document).ready(function () {

    $('#account #username').on('input', function() {
        validateUsername();
    });

    $('#account #email').on('input', function() {
        validateEmailField();
    });

    $('#account #password').on('input', function() {
        validatePasswordField();
    });
    $('#account #password_new').on('input', function() {
        validatePasswordField();
    });
    $('#account #password_confirm').on('input', function() {
        validatePasswordField();
    });

    function validateUsername() {
        let username = $('#account #username').val();
        console.log(username.length);
        if (username.length < 4) {
            $('#account #username').addClass('_is-error');
            $('#account #username').next('.error-message').text('Имя пользователя должно быть не менее 4 символов');
            hasError = true;
        } else {
            $('#account #username').removeClass('_is-error');
            $('#account #username').next('.error-message').empty();
        }

        setSubmitButtonState(hasError);
    }

    function validateEmailField() {
        let email = $('#account #email').val();
        if (!validateEmail(email)) {
            $('#account #email').addClass('_is-error');
            $('#account #email').next('.error-message').text('Введите корректный email');
            hasError = true;
        } else {
            $('#account #email').removeClass('_is-error');
            $('#account #email').next('.error-message').empty();
        }

        setSubmitButtonState(hasError);
    }


    function validatePasswordField() {
        let currentPassword = $('#account #password').val();
        let newPassword = $('#account #password_new').val();
        let confirmPassword = $('#account #password_confirm').val();
        let hasError = false;

        if (currentPassword == '') {
            $('#account #password').addClass('_is-error');
            $('#account #password').next('.error-message').text('Введите действующий пароль');
            hasError = true;
        }
        else {
            $('#account #password').removeClass('_is-error');
            $('#account #password').next('.error-message').empty();

            if (newPassword.length < 8) {
                $('#account #password_new').addClass('_is-error');
                $('#account #password_new').next('.error-message').text('Пароль должен содержать минимум 8 символов');
                hasError = true;
            } else {
                $('#account #password_new').removeClass('_is-error');
                $('#account #password_new').next('.error-message').empty();
            }

            if (confirmPassword.length < 8) {
                $('#account #password_confirm').addClass('_is-error');
                $('#account #password_confirm').next('.error-message').text('Пароль должен содержать минимум 8 символов');
                hasError = true;
            } else {
                $('#account #password_confirm').removeClass('_is-error');
                $('#account #password_confirm').next('.error-message').empty();
            }

            if (newPassword !== confirmPassword) {
                $('#account #password_confirm').addClass('_is-error');
                $('#account #password_confirm').next('.error-message').text('Пароли не совпадают');
                hasError = true;
            } else {
                $('#account #password_confirm').removeClass('_is-error');
                $('#account #password_confirm').next('.error-message').empty();
            }

        }

        setSubmitButtonState(hasError);
    }

    function setSubmitButtonState(hasError) {
        let submitButton = $('#account .account__btn');

        if (hasError) {
            submitButton.prop('disabled', true); // Запрещаем нажатие кнопки
        } else {
            submitButton.prop('disabled', false); // Разрешаем нажатие кнопки
        }
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

});
