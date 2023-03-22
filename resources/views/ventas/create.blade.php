@extends('adminlte::page')

@section('title', 'Ventas')
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
                <div class="card-header row justify-content-center">{{ __('INGRESO DE PRODUCTOS') }}</div>
                <div class="card-header row justify-content-center">
                    <div class="col-md-9">    
                        <form method="POST" action="{{route('item.store')}}" novalidate>
                            @csrf
                            <div class="d-flex">
                            <div class="form-group" style="margin-right: 80px">
                                <label for="nombre">Cliente</label>
                                <select name="cliente" id="cliente" class="form-control" style="width:200px">
                                    <option value="">--Seleccione--</option>
                                    @foreach ($contacto as $cliente)
                                        <option value="{{ $cliente->cliente_id }}">{{ $cliente->nombres }} {{$cliente->apellidos}}</option>
                                    @endforeach
                                </select>
                                        @error('cliente')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="form-group">
                                <label for="nombre">Producto</label>
                                <select name="producto" id="producto" class="form-control" style="width:200px">
                                    <option value="">--Seleccione--</option>
                                    @foreach ($items as $prod)
                                        <option value="{{ $prod->item_id }}">{{ $prod->nombre }}</option>
                                    @endforeach
                                </select>
                                        @error('nombre')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                            </div>
                            </div>
                            <script>
                                document.getElementById("categoria_id").addEventListener("change", function() {
                                  var categoriaId = this.value;
                                  document.getElementById("input_categoria_id").value = categoriaId;
                                });
                            </script>
                                <label for="item_id" style="margin-right: 170px">ID del producto</label>
                                <label for="item_id">Fecha de Ingreso</label>
                            <div class="d-flex">
                                <input type="text" style="width: 90px; margin-right:10px" class="form-control" id="input_categoria_id" value readonly>
                                <input type="text"
                                style="width: 100px;
                                margin-right:80px" 
                                class="form-control @error('item_id')
                                is-invalid
                                @enderror" 
                                name="item_id"
                                id="item_id"
                                placeholder="ID del producto"
                                value={{old('item_id')}}
                                >
                                @error('item_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                                
                                    <input type="date"
                                           style="width: 210px"
                                           name="fecha"
                                           class="form-control @error('fecha')
                                            is-invalid
                                           @enderror"
                                           id="fecha"
                                           value={{old('fecha')}} 
                                    >
                                    @error('fecha')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="d-flex" style="justify-content:space-between; align-items:center; margin-top:10px">
                            <div class="form-group">
                                <label for="precio">Precio X unidad</label>
                                <input type="integer"
                                       style="width: 120px"
                                       name="precio"
                                       class="form-control @error('precio')
                                        is-invalid
                                       @enderror"
                                       id="precio"
                                       placeholder="Bs"
                                       value={{old('precio')}} 
                                >
                                @error('precio')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stock">Cantidad</label>
                                <input type="integer"
                                       style="width: 120px"
                                       name="cantidad"
                                       class="form-control @error('cantidad')
                                        is-invalid
                                       @enderror"
                                       id="cantidad"
                                       placeholder="Unidades"
                                       value={{old('cantidad')}} 
                                >
                                @error('cantidad')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nombre">Proveedor</label>
                                <select name="contacto_id" id="contacto_id" class="form-control" style="width:200px">
                                    <option value="">--Seleccione--</option>
                                    @foreach ($contacto as $contac)
                                        <option value="{{ $contac->id }}">{{ $contac->nombres }}</option>
                                    @endforeach
                                </select>
                                        @error('contacto_id')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                            </div>
                            </div>
                            <div class="form-group has-success">
                                <label for="obs">Observación</label>
                                <input type="text"
                                       name="obs"
                                       class="form-control @error('obs')
                                        is-invalid
                                       @enderror"
                                       id="obs"
                                       placeholder="Introduzca Observación"
                                       value={{old('obs')}} 
                                >
                                @error('obs')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-success" value="Ingreso de Productos">
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
                <div class="progress mt-3">
                    <div class="progress-bar" role="progressbar" style="width: {{$porcentaje}}%;" aria-valuenow="{{$porcentaje}}" aria-valuemin="0" aria-valuemax="100">{{$porcentaje}}%</div>
                  </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection