<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'AutoLoad.php';
$fields = array();
$reg=false;
?>
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
        <a href="../index.php" class="navbar-brand">Test-ISTU</a>
    </div>
    <!-- Содержимое меню (коллекция навигационных ссылок, формы и др.) -->
    <div class="collapse navbar-collapse" id="main-menu" >
        <!-- Список ссылок, расположенных слева -->
        <ul class="nav navbar-nav">
            <!--Элемент с классом active отображает ссылку подсвеченной <li class="active">-->
            <li><a href="../Blocks/main.html">Главная <span class="sr-only">(current)</span></a></li>
            <li><a href="../TestList.php">Список тестов</a></li>
            <li><a href="../about.html">О системе тестирования</a></li>
        </ul>
        <!-- Список ссылок, расположенный справа -->
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../Login.php">Войти</a></li>
            <li class="active"><a href="../registration.php">Зарегистрироваться</a></li>
        </ul>
    </div>
</nav>
<?php
//header('Content-Type: text/html; charset=utf-8');
//require_once 'AutoLoad.php';

if (isset($_POST['submit']))
{
    $users=new Users();
    $errors= array();
    $fields['login'] = trim($_POST['login']);
    $fields['name'] = trim($_POST['name']);
    $password = trim($_POST['password']);
    $password_again = trim($_POST['password_again']);
    $errors['name'] = $users->checkName($fields['name']) === true ? '' : $users->checkName($fields['name']);
    $errors['login'] = $users->checkLogin($fields['login']) === true ? '' : $users->checkLogin($fields['login']);
    $errors['password'] = $users->checkPassword($password) === true ? '' : $users->checkPassword($password);
    $errors['password_again'] = ($users->checkPassword($password) === true && $password === $password_again) ? '' : 'Введенные пароли не совпадают';
    if($errors['login'] == '' && $errors['password'] == '' && $errors['password_again'] == '' && $errors['name']=='') {
        $user=new User();
        $user->login=$fields['login'];
        $user->name= $fields['name'];
        $user->pass= Users::HashPassword($fields['login'],$password);
        $reg=$users->InsertUser($user);
        if ($reg)
        {
            $message= '<p>Вы успешно зарегистрировались в системе. Сейчас вы будете переадресованы к странице авторизации. Если это не произошло, перейдите на неё по <a href="login.php">прямой ссылке</a>.</p>';
            header('Refresh: 5; URL = login.php');
        }
    }

}
?>

