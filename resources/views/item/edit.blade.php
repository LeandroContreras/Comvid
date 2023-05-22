@extends('adminlte::page')

@section('title', 'Inventario')
@section('content')
<div class="container" style="width: 600px">
    <h2 style="text-align: center; color:red">Editar Productos</h2>
    <form action="{{ route('item.update', $item->item_id) }}" method="POST" style="margin-top:30px">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ $item->nombre }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <input type="text" name="categoria_id" id="categoria_id" value="{{ $item->categoria_id }}" class="form-control">
        </div>
        <label for="cantidad" style="text-align: center">Cantidad</label>
        <div class="form-group d-flex">
            <input type="number" name="uno" id="uno" value="{{ $item->cantidad }}" class="form-control"  step="0.0001"
            oninput="mejorada()" readonly>
            <input type="number" name="acc" id="acc" value="0" class="form-control"
            oninput="mejorada()">
            <input type="number" name="cantidad" id="cantidad" value="" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" name="precio" id="precio" value="{{ $item->precio }}" class="form-control" step="0.0001">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<script>
    function mejorada(){   
    try{
    var a=parseInt(document.getElementById("uno").value)||0,
        b= parseInt(document.getElementById("acc").value)||0;
    if(a<2){
        document.getElementById("cantidad").value= (a+b)-2;
    }else{
        document.getElementById("cantidad").value= (a+b)-1;
    }
}catch(e){}
}
</script>

@endsection