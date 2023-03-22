@extends('adminlte::page')

@section('title', 'Productos')
@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="md-12 mt-3 ">    
    <a href="{{route('item.create')}}" type="button" class="btn btn-outline-danger">Ingreso de Productos Nuevos</a>
    <a href="{{route('item.create')}}" type="button" class="btn btn-outline-success">Ingreso de Productos Existentes</a>    
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header row justify-content-center">{{ __('PRODUCTOS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover mt-2">
                        <thead>
                          <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio por unidad</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Descripcion</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ( $item as $item )
                            <tr>
                              <td>{{$item->categoria_id}}-{{$item->item_id}}</td>
                              <td>{{$item->nombre}}</td>
                              <td>{{$item->precio}}</td>
                              <td>{{$item->cantidad}}</td>
                              <td>{{$item->obs}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection