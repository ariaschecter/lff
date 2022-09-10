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
    <a href="{{ url('admin/'.$active.'/add') }}" class="btn btn-primary m-3 col-lg-1">Add</a>


    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
          <div class="row flex-grow-1">

            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Pemasukan</h6>
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                      <h3 class="">Rp. {{ number_format($detail['pemasukan'], 0) }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Pengeluaran</h6>
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                      <h3 class="mb-2">Rp. {{ number_format($detail['pengeluaran'], 0) }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Total Finance</h6>
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                      <h3 class="mb-2">Rp. {{ number_format($detail['total'], 0) }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div> <!-- row -->

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h6 class="card-title">All Transaction</h6>
                <div class="table-responsive mb-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ref</th>
                                    <th>Nominal</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td>{{ $item->ref }}</td>
                                    <td>Rp. {{ number_format($item->nominal) }}</td>
                                    <td>{{ $item->desc }}</td>
                                    <td>
                                        <a href="{{ url('admin/'.$active.'/update/'.$item->id) }}" class="btn btn-success">Update</a>
                                        <a href="{{ url('admin/'.$active.'/delete/'.$item->id) }}" class="btn btn-danger show_confirm">Delete</a>
                                    </td>
                                </tr>
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
