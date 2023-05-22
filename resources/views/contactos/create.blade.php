@extends('adminlte::page')

@section('title', 'Crear Contacto')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="progress">
                    
                  </div>
                <div class="card-header row justify-content-center">{{ __('CREAR CONTACTO') }}</div>
                <div class="card-header row justify-content-center">
                    <div class="col-md-9">    
                        <form method="POST" action="{{route('contactos.store')}}" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombres</label>
                                <input  type="text" 
                                        name="nombres"
                                        class="form-control @error('nombres')
                                            is-invaled
                                        @enderror"
                                        id="nombres"  
                                        placeholder="Introduzca Nombres del contacto"
                                        value={{old('nombres')}}
                                        >
                                        @error('nombres')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text"
                                       name="apellidos"
                                       class="form-control @error('apellidos')
                                        is-invalid
                                       @enderror"
                                       id="apellidos"
                                       placeholder="Introduzca Apellidos del Contacto"
                                       value={{old('apellidos')}} 
                                >
                                @error('apellidos')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex">
                                <div class="form-group" style="margin-right: 20px">
                                    <label for="telefono">Telefono/Celular</label>
                                    <input type="integer"
                                           name="telefono"
                                           class="form-control @error('telefono')
                                            is-invalid
                                           @enderror"
                                           id="telefono"
                                           placeholder="Introduzca Telefono/Celular del Contacto"
                                           value={{old('telefono')}} 
                                    >
                                    @error('telefono')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" style="margin-right: 20px">
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
                                <label for="departamento">Departamento</label>
                                <select name="departamento" 
                                        class="form-control @error('departamento')
                                            is-invalid
                                        @enderror"
                                        id="departamento" >
                                        <option value="">--Seleccione--</option>
                                        <option>La Paz</option>
                                        <option>Oruro</option>
                                        <option>Potosí</option>
                                        <option>Cochabamba</option>
                                        <option>Santa Cruz</option>
                                        <option>Tarija</option>
                                        <option>Chuquisaca</option>
                                        <option>Pando</option>
                                        <option>Beni</option>
                                </select>
                                @error('departamento')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-group" style="margin-right: 50px">
                                <label for="empresa">Empresa</label>
                                <input type="text"
                                       name="empresa"
                                       class="form-control @error('empresa')
                                        is-invalid
                                       @enderror"
                                       id="empresa"
                                       placeholder="Introduzca la empresa a la que representa"
                                       value={{old('empresa')}} 
                                >
                                @error('empresa')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text"
                                       name="email"
                                       class="form-control @error('email')
                                        is-invalid
                                       @enderror"
                                       id="email"
                                       placeholder="Introduzca la empresa a la que representa"
                                       value={{old('email')}} 
                                >
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group has-success">
                                <label for="descripcion">Descripcion</label>
                                <input type="text"
                                       name="descripcion"
                                       class="form-control @error('descripcion')
                                        is-invalid
                                       @enderror"
                                       id="descripcion"
                                       placeholder="Introduzca Descripcion del Contacto"
                                       value={{old('descripcion')}} 
                                >
                                @error('descripcion')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-success" value="Crear Contacto">
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