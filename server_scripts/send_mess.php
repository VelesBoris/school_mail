<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Проверяем на правильность метода отправки формы
    $name = htmlspecialchars(trim($_POST['name']));  //Связываем данные из формы с именем name
    $phone = htmlspecialchars(trim($_POST['phone']));  //Связываем данные из формы с именем phone
    $email = htmlspecialchars(trim($_POST['email']));  //Связываем данные из формы с именем email
    $mess = htmlspecialchars(trim($_POST['mess']));  //Связываем данные из формы с именем mess
    
    //Проверка электронной почты
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die("Некорректный адрес электронной почты");
    }
    //Фильтр от СПАМ-ботов
    if(!empty($_POST['hp'])){
        die('СПАМ!');
    }

    $to = "адрес_школы@example.com"; //Адрес, на который будут направляться письма из формы

    $subject = 'Новое сообщение с сайта от ' . $name; //Тема письма

    //Тело письма
    $body = "
    <h2>Новое сообщение с сайта</h2>
    <p><strong>Имя:</strong> {$name}</p>
    <p><strong>Телефон:</strong> {$phone}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Сообщение:</strong> {$mess}</p>
    ";

    // Заголовки письма
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: {$email}\r\n";
    $headers .= "Reply-To: {$email}\r\n";

    //Пробуем отправить письмо
    if (mail($to, $subject, $body, $headers)){
        header('Location: index.php?status=success'); //Успешная отправка
    } else {
        header('Location: index.php?status=error'); //Отправка не завершена
    }
    exit;
} else { //Условие для тех, кто попытался зайти на скрипт напрямую (Не через форму)
    header('Location: index.php');
    exit;
}
?>
