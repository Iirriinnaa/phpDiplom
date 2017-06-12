<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="/js/jquery-1.11.3.js"></script>
    <script src="/js/Tests/testing_1.1.js" type="text/javascript"></script>
    <title>Тестирование</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<!-- Меню navbar -->
<nav class="navbar navbar-default">
    <!-- Бренд и переключатель, который вызывает меню на мобильных устройствах -->
    <div class="navbar-header">
        <!-- Кнопка с полосочками, которая открывает меню на мобильных устройствах -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Бренд или логотип фирмы (обычно содержит ссылку на главную страницу) -->
        <a href="#" class="navbar-brand">Test-ISTU</a>
    </div>
    <!-- Содержимое меню (коллекция навигационных ссылок, формы и др.) -->
    <div class="collapse navbar-collapse" id="main-menu" >
        <!-- Список ссылок, расположенных слева -->
        <ul class="nav navbar-nav">
            <!--Элемент с классом active отображает ссылку подсвеченной <li class="active">-->
            <li><a href="../main/main.html">Главная <span class="sr-only">(current)</span></a></li>
            <li><a href="../test_list/test_list.html">Список тестов</a></li>
            <li><a href="../about/about.html">О системе тестирования</a></li>
        </ul>
        <!-- Список ссылок, расположенный справа -->
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="../auth/auth.html">Войти</a></li>
            <li><a href="../registration/registration.html">Зарегистрироваться</a></li>
        </ul>
    </div>
</nav>



<div class="main-content">
    <div class="container">
        <div class="row">
            <h1 class="col-xs-12 col-sm-6 col-lg-6 col-sm-offset-3 col-lg-offset-4 section-heading">Название теста</h1>
            <div class="col-xs-12 col-sm-8">
                <p class="test-description">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum fugiat nihil nostrum optio quae repellat sit vel voluptas! Dolorem dolorum excepturi expedita illum libero perspiciatis, quae quaerat quibusdam quos tempore?
                </p>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-4 col-sm-offset-3 col-lg-offset-4">
                    <form class="js-form-login form-group center-text" method="POST" action="login.php">
                        <div class="form-group">
                            <label for="exampleInputLogin">Логин</label>
                            <input name="login" type="login" class="form-control" id="exampleInputEmail1" placeholder="Логин" value="<?= $login ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Пароль</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group remember-me">
                            <div class="col-sm-12 remember-me__container">
                                <div class="checkbox remember-me__checkbox remember-checkbox">
                                    <input id="remember_checkbox" class="remember-checkbox__input" type="checkbox">
                                    <label for="remember_checkbox" class="remember-checkbox__present">Запомнить меня</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 align-center">
                                <button name="submit" type="submit" class="btn btn-default" value="Авторизоваться">Авторизоваться</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>

</body>
</html>