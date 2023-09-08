<!DOCTYPE html>
<html>
<head>
    <!-- head セクションのコードを追加 -->
</head>
<body>
    <h1>目標設定</h1>
    <form action="{{ route('set.goal') }}" method="POST">
        @csrf
        <label for="daily_goal">目標摂取カロリー:</label>
        <input type="number" name="daily_goal" id="daily_goal" value="{{ old('daily_goal') }}">
        <button type="submit">保存</button>
    </form>
</body>
</html>
