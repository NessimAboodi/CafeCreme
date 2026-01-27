<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Café Crème</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<nav>
    <a href="{{ route('home') }}" class="brand-container">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo Café Crème">
    </a>
    <div class="nav-links desktop-only">
        <a href="{{ route('admin.menu.edit') }}" style="color: #f4d06f;">CARTE</a>
        <a href="{{ route('admin.reservations') }}">RÉSERVATIONS</a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">DÉCONNEXION</a>
    </div>
</nav>

<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<main class="lobut-style-contact">
    <section class="contact-header">
        <h1>Gestion du Menu</h1>
        <p>Gérez les produits affichés sur la carte de votre établissement.</p>
    </section>

    <div class="container">
        @if(session('success'))
            <div style="background: #967969; color: #f1ece1; padding: 15px; border-radius: 12px; margin-bottom: 30px; text-align: center; font-weight: 700;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        {{-- Formulaire d'Ajout --}}
        <section class="contact-form-section" style="margin-bottom: 60px;">
            <h2 class="category-title" style="margin-bottom: 25px;">Nouveau produit</h2>
            <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data" class="lobut-form">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label>Catégorie</label>
                        <select name="category" required>
                            <option value="Nos Formules">Nos Formules</option>
                            <option value="Côté Salé">Côté Salé</option>
                            <option value="Salades & Bowls">Salades & Bowls</option>
                            <option value="Superfood Bar">Superfood Bar</option>
                            <option value="Coffee Shop">Coffee Shop</option>
                            <option value="Boissons Fraîches & Bar">Boissons Fraîches & Bar</option>
                            <option value="Les Douceurs">Les Douceurs</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Prix</label>
                        <input type="text" name="price" required placeholder="ex: 12.50">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Nom (FR)</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Nom (EN)</label>
                        <input type="text" name="name_en">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Description (FR)</label>
                        <textarea name="description" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Description (EN)</label>
                        <textarea name="description_en" rows="2"></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Photo du plat</label>
                        <input type="file" name="image" accept="image/*">
                    </div>
                </div>

                <button type="submit" class="btn-submit">AJOUTER À LA CARTE</button>
            </form>
        </section>

        {{-- Liste pour Modification --}}
        {{-- AJOUT : enctype="multipart/form-data" est maintenant obligatoire ici aussi --}}
        <form action="{{ route('admin.menu.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($items as $category => $categoryItems)
                <div class="menu-section" style="margin-bottom: 40px; background: white; padding: 30px; border-radius: 15px;">
                    <h2 class="category-title">{{ $category }}</h2>
                    @foreach($categoryItems as $item)
                        <div style="display: grid; grid-template-columns: 2fr 2fr 1fr 120px 50px; gap: 20px; padding: 20px 0; border-bottom: 1px solid #f1ece1; align-items: end;">
                            <div class="form-group" style="margin: 0;">
                                <label style="font-size: 0.7rem;">Noms (FR / EN)</label>
                                <input type="text" name="items[{{$item->id}}][name]" value="{{$item->name}}" style="margin-bottom: 5px;">
                                <input type="text" name="items[{{$item->id}}][name_en]" value="{{$item->name_en}}">
                            </div>
                            <div class="form-group" style="margin: 0;">
                                <label style="font-size: 0.7rem;">Descriptions (FR / EN)</label>
                                <textarea name="items[{{$item->id}}][description]" rows="1" style="margin-bottom: 5px;">{{$item->description}}</textarea>
                                <textarea name="items[{{$item->id}}][description_en]" rows="1">{{$item->description_en}}</textarea>
                            </div>
                            <div class="form-group" style="margin: 0;">
                                <label style="font-size: 0.7rem;">Prix</label>
                                <input type="text" name="items[{{$item->id}}][price]" value="{{$item->price}}">
                            </div>

                            {{-- MODIFIÉ : Ajout de l'input FILE pour changer la photo --}}
                            <div class="form-group" style="margin: 0; text-align: center;">
                                <label style="font-size: 0.7rem;">Photo</label>
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Photo" style="width: 40px; height: 40px; object-fit: cover; border-radius: 5px; margin: 0 auto 5px;">
                                @endif
                                <input type="file" name="items[{{$item->id}}][image]" accept="image/*" style="font-size: 0.6rem; padding: 0;">
                            </div>

                            <button type="button" onclick="deleteItem({{$item->id}})" style="background: none; border: none; color: #967969; cursor: pointer; font-size: 1.2rem; padding-bottom: 10px;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div style="position: fixed; bottom: 30px; right: 30px; z-index: 1000;">
                <button type="submit" class="btn-submit" style="width: auto; padding: 15px 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    ENREGISTRER TOUT
                </button>
            </div>
        </form>
    </div>
</main>

<form id="delete-form" action="" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

<script>
    function deleteItem(id) {
        if(confirm('Supprimer définitivement ce produit ?')) {
            let form = document.getElementById('delete-form');
            form.action = '/admin/supprimer-item/' + id;
            form.submit();
        }
    }
</script>

</body>
</html>
