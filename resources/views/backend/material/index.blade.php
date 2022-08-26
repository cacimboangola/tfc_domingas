@extends('home')

@section('content')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <strong>LISTAGEM DE Materiais</strong>
                <a href="{{ route('materials.create') }}" class="btn btn-warning btn-sm">Cadastrar</a>

                <form action="{{route('materials.filter')}}" method="GET">@csrf
                    <br>
                    <div class="col-md-5 col-sm-5 form-group float-right top_search">
                        <div class="col-md-12" style="display: flex;">
                            <label for="">Mês <span style="font-size: 12px">(ex: 02)</span>
                                <input name="mes" type="number" class="form-control">
                            </label>

                            <label for="">Ano
                                <input name="ano" type="number" class="form-control">
                            </label>


                            <span class="input-group-btn" ><br>
                  <button type="submit" class="btn btn-info" type="button">Buscar</button>
                </span>
                        </div>
                    </div>

                </form>

            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>PERECIVEL</th>
                        <th>STOCK MINIMO</th>
                        <th>STOCK ACTUAL</th>
                        <th>CATEGORIA</th>
                        <th>STOCK INICIAL</th>
                        <th>ACÇÃO</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(materiais as $material)
                        <tr>
                            <td>{{$material->id}}</td>
                            <td class="text-bold-500">{{$material->nome}}</td>
                            <td>{{$material->categoria->nome}}</td>
                            <td class="table-action">
                                @if($material->perecivel == 1)
                                    <button class="btn btn-info btn-sm rounded-pill">Sim</button>
                                @else
                                    <button class="btn btn-danger btn-sm rounded-pill">Não</button>
                                @endif
                            </td>

                            <td>{{$material->stock_min}}</td>

                            <td>
                                <a href="{{ route('categorias.show', $material->id) }}">{{$material->categorias->count()}}</a>
                            </td>

                            <td>{{$material->created_at->format('d/m/Y')}}</td>

                            <td class="table-action">
                                <div class="btn-group">
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('materials.edit', ['materiais' => $material->id]) }}">
                                        <dt class="the-icon"><svg class="svg-inline--fa fa-pen fa-w-16 fa-fw select-all" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"></path></svg><!-- <span class="fa-fw select-all fas"></span> Font Awesome fontawesome.com --></dt>
                                    </a>
                                    &nbsp;

                                    <a class="btn btn-danger btn-sm"
                                       href="{{ route('materials.show', $material->id) }}">
                                        PDF
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>


    {{--  <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>  --}}
    {{--  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>  --}}
    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    {{--  <script src="{{ asset('js/all.min.js') }}"></script>  --}}

    {{--  <script src="{{ asset('vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/pages/dashboard.js') }}"></script>  --}}

    {{--  <script src="{{ asset('js/main.js') }}"></script>  --}}

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

@endsection
