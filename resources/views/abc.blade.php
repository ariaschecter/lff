@extends('layouts.admin.template')

@section('body')
@php
    $tahun = 2021;
    $prodi = 10370311;
@endphp
<div class="row col-lg-12">
    @for ($i = 1; $i < 10; $i++)
    <div class="card col-lg-1">
        <img class="card-img-top" src="https://krs.umm.ac.id/Poto/{{ $tahun }}/{{ $tahun }}{{ $prodi }}00{{ $i }}.JPG" alt="{{ $tahun }}{{ $prodi }}00{{ $i }}">
        <div class="card-body">
            <p class="card-text">NIM : {{ $tahun }}{{ $prodi }}00{{ $i }}</p>
        </div>
    </div>
    @endfor
    @for ($i = 10; $i < 100; $i++)
    <div class="card col-lg-1">
        <img class="card-img-top" src="https://krs.umm.ac.id/Poto/{{ $tahun }}/{{ $tahun }}{{ $prodi }}0{{ $i }}.JPG" alt="{{ $tahun }}{{ $prodi }}0{{ $i }}">
        <div class="card-body">
            <p class="card-text">NIM : {{ $tahun }}{{ $prodi }}0{{ $i }}</p>
        </div>
    </div>
    @endfor
    @for ($i = 100; $i < 600; $i++)
    <div class="card col-lg-1">
        <img class="card-img-top" src="https://krs.umm.ac.id/Poto/{{ $tahun }}/{{ $tahun }}{{ $prodi }}{{ $i }}.JPG" alt="{{ $tahun }}{{ $prodi }}{{ $i }}">
        <div class="card-body">
            <p class="card-text">NIM : {{ $tahun }}{{ $prodi }}{{ $i }}</p>
        </div>
    </div>
    @endfor
</div>
@endsection
