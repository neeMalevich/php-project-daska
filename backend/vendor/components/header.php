<?php
session_start();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Экологичная мебель</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="/assets/css/app.min.css">
    <script src="/assets/js/jquery-3.4.1.min.js"></script>

</head>

<body>

<header class="header">
    <div class="container">
        <div class="header__inner">
            <a href="#" class="header__logo logo">
                <img src="/assets/images/logo.png" alt="" class="logo-img">
            </a>

            <div class="header__right">
                <ul class="header__menu menu">
                    <li>
                        <a href="#">о нас</a>
                    </li>
                    <li>
                        <a href="#">товары</a>
                    </li>
                    <li>
                        <a href="#">контакты</a>
                    </li>
                </ul>
                <ul class="header__users">
                    <li>
                        <a href="/login.php">
                            <svg width="25" height="31" viewBox="0 0 25 31" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.2824 26.437L23.1684 26.3395L23.2824 26.437C24.1594 25.4123 24.6415 24.1079 24.6415 22.7591V21.9143C24.6415 20.0077 23.0961 18.4623 21.1895 18.4623H4.30193C2.39548 18.4623 0.85 20.0077 0.85 21.9143V22.7623C0.85 24.1089 1.3304 25.4113 2.20484 26.4352C4.54173 29.172 8.0934 30.51 12.7409 30.51C17.3876 30.51 20.9409 29.1724 23.2824 26.437ZM21.3812 24.8098L21.4952 24.9073L21.3812 24.8098C19.5747 26.9203 16.7353 28.0076 12.7409 28.0076C8.7465 28.0076 5.9097 26.9203 4.1078 24.8102L3.99373 24.9076L4.10779 24.8102C3.62025 24.2393 3.35239 23.5132 3.35239 22.7623V21.9143C3.35239 21.3898 3.77752 20.9647 4.30193 20.9647H21.1895C21.7139 20.9647 22.1391 21.3898 22.1391 21.9143V22.7591C22.1391 23.511 21.8704 24.2383 21.3812 24.8098ZM20.2323 8.34131C20.2323 4.20398 16.8782 0.85 12.7409 0.85C8.60356 0.85 5.24958 4.20398 5.24958 8.34131C5.24958 12.4787 8.60356 15.8327 12.7409 15.8327C16.8783 15.8327 20.2323 12.4787 20.2323 8.34131ZM7.75197 8.34131C7.75197 5.58602 9.98564 3.35239 12.7409 3.35239C15.4963 3.35239 17.7299 5.58602 17.7299 8.34131C17.7299 11.0966 15.4963 13.3303 12.7409 13.3303C9.98564 13.3303 7.75197 11.0966 7.75197 8.34131Z"
                                    fill="white" stroke="white" stroke-width="0.3" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <svg width="33" height="30" viewBox="0 0 33 30" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.4915 29.6101L14.1715 27.5301C11.4781 25.1034 9.25148 23.0101 7.49147 21.2501C5.73147 19.49 4.33146 17.91 3.29146 16.51C2.25146 15.11 1.52479 13.8234 1.11146 12.65C0.698122 11.4767 0.491455 10.2767 0.491455 9.05002C0.491455 6.54335 1.33146 4.45001 3.01146 2.77001C4.69147 1.09 6.7848 0.25 9.29148 0.25C10.6781 0.25 11.9981 0.543334 13.2515 1.13C14.5048 1.71667 15.5848 2.54334 16.4915 3.61001C17.3982 2.54334 18.4782 1.71667 19.7315 1.13C20.9848 0.543334 22.3048 0.25 23.6915 0.25C26.1982 0.25 28.2915 1.09 29.9715 2.77001C31.6515 4.45001 32.4915 6.54335 32.4915 9.05002C32.4915 10.2767 32.2849 11.4767 31.8715 12.65C31.4582 13.8234 30.7315 15.11 29.6915 16.51C28.6515 17.91 27.2515 19.49 25.4915 21.2501C23.7315 23.0101 21.5048 25.1034 18.8115 27.5301L16.4915 29.6101ZM16.4915 25.2901C19.0515 22.9967 21.1582 21.0301 22.8115 19.39C24.4648 17.75 25.7715 16.3234 26.7315 15.11C27.6915 13.8967 28.3582 12.8167 28.7315 11.87C29.1049 10.9234 29.2915 9.98336 29.2915 9.05002C29.2915 7.45002 28.7582 6.11668 27.6915 5.05001C26.6249 3.98334 25.2915 3.45001 23.6915 3.45001C22.4382 3.45001 21.2782 3.80334 20.2115 4.51001C19.1448 5.21668 18.4115 6.11668 18.0115 7.21002H14.9715C14.5715 6.11668 13.8382 5.21668 12.7715 4.51001C11.7048 3.80334 10.5448 3.45001 9.29148 3.45001C7.69147 3.45001 6.35814 3.98334 5.29147 5.05001C4.2248 6.11668 3.69146 7.45002 3.69146 9.05002C3.69146 9.98336 3.87813 10.9234 4.25146 11.87C4.6248 12.8167 5.29147 13.8967 6.25147 15.11C7.21147 16.3234 8.51814 17.75 10.1715 19.39C11.8248 21.0301 13.9315 22.9967 16.4915 25.2901Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <svg width="30" height="31" viewBox="0 0 30 31" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.8963 11.5238V7.20238H10.5749V4.32143H14.8963V0H17.7773V4.32143H22.0987V7.20238H17.7773V11.5238H14.8963ZM9.13444 30.25C8.34217 30.25 7.66395 29.9679 7.09976 29.4037C6.53558 28.8395 6.25348 28.1613 6.25348 27.369C6.25348 26.5768 6.53558 25.8986 7.09976 25.3344C7.66395 24.7702 8.34217 24.4881 9.13444 24.4881C9.9267 24.4881 10.6049 24.7702 11.1691 25.3344C11.7333 25.8986 12.0154 26.5768 12.0154 27.369C12.0154 28.1613 11.7333 28.8395 11.1691 29.4037C10.6049 29.9679 9.9267 30.25 9.13444 30.25ZM23.5392 30.25C22.7469 30.25 22.0687 29.9679 21.5045 29.4037C20.9403 28.8395 20.6582 28.1613 20.6582 27.369C20.6582 26.5768 20.9403 25.8986 21.5045 25.3344C22.0687 24.7702 22.7469 24.4881 23.5392 24.4881C24.3315 24.4881 25.0097 24.7702 25.5739 25.3344C26.1381 25.8986 26.4202 26.5768 26.4202 27.369C26.4202 28.1613 26.1381 28.8395 25.5739 29.4037C25.0097 29.9679 24.3315 30.25 23.5392 30.25ZM9.13444 23.0476C8.05408 23.0476 7.2258 22.5735 6.64961 21.6251C6.07342 20.6768 6.06142 19.7345 6.6136 18.7982L8.55824 15.269L3.37253 4.32143H0.491577V1.44048H5.20914L11.3312 14.4048H21.4505L27.0324 4.32143L29.5532 5.68988L23.9713 15.7732C23.7073 16.2534 23.3591 16.6255 22.927 16.8896C22.4949 17.1537 22.0027 17.2857 21.4505 17.2857H10.719L9.13444 20.1667H26.4202V23.0476H9.13444Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>