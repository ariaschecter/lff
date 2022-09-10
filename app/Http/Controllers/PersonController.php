<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Course;
use App\Models\CourseList;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\CourseAccess;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth', ['only'/'except' => ['confirmPage', 'confirmOrder', 'invoice']]);
    }

    public function progress(){
        $id = Auth::user()->id;

        $courses = CourseAccess::with('course')->where('user_id', $id)->orderBy('updated_at', 'DESC')->get();
        $categories = Category::all();

        return view('person.progress', [
            'title' => 'My Progress',
            'categories' => $categories,
            'courses' => $courses,
        ]);
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
        $cek = Order::where('user_id', Auth::id())->where('course_id', $course->id)->first();

        $data = [
            'order_ref' => strtoupper(Str::random(14)),
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
            'payment_ref' => strtoupper(Str::random(10)),
            'payment_status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        Order::where('id', $request->order_id)->update(['order_status' => 1, 'updated_at' => now()]);
        Payment::insert($store);
        Alert::success('Success', 'Kamu telah melakukan pembayaran');
        return redirect('payment');

    }

    public function getLast(Course $course){
        if(!$course) return redirect('progress');
        $akses = CourseAccess::where('user_id', Auth::id())
                    ->where('course_id', $course->id)->first();

        if($akses){
            $last = CourseList::where('course_id', $course->id)
                ->where('no', $akses->last_access)->first();

                return redirect('course/access/'.$course->slug.'/'.$last->id);
        }

    }

    public function access(Course $course, CourseList $courselist){
        $terakhir = false;
        $terawal = false;
        $noakhir = CourseList::where('course_id', $course->id)->orderBy('no', 'DESC')->first();
        $noawal = CourseList::where('course_id', $course->id)->orderBy('no', 'ASC')->first();
        $akses = CourseAccess::where('course_id', $course->id)->where('user_id', Auth::id())->first();
        $last = CourseList::where('course_id', $course->id)
                ->where('no', $akses->last_access)->first();
        if($course->id != $courselist->course_id) return abort(404);

        if($courselist->no == $akses->last_access + 1) {
            CourseAccess::where('course_id', $course->id)->where('user_id', Auth::id())
                        ->update(['last_access' => $courselist->no, 'updated_at' => now(),]);
            return redirect('course/access/'.$course->slug);
        } else if($courselist->no > $akses->last_access) {
            return redirect('course/access/'.$course->slug);
        } else if ($courselist->id == $noawal->id){
            $terawal = true;
        } else if ($courselist->id == $noakhir->id){
            $terakhir = true;
        }

        $next = CourseList::where('course_id', $course->id)->where('no', '>', $courselist->no)->orderBy('no', 'ASC')->first();
        $prev = CourseList::where('course_id', $course->id)->where('no', '<', $courselist->no)->orderBy('no', 'DESC')->first();
        $lastaccess = CourseList::where('course_id', $course->id)->where('no', $akses->last_access)->first();
        // dd($lastaccess);

        $lists = CourseList::where('course_id', $course->id)->orderBy('no', 'ASC')->get();
        $time = round(CourseList::where('course_id', $course->id)->sum('time')/60, 2);
        return view('person.access', [
            'title' => $course->course_name,
            'course' => $course,
            'courselist' => $courselist,
            'lists' => $lists,
            'time' => $time,
            'lastaccess' => $lastaccess,
            'next' => $next,
            'prev' => $prev,
            'terakhir' => $terakhir,
            'terawal' => $terawal,
        ]);
    }

    public function editProfile(){

        return view('settings.editProfile', [
            'title' => 'Edit Profile',
            'user' => Auth::user(),
        ]);
    }

    public function editPassword(){
        return view('settings.editPassword', [
            'title' => 'Edit Password'
        ]);
    }

    public function storeProfile(Request $request){
        $user = Auth::user();
        $validated = $request->validate([
            'name' => 'required',
            'user_picture' => 'image|file|max:1024',
        ]);

        $upload = 'img/profile/default.png';
        $picture = $user->user_picture;

        if($request->user_picture){
            if($picture != $upload){
                Storage::delete($picture);
            }
            $picture = $request->file('user_picture')->store('img/profile');
        }

        $data = [
            'name' => $request->name,
            'user_picture' => $picture,
            'updated_at' => now(),
        ];

        User::where('id', $user->id)->update($data);
        Alert::success('Congrats', 'You\'ve Update your Profile!');
        return back();
    }

    public function storePassword(Request $request){
        $user = Auth::user();
        // dd($user);
        $validated = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6',
            'passwordConfirmation' => 'required|same:newPassword',
        ]);

        if (Hash::check($request->oldPassword, $user->password)) {
            $data = [
                'password' => bcrypt($request->newPassword),
                'updated_at' => now(),
            ];
            User::where('id', $user->id)->update($data);
            Alert::success('Congrats', 'You\'ve Update your Profile!');
        } else {
            Alert::error('Error', 'Your Old Password does\'nt Match!');
        }

        return back();
    }


}
