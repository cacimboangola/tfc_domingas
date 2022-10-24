<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- title row -->
                    <div class="row ml-5 mr-4 mt-2">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> REQUISIÇÃO DE MATERIAL
                                <small class="float-right">Date:
                                    {{ \Carbon\Carbon::now()->locale('pt-BR')->format('d-m-Y H:i') }}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info ml-5">
                        <div class="col-sm-4 invoice-col">
                            De
                            <address>
                                <strong>Mercado Kero</strong><br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Administração Municipal
                            <address>
                                <strong>Utilizador X</strong><br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>requisicao nº {{ $requisicao->id }}</b><br>
                            <br>
                            <b>Data:</b> {{ $requisicao->data }}<br>
                            <b>Total:</b> {{ $requisicao->total }}
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="card-body">
                        <div class="form-group ">
                            <label for="preco">Material</label>
                            <select class="form-control select2 col-md-12 mr-3 @error('material_id') border-danger
                            @enderror" wire:model="material_id"
                                    style="width: 100%;">
                                <option @error('material_id') selected="selected" @enderror> Seleciona o Material </option>
                                @foreach ($materials as $material)
                                    <option selected="selected"
                                            value="{{ $material->id }}">{{ $material->codigo }} - {{ $material->nome }}</option>
                                @endforeach
                            </select>
                            @error('material_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="form-group col-md-4">
                                <label for="preco">Nome do Fornecedor</label>
                                <input type="text" class="form-control" id="preco" wire:model="fornecedor_nome"
                                    placeholder="ex: Kero Benguela">
                                @error('preco')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="preco">Telefone</label>
                                <input type="text" class="form-control" id="preco"
                                    wire:model="fornecedor_telefone" placeholder="ex: +244 999 999 999">
                                @error('preco')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="preco">Endereco</label>
                                <input type="text" class="form-control " id="preco"
                                    wire:model="fornecedor_endereco" placeholder="ex: Rua Comercial, Benguela">
                                @error('preco')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <button class="btn btn-outline-primary float-right" style="float: right"
                            wire:click="addItem({{ $requisicao->id }})"> <i class="fas fa-plus-circle"></i> Add
                            Material</button>

                    </div>
                    <!-- /.card-body -->

                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Materias requisitados</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
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
                                    <th>Acção</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requisicaoItens as $index => $requisicaoIten)
                                    <tr wire:key="requisicao-field-{{ $requisicaoIten->id }}">
                                        <td>{{ $requisicaoIten->id }}</td>
                                        <td>{{ $requisicaoIten->material->nome }}</td>
                                        <td>{{ $requisicaoIten->material->codigo }}</td>
                                        <td>
                                            <div
                                                class="d-flex align-content-center justify-content-between align-items-center">
                                                <a class="mr-1" href="#"
                                                    wire:key="qtd-dec-{{ $requisicaoIten->id }}"
                                                    wire:click="decrementQtdSolicitada({{ $requisicaoIten->id }})"> <i
                                                        class="fas fa-minus-square"></i></a>
                                                <input wire:key="qtd-field-{{ $requisicaoIten->id }}"
                                                    class="form-control" type="number"
                                                    wire:model="requisicaoItens.{{ $index }}.qtd_solicitada"
                                                    id="qtd">
                                                <a class="ml-1" href="#"
                                                    wire:key="qtd-inc-{{ $requisicaoIten->id }}"
                                                    wire:click="incrementQtdSolicitada({{ $requisicaoIten->id }})"> <i
                                                        class="fas fa-plus-square"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="d-flex align-content-center justify-content-between align-items-center">
                                                <a class="mr-1" href="#"
                                                    wire:key="qtd-dec-{{ $requisicaoIten->id }}"
                                                    wire:click="decrementQtdRecebida({{ $requisicaoIten->id }})"> <i
                                                        class="fas fa-minus-square"></i></a>
                                                <input wire:key="qtd-field-{{ $requisicaoIten->id }}"
                                                    class="form-control" type="number"
                                                    wire:model="requisicaoItens.{{ $index }}.qtd_recebida"
                                                    id="qtd">
                                                <a class="ml-1" href="#"
                                                    wire:key="qtd-inc-{{ $requisicaoIten->id }}"
                                                    wire:click="incrementQtdRecebida({{ $requisicaoIten->id }})"> <i
                                                        class="fas fa-plus-square"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="d-flex align-content-center justify-content-between align-items-center">
                                                <a class="mr-1" href="#"
                                                    wire:key="qtd-dec-{{ $requisicaoIten->id }}"
                                                    wire:click="decrementQtdDevolvida({{ $requisicaoIten->id }})"> <i
                                                        class="fas fa-minus-square"></i></a>
                                                <input wire:key="qtd-field-{{ $requisicaoIten->id }}"
                                                    class="form-control" type="number"
                                                    wire:model="requisicaoItens.{{ $index }}.qtd_devolvida"
                                                    id="qtd">
                                                <a class="ml-1" href="#"
                                                    wire:key="qtd-inc-{{ $requisicaoIten->id }}"
                                                    wire:click="incrementQtdDevolvida({{ $requisicaoIten->id }})"> <i
                                                        class="fas fa-plus-square"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="d-flex align-content-center justify-content-between align-items-center">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" wire:keydown.enter="updateDataRecebimento({{ $requisicaoIten->id }})" wire:model="requisicaoItens.{{ $index }}.data_recebimento">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="d-flex align-content-center justify-content-between align-items-center">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" wire:keydown.enter="updateDataDevolucao({{ $requisicaoIten->id }})" id="data_inicio" wire:model="requisicaoItens.{{ $index }}.data_devolucao">
                                                </div>
                                            </div>
                                        </td>
                                        <td><a class="btn btn-outline-danger" href="#"
                                                wire:click="removeItem({{ $requisicaoIten->id }})"><i
                                                    class="fas fa-trash"></i></a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
                <button class="btn btn-success float-right col-md-2 mb-2" wire:click="salvar({{ $requisicao->id }})">
                    <i class="fas fa-check-circle"></i> Concluir Requisição</button>


            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
