@extends('adminlte::page')

@section('title', 'Editar Usuario')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 40px">
                <div class="card-header" style="text-align: center; font-size:25px">{{ __('Editar y Restablecer Usuarios') }}</div>

                <div class="card-body">
                    <form action="{{ route('usuario.updateus', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="name">Nombre:</label>
                        <div>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}"><br>
                        </div>
                        <label for="email">Correo electrónico:</label>
                        <div>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}"><br>
                        </div>
                        <label for="password">Contraseña:</label>
                        <div>
                            <input type="password" name="password" class="form-control"><br>
                        </div>
                        <input type="submit" value="Guardar cambios" style="margin-top: 10px" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
