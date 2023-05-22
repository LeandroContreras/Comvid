<html lang="en">
    @php
        use Carbon\Carbon;
    @endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Inventario</title>
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    
    <!-- searchPanes -->
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.min.css">
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <style>
	table thead{
	background:rgb(54, 56, 58); 
	color:white;
    border-collapse: collapse;
	}
    td, th {
        border: 1px solid black;
            }
    </style>
</head>
<body>
    <div class="container" style="width: 100%"";>
        <h3 style="text-align:center; margin-top:10px">Reporte de Inventarios Empresa COMVID</h3>
        <div class="d-flex">
            <p>Usuario:</p><p style="margin-left: 5px">{{ Auth::user()->name }}</p>
        </div>
        <div class="d-flex">
            <p>Fecha y hora del reporte:</p><p style="margin-left: 5px">{{ Carbon::now()->format('d-m-Y H:i:s') }}</p>
        </div>
        
        
        <div class="row">
            <div class="col" style="margin-top: 20px">
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
                      
            </div>
        </div>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  

    <!-- searchPanes   -->
    <script src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.min.js"></script>
    <!-- select -->
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>  
</html>