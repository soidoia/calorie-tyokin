<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Calo-Bank</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
   </head>
    <body>
       <h1 class="title">編集画面</h1>
       <div class="content">
           <form action="/posts/{{ $post->id }}" method="POST">
               @csrf
               @method('PUT')
               <div class='content__title'>
                   <h2>食品名</h2>
                   <input type="text" name='post[title]' value="{{ $post->title }}">
               </div>
               <div class='content__body'>
                   <h2>カロリー</h2>
                   <input type='text' name='post[body]' value="{{ $post->body }}">
               </div>
               <input type="submit" value="update">
           </form>
       </div>
    </body>
</html>