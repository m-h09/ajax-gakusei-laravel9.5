<html>
    <head>
        <title>成績登録</title>
    </head>
    <body>
    @extends('layouts.app')
    @section('content')
       <h1>成績登録フォーム</h1>
       @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
       @endif

       @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
       @endif

       @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
       @endif

   <form id="seisekiForm" action="{{ route('seito.gakuseiseiseki_post', ['student' => $student->id]) }}" method="POST" enctype="multipart/form-data">
      
        
                @csrf
   <!-- <form action="{{ url('test-route') }}" method="POST" enctype="multipart/form-data">
    @csrf -->
                    <label for="grade">学年</label>
                    <select name="grade" id="grade">
                        <option value="">選択してください</option>
                        <!-- ↓から続き -->
                        <option value="1" {{ old('grade') == '1' ? 'selected' : '' }}>1年</option>
                        <option value="2" {{ old('grade') == '2' ? 'selected' : '' }}>2年</option>
                        <option value="3" {{ old('grade') == '3' ? 'selected' : '' }}>３年</option>
                        <option value="4" {{ old('grade') == '4' ? 'selected' : '' }}>4年</option>
                        <option value="5" {{ old('grade') == '5' ? 'selected' : '' }}>5年</option>
                        <option value="6" {{ old('grade') == '6' ? 'selected' : '' }}>6年</option>
                    </select><br>
                    
                    <label for="term">学期</label>
                    <select name="term" id="term">
                     <option value="1" {{ old('term') == '1' ? 'selected' : '' }}>1学期</option>
                     <option value="2" {{ old('term') == '2' ? 'seledted' : '' }}>２学期</option>
                     <option value="3" {{ old('term') == '3' ? 'selected' : '' }}>３学期</option>
                    </select><br>
     
                  <!-- 教科 -->
                    
                    <label for="japanese">国語</label>
                    <select name="japanese" id="japanese">
                     <option value="1" {{ old('japanese') == '1' ? 'selected' : '' }}>1</option>
                     <option value="2" {{ old('japanese') == '2' ? 'selected' : '' }}>2</option>
                     <option value="3" {{ old ('japanse') == '3' ? 'selected' : '' }}>3</option>
                     <option value="4" {{ old ('japanse') == '4' ? 'selected' : '' }}>4</option>
                     <option value="5" {{ old ('japanse') == '5' ? 'selected' : '' }}>5</option>
                    </select>
                        
             
                    <label for="math">数学</label>
                     <select name="math" id="math">
                        <option value="1" {{ old('math') == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('math') == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('math') == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('math') == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ old('math') == '5' ? 'selected' : '' }}>5</option>
                     </select>

                      
                       
                       
                     <label for="science">理科</label>
                      <select name="science" id="science">
                        <option value="1" {{ old('science') == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('science') == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('science') == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('science') == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ old('science') == '5' ? 'selected' : '' }}>5</option>
                      </select>
                       
                     
                      <label for="social_studies">社会</label>
                      <select name="social_studies" id="social_studies">
                        <option value="1" {{ old('social_studies') == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('social_studies') == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('social_studies') == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('social_studies') == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ old('social_studies') == '5' ? 'selected' : '' }}>5</option>
                      </select>
                       
                       
                       
                     <label for="music">音楽</label>
                       <select name="music" id="music">
                        <option value="1" {{ old('music') == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('music') == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('music') == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('music') == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ old('music') == '5' ? 'selected' : '' }}>5</option>
                       </select>
                      
                       
                       
                       <label for="home_economics">家庭科</label>
                           <select name="home_economics" id="home_economics">
                              <option value="1" {{ old('home_economics') =='1' ? 'selected' : '' }}>1</option>
                              <option value="2" {{ old('home_economics') =='2' ? 'selected' : '' }}>2</option>
                              <option value="3" {{ old('home_economics') =='3' ? 'selected' : '' }}>3</option>
                              <option value="4" {{ old('home_economics') =='4' ? 'selected' : '' }}>4</option>
                              <option value="5" {{ old('home_economics') =='5' ? 'selected' : '' }}>5</option>
                           </select>
                       
    
                       
                        <label for="english">英語</label>
                          <select name="english" id="english">
                            <option value="1" {{ old('english') =='1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('english') =='2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('english') =='3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('english') =='4' ? 'selected' : '' }}>4</option>
                            <option value="5" {{ old('english') =='5' ? 'selected' : '' }}>5</option>
                           </select>
                       
                        <label for="art">美術</label>
                           <select name="art" id="art">
                            <option value="1" {{ old('art') =='1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('art') =='2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('art') =='3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('art') =='4' ? 'selected' : '' }}>4</option>
                            <option value="5" {{ old('art') =='5' ? 'selected' : '' }}>5</option>
                           </select>
                       
                       
                        <label for="health_and_physical_education">保健体育</label>
                           <select name="health_and_physical_education" id="health_and_physical_education">
                              <option value="1" {{ old('health_and_physical_education') == '1' ? 'selected' : '' }}>1</option>
                              <option value="2" {{ old('health_and_physical_education') == '2' ? 'selected' : '' }}>2</option>
                              <option value="3" {{ old('health_and_physical_education') == '3' ? 'selected' : '' }}>3</option>
                              <option value="4" {{ old('health_and_physical_education') == '4' ? 'selected' : '' }}>4</option>
                              <option value="5" {{ old('health_and_physical_education') == '5' ? 'selected' : '' }}>5</option>
                           </select><br>
                       
                       
                        
            
                  <button type="submit" >登録</button>
                  <!-- <button type="submit">テスト送信</button> -->
              
                  

                  
                  <button type="button" onclick="window.location.href='{{ route('seito.Shosaikojin', ['student' => $student->id]) }}'">戻る</button>

        
        </form>
        
    @endsection
    </body>
</html>