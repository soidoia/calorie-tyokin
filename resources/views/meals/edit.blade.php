<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>calo-edit</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
   </head>
    <body>
       <h1 class="title">編集</h1>
       <div class="content">
           
           <form action="/meals/{{ $meal->id }}" method="POST">
               @csrf
               @method('PUT')
               <div class='content__title'>
                   <h2>meal</h2>
                   <input type="text" name='meal[name]' value="{{ $meal->name }}">
               </div>
               <div class='content__body'>
                   <h2>kcal</h2>
                   <input type='text' name='meal[calorie]' value="{{ $meal->calorie }}">
               </div>
               <input type="submit" value="更新">
           </form>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
       </div>
    </body>
</html>