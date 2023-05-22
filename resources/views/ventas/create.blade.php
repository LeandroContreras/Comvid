@extends('adminlte::page')

@section('title','ventas')
@section('content')
<div class="Titulo">
<h1 style="text-align: center; color:red">Ventas</h1>
</div>
<form method="POST" action="{{route('ventas.store')}}" novalidate>
    @csrf
    <div class="d-flex input-group">
        <div class="form-group" style="margin-right: 80px">
            <label for="nombre">Cliente</label>
            <select name="cliente" id="cliente" class="form-control" style="width:200px">
                <option value="">--Seleccione--</option>
                @foreach ($contacto as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombres }} {{$cliente->apellidos}}</option>
                @endforeach
            </select>
                    @error('cliente')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
        </div>
        <div class="form-group" style="margin-right: 80px">
            <label for="fecha">Fecha de la venta</label>
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
        <div class="form-group">
            <label for="total">Total a pagar</label>
            <input type="integer"
                       style="width: 210px"
                       name="total"
                       class="form-control @error('total')
                        is-invalid
                       @enderror"
                       id="total"
                       
                       readonly 
                >
                @error('total')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>
        </div>
        </div>
           
    <div class="form-group campos-adicionales">
        <div class="input-group">
            <div class="form-group">
              <label for="categoria">Categoria del Producto</label>
              <select name="categoria[]" id="categoria" class="form-control" style="width:310px; margin-right:10px">
                <option value="">--Seleccione--</option>
                @foreach ($categoria as $catego)
                <option value="{{ $catego->categoria_id }}">{{ $catego->descripcion }}</option>
                @endforeach
              </select>
              @error('categoria[]')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Productos:</label>
              <select type="text" class="form-control" name="producto[]" placeholder="Nombre del producto" style="width:220px; margin-right:10px; margin-bottom:10px" id="producto">
                <option value="">--Seleccione--</option>
                @foreach ($items as $prod)
                <option value="{{ $prod->item_id }}" data-categoria="{{ $prod->categoria_id }}" data-precio="{{ $prod->precio}}">{{ $prod->nombre }}</option>
                @endforeach
              </select>
              @error('producto[]')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
              </span>
              @enderror
            </div>   
            <div class="form-group">
                <label for="cantidad"> Cantidad</label>
                <input type="integer" class="form-control" 
                name="cantidad[]" placeholder="Cantidad"
                id="cantidad"
                oninput="calcularTotal()" 
                style="margin-right: 10px; width:150px">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
            <input type="numeric" class="form-control" id="precio" 
            name="precio[]" oninput="calcularTotal()" 
            placeholder="Precio" style="margin-right: 10px; width:150px" readonly>
            </div>
          </div>
        </div>       
        <script>
            // Obtener los elementos del DOM
            const categoria = document.getElementById('categoria');
            const producto = document.getElementById('producto');
            const precio = document.getElementById('precio');
            const cantidad = document.getElementById('cantidad');
          
            // Deshabilitar el elemento de selección de productos inicialmente
            producto.disabled = true;
          
            // Asignar el evento onchange al elemento categoria
            categoria.addEventListener('change', (event) => {
              // Obtener el valor de la categoría seleccionada
              const categoriaSeleccionada = event.target.value;
          
              // Recorrer todos los options de producto
              for (let i = 0; i < producto.options.length; i++) {
                const opcionProducto = producto.options[i];
          
                // Si la opción de producto tiene el valor de categoría igual a la categoría seleccionada
                if (opcionProducto.getAttribute('data-categoria') === categoriaSeleccionada || categoriaSeleccionada === '') {
                  // Mostrar la opción
                  opcionProducto.style.display = 'block';
                } else {
                  // Ocultar la opción
                  opcionProducto.style.display = 'none';
                }
              }
          
              // Si no se selecciona una categoría, deshabilitar el elemento de selección de productos
              if (categoriaSeleccionada === '') {
                producto.disabled = true;
              } else {
                producto.disabled = false;
              }
          
              // Reiniciar el valor del elemento de selección de productos y precio
              producto.value = '';
              precio.value ='';
            });
          
            // Asignar el evento onchange al elemento producto
            producto.addEventListener('change', (event) => {
              // Obtener la opción de producto seleccionada y su valor
              const opcionProductoSeleccionado = event.target.options[event.target.selectedIndex];
              const productoSeleccionado = opcionProductoSeleccionado.value;
              const categoriaSeleccionada = categoria.value;
          
              // Recorrer todos los productos y encontrar el que coincide con el valor seleccionado
              const productos = {!! json_encode($items) !!};
              const productoEncontrado = productos.find(producto => producto.item_id === productoSeleccionado);
          
              // Si se encontró el producto y coincide con la categoría seleccionada, asignar el precio al valor del elemento precio
              if (productoEncontrado && productoEncontrado.categoria_id === categoriaSeleccionada) {
                precio.value = productoEncontrado.precio;
              } else {
                precio.value = '';
              }
            });
        
            // Asignar el evento onchange al elemento cantidad
            cantidad.addEventListener('change', (event) => {
              const cantidadSeleccionada = event.target.value;
              const precioSeleccionado = parseFloat(precio.value);
          
              // Multiplicar la cantidad por el precio y asignar el resultado al elemento precio
              precio.value = cantidadSeleccionada * precioSeleccionado || '';
            });
        </script> 
        <script>
            // Función para calcular el total
            function calcularTotal() {
            const cantidadSeleccionada = document.getElementById('cantidad').value;
            const precioSeleccionado = parseFloat(document.getElementById('precio').value);

            // Multiplicar la cantidad por el precio y asignar el resultado al elemento total
            document.getElementById('total').value = cantidadSeleccionada * precioSeleccionado;
}
        </script>
    <button class="btn btn-primary mt-3" id="agregar-campo" type="button">Agregar Producto</button>
    <button type="submit" class="btn btn-success mt-3">Enviar</button>
    <div id="datos" data-productos="{{ json_encode($items) }}"></div>
    <div id="datosc" data-categorias="{{ json_encode($categoria) }}"></div>
  </form>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
  var productos = JSON.parse(document.querySelector('#datos').getAttribute('data-productos'));
  var categorias = JSON.parse(document.querySelector('#datosc').getAttribute('data-categorias'));

  // Agregar campo
  document.querySelector('#agregar-campo').addEventListener('click', function() {
    var divInputGroup = document.createElement('div');
    divInputGroup.className = 'input-group';
    
    // Crear select con categorías de productos
    var selectCategoria = document.createElement('select');
    selectCategoria.className = 'form-control';
    selectCategoria.name = 'categoria[]';
    // Agregar opción "Seleccione"
    var opcionSeleccioneCategoria = document.createElement('option');
    opcionSeleccioneCategoria.value = '';
    opcionSeleccioneCategoria.innerText = '----Seleccione----';
    selectCategoria.appendChild(opcionSeleccioneCategoria);
    categorias.forEach(function(categoria) {
      var option = document.createElement('option');
      option.value = categoria.categoria_id;
      option.innerText = categoria.descripcion;
      selectCategoria.appendChild(option);
      selectCategoria.style.width = '110px';
    });
    selectCategoria.style.marginRight = '10px';
    
    // Crear select con opciones de productos
    var selectProducto = document.createElement('select');
    selectProducto.className = 'form-control';
    selectProducto.name = 'producto[]';
    // Agregar opción "Seleccione"
    var opcionSeleccioneProducto = document.createElement('option');
    opcionSeleccioneProducto.value = '';
    opcionSeleccioneProducto.innerText = 'Seleccione';
    selectProducto.appendChild(opcionSeleccioneProducto);
    productos.forEach(function(producto) {
      var option = document.createElement('option');
      option.value = producto.item_id;
      option.innerText = producto.nombre;
      option.setAttribute('data-categoria', producto.categoria_id);
      selectProducto.appendChild(option);
      selectProducto.style.marginRight = '10px';
    });
    selectProducto.style.width = '100px';
    
    // Asignar los eventos onchange a los elementos de select
    selectCategoria.addEventListener('change', function(event) {
      // Obtener el valor de la categoría seleccionada
      var categoriaSeleccionada = event.target.value;

      // Recorrer todos los options de producto
      for (var i = 0; i < selectProducto.childNodes.length; i++) {
        const optionProducto = selectProducto.childNodes[i];

        // Si la opción de producto tiene el valor de categoría igual a la categoría seleccionada
        if (optionProducto.getAttribute('data-categoria') === categoriaSeleccionada || categoriaSeleccionada === '') {
          // Mostrar la opción
          optionProducto.style.display = 'block';
        } else {
          // Ocultar la opción
          optionProducto.style.display = 'none';
        }
      }

      // Si no se selecciona una categoría, deshabilitar el elemento de selección de productos
      if (categoriaSeleccionada === '') {
        selectProducto.disabled = true;
      } else {
        selectProducto.disabled = false;
      }

      // Reiniciar el valor del elemento de selección de productos
      selectProducto.value = '';
    });

    selectProducto.disabled = true;
        // Crear campo de cantidad
        var inputCantidad = document.createElement('input');
        inputCantidad.type = 'integer';
        inputCantidad.className = 'form-control';
        inputCantidad.name = 'cantidad[]';
        inputCantidad.placeholder = 'Cantidad';
        inputCantidad.style.width = '5px'
        inputCantidad.style.marginRight = '10px'; // Agregar un espacio horizontal de 10px
  
        // Crear campo de precio
        var inputPrecio = document.createElement('input');
        inputPrecio.type = 'numeric';
        inputPrecio.className = 'form-control';
        inputPrecio.name = 'precio[]';
        inputPrecio.placeholder = 'Precio del producto';
        inputPrecio.style.marginRight = '10px'; // Agregar un espacio horizontal de 10px
        inputPrecio.style.width = '30px';
        // Crear botón para eliminar campo
        var divInputGroupAppend = document.createElement('div');
        divInputGroupAppend.className = 'input-group-append';
        var btnEliminarCampo = document.createElement('button');
        btnEliminarCampo.className = 'btn btn-danger eliminar-campo';
        btnEliminarCampo.type = 'button';
        btnEliminarCampo.innerText = 'Eliminar';
        divInputGroupAppend.appendChild(btnEliminarCampo);
  
        // Agregar campos al div de grupo
        divInputGroup.appendChild(selectCategoria);
        divInputGroup.appendChild(selectProducto);
        divInputGroup.appendChild(inputCantidad);
        divInputGroup.appendChild(inputPrecio);
        divInputGroup.appendChild(divInputGroupAppend);
        divInputGroup.style.marginBottom = '10px'; // Agregar un espacio vertical de 10px
  
        // Agregar div de grupo a la lista de campos adicionales
        document.querySelector('.campos-adicionales').appendChild(divInputGroup);
  
        // Agregar evento para eliminar campo
        btnEliminarCampo.addEventListener('click', function() {
          this.parentNode.parentNode.remove();
        });
      });
    });
</script>
@endsection