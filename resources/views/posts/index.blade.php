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
        <a href='/posts/create'>入力画面</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach    
        </div>
    </body>
</html>