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
                        <li class="breadcrumb-item active">Requisição</li>
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
                        Este documento serve como Comprovativo da Factura de requisicaos
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
                                <b>requisicao #{{$requisicao->id}}</b><br>
                                <br>
                                <b>Data:</b> {{$requisicao->created_at->locale('pt-BR')->format('d-m-Y H:i')}}<br>
                                <b>Total:</b> {{$requisicao->total}}
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
                                        <th>Material</th>
                                        <th>Fornecedor</th>
                                        <th>Preco</th>
                                        <th>Quantidade Solicitada</th>
                                        <th>Quantidade Recebida</th>
                                        <th>Quantidade Devolvida</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($requisicao->itens as $index=>$item)
                                        <tr>
                                            <td>{{$item->material->codigo}} {{$item->material->nome}}</td>
                                            <td>{{$item->material->fornecedor_nome}}</td>
                                            <td>{{$item->material->preco}}</td>
                                            <td>{{$item->qtd_solicitada}}</td>
                                            <td>{{$item->qtd_recebida}}</td>
                                            <td>{{$item->qtd_devolvida}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
