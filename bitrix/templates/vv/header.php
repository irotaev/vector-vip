<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <?$APPLICATION->ShowHead();?>
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <title><?$APPLICATION->ShowTitle();?></title>   
    <link rel="stylesheet" href="/design/css/style.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="/design/css/jquery.mCustomScrollbar.css" type="text/css" media="screen, projection" />
    <!--[if gte IE 9]><link rel="stylesheet" href="/design/css/styleIE9.css" type="text/css" media="screen, projection" /><![endif]-->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="/design/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="/design/js/underscore-min.js"></script>
    <script type="text/javascript" src="/design/js/backbone-min.js"></script>
    <script type="text/javascript" src="/design/js/test.js"></script>

    <!-- Подключение подсказок -->
    <link rel="stylesheet" href="/design/css/tip-darkgray/tip-darkgray.css" type="text/css" media="screen, projection" />
    <script type="text/javascript" src="/design/js/jquery.poshytip.min.js"></script>
    <!-- /// Подключение подсказок -->   
    <!--Скрипт для bitrix-->
    <script type="text/javascript" src="/design/js/bitrix.js"></script>
    <!--//Скрипт для bitrix-->

<!--Подключение сборочных скриптов-->
<?  require_once $_SERVER["DOCUMENT_ROOT"].'/design/index.php';?>
<!-- /// Подключение сборочных скриптов-->
</head>

<body>
    
<!--Панель bitrix-->
<div id="bitrix-panel-controll">
    <div id="panel">
        <?$APPLICATION->ShowPanel();?>
        <div id="btn-close-open-bitrix-panel"></div>
    </div>       
</div>
<!-- /// Панель bitrix-->

<div id="wrapper">

    <header id="header">
        <div class="wrapper">
            <!--<div id="logo-text-header"></div>-->
            <div id="head-menu-wrapper">
                <div id="head-main-menu"></div>

                <nav id="left-menu" class="left-menu-block">
                    <ul class="mainMenu">
                        <li class="info">
                            <a href="/about-company/">О компании</a>                            
                        </li>
                        <li class="info">
                            <a href="#">Сотрудничество</a>                            
                        </li>
                        <li class="info">
                            <a href="#">Контакты</a>                            
                        </li>
                        <li class="info">
                        <a href="#">Галерея работ</a>                        
                        </li>
                        <li class="info">
                        <a href="#">Цены</a>                        
                        </li>
                        <!--<li class="info">-->
                        <!--<a href="#">Прайс-лист</a>-->
                        <!--<div class="submenu">-->
                        <!--<ul class="submenu-wrapper">-->
                        <!--<li><div class="strelka"></div><a href="#">Подпункт 1</a></li>-->
                        <!--<li><div class="strelka"></div><a href="#">Подпункт 2</a></li>-->
                        <!--<li><div class="strelka"></div><a href="#">Подпункт 3</a></li>-->
                        <!--<li><div class="strelka"></div><a href="#">Подпункт 4</a></li>-->
                        <!--<li><div class="strelka"></div><a href="#">Подпункт 5</a></li>-->
                        <!--</ul>-->
                        <!--</div>-->
                        <!--</li>-->
                        <!--<li class="info">-->
                        <!--<a href="#">Контакты</a>-->
                        <!--<div class="submenu">-->
                        <!--<ul class="submenu-wrapper">-->
                        <!--<li><div class="strelka"></div><a href="#">Подпункт 1</a></li>-->
                        <!--<li><div class="strelka"></div><a href="#">Подпункт 2</a></li>-->
                        <!--<li><div class="strelka"></div><a href="#">Подпункт 3</a></li>-->
                        <!--<li><div class="strelka"></div><a href="#">Подпункт 4</a></li>-->
                        <!--<li><div class="strelka"></div><a href="#">Подпункт 5</a></li>-->
                        <!--</ul>-->
                        <!--</div>-->
                        <!--</li>-->
                    </ul>
                </nav><!-- #left-menu-->
            </div>

            <a href="/"><img  id="header-logo" src="/design/img/header/vvip-logo.png" alt="строительная компания vector-vip" /></a>

            <div id="header-telephone"></div>

            <div id="login-header">
            <form name="header-login">
            <table>
                <tr>
                    <td><label class="info" for="login-box-header">логин:</label></td>
                    <!--<td class="info reg-text"><a href="#">Регистрация</a></td>-->

                    <td colspan="2"><input type="text" id="login-box-header" placeholder="Введите логин"/></td>
                </tr>
                <tr>
                    <td><label class="info" for="password-box-header">пароль:</label></td>
                    <td colspan="2"><input type="password" id="password-box-header" placeholder="Введите пароль"/></td>
                </tr>
                <tr>
                    <td><input type="image" src="/design/img/header/login-input.png" alt="Войти"/></td>
                    <td class="info fogot-reg-text">
                        <span>
                            <a rel=”nofollow” class="reg-text" href="#">Регистрация</a>
                            <br/><a rel=”nofollow” href="#">Забыли пароль?</a>
                        </span>
                    </td>
                </tr>
            </table>
            </form>
            </div><!--#login-header-->
        </div><!--.wrapper-->
    </header><!-- #header-->

    <section id="middle">
        <div id="middle-scrolling-section">