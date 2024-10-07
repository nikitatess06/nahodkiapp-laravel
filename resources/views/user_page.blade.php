<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>
<body>

<header>
    <h1>Личный кабинет пользователя</h1>
</header>

<div>
    <h2>Логин: {{$username}} </h2>
    <h3>Ваши находки</h3>
    <ul> 

    @foreach ($findings as $finding)  
    <tr>
      <td><a href="/findings/{{ $finding->id }}">{{ $finding->name }}</a><img src="/findings/{{ $finding->id }}/file?v={{ time() }}" alt="image not found"></td>   
    </tr>
    @endforeach
  
    </ul>
</div>

  <form method="get" action="{{ route('create') }}">
    @csrf
    <button type="submit">Создать находку</button><br></br>
  </form>
  <form method="get" action="{{ route('findings') }}">
    @csrf
    <button type="submit">Список находок</button><br></br>
  </form>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Выйти</button>
  </form>

</body>
</html>