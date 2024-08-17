<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school_grade extends Model
{
    use HasFactory;
    protected $table = 'school_grades';
    protected $primaryKey ='id';
    public $incrementing = true;
    protected $fillable = [
      // 'student_id',
      'grade', 
      'term', 
      'japanese', 
      'math', 
      'science', 
      'social_studies', 
      'music', 
      'home_economics', 
      'english', 
      'art', 
      'health_and_physical_education'
  ];

    public function subject(){
      $subject=DB::table('school_grades')
      ->select
      ('id',
        'student_id',
        'grade',
        'term',
        'japanese',
        'math',
        'science',
        'social_studies',
        'music',
        'home_economics',
        'english',
        'art',
        'health_and_physical_education'
      )
      ->get();
      return $subjects;
    }


public function Shinkiseiseki($request){
  // Eloquentを使用してデータを挿入
  $new_grade = new self();
  $new_grade->fill([

      'grade' => $request->grade,
      'term' => $request->term,
      'japanese' => $request->japanese,
      'math' => $request->math,
      'science' => $request->science,
      'social_studies' => $request->social_studies,
      'music' => $request->music,
      'home_economics' => $request->home_economics,
      'english' => $request->english,
      'art' => $request->art,
      'health_and_physical_education' => $request->health_and_physical_education,
  ]);
  $new_grade->save();
}
public function student()
    {
        return $this->belongsTo(Student::class ,'student_id');
    }

}
