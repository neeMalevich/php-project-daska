<script>
    $(document).ready(function () {

        let selectedOptions = {
            "material": [],
            "color": [],
            "maker": [],
            'price_min': '0',
            'price_max': '9999999',
            'category': "<?= $_GET['cat']; ?>"
        };

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
                'category': "<?= $_GET['cat']; ?>"
            };

            // Очистка значений в элементах <input>
            $("input[name='price_min']").val('');
            $("input[name='price_max']").val('');

            // Сброс состояния чекбоксов
            $(".accordion input[type='checkbox']").prop("checked", false);

            updateData(selectedOptions);
        });

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
                },
                success: function (response) {
                    $('.catalog__inner').html(response);
                },
            });
        }

    });
</script>

