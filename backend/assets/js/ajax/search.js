$(document).ready(function () {

    let selectedOptions = {
        "name": '',
    };

    $('.search-inputq').on('input', function () {
        let name = $(this).val();
        selectedOptions['name'] = name;
        updateData(selectedOptions);
    });

    function updateData(dataObject) {
        console.log(dataObject);

        $.ajax({
            url: '/vendor/cart/search-ajax.php',
            method: 'POST',
            data: {
                name: dataObject.name
            },
            success: function (response) {
                $('.search-boxq__result').html(response);
            },
        });
    }
});
