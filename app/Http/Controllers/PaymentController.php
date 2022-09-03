<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Course;
use App\Models\CourseAccess;
use Alert;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->keyword;
        if($search){
            $data = Payment::search($search);
        } else {
            $data = Payment::getAll();
        }
        // dd($data);
        return view('admin.payment.index', [
            'active' => 'payment',
            'arsip' => false,
            'title' => 'Payment',
            'data' => $data,
        ]);
    }

    public function show(Payment $payment)
    {
        return view('admin.payment.show', [
            'active' => 'payment',
            'arsip' => false,
            'title' => 'Payment',
            'payment' => $payment,
        ]);
    }

    public function edit(Payment $payment)
    {
        $order = Order::where('id', $payment->order_id)->first();

        $data = [
            'user_id' => $order->user_id,
            'course_id' => $order->course_id,
            'last_access' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        CourseAccess::insert($data);
        Course::newEnroll($order->course_id);
        Payment::where('id', $payment->id)->update(['payment_status' => 2]);
        Alert::success('Congrats', 'You\'ve Accept a Payment!');
        return redirect('admin/payment');
    }

    public function destroy(Payment $payment){
        $order = Order::where('id', $payment->order_id)->first();

        $data = [
            'payment_status' => 1,
            'updated_at' => now(),
        ];

        $update = [
            'order_status' => 0,
            'updated_at' => now(),
        ];

        Order::where('id', $payment->order_id)->update($update);
        Payment::where('id', $payment->id)->update($data);

        Alert::success('Congrats', 'You\'ve Decline a Payment!');
        return redirect('admin/payment');
    }

    // public function destroy(Payment $payment)
    // {
    //
    //     $order = Order::where('id', $payment->order_id)->first();

    //     $data = [
    //         'user_id' => $order->user_id,
    //         'course_id' => $order->course_id,
    //     ];
    //     $update = [
    //         'order_status' => 0,
    //         'updated_at' => now(),
    //     ];

    //     Order::where('id', $payment->order_id)->update($update);
    //     Payment::where('id', $payment->id)->delete();
    //     CourseAccess::where($data)->delete();

    //     Alert::success('Congrats', 'You\'ve Deleted a Payment!');
    //     return redirect('admin/payment');
    // }
}
