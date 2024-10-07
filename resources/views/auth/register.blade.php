<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Регистрация</title>
</head>
<body>
  <h1>Регистрация</h1>
<form action="/register" method="POST">
    @csrf
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="password_confirmation">Подтвердите пароль:</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required><br><br>

    <input type="submit" value="Подтвердить">
    
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>
</body>
</html>
