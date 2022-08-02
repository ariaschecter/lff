<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    public static function getAll(){
        return self::join('orders','payments.order_id','=','orders.id')
        ->join('payment_methods','payments.payment_method_id','=','payment_methods.id')
        ->join('users','orders.user_id','=','users.id')
        ->join('courses','payments.id','=','courses.id')
        ->select('*')
        ->orderBy('payments.payment_status', 'ASC')
        ->paginate(10);
    }

    // Belum
    public static function search($search){
        return self::join('orders','payments.order_id','=','orders.id')
        ->join('payment_methods','payments.payment_method_id','=','payment_methods.id')
        ->join('users','orders.user_id','=','users.id')
        ->join('courses','payments.id','=','courses.id')
        ->orWhere('payments.payment_ref', 'LIKE', "%{$search}%")
        ->orWhere('users.name', 'LIKE', "%{$search}%")
        ->orWhere('users.email', 'LIKE', "%{$search}%")
        ->orWhere('courses.course_name', 'LIKE', "%{$search}%")
        // ->select('orders.id AS order_id', 'users.name as name', 'users.email as email',
        // 'courses.course_name as course_name', 'orders.status as status')
        ->orderBy('payments.payment_status', 'ASC')
        ->paginate(10);
    }
}
