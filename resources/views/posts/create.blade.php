<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Calo-Bank</title>
   </head>
    <body>
        <h1>カロリー貯金箱</h1>
       <form action="/posts" method="POST">
           @csrf
           <div class="meal">
               <h2>食品名</h2>
               <select name="post[meal_id]">
                    @foreach($meals as $meal)
                        <option value="{{ $meal->id }}">{{ $meal->name }}</option>
                    @endforeach                
               </select>
           </div>
           <input type="submit" value="保存"/> 
       </form>
       <div class="footer">
           <a href="/">戻る</a>
       </div>
    </body>
</html>