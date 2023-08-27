<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>calo-Bank</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
    </head>
    <body>
        <h1>カロリー貯金箱</h1>
        <a href='/meals/create'>新規作成</a>
        
        
        <div class='meals'>
            @foreach ($meals as $meal)
                <div class='meal'>
                    <h2 class='name'>
                        <a href="/meals/{{ $meal->id }}">{{ $meal->name }}</a>
                    </h2>
                    <p class='body'>{{ $meal->calories }}</p>
                    <!-- 以下を追記 -->
                    <form action="/meals/{{ $meal->id }}" id="form_{{ $meal->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteUser({{ $meal->id }})">削除</button>
                    </form>
                    <a href="/meals/{{ $meal->id }}/edit">編集画面</a>
                </div>
            @endforeach    
        </div>
        
<table>
    <thead>
      <tr>
        
        <th>合計カロリー</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($result as $val)
      <tr>
        
        <td>{{ $val->total_calories }}</td>
      </tr>
    @endforeach
    </tbody>
</table>


    <script>
        function deleteUser(id) {
            'use strict'
            
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById('form_${id}').submit();
            }
        }
    </script>
    

    </body>
</html>