<!-- recibe una variable para procesar
$clientes= todos los regsitros de la tabla clientes -->

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Clientes</title>

    <!-- agregando los asset: CSS y JS -->
    <?php require "template/asset.php";?>
</head>
<body>
<!-- agregando el navbar del template-->
<?php require "template/navbar.php";?>

<div class="container">

<h1 class="text-center"> Listado de clientes</h1>

<a href="guardarForm" class="btn btn-primary">Nuevo Cliente</a>

<br><br>

<table id="tclientes"  class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>DUI</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>OPERACIONES</th>
        </tr>
    </thead>
    <tbody>
        <!-- agregando  codigo php para procesar las filas -->
    <?php
        //procesando variable
        foreach ($clientes as $key => $value) {
           echo "<tr>";
                echo "<td>".$value['id']."</td>";
                echo "<td>".$value['nombre']."</td>";
                echo "<td>".$value['direccion']."</td>";
                echo "<td>".$value['DUI']."</td>";
                echo "<td>".$value['telefono']."</td>";
                echo "<td>".$value['email']."</td>";
                echo "<td>"; //agregando acciones y rutas para cada fila
                    echo "<a class='btn btn-danger' href='eliminar?id=".$value['id']."'>Eliminar</a>  ";
                    echo "<a  class='btn btn-warning' href='actualizarForm?id=".$value['id']."'>Modificar</a>";
                echo"</td>";
           echo "</tr>";
        }
    ?>     
    </tbody>
</table>
<!-- agregando el footer del template -->
<?php require "template/footer.php";?>

<script>
    $(document).ready(function() {
 
        //configuracion de datatable
       var  table = $('#tclientes').DataTable({

            "searching": true,
            "destroy": true,
            "conditionalPaging": true,
            "scrollCollapse": true,
            "paging": true,
            "lengthMenu": [[5, 10, 20, 30], [5, 10, 20, 30]],
            "order": [[0, "desc"]],
            "responsive": true,
           
            "language": {
                "lengthMenu": "Mostrar _MENU_ ",
                "zeroRecords": "Datos no encontrados",
                "info": "Mostar páginas _PAGE_ de _PAGES_",
                "infoEmpty": "Datos no encontrados",
                "infoFiltered": "(Filtrados por _MAX_ total registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Anterior",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }

            })

            //agregando un nueva instancia de botones
            new $.fn.dataTable.Buttons(table, {
            buttons: [
                {
                    extend: 'excelHtml5',
                    autoFilter: true,
                    sheetName: 'Datos Exportados a excel',
                    className: 'btn btn-success mb-3 far fa-file-excel',
                    text: "  Excel",
                    download: 'open',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        },
                        columns: [0, 1, 2]
                    }

                },
                {
                    extend: 'pdfHtml5',
                    title: "LISTADO DE PERSONAS",
                    //    messageTop: 'listado de personas',
                    download: 'open',
                    className: 'btn btn-lg btn-info mb-3 far fa-file-pdf',
                    text: "  PDF",
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        },
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: "print",
                    text: "  Imprimir",
                    title: "LISTADO DE PERSONAS",
                    className: 'btn btn-lg  mb-3 fas fa-print',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        },
                        columns: [0, 1, 2]
                    }
                },
            ]
            })

            //anexando la instancia de botones antes creada                   
            table.buttons(0, null).container().prependTo(
              table.table().container()
            )



    } );
</script>
</div>
    
</body>
</html>