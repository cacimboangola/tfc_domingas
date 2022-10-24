    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" id="codigo" wire:model="nome" placeholder="ex: 34Adr32">
            @error('nome')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Codigo</label>
            <input type="text" class="form-control" id="codigo" wire:model="codigo" placeholder="ex: 34Adr32">
            @error('codigo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Stock Minimo</label>
            <input type="text" class="form-control" id="stock_min" wire:model="stock_min" placeholder="ex: 2">
            @error('stock_min')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Stock Actual</label>
            <input type="text" class="form-control" id="stock_actual" wire:model="stock_actual" placeholder="ex: 4">
            @error('stock_actual')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Stock Disponivel</label>
            <input type="text" class="form-control" id="stock_disponivel" wire:model="stock_disponivel"
                placeholder="ex: 30">
            @error('stock_disponivel')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" class="form-control" id="preco" wire:model="preco" placeholder="ex: 10000">
            @error('preco')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" wire:model="perecivel" id="perecivel">
            <label class="form-check-label" for="perecivel"> Perecivel?</label>
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <select class="form-control select2" wire:model="categoria_id" style="width: 100%;">
                <option> Seleciona a Categoria </option>
                @foreach ($categories as $category)
                    <option @if ($loop->first) selected="selected" @endif value="{{ $category->id }}">
                        {{ $category->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <!-- /.card-body -->
