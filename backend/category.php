<?php
require_once __DIR__ . '/vendor/components/header.php';

?>

    <section class="s-collection">
        <div class="container">
            <h1 class="section-title">
                Специально подобранные товары
            </h1>
            <div class="catalog">

                <?php include __DIR__ . '/vendor/category/sidebar.php'; ?>

                <div class="catalog__wrapper">
                    <div class="catalog__inner">

                        <?php include __DIR__ . '/vendor/category/products.php'; ?>

                    </div>

                    <!--                    <div class="catalog__more">-->
                    <!--                        <span>Смотреть еще</span>-->
                    <!--                    </div>-->
                </div>
            </div>
    </section>

    <section class="s-banner catalog-banner">
        <div class="container">
            <div class="banner__img">
                <img src="/assets/images/banner.png" alt="">
                <div class="banner__img-title">скидка 10% на первую покупку</div>
            </div>
        </div>
    </section>

    <div class="modal-order">
        <div class="modal-order-content">
            <span class="close-button-order">×</span>
            <div class="modal_product_title">Для добавления товара в избранное необходимо войти в аккаунт</div>
            <a href="/login.php" class="btn-form" style="margin-top: 25px">Войти</a>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            var selectedOptions = {
                'whishlist_add': '',
                'whishlist_remove': '',
                'whishlist': <?= isset($_SESSION['user']['whishlist']) ? json_encode(array_values(array_map('intval', $_SESSION['user']['whishlist']))) : '[]' ?>,
            };

            $(document).on('click', '.product__item .whishlist', function () {
                const product_id = $(this).data("id");
                const isActive = $(this).hasClass("_is-active");

                if (<?= isset($_SESSION['user']) ? 'true' : 'false'; ?>) {
                    if (isActive) {
                        $(this).removeClass("_is-active");

                        const index = selectedOptions['whishlist'] ? selectedOptions['whishlist'].indexOf(product_id) : -1;
                        if (index !== -1) {
                            selectedOptions['whishlist'].splice(index, 1);
                        }

                        selectedOptions['whishlist_remove'] = product_id;

                        updateData(selectedOptions);
                    } else {
                        $(this).addClass("_is-active");

                        if (!selectedOptions['whishlist']) {
                            selectedOptions['whishlist'] = [];
                        }

                        const index = selectedOptions['whishlist'].indexOf(product_id);

                        if (index === -1) {
                            selectedOptions['whishlist'].push(product_id);
                        }

                        selectedOptions['whishlist_add'] = product_id;

                        updateData(selectedOptions);
                    }
                } else {
                    $(".modal-order").addClass("show-modal-order");
                }
            });

            function updateData(dataObject) {
                console.log(dataObject);

                $.ajax({
                    url: '/vendor/category/whishlist-ajax.php',
                    method: 'POST',
                    data: {
                        whishlist_add: dataObject.whishlist_add,
                        whishlist_remove: dataObject.whishlist_remove,
                        whishlist: Array.from(new Set(dataObject.whishlist)), // Удаление дубликатов
                    },
                    // success: function(response) {
                    //     $('.catalog__inner').html(response);
                    // },
                });
            }
        });
    </script>


    <script>
        $(document).ready(function () {

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


<?php require_once __DIR__ . '/vendor/components/footer.php'; ?>