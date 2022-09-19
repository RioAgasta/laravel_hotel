@extends('layouts.master')
@section('header', 'Hotel Hebat')

@section('dashboard')

<!DOCTYPE html>
<div class="section-body">
  <div class="card mr-3 ml-3">
    <img src="{{asset('assets/img/unsplash/croppedDashboard.jpg')}}" class="card-img-top" alt="..." style="object-fit: cover; height: 300px">
    <div class="card-body">
      <h3 class="card-title" style="justify-content: center">Tentang Kami</h3>
      <p class="card-text">Lepaskan diri Anda ke Hotel Hebat, dikelilingi oleh keindahan pegunungan 
        yang indah, danau, dan sawah menghijau. Nikmati sore yang hangat dengan berenang di kolam 
        renang dengan pemandangan matahari terbenam yang memukau; Kid's Club yang luas-menawarkan 
        beragam fasilitas dan kegiatan anak-anak yang akan melengkapi kenyamanan keluarga. Convention 
        Center kami, dilengkapi pelayanan lengkap dengan ruang konvensi terbesar di Bandung, mampu 
        mengakomodasi hingga 3.000 delegasi. Manfaatkan ruang penyelenggaraan konvensi M.I.C.E 
        ataupun mewujudkan acara pernikahan adat yang mewah.</p>
    </div>
  </div>
</div>
@endsection
