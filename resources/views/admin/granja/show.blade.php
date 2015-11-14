@extends('layout_admin')

@section('content')
<section class="content-header">
    <h1>
        Granja {{ $granja->name }}
        </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('granja.index') }}"><i class="fa fa-home"></i> Granjas</a></li>
        <li class="active"> {{ $granja->name }}</li>
    </ol>
</section>
<section class="content">
    <div class="row">


	    <div class="col-md-3">
	        <button id="add_galpon" class="btn btn-warning btn-block margin-bottom">Crear Galpones</button>
	        <div class="box box-default">
	            <div class="box-header with-border">
	                <h3 class="box-title">Información</h3>
	                <div class="box-tools pull-right">
	                    <a href="{{ route('granja.edit', $granja->id) }}" class="btn btn-box-tool"><i class="fa fa-edit fa-2x"></i></a>
	                </div>
	            </div>
	            <div class="box-body">
	                <ul class="list-group">
	                    <li class="list-group-item"> <b>Nombre Granja: </b> <br/>{!! $granja->name !!} </li>
	                    <li class="list-group-item"> <b>Propietario:</b> <br/>{!! $granja->owner_name !!}</li>
	                    <li class="list-group-item"> <b>Teléfono:</b> <br/>{!! $granja->number_phone !!}</li>
	                    <li class="list-group-item"> <b>Dirección:</b> <br/>{!! $granja->address !!}</li>
	                    <li class="list-group-item"> <b>Numero de galpones:</b> <br/>{!! count($galpones) !!}</li>
	                </ul>
	            </div>
	        </div>
	    </div>
	    <div class="col-md-9">
	        <div class="row hidden" id="form_galpon">
                <div class="col-md-12">
                    <div class="box box-default">
                        <div class="box-body">
                            {!! Form::open(['route' => 'galpon.store', 'method' => 'POST']) !!}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="number_birds">Cantida de aves</label>
                                        <input name="number_birds" type="number" class="form-control" placeholder="0" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="num_galpones">Numero de galpones</label>
                                        <input name="num_galpones" type="number" class="form-control" value="1" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="week">Semana actual de crecimiento</label>
                                        <select name="week" class="form-control" id="week">
                                            @for($i = 1; $i <= 90; $i++)
                                                <option>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="description">Descripción</label>
                                        <textarea name="description" rows="9" class="form-control" placeholder="Ejm: Gallinas ponedoras" required></textarea>
                                    </div>
                                    <input type="hidden" name="granja_id" value="{!! $granja->id !!}" />
                                    <button id="cancelar" class="btn btn-default pull-right">Cancelar</button>
                                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
	        </div>
	        <div class="box box-default">
	            <div class="box-header with-border">
	                <h3 class="box-title">Galpones</h3>
	            </div>
	            <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Numero de aves</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach($galpones as $index => $galpon)
                            <tr data-id="{{ $galpon->id }}">
                                <td> {!! $index + 1 !!}</td>
                                <td> <a href="{{ route('galpon.show', $galpon->id) }}">{!! $galpon->code !!}</a></td>
                                <td> {!! $galpon->number_birds !!}</td>
                                <td> {!! $galpon->description !!}</td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('galpon.edit', $galpon->id) }}">Editar</a>
                                    <a class="btn btn-xs btn-danger">Eliminar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
	            </div>
	        </div>
        </div>
        <!-- /.end -->
    </div>
</section>

{!! Form::open(['route' => ['galpon.destroy', ':GALPON_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}

@endsection

@section('css-content')

@endsection

@section('js-content')

<script src="{{ asset('plugins/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function () {

    $('.btn-danger').click(function (e) {

        if (!confirm('Esta seguro de eliminar el galpon seleccionado?'))
        {
            return;
        }

        var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-delete');
        var url = form.attr('action').replace(':GALPON_ID', id);
        var data = form.serialize();

        $.post(url, data, function(result) {
            $.notify({
                title: "<b>Mensaje de AviReport:</b> </br> ",
                message: result.message

            }, {
                type: 'warning',
                placement: {
                    from: "bottom",
                    align: "right"
                }
            });

            row.fadeOut();

        }).fail(function() {
            $.notify({
                title: "Error </br>",
                message: "No se pudo eliminar el galpon seleccionado"

            }, {
                type: 'info',
                placement: {
                    from: "bottom",
                    align: "right"
                }
            });
        });

    });

    $('#add_galpon').click(function() {
        $('#form_galpon').removeClass('hidden');
    });

    $('#cancelar').click(function() {
        $('#form_galpon').addClass('hidden');
    });
});
</script>
@endsection