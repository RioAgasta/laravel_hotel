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
                <label>Tipe Kamar</label>
                <select class="form-control selectric" name="type">
                  <option>Superior</option>
                  <option>Deluxe</option>
                </select>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
