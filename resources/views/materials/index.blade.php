@extends('admin.layout')
@section('main')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            {{session('success')}}
        </div>
        @endif
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Materias</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{route('materials.create')}}" class="btn btn-success mb-2"><i class="fas fa-plus-circle"></i> Criar Material</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nome</th>
                                <th>perecivel</th>
                                <th>Stock Minimo</th>
                                <th>Stock Actual</th>
                                <th>Stock Disponivel</th>
                                <th>Categoria</th>
                                <th>Preço</th>
                                <th>Accoes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($materials as $material)
                            <tr>
                                <td>
                                    {{$material->codigo}}
                                </td>
                                <td>
                                    {{$material->nome}}
                                </td>
                                <td>
                                    {{$material->perecivel}}
                                </td>
                                <td>
                                    {{$material->stock_min}}
                                </td>
                                <td>
                                    {{$material->stock_actual}}
                                </td>
                                <td>
                                    {{$material->stock_disponivel}}
                                </td>
                                <td>
                                   @if($material->categoria != null) {{$material->categoria->nome}} @else Sem Categoria @endif
                                </td>
                                <td>
                                    {{$material->preco}}
                                </td>
                                <td>
                                    <a href="{{route('materials.show', $material->id)}}" class="btn-outline-success"> <i class="fas fa-eye"></i></a>
                                    <a href="{{route('materials.edit', $material->id)}}" class="btn-outline-info"> <i class="fas fa-edit"></i></a>
                                    <a href="{{route('materials.destroy', $material->id)}}" class="btn-outline-danger"> <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
