<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/template/lib/uikit-rtl.min.css" rel="stylesheet" type="text/css">
    <link href="/template/lib/uikit-min.css" rel="stylesheet" type="text/css">
    <link href="/template/style/projects.css" rel="stylesheet" type="text/css">
    <link href="/template/style/reg_auth.css" rel="stylesheet" type="text/css">
    <link href="/template/style/index.css" rel="stylesheet" type="text/css">
    <link href="/template/style/narmolizae.css" rel="stylesheet" type="text/css">
    <link href="/template/style/font.css" rel="stylesheet" type="text/css">
    <script src="/template/lib/uikit.min.js"></script>
    <script src="/template/lib/uikit-icons.min.js"></script>
    <title>Все проекты</title>
</head>



<body>
    <header class="header">
        <button type="button" class="header__burger burger" data-menu-btn>
            <span class="burger__line burger__line--first"></span>
            <span class="burger__line burger__line--second"></span>
            <span class="burger__line burger__line--third"></span>
        </button>
        <nav class="menu" data-menu>
            <div class="menu__content">
                <div class="menu__header">
                    <div class="menu__photo">
                        <img src="/template/img/photo.svg" alt="Аватар" class="menu__img">
                    </div>
                    <div class="menu__title"></div>
                </div>
                <ul class="menu__list">
                    <?php if (isset($_SESSION['user'])) :?>
                        <li class="menu__item menu__item--mainpage">
                            <a href="/users/<?php ?>" class="menu__link">User profile</a>
                        </li>
                    <?php endif;?>
                    <li class="menu__item menu__item--projects">
                        <a href="/projects" class="menu__link">Projects</a>
                    </li>
                    <li class="menu__item menu__item--settings">
                        <a href="" class="menu__link">Settings</a>
                    </li>
                    <li class="menu__item menu__item--exit">
                        <a href="" class="menu__link">Exit</a>
                    </li>
                </ul>
            </div>
            <script src="/template/lib/jquery-3.3.1.min.js"></script>
            <div class="menu__aside" data-menu-aside></div>
        </nav>
    </header>