@extends('admin.layout')
@section('main')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Nota:</h5>
                        Este documento serve como Comprovativo da Factura de Compras
                    </div>
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Patrimonio
                                    <small class="float-right">Date: {{\Carbon\Carbon::now()->locale('pt-BR')->format('d-m-Y H:i')}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Utilizador X</strong><br>
                                    Rua Domingos do Ó<br>
                                    Phone: (+244) 999 999 999<br>
                                    Email: admin@example.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>Utilizador X</strong><br>
                                    Rua Domingos do Ó<br>
                                    Phone: (+244) 999 999 999<br>
                                    Email: admin@example.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Compra #{{$compra->id}}</b><br>
                                <br>
                                <b>Data:</b> {{$compra->created_at->locale('pt-BR')->format('d-m-Y H:i')}}<br>
                                <b>Total:</b> {{$compra->total}}
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Quantidade</th>
                                        <th>Material</th>
                                        <th>Fornecedor</th>
                                        <th>Preco</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($compra->itens as $index=>$item)
                                    <tr>
                                        <td>{{$item->qtd}}</td>
                                        <td>{{$item->material->codigo}} {{$item->material->nome}}</td>
                                        <td>{{$item->material->fornecedor_nome}}</td>
                                        <td>{{$item->material->preco}}</td>
                                        <td>{{$item->subtotal}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
