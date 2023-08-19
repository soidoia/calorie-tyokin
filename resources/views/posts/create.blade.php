<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Calo-Bank</title>
   </head>
    <body>
        <h1>CalorieBnak</h1>
       <form action="/posts" method="POST">
           @csrf
           <div class="title">
               <h2>食品</h2>
               <input type="text" name="post[title]" placeholder="ごはん"/>
           </div>
           <div class="body">
               <h2>カロリー</h2>
               <textarea name="post[body]" placeholder="200kcal"></textarea>
           </div>
           <input type="submit" value="保存"/> 
       </form>
       <div class="footer">
           <a href="/">戻る</a>
       </div>
    </body>
</html>