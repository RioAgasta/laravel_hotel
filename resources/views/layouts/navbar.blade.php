<div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>
        </form>
        {{-- {{ url('public/Image/'.$data->image) }} --}}
        <ul class="navbar-nav navbar-right"> 
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/avatar/{{auth()->user()->image}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="/profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
                </a>
                <form method="POST" action="/log" class="ml-2"
                @if (auth()->user()->name == 'Rio') hidden @endif>
                    @csrf
                    <input type="hidden" name="logout" value="true">
                    <input type="hidden" name="email" value="rio@gmail.com">
                    <input type="hidden" name="password" value="123">
                    <button type="submit" class="btn"><i class="far fa-user-circle mr-3"></i>Rio</button>
                </form>
                <form method="POST" action="/log" class="ml-2"
                @if (auth()->user()->name == 'Dinda') hidden @endif>
                    @csrf
                    <input type="hidden" name="logout" value="true">
                    <input type="hidden" name="email" value="din@gmail.com">
                    <input type="hidden" name="password" value="123">
                    <button type="submit" class="btn"><i class="far fa-user-circle mr-3"></i>Dinda</button>
                </form>
                <form method="POST" action="/log" class="ml-2"
                @if (auth()->user()->name == 'Admin') hidden @endif>
                    @csrf
                    <input type="hidden" name="logout" value="true">
                    <input type="hidden" name="email" value="admin@gmail.com">
                    <input type="hidden" name="password" value="123">
                    <button type="submit" class="btn"><i class="far fa-user-circle mr-3"></i>Admin</button>
                </form>
                <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
            </li>
        </ul>
    </nav>