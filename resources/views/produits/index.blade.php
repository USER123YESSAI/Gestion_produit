<div>
<a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-warning">
    Modifier
</a>
<form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
        Supprimer
    </button>
</div>
