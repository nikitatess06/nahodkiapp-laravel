<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $name }}</title>
</head>
<body>
    <h1>{{ $name }}</h1>
    <h2>{{ $location }}</h2>
    <h2>{{ $contacts }}</h2> 
    <img src="/findings/{{ $find->id }}/file" alt="image not found">
    @if (Auth::check())
    <form action="/findings/{{ $find->id }}" method="POST">
      @csrf
      @method('DELETE')
    <button type="submit">Удалить</button>
    </form>
    
    <form action="/findings/{{ $find->id }}/edit" method="GET">
    @csrf
    <a href="/findings/{{ $find->id }}/edit">Редактировать</a>
    </form>
    @endif
</body>
</html>

