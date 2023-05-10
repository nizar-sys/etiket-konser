@php
    $routeActive = Route::currentRouteName();
@endphp

<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
        <i class="ni ni-tv-2 text-primary"></i>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'users.index' ? 'active' : '' }}" href="{{ route('users.index') }}">
        <i class="fas fa-users text-warning"></i>
        <span class="nav-link-text">Data Staff</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'events.index' ? 'active' : '' }}" href="{{ route('events.index') }}">
        <i class="fas fa-calendar-alt text-success"></i>
        <span class="nav-link-text">Data Acara</span>
    </a>
</li>
