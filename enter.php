<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire');
session_start();
if(isset($_SESSION['admin'])){
    header("Location: index.php");
    exit;
}
$admin = 'vasil228';
$pass = '04c95ac8d4ddac707bd0c8020cee7ffa';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cards</title>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form_box">
<?php
    if(isset($_POST['submit'])){
	if($admin == $_POST['user'] AND $pass == md5($_POST['pass'])){
		$_SESSION['admin'] = $admin;
		header("Location: index.php");
		exit;
	} else echo '<p class="error">Логин или пароль неверны!</p>';
}
?>
<h3 class="main_color">Авторизация:</h3>

<form  method="post">
	<label >Логин: <input class="rfield" type="text" name="user" /></label>
	<label>Пароль: <input class="rfield" type="password" name="pass" /></label>
	<input type="submit" class="btn_submit"  name="submit" value="Войти" />
</form>
    <a href="index.php">На главную</a>
    </div>
</body>
</html>