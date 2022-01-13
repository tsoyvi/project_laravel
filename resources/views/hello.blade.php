<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hello, {{ $name }}</title>

    <!-- Styles -->
    <style>
        body {
            margin: 0 auto;
        }

        .container {
            margin: 0 auto;
            width: 90%;
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>Hello, {{ $name }}</h1>
    </div>
</body>

</html>