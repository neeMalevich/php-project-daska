$(document).ready(function() {
    $('.catalog__inner.wishlist .product__item .whishlist').on('click', function() {
        let $productItem = $(this).closest('.product__item-whishlist');
        $productItem.remove();

        let $wishlistItems = $('.catalog__inner.wishlist .product__item-whishlist');
        if ($wishlistItems.length === 0) {
            let $wishlistEmpty = $('' +
                '<div class="wishlist">' +
                    '<div class="wishlist__img">' +
                        '<img src="/assets/images/wishlist-accaunt.svg" alt="">' +
                    '</div>' +
                    '<div class="wishlist__title">Список избранного пуст</div>' +
                    '<div class="wishlist__text">У вас пока нет товаров в списке желаний. <br> На странице «Товары» вы найдете много интересных товаров.</div>' +
                    '<a href="/category.php" class="account__btn mt-55" type="submit">' +
                        '<span>Вернуться в магазин</span>' +
                    '</a>' +
                '</div>');

            $('.catalog__inner.wishlist').append($wishlistEmpty).addClass('_is-active');
        }
    });

    const readURL = (input) => {
        if (input.files && input.files[0]) {
            const reader = new FileReader()
            reader.onload = (e) => {
                $('#preview').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0])
        }
    }
    $('.choose').on('change', function() {
        readURL(this)
        let i
        if ($(this).val().lastIndexOf('\\')) {
            i = $(this).val().lastIndexOf('\\') + 1
        } else {
            i = $(this).val().lastIndexOf('/') + 1
        }
        const fileName = $(this).val().slice(i)
        $('.label').text(fileName)
    })
});

