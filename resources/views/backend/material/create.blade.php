@extends('home')

@section('content')

    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-10 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cadastrar Material</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('doadores.store') }}"
                                  method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nome</label>
                                                <input type="text" value="{{ old('nome')}}"
                                                       class="form-control @error('nome') is-invalid @enderror" name="nome" >
                                                @error('nome')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Sexo</label>
                                                <select name="sexo" class="form-select">
                                                    <option value="Masculino" {{ (old('sexo') == 'Masculino' ? 'selected' : '') }}>Masculino</option>
                                                    <option value="Feminino" {{ (old('sexo') == 'Feminino' ? 'selected' : '') }}>Feminino</option>
                                                </select>
                                                @error('sexo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Data de nascimento</label>
                                                <input type="date" value="{{ old('dataNascimento')}}"
                                                       class="form-control @error('dataNascimento') is-invalid @enderror" name="dataNascimento" >
                                                @error('dataNascimento')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fullname">Província</label>
                                                <select name="province_id" class="form-control @error('province_id') is-invalid @enderror">
                                                    <option>Selecione a província</option>
                                                    @foreach($provincias as $provincia)
                                                        <option value="{{$provincia->id}}">{{$provincia->nome}}</option>
                                                    @endforeach
                                                </select>
                                                @error('province_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nº de BI</label>
                                                <input type="text" value="{{ old('bi')}}"
                                                       class="form-control @error('bi') is-invalid @enderror" name="bi" >
                                                @error('bi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Telefone</label>
                                                <input type="number" value="{{ old('telefone')}}"
                                                       class="form-control @error('telefone') is-invalid @enderror" name="telefone" >
                                                @error('telefone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Tel. Alternativo</label>
                                                <input type="number" value="{{ old('telefoneAlternativo')}}"
                                                       class="form-control @error('telefoneAlternativo') is-invalid @enderror" name="telefoneAlternativo" >
                                                @error('telefoneAlternativo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fullname">Grupo Sanguíneo</label>
                                                <select name="grupo_id" class="form-control @error('grupo_id') is-invalid @enderror">
                                                    <option>Selecione grupo</option>
                                                    @foreach($grupos as $grupo)
                                                        <option value="{{$grupo->id}}">{{$grupo->tipo}}</option>
                                                    @endforeach
                                                </select>
                                                @error('grupo_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Endereço</label>
                                                <input type="text" value="{{ old('endereco')}}"
                                                       class="form-control @error('endereco') is-invalid @enderror" name="endereco" >
                                                @error('endereco')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Profissão</label>
                                                <input type="text" value="{{ old('profissao')}}"
                                                       class="form-control @error('profissao') is-invalid @enderror" name="profissao" >
                                                @error('profissao')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Local de trabalho</label>
                                                <input type="text" value="{{ old('localTrabalho')}}"
                                                       class="form-control @error('localTrabalho') is-invalid @enderror" name="localTrabalho" >
                                                @error('localTrabalho')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Local de colheita</label>
                                                <input type="text" value="{{ old('localColheita')}}"
                                                       class="form-control @error('localColheita') is-invalid @enderror" name="localColheita" >
                                                @error('localColheita')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Pressão Art.</label>
                                                <input type="number" value="{{ old('pressao')}}"
                                                       class="form-control @error('pressao') is-invalid @enderror" name="pressao" >
                                                @error('pressao')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Exames</label>

                                                <select name="exames[]" multiple class="form-control ">
                                                    @foreach($exames as $exame)
                                                        <option value="{{$exame->id}}">{{$exame->nome}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input @error('estado') is-invalid @enderror"type="radio" name="estado"
                                                           value="Permitido" {{ old('estado') == 'Permitido' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineRadio1">Permitido</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input @error('estado') is-invalid @enderror" type="radio" name="estado"
                                                           value="Não permitido" {{ old('estado') == 'Não permitido' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineRadio2">Não permitido</label>
                                                </div>

                                                @error('estado')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="fullname">Descrição</label>
                                                <textarea name="descricao" id="summary-ckeditor" class="form-control" value="{{old('descricao')}}"
                                                          cols="10" rows="5" placeholder="Ex: O doador não pode doador devido a baixa pressão"></textarea>
                                                @error('descricao')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Cadastrar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
