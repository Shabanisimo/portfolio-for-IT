<html lang="en" class="uk-background-muted">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/template/lib/uikit-rtl.min.css" rel="stylesheet" type="text/css">
    <link href="/template/lib/uikit-min.css" rel="stylesheet" type="text/css">
    <link href="/template/style/projects.css" rel="stylesheet" type="text/css">
    <link href="/template/style/reg_auth.css" rel="stylesheet" type="text/css">
    <link href="/template/style/settings.css" rel="stylesheet" type="text/css">
    <link href="/template/style/index.css" rel="stylesheet" type="text/css">
    <link href="/template/style/vacancy.css" rel="stylesheet" type="text/css">
    <link href="/template/style/narmolizae.css" rel="stylesheet" type="text/css">
    <link href="/template/style/font.css" rel="stylesheet" type="text/css">
    <script src="/template/lib/uikit.min.js"></script>
    <script src="/template/lib/uikit-icons.min.js"></script>
    <title><?php echo $title; ?></title>
</head>
<body>
    <header class="header" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
        <nav class="uk-navbar" data-menu>
            <div class="uk-navbar-left">
                <a class="uk-navbar-toggle" uk-navbar-toggle-icon  uk-toggle="target: #offcanvas-nav-primary"></a>
                <h3 class="uk-margin-small-left"><a href="/" class="title">IT-portfolio</a></h3>
            </div>
            
        <div id="offcanvas-nav-primary" class="menu" uk-offcanvas="flip: true;">
                <div class="uk-offcanvas-bar main-menu" >
                    <?php if (!User::isGuest()) :?>
                    <div class="menu__photo">
                        <?php if(User::getUserPhoto($_SESSION['user']) == ''): ?>
                            <img src="/template/img/photo.svg" alt="Аватар" class="menu__img">
                        <?php else :?>  
                            <img src="/upload/images/<?php echo User::getUserPhoto($_SESSION['user']); ?>" alt="Аватар" class="menu__img">
                        <?php endif; ?>
                    </div>
                    <div class="menu__title"></div>
                    <?php endif; ?>
                    <ul class="uk-nav uk-nav-default menu__list">
                        <?php if (!User::isGuest()) :?>
                            <li class="menu__item menu__item--mainpage">
                                <a href="/users/id<?php echo $_SESSION['user']; ?>" class="menu__link"><span uk-icon="user" class="icon"></span><span>Личный кабинет</span></a>
                            </li>
                        <?php endif;?>
                        <?php if (!User::isGuest()) : ?>
                            <?php if (!User::isAdmin()) : ?>
                            <li class="menu__item menu__item--mainpage">
                                <a href="/backend" class="menu__link"><span uk-icon="user" class="icon"></span><span>Панель администратора</span></a>
                            </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li class="menu__item menu__item--projects">
                            <a href="/projects" class="menu__link"><span uk-icon="list" class="icon"></span><span>Список проектов</span></a>
                        </li>
                        <li class="menu__item menu__item--projects">
                            <a href="/vacancy" class="menu__link"><span uk-icon="list" class="icon"></span><span>Список вакансий</span></a>
                        </li>
                        <li class="menu__item menu__item--projects">
                            <a href="/projects" class="menu__link"><span uk-icon="list" class="icon"></span><span>Список компаний</span></a>
                        </li>
                        <?php if (User::isGuest()) :?>
                            <li class="menu__item menu__item--projects">
                                <a href="/registration" class="menu__link"><span uk-icon="chevron-right" class="icon"></span><span>Регистрация</span></a>
                            </li>
                            <li class="menu__item menu__item--projects">
                                <a href="companyRegistration" class="menu__link"><span uk-icon="chevron-right" class="icon"></span><span>Регистрация компаний</span></a>
                            </li>
                            <li class="menu__item menu__item--projects">
                                <a href="/authorization" class="menu__link"><span uk-icon="sign-in" class="icon"></span><span>Авторизация</span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!User::isGuest()) :?>
                            <li class="menu__item menu__item--settings">
                                <a href="/settings" class="menu__link"><span uk-icon="settings" class="icon"></span><span>Настройки</span></a>
                            </li>
                        <?php endif; ?>    
                        <?php if (!User::isGuest()) :?>   
                            <li class="menu__item menu__item--projects">
                                <a href="/bookmarks" class="menu__link"><span uk-icon="bookmark" class="icon"></span><span>Закладки</span></a>
                            </li> 
                            <li class="menu__item menu__item--exit">
                                <a href="/logout" class="menu__link"><span uk-icon="sign-out" class="icon"></span><span>Выход</span></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <script src="/template/lib/jquery-3.3.1.min.js"></script>
            <div class="menu__aside" data-menu-aside></div>
        </nav>
    </header>