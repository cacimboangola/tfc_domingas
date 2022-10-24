@extends('admin.layout')
@section('main')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categorias</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Lista</li>
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
                        <a href="{{route('categorias.create')}}" class="btn btn-success mb-2"> <i class="fas fa-plus-circle"></i> Criar Categoria</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Rotulo</th>
                                <th>Accoes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categoria)
                            <tr>
                                <td>
                                    {{$categoria->nome}}
                                </td>
                                <td>
                                    {{$categoria->rotulo}}
                                </td>
                                <td>
                                    <a href="{{route('categorias.show', $categoria->id)}}" class="btn-outline-success"> <i class="fas fa-eye"></i></a>
                                    <a href="{{route('categorias.edit', $categoria->id)}}" class="btn-outline-info"> <i class="fas fa-edit"></i></a>
                                    <a href="{{route('categorias.destroy', $categoria->id)}}" class="btn-outline-danger"> <i class="fas fa-trash"></i></a>
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
