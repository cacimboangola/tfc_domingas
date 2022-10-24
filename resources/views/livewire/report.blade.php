<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- title row -->
                    <div class="row ml-5 mr-4 mt-2">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> Relataorios
                                <small class="float-right">Date:
                                    {{ \Carbon\Carbon::now()->locale('pt-BR')->format('d-m-Y H:i') }}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="form-group col-md-5 d-flex justify-content-between align-items-center">
                                <label for="preco" style="width: 7rem">Data Inicio</label>
                                <input type="date" class="form-control" id="data_inicio" wire:model="data_inicio">
                                @error('data_inicio')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5 d-flex justify-content-between align-items-center">
                                <label for="preco" style="width: 7rem">Data Final</label>
                                <input type="date" class="form-control" id="data_fim" wire:model="data_fim">
                                @error('data_fim')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info mb-4" wire:click="consultar"> <i class="fas fa-filter"></i>
                                    Consultar Report</button>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Resumo</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>Total Gasto</td>
                                    <td> @isset($totalGasto)
                                        {{$totalGasto->total}} KZ
                                    @endisset </td>
                                </tr>
                                <tr>
                                    <td>Total Stock</td>
                                    <td> @isset($totalGasto)
                                        {{$totalGasto->stock_actual}} UN
                                    @endisset </td>
                                </tr>
                                <tr>
                                    <td>Total Material Devolvido</td>
                                    <td> @isset($totalArrecadado)
                                        {{$totalArrecadado->totalDevolvida}} UN
                                    @endisset </td>
                                </tr>
                                <tr>
                                    <td>Total Material Solicitado</td>
                                    <td> @isset($totalArrecadado)
                                        {{$totalArrecadado->totalSolicitada}} UN
                                    @endisset </td>
                                </tr>
                                <tr>
                                    <td>Total Material Recebido</td>
                                    <td> @isset($totalArrecadado)
                                        {{$totalArrecadado->totalRecebida}} UN
                                    @endisset </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Materias Comprados</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped bg-success">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nome</th>
                                    <th>Codigo</th>
                                    <th style="width: 40px">Preço</th>
                                    <th style="width: 40px">Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra)
                                    @foreach ($compra->itens as $compraIten)
                                        <tr wire:key="compra-field-{{ $compraIten->id }}">
                                            <td>{{ $compraIten->id }}</td>
                                            <td>{{ $compraIten->material->nome }}</td>
                                            <td>{{ $compraIten->material->codigo }}</td>
                                            <td>
                                                {{ $compraIten->material->preco }}
                                            </td>
                                            <td>
                                                {{ $compraIten->material->stock_actual }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Materias requisitados</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped bg-info">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nome</th>
                                    <th>Codigo</th>
                                    <th>Quantidade Solicitada</th>
                                    <th>Quantidade Recebida</th>
                                    <th>Quantidade Devolvida</th>
                                    <th>Data Recebida</th>
                                    <th>Data Devolucao</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requisicaos as $requisicao)
                                    @foreach ($requisicao->itens as $index => $requisicaoIten)
                                        <tr wire:key="requisicao-field-{{ $requisicaoIten->id }}">
                                            <td>{{ $requisicaoIten->id }}</td>
                                            <td>{{ $requisicaoIten->material->nome }}</td>
                                            <td>{{ $requisicaoIten->material->codigo }}</td>
                                            <td>{{ $requisicaoIten->qtd_solicitada }}</td>
                                            <td>{{ $requisicaoIten->qtd_recebida }}</td>
                                            <td>{{ $requisicaoIten->qtd_devolvida }}</td>
                                            <td>{{ $requisicaoIten->data_recebimento }}</td>
                                            <td>{{ $requisicaoIten->data_devolucao }}</td>
                                            <td>{{ $requisicao->estado }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
