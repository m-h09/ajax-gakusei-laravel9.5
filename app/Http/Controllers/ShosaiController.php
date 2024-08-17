<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School_grade;
use App\Http\Requests\SchoolRequest;
use App\Http\Requests\ResultRequest;
use Illuminate\Support\Facades\Log;


class ShosaiController extends Controller

{

    public function TorokuView(){//参考create
       
        return view('seito.gakuseitoroku');
    }
    
    public function store(SchoolRequest $request)//学生登録フォームの新規登録
    {
        
        $validatedData = $request->validated(); // リクエストのバリデーション
        $path = null; // デフォルトのパスを設定
        if ($request->hasFile('img_path')) {
            $image = $request->file('img_path');
            $path = $image->store('items', 'public'); // 画像のアップロード
        }
    // データベースへの登録
        $student = new Student();
        $student->fill([
        
        'name' => $validatedData['name'],
        'address' => $validatedData['address'],
        'img_path' => $path, // 画像パスを設定
    ]);
    // dd($request->all());
    $student->name =$validatedData['name'];
    $student->address = $validatedData['address'];
    $student->comment = $validatedData['comment'] ?? $student->comment;
    
    $student->save();
    
    // return view('seito.gakuseitoroku');
    return redirect()->route('seito.gakuseitoroku')->with('success', '登録が完了しました。');
    }
    //

    public function gakuseiHenshu(Student $student){ //参考edit
        return view('seito.gakuseihenshu',compact('student'));//compactでコントローラーからviewへデータを受け渡しする
    }
    
    public function update(SchoolRequest $request ,$id){//学生編集フォーム・更新
        $validatedData = $request->validated();
        $student = Student::findOrFail($id);//指定されたIDの学生データをデータベースから取得
        
        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('items', 'public');
            $student->img_path = $path;
        }
        $student->grade = $validatedData['grade'];
        $student->name = $validatedData['name'];
        $student->address = $validatedData['address'];
        $student->comment = $validatedData['comment'];
        $student->save();
        
        return redirect()->route('seito.gakuseihenshu', ['student' => $student->id])->with('success', '学生情報が更新されました');
    }
    
    //destroy　削除
    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('seito.gakuseihyouji')->with('success', '学生が削除されました');
        
        
    }
    
    public function gakuseiSeiseki($id){//成績登録フォームへのルート・画面遷移
        $student = Student::findOrFail($id);
        return view('seito.gakuseiseiseki',compact('student'));
    }
    //
    
    
    
    
    public function storeSeiseki(ResultRequest $request, $id)
{
    \Log::info("storeSeiseki called with ID: " . $id);
    $validatedData = $request->validated();
    $student = Student::findOrFail($id);
    \Log::info("Student found: " . $student->id);

    $subject = new School_grade();
    $subject->student_id = $student->id;
    $subject->grade = $validatedData['grade'];
    $subject->term = $validatedData['term'];
    $subject->japanese = $validatedData['japanese'];
    $subject->math = $validatedData['math'];
    $subject->science = $validatedData['science'];
    $subject->social_studies = $validatedData['social_studies'];
    $subject->music = $validatedData['music'];
    $subject->home_economics = $validatedData['home_economics'];
    $subject->english = $validatedData['english'];
    $subject->art = $validatedData['art'];
    $subject->health_and_physical_education = $validatedData['health_and_physical_education'];
    $subject->save();

    \Log::info("Subject saved for student ID: " . $student->id);

    \Log::info("Redirecting to route: seito.gakuseiseiseki with student ID: " . $student->id);
    return redirect()->route('seito.gakuseiseiseki', ['student' => $student->id])
        ->with('success', '成績情報が登録されました。');
}



    
    
    
    
    public function seisekiHenshu($id){//変更・修正をここでする
        
        $subject = School_grade::findOrFail($id);
        $student = $subject->student; 
        return view('seito.seisekihenshu', compact('subject','student'));

    }
    
    
    public function updateSeiseki(ResultRequest $request, $id)//更新処理
    {
        $validatedData = $request->validated();
        
        $subject = School_grade::findOrFail($id);
        
        $subject->grade = $validatedData['grade'];
        $subject->term = $validatedData['term'];
        $subject->japanese = $validatedData['japanese'];
        $subject->math = $validatedData['math'];
        $subject->science = $validatedData['science'];
        $subject->social_studies = $validatedData['social_studies'];
        $subject->music = $validatedData['music'];
        $subject->home_economics = $validatedData['home_economics'];
        $subject->english = $validatedData['english'];
        $subject->art = $validatedData['art'];
        $subject->health_and_physical_education = $validatedData['health_and_physical_education'];
        
        $subject->save();
       
        

        return redirect()->route('seito.seisekihenshu', ['subject' => $subject->id])->with('success', '成績情報が更新されました');
        
    }
    
 
}


