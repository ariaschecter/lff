@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/payment_method') }}">Payment Method</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    @include('sweetalert::alert')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card col-lg-6">
        <div class="card ">
            <div class="card-body">
            <h6 class="card-title">Add Payment Method</h6>
                <form method="POST" action="{{ url('admin/payment_method/add') }}">
                    @csrf
                    <div class="mb-1">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <input type="text" autofocus class="form-control @error('payment_method') is-invalid @enderror" id="payment_method" name="payment_method" value="{{ old('payment_method') }}" placeholder="Input Payment Name">
                    </div>
                    @error('payment_method') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="payment_name" class="form-label">Name</label>
                        <input type="text" autofocus class="form-control @error('payment_name') is-invalid @enderror" id="payment_name" name="payment_name" value="{{ old('payment_name') }}" placeholder="Input Payment Name">
                    </div>
                    @error('payment_name') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="rekening" class="form-label">Rekening</label>
                        <input type="number" autofocus class="form-control @error('rekening') is-invalid @enderror" id="rekening" name="rekening" value="{{ old('rekening') }}" placeholder="Input Rekening">
                    </div>
                    @error('rekening') <div class="text-danger">{{ $message }}</div> @enderror

                    <button class="btn btn-primary m-1 text-white">Add Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
