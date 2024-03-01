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
                            $('.alert-danger').text(data.message);
                            $(`.alert-danger`).addClass('_is-error');
                            $(`input[name="password"]`).val('');
                        }
                    }
                }
            }
        });
    });

    /*
    * Заменить изображение в профиле
    */
    $('#imageInput').on('change', function() {
        $input = $(this);
        if($input.val().length > 0) {
            fileReader = new FileReader();
            fileReader.onload = function (data) {
                $('.image-preview').attr('src', data.target.result);
            }
            fileReader.readAsDataURL($input.prop('files')[0]);
            $('.image-button').css('display', 'none');
            $('.image-preview').css('display', 'block');
            $('.change-image').css('display', 'block');
        }
    });

    $('.change-image').on('click', function() {
        $control = $(this);
        $('#imageInput').val('');
        $preview = $('.image-preview');
        $preview.attr('src', '');
        $preview.css('display', 'none');
        $control.css('display', 'none');
        $('.image-button').css('display', 'block');
    });
});