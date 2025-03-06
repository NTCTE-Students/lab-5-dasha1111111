<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    
    $errors = [];

    if (empty($email)) {
        $errors[] = "Электронная почта обязательна";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "У электронной почты некорректный формат";
    }
    
    if (empty($errors)) {
        $email = htmlspecialchars($email);
        
        print('<h1>Подписка успешна</h1>');
        print("Вы подписаны на рассылку с электронной почтой: {$email}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}
?>
