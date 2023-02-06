<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonte do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>
    <header>
        <div class="banner-area">
            <img src="https://izzor.com.br/wp-content/uploads/2023/01/logo-branco.webp" alt="Logo">
        </div>
        <nav class="navbar">
            <ul class="nav-items">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <ion-icon name="home-outline"></ion-icon>
                        INICIO
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <ion-icon name="apps-outline"></ion-icon>
                        CATEGORIAS
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <ion-icon name="storefront-outline"></ion-icon>
                        PRODUTOS
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>IZZOR - CNPJ: 38.715.008/0001-07 &copy; Todos os direitos reservados 2023.</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
