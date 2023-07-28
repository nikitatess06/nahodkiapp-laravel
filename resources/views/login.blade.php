<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Вход</title>
</head>
<body>
  <h1>Вход</h1>
  <form action="/login" method="POST">
    @csrf
    <label for="name">Логин:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="location">Пароль:</label>
    <input type="text" id="password" name="password" required><br><br>
    <input type="submit" value="Подтвердить">
  </form>
  
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>