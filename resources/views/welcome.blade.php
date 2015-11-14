<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Avi Report</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('landing/font-awesome/css/font-awesome.min.css') }}" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('landing/css/animate.min.css')}}" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('landing/css/creative.css')}}" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- CSS Testimonios -->

    <link rel="stylesheet" href="{{asset('landing/css/animate.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('landing/css/main.css')}}" type="text/css">

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Avi Report</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#">Acerca de</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Empezar</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Características</a>
                    </li>
                    <!--<li>
                        <a class="page-scroll" href="#testimonio">Testimonios</a>
                    </li> -->
                    <li>
                        <a class="page-scroll" href="#portfolio">Imagenes</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="http://www.avireport.blogspot.com" target="_blank">Blog</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contacto</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Avi Report</h1>
                <hr>
                <p><h2>¡Visualiza la Mejor Decision para tu Trabajo!</h2></p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Para saber más</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Aplicacion de Gestion para Especialistas del Sector Avicola</h2>
                    <hr class="light">
                    <p class="text-faded">Reporte grafico del crecimiento de las aves de postura.</p>
                    <a href="{{ route('admin') }}" class="btn btn-default btn-xl">Prueba Ahora</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Caracteristicas</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-usd wow bounceIn text-primary"></i>
                        <h3>Planes a tu alcance</h3>
                        <p class="text-muted">Mensuales y anuales</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-life-saver wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Asesoria</h3>
                        <p class="text-muted">Las 24 horas</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-line-chart wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Reportes</h3>
                        <p class="text-muted">Disponibles en cualquier momento</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-thumbs-up wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Facil Manejo</h3>
                        <p class="text-muted">Realiza tu trabajo de manera simple</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ asset('landing/img/portfolio/1.jpg')}}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Por ti, Para ti
                                </div>
                                <div class="project-name">
                                    Nacimos bajo una IDEA: Dar lo mejor de nuestro talento para hacer que tu trabajo sea mas eficiente.
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ asset('landing/img/portfolio/2.jpg')}}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Reportes Dinamicos
                                </div>
                                <div class="project-name">
                                    Trabajar con AviReport, te permitira realizar tu trabajo de una manera muy dinamica.
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ asset('landing/img/portfolio/3.jpg')}}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Visualiza
                                </div>
                                <div class="project-name">
                                    Dale a tu trabajo un valor agregado. Tus clientes se sentiran mejor.
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ asset('landing/img/portfolio/4.jpg')}}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Pruebalo, es Gratis
                                </div>
                                <div class="project-name">
                                    Nuestra version gratuita siempre sera asi: gratis
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ asset('landing/img/portfolio/5.jpg')}}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Importa, Exporta
                                </div>
                                <div class="project-name">
                                    Importa tus datos desde Excel, exporta tus datos a PDF
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ asset('landing/img/portfolio/6.jpg')}}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Envia tus reportes a tus clientes
                                </div>
                                <div class="project-name">
                                    Envia los reportes de manera directa a tus clientes.
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Pongamonos en contacto</h2>
                    <hr class="primary">
                    <p> Llámenos o envíenos un correo electrónico y nos pondremos en contacto con usted tan pronto como sea posible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>(051) 949091456</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:idea.tru@gmail.com">idea.tru@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="{{ asset('landing/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('landing/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.fittext.js') }}"></script>
    <script src="{{ asset('landing/js/wow.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('landing/js/creative.js') }}"></script>

    <!-- JS Testimonios -->
    <script src="{{ asset('landing/js/main.js') }}"></script>
    <script src="{{ asset('landing/js/wow.js') }}"></script>
    <script src="{{ asset('landing/js/fancybox.js') }}"></script>
    <script src="{{ asset('landing/js/unslider.min.js') }}"></script>

    <!-- Zopim chat -->
    <script src="{{ asset('zopim.js') }}"></script>>

</body>

</html>