<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $date = trim($_POST['date']);
    $time = trim($_POST['time']);
    
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательно';
    } elseif (!preg_match("/^[a-zA-Zа-яА-ЯёЁ ]*$/u", $name)) {
        $errors[] = "В имени допускается использовать только буквы и пробелы";
    }
    
    if (empty($date)) {
        $errors[] = "Дата бронирования обязательна";
    } elseif (!DateTime::createFromFormat('Y-m-d', $date)) {
        $errors[] = "Некорректный формат даты";
    }
    
    if (empty($time)) {
        $errors[] = "Время бронирования обязательно";
    }
    
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $date = htmlspecialchars($date);
        $time = htmlspecialchars($time);
        
        print('<h1>Бронирование успешно</h1>');
        print("Имя: {$name}<br>");
        print("Дата бронирования: {$date}<br>");
        print("Время бронирования: {$time}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}
?>
