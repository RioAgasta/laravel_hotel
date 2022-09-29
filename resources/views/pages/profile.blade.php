@extends('layouts.master')
@section('header', 'Profile')
@section('profile')
<div class="section-body">
    <h2 class="section-title">Hi, {{auth()->user()->name}}</h2>
    <p class="section-lead">
      Change information about yourself on this page.
    </p>
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <form method="POST" action="/ubahData">
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="form-group col-6">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                  </div>
                  <div class="form-group col-6">
                    <label>Profile Picture</label>
                    <input type="file" name="image" class="form-control" value="{{auth()->user()->image}}">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">
                  </div>
                  <div class="form-group col-6">
                      <label>Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tgllahir" value="{{auth()->user()->tgllahir}}">
                  </div>
                </div>
                  <div class="form-group">
                    <label>Role</label>
                    <input type="text" class="form-control" value="{{auth()->user()->role}}" disabled>
                  </div>
                <button class="btn btn-primary col-12">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection