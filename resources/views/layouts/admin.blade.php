<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Café Crème</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<nav>
    <a href="{{ route('home') }}" class="brand-container">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo">
    </a>
    <div class="nav-links">
        <a href="{{ route('admin.menu.edit') }}" class="{{ request()->routeIs('admin.menu.*') ? 'active-link' : '' }}">Carte</a>
        <a href="{{ route('admin.reservations') }}" class="{{ request()->routeIs('admin.reservations') ? 'active-link' : '' }}">Réservations</a>
        <a href="{{ route('admin.stats') }}" class="{{ request()->routeIs('admin.stats') ? 'active-link' : '' }}">Statistiques</a>

        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
    </div>
</nav>

<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<main class="lobut-style-contact">
    <section class="contact-header">
        <h1>@yield('header_title')</h1>
        <p>@yield('header_subtitle')</p>
    </section>

    <div class="container" style="padding-bottom: 100px;">
        @yield('content')
    </div>
</main>

@stack('scripts')

</body>
</html>
