@extends('layout_admin')

@section('content')
<section class="content-header">
    <h1>
        Crear Granja
        <small>it all starts here</small>
        </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Granja</a></li>
        <li class="active">Crear</li>
    </ol>
</section>
<section class="content">

	<div class="row">
		<div class="col-md-12">
		    {!! Form::open(['route' => 'granja.store', 'method' => 'POST']) !!}
			    <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nueva granja</h3>
                    </div>
                    <div class="box-body with-border">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre de Granja') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de granja']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('owner_name', 'Propietario') !!}
                                {!! Form::text('owner_name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de propietario']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('address', 'Dirección') !!}
                                {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Ingrese dirección']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('number_phone', 'Teléfono') !!}
                                {!! Form::text('number_phone', null, ['class' => 'form-control', 'placeholder' => 'Numero de teléfono']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <a class="btn btn-default" href="{{ url('granja') }}">Cancelar</a>
                        </div>
                    </div>
			    </div>
			{!! Form::close() !!}
		</div>
	</div>
</section>
@endsection