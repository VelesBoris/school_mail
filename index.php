<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send mail to school</title>
</head>
<body>
    <div>
        <form action="server_scripts/send_mess.php" method="POST">
            <label>ФИО:</label>
            <input type="text" name="name" required placeholder="ФИО"><br>
            <label>Номер телефона:</label><br>
            <input type="tel" name="phone" required placeholder="Номер телефона"><br>
            <label>Электронная почта:</label><br>
            <input type="email" name="email" required placeholder="Электронная почта"><br>
            <label>Сообщение:</label><br>
            <textarea name="mess" required> </textarea><br>
            <input type="text" name="hp" class="hidden-field">
            <button type="submit">Отправить</button>
        </form>
    </div>
</body>
</html>