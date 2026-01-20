<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Café Crème</title>
    {{-- Appel du fichier CSS externe --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="admin-container">
    <h1><i class="fas fa-utensils"></i> Gestion du Menu</h1>

    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Formulaire d'Ajout --}}
    <div class="card-add">
        <h3><i class="fas fa-plus-circle"></i> Nouveau produit</h3>
        <form action="{{ route('admin.menu.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="input-group">
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
                <div class="input-group">
                    <label>Nom (FR)</label>
                    <input type="text" name="name" required>
                </div>
                <div class="input-group">
                    <label>Nom (EN)</label>
                    <input type="text" name="name_en">
                </div>
                <div class="input-group">
                    <label>Prix</label>
                    <input type="text" name="price" required>
                </div>
            </div>

            <div class="form-grid" style="margin-top: 15px;">
                <div class="input-group">
                    <label>Description (FR)</label>
                    <textarea name="description" rows="2"></textarea>
                </div>
                <div class="input-group">
                    <label>Description (EN)</label>
                    <textarea name="description_en" rows="2"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-add">AJOUTER À LA CARTE</button>
        </form>
    </div>

    {{-- Liste pour Modification --}}
    <form action="{{ route('admin.menu.update') }}" method="POST">
        @csrf
        @foreach($items as $category => $categoryItems)
            <div class="category-section">
                <h2 class="category-title">{{ $category }}</h2>
                @foreach($categoryItems as $item)
                    <div class="item-card">
                        <div class="input-group">
                            <label>Noms (FR / EN)</label>
                            <input type="text" name="items[{{$item->id}}][name]" value="{{$item->name}}">
                            <input type="text" name="items[{{$item->id}}][name_en]" value="{{$item->name_en}}">
                        </div>
                        <div class="input-group">
                            <label>Descriptions (FR / EN)</label>
                            <textarea name="items[{{$item->id}}][description]">{{$item->description}}</textarea>
                            <textarea name="items[{{$item->id}}][description_en]">{{$item->description_en}}</textarea>
                        </div>
                        <div class="input-group">
                            <label>Prix</label>
                            <input type="text" name="items[{{$item->id}}][price]" value="{{$item->price}}">
                        </div>
                        <div style="align-self: center;">
                            <button type="button" class="btn btn-del" onclick="deleteItem({{$item->id}})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        <button type="submit" class="btn btn-save">ENREGISTRER TOUT</button>
    </form>
</div>

<form id="delete-form" action="" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

<script>
    function deleteItem(id) {
        if(confirm('Supprimer définitivement ?')) {
            let form = document.getElementById('delete-form');
            form.action = '/admin/supprimer-item/' + id;
            form.submit();
        }
    }
</script>

</body>
</html>
