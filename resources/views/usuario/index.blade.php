@extends('adminlte::page')

@section('title', 'Lista de Usuarios')
@section('content')
<h1>Lista de usuarios</h1>
<p>Estoy Aqui administrador de roles </p>
<div>
    <div class="card">
        <div class="card-header">
            <input type="text" wire:model="search"  class="form-control" placeholder="Ingrese el nombre o correo del usuario">
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuario as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{ route ('usuario.edit', $user)}}" > Editar </a>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $usuario->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@endsection