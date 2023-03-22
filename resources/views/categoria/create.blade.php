@extends('adminlte::page')

@section('title', 'Crear Categoria')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" 
                        role="progressbar" 
                        aria-valuenow="75" 
                        aria-valuemin="0" 
                        aria-valuemax="100" 
                        style="width: 75%;"> Progreso de creación</div>
                  </div>
                <div class="card-header row justify-content-center">{{ __('CREAR CATEGORIA') }}</div>
                <div class="card-header row justify-content-center">
                    <div class="col-md-9">    
                        <form method="POST" action="{{route('categoria.store')}}" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="categoria_id">Identificación de la Categoria</label>
                                <input  type="text" 
                                        name="categoria_id"
                                        class="form-control @error('categoria_id')
                                            is-invaled
                                        @enderror"
                                        id="categoria_id"  
                                        placeholder="Introduzca Nombre de la Categoria"
                                        value={{old('categoria_id')}}
                                        >
                                        @error('categoria_id')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Nombre de la Categoria</label>
                                <input  type="text" 
                                        name="descripcion"
                                        class="form-control @error('descripcion')
                                            is-invaled
                                        @enderror"
                                        id="descripcion"  
                                        placeholder="Introduzca Nombres de la categoria"
                                        value={{old('descripcion')}}
                                        >
                                        @error('descripcion')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="form-group">
                                <label for="tamaño">Tamaño</label>
                                <input type="text"
                                       name="tamaño"
                                       class="form-control @error('tamaño')
                                        is-invalid
                                       @enderror"
                                       id="tamaño"
                                       placeholder="Introduzca el tamaño de la categoria"
                                       value={{old('tamaño')}} 
                                >
                                @error('tamaño')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="eje">Eje</label>
                                <input type="integer"
                                       name="eje"
                                       class="form-control @error('eje')
                                        is-invalid
                                       @enderror"
                                       id="eje"
                                       placeholder="Introduzca el eje de la Categoria"
                                       value={{old('eje')}} 
                                >
                                @error('eje')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="color">Color</label>
                                <input type="text"
                                       name="color"
                                       class="form-control @error('color')
                                        is-invalid
                                       @enderror"
                                       id="color"
                                       placeholder="Introduzca el color de la Categoria"
                                       value={{old('color')}} 
                                >
                                @error('color')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="forma">Forma</label>
                                <input type="text"
                                       name="forma"
                                       class="form-control @error('forma')
                                        is-invalid
                                       @enderror"
                                       id="forma"
                                       placeholder="Introduzca la forma de la Categoria"
                                       value={{old('forma')}} 
                                >
                                @error('forma')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <select name="tipo" 
                                        class="form-control @error('tipo')
                                            is-invalid
                                        @enderror"
                                        id="tipo" >
                                        <option value="">--Seleccione--</option>
                                        <option>Cliente</option>
                                        <option>Proveedor</option>
                                </select>
                                @error('tipo')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="funcion">Funcion</label>
                                <input type="text"
                                       name="funcion"
                                       class="form-control @error('funcion')
                                        is-invalid
                                       @enderror"
                                       id="funcion"
                                       placeholder="Introduzca la funcion"
                                       value={{old('funcion')}} 
                                >
                                @error('funcion')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="malla">Malla</label>
                                <input type="text"
                                       name="malla"
                                       class="form-control @error('malla')
                                        is-invalid
                                       @enderror"
                                       id="malla"
                                       placeholder="Introduzca malla"
                                       value={{old('malla')}} 
                                >
                                @error('malla')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-success" value="Crear Categoria">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection