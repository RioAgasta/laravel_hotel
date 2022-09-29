<?php 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

$user=User::all();
?>

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    {{-- src="../assets/img/avatar/{{auth()->user()->image}}" --}}
    <ul class="navbar-nav navbar-right"> 
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" @if (Auth::check())
            src="../assets/img/avatar/{{auth()->user()->image}}"
        @else
            src="../assets/img/avatar/avatar-1.png"
        @endif class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, @if (Auth::check())
            {{auth()->user()->name}}
        @else
            Guest            
        @endif</div></a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Logged in 5 min ago</div>
            <a href="/profile" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
            </a>
            @if (Auth::check())
            @foreach ($user as $account)
            <form method="POST" action="/log" class="ml-2"
                @if (auth()->user()->name == $account->name) hidden @endif>
                    @csrf
                    <input type="hidden" name="logout" value="true">
                    <input hidden type="email" name="email" value="{{$account->email}}">
                    <input hidden type="password" name="password" value="123">
                    <button type="submit" class="btn"><i class="far fa-user-circle mr-3"></i>{{$account->name}}</button>
                </form>    
                @endforeach
            @endif
            <a href="/setting" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Fitur
            </a>
            <div class="dropdown-divider"></div>
            @if (Auth::check())
                <a href="/logout" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>    
            @else
                <a href="/login" class="dropdown-item has-icon">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            @endif
            
        </div>
        </li>
    </ul>
</nav>