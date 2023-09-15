<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>eating-create</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <!-- HTMLのコンテンツ -->
    <h1>グルメ採点</h1>
    <form action="/meals" method="POST">
        @csrf
                
                <input type="text" name="meal[name]" placeholder="とんかつ">
                <input type="text" name="meal[review]" placeholder="20">
                <span class="point-text">point</span>
                <button type="submit">採点</button>
    </form>
   
    <div class="footer">
        <a href="/">戻る</a>
    </div>
</body>
</html>