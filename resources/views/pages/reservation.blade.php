@extends('layouts.master')
@section('header', 'Daftar Reservasi')
@section('reservation')
<div class="card">
    <div class="card-body">
        <table class="table">
            <div class="row mb-3 ml-1">
                <form action="/search" method="GET">
                    <input class="form-control col-4" type="text" name="search" placeholder="Cari Nama">
                    <input class="btn btn-primary ml-2" type="submit" value="Search">
                </form>
                <form action="/searchDate" method="GET">
                    <input class="form-control col-5 ml-5" type="date" name="searchDate">
                    <input class="btn btn-primary ml-2" type="submit" value="Search">
                </form>
            </div>
            <thead>
                <tr> <!-- Ini yang di file tabel.blade.php -->
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nama Kamar</th>
                <th scope="col">Email</th>
                <th scope="col">Check-In</th>
                <th scope="col">Check-Out</th>
                <th scope="col">Jumlah</th>
        
                
            </thead>
            <tbody>
                <?php $n=1; ?>
                @foreach($list as $p)
                <tr>
                <th scope="row">{{$n++}}</th>
                <td>{{$p->nama}}</td>
                <td>{{$p->namakamar}}</td>
                <td>{{$p->email}}</td>
                <td>{{$p->cekin}}</td>
                <td>{{$p->cekout}}</td>
                <td>{{$p->jumlah}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection