<?php
session_start();
require_once("db.php");
if(!empty($_POST['login'])&&!empty($_POST['password'])){
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    $result = mysqli_query($link, "SELECT * FROM users WHERE login = '$login' AND password ='$password'");
    $user = mysqli_fetch_assoc($result);
    if(!empty($user)){
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $user['login'];
        $_SESSION['id'] = $user['id'];
         $_SESSION['user_status'] = $user['status'];
                if ($_SESSION['user_status'] == '1')
                {
                    header("Location:admin.php");
                }
                elseif ($_SESSION['user_status'] == '2') {
                    header("location: problems.php");
                }
                }else {
        echo "Неверный логин и пароль";
    }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Техносервис</title>
    <link rel= "stylesheet" href="css/style.css">
</head>
<body>

<header>
     <h1>ООО Техносервис<h1>
</header>
<nav>
    <a href = "">Главная</a>
    <a href = ""> Подать заявку</a>
    <a href = "">Выход</a>
</nav>     
     <main>
     <h2>Авторизация<h2>
<form method="POST">
    <label for = 'login'>Логин</label>
    <input type='text' name='login' id='login'>
    <label for= 'password' >Пароль</label>
    <input type='password' name='password' id='password'>
    <button>Войти</button>
</form>
</main>   
</body>
</html>