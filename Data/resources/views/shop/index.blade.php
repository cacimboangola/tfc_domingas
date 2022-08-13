@extends('layout.index')
@section('main')
    <!-- Start Product Area -->
    <div class="product-area shop-sidebar shop-list shop">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row ">
                        <div class="col-12">
                            <select name="" id="">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="col-3 mt-3 ">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true"
                                aria-controls="collapseCategory">
                                Categorias <i class="fa" aria-hidden="true" style="float: right"></i>
                            </a>
                            <ul id="collapseCategory" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="scrollable-div">
                                    @foreach ($categorias as $familia => $subFamilia)
                                        @if ($familia != '')
                                            <li class="mt-1"><a data-toggle="collapse"
                                                    data-target="#{{ $loop->index }}" aria-expanded="false"
                                                    aria-controls="{{ $familia }}"
                                                    style="cursor: pointer">{{ $familia }}<i class="fa"
                                                        aria-hidden="true" style="float: right"></i></a>
                                                <ul id="{{ $loop->index }}" class="collapse"
                                                    aria-labelledby="headingOne" data-parent="#accordion">
                                                    @foreach ($subFamilia as $sub)
                                                        <li class="mt-1" style="cursor: pointer;">{{$sub->subFamilia}}</li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach

                                </div>
                            </ul>

                        </li>
                        <hr>
                        <li class="nav-item">
                            <a data-toggle="collapse" data-target="#collapseTags" aria-expanded="true"
                                aria-controls="collapseTags">
                                Precos <i class="fa" aria-hidden="true" style="float: right"></i>
                            </a>
                            <div id="collapseTags" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="container">
                                    <form class="range">
                                        <div class="form-group range__slider">
                                            <input type="range" id="range_price" step="500">
                                        </div>
                                        <!--/form-group-->
                                        <div class="form-group range__value">
                                            <span></span>
                                        </div>
                                    </form>
                                </div>
                                <!--/container-->
                                <ul class="check-box-list">
                                    <li>
                                        <label class="checkbox-inline" for="1"><input name="news" id="price1"
                                                type="checkbox"> AOA
                                            20 - AOA 1000<span class="count"></span></label>
                                    </li>
                                    <li>
                                        <label class="checkbox-inline" for="2"><input name="news" id="price2"
                                                type="checkbox"> AOA
                                            1001 - AOA 5000<span class="count"></span></label>
                                    </li>
                                    <li>
                                        <label class="checkbox-inline" for="3"><input name="news" id="price3"
                                                type="checkbox"> +
                                            AOA 50001<span class="count"></span></label>
                                    </li>
                                </ul>

                            </div>
                        </li>
                        <hr>
                    </ul>
                </div>
                <div class="col-9">
                    <!-- Shop Top -->
                    <div class="shop-top">
                        <div class="shop-shorter">
                            <div class="single-shorter">
                                <label>Ordenar por :</label>
                                <select id="sorted-filter">
                                    <option selected="selected" value="">Seleciona</option>
                                    <option value="nome">Nome</option>
                                    <option value="preço">Preço</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--/ End Shop Top -->
                    <div class="product-info">
                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active" id="man" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row" id="show-products">
                                        @foreach ($products_shop as $product)
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                <div class="single-product shadow p-3 mb-5 bg-white rounded">
                                                    <div class="product-img">
                                                        <a href="{{ route('artigos.show', $product) }}">
                                                            <img class="default-img"
                                                                src="https://media.istockphoto.com/photos/distribution-warehouse-logistics-packaged-parcels-ready-for-shipment-picture-id941410386?k=20&m=941410386&s=612x612&w=0&h=gM2wgW1hq2RLInW69P5ckKF3Z_D7kQfKjhn3goSM3d0="
                                                                alt="#">
                                                            <img class="hover-img"
                                                                src="https://d1ih8jugeo2m5m.cloudfront.net/2021/07/produtos-mais-vendidos-no-mercado-livre-700x394.jpg"
                                                                alt="#">
                                                        </a>
                                                        <div class="button-head">
                                                            <div class="product-action">
                                                                <input type="hidden" name="" value="{{$product->idLinha}}">
                                                                    <a onclick="openModal(this)" class="viewProductInModal" data-id="{{$product->idLinha}}" title="Quick View" ><i class=" ti-eye"></i><span>Mostrar</span></a>                                                                    
                                                                <a title="Wishlist" href="#"><i
                                                                        class=" ti-heart "></i><span>Adicionar a lista
                                                                        de
                                                                        Desejo</span></a>
                                                            </div>
                                                            <div class="product-action-2">
                                                                <a title="Add to cart"
                                                                    href="{{ route('cart-add-item', $product) }}">Adicionar
                                                                    ao carrinho</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a href="">{{ $product->designacao }}</a>
                                                        </h3>
                                                        <span>{{ $product->artigo }} - {{ $product->nif }} </span>
                                                        <!--<span><b>${artigo.stock} ${artigo.stockUn}</b></span> -->
                                                        <div class="product-price">
                                                            <span style="color: #d0254e">AOA
                                                                {{ number_format($product->pvp, 2, ',', '.') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{ $products_shop->links() }}
                                    </div>
                                </div>
                                <div id="pagination" class='pagination mb-5'></div>
                            </div>
                            <!--/ End Single Tab -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Area -->
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush
@push('script')
    <script src="{{ asset('js/slider-range.js') }}"></script>
@endpush
