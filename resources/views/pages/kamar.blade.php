@extends('layouts.master')
@section('header', 'Pesan Kamar')
@section('dashboard')
    <div class="row">
      @foreach ($card as $index)
        <div class="card mr-3 ml-3" style="width: 18rem;" @if (auth()->user()->role != 'Admin')
            @if ($index->jumlah <= 0)
                hidden
            @endif
        @endif>
          <img src="../assets/img/insert/{{$index->image}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$index->title}}</h5>
            <p class="card-text">{{$index->desc}}</p>
            
          </div>
          <div class="card-footer mr-4">
            <div class="row" style="justify-content: space-between">
              <a href="/formPesan/{{$index->id}}" class="btn btn-primary mr-2 ml-3">Pesan</a>
              <div class="row">
                @if (auth()->user()->role == 'Admin')
                  <a href="/ubahKamarForm/{{$index->id}}" class="btn btn-warning mr-2">Edit</a>
                  <form action="{{route('hapus', $index->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <Button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                @else
                <input type="button" class="btn btn-primary"  disabled value="Kamar Yang Tersedia : {{$index->jumlah}}">
                @endif
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
@endsection