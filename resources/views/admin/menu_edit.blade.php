<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Café Crème</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: #f1ece1; font-family: 'Montserrat', sans-serif; padding: 20px; }
        .admin-container { max-width: 1100px; margin: auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .add-section { background: #f9f9f9; padding: 20px; border-radius: 10px; border: 2px dashed #967969; margin-bottom: 30px; }
        .item-row { display: grid; grid-template-columns: 2fr 2fr 1fr 50px; gap: 10px; padding: 10px; border-bottom: 1px solid #eee; align-items: center; }
        input, select, textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px; margin-top: 5px; }
        .btn-add { background: #27ae60; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .btn-save { background: #967969; color: white; padding: 15px 30px; border: none; border-radius: 30px; cursor: pointer; position: fixed; bottom: 20px; right: 20px; font-weight: bold; }
        .btn-del { color: #e74c3c; background: none; border: none; cursor: pointer; font-size: 1.2rem; }
    </style>
</head>
<body>

<div class="admin-container">
    <h1>Gestion du Menu</h1>

    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    <div class="add-section">
        <h3>+ Ajouter un nouveau plat</h3>
        <form action="{{ route('admin.menu.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px;">
                <select name="category" required>
                    <option value="Côté Salé">Côté Salé</option>
                    <option value="Coffee Shop">Coffee Shop</option>
                    <option value="Les Douceurs">Les Douceurs</option>
                </select>
                <input type="text" name="name" placeholder="Nom du plat (ex: Bagel Saumon)" required>
                <input type="text" name="price" placeholder="Prix (ex: 7.50€)" required>
            </div>
            <button type="submit" class="btn-add" style="margin-top: 10px;">AJOUTER À LA CARTE</button>
        </form>
    </div>

    <form action="{{ route('admin.menu.update') }}" method="POST">
        @csrf
        @foreach($items as $category => $categoryItems)
            <h2 style="color: #967969; border-bottom: 2px solid #967969;">{{ $category }}</h2>
            @foreach($categoryItems as $item)
                <div class="item-row">
                    <div>
                        <input type="text" name="items[{{$item->id}}][name]" value="{{$item->name}}" placeholder="Nom FR">
                        <input type="text" name="items[{{$item->id}}][name_en]" value="{{$item->name_en}}" placeholder="Nom EN">
                    </div>
                    <div>
                        <textarea name="items[{{$item->id}}][description]" placeholder="Description FR">{{$item->description}}</textarea>
                    </div>
                    <div>
                        <input type="text" name="items[{{$item->id}}][price]" value="{{$item->price}}">
                    </div>
                    <div>
                        <button type="button" class="btn-del" onclick="deleteItem({{$item->id}})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        @endforeach
        <button type="submit" class="btn-save">ENREGISTRER LES MODIFICATIONS</button>
    </form>
</div>

<form id="delete-form" action="" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

<script>
    function deleteItem(id) {
        if(confirm('Supprimer ce plat définitivement ?')) {
            let form = document.getElementById('delete-form');
            form.action = '/admin/supprimer-item/' + id;
            form.submit();
        }
    }
</script>

</body>
</html>
