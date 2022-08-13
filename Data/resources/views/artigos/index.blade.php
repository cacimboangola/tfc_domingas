@extends('layout.index')
@section('main')
@if (isset($categorias))
        <!-- Slider Area -->
        <section class="hero-slider">
            <!-- Single Slider -->
            <div class="single-slider">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-9 offset-lg-3 col-12">
                            <div class="text-inner">
                                <div class="row">
                                    <div class="col-lg-7 col-12">
                                        <div class="hero-text">
                                            <h1><span>CACIMBO E-COMMERCE</span></h1>
                                            <div class="button">
                                                <a href="#" class="btn">Aderir agora</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Single Slider -->
        </section>
        <!--/ End Slider Area -->
    @endif
    <section class="small-banner section">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="section-title">
                        <h2>Lojas</h2>
                    </div>
                </div>

                <div class="owl-carousel owl-theme" id="owl-demo">
                    @php
                        $nif = '';
                    @endphp
                    @foreach ($lojas as $loja)
                        @if ($nif != $loja->nif)
                            <div class="item">
                                <div class="single-banner" style="border-radius: 10px">
                                    <img src="https://gtpautomation.com/wp-content/uploads/2021/10/Automacao-de-armazens-visao-geral-das-opcoes-de-infraestrutura-1200-x-628.jpg"
                                        alt="#">
                                    <div class="content">
                                        <p>{{ $loja->nif }}</p>
                                        <h5 class="text-white">{{ $loja->nome }} <br> {{ $loja->provincia }}</h5>
                                        <a style="color: white; hover: #d0254e" href="#">Ver Produtos</a>
                                        
                                    </div>
                                </div>
                            </div>
                        @endif
                        @php
                            $nif = $loja->nif
                        @endphp
                    @endforeach
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>
    <!-- End Small Banner -->

    
    <!-- Start Midium Banner  -->
	<section class="midium-banner">
		<div class="container-fluid">
			<div class="row">
				<!-- Single Banner  -->
                <div class="col-12">
                    <h3>Categorias</h3>
                </div>
                @foreach ($allCategories as $category => $categories)
                <div class="col-lg-4 col-md-4 col-12 mt-3">
					<div class="single-banner" style="height: 200px">
                        @if ($loop->even)
                        <img  src="https://www.cora.com.br/blog/wp-content/uploads/elementor/thumbs/o-que-e-gestao-financeira-pgaj59dkar5rgz7l5nganijgzpxcpz3yd0r3ckb91c.png" alt="#">
                        @else
                        <img src="https://www.inewsbr.com/wp-content/uploads/2022/01/Gestao-financeira.jpg" alt="#">
                        @endif
						
						<div class="content" style="background: #333333; border-radius: 20px 20px 20px 10px; padding: 10px">
							<h3 class="" style="color: #d0254e; font-weight: bold">{{$category}}
							<a href="{{route('categories.show', $category)}}">Ver tudo</a>
						</div>
					</div>
				</div>
                @endforeach
				<!-- /End Single Banner  -->
			</div>
		</div>
	</section>
	<!-- End Midium Banner -->
	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h4 style="margin-bottom: -20px">Novos Produtos</h4>
                    <div class="owl-carousel-hot-product popular-slider">
                        @foreach ($new_products as $new_product)
                            <!-- Start Single Product -->
                            <div class="single-product" style="height: 250px">
                                <div class="product-img">
                                    <a href="{{ route('artigos.show', $new_product) }}">
                                        <img class="default-img" src="{{$new_product->img}}" alt="imagem do Produto">
                                        <img class="hover-img" src="{{$new_product->img}}" alt="imagem do produto ao passar o mouse">
                                        @if ($new_product->destaque)
                                        <span class="out-of-stock">Hot</span>
                                        @endif
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action display-modal-prduct">
                                            <input type="hidden" name="" value="{{$new_product->idLinha}}">
                                            <a onclick="openModal(this)" class="viewProductInModal" data-id="{{$new_product->idLinha}}" title="Quick View" ><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="{{ route('cart-add-item', $new_product) }}">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">{{$new_product->designacao}}</a></h3>
                                    <div class="product-price">
                                        <span style="color: #d0254e">AOA {{number_format($new_product->pvp, 2,',','.')}}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->

    <!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h4 style="margin-bottom: -20px">Produtos Populares</h4>
                    <div class="owl-carousel-hot-product popular-slider">
                        @foreach ($popular_products as $popular_product)
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{ route('artigos.show', $popular_product) }} ">
                                        <img class="default-img" src="{{$popular_product->img}}" alt="imagem do Produto">
                                        <img class="hover-img" src="{{$popular_product->img}}" alt="imagem do produto ao passar o mouse">
                                        @if ($popular_product->destaque)
                                        <span class="out-of-stock">Hot</span>
                                        @endif
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a onclick="openModal(this)" class="viewProductInModal" data-id="{{$popular_product->idLinha}}" title="Quick View" ><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="{{ route('cart-add-item', $popular_product) }}">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">{{$popular_product->designacao}}</a></h3>
                                    <div class="product-price">
                                        <span style="color: #d0254e">AOA {{number_format($popular_product->pvp, 2,',','.')}}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        @endforeach
						
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->
@endsection

@push('script')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText:['<i class="ti-angle-left"></i>',"<i class='ti-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
        $('.owl-carousel-hot-product').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText:['<i class="ti-angle-left"></i>',"<i class='ti-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 6
                }
            }
        })
    </script>

    <script>
       /* document.getElementById("input-search").addEventListener("change", searchOnInputChange);
       /* function searchOnInputChange(){
            fetch("http://inventario.cacimboweb.com/api/products")
            .then((res) => res.json())
            .then((result) => {
                result.data.forEach(function(products){
                    console.log(products);
                });
            })
        }*/
        //
        function renderProducts(product) {
            
        }
    </script>
@endpush
