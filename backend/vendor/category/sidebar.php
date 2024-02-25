    <div class="sidebar">
    <div class="sidebar__top">
        <img src="/assets/images/filter.png" alt="">
        Фильтр
    </div>
    <form METHOD="post">
        <div class="accordion">
            <div class="accordion-item active">
                <h2>
                    Цена
                </h2>
                <div class="accordion-price">
                    <div class="accordion-price_item">
                        <span>от</span>
                        <input type="text" name="price_min" value="" class="accordion-price_input">
                        <span> $ </span>
                    </div>
                    <div class="accordion-price_item">
                        <span> - до </span>
                        <input type="text" name="price_max" value="" class="accordion-price_input">
                        <span> $ </span>
                    </div>
                </div>

            </div>
        </div>
        <?php
        $filters = [
            ['table' => 'materials', 'column' => 'material', 'name' => 'Материал'],
            ['table' => 'colors', 'column' => 'color', 'name' => 'Цвет'],
            ['table' => 'makers', 'column' => 'maker', 'name' => 'Производитель']
        ];

        foreach ($filters as $filter) :
            $tableFilterColumn = get_filter_column($filter['table'], $filter['column']);
            ?>
            <div class="accordion">
                <div class="accordion-item active">
                    <h2>
                        <?= $filter['name']; ?>
                        <img src="/assets/images/catalog-arrow.png" alt="">
                    </h2>
                    <div class="accordion-content" style="max-height: fit-content;">
                        <?php foreach ($tableFilterColumn as $parametr) :

                            $isChecked = isset($_GET[$parametr['filter_column']]) && $_GET[$parametr['filter_column']] ? 1 : 0;
                            ?>
                            <label for="<?= $parametr['filter_column']; ?>" class="option">
                                <?= $parametr[$filter['column']]; ?>
                                <input type="checkbox" id="<?= $parametr['filter_column']; ?>" name="<?= $parametr['filter_column']; ?>"
                                       aria-checked="<?= $isChecked ? 'true' : 'false'; ?>" <?= $isChecked ? 'checked' : ''; ?>/>
                                <span class="checkbox checkbox1"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="btn-form__inner">
            <button class="btn-form btn-form--reset" type="reset">Отменить</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {

        var selectedOptions = {
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

        $(".accordion input[type='checkbox']").on("change", function() {
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

        $(".btn-form--reset").on("click", function() {
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
                success: function(response) {
                    $('.catalog__inner').html(response);
                },
            });
        }

    });

</script>