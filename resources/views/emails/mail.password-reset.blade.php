<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сброс пароля</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Сброс пароля</h1>
        <p>Здравствуйте, {{ $user->name }}!</p>
        <p>Вы получили это письмо, потому что мы получили запрос на сброс пароля для вашей учетной записи.</p>
        <p>Чтобы сбросить пароль, нажмите на кнопку ниже:</p>
        <p>
            <a href="{{ $resetLink }}" class="button">Сбросить пароль</a>
        </p>
        <p>Если вы не запрашивали сброс пароля, просто проигнорируйте это письмо.</p>
        <p>С уважением,<br>Ваша команда</p>
    </div>
</body>
</html>