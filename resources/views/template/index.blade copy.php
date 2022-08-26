@extends('home')

@section('content')
<section class="section">
  <div class="row" id="table-bordered">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Doadores</h4>
                  <a href="{{ route('doadores.create') }}" class="btn btn-primary btn-sm">Cadastrar</a>
                  <a href="#" class="btn btn-danger btn-sm">PDF</a>
              </div>
              <div class="card-content">
                  
                <!-- table bordered -->
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>NOME</th>
                              {{-- <th>SEXO</th> --}}
                              <th>GRUPO</th>
                              <th>TELEFONE</th>
                              <th>ESTADO</th>
                              <th>DOAÇÕES</th>
                              <th>ACÇÃO</th>
                          </tr>
                      </thead>
                      <tbody>
                      
                        @foreach($doadores as $doador)
                        <tr>
                          <td>{{$doador->id}}</td>
                          <td class="text-bold-500">{{$doador->nome}}</td>
                          {{-- <td class="text-bold-500">{{$doador->sexo}}</td> --}}
                          <td>{{$doador->grupo->tipo}}</td>
                          <td>{{$doador->telefone}}</td>

                          <td class="table-action">
                            @if($doador->estado == 'Permitido')
                            <button class="btn btn-info btn-sm rounded-pill">{{$doador->estado}}</button>
                            @else
                            <button class="btn btn-danger btn-sm rounded-pill">{{$doador->estado}}</button>
                            @endif
                          </td>
                        
                          <td>
                            <a href="{{ route('show.doacoes', $doador->id) }}">{{$doador->doacoes->count()}}</a>
                          </td>

                          <td class="table-action">
                            <div class="btn-group">
                              <a class="btn btn-success btn-sm" 
                              href="{{ route('doadores.edit', ['doadore' => $doador->id]) }}">
                              <dt class="the-icon"><svg class="svg-inline--fa fa-pen fa-w-16 fa-fw select-all" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"></path></svg><!-- <span class="fa-fw select-all fas"></span> Font Awesome fontawesome.com --></dt>
                              </a>

                              &nbsp;
                              <a class="btn btn-warning btn-sm" 
                                href="{{ route('create.doacao', $doador->id) }}"  data-bs-target="#doacao-doador-{{$doador->id}}"
                                data-bs-toggle="modal" >
                              
                                <dl class="dt w-100 ma0 pa0 mb-0">
                                <dt class="the-icon "><svg class="svg-inline--fa fa-align-right fa-w-14 fa-fw select-all" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="align-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M16 224h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16zm416 192H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm3.17-384H172.83A12.82 12.82 0 0 0 160 44.83v38.34A12.82 12.82 0 0 0 172.83 96h262.34A12.82 12.82 0 0 0 448 83.17V44.83A12.82 12.82 0 0 0 435.17 32zm0 256H172.83A12.82 12.82 0 0 0 160 300.83v38.34A12.82 12.82 0 0 0 172.83 352h262.34A12.82 12.82 0 0 0 448 339.17v-38.34A12.82 12.82 0 0 0 435.17 288z"></path></svg>
                                  <!-- <span class="fa-fw select-all fas sm"></span> Font Awesome fontawesome.com --></dt>
                                </dl>
                              </a>
                              &nbsp;

                              <a class="btn btn-danger btn-sm" 
                              href="#">
                                PDF
                              </a>
                            </div>
                          </td>
                         
                        </tr>
                        @include('doacoes.doacaodoador')
                        @endforeach
                      
                      </tbody>
                  </table>
                </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection