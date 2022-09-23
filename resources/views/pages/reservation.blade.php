@extends('layouts.master')
@section('header', 'Daftar Reservasi')
@section('reservation')
<div class="card">
    <div class="card-body">
        <table class="table">
            <form action="/search" method="GET">
                <div class="row mb-3">
                    <input class="form-control col-2 ml-3" type="text" name="search" placeholder="Search Table...">
                    <input class="btn btn-primary ml-4" type="submit" value="Search">
                </div>
            </form>
            <thead>
                <tr> <!-- Ini yang di file tabel.blade.php -->
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nama Kamar</th>
                <th scope="col">NIK</th>
                <th scope="col">Email</th>
                <th scope="col">Type</th>
                <th scope="col">Cekin</th>
                <th scope="col">Cekout</th>
                <th scope="col">Jumlah</th>
        
                
            </thead>
            <tbody>
                <?php $n=1; ?>
                @foreach($list as $p)
                <tr>
                <th scope="row">{{$n++}}</th>
                <td>{{$p->nama}}</td>
                <td>{{$p->namakamar}}</td>
                <td>{{$p->nik}}</td>
                <td>{{$p->email}}</td>
                <td>{{$p->type}}</td>
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