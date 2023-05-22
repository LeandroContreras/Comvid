<!DOCTYPE html>
<html lang="en">
    @php
        use Carbon\Carbon;
    @endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Excel</title>
</head>
<body>
    <h3 style="text-align:center; margin-top:10px">Reporte de Inventarios Empresa COMVID</h3>
        <div class="d-flex">
            <p>Usuario:</p><p style="margin-left: 5px">{{ Auth::user()->name }}</p>
        </div>
        <div class="d-flex">
            <p>Fecha y hora del reporte:</p><p style="margin-left: 5px">{{ Carbon::now()->format('d-m-Y H:i:s') }}</p>
        </div>
    <table id="tablap" class="table table-bordered display nowrap" cellspacing="0" style="width: 100%; max-width: none; color:black">
        <thead>
          <tr>
            <th scope="col" style="text-align: center; width:50px">CODIGO</th>
            <th scope="col" style="text-align: center;">PRODUCTO</th>
            <th scope="col" style="text-align: center;">CATEGORIA</th>
            <th scope="col" style="text-align: center;">STOCK</th>
            <th scope="col" style="text-align: center;">PRECIO</th>
          </tr>
        </thead>
        <tbody>
                @foreach ($items as $item)
                <tr>
                    <th style="text-align: center">{{$item->item_id}}</th>
                    <td style="text-align: center;">{{$item->nombre}}</td>
                    <td style="text-align: center;">{{$item->categoria_id}}</td>
                    <td style="text-align: center;">{{$item->cantidad}}</td>
                    <td style="text-align: center;">{{$item->precio}}</td>
                  </tr>
                @endforeach
        </tbody>               
      </table> 
</body>
</html>