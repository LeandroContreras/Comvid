@extends('adminlte::page')

@section('title', 'Categoria')
@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="md-12 mt-3 ">    
    <a href="{{route('categoria.create')}}" type="button" class="btn btn-outline-success">Crear Categoría</a>    
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header row justify-content-center">{{ __('CATEGORIAS') }}</div>

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
                            <th scope="col">Descripción</th>
                            <th scope="col">Función</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($categorias as $categoria )
                            <tr>
                              <td>{{$categoria->categoria_id}}</td>
                              <td>{{$categoria->descripcion}}</td>
                              <td>{{$categoria->funcion}}</td>
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