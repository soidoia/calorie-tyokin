<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>calo-Bank</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
    </head>
    <body>
        <h1>CalorieBnak</h1>
        <a href='/users/create'>入力画面</a>
        <div class='users'>
            @foreach ($users as $user)
                <div class='user'>
                    <h2 class='title'>
                        <a href="/posts/{{ $user->id }}">{{ $user->title }}</a>
                    </h2>
                    <p class='body'>{{ $user->body }}</p>
                    <!-- 以下を追記 -->
                    <form action="/users/{{ $user->id }}" id=for,_{{ $user->id }}" method="user">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $user->id }})">delete</button>
                    </form>
                </div>
            @endforeach    
        </div>
    <script>
        function deletePost(id) {
            'use strict'
            
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementByID('form_${id}').submit();
            }
        }
    </script>
    </body>
</html>