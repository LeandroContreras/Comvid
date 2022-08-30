@extends('adminlte::page')

@section('title', 'Productos')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11 mt-5">
            <div class="card">
                <div class="card-header row justify-content-center">{{ __('PRODUCTOS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Aqui van los productos que tendra nuestra pagina') }}
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-outline-primary">CREAR PRODUCTO</button>
    <button type="button" class="btn btn-outline-success">EDITAR PRODUCTO</button>
    <button type="button" class="btn btn-outline-danger ">ELIMINAR PRODUCTO</button>
</div>
@endsection