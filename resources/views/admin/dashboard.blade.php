@extends('layout_admin')

@section('content')
<section class="content-header">
    <h1>
        Dashboard
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $info['numGranjas'] }}</h3>

                    <p>Granjas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $info['numGalpons'] }}<sup style="font-size: 20px">%</sup></h3>

                    <p>Galpones</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!--
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>

                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Más Información<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        -->
        <!-- ./col -->
        <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $info['numControls'] }}</h3>

                    <p>Controles</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid animi blanditiis delectus deserunt error et ex expedita fuga minima molestias placeat quo ratione recusandae, repellat saepe soluta voluptas voluptate voluptates voluptatibus! A adipisci aliquam aspernatur, culpa ex exercitationem labore magnam, magni mollitia perferendis qui similique suscipit. Est exercitationem facilis molestiae nemo pariatur praesentium sequi!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni neque nisi officiis omnis rerum sequi. Ad cumque nisi quod!</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores commodi ducimus in molestias natus odit praesentium ullam unde. Beatae cumque earum eius eligendi est, nihil numquam quas repellendus sequi totam.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi ex optio quos ut vitae. Ad aliquam ducimus, error eveniet excepturi harum iure molestiae praesentium, quae quibusdam rem repellat repudiandae similique. Ab adipisci aliquam aperiam autem debitis eaque hic laudantium maiores omnis unde? Autem inventore ipsum necessitatibus obcaecati quos, saepe voluptatum?</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css-content')
<!-- CSS -->
@endsection


@section('js-content')
<!-- JS -->
@endsection
