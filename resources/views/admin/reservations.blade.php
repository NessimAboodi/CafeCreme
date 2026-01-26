<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Réservations - Café Crème</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<nav>
    <a href="{{ route('home') }}" class="brand-container">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo">
    </a>
    <div class="nav-links">
        <a href="{{ route('admin.menu.edit') }}">Carte</a>
        <a href="{{ route('admin.reservations') }}" style="color: #f4d06f;">Réservations</a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
    </div>
</nav>

<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">@csrf</form>

<main class="lobut-style-contact">
    <section class="contact-header">
        <h1>Liste des Réservations</h1>
        <p>Consultez les créneaux réservés par vos clients</p>
    </section>

    <div class="container" style="padding-bottom: 100px;">
        <div class="menu-section" style="background: white; overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                <tr style="border-bottom: 2px solid #967969; color: #967969;">
                    <th style="padding: 15px;">Date</th>
                    <th style="padding: 15px;">Heure</th>
                    <th style="padding: 15px;">Client</th>
                    <th style="padding: 15px;">Téléphone</th>
                    <th style="padding: 15px;">Pers.</th>
                    <th style="padding: 15px;">Notes</th>
                </tr>
                </thead>
                <tbody>
                @forelse($reservations as $res)
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 15px;"><strong>{{ \Carbon\Carbon::parse($res->date)->format('d/m/Y') }}</strong></td>
                        <td style="padding: 15px;"><span style="background: #967969; color: white; padding: 4px 8px; border-radius: 4px;">{{ $res->time }}</span></td>
                        <td style="padding: 15px;">{{ $res->full_name }}</td>
                        <td style="padding: 15px;">{{ $res->phone }}</td>
                        <td style="padding: 15px;">{{ $res->guests }}</td>
                        <td style="padding: 15px; font-size: 0.85rem; color: #666;">{{ $res->notifications ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding: 40px; text-align: center; color: #967969;">Aucune réservation enregistrée.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

</body>
</html>
