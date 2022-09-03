@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/payment') }}">Payment</a></li>
            <li class="breadcrumb-item active" aria-current="page">#{{ $payment->payment_ref }}</li>
        </ol>
    </nav>
    @include('sweetalert::alert')
<div class="row col-lg-5">
    <div class="card mb-3 p-2">
        <img src="{{ asset('storage/'. $payment->payment_picture) }}" class="card-img-top" alt="{{ $payment->payment_ref }}">
        <div class="card-body">
            <h2 class="card-title">Name {{ $payment->order->user->name }}</h2>
            <h5 class="card-text mb-1">Course {{ $payment->order->course->course_name }}</h5>
            <p class="card-text mb-1">Rp. {{ number_format($payment->order->price, 0) }}</p>
            @php
            $angka = $payment->payment_status;
                if($angka == 0){
                    $btn = 'Review';
                } else if($angka == 1){
                    $btn = 'Decline';
                } else if($angka == 2){
                    $btn = 'Accept';
                }
            @endphp
            <div class="btn btn-info mb-2"><h5>Status : {{ $btn }}</h5></div>
            <div class="">
                @if ($angka != 2)
                <a href="{{ url('admin/payment/accept/'.$payment->id) }}" class="btn btn-success">Accept</a>
                <a href="{{ url('admin/payment/decline/'.$payment->id) }}" class="btn btn-warning">Decline</a>
                @endif
                {{-- <a href="{{ url('admin/payment/delete/'.$payment->id) }}" class="btn btn-danger show_confirm">Delete</a> --}}
            </div>
        </div>
    </div>
</div>
@endsection
