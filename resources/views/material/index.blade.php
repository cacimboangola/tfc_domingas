@extends('home')
@section("titulo","Criar Material")
@section('content')
<div class="col-md-12">
  <div class="row bg-white">
    
    <div class="container-fluid">
    
    <div class="card">
        <div class="card-header">
        **
        </div>
        <div class="card-body">
            <form action="" method="post">
                <h3>material</h3>
                <hr>
                <div class="form-row">
                <div class="form-group col-md-4">
                        <label>Código</label>
                        <div class="input-group input-group--inline">
                            <input type="email" class="form-control" name="nome" placeholder="nome">
                        </div>
                </div>
                    
                </div>
                
                <button class="btn btn-success">Salvar </button>
            </form>
        </div>
    </div>

</div>
  </div>
</div>
@endsection