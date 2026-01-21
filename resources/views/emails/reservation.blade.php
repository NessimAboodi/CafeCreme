<h2>Nouvelle demande de réservation reçue</h2>

<p><strong>Client :</strong> {{ $data['full_name'] }}</p>
<p><strong>Téléphone :</strong> {{ $data['phone'] }}</p>
<p><strong>Date :</strong> {{ $data['date'] }}</p>
<p><strong>Heure :</strong> {{ $data['time'] }}</p>
<p><strong>Nombre de personnes :</strong> {{ $data['guests'] }}</p>

<hr>

<p><strong>Allergies :</strong><br>
    {{ $data['allergies'] ?? 'Aucune' }}</p>

<p><strong>Précisions (Poussette, etc.) :</strong><br>
    {{ $data['notifications'] ?? 'Aucune' }}</p>
