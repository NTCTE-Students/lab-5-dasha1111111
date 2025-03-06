<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));
    
    $errors = [];

    if (empty($username)) {
        $errors[] = 'Имя пользователя обязательно';
    }

    if (empty($password)) {
        $errors[] = 'Пароль обязателен';
    }

    if (empty($confirm_password)) {
        $errors[] = 'Подтверждение пароля обязательно';
    }

    if ($password !== $confirm_password) {
        $errors[] = 'Пароль и подтверждение пароля не совпадают';
    }

    if (empty($errors)) {
        print('<h1>Регистрация прошла успешно</h1>');
        print("Имя пользователя: {$username}<br>");
        print("Пароль: {$password}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}
?>

