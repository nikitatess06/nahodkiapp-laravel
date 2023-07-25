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
    </body>
</html>