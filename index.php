<?php
require_once 'AutoLoad.php';
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
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
            <li class="active"><a href="../main/main.html">Главная <span class="sr-only">(current)</span></a></li>
            <li><a href="../test_list/test_list.html">Список тестов</a></li>
            <li><a href="../about/about.html">О системе тестирования</a></li>
        </ul>
        <!-- Список ссылок, расположенный справа -->
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../auth/auth.html">Войти</a></li>
            <li><a href="../registration/registration.html">Зарегистрироваться</a></li>
        </ul>
    </div>
</nav>

<div class="main-content">
    <div class="text-center">
        <h1 class="main-heading">Test-ISTU поможет вам с выбором направления обучения.Выберите тест и начните тестирование.</h1>
		<?php //__autoload()
		//require_once 'AutoLoad.php';

		require_once 'Blocks/Authorization.php';
		?>
    </div>
</div>
</body>
</html>