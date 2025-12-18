<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
                    
                  <form action="{{ route('produits.destroy', $produit) }}" method="POST" style="display:inline;">
                
                    @method('DELETE')
                    <button 
                        type="submit" 
                        class="btn btn-sm btn-danger"
                        
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ? Cette action est irréversible.')"
                    >
                        Supprimer
                    </button>
                </form>
                         
</body>
</html>                  
                      
