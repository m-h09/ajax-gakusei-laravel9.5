<html>
    <head>
        <title>成績編集</title>
    </head>
    <body>
    @extends('layouts.app')
    @section('content')
        <h1>成績編集フォーム</h1>
        @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
         </div>
        @endif

        <!-- エラー時に表示 -->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(isset($subject))
         <form action="{{ route('seito.updateseiseki', $subject->id) }}" method="POST" >
              @csrf
              @method('PATCH')
              
              
              <label for="grade">学年</label>
                    <select name="grade" id="grade">
                      <option value="1" {{ old('grade', $subject->grade == '1' ? 'selected' : '' )}}>1年生</option>
                      <option value="2" {{ old('grade', $subject->grade == '2' ? 'selected' : '' )}}>２年生</option>
                      <option value="3" {{ old('grade', $subject->grade == '3' ? 'selected': '' )}}>３年生</option>
                      <option value="4" {{ old('grade', $subject->grade == '4' ? 'selected' : '' )}}>4年生</option>
                      <option value="5" {{ old('grade', $subject->grade == '5' ? 'selected' : '' )}}>5年生</option>
                      <option value="6" {{ old('grade', $subject->grade == '6' ? 'selected' : '' )}}>6年生</option>
                    </select>
              
              <label for="term">学期</label>
                      <select name="term" id="term">
                        <option value="1" {{old('term', $subject->term =='1' ? 'selected' : '' )}}>1学期</option>
                        <option value="2" {{old('term', $subject->term =='2' ? 'selected' : '' )}}>２学期</option>
                        <option value="3" {{old('term', $subject->term =='3' ? 'selected' : '' )}}>３学期</option>
                        
                      </select><br>
            
              <label for="japanese">国語</label>
                  <select name="japanese" id="japanese">
                    <option value="1" {{old('japanese', $subject->japanese =='1' ? 'selected' : '' )}}>1</option>
                    <option value="2" {{old('japanese', $subject->japanese =='2' ? 'selected' : '' )}}>2</option>
                    <option value="3" {{old('japanese', $subject->japanese =='3' ? 'selected' : '' )}}>3</option>
                    <option value="4" {{old('japanese', $subject->japanese =='4' ? 'selected' : '' )}}>4</option>
                    <option value="5" {{old('japanese', $subject->japanese =='5' ? 'selected' : '' )}}>5</option>
                  </select>
                  
                <label for="math">数学</label>
                    <select name="math" id="math">
                      <option value="1" {{old('math', $subject->math =='1' ? 'selected' : '' )}}>1</option>
                      <option value="2" {{old('math', $subject->math =='2' ? 'selected' : '' )}}>2</option>
                      <option value="3" {{old('math', $subject->math =='3' ? 'selected' : '' )}}>3</option>
                      <option value="4" {{old('math', $subject->math =='4' ? 'selected' : '' )}}>4</option>
                      <option value="5" {{old('math', $subject->math =='5' ? 'selected' : '' )}}>5</option>
                    </select>
                  
                <label for="science">理科</label>
                  <select name="science" id="science">
                    <option value="1" {{ old('science', $subject->science =='1' ? 'selected' : '' )}}>1</option>
                    <option value="2" {{ old('science', $subject->science =='2' ? 'selected' : '' )}}>2</option>
                    <option value="3" {{ old('science', $subject->science =='3' ? 'selected' : '' )}}>3</option>
                    <option value="4" {{ old('science', $subject->science =='4' ? 'selected' : '' )}}>4</option>
                    <option value="5" {{ old('science', $subject->science =='5' ? 'selected' : '' )}}>5</option>
                  </select>
                  
                <label for="social_studies">社会</label>
                  <select name="social_studies" id="social_studies">
                    <option value="1" {{ old('social_studies', $subject->social_studies =='1' ? 'selected' : '' )}}>1</option>
                    <option value="2" {{ old('social_studies', $subject->social_studies =='2' ? 'selected' : '' )}}>2</option>
                    <option value="3" {{ old('social_studies', $subject->social_studies =='3' ? 'selected' : '' )}}>3</option>
                    <option value="4" {{ old('social_studies', $subject->social_studies =='4' ? 'selected' : '' )}}>4</option>
                    <option value="5" {{ old('social_studies', $subject->social_studies =='5' ? 'selected' : '' )}}>5</option>
                  </select>
                  
                <label for="music">音楽</label>
                  <select name="music" id="music">
                    <option value="1" {{ old('music', $subject->music =='1' ? 'selected' : '' )}}>1</option>
                    <option value="2" {{ old('music', $subject->music =='2' ? 'selected' : '' )}}>2</option>
                    <option value="3" {{ old('music', $subject->music =='3' ? 'selected' : '' )}}>3</option>
                    <option value="4" {{ old('music', $subject->music =='4' ? 'selected' : '' )}}>4</option>
                    <option value="5" {{ old('music', $subject->music =='5' ? 'selected' : '' )}}>5</option>
                  </select>
                  
                <label for="home_economics">家庭科</label>
                  <select name="home_economics" id="home_economics">
                    <option value="1" {{old('home_economics', $subject->home_economics =='1' ? 'selected' : '' )}}>1</option>
                    <option value="2" {{old('home_economics', $subject->home_economics =='2' ? 'selected' : '' )}}>2</option>
                    <option value="3" {{old('home_economics', $subject->home_economics =='3' ? 'selected' : '' )}}>3</option>
                    <option value="4" {{old('home_economics', $subject->home_economics =='4' ? 'selected' : '' )}}>4</option>
                    <option value="5" {{old('home_economics', $subject->home_economics =='5' ? 'selected' : '' )}}>5</option>
                  </select>
                  
                <label for="english">英語</label>
                    <select name="english" id="english">
                      <option value="1" {{old('english', $subject->english =='1' ? 'selected' : '' )}}>1</option>
                      <option value="2" {{old('english', $subject->english =='2' ? 'selected' : '' )}}>2</option>
                      <option value="3" {{old('english', $subject->english =='3' ? 'selected' : '' )}}>3</option>
                      <option value="4" {{old('english', $subject->english =='4' ? 'selected' : '' )}}>4</option>
                      <option value="5" {{old('english', $subject->english =='5' ? 'selected' : '' )}}>5</option>
                    </select>
                 
                <label for="art">美術</label>
                      <select name="art" id="art">
                        <option value="1" {{old('art', $subject->art =='1' ?'selected' : '' )}}>1</option>
                        <option value="2" {{old('art', $subject->art =='2' ?'selected' : '' )}}>2</option>
                        <option value="3" {{old('art', $subject->art =='3' ?'selected' : '' )}}>3</option>
                        <option value="4" {{old('art', $subject->art =='4' ?'selected' : '' )}}>4</option>
                        <option value="5" {{old('art', $subject->art =='5' ?'selected' : '' )}}>5</option>
                      </select>
                   
                <label for="health_and_physical_education">保健体育</label>
                      <select name="health_and_physical_education" id="health_and_physical_education">
                      <option value="1" {{old('health_and_physical_education', $subject->health_and_physical_education =='1' ? 'selected' : '' )}}>1</option>
                      <option value="2" {{old('health_and_physical_education', $subject->health_and_physical_education =='2' ? 'selected' : '' )}}>2</option>
                      <option value="3" {{old('health_and_physical_education', $subject->health_and_physical_education =='3' ? 'selected' : '' )}}>3</option>
                      <option value="4" {{old('health_and_physical_education', $subject->health_and_physical_education =='4' ? 'selected' : '' )}}>4</option>
                      <option value="5" {{old('health_and_physical_education', $subject->health_and_physical_education =='5' ? 'selected' : '' )}}>5</option>
                      </select><br>
          
                      <input type="hidden" name="student_id" value="{{ $subject->student_id }}">
                      <button type="submit">更新</button>
          </form>
          @else
        <p>成績データが利用できません。</p>
            @endif
            <form method="GET" action="{{ route('seito.Shosaikojin', $student->id )}}">
              @csrf
               <button type="submit">戻る</button>
            </form>
    @endsection
    </body>
</html>