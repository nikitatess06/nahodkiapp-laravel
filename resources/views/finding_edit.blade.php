<!DOCTYPE html>
<html>
@csrf
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Редактирование</title>
</head>
<body>
  <h1>Редактирование</h1>
  <form action="/findings/{{$find->id}}/edit" method="POST">
  @method('PATCH')
  @csrf
    <label for="name">Название:</label>
    <input type="text" value="{{$name}}" id="name" name="name" required><br><br>

    <label for="location">Местонахождение:</label>
    

    <label for="contacts">Контакты:</label>
    <input type="text" value="{{$contacts}}" id="contacts" name="contacts" required><br><br>

    <input type="submit" value="Подтвердить">
  </form>
</body>
</html>