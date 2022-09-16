@extends('layouts.user.person')

@section('body')
<div class="container">
    <div class="row">
        <form method="POST" action="{{ url('payment/add') }}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex align-items-center mb-3 pb-1">
                <span class="h1 fw-bold mb-0">Payment</span>
            </div>

            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Pay a Course</h5>

            <div class="form-outline mb-4">
                <label for="order_id" class="select-label mt-2 ms-3">Order</label>
                <select class="nice-select" id="order_id" name="order_id">
                    @foreach ($orders as $order)
                        <option class="form-control" value="{{ $order->id }}">
                            {{ $order->course->course_name.' - Rp. '. number_format($order->price, 0) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-outline mb-4">
                <label for="payment_method_id" class="select-label mt-2 ms-3">Payment Method</label>
                <select class="nice-select" id="payment_method_id" name="payment_method_id">
                    @foreach ($paymentmethod as $method)
                        <option class="form-control" value="{{ $method->id }}">{{ $method->payment_method.' - '. $method->rekening.' - '.$method->payment_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-outline mb-4">
                <label for="payment_picture" class="form-label mb-3">Payment Picture</label>
                <input type="file" class="form-control @error('payment_picture') is-invalid @enderror" id="payment_picture" name="payment_picture">
            </div>

            @error('payment_picture') <div class="text-danger">{{ $message }}</div> @enderror


            <div class="pt-1 mb-4">
                <button class="btn theme_btn free-btn"
                    type="submit">Pay</button>
            </div>
        </form>
    </div>
</div>
<script>
    function price(price){
        var isinya = document.getElementById("price");
        isinya.value = price;
    }
</script>
@endsection
