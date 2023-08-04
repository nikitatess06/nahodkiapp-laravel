<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Список находок</title>
</head>
<body>
<table>
  <thead>
    <tr>
      <th>Находки</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($findings as $finding)  
    <tr>
      <td><a href="/findings/{{ $finding->id }}">{{ $finding->name }}</a></td>
    </tr>
    @endforeach
</tbody>
</table>  
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Выйти</button>
  </form>
  <form method="get" action="{{ route('create') }}">
    @csrf
    <button type="submit">Создать находку</button>
  </form>
    </body>
</html>
<a href=""></a>
