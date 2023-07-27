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
    </body>
</html>
<a href=""></a>
