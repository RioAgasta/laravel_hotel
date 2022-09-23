@extends('layouts.master')
@section('header', 'Dashboard')

@section('dashboard')
<div class="column">
  <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item active"><a class="page-link" href="/superior">Superior</a></li>
        <li class="page-item"><a class="page-link" href="/deluxe">Deluxe</a></li>
        <li @if (auth()->user()->role != 'Admin') hidden @endif><a class="btn btn-primary" href="/tambahKamarForm">Tambah</a></li>
    </ul>
  </nav>
  <div class="row">
    @foreach ($card as $index)
      <div @if($index->type == 'Deluxe') hidden @endif class="card mr-3 ml-3" style="width: 18rem;">
        <img src="../assets/img/insert/{{$index->image}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$index->title}}</h5>
          <p class="card-text">{{$index->desc}}</p>
          <div class="row">
            <a href="/formPesan/{{$index->id}}" class="btn btn-primary mr-2 ml-3">Pesan</a>
            <a @if (auth()->user()->role != 'Admin') hidden @endif href="/ubahKamarForm/{{$index->id}}" class="btn btn-warning mr-2">Edit</a>
            <form @if (auth()->user()->role != 'Admin') hidden @endif action="{{route('hapus', $index->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <Button type="submit" class="btn btn-danger">Hapus</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
