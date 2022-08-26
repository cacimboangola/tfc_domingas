@extends('home')

@section('content')
<section class="section">
  <div class="row" id="table-bordered">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Doações de {{ $doador->nome }}</h4>
                  {{--  <a href="{{ route('doadores.create') }}" class="btn btn-primary btn-sm">Cadastrar</a>
                  <a href="#" class="btn btn-danger btn-sm">PDF</a>  --}}
              </div>
              <div class="card-content">
                  
                <!-- table bordered -->
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>QUANTIDADE</th>
                              <th>1ª VEZ</th>
                              <th>MOTIVO</th>
                              <th>DATA (h)</th>
                          </tr>
                      </thead>
                      <tbody>
                      
                        @foreach($doacoes as $doacao)
                        <tr>
                          <td>{{$doacao->id}}</td>
                          <td class="text-bold-500">{{$doacao->quantidade}}</td>
                          <td>{{$doacao->etapas}}</td>
                          <td>{{$doacao->motivo}}</td>
                          <td>{{$doacao->created_at->format('d/m/Y h:i')}}</td>

                        </tr>
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