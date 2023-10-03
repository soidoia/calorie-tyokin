<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>calo-bank</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    <style>
        body {
            background-color: rgba(255, 182, 193, 0.7);
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .title {
            font-size: 20px;
            color: #FF4500;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        h1 {
            text-align: center;
            font-size: 40px;
            color: #FFA500;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        h2 {
            font-size: 40px;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .meals {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .meal {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            width: 70%;
            background-color: #fff;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            text-align: left;
        }
        .data {
            font-size: 18px;
            margin: 5px;
        }
        img {
            position: absolute;
            top: 150px;
            right: 20px;
        }
        .total {
            position: absolute;
            font-size: 35px;
            font-weight: bold;
            color: #FF4500;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            top: 440px;
            right: 240px;
            z-index: 1;
        }
        
    </style>
    
</head>
<body>
    <div class="container">
    <div class="title">カロリーを貯めよう!!!!</div>
    <h1>カロリー貯金箱</h1>
    <h2>目標: {{ session('goal') }}kcal</h2>
    
    <div class="dailygoal">
    <form action="{{ route('setGoal') }}" method="POST">
        @csrf
            <input type="text" name="goal" placeholder="2000">
            <span class="calo-goal">kcal</span>
            <button type="submit">目標設定</button>
    </form>
        <div class="calender">
    <form action="/" method="GET">
    <input type="date" name="date" value="{{ request('date') }}">
    <button>検索</button>
    </form>
        </div>
    </div>
    <div class="navbar">
        <a href='/meals/create'>今日は何食べた？</a>
    </div>    
    <div class='meals'>
    @foreach ($meals as $meal)
        <div class='meal'>
            <p class='data'>
                {{ $meal->name }}　{{ $meal->calo }} kcal
            </p>
            <form action="/meals/{{ $meal->id }}" id="form_{{ $meal->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteUser({{ $meal->id }})">delete</button>
            </form>
            <a href="/meals/{{ $meal->id }}/edit">編集</a>
        </div>
    @endforeach
</div>
    <img src="https://illustrain.com/img/work/2016/illustrain10-doubutu28.png">
    <table>
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
           
                <tr>
                    <td class="total">
                        <span class="total-number">{{ $result }}kcal</span>
                    </td>
                </tr>
            
        </tbody>
    </table>

    <script>
        function deleteUser(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
    </div>
</body>
</html>
