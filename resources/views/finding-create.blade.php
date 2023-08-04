<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Создание новой находки</title>
</head>
<body>
  <h1>Создание новой находки</h1>
  <form action="/findings/create" method="POST">
    @csrf
    <label for="name">Название:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="location">Местонахождение:</label>
    <input type="text" id="location" name="location" required><br><br>

    <label for="contacts">Контакты:</label>
    <input type="text" id="contacts" name="contacts" required><br><br>

    <input type="submit" value="Подтвердить">
  </form>
</body>
</html>