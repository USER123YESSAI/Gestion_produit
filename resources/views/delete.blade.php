<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
               <td>
    <div class="btn-group" role="group">
        <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-warning">
            <i class="fas fa-edit"></i> Modifier
        </a>
        
        <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </form>
    </div>
</td>
                         
</body>
</html>                  
                      
