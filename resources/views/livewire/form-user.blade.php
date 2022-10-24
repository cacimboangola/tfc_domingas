<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" id="nome" wire:model="name" placeholder="nome">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" class="form-control" id="codigo" wire:model="email" placeholder="email">
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="password" class="form-control " id="codigo"  wire:model="password" placeholder="password">
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label>Categoria</label>
        <select class="form-control select2" wire:model="tipo" style="width: 100%;">
            <option> Seleciona o Tipo </option>
                <option>Administrador</option>
                <option>Gestor</option>
        </select>
    </div>
</div>
<!-- /.card-body -->
