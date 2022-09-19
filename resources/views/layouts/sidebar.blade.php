<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Hotel Hebat</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">HH</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Menu</li>
        <li class="@if(Route::current()->uri == '/') active @endif"><a class="nav-link" href="/">
          <i class="fas fa-home"></i><span>Home</span></a>
        </li>
        <li class="nav-item dropdown"><a class="nav-link has-dropdown" href="/superior">
          <i class="fas fa-bed"></i><span>Pesan Kamar</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="/superior">Superior</a></li>
            <li><a class="nav-link" href="/deluxe">Deluxe</a></li>
          </ul>
        </li>
        <li @if (auth()->user()->role != 'Resepsionis') hidden @endif class="@if(Route::current()->uri == 'reservation') active @endif"><a class="nav-link" href="/reservation">
          <i class="fas fa-receipt"></i> <span>List</span></a>
        </li>
    </ul>
  </aside>
</div>