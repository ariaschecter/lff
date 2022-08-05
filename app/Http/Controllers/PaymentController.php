<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
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

    public function show($payment_ref){
        $payment = Payment::where('payment_ref', $payment_ref)->first();
        return view('admin.payment.show', [
            'active' => 'payment',
            'arsip' => false,
            'title' => 'Payment',
            'payment' => $payment,
        ]);
    }

    public function edit($payment_ref)
    {
        $payment = Payment::where('payment_ref', $payment_ref)->first();
        $order = Order::where('id', $payment->order_id)->first();

        $data = [
            'user_id' => $order->user_id,
            'course_id' => $order->course_id,
            'last_access' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        CourseAccess::insert($data);
        Payment::where('payment_ref', $payment_ref)->update(['payment_status' => 2]);
        Alert::success('Congrats', 'You\'ve Accept a Payment!');
        return redirect('admin/payment');
    }

    public function destroy($payment_ref){
        $payment = Payment::where('payment_ref', $payment_ref)->first();
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
        Payment::where('payment_ref', $payment_ref)->update($data);

        Alert::success('Congrats', 'You\'ve Decline a Payment!');
        return redirect('admin/payment');
    }

    // public function destroy($payment_ref)
    // {
    //     $payment = Payment::where('payment_ref', $payment_ref)->first();
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
    //     Payment::where('payment_ref', $payment_ref)->delete();
    //     CourseAccess::where($data)->delete();

    //     Alert::success('Congrats', 'You\'ve Deleted a Payment!');
    //     return redirect('admin/payment');
    // }
}
