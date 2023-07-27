<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Регистрация</title>
</head>
<body>
  <h1>Вход</h1>
  <form action="/login" method="POST">
    @csrf
    <label for="name">Логин:</label>
    <input type="text" id="login" name="login" required><br><br>

    <label for="location">Пароль:</label>
    <input type="text" id="password" name="password" required><br><br>

    <!-- <label for="contacts">Email:</label>
    <input type="email" id="email" name="email" required><br><br> -->

    <input type="submit" value="Подтвердить">
  </form>
</body>
</html>