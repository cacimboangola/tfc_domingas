<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Square Zone</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('css/niceselect.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('css/flex-slider.min.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl-carousel.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('color1.css') }}">
    @stack('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.css" />
    <style>
        [data-toggle="collapse"] .fa:before {
            content: "\f139";
            
        }

        [data-toggle="collapse"].collapsed .fa:before {
            content: "\f13a";
        }

        .scrollable-div {
            height: 364px;
            padding: 0px;
            margin: 0px;
            text-align: left;
            overflow: auto;
            overflow-y: auto;
        }


        .header.shop .nice-select .list {
            height: 364px;
            padding: 0px;
            margin: 0px;
            text-align: left;
            overflow: auto;
            overflow-y: auto;
        }

        .header.shop .all-category {
            margin-left: -15px;
        }

        .header.shop .search-bar {
            width: 100%;
        }

        .header.shop .nice-select {
            width: 35%;
        }

        .header.shop .search-bar input {
            width: 100%;
        }

        .header.shop .search-bar form {
            width: 65%;
        }

    </style>



</head>

<body class="js">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->


    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-12">
                        <!-- Top Left -->
                        <div class="top-left">
                            <ul class="list-main">
                                <li><i class="ti-headphone-alt"></i> +244 930 120 003</li>
                                <li><i class="ti-email"></i> geral@cacimboerp.com</li>
                            </ul>
                        </div>
                        <!--/ End Top Left -->
                    </div>
                    <div class="col-lg-7 col-md-12 col-12">
                        <!-- Top Right -->
                        <div class="right-content">
                            <ul class="list-main">
                                @if (Route::has('login'))
                                    @auth
                                        <li><i class="ti-user"></i> <a href="#">{{ auth()->user()->name }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                      document.getElementById('logout-form').submit();">
                                                <i class="ti-power-off"></i>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    @else
                                        <li><i class="ti-power-off"></i><a href="{{ route('login') }}">Login</a></li>
                                    @endauth
                                @endif
                            </ul>
                        </div>
                        <!-- End Top Right -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div class="middle-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ route('artigos.index') }}"><img
                                    src="https://cacimboweb.com/cacimbofront/images/logoadm.png" alt="logo"></a>
                        </div>
                        <!--/ End Logo -->
                        <!-- Search Form -->
                        <div class="search-top">
                            <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                            <!-- Search Form -->
                            <div class="search-top">
                                <form class="search-form">
                                    <input type="text" placeholder="Search here..." name="search">
                                    <button value="search" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                        <!--/ End Search Form -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                <select id="select-categoria">
                                    <option selected="selected">Tudo</option>
                                    @if (isset($categorias))
                                        @foreach ($categorias as $familia => $subFamilia)
                                            @foreach ($subFamilia as $subf)
                                                <option>{{ $subf->subFamilia }}</option>
                                            @endforeach
                                        @endforeach
                                    @else
                                        @if (isset($subFamilia))
                                            @foreach ($subFamilia as $subf)
                                                <option>{{ $subf->subFamilia }}</option>
                                            @endforeach
                                        @endif
                                    @endif

                                </select>
                                <form method="get" action="{{ route('shop.index') }}">
                                    @csrf
                                    <div class="dropdown">
                                        <input id="input-search" class="dropdown-toggle" data-toggle="dropdown"
                                            name="search" placeholder="Pesquisar" type="search">
                                        <div class="dropdown-menu " id="result-search" style="width: 100%">
                                        </div>
                                    </div>
                                    <button type="submit" class="btnn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @auth
                        <div class="col-lg-2 col-md-3 col-12">
                            <div class="right-bar">
                                <!-- Search Form -->
                                <div class="sinlge-bar">
                                    <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                                <div class="sinlge-bar">
                                    <a href="#" class="single-icon"><i class="fa fa-user-circle-o"
                                            aria-hidden="true"></i></a>
                                </div>
                                <div class="sinlge-bar shopping">
                                    <a href="#" class="single-icon"><i class="ti-bag"></i> <span
                                            class="total-count">2</span></a>
                                    <!-- Shopping Item -->
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span>2 artigos</span>
                                            <a href="#">Ver carrinho</a>
                                        </div>
                                        <ul class="shopping-list">
                                            @foreach (auth()->user()->shoppingSession->cartItens as $cart)
                                                <li>
                                                    <a href="#" class="remove" title="Remove this item"><i
                                                            class="fa fa-remove"></i></a>
                                                    <a class="cart-img" href="#"><img
                                                            src="https://via.placeholder.com/70x70" alt="#"></a>
                                                    <h4><a href="#">{{ $cart->product->designacao }}</a></h4>
                                                    <p class="quantity">{{ $cart->quantity }}- <span
                                                            class="amount">AOA
                                                            {{ number_format($cart->product->pvp, 2, ',', '.') }}
                                                        </span>
                                                    </p>
                                                </li>
                                                @if ($loop->index > 3)
                                                @break
                                            @endif
                                        @endforeach

                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">AOA
                                                {{ number_format(auth()->user()->shoppingSession->CalculateAndGetTotal(auth()->user()->shoppingSession->cartItens),2,',','.') }}</span>
                                        </div>
                                        <a href="#" class="btn animate">Checkout</a>
                                    </div>
                                </div>
                                <!--/ End Shopping Item -->
                            </div>
                        </div>
                    </div>
                @endauth

            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container-md">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="active"><a
                                                    href="{{ route('artigos.index') }}">Home</a></li>
                                            <li><a href="{{ route('shop.index') }}">Loja</a></li>
                                            <li><a href="#">Serviços</a></li>
                                            <li><a href="#">Promoções<span class="new">maio
                                                        2022</span></a></li>
                                            <li><a href="#">Compras<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="cart.html">Carrinho</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contacte-nos</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->



<!-- Start Small Banner  -->
@yield('main')


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
   
</div>
<!-- Modal end -->

<!-- Start Footer Area -->
<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer about">
                        <div class="logo">
                            <a href="index.html"><img src="https://cacimboweb.com/cacimbofront/images/logoadm.png"
                                    alt="#"></a>
                        </div>
                        <p class="text">Fundada em 2012, dedicada ao desenvolvimento de aplicações de
                            gestão empresarial,
                            aplicando tecnologia e anos de investigação para executar de maneira eficaz o processo
                            de negócio e
                            trazer para o mercado as melhores soluções ao nível de programas informáticos para a
                            gestão.</p>
                        <p class="call">Mais informações<span><a href="tel:123456789">+244 930 12 00
                                    03</a></span></p>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Informação</h4>
                        <ul>
                            <li><a href="#">Sobre nós</a></li>
                            <li><a href="#">Perguntas</a></li>
                            <li><a href="#">Termos e condições</a></li>
                            <li><a href="#">Contactos</a></li>
                            <li><a href="#">Ajuda</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Atendimento ao Cliente</h4>
                        <ul>
                            <li><a href="#">Métodos de pagamento</a></li>
                            <li><a href="#">Dovoluções</a></li>
                            <li><a href="#">Trocas</a></li>
                            <li><a href="#">Envio</a></li>
                            <li><a href="#">Política de privacidade</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer social">
                        <h4>Entre em contato</h4>
                        <!-- Single Widget -->
                        <div class="contact">
                            <ul>
                                <li>Av. 15 de Agosto</li>
                                <li>Zona comercial, 28, Loja 41</li>
                                <li>apoioaocliente@cacimboerp.com</li>
                                <li>+244 930 12 00 05</li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                        <ul>
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="left">
                            <p>Copyright © 2022 <a href="https://www.cacimboweb.com" target="_blank">cacimbo angolan
                                    software factory</a> - todos os direitos reservados.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="right">
                            <img src="images/payments.png" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /End Footer Area -->

<!-- Jquery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.0.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.min.js"></script>

<script src="{{ asset('js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Color JS -->
<script src="{{ asset('js/colors.js') }}"></script>
<!-- Slicknav JS -->
<script src="{{ asset('js/slicknav.min.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('js/owl-carousel.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('js/magnific-popup.js') }}"></script>
<!-- Waypoints JS -->
<script src="{{ asset('js/waypoints.min.js') }}"></script>
<!-- Countdown JS -->
<script src="{{ asset('js/finalcountdown.min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('js/nicesellect.js') }}"></script>
<!-- Flex Slider JS -->
<script src="{{ asset('js/flex-slider.js') }}"></script>
<!-- ScrollUp JS -->
<script src="{{ asset('js/scrollup.js') }}"></script>
<!-- Onepage Nav JS -->
<script src="{{ asset('js/onepage-nav.min.js') }}"></script>
<!-- Easing JS -->
<script src="{{ asset('js/easing.js') }}"></script>
<!-- Active JS -->
<script src="{{ asset('js/active.js') }}"></script>
<script src="{{ asset('js/cart.js') }}"></script>
<script src="{{ asset('js/shop.js') }}"></script>


<script>
    let category;
    let uri;
    $("#select-categoria").niceSelect();
    $("#select-categoria").change(function() {
        category = $("#select-categoria").val();
    });
    document.getElementById("input-search").addEventListener("keyup", searchOnInputChange);
    //document.getElementById("select-categoria").addEventListener("change", getListProductsByCategory);
    function searchOnInputChange() {
        let search = document.getElementById("input-search");
        if (category === undefined) {
            uri = "http://inventario.cacimboweb.com/api/products-search?search=" + search.value;
        } else {
            uri = "http://inventario.cacimboweb.com/api/products-search?search=" + search.value + "&" + "category=" +
                category;
        }
        fetch(uri)
            .then((res) => res.json())
            .then((result) => {
                let output = "";
                result.data.forEach(function(product) {
                    output += `
                    <a class="dropdown-item" href="#">${product.designacao}</a>
                    `
                });
                document.getElementById('result-search').innerHTML = output;
            });
    }
    //
</script>
@stack('script')
</body>

</html>
