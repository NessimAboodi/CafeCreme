@extends('layouts.admin')

@section('title', 'Statistiques')
@section('header_title', 'Statistiques d\'Activité')
@section('header_subtitle', 'Analyse des performances pour la période sélectionnée')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-stats.css') }}">
@endpush

@section('content')

    {{-- FILTRES --}}
    <div style="background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 30px;">
        <form action="{{ route('admin.stats') }}" method="GET" style="display: flex; gap: 20px; align-items: end; flex-wrap: wrap;">
            <div class="form-group" style="margin: 0; flex: 1;">
                <label>Mois</label>
                <select name="month" onchange="this.form.submit()" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
                    @php
                        $mois = [
                            '01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril',
                            '05' => 'Mai', '06' => 'Juin', '07' => 'Juillet', '08' => 'Août',
                            '09' => 'Septembre', '10' => 'Octobre', '11' => 'Novembre', '12' => 'Décembre'
                        ];
                    @endphp
                    @foreach($mois as $num => $nom)
                        <option value="{{ $num }}" {{ $selectedMonth == $num ? 'selected' : '' }}>{{ $nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin: 0; flex: 1;">
                <label>Année</label>
                <input type="number" name="year" value="{{ $selectedYear }}" onchange="this.form.submit()" min="2020" max="2030" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
            </div>
            <button type="submit" class="btn-submit" style="width: auto; padding: 10px 25px;">ACTUALISER</button>
        </form>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <i class="fas fa-users"></i>
            <h3>Couverts ({{ $mois[$selectedMonth] }})</h3>
            <p class="stat-value">{{ $totalGuestsSelected ?? 0 }}</p>
        </div>

        <div class="stat-card" style="text-align: left;">
            <h3 style="text-align: center;">Top Créneaux</h3>
            <ul style="list-style: none; padding: 0;">
                @forelse($popularTimes as $time)
                    <li style="display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee;">
                        <span><i class="far fa-clock" style="color: #967969;"></i> {{ $time->time }}</span>
                        <strong>{{ $time->total }} résa.</strong>
                    </li>
                @empty
                    <li style="text-align: center; color: #999; padding: 10px;">Aucune donnée ce mois-ci</li>
                @endforelse
            </ul>
        </div>
    </div>

    {{-- GRAPHIQUE --}}
    <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-top: 40px;">
        <h3 style="color: #967969; margin-bottom: 20px;">Fréquentation Annuelle ({{ $selectedYear }})</h3>
        <div style="height: 400px; position: relative;">
            {{-- On passe les données directement dans des attributs simples --}}
            <canvas id="monthChart"
                    data-labels="{{ json_encode($chartLabels) }}"
                    data-values="{{ json_encode($chartData) }}">
            </canvas>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/admin-stats.js') }}"></script>
@endpush
