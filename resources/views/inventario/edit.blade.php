@extends('adminlte::page')

@section('title', 'Inventario')
@section('content')
<form action="{{ route('items.update', $item->item_id) }}" method="POST">
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
    <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input type="text" name="cantidad" id="cantidad" value="{{ $item->cantidad }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio" value="{{ $item->precio }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection