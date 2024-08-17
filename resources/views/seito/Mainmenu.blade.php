<!DOCTYPE html>
<html>
    <head>
   
        <meta charset="UTF=8">
        <title>学生メニュー</title>
    </head>
    
    @extends('layouts.app')
    @section('content')
    <body>
    <h1>学生メニュー</h1><br><br>
    <!-- メッセージ表示 -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
        <form>
            @csrf
            <!-- GETメソッドを使用 -->
            <input type="submit" name="hyouji" value="学生表示" formaction="/gakusei/public/seito/gakuseihyouji"></input>
            <button type="submit" name="kousin" formaction="/gakusei/public/seito/update-grades" formmethod="POST">学年更新</button>
            <button type="submit" name="gakuseitoroku" value="学生登録" formaction="/gakusei/public/seito/gakuseitoroku" formmethod="GET">学生登録</button>
        </form>
</body>
    @stop
</html>