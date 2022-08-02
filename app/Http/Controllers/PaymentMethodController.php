<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Alert;

class PaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->keyword;
        if($search){
            $data = PaymentMethod::where('payment_method', 'LIKE', "%{$search}%")
                                ->orWhere('payment_name', 'LIKE', "%{$search}%")
                                ->orWhere('rekening', 'LIKE', "%{$search}%")
                                ->paginate(10);
        } else {
            $data = PaymentMethod::paginate(10);
        }
        return view('admin.payment_method.index', [
            'active' => 'payment_method',
            'title' => 'Payment Method',
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('admin.payment_method.add', [
            'active' => 'payment_method',
            'title' => 'Add Payment Method',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment_method' => 'required|unique:payment_methods,payment_method',
            'payment_name' => 'required',
            'rekening' => 'required',
        ]);

        PaymentMethod::insert($validated);
        Alert::success('Congrats', 'You\'ve Add New Payment Method!');
        return redirect('admin/payment_method');
    }

    public function edit($id)
    {
        return view('admin.payment_method.edit', [
            'active' => 'payment_method',
            'title' => 'Edit Payment Method',
            'data' => PaymentMethod::where('id',$id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = PaymentMethod::where('id',$id)->first();

        if($data->payment_method != $request->payment_method){
            $validated = $request->validate([
                'payment_method' => 'required|unique:payment_methods,payment_method',
                'payment_name' => 'required',
                'rekening' => 'required',
            ]);
        }
        $update = [
            'payment_method' => $request->payment_method,
            'payment_name' => $request->payment_name,
            'rekening' => $request->rekening,
            'updated_at' => now(),
        ];
        PaymentMethod::where('id', $id)->update($update);
        Alert::success('Congrats', 'You\'ve Update a Payment Method!');
        return redirect('admin/payment_method');
    }

    public function destroy($id)
    {
        PaymentMethod::where('id', $id)->delete();
        Alert::success('Congrats', 'You\'ve Deleted a Payment Method!');
        return redirect('admin/payment_method');
    }
}

