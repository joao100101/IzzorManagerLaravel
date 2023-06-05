<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">

    <!-- Fonte do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    {{-- Font Awesome Icones --}}
    <script src="https://kit.fontawesome.com/c13f7243e6.js" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script>



    <link rel="stylesheet" type="text/css" href="/css/layouts/layout.css" />
    @yield('head')
</head>

<body>
    <header>
        <div class="banner-area">
            <a href="/" class="logo-link">
                <img src="/img/layout/logo-branco.webp" alt="Logo" class="logo">
            </a>
        </div>

        <nav>
            <ul>
                <li>
                    <a href="/">
                        <span class="nav-icones">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="nav-texto">
                            INICIO
                        </span>
                    </a>
                </li>
                <li>
                    <a href="/categoria">
                        <span class="nav-icones">
                            <ion-icon name="shapes-outline"></ion-icon>
                        </span>
                        <span class="nav-texto">
                            CATEGORIAS
                        </span>
                    </a>
                </li>
                <li>
                    <a href="/produtos">
                        <span class="nav-icones">
                            <ion-icon name="shirt-outline"></ion-icon>
                        </span>
                        <span class="nav-texto">
                            PRODUTOS
                        </span>
                    </a>
                </li>
                <li>
                    <a href="/plataforma">
                        <span class="nav-icones">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="nav-texto">
                            PLATAFORMAS
                        </span>
                    </a>
                </li>
                <li>
                    <a href="/vendas">
                        <span class="nav-icones">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="nav-texto">
                            VENDAS
                        </span>
                    </a>
                </li>
                <li style="float:right">
                    <a href="#">
                        <span class="nav-icones">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="nav-texto">
                            LOGIN
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="main-content">
            @if (session('msg'))
                <p class="flash-msg">{{ session('msg') }}</p>
            @endif
            @if (session('msg-error'))
                <p class="flash-msg-error">{{ session('msg-error') }}</p>
            @endif
            @yield('content')
        </div>
    </main>
    <footer>
        <div class="footer-content">
            <p>IZZOR - CNPJ: 38.715.008/0001-07 &copy; Todos os direitos reservados 2023.</p>
        </div>
    </footer>
    @yield('script-area')
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

</body>

</html>
