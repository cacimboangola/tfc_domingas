@extends('layout.index')
@section('main')
    <!-- Shop Single -->
    <section class="shop single section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <!-- Images slider -->
                                <div class="flexslider-thumbnails">
                                    <ul class="slides">
                                        @if (count($product->images) > 0)
                                            @foreach ($product->images as $image)
                                                @if ($loop->first)
                                                    <li data-thumb="{{ $image->url }}" rel="adjustX:10, adjustY:">
                                                        <img src="{{ $image->url }}" alt="#">
                                                    </li>
                                                @endif
                                                <li data-thumb="{{ $image->url }}">
                                                    <img src="{{ $image->url }}" alt="#">
                                                </li>
                                            @endforeach
                                        @else
                                            <li data-thumb="https://www.terraempresas.com.br/blog/wp-content/uploads/2021/02/terra-empresas-produtos-mais-vendidos-na-internet-capa.png" rel="adjustX:10, adjustY:">
                                                <img src="https://www.terraempresas.com.br/blog/wp-content/uploads/2021/02/terra-empresas-produtos-mais-vendidos-na-internet-capa.png" alt="#">
                                            </li>
                                            <li data-thumb="https://d1ih8jugeo2m5m.cloudfront.net/2021/07/produtos-mais-vendidos-no-mercado-livre-700x394.jpg">
                                                <img src="https://d1ih8jugeo2m5m.cloudfront.net/2021/07/produtos-mais-vendidos-no-mercado-livre-700x394.jpg" alt="#">
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                                <!-- End Images slider -->
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product-des">
                                <!-- Description -->
                                <div class="short">
                                    <h4>{{ $product->designacao }}</h4>
                                    <div class="rating-main">
                                        <ul class="rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                            <li class="dark"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <a href="#" class="total-review">(102) Review</a>
                                    </div>
                                    <p class="price"><span class="discount">AOA
                                            {{ number_format($product->pvp, 2, ',', '.') }}</span>
                                            
                                    <p class="description"> {{ $product->referencias }} </p>
                                </div>
                                <!--/ End Description -->
                                <!-- Product Buy -->
                                <div class="product-buy">
                                    <div class="quantity">
                                        <h6>Quantidade :</h6>
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                    data-type="minus" data-field="quant[1]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                data-max="1000" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                    data-field="quant[1]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>
                                    <div class="add-to-cart mt-3">
                                        <a href="{{route('cart-add-item', $product)}}" class="btn">Adicionar ao Carrinho</a>
                                        <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                        <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                                    </div>
                                    <p  class="cat">Categoria :<a href="#">{{ $product->familia }} -
                                            {{ $product->subFamilia }}</a></p>
                                    <p class="availability">Disponibilidade : {{ $product->stock }} em Stock</p>
                                </div>
                                <!--/ End Product Buy -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Shop Single -->
@endsection
