<script>
    $(document).ready(function () {

        const customSelect = document.querySelector('.custom-select');
        const selectedValue = document.querySelector('.selected-value');
        const selectDropdown = document.getElementById('select-dropdown');

        const customSelectSearch = document.querySelector('.custom-select-search');
        const selectedValueSearch = document.querySelector('.selected-value-search');
        const selectDropdownSearch = document.getElementById('select-dropdown-search');

        let selectedOptions = {
            "material": [],
            "color": [],
            "maker": [],
            'price_min': '0',
            'price_max': '9999999',
            'category': "<?= $_GET['cat']; ?>",
            "search": '',
            "search_project": '',
            "search_name": '',
            "sort": ''
        };

        function handleOptionClickSearch(e) {
            // e.preventDefault();

            if (e.target.tagName === 'LABEL') {
                console.log('dsds')
                const textContent = e.target.textContent.trim();
                selectedValueSearch.textContent = textContent;
                customSelectSearch.classList.remove('active');

                console.log(textContent)

                const name = e.target.previousElementSibling.getAttribute('name');

                if (textContent === 'По названию') {
                    selectedOptions['search_name'] = name;
                    selectedOptions['search_project'] = '';
                }
                if (textContent === 'По производителю') {
                    selectedOptions['search_project'] = name;
                    selectedOptions['search_name'] = '';
                }

                updateData(selectedOptions);
            }
        }

        function closeDropdown() {
            customSelectSearch.classList.remove('active');
        }

        customSelectSearch.addEventListener('click', function() {
            customSelectSearch.classList.toggle('active');
        });

        customSelectSearch.addEventListener('mouseleave', function() {
            setTimeout(closeDropdown, 200); // Задержка перед закрытием выпадающего списка
        });

        selectDropdownSearch.addEventListener('click', handleOptionClickSearch);

        $('.search-inputq').on('input', function () {
            let name = $(this).val();
            selectedOptions['search'] = name;
            updateData(selectedOptions);
        });

        $(".accordion-price_input").on("change", function () {
            let priceMin = $("input[name='price_min']").val();
            let priceMax = $("input[name='price_max']").val();

            // Проверка и присвоение значения по умолчанию
            priceMin = priceMin !== '' ? parseFloat(priceMin) : 0;
            priceMax = priceMax !== '' ? parseFloat(priceMax) : 9999;

            // Проверка и корректировка значений priceMin и priceMax
            if (priceMin > priceMax) {
                const temp = priceMin;
                priceMin = priceMax;
                priceMax = temp;

                // Отображение значений в элементах <input>
                $("input[name='price_min']").val(priceMin);
                $("input[name='price_max']").val(priceMax);
            }

            selectedOptions['price_min'] = priceMin;
            selectedOptions['price_max'] = priceMax;

            console.log(selectedOptions);

            updateData(selectedOptions);
        });

        $(".accordion input[type='checkbox']").on("change", function () {
            let optionType = $(this).attr("name").split("_")[0];
            let optionId = $(this).attr("id").split("_")[1];

            if ($(this).is(":checked")) {
                selectedOptions[optionType].push(optionId);
            } else {
                let index = selectedOptions[optionType].indexOf(optionId);
                if (index !== -1) {
                    selectedOptions[optionType].splice(index, 1);
                }
            }

            updateData(selectedOptions);
        });

        $(".btn-form--reset").on("click", function () {
            // Сброс данных
            selectedOptions = {
                "material": [],
                "color": [],
                "maker": [],
                'price_min': '',
                'price_max': '',
                'category': "<?= $_GET['cat']; ?>",
                "search-name": '',
                "search-project": '',
                "sort": '',
            };

            // Очистка значений в элементах <input>
            $("input[name='price_min']").val('');
            $("input[name='price_max']").val('');

            // Сброс состояния чекбоксов
            $(".accordion input[type='checkbox']").prop("checked", false);

            updateData(selectedOptions);
        });

        function handleOptionClick(e) {
            if (e.target.tagName === 'LABEL') {
                const textContent = e.target.textContent.trim();
                selectedValue.textContent = textContent;
                customSelect.classList.remove('active');

                const name = e.target.previousElementSibling.getAttribute('name');
                selectedOptions['sort'] = name;

                updateData(selectedOptions);
            }
        }

        customSelect.addEventListener('click', function() {
            customSelect.classList.toggle('active');
        });

        selectDropdown.addEventListener('click', handleOptionClick);

        function updateData(dataObject) {
            console.log(dataObject);

            $.ajax({
                url: '/vendor/category/filter-ajax.php',
                method: 'POST',
                data: {
                    material: dataObject.material,
                    color: dataObject.color,
                    maker: dataObject.maker,
                    price_max: dataObject.price_max,
                    price_min: dataObject.price_min,
                    category: dataObject.category,
                    search: dataObject.search,
                    searchProject: dataObject.search_project,
                    searchName: dataObject.search_name,
                    sort: dataObject.sort,

                },
                success: function (response) {
                    $('.catalog__inner').html(response);
                },
            });
        }

    });
</script>

