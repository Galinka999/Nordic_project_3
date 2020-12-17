<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

// получение данных

$login = $_GET['login'];
$password = $_GET['password'];


// подключение к БАЗЕ ДАННЫХ и записываем
$connect = new \Nordic\Core\Connect();

// проверяем нового пользователя на существование такого логина и ли email
$result = mysqli_query($connect->getConnection(), "SELECT * FROM core_users WHERE login='$login' OR email='$login' ");
$user = mysqli_fetch_assoc($result);

if ($user['id']) {
    // начинаем проверку пароля, т.к. юзер с таким именем существует в БД
    if( hash_equals($user['password'], crypt($password, $user['password'])) ) {
        setcookie('user_id', $user['id'], time() + 3600, '/');
        if($user['user_group']==2) {
            header('Location: http://u97763.test-handyhost.ru/admin/?table=core_orders');
        } else {
            header('Location: http://u97763.test-handyhost.ru/catalog.php');
        }
    } else {
        header('Location:'. $_SERVER['HTTP_REFERER'].'?wrong=1'); //возвращает на страницу
    }
} else {
    header('Location:'. $_SERVER['HTTP_REFERER'].'?wrong=1');
}






