@extends('layout.index')
@section('main')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12 container-cart">
                    <!-- Shopping Summery -->
                    <table id="cart-table" class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCTO</th>
                                <th>NOME</th>
                                <th class="text-center">PRECO UNITARIO</th>
                                <th class="text-center">QUANTIDADE</th>
                                <th class="text-center">SUBTOTAL</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody id="cart-itens">
                            @foreach ($cartItens as $cartItem)
                                <tr>
                                    <td class="image" data-title="No"><img
                                            src="https://www.terraempresas.com.br/blog/wp-content/uploads/2021/02/terra-empresas-produtos-mais-vendidos-na-internet-capa.png"
                                            alt="product image"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="#">{{ $cartItem->product->designacao }}</a></p>
                                        <p class="product-des">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Dicta, culpa. Cum harum possimus atque deleniti quam? Doloremque obcaecati
                                            debitis,
                                            quis, incidunt pariatur consectetur soluta minima molestias nulla eius nihil
                                            velit?</p>
                                    </td>
                                    <td class="price" data-title="Price"><span>AOA
                                            {{ number_format($cartItem->product->pvp, 2, ',', '.') }} </span></td>
                                    <td class="qty" data-title="Qty">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                    data-type="minus" data-field="quantity[{{ $cartItem->id }}]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quant[{{ $cartItem->id }}]" class="input-number"
                                                data-min="1" data-max="100" value="{{ $cartItem->quantity }}">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                    data-field="quant[{{ $cartItem->id }}]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount" data-title="Total">AOA
                                        <span>{{ number_format($cartItem->subtotal, 2, ',', '.') }} </span></td>
                                    <td class="action" data-title="Remove"><a href="#"><i
                                                class="ti-trash remove-icon delete"></i></a></td>
                                    <input type="hidden" name="cartId" id="cart-item-id" value="{{ $cartItem->id }}">
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <button class="btn">Apply</button>
                                        </form>
                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">
                                            Shipping (+10$)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Total AOA<span id="cart-total">
                                                {{ number_format(auth()->user()->shoppingSession->CalculateAndGetTotal(auth()->user()->shoppingSession->cartItens),2,',','.') }}
                                            </span></li>
                                        <li>Shipping<span>Free</span></li>
                                    </ul>
                                    <div class="button5">
                                        <a href="#" class="btn">Checkout</a>
                                        <a href="{{ route('artigos.index') }}" class="btn">Continuar
                                            Comprando</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->
@endsection
