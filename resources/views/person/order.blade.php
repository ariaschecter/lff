@extends('layouts.user.person')

@section('body')
<div class="container">
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
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($orders as $item)
                                    <tr class="{{ $item->order_status == 1?'table-success':'' }}">
                                        <td>{{ $i++ }}</td>
                                        <td>#{{ $item->order_ref }}</td>
                                        <td>{{ $item->course->course_name }}</td>
                                        <td>Rp. {{ number_format($item->price, 0) }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            @if ($item->order_status == 0)
                                                <a href="{{ url('payment') }}" class="btn btn-primary">Payment</a>
                                            @else
                                            <button class="btn btn-success" disabled>Success</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
