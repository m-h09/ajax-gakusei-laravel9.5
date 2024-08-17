<html>
    <head>
        <title>詳細表示</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <meta name="csrf-token" content>
      
    </head>
    <body>
    @extends('layouts.app')
    @section('content')
    <h1>学生詳細画面</h1><br><br><br>
        <h2>学生表示</h2>
      
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                
                <tr>
                    <th>学年</th>
                    <th>氏名</th>
                    <th>住所</th>
                    <th width="150px">顔写真</th>
                    <th>コメント</th>
                    <th width="280px">アクション</th>
            
                </tr>
            </thead>
            <tbody>
            
                <tr>
                    <td>{{$student->grade}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->address}}</td>
                    <td><img src="{{ asset('storage/' . $student->img_path) }}"width="150" height="150"></td>
                    <td>{{$student->comment}}</td>
                
                    <td>
                        <form action="{{ route('destroy',$student->id) }}" method="POST">
                        @csrf
                        @method('DELETE') 
                            <a class="btn btn-primary" href="{{ route('seito.gakuseihenshu',$student->id) }}">編集</a>
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>  
       
        
       

        <form method="GET" action="{{ route('seito.Shosaikojin',$student->id) }}" name="shosaimain">
        @csrf
        <!-- 学年と名前で検索する -->
            <select name="grade" id="grade">
                <option value="">学年を選択</option>
                <option value="1" {{ request('grade') == '1' ? 'selected' : '' }}>1年生</option>
                <option value="2" {{ request('grade') == '2' ? 'selected' : '' }}>2年生</option>
                <option value="3" {{ request('grade') == '3' ? 'selected' : '' }}>3年生</option>
                <option value="4" {{ request('grade') == '4' ? 'selected' : '' }}>4年生</option>
                <option value="5" {{ request('grade') == '5' ? 'selected' : '' }}>5年生</option>
                <option value="6" {{ request('grade') == '6' ? 'selected' : '' }}>6年生</option>
            </select>
            <select name="term" id="term">
                <option value="">学期を選択</option>
                <option value="1" {{ request('term') == '1' ? 'selected' : '' }}>1学期</option>
                <option value="2" {{ request('term') == '2' ? 'selected' : '' }}>2学期</option>
                <option value="3" {{ request('term') == '3' ? 'selected' : '' }}>3学期</option>
            </select>
             <button type="button" id="search-button" class="search-button">検索</button><br>
            <script>
             $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#search-button').click(function() {
                    let grade = $('#grade').val();
                    let term = $('#term').val();

                    $.ajax({
                        url: '{{ route('seito.Shosaikojin',$student->id) }}', // ルートURLを適切に設定
                        type: 'GET',
                        data: {
                            grade: grade,
                            term: term,
                        }
                    })
                    .done(function(response) {
                        let resultsHtml = '<ul>';
                        response.results.forEach(function(result) {
                            resultsHtml += '<li>' + result.grade + ' - ' + result.term + '</li>';
                        });
                        resultsHtml += '</ul>';
                        $('#result').html(resultsHtml);
                        $('#error-message').html('');
                    })
                    .fail(function(xhr, status, error) {
                        $('#error-message').html('正しい結果を得られませんでした。');
                        console.log('通信失敗:', error);
                    });
                });
             });
            </script>
        
    </form>
        

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead>
    
                    <tr>
                        <th>学年</th>
                        <th>学期</th>
                        <th>国語</th>
                        <th>数学</th>
                        <th>理科</th>
                        <th>社会</th>
                        <th>音楽</th>
                        <th>家庭科</th>
                        <th>英語</th>
                        <th>美術</th>
                        <th>保健体育</th>
                        <th>アクション</th>
            
                    </tr>
                </thead>
                <tbody>
                @foreach($student->subjects as $subject)
                    
                    <tr>
                        <td>{{$subject->grade}}</td>
                        <td>{{$subject->term}}</td>
                        <td>{{$subject->japanese}}</td>
                        <td>{{$subject->math}}</td>
                        <td>{{$subject->science}}</td>
                        <td>{{$subject->social_studies}}</td>
                        <td>{{$subject->music}}</td>
                        <td>{{$subject->home_economics}}</td>
                        <td>{{$subject->english}}</td>
                        <td>{{$subject->art}}</td>
                        <td>{{$subject->health_and_physical_education}}</td>
                        <td> 
                     
                            <a class="btn btn-primary" href="{{ route('seito.seisekihenshu', $subject->id) }}">編集</a>
                            <!-- 各アクションボタンごとにフォームを個別にする -->
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table><br>
            
            
            
        </div>      
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
       <!-- 成績登録ボタンのフォーム -->
       
            <form action="{{ route('seito.gakuseiseiseki' , ['student' => $student->id]) }}" method="GET">
                 @csrf
                 <button type="submit">成績登録</button>
            </form>
                
            <form action="{{ route('seito.gakuseihyouji') }}" method="GET">
                <button type="submit">戻る</button>
            </form>
        

       
       
    @endsection
    </body>
</html>
