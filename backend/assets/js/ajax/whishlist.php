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

                    $('.whishlist-btn .whishlist-count').text(function (index, text) {
                        return parseInt(text) - 1;
                    });

                    const index = selectedOptions['whishlist'] ? selectedOptions['whishlist'].indexOf(product_id) : -1;
                    if (index !== -1) {
                        selectedOptions['whishlist'].splice(index, 1);
                    }

                    selectedOptions['whishlist_remove'] = product_id;

                    updateData(selectedOptions);
                } else {
                    $(this).addClass('_is-active');

                    $('.whishlist-btn .whishlist-count').text(function (index, text) {
                        return parseInt(text) + 1;
                    });

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

                // Дополнительная проверка для удаления класса _is-active
                const whishlistCount = parseInt($('.whishlist-btn .whishlist-count').text());
                if (whishlistCount === 0) {
                    $('.whishlist-btn').removeClass('_is-active');
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
            });
        }
    });
</script>

