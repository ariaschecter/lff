@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/transaction') }}">Transaction</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    @include('sweetalert::alert')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card col-lg-6">
        <div class="card ">
            <div class="card-body">
            <h6 class="card-title">Add Transaction</h6>
                <form method="POST" action="{{ url('admin/transaction/add') }}">
                    @csrf
                    <div class="mb-1">
                        <label for="ref" class="form-label">Ref</label>
                        <select class="form-select" id="ref" name="ref">

                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>

                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="nominal" class="form-label">Nominal</label>
                        <input type="number" autofocus class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal" value="{{ old('nominal') }}" placeholder="Input Payment Name">
                    </div>
                    @error('nominal') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="desc" class="form-label">Description</label>
                        <textarea name="desc" class="form-control" @error('desc') is-invalid @enderror id="desc" cols="30" rows="10"></textarea>
                    </div>
                    @error('desc') <div class="text-danger">{{ $message }}</div> @enderror

                    <button class="btn btn-primary m-1 text-white">Add Transaction</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
