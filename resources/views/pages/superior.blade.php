@extends('layouts.master')
@section('header', 'Dashboard')

@section('dashboard')
<div class="column">
  <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item active"><a class="page-link" href="/superior">Superior</a></li>
        <li class="page-item"><a class="page-link" href="/deluxe">Deluxe</a></li>
    </ul>
  </nav>
  <div class="row">
    @foreach ($card as $index)
      <div @if($index->type == 'Deluxe') hidden @endif class="card mr-3 ml-3" style="width: 18rem;">
        <img src="{{asset('assets/img/unsplash/HotelRoom1.jpg')}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$index->title}}</h5>
          <p class="card-text">{{$index->desc}}</p>
          <a href="/formPesan/{{$index->id}}" class="btn btn-primary">Pesan</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
