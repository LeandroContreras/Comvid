@extends('adminlte::page')

@section('title', 'Inventario')
@section('content')
<link href="resources/css/inventario.css" rel="stylesheet"/>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header row justify-content-center">{{ __('INVENTARIO') }}</div>

                {{--<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Aqui vamos con los inventarios') }}
                </div>--}}
            
    <div class="botones py-3 ">
    <button type="button" class="btn btn-outline-primary ">CREAR PRODUCTO</button>
    <button type="button" class="btn btn-outline-success"><span class="fas fa-file-excel">  EDITAR PRODUCTO</span></button>
    <button type="button" class="btn btn-outline-danger">ELIMINAR PRODUCTO</button>
    </div>
    <div class="datatable">
    <div class="row justify-content-center">
        <table id="inventario" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">CODIGO</th>
                <th scope="col">PRODUCTO</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">STOCK</th>
                <th scope="col">PRECIO</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">AL-345</td>
                <td>Ventanilla</td>
                <td>Aluminio</td>
                <td>900</td>
                <td>70</td>
              </tr>
              <tr>
                <th scope="row">Al-432</th>
                <td>Visagra</td>
                <td>Proyectantes</td>
                <td>453</td>
                <td>46</td>
              </tr>
              <tr>
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
              </tr>
              <tr>
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
              </tr>
              <tr>
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
              </tr>
              <tr>
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
              </tr>
              <tr>
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
              </tr>
              <tr>
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
              </tr>
              <tr>
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
              </tr>
              <tr>
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
              </tr>
              <tr>
                <th scope="row">Default</th>
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
</div>
@endsection