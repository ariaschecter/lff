@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>
    @include('sweetalert::alert')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h6 class="card-title">All Order</h6>
                <div class="table-responsive mb-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ref</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Course Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($data as $item)
                            @php
                                // dd($item);
                            @endphp
                                <tr class="{{ $item->payment_status == 1?'table-success':'' }}">
                                    <th>{{ $i++ }}</th>
                                    <td>{{ $item->payment_ref }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->course_name }}</td>
                                    <td>
                                        @if ($item->payment_status == 0)
                                        <a href="{{ url('admin/'.$active.'/'.$item->payment_ref) }}" class="btn btn-primary">Show</a>
                                        @endif
                                        <a href="{{ url('admin/'.$active.'/delete/'.$item->payment_ref) }}" class="btn btn-danger show_confirm">Delete</a>
                                    </td>
                                </tr>
                                @php
                                    // endif;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
