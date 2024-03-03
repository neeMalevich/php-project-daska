$(document).ready(function () {

    let selectedOptionsCard = {
        'cart_add': '',
        'cart_remove': '',
        'cart_count': '',
    };

    $(document).on('click', '.product__item .card', function () {
        const product_id = $(this).next().data("id");
        const user_id = $(this).next().data("user_id");

        if (user_id){
            const basketCount = parseInt($('.basket-count').text());
            selectedOptionsCard['cart_add'] = product_id;

            if (!$('#errorAlert').hasClass('_is-active')) {
                alertAddCart();
            }

            updateDataCart(selectedOptionsCard);

            $('.basket-count').text(basketCount + 1); // Decrement whishlist-count
            $('.basket-btn').addClass('_is-active');
        } else {
            $(".modal-order").addClass("show-modal-order");
        }
    });

    function alertAddCart() {
        var errorAlert = $(`
            <div class="error-alert" id="errorAlert">
                <div class="error-alert__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none">
                        <path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path>
                    </svg>
                </div>
                <div class="error-alert__title">Товар успешно добавлен</div>
                <div class="error-alert__close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20">
                        <path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path>
                    </svg>
                </div>
            </div>
        `);

        $('body').append(errorAlert);
        errorAlert.addClass('_is-active');

        setTimeout(function() {
            errorAlert.removeClass('_is-active');
            setTimeout(function() {
                errorAlert.remove();
            }, 300);
        }, 600);
    }


    function updateTotalPrice() {
        totalFullPrice = 0;

        $('.quantity_inner').each(function () {
            let $input = $(this).find('.quantity');
            let quantity = parseInt($input.val());
            let price = parseFloat($input.closest('.quantity_inner').data('start-pice'));
            let totalPrice = quantity * price;
            $input.closest('.card__right').find('.card__price').text('$ ' + totalPrice.toFixed(2));

            totalFullPrice += totalPrice;
        });

        $('.card__full-price span').text(totalFullPrice.toFixed(2));
    }

    function minusButtonClick() {
        let $input = $(this).parent().find('.quantity');
        let count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);

        let $card = $(this).closest('.card');
        let productId = $card.find('.quantity_inner').data('id');

        selectedOptionsCard.cart_add = productId;
        selectedOptionsCard.cart_count = count;

        updateTotalPrice();
        updateDataCart(selectedOptionsCard);
    }

    function plusButtonClick() {
        let $input = $(this).parent().find('.quantity');
        let count = parseInt($input.val()) + 1;
        count = count > parseInt($input.data('max-count')) ? parseInt($input.data('max-count')) : count;
        $input.val(count);

        let $card = $(this).closest('.card');
        let productId = $card.find('.quantity_inner').data('id');

        selectedOptionsCard.cart_add = productId;
        selectedOptionsCard.cart_count = count;

        updateTotalPrice();
        updateDataCart(selectedOptionsCard);
    }

    function quantityChange() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
        if (this.value == "") {
            this.value = 1;
        }
        if (this.value > parseInt($(this).data('max-count'))) {
            this.value = parseInt($(this).data('max-count'));
        }

        let $card = $(this).closest('.card');
        let productId = $card.find('.quantity_inner').data('id');
        let count = parseInt($(this).val());

        selectedOptionsCard.cart_add = productId;
        selectedOptionsCard.cart_count = count;

        updateTotalPrice();
        updateDataCart(selectedOptionsCard);
    }

    function removeButtonClick() {
        let $card = $(this).closest('.card');
        let price = parseFloat($card.find('.card__price').data('price'));
        let quantity = parseInt($card.find('.quantity').val());
        let totalPrice = price * quantity;
        totalFullPrice -= totalPrice;
        $card.remove();
        $('.card__full-price span').text(totalFullPrice.toFixed(2));

        let productId = $card.find('.quantity_inner').data('id');

        selectedOptionsCard.cart_remove = productId;
        selectedOptionsCard.cart_count = quantity;

        updateDataCart(selectedOptionsCard);

        let $cartItems = $('.card__inner .card');
        console.log($cartItems);
        if ($cartItems.length === 0) {
            console.log('ds');
            let $cartEmpty = $('<div class="sidebar__top tac">Нет товаров</div>');

            $('.s-basket').append($cartEmpty).addClass('_is-active');
        }
    }

    $('.quantity_inner .bt_minus').click(minusButtonClick);
    $('.quantity_inner .bt_plus').click(plusButtonClick);
    $('.quantity_inner .quantity').bind("change keyup input", quantityChange);
    $('.card__btn').click(removeButtonClick);


    function updateDataCart(dataObject) {
        console.log(dataObject);

        $.ajax({
            url: '/vendor/cart/cart-ajax.php',
            method: 'POST',
            data: {
                cart_add: dataObject.cart_add,
                cart_remove: dataObject.cart_remove,
                cart_count: dataObject.cart_count,
            },
        });
    }

    updateTotalPrice();


});