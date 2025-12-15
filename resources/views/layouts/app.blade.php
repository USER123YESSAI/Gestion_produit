<!DOCTYPE html>
<html lang="fr">
<head>
    <style>
    @media (max-width: 576px) {
        .btn-sm {
            margin-bottom: 5px;
            width: 100%;
        }

        .table td, .table th {
            white-space: nowrap;
        }
    }
</style>

    <meta charset="UTF-8">
    <title>@yield('title', 'Gestion Commerciale')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- AdminLTE + FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">

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
                <span class="nav-link">Bienvenue 👋</span>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">Odoo</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column">
                    <li class="nav-item">
                        <a href="{{ route('produits.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Produits</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ventes.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Ventes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('clients.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Clients</p>
                    </a>
                </li>
                    <li class="nav-item">
                        <a href="{{ route('achats.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>Achats</p>
                        </a>
                    </li>
                    <li class="nav-item">
    <a href="{{ route('statistiques.index') }}" class="nav-link">
        <i class="nav-icon fas fa-chart-bar"></i>
        <p>Statistiques</p>
    </a>
</li>

           

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Contenu -->
    <div class="content-wrapper">
        <div class="content pt-3 px-3">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer text-center">
        <strong>&copy; {{ date('Y') }} Mon Commerce</strong>
    </footer>

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@stack('scripts')
</body>
</html>
