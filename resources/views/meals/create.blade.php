<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>calo-create</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <!-- HTMLのコンテンツ -->
    <h1>新規画面</h1>
    <form action="/meals" method="POST">
        @csrf
                
                <input type="text" name="meal[name]" placeholder="とんかつ定食">
                <input type="text" name="meal[calorie]" placeholder="700">
                <span class="point-text">kcal</span>
                <button type="submit">追加</button>
    </form>
   
    <div class="footer">
        <a href="/">戻る</a>
    </div>
</body>
</html>