@extends('layouts.master')
@section('header', 'Bukti Pemesanan')
@section('dashboard')
<div class="row">
    @foreach ($card as $index)
    <div class="card mr-4 p-3" style="width: 18rem">
        <h5 class="card-title mt-3 ml-3">{{$index->namakamar}}</h5>
        <ul>
            <li class="card-text">Nama Pemesan: {{$index->nama}}</li>
            <li class="card-text">Tipe Kamar: {{$index->type}}</li>
            <li class="card-text">Jumlah Kamar: {{$index->jumlah}}</li>
            <li class="card-text">Tanggal Check-In: {{$index->cekin}}</li>
            <li class="card-text">Tanggal Check-Out: {{$index->cekout}}</li>
        </ul>
    </div>
    @endforeach
</div>

@endsection