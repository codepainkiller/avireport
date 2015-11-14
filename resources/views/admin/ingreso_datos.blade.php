@extends('layout_admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Ingreso de datos
    <small>Gallinas ponedoras</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Charts</a></li>
    <li class="active">Morris</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">


    <div class="form-group">
        <label>Cargar archivo Excel</label>
         <input type="file" id="xlf" accept=".xlsx"/>
         <p class="help-block">Descargue el formato de archivo <a href="#">aquí</a></p>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-10">
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">Ingrese pesos de aves</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" id="peso_1" class="form-control" placeholder="Ingrese peso" value="2.1"/>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="peso_2" class="form-control" placeholder="Ingrese peso" value="2.54"/>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="peso_3" class="form-control" placeholder="Ingrese peso" value="2.32"/>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="peso_4" class="form-control" placeholder="Ingrese peso"  value="2.08"/>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="peso_5" class="form-control" placeholder="Ingrese peso"  value="2.67"/>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="peso_6" class="form-control" placeholder="Ingrese peso"  value="2.01"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-10">
            <div class="box box-default box-body">
                <table id="table_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Muestra 1</th>
                            <th>Muestra 2</th>
                            <th>Muestra 3</th>
                            <th>Muestra 4</th>
                            <th>Muestra 5</th>
                            <th>Muestra 6</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- data -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-6 col-md-2">
            <div class="center-block">
                <button id="addRow" class="btn btn-default btn-block">Agregar pesos</button>
                <button id="deleteRow" class="btn btn-default btn-block"> Eliminar fila</button>
                <button id="deleteTable" class="btn btn-default btn-block"> Eliminar tabla</button>
            </div>
            <hr/>
            <div>

            </div>
        </div>
    </div>
    {!! Form::open(['route' => 'promedio', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Resultados</h3>
                </div>
                <div class="panel-body">
                    <label>Promedio:</label>
                    <input name="promedio" id="promedio" type="text"  class="text-center" value="0"/>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-warning btn-lg btn-block">Continuar</button>
                </div>
            </div>

        </div>
    </div>
    {!! Form::close() !!}

</section>

@stop

@section('css-content')
    <link href="{{ asset('plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('js-content')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src='{{ asset('plugins/fastclick/fastclick.min.js') }}'></script>
<script src="{{ asset('admin-LTE/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/xlsx/xlsx.core.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">

    $(document).ready(function() {

        var table = $('#table_data').dataTable({
            "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": true,
            "bAutoWidth": false
        });

        var datasource = {};

        // Add row
        $('#addRow').on( 'click', function () {

            if (inputsEmpty())
            {
                alert("Ingrese los pesos!");
            }
            else {
                table.fnAddData([
                    $('#peso_1').val(),
                    $('#peso_2').val(),
                    $('#peso_3').val(),
                    $('#peso_4').val(),
                    $('#peso_5').val(),
                    $('#peso_6').val()
                ]);

                var prom = calcularPromedio(table.fnGetData());
                $('#promedio').val(prom);
                cleanInputs();
            }
        });

        // Listener
        $('#table_data tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).toggleClass('selected');
            }
        } );

        // Delete row
        $('#deleteRow').click( function () {
            table.fnDeleteRow('.selected');

            var prom = calcularPromedio(table.fnGetData());
            $('#promedio').val(prom);
        } );

        // Delete dataTable
        $('#deleteTable').click( function() {
            table.fnDeleteRow();

            var prom = calcularPromedio( table.fnGetData() );
            $('#promedio').val(prom);
        });

        function calcularPromedio(obj) {
            var promedio = 0;
            var suma = 0;

            if (obj.length == 0)
                return promedio;

            for (var i in obj) {

                var row = obj[i];
                for(var j in row) {
                    suma += parseFloat(row[j]);
                }
            }

            promedio = suma / (obj.length * obj[0].length);
            console.log("Promedio: " + promedio);

            return promedio;
        }

        // Clean forms
        function cleanInputs() {
            $('#peso_1').val(null);
            $('#peso_2').val(null);
            $('#peso_3').val(null);
            $('#peso_4').val(null);
            $('#peso_5').val(null);
            $('#peso_6').val(null);
        }

        // Validate empty forms
        function inputsEmpty() {
            if ($('#peso_1').val() == "" || $('#peso_2').val() == "" || $('#peso_3').val() == "" ||
                $('#peso_4').val() == "" || $('#peso_5').val() == ""
            )
            {
                return true;
            }
            return false;
        }

        // Load XLSX data
        var xlf = document.getElementById('xlf');

        function to_json(workbook) {
            var result = {};
            workbook.SheetNames.forEach( function(sheetName) {
                var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                if(roa.length > 0){
                    result[sheetName] = roa;
                }
            });
            return result;
        }

        function handleFile(e) {
            var files = e.target.files;
            var i,f;

            for (i = 0, f = files[i]; i != files.length; ++i) {
                var reader = new FileReader();
                var name = f.name;

                reader.onload = function(e) {
                    var data = e.target.result;
                    var workbook = XLSX.read(data, {type: 'binary'});

                    // Parse JS Object
                    var jsondata = (to_json(workbook))["Hoja1"];

                    for(var i in jsondata) {
                        var obj = jsondata[i];
                        var row = [];
                        for(var j in obj) {
                            row.push(obj[j]);
                        }

                        table.fnAddData(row);
                    }

                    // Update promedio
                    var prom = calcularPromedio( table.fnGetData() );
                    $('#promedio').val(prom);
                };

                reader.readAsBinaryString(f);
            }
        }

        if(xlf.addEventListener)
            xlf.addEventListener('change', handleFile, false);

    });
</script>
@stop