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
                            <h3 class="card-title">Lista de requisicaos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{route('requisicaos.create')}}" class="btn btn-success mb-2"> <i class="fas fa-plus-circle"></i> Registar requisicao</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Data</th>
                                    <th>Total</th>
                                    <th >Accoes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($requisicaos as $requisicao)
                                    <tr>
                                        <td>
                                            {{$requisicao->id}}
                                        </td>
                                        <td>
                                            {{$requisicao->created_at->locale('pt-BR')->format('d-m-Y')}}
                                        </td>
                                        <td>
                                            {{$requisicao->total}}
                                        </td>

                                        <td>
                                            <a href="{{route('requisicaos.show', $requisicao->id)}}" class="btn btn-outline-success"> <i class="fas fa-eye"></i></a>
                                            <a href="{{route('requisicaos.destroy', $requisicao->id)}}" class="btn btn-outline-danger"> <i class="fas fa-trash"></i></a>
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
