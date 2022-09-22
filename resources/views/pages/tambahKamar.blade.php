@extends('layouts.master')

@section('header', 'Tambah Kamar')
@section('dashboard')
<div class="card">
    <div class="card-body">
        <form method="POST" action="/tambahKamar">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputClass1" aria-describedby="classHelp" placeholder="Enter Title">
                @if ($errors->has('title'))
                <div class="class">
                    {{$errors->first('title')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Image</label>
                <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Image">
                @if ($errors->has('image'))
                <div class="class">
                    {{$errors->first('image')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Desc</label>
                <input name="desc" type="text" class="form-control" id="exampleInputNis1" placeholder="Desc">
                @if ($errors->has('desc'))
                <div class="class">
                    {{$errors->first('desc')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Type</label>
                <input name="type" type="text" class="form-control" id="exampleInputDate1" aria-describedby="dateHelp" placeholder="Enter Your Type">
                @if ($errors->has('type'))
                <div class="class">
                    {{$errors->first('type')}}
                </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
