<!DOCTYPE html>
<html>
<head>
    <title>学生表示画面</title>
    <!-- jQueryの読み込み -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<!-- 検索処理始まり -->
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                // HTMLのメタタグからCSRFトークンの値を取得
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function JsStudents(sortOrder ='asc'){
            let name = $('#name').val();
            let grade = $('#grade').val();

            $.ajax({
                url: '{{ route('seito.gakuseihyouji_post') }}',
                type: 'POST',
                // dataの中にあるオブジェクトキーを指定してajaxに求めるデータを指定
                data: {
                    name: name,
                    grade: grade,
                    sortOrder: sortOrder
                },
            })
            .done(function(response){
                console.log("Response received:", response);
                let resultsHtml = '';
                if(response.results && response.results.length > 0){ // 修正: タイポ修正とlengthチェック
                    resultsHtml = `
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>学年</th>
                                    <th>名前</th>
                                    <th>アクション</th>
                                </tr>
                            </thead>
                            <tbody>`;
                    
                    response.results.forEach(function(result){
                        resultsHtml += `
                            <tr>
                                <td>${result.grade}</td>
                                <td>${result.name}</td>
                                <td><a class="btn btn-primary" href="/seito/gakuseishosai/${result.id}">詳細</a></td>
                            </tr>`;
                    });

                    resultsHtml += `
                           </tbody>
                        </table>
                    </div>`;
                } else {
                    resultsHtml = '<p>検索結果がありません</p>';
                }
                
                $('#result').html(resultsHtml);
                $('#error-message').html('');
            }) 
            .fail(function(xhr, status, error){
                $('#error-message').html('正しい結果を得られませんでした。');
                console.log('通信失敗:', error);
            });
        }
        //検索ボタン
        $('#search').click(function(){
            JsStudents();
        });
        //ソートボタン
        $('#sort-asc').click(function(){
            JsStudents('asc');
        });
        $('#sort-desc').click(function(){
            JsStudents('desc');
        });

    }); 
</script>
<!-- 検索処理終了-->

<body>
@extends('layouts.app')
@section('content')
    <h1>学生表示画面</h1>

    <!-- 成功メッセージ -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- 検索フォーム -->
    <form  method="POST" action="{{ route('seito.gakuseihyouji_post') }}" name="shosaimain">
        @csrf
        <select id="grade" name="grade">
            <option value="">学年を選択してください</option>
            <option value="1" {{ request('grade') =='1' ? 'selected' : '' }}>1年生</option>
            <option value="2" {{ request('grade') =='2' ? 'selected' : '' }}>2年生</option>
            <option value="3" {{ request('grade') =='3' ? 'selected' : '' }}>3年生</option>
            <option value="4" {{ request('grade') =='4' ? 'selected' : '' }}>4年生</option>
            <option value="5" {{ request('grade') =='5' ? 'selected' : '' }}>5年生</option>
            <option value="6" {{ request('grade') =='6' ? 'selected' : '' }}>6年生</option>
        </select>
        <input type="text" id="name" name="name" value="{{ request('search') }}" placeholder="名前で検索する">
        <button type="button" id="search" class="search-button">検索</button>
        <button type="button" id="sort-asc" class="sort-button">昇順</button>
        <button type="button" id="sort-desc" class="sort-button">降順</button>
    </form>

    <!-- 検索結果の表示 -->
    <div id="result">
        @if($students->count())
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>学年</th>
                            <th>名前</th>
                            <th>アクション</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->grade }}</td>
                                <td>{{ $student->name }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('seito.Shosaikojin', $student->id) }}">詳細</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        @else
            <p>検索結果がありません</p>
        @endif
    </div>

    <!-- メインメニューへのリンク -->
    <form method="GET">
        @csrf
        <button type="submit" formaction="{{ url('seito/mainmenu') }}">戻る</button>
    </form>

@endsection
</body>
</html>
