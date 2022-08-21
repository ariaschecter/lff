<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Course;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\CourseAccess;
use Illuminate\Support\Str;

class PersonController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth', ['only'/'except' => ['confirmPage', 'confirmOrder', 'invoice']]);
    }

    public function progres(){
        
    }

    public function course(){
        $id = Auth::user()->id;

        $data = CourseAccess::with('course')->where('user_id', $id)->get();

        $courses = Course::all();
        $categories = Category::all();

        return view('person.course', [
            'title' => 'My Courses',
            'categories' => $categories,
            'courses' => $data,
        ]);
    }

    public function order(){
        $id = Auth::user()->id;
        $orders = Order::with('course')->where('user_id', $id)->orderBy('order_status', 'ASC')->orderBy('created_at', 'DESC')->paginate(10);
        return view('person.order', [
            'title' => 'Order',
            'orders' => $orders,
        ]);
    }

    public function storeOrder(Course $course){
        $cek = Order::where('course_id', $course->id)->first();

        $data = [
            'order_ref' => Str::random(14),
            'user_id' => Auth::user()->id,
            'course_id' => $course->id,
            'price' => $course->price_new,
            'order_status' => 0,
            'created_at' => now(),
        ];

        if($cek){
            Alert::error('Error', 'You Can\'t Buy This Course Again');
            return back();
        } else {
            Order::insert($data);
            Alert::success('Success', 'You Success Order This Course');
            return redirect('order');
        }
    }

    public function payment(){
        $user = Auth::user();
        $payments = Payment::with(['order','paymentmethod'])
                    ->join('orders', 'payments.order_id', '=', 'orders.id')
                    ->where('orders.user_id', $user->id)->orderBy('payment_status', 'ASC')
                    ->orderBy('payments.created_at', 'DESC')->paginate(10);

        return view('person.payment', [
            'title' => 'Payment',
            'payments' => $payments,
            'user' => $user,
        ]);
    }

    public function addPayment(){
        $user = Auth::user();
        $orders = Order::with('course')->where('user_id', $user->id)->where('order_status', 0)->get();
        return view('person.addPayment', [
            'title' => 'Add Payment',
            'orders' => $orders,
            'paymentmethod' => PaymentMethod::all(),
        ]);
    }

    public function storePayment(Request $request){
        $validated = $request->validate([
            'order_id' => 'required',
            'payment_method_id' => 'required',
            'payment_picture' => 'required|image|file|max:1024',
        ]);
        if($request->payment_picture){
            $payment_picture = $request->file('payment_picture')->store('img/payment');
        } else {
            return back();
        }

        $store = [
            'order_id' => $request->order_id,
            'payment_method_id' => $request->payment_method_id,
            'payment_picture' => $payment_picture,
            'payment_ref' => Str::random(10),
            'payment_status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        Order::where('id', $request->order_id)->update(['order_status' => 1, 'updated_at' => now()]);
        Payment::insert($store);
        Alert::success('Success', 'Kamu telah melakukan pembayaran');
        return redirect('payment');

    }

}
