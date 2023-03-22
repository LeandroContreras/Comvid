@extends('adminlte::page')

@section('title', 'Lista de Usuarios')
@section('content')

<h1>Asignar un rol</h1>
@if(session('info'))
    <div class="alert alert-warning">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<form method="POST" action="{{route('usuario.update', $usuario->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $usuario->name }}">
    </div>
    <div class="form-group">
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $usuario->email }}">
    </div>
    <h2 class="h5">Listado de Roles</h2>
    {!! Form::model($usuario,['route'=>['usuario.update', $usuario->id], 'method' => 'put']) !!}
    @foreach ($roles as $role )
        <div>
            <label for="">
                {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                {{$role->name}}
            </label>
        </div>
    @endforeach
    {!! Form::submit('Asignar Rol', ['class'=>'btn btn-danger mt-2']) !!}
    {!! Form::close() !!}
</form>


@endsection