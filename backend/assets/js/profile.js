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

//グローバルナビゲーション-ドロップダウンメニュー（上）-
function mediaQueriesWin() {
    var width = $(window).width();
    if (width <= 768) {
        $(".dropdown-nav>a").off("click"); //dropdown-navクラスがついたaタグのonイベントを複数登録を避ける為offにして一旦初期状態へ
        $(".dropdown-nav>a").on("click", function () {
            var parentElem = $(this).parent();
            $(parentElem).toggleClass("active");
            $(parentElem).children("ul").stop().slideToggle(500);
            return false;
        });
    } else {
        $(".dropdown-nav>a").off("click"); //dropdown-navクラスがついたaタグのonイベントをoff(無効)
        $(".dropdown-nav").removeClass("active");
        $(".dropdown-nav").children("ul").css("display", "");
    }
}

// ページがリサイズされたら動かしたい場合の記述
$(window).resize(function () {
    mediaQueriesWin(); /* ドロップダウンの関数を呼ぶ*/
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on("load", function () {
    mediaQueriesWin(); /* ドロップダウンの関数を呼ぶ*/
});
