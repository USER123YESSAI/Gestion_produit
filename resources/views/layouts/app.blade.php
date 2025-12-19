<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Gestion Commerciale - Produits')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- AdminLTE + FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
    
    <!-- Styles responsives -->
    <style>
        @media (max-width: 576px) {
            .btn-sm {
                margin-bottom: 5px;
                width: 100%;
            }
            .table td, .table th {
                white-space: nowrap;
            }
            .btn-group {
                display: flex;
                flex-direction: column;
            }
            .btn-group .btn {
                margin-bottom: 5px;
            }
        }
        
        /* Style pour les liens désactivés */
        .nav-link.disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        .nav-link.disabled:hover {
            background-color: transparent !important;
        }
    </style>

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <span class="nav-link">Gestion des Produits 👋</span>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('produits.index') }}" class="brand-link">
            <i class="fas fa-box brand-icon"></i>
            <span class="brand-text font-weight-light">Gestion Produits</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <!-- Produits - Actif -->
                    <li class="nav-item">
                        <a href="{{ route('produits.index') }}" class="nav-link {{ request()->routeIs('produits*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                Produits
                                <span class="badge badge-info right">{{ App\Models\Produit::count() ?? 0 }}</span>
                            </p>
                        </a>
                    </li>
                    
                    <!-- Ventes - Désactivé -->
                    <li class="nav-item">
                        <a href="#" class="nav-link disabled">
                            <i class="nav-icon fas fa-shopping-cart text-muted"></i>
                            <p class="text-muted">Ventes</p>
                            <span class="badge badge-secondary right">Bientôt</span>
                        </a>
                    </li>
                    
                    <!-- Clients - Désactivé -->
                    <li class="nav-item">
                        <a href="#" class="nav-link disabled">
                            <i class="nav-icon fas fa-user-friends text-muted"></i>
                            <p class="text-muted">Clients</p>
                            <span class="badge badge-secondary right">Bientôt</span>
                        </a>
                    </li>
                    
                    <!-- Achats - Désactivé -->
                    <li class="nav-item">
                        <a href="#" class="nav-link disabled">
                            <i class="nav-icon fas fa-truck text-muted"></i>
                            <p class="text-muted">Achats</p>
                            <span class="badge badge-secondary right">Bientôt</span>
                        </a>
                    </li>
                    
                    <!-- Statistiques - Désactivé -->
                    <li class="nav-item">
                        <a href="#" class="nav-link disabled">
                            <i class="nav-icon fas fa-chart-bar text-muted"></i>
                            <p class="text-muted">Statistiques</p>
                            <span class="badge badge-secondary right">Bientôt</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Contenu principal -->
    <div class="content-wrapper">
        <!-- En-tête de page -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('page-title', 'Gestion des Produits')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('produits.index') }}">Accueil</a></li>
                            @yield('breadcrumb')
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contenu -->
        <div class="content">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fas fa-check"></i> {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fas fa-ban"></i> {{ session('error') }}
                    </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer text-center">
        <strong>&copy; {{ date('Y') }} Gestion Produits - Laravel {{ app()->version() }}</strong>
        <div class="float-right d-none d-sm-inline-block">
            <small>Développé avec <i class="fas fa-heart text-danger"></i></small>
        </div>
    </footer>

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!-- Script pour les confirmations de suppression -->
<script>
    $(document).ready(function() {
        // Confirmation avant suppression
        $('form[action*="destroy"]').on('submit', function(e) {
            if (!confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')) {
                e.preventDefault();
            }
        });
        
        // Auto-dismiss des alertes après 5 secondes
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    });
</script>

@stack('scripts')
</body>
</html>