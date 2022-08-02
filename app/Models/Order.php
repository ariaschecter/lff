<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getAll(){
        return self::join('users','orders.user_id','=','users.id')
        ->join('courses','orders.course_id','=','courses.id')
        ->orderBy('orders.order_status', 'asc')
        ->paginate(10);
    }

    public static function search($search){
        return self::join('users','orders.user_id','=','users.id')
        ->join('courses','orders.course_id','=','courses.id')
        ->orWhere('users.name', 'LIKE', "%{$search}%")
        ->orWhere('users.email', 'LIKE', "%{$search}%")
        ->orWhere('courses.course_name', 'LIKE', "%{$search}%")
        ->orWhere('orders.order_ref', 'LIKE', "%{$search}%")
        ->orderBy('orders.order_status', 'asc')
        ->paginate(10);
    }
}
