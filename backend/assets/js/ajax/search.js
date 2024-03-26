$(document).ready(function () {

    let selectedOptions = {
        "name": '',
        "cat": '',
    };
    const urlParams = new URLSearchParams(window.location.search);
    const catParam = urlParams.get('cat');

    if (catParam) {
        selectedOptions.cat = parseInt(catParam);
    }

    const customSelect = document.querySelector('.custom-select-search');
    const selectedValue = document.querySelector('.selected-value-search');
    const selectDropdown = document.getElementById('select-dropdown-search');

    function handleOptionClick(e) {
        // e.preventDefault();

        if (e.target.tagName === 'LABEL') {
            console.log('dsds')
            const textContent = e.target.textContent.trim();
            selectedValue.textContent = textContent;
            customSelect.classList.remove('active');

            const name = e.target.previousElementSibling.getAttribute('name');
            selectedOptions['cat'] = name;

            if (textContent === 'Все категории') {
                const searchCatAll = document.querySelector('.search_cat_all');
                searchCatAll.remove();
            }

            updateData(selectedOptions);
        }
    }

    function closeDropdown() {
        customSelect.classList.remove('active');
    }

    customSelect.addEventListener('click', function() {
        customSelect.classList.toggle('active');
    });

    customSelect.addEventListener('mouseleave', function() {
        setTimeout(closeDropdown, 200); // Задержка перед закрытием выпадающего списка
    });

    selectDropdown.addEventListener('click', handleOptionClick);

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
                name: dataObject.name,
                cat: dataObject.cat
            },

            success: function (response) {
                $('.search-boxq__result').html(response);
            },
        });
    }
});
