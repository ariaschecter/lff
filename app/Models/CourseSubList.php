<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubList extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function courselist(){
        return $this->hasMany(CourseList::class, 'course_sub_list_id')->orderBy('no', 'ASC');
    }
}
