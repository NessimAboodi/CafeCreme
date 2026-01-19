<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accès Privé - Café Crème</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body { background-color: #f1ece1; display: flex; justify-content: center; align-items: center; height: 100vh; font-family: 'Montserrat', sans-serif; margin: 0; }
        .login-card { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 320px; text-align: center; }
        .login-card h2 { color: #967969; font-size: 1.2rem; margin-bottom: 25px; font-weight: 400; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 25px; box-sizing: border-box; text-align: center; }
        button { background: #967969; color: white; border: none; padding: 12px 30px; border-radius: 25px; cursor: pointer; transition: 0.3s; width: 100%; margin-top: 15px; }
        button:hover { background: #f4d06f; color: #967969; }
    </style>
</head>
<body>
<div class="login-card">
    <img src="{{ asset('images/logo1.png') }}" width="60" alt="Logo">
    <h2>ADMINISTRATION</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">ENTRER</button>
    </form>
</div>
</body>
</html>
