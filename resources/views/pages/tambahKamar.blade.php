@extends('layouts.master')

@section('header', 'Tambah Kamar')
@section('dashboard')
<div class="card">
    <div class="card-body">
        <form method="POST" action="/tambahKamar">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input name="title" type="text" class="form-control" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input name="image" type="file" class="form-control" placeholder="Enter Image">
                
            </div>
            <div class="form-group">
                <label>Desc</label>
                <input name="desc" type="text" class="form-control" placeholder="Enter Description">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input name="jumlah" type="number" class="form-control" min="1" value="1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
