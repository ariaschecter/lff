<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Course;
use App\Models\Payment;
use App\Models\CourseAccess;
use Alert;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->keyword;
        if($search){
            $data = Order::search($search);
        } else {
            $data = Order::getAll();
        }
        // dd($data);
        return view('admin.order.index', [
            'active' => 'order',
            'arsip' => false,
            'title' => 'Order',
            'data' => $data,
        ]);
    }

    public function edit($order_ref)
    {
        $order = Order::where('order_ref', $order_ref)->first();

        $data = [
            'user_id' => $order->user_id,
            'course_id' => $order->course_id,
            'last_access' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        CourseAccess::insert($data);
        Order::where('order_ref', $order_ref)->update(['order_status' => 1]);
        Course::newEnroll($order->course_id);
        Alert::success('Congrats', 'You\'ve Accept a Order!');
        return redirect('admin/order');
    }

    public function destroy($order_ref)
    {
        $order = Order::where('order_ref', $order_ref)->first();

        Order::where('order_ref', $order_ref)->delete();
        Payment::where('order_id', $order->id)->delete();
        Alert::success('Congrats', 'You\'ve Deleted a Order!');
        return redirect('admin/order');
    }
}
