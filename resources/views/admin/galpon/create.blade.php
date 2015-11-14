@extends('layout_admin')

@section('content')
<section class="content-header">
    <h1>
        Crear Galpón
        <small>it all starts here</small>
        </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
		    {!! Form::open(['route' => 'galpon.store', 'method' => 'POST']) !!}
			    <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nueva galpon</h3>
                    </div>
                    <div class="box-body with-border">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('num_galpones', 'Numero de galpones') !!}
                                {!! Form::text('num_galpones', null, ['class' => 'form-control', 'placeholder' => 'Cantidad de galpones']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('number_birds', 'Numero de aves') !!}
                                {!! Form::text('number_birds', null, ['class' => 'form-control', 'placeholder' => '150']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('description', 'Descripcion') !!}
                                {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Crear galpones</button>
                        </div>
                    </div>
			    </div>
			{!! Form::close() !!}
		</div>
	</div>
</section>
@endsection