@extends('layouts.master')
@section('header', 'Settings')

@section('dashboard')
<div class="section-body">
    <h2 class="section-title">Overview</h2>
    <p class="section-lead">
      Organize and adjust all settings about this site.
    </p>

    <div class="row">
      <div class="col-lg-6" @if (auth()->user()->role != 'Admin') hidden @endif>
        <div class="card card-large-icons">
            <div class="card-icon bg-primary text-white">
              <a href="/tambahKamarForm" style="color: white"><i class="fas fa-plus"></i></a>
            </div>
            <div class="card-body">
              <h4>Tambah Kamar</h4>
              <p>Admin</p>
            </div>
        </div>
      </div>
      <div class="col-lg-6" @if (auth()->user()->role != 'Tamu') hidden @endif>
        <div class="card card-large-icons">
          <div class="card-icon bg-primary text-white">
            <a href="/invoice" style="color: white"><i class="fas fa-receipt"></i></a>
          </div>
          <div class="card-body">
            <h4>Bukti Pemesanan</h4>
            <p>Tamu</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6" @if (auth()->user()->role != 'Resepsionis') hidden @endif>
        <div class="card card-large-icons">
            <div class="card-icon bg-primary text-white">
              <a href="/reservation" style="color: white"><i class="fas fa-address-card"></i></a>
            </div>
            <div class="card-body">
              <h4>Daftar Reservasi</h4>
              <p>Resepsionis</p>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
