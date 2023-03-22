@extends('adminlte::page')

@section('title', 'Contacto')
@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="md-12 mt-3 ">    
    <a href="{{route('contactos.create')}}" type="button" class="btn btn-outline-success">Crear Contacto</a>    
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
                    <div class="contenedor-tabla" style="overflow:auto; height:400px">
                    <table class="table table-striped">
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
                          @foreach ($contactos as $contacto )
                          <tr>
                            <td>{{$contacto->nombres}}</td>
                            <td>{{$contacto->apellidos}}</td>
                            <td>{{$contacto->telefono}}</td>
                            <td>{{$contacto->departamento}}</td>
                            <td>{{$contacto->descripcion}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection