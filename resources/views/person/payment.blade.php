@extends('layouts.user.person')

@section('body')
<div class="container">
    <div class="row">
        <a href="{{ url('payment/add') }}" class="btn btn-primary rounded-pill m-3 col-lg-1">Add</a>
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
                                        <th>Course Name</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($payments as $item)
                                @php
                                    switch($item->payment_status){
                                        case 0 : $css = 'btn-info'; $text = 'Pending'; break;
                                        case 1 : $css = 'btn-warning'; $text = 'Decline'; break;
                                        case 2 : $css = 'btn-success'; $text = 'Success'; break;
                                    }
                                    $chatWa = 'https://api.whatsapp.com/send/?phone=6281235375978&text=Halo+Learn%20For%20Future%20(Admin%20Aria),+Email+saya+'.$user->email.'+telah+membayar+kelas+'.$item->order->course->course_name.'+tapi+statusnya+'.$text.'.+Mohon+bantuannya.+Terima+kasih.';
                                @endphp
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>#{{ $item->payment_ref }}</td>
                                        <td>{{ $item->order->course->course_name }}</td>
                                        <td>Rp. {{ number_format($item->order->price, 0) }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <div class="btn rounded-pill {{ $css }}">{{ $text }}</div>
                                        </td>
                                        <td>
                                            @if ($item->payment_status == 2)
                                                <a href="#" class="btn btn-success rounded-pill" target="_blank">Success</a>
                                            @else
                                                <a href="{{ $chatWa }}" class="btn btn-primary rounded-pill" target="_blank">Follow Up</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $payments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
