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
        <li class="@if(Route::current()->uri == 'kamar') active @endif"><a class="nav-link" href="/kamar">
          <i class="fas fa-bed"></i><span>Pesan Kamar</span></a>
        </li>
        <li @if (auth()->user()->role != 'Resepsionis') hidden @endif class="@if(Route::current()->uri == 'reservation') active @endif"><a class="nav-link" href="/reservation">
          <i class="fas fa-receipt"></i> <span>List</span></a>
        </li>
        <li @if (auth()->user()->role != 'Tamu') hidden @endif class="@if(Route::current()->uri == 'invoice') active @endif"><a class="nav-link" href="/invoice">
          <i class="fas fa-receipt"></i> <span>Bukti Pemesanan</span></a>
        </li>
    </ul>
  </aside>
</div>