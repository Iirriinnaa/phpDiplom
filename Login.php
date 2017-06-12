<?php session_start();
require_once 'AutoLoad.php';

if (Users::checkAuth()) {
	header('location: /');
}

$login='';
$error='';
$auth=false;
if (isset($_POST['submit-logout']))
{
	Users::Logout();
}
if (isset($_POST['submit']))
{
	$login= trim($_POST['login']);
	$password=trim($_POST['password']);
	if ($login=='') $error='Логин не введен';
	if ($password=='' && $error=='') $error = 'Пароль не введен';
	if ($error=='') {
		$Users = new Users();
		$auth = $Users->CheckLoginAndPass($login, Users::HashPassword($login,$password));
		if ($auth) {
			$_SESSION['login'] = $login;
			$_SESSION['UserAgent'] = md5($_SERVER['HTTP_USER_AGENT']);
			$message = '<p>Вы успешно авторизовались в системе. Сейчас вы будете переадресованы на главную страницу сайта. Если это не произошло, перейдите на неё по <a href="/">прямой&nbsp;ссылке</a>.</p>';
			header('Refresh: 5; URL = /');
		} else $error = 'Пара логин-пароль не найдены';
	}
}

$title = 'Авторизация';

require 'header.php';
?>


<?php if (!$auth)
{
	if (Users::checkAuth())
	{
		$html= '<p> Вы уже авторизованны под логином '.$_SESSION['login'].'. </p>';
		$html.='<p> Если вы хотитите зайти под другим логином, то выйдите из системы </p>';
		$html.='<form action="" method = "post">
<input type="submit" name="submit-logout" id="logout" value="Выйти из системы" /> </form>';
		echo $html;
	} else {
	echo '<div id="full_error" class="error" style="display:' . ($error ? 'inline-block' : 'none') . ';">';
	echo ($error ? $error : '')  . '</div>';
	}
}
?>

<div class="main-content">
    <div class="container">
    <div class="row">
        <h1 class="col-xs-12 col-sm-6 col-lg-6 col-sm-offset-3 col-lg-offset-4 section-heading">Авторизуйтесь!</h1>
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

<?php
require 'footer.php';