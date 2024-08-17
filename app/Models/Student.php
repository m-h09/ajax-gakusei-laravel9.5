<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Student extends Model
{

    use HasFactory;
    protected $table ='students';
    protected $primaryKey ='id';
    public $incrementing = true;
    protected $fillable = ['name', 'address', 'img_path','comment'];
    
    public function scopeSearch($query,$key){
      if (isset($params['grade']) && $params['grade'] !== '' && $params['grade'] !== '学年を選択してください') {
        $query->where('grade', $params['grade']);
    }

    if (!empty($params['search'])) {
        $search = $params['search'];
        $query->where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        });
    }

    return $query;
      

    }

  const UPDATED_AT = null;  
  //入力されたものからデータベースへ情報を取得する
    public function StudentAll(){
        $students = DB::table('Students')
          ->select(
           'id',
           'grade',
           'name',
           'address',
           'img_path',
           'comment',
           'created_at',
           'updated_at'
           )
          ->get();
   
          return $students;

    }
    //データベースから情報をとってくる
    public function store($request){
      DB::table('students')->insert([
        // 'grade' =>$request->grade,
        'name' => $request->name,
        'address'   => $request->address,
        'img_path'  => $request->img_path,
        // 'commment' =>$request->comment,
        
        
      ]);
      
      
    }
    public function subjects(){
      return $this->hasMany(School_grade::class,'student_id');
    }
  

  }