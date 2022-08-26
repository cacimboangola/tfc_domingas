<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
 id="modal-delete-{{$category->id}}">

 <form action="{{ route('admin.categories.destroy', ['category' => $category->id])}}" method="POST">
    @csrf
    @method('DELETE')

    <div class="modal-dialog">
        <div class="modal-content">
           
            <div class="modal-body">
                <p>Deseja eliminar <br> <h6>{{$category->name}}?</h6></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info btn-rounded btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-danger btn-rounded btn-sm">Sim</button>
            </div>
        </div>
    </div>

 </form>

   

</div>