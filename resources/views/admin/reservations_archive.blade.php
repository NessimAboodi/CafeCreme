@extends('layouts.admin')

@section('title', 'Archives des Réservations')
@section('header_title', 'Historique des Réservations')
@section('header_subtitle', 'Consultez la liste des clients passés au Café Crème.')

@section('content')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.reservations') }}" style="color: #967969; text-decoration: none; font-weight: 600;">
            <i class="fas fa-arrow-left"></i> RETOUR AUX RÉSERVATIONS À VENIR
        </a>
    </div>

    <div class="menu-section" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
            <tr style="border-bottom: 2px solid #967969; color: #967969; text-transform: uppercase; font-size: 0.8rem;">
                <th style="padding: 15px;">Date & Heure</th>
                <th style="padding: 15px;">Client</th>
                <th style="padding: 15px;">Pers.</th>
                <th style="padding: 15px; text-align: center;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($archives as $res)
                <tr style="border-bottom: 1px solid #f1ece1; opacity: 0.7;">
                    <td style="padding: 15px;">
                        <div style="font-weight: 700;">{{ \Carbon\Carbon::parse($res->date)->format('d/m/Y') }}</div>
                        <div style="font-size: 0.9rem;">{{ $res->time }}</div>
                    </td>
                    <td style="padding: 15px;">
                        <div style="font-weight: 600;">{{ $res->full_name }}</div>
                        <div style="font-size: 0.8rem; color: #888;">{{ $res->phone }}</div>
                    </td>
                    <td style="padding: 15px;">{{ $res->guests }}</td>
                    <td style="padding: 15px; text-align: center;">
                        <form action="{{ route('admin.reservations.destroy', $res->id) }}" method="POST" onsubmit="return confirm('Supprimer définitivement cette archive ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #e74c3c; cursor: pointer;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="padding: 40px; text-align: center; color: #999;">Aucune archive disponible.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
