<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function courselist(){
        return $this->hasMany(CourseList::class, 'course_id');
    }

    public static function newEnroll($id){
        return Course::where('id', $id)->increment('enroll');
    }
}
