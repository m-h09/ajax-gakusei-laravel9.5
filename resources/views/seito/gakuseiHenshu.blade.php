<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>学生編集</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <h2>編集フォーム</h2>
        <!-- フラッシュメッセージ -->
        @if (session('success')) 
        <div class="alert alert-success">
             {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
         
        <!-- フラッシュメッセージ終わり -->
        <div>
             
        <form action="{{ route('update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <!-- <input type="hidden" name="_method" value="PATCH"> -->

                <table>
                    <tr>
                        <th>id</th>
                        <td>{{$student->id}}</td>
                    </tr>
                    
                    <tr>
                        
                        <!-- 学年選択 -->
                        <th>学年</th>
                        <td>
                            <select id="grade" name="grade" style="width: 450px">
                                <option value="1" {{ old('grade' , $student->grade) == '1' ? 'selected' : '' }}>1年生</option>
                                <option value="2" {{ old('grade' , $student->grade) == '2' ? 'selected' : '' }}>2年生</option>
                                <option value="3" {{ old('grade' , $student->grade) == '3' ? 'selected' : '' }}>3年生</option>
                                <option value="4" {{ old('grade' , $student->grade) == '4' ? 'selected' : '' }}>4年生</option>
                                <option value="5" {{ old('grade' , $student->grade) == '5' ? 'selected' : '' }}>5年生</option>
                                <option value="6" {{ old('grade' , $student->grade) == '6' ? 'selected' : '' }}>6年生</option>
                                
                            </select>
                        </td>
                        
                    </tr>    
                    <tr>
                        <!-- 名前入力 -->
                        <th>氏名</th>
                        <td><input type="text" id="name" name="name" value="{{old('name',$student->name)}}" style="width:450px" placeholder="名前を入力してください。"></td>

                    </tr>
                    <tr>
                        <!-- 住所入力 -->

                        <th>住所</th>
                        <td><input type="text" id="address" name="address" value= " {{old('address',$student->address)}}" style="width:450px"  placeholder="住所を入力してください。"></td>
                    </tr>
                    <tr>
                        <!-- 顔写真選択 -->
                        <th>顔写真</th>
                        <td><input type="file" id="img_path"  name="img_path"  accept="image/png, image/jpeg"  /></td>
                        @if($student->img_path)
                         <img src="{{ asset('storage/' .  $student->img_path)}}"  width="150" height="150">
                        @else
                        <p>画像がありません</p>
                        @endif

                    </tr>
                    <tr>
                        <th>コメント</th>
                        <td><textarea name="comment" style=width:450px placeholder ="{{ $student->comment ?? 'コメントしてください'}}"  >{{ old('comment,$student->comment') }}</textarea></td>

                    </tr>

                </table>
               
                <!-- 登録ボタン -->
                <button type="submit" id="henshu3" name="henshu" value="編集">編集</button>

                <!-- <a class="btn btn-primary" href="{{ route('seito.Shosaikojin',$student->id) }}">戻る</a> -->
        </form>
        <form method="GET" action="{{ route('seito.Shosaikojin', $student->id) }}">
            @csrf
            <button type="submit">戻る</button>
        </form>
            

        </div>
        
    @endsection
    </body>

</html>