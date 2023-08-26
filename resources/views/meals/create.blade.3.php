<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Calo-Bank</title>
    
   
</head>
<body>
    <!-- HTMLのコンテンツ -->
    <h1>カロリー貯金箱</h1>
    <form action="/meals" method="POST">
        @csrf
        <div id="food-items-container">
            <div class="food-item">
                <h2>食品名</h2>
                <input type="text" name="meal[name]" placeholder="ごはん">
                <h2>カロリー</h2>
                <input type="text" name="meal[calories]" placeholder="カロリー">
                <input type="submit" value="save">
                
            </div>
        </div>
       
        <input type="submit" value="保存">
    </form>
   
    <div class="footer">
        <a href="/">戻る</a>
    </div>
</body>
</html>
