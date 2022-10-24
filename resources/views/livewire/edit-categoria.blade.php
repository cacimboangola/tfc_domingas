<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    @include('livewire.form-categoria')
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" wire:click="update({{ $categoria->id }})"><i class="fas fa-check-circle"></i> Actualizar
                            Dados</button>
                    </div>

                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
