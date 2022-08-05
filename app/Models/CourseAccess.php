<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAccess extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getAll(){
        return self::join('users','course_accesses.user_id','=','users.id')
        ->join('courses','course_accesses.course_id','=','courses.id')
        ->orderBy('course_accesses.created_at', 'asc')
        ->paginate(10);
    }

    public static function search($search){
        return self::join('users','course_accesses.user_id','=','users.id')
        ->join('courses','course_accesses.course_id','=','courses.id')
        ->orWhere('users.name', 'LIKE', "%{$search}%")
        ->orWhere('courses.course_name', 'LIKE', "%{$search}%")
        ->orderBy('course_accesses.created_at', 'asc')
        ->paginate(10);
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
