@extends('layout_admin')

@section('content')
<section class="content-header">
    <h1>Granjas</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Granjas</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('granja.create') }}" class="btn btn-warning btn-block margin-bottom">Nueva Granja</a>
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Categorias</h3>
                </div>
                <div class="box-body no-padding">
                    <div class="nav nav-pills nav-stacked">
                        <li  class="">
                            <a href="#">
                                <i class="fa fa-server"></i> Todas
                                <span class="label label-default pull-right">{{ sizeof($granjas) }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle text-orange"></i> Gallinas Ponedoras
                                <span class="label label-default pull-right">{{ sizeof($granjas) }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle text-green"></i> Pollos
                                <span class="label label-default pull-right">0</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-trash text-red"></i> Eliminados
                                <span class="label label-default pull-right">0</span>
                            </a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Todas</h3>
                    <div class="box-tools pull-right">
                        <div class="has-feedback">
                            <input type="text" class="form-control input-sm" placeholder="Buscar Granja">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Propietario</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach($granjas as $index => $granja)
                                <tr data-id="{{ $granja->id  }}">
                                    <td> {{ $granja->id }} </td>
                                    <td><a href="{{ route('granja.show', $granja->id) }}"> {!! $granja->name !!} </a>  </td>
                                    <td> {!! $granja->owner_name !!} </td>
                                    <td> {!! $granja->number_phone !!} </td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ route('granja.show', $granja->id) }}">Ingresar</a>
                                        <a class="btn btn-xs btn-info" href="{{ route('granja.edit', $granja->id) }}">Editar</a>
                                        <a class="btn btn-xs btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

{!! Form::open(['route' => ['granja.destroy', ':GRANJA_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}

@endsection

@section('js-content')
<script src="{{ asset('plugins/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {

    $('.btn-danger').click(function() {

        if (!confirm('¿Esta seguro de eliminar la granja seleccionada?'))
        {
            return;
        }

        var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-delete');
        var url = form.attr('action').replace(':GRANJA_ID', id);
        var data = form.serialize();

        $.post(url, data, function(response) {
            $.notify({
                title: "<b>Mensaje de AviReport:</b> </br> ",
                message: response.message

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
                message: "No se pudo eliminar la granja seleccionada"

            }, {
                type: 'info',
                placement: {
                    from: "bottom",
                    align: "right"
                }
            });
        });
    });
});
</script>
@endsection