<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- О системе тестирования-->
    <title><?= $title; ?></title>
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
            <li class="active"><a href="../about/about.html">О системе тестирования</a></li>
        </ul>
        <!-- Список ссылок, расположенный справа -->
        <ul class="nav navbar-nav navbar-right">
            <?php
            if (Users::checkAuth()) {
                echo '<li class="active"><a href="/">' . $_SESSION['login'] . '</a></li>';
            } else {
                ?>
                <li><a href="/Login.php">Войти</a></li>
                <li class="active"><a href="/registration.php">Зарегистрироваться</a></li>
                <?php
            }
            ?>

        </ul>
    </div>
</nav>


</body>
</html>


<!--<!-- ���� navbar -->-->
<!--<nav class="navbar navbar-default">-->
<!--    <!-- ����� � �������������, ������� �������� ���� �� ��������� ����������� -->-->
<!--    <div class="navbar-header">-->
<!--        <!-- ������ � �����������, ������� ��������� ���� �� ��������� ����������� -->-->
<!--        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">-->
<!--            <span class="sr-only">Toggle navigation</span>-->
<!--            <span class="icon-bar"></span>-->
<!--            <span class="icon-bar"></span>-->
<!--            <span class="icon-bar"></span>-->
<!--        </button>-->
<!--        <!-- ����� ��� ������� ����� (������ �������� ������ �� ������� ��������) -->-->
<!--        <a href="/" class="navbar-brand">Test-ISTU</a>-->
<!--    </div>-->
<!--    <!-- ���������� ���� (��������� ������������� ������, ����� � ��.) -->-->
<!--    <div class="collapse navbar-collapse" id="main-menu" >-->
<!--        <!-- ������ ������, ������������� ����� -->-->
<!--        <ul class="nav navbar-nav">-->
<!--            <!--������� � ������� active ���������� ������ ������������ <li class="active">-->-->
<!--            <li><a href="/">������� <span class="sr-only">(current)</span></a></li>-->
<!--            <li><a href="../TestList.php">������ ������</a></li>-->
<!--            <li><a href="../about.html">� ������� ������������</a></li>-->
<!--        </ul>-->
<!--        <!-- ������ ������, ������������� ������ -->-->
<!--        <ul class="nav navbar-nav navbar-right">-->
<!--			--><?php
//			if (Users::checkAuth()) {
//                    echo '<li class="active"><a href="/��� ������������">' . $_SESSION['login'] . '</a></li>';
//			} else {
//				?>
<!--				<li><a href="/Login.php">�����</a></li>-->
<!--				<li class="active"><a href="/registration.php">������������������</a></li>-->
<!--				--><?php
//			}
//			?>
<!--            -->
<!--        </ul>-->
<!--    </div>-->
<!--</nav>-->
