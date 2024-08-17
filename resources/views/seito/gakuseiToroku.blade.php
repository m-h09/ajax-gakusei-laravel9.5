<!-- gakuseiToroku.php -->
<html>
    <!DOCTYPE html>
    <head>
        <title>学生登録</title>
    </head>
    @extends('layouts.app')
    @section('content')
    <body>
        <h1>学生登録画面</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('seito.store') }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <div>
                <label>氏名</label><br>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="名前を入力してください。"><br>
                @error('name')
                    <div class="text-danger">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div>
                <label>住所</label><br>
                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" placeholder="住所を入力してください。"><br>
                @error('address')
                    <div class="text-danger">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div>
                <label>顔写真</label><br>
                <input type="file" name="img_path" class="form-control" accept="image/png, image/jpeg"><br>
                @error('img_path')
                    <div class="text-danger">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>

            <input type="submit" value="登録" class="btn btn-success"><br>
            <input type="submit" formaction="{{ url('/seito/mainmenu') }}" value="戻る">
        </form>
    </body>
    @endsection
</html>