<?php if (!$reg) { ?>

<div class="main-content">
    <div class="container">
        <div class="row">
            <h1 class="col-xs-12 col-sm-6 col-lg-6 col-sm-3 col-sm-offset-3 col-lg-offset-4 section-heading">Регистрация</h1>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-4 col-sm-offset-3 col-lg-offset-4">
                    <form class="form-group center-text" method="post">
                        <div class="form-group">
                            <label for="exampleInputLogin">Логин</label>

							<span class="login-tooltip help-login-tooltip" data-toggle="tooltip" data-placement="right" title="В имени пользователя могут быть только символы латинского алфавита, цифры, символы '_', '-', '.'. Длина имени пользователя должна быть не короче 4 символов и не длиннее 16 символов">i</span>							
							
                            <input name="login" type="login" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?=$fields['login'];?>">
							<div class="error" id="login-error"><?=$errors['login'];?></div>
							<!-- <div class="instruction" id="login-instruction">В имени пользователя могут быть только символы латинского алфавита, цифры, символы '_', '-', '.'. Длина имени пользователя должна быть не короче 4 символов и не длиннее 16 символов</div> -->
                        </div>
						<div class="form-group">
                            <label for="exampleInputName">Имя</label>
							
							<span class="login-tooltip help-login-tooltip" data-toggle="tooltip" data-placement="right" title="В имени пользователя могут быть только символы латинского алфавита, либо символы только русского алфавита. Длина имени пользователя должна быть не короче 4 символов и не длиннее 16 символов">i</span>
							
                            <input name="name" type="name" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?=$fields['name'];?>">
							<div class="error" id="name-error"><?=$errors['name'];?></div>
							<!-- <div class="instruction" id="login-instruction">В имени пользователя могут быть только символы латинского алфавита, либо символы только русского алфавита. Длина имени пользователя должна быть не короче 4 символов и не длиннее 16 символов</div> -->
						</div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Пароль</label>
							
							<span class="login-tooltip help-login-tooltip" data-toggle="tooltip" data-placement="right" title="В пароле вы можете использовать только символы латинского алфавита, цифры, символы '_', '!', '(', ')'. Пароль должен быть не короче 6 символов и не длиннее 16 символов">i</span>
							
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="">
							<div class="error" id="password-error"><?=$errors['password'];?></div>
							<!-- <div class="instruction" id="password-instruction">В пароле вы можете использовать только символы латинского алфавита, цифры, символы '_', '!', '(', ')'. Пароль должен быть не короче 6 символов и не длиннее 16 символов</div> -->
    					</div>
                        <div class="form-group">
                            <label for="exampleInput2Password1">Подтверждающий пароль</label>
							
							<span class="login-tooltip help-login-tooltip" data-toggle="tooltip" data-placement="right" title="Повторите введенный ранее пароль">i</span>
							
                            <input name="password_again" type="password" class="form-control" id="exampleInput2Password1" placeholder="Password" value="">
							<div class="error" id="password_again-error"><?=$errors['password_again'];?></div>
							<!-- <div class="instruction" id="password_again-instruction">Повторите введенный ранее пароль</div> -->
					    </div>
                        <!--<div class="form-group">
                            <div class="col-sm-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>-->
                        <!-- ты ничего не задизейблила это просто коменты-->
                        <div class="form-group">
                            <div class="col-sm-12 col-sm-offset-1">
                                <button name="submit" type="submit" class="btn btn-default">Зарегистрироваться</button>
								<button class="btn btn-reset" type="reset" name="reset" id="btn-reset" value="Очистить">Очистить</button>
                            </div>
                        </div>
                    </form>
<?php } else echo $message ?>
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

<script type"text/javascript">
	$(document).ready(function(){
		$('.help-login-tooltip').tooltip();
	});
</script>

</body>
</html>
<!--
<form action="" method="post">
    <div class="row">
        <label for="login">Укажите ваш логин:</label>
        <input type="text" class="text" name="login" id="login" value="<?=$fields['login'];?>" />
        <div class="error" id="login-error"><?=$errors['login'];?></div>
        <div class="instruction" id="login-instruction">В имени пользователя могут быть только символы латинского алфавита, цифры, символы '_', '-', '.'. Длина имени пользователя должна быть не короче 4 символов и не длиннее 16 символов</div>
    </div>
    <div class="row">
        <label for="login">Укажите ваше имя:</label>
        <input type="text" class="text" name="name" id="name" value="<?=$fields['name'];?>" />
        <div class="error" id="name-error"><?=$errors['name'];?></div>
        <div class="instruction" id="login-instruction">В имени пользователя могут быть только символы латинского алфавита, либо символы только русского алфавита. Длина имени пользователя должна быть не короче 4 символов и не длиннее 16 символов</div>
    </div>
    <div class="row">
        <label for="password">Напишите ваш пароль:</label>
        <input type="password" class="text" name="password" id="password" value="" />
        <div class="error" id="password-error"><?=$errors['password'];?></div>
        <div class="instruction" id="password-instruction">В пароле вы можете использовать только символы латинского алфавита, цифры, символы '_', '!', '(', ')'. Пароль должен быть не короче 6 символов и не длиннее 16 символов</div>
    </div>
    <div class="row">
        <label for="password_again">Повторите введенный пароль:</label>
        <input type="password" class="text" name="password_again" id="password_again" value="" />
        <div class="error" id="password_again-error"><?=$errors['password_again'];?></div>
        <div class="instruction" id="password_again-instruction">Повторите введенный ранее пароль</div>
    </div>
    <div class="row">
        <input type="submit" name="submit" id="btn-submit" value="Зарегистрироваться" />
        <input type="reset" name="reset" id="btn-reset" value="Очистить" />
    </div>
</form>
-->



