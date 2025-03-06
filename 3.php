<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    $errors = [];

    if (empty($username)) {
        $errors[] = 'Имя пользователя обязательно';
    } elseif (strlen($username) < 4) {
        $errors[] = "Имя пользователя должно содержать не менее 4 символов";
    }
    
    if (empty($password)) {
        $errors[] = "Пароль обязателен";
    }

    if (empty($errors)) {
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        
        print('<h1>Данные обработаны</h1>');
        print("Имя пользователя: {$username}<br>");
        print("Пароль: {$password}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}
?>
