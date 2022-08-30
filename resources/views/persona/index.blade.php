@extends('adminlte::page')

@section('title', 'Contactos')
@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="md-12 mt-3 ">    
    <button type="button" class="btn btn-outline-success">Crear Contacto</button>    
    <button type="button" class="btn btn-outline-warning">Editar Contacto</button>
    <button type="button" class="btn btn-outline-danger">Eliminar Contacto</button>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header row justify-content-center">{{ __('CONTACTOS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover mt-2">
                        <thead>
                          <tr>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Descripcion</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="table-active">
                            <td>Taqueo</th>
                            <td>Contreras</td>
                            <td>7654356</td>
                            <td>La Paz</td>
                            <td>impsimads jasfljhaf </td>
                          </tr>
                          <tr>
                            <th scope="row">Default</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                          </tr>
                          <tr class="table-active">
                            <td>Default</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection