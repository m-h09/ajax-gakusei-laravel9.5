<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\School_grade;

class MainmenuController extends Controller
{
    public function MenuView(Request $request){
        // dd($request);
        return view('seito.mainmenu');
    }

    public function StudentAll(Request $request)
    {
        
        
        // 初期クエリビルダー
        $keyword = Student::query();

        // 名前で検索
        if ($request->filled('name')) {
            $search = $request->input('name');
            $keyword->where('name', 'like', '%' . $name . '%'); // 部分一致検索
        }

        // 学年で検索
        if ($request->filled('grade') && $request->input('grade') !== '' && $request->input('grade') !== '学年を選択してください') {
            $grade = $request->input('grade');
            $keyword->where('grade', $grade);
        } 
        //
        // 学年を1～6に限定してソート
        $sortOrder = $request->input('sortOrder', 'asc');
        $keyword->whereBetween('grade', [1, 6])->orderBy('grade', $sortOrder);

        // クエリの実行
        $students = $keyword->get();
        
        // AJAXリクエストかどうかを確認
        if ($request->ajax()) {
            return response()->json([
                'results' => $students // すべてのデータを返す
            ]);
    }

        return view('seito.gakuseihyouji', ['students' => $students]);
    }

    //選択した学生の学生詳細画面をみる
    public function Shosaikojin($id, Request $request)
    {
          $student =Student::findOrFail($id);
          
          $gradeAll= School_grade::where('student_id',$id);

            //学年フィルタリング
            if ($request->filled('grade')) {
                $gradeAll->where('grade', $request->input('grade'));
            }
            //学期フィルタリング
            if ($request->filled('term')) {
                $gradeAll->where('term', $request->input('term'));
            }
            //学年、学期をまとめる
            $filtersubjects =$gradeAll->get();

            //setRelationでフィルタリング後のデータをリレーションとして置き換える
            $student->setRelation('subjects',$filtersubjects);
            // AJAXリクエストかどうかを確認
            if ($request->ajax()) {
                return response()->json([
                    'results' => $filtersubjects
                ]);
            }
    
        return view('seito.gakuseishosai', compact('student'));
    
       
    }
    
    

}

