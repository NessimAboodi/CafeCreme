@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin-planning.css') }}">

    <div class="planning-container">
        <h1>📅 Planning du Jour</h1>

        <div class="stats-row">
            <div class="stat-card">
                <h4>{{ $statsJour['total_reservations'] }}</h4>
                <p>Réservations</p>
            </div>
            <div class="stat-card">
                <h4>{{ $statsJour['total_clients'] }}</h4>
                <p>Couverts attendus</p>
            </div>
            <div class="stat-card" style="border-left-color: #28a745;">
                <h4>{{ date('H:i') }}</h4>
                <p>Heure actuelle</p>
            </div>
        </div>

        <div class="planning-card">
            <h3>Prochaines arrivées</h3>
            <table class="custom-table">
                <thead>
                <tr>
                    <th>Heure</th>
                    <th>Nom du Client</th>
                    <th>Nombre</th>
                    <th>Téléphone</th>
                    <th>Notes particulières</th>
                </tr>
                </thead>
                <tbody>
                @forelse($reservations as $res)
                    <tr class="{{ $res->time < date('H:i') ? 'time-passed' : '' }}">
                        <td><strong>{{ $res->time }}</strong></td>
                        <td>{{ $res->full_name }}</td>
                        <td><span class="guest-badge">{{ $res->guests }} pers.</span></td>
                        <td>{{ $res->phone }}</td>
                        <td><small>{{ $res->notifications ?? 'Aucune note' }}</small></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 30px;">
                            ☕ Aucune réservation pour le moment aujourd'hui.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
