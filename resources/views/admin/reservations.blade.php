@extends('layouts.admin')

@section('title', 'Gestion des Réservations')
@section('header_title', 'Réservations à venir')
@section('header_subtitle', 'Gérez vos clients et vos disponibilités pour aujourd\'hui et demain.')

@section('content')
    <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
        <a href="{{ route('admin.reservations.archive') }}" class="btn-submit" style="width: auto; padding: 10px 20px; background: #666; font-size: 0.8rem; text-decoration: none;">
            <i class="fas fa-archive"></i> VOIR LES ARCHIVES
        </a>
    </div>

    <div class="menu-section" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
            <tr style="border-bottom: 2px solid #967969; color: #967969; text-transform: uppercase; font-size: 0.8rem;">
                <th style="padding: 15px;">Date & Heure</th>
                <th style="padding: 15px;">Client</th>
                <th style="padding: 15px;">Pers.</th>
                <th style="padding: 15px;">Contact</th>
                <th style="padding: 15px; text-align: center;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($reservations as $res)
                <tr style="border-bottom: 1px solid #f1ece1;">
                    <td style="padding: 15px;">
                        <div style="font-weight: 700;">{{ \Carbon\Carbon::parse($res->date)->format('d/m/Y') }}</div>
                        <div style="color: #967969; font-weight: 700;">{{ $res->time }}</div>
                    </td>
                    <td style="padding: 15px;">
                        <div style="font-weight: 600;">{{ $res->full_name }}</div>
                        <div style="font-size: 0.8rem; color: #888;">{{ $res->notifications ?? 'Pas de note' }}</div>
                    </td>
                    <td style="padding: 15px;">
                        <span style="background: #f1ece1; padding: 5px 10px; border-radius: 20px; font-weight: 700; color: #967969;">
                            <i class="fas fa-users" style="font-size: 0.7rem;"></i> {{ $res->guests }}
                        </span>
                    </td>
                    <td style="padding: 15px;">
                        <a href="tel:{{ $res->phone }}" style="color: #967969; text-decoration: none; font-size: 0.9rem;">
                            <i class="fas fa-phone"></i> {{ $res->phone }}
                        </a>
                    </td>
                    <td style="padding: 15px; text-align: center;">
                        <div style="display: flex; gap: 15px; justify-content: center;">
                            {{-- Bouton Supprimer --}}
                            <form action="{{ route('admin.reservations.destroy', $res->id) }}" method="POST" onsubmit="return confirm('Annuler cette réservation ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #e74c3c; cursor: pointer; font-size: 1.1rem;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="padding: 40px; text-align: center; color: #999;">Aucune réservation à venir.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
