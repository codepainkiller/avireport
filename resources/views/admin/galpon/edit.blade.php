@extends('layout_admin')

@section('content')
<section class="content-header">
    <h1>
        Editar Galpón
        <small> </small>
        </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Granjas</a></li>
        <li><a href="#">Granja #</a></li>
        <li class="active">Editar {{ $galpon->code }}</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
		    {!! Form::model($galpon, ['route' => ['galpon.update', $galpon->id], 'method' => 'PUT']) !!}
			    <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nueva galpon</h3>
                    </div>
                    <div class="box-body with-border">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('code', 'Código') !!}
                                {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Cantidad de galpones', 'disabled' => 'true']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('number_birds', 'Numero de aves') !!}
                                {!! Form::input('number', 'number_birds', null, ['class' => 'form-control', 'placeholder' => 'Ingrese numero de aves']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('max_capacity', 'Capacidad máxima') !!}
                                {!! Form::input('number', 'max_capacity', null, ['class' => 'form-control', 'placeholder' => 'Ingrese valor']) !!}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                {!! Form::label('description', 'Descripción') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción', 'rows' => '8']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </div>
			    </div>
			{!! Form::close() !!}
		</div>
	</div>
</section>
@endsection