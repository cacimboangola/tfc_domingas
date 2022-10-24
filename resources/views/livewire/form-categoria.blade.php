<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" id="nome" wire:model="nome" placeholder="Nome">
        @error('nome')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Rotulo</label>
        <input type="text" class="form-control" id="codigo" wire:model="rotulo" placeholder="rotulo">
        @error('rotulo')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<!-- /.card-body -->
