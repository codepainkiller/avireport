@extends('layout_admin')

@section('content')
<section class="content-header">
    <h1>
        Galpón {{ $galpon->code }}
        <small> <!-- it all starts here --> </small>
        </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('granja.index') }}"><i class="fa fa-home"></i> Granjas</a></li>
        <li><a href="{{ route('granja.show', $galpon->granja_id) }}">Granja {{ $galpon->granja_id }}</a></li>
        <li class="active">Galpón {{ $galpon->code }} </li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-md-7">
            <!-- slider -->
            <div class="box box-solid hidden" >
                <div class="box-header with-border">
                    <h3 class="box-title">Semanas</h3>
                </div>
                <div class="box-body">
                    <input id="sliderSemanas" type="text" name="range_1" value="" />
                </div>
            </div>
            <!-- /.slider -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Análisis de crecimiento</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="chart"></div>
                    <input type="hidden" value="{{ $galpon->control->json_control }}" id="json_control"/>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">Control de galpón</h3>
                </div>
                <div class="box-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="glyphicon glyphicon-flash"></span>
                            Estado de crecimiento:
                            <span id="semanaCrecimiento" class="badge bg-blue">Semana {{ $galpon->control->week }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="glyphicon glyphicon-calendar"></span>
                            Último registro:
                            <span id="ultimaActualizacion" class="badge bg-blue">{{ $jsonControl->last_update }}</span>
                        </li>
                    </ul>
                </div>
                <div class="box-footer">
                    <div class="form-inline text-center">
                        <button id="abrirModal" class="btn btn-primary" data-toggle="modal" data-target="#modalControlSemanal"><i class="fa fa-line-chart"></i></span> Control semanal</button>
                        <button id="enviarCliente" class="btn btn-default hidden"><i class="fa fa-envelope"></i> Enviar a cliente</button>
                        <button id="generaReporte" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Generar reporte</button>
                    </div>
                </div>
            </div>

            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">Información de galpón</h3>
	                <div class="box-tools pull-right">
	                    <a href="{{ route('galpon.edit', $galpon->id) }}" class="btn btn-box-tool"><i class="fa fa-edit fa-2x"></i></a>
	                </div>
                </div>
                <div class="box-body">
                    <ul class="list-group">
                        <li class="list-group-item"><b>Código: </b> <span id="codigoGalpon" class="pull-right">{{ $galpon->code }}</span></li>
                        <li class="list-group-item"><b>Numero de aves: </b> <span class="pull-right">{{ $galpon->number_birds }}</span></li>
                        <li class="list-group-item"><b>Descripción: </b> <span class="pull-right">{{ $galpon->description }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
	</div>
</section>

<!-- modal-control-semanal -->
<div class="modal fade" id="modalControlSemanal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <h4 id="modalNumeroSemana" class="modal-title">Control Semanal {{ $galpon->control->week }}</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-8">
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="">Cargar Excel: <a href="{{ asset('resources/formato_pesos.xlsx') }}">Descargar formato</a></label>
                            <input type="file" id="cargarExcel"/>
                        </div>
                        <button id="borrarDT" class="btn btn-default btn-sm pull-right">Borrar Tabla</button>
                    </div>
                    <table id="pesosDT" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Pesos 1</th>
                            <th>Pesos 2</th>
                            <th>Pesos 3</th>
                            <th>Pesos 4</th>
                            <th>Pesos 5</th>
                            <th>Pesos 6</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- json data -->
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Peso promedio semanal</label>
                        <input id="peso_promedio" type="text" class="form-control" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="">Estado</label>
                        <input id="estado" type="text" class="form-control" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="">Observación</label>
                        <textarea id="observacion" type="text" rows="5" class="form-control" placeholder="Ingrese observacion o recomendacion con respecto el peso promedio de esta semana." required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="registraControl" class="btn btn-primary" data-dismiss="modal">Registrar</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal-control-semanal -->

@endsection

@section('css-content')
    <link href="{{ asset('plugins/bootstrap-slider/slider.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/ionslider/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
    <!-- ion slider Nice -->
    <link href="{{ asset('plugins/ionslider/ion.rangeSlider.skinNice.css') }}" rel="stylesheet" type="text/css" />
    <!-- bootstrap slider -->
@endsection

@section('js-content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plugins/morris/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/xlsx/xlsx.core.min.js') }}" type="text/javascript"></script>

<!-- ion slider -->
<script src="{{ asset('plugins/ionslider/ion.rangeSlider.min.js') }}" type="text/javascript"></script>
<!-- CSS to PDF-->
<script src="{{ asset('plugins/css2pdf/xepOnline.jqPlugin.js') }}" type="text/javascript"></script>

