<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1　class="name">
            {{ $meal->name }}
        </h1>
        <a href="">{{ $meal->user->name }}</a>
        <div class="content">
            <div class="content__meal">
                <h3>食品名</h3>
                <P>{{ $meal->calories }}</P>
            </div>
        </div>
        <div class="edit">
            <a href="/meals/{{ $meal->id }}/edit">編集</a></div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>