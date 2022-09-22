@extends('layouts.master')

@section('header', 'Tambah Kamar')
@section('dashboard')
<div class="card">
    <div class="card-body">
        <form method="POST" action="/ubahKamar/{{$kamar->id}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title</label>
                <input name="title" type="text" class="form-control" value="{{$kamar->title}}" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input name="image" type="file" class="form-control" value="{{$kamar->image}}" placeholder="Enter Image">
            </div>
            <div class="form-group">
                <label>Desc</label>
                <input name="desc" type="text" class="form-control" value="{{$kamar->desc}}" placeholder="Desc">
            </div>
            <div class="form-group">
                <label>Type</label>
                <input name="type" type="text" class="form-control" value="{{$kamar->type}}" placeholder="Enter Your Type">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
