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
    <span class="goal">目標</span>
    <div class="daily_goal">
        <form action="/" method="GET">
            <input type="text" name="daily_goal" value="{{ request('daily_goal') }}">
            <input type="submit" value="保存">
        </form>
    </div>
    <form action="/" method="GET">
    <input type="date" name="date" value="{{ request('date') }}">
    <button>検索</button>
    </form>
    <a href='/meals/create'>追加</a>
    <div class='meals'>
        @foreach ($meals as $meal)
            <div class='meal'>
                <h3 class='name'>
                    {{ $meal->name }}
                </h3>
                <h4 class="calories">
                    {{ $meal->calories }}kcal
                </h4>
                <form action="/meals/{{ $meal->id }}" id="form_{{ $meal->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteUser({{ $meal->id }})">削除</button>
                </form>
                <a href="/meals/{{ $meal->id }}/edit">編集</a>
            </div>
        @endforeach
    </div>
    <img src="http://illustrain.com/img/work/2016/illustrain10-doubutu28.png">
    <table>
        <thead>
            <tr>
                <th>合計</th>
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
</body>
</html>