<script type="text/javascript">

    /*
    * Variables globales de vista
    */
    var xlf = document.getElementById('cargarExcel');

    if(xlf.addEventListener)
    {
        xlf.addEventListener('change', handleFile, false);
    }

    var table = $('#pesosDT').dataTable({
        "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false
    });

    /*
     * Cargar grafico inicial de crecimiento
     */

    var chart = new Morris.Line({
        element: 'chart',
        //data: datachart,
        xkey: 'semana',
        ykeys: ['peso_min', 'peso_max', 'peso_real'],
        labels: ['Peso mínimo', 'Peso máximo', 'Peso real'],
        parseTime: false
    });

    $("#sliderSemanas").ionRangeSlider({
        min: 0,
        max: 90,
        from: 5,
        to: 18,
        type: 'double',
        step: 1,
        prettify: false,
        hasGrid: true,
        onChange: function(data) {
            console.log("Semanal inicial: ", data['fromNumber']);
            console.log("Semana Final", data['toNumber']);
        },
        onLoad: function() {
            console.log("Slide onLoad");
            var jsoncontrol =  JSON.parse($('#json_control').val());

            if(jsoncontrol != "")
                showChart(jsoncontrol);
            else
                alert("No se ha registrado ningun control semanal");
        }

    });

    $(document).ready(function() {
        /*
         * Registrar control de galpon mendiante AJAX
         */
        $('#registraControl').click( function (event) {

            if ($('#observacion').val() == "") {
                alert("Ingrese observación");
                return;
            }

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var url = "{{ url() }}/" + 'control/' + "{{ $galpon->control->id }}";
            console.log("URL PUT Ajax: ", url);
            var data = {
                _token: CSRF_TOKEN,
                id: "{{ $galpon->control->id }}",
                peso_promedio: $('#peso_promedio').val(),
                estado: $('#estado').val(),
                observacion: $('#observacion').val()
            };

            $.ajax({
                type: 'PUT',
                url: url,
                data: data,
                async: true,
                success: function(response) {
                    console.log(response);
                    alert("Control semanal registrado con exito!");
                    showChart(JSON.parse(response));
                    updateDataControl(JSON.parse(response));
                },
                error: function(jqXHR, textStatus) {
                    console.log( "Request failed: " + textStatus );
                    alert("Ocurrio un error en el registro!");
                }
            });

        });


        $('#abrirModal').click(function() {
            console.log("Eliminando valores de ventada modal...");
            setDefaultValuesModalWindow();
        });

        $('#cargarExcel').click(function(){
            $('#cargarExcel').val('');
        });

        $('#generaReporte').click(function() {
            xepOnline.Formatter.Format('chart', {
                render:'download',
                srctype:'svg'
            });
        });

    });

    /*
    * Valores por defecto de ventana modal
    */
    function setDefaultValuesModalWindow() {
        // Formaularios
        $('#peso_promedio').val("0");
        $('#estado').val("Datos no ingresados");
        $('#observacion').val("");

        // Eliminado valores de la tabla
        table.fnDeleteRow();
    }

    /**
     * Mostrar reporte grafico de crecimiento
     */
    function showChart(data) {
        // Datos reales de control
        var arr = data['control'];
        var urlTableControl = '{{ asset('js/controlPonedoras.json') }}';

        // Leer archivo json con datos estadisticos de control de pesos
        $.getJSON(urlTableControl , function (tableControl) {
            var datachart = [];
            // Generar array con data para grafico de crecimiento
            arr.forEach(function(obj) {
                var index = obj['week'] - 1;
                console.log("TableControl:", tableControl[index]);
                datachart.push({
                    //semana: obj['date'],
                    semana: obj['week'],
                    peso_real: obj['average_weight'],
                    peso_min: tableControl[index].peso_min,
                    peso_max: tableControl[index].peso_max
                });
            });
            console.log("Chart Data: ", datachart);
            chart.setData(datachart);
        });

    }
    /**
     * Actualizar datos de control
     */
    function updateDataControl(data) {
        $('#semanaCrecimiento').text("Semana " + data['week']);
        $('#ultimaActualizacion').text(data['last_update']);

        $('#modalNumeroSemana').text("Control Semanal " + data['week']);
    }

    /**
     * Actualzacion de formularios cada vez que se carga un excel
     */
    function updateControlSemanal() {
        var prom = calcularPromedio( table.fnGetData() );

        $('#peso_promedio').val(prom);
        $.getJSON(
            '{{ asset('js/controlPonedoras.json') }}',
            function (data) {
                var semana = 0;
                var controlJSON = data[semana];
                var pesoMinimo = controlJSON['peso_min'];
                var pesoMaximo = controlJSON['peso_max'];

                if (prom >= pesoMinimo && prom <= pesoMaximo) {
                    $('#estado').val("El en rango ideal");
                }
                else if (prom < pesoMinimo) {
                    $('#estado').val("Debajo del peso ideal");
                }
                else if (prom > pesoMaximo) {
                    $('#estado').val("Por encima del peso ideal");
                }
            }
        );
    }

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

    // Delete dataTable
    $('#borrarDT').click( function() {
        table.fnDeleteRow();
        setDefaultValuesModalWindow();
    });

    /**
     * Convertir JSON
     * @param workbook
     * @returns object
     */
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
    /**
     * Convierte archivo excel en javascript
     * @param e
     */
    function handleFile(e) {
        table.fnDeleteRow();

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

                updateControlSemanal();
            };

            reader.readAsBinaryString(f);
        }
    }

</script>
@endsection