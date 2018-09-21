<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('welcome/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('welcome/assets/img/favicon.png')}}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Sena-Gestion</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="{{asset('welcome/assets/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('welcome/assets/css/gaia.css')}}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('welcome/assets/css/fonts/pe-icon-7-stroke.css')}}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
    <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
    <div class="container">
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a href="#" class="navbar-brand">
                Sena-Gestion
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right navbar-uppercase">

                <li class="dropdown">
                    <a href="#gaia" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-share-alt"></i> Compartir
                    </a>
                    <ul class="dropdown-menu dropdown-danger">
                        <li>
                            <a href="#"><i class="fa fa-facebook-square"></i> Facebook</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i> Instagram</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('login')}}" class="btn btn-danger btn-fill">Iniciar sesión</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>


<div class="section section-header">
    <div class="parallax filter filter-color-red">
        <div class="image"
             style="background-image: url('{{asset('welcome/assets/img/header-1.jpeg')}}')">
        </div>
        <div class="container">
            <div class="content">
                <div class="title-area">
                    <p>Sena Comm</p>
                    <h1 class="title-modern">Sena Gestion</h1>
                    <h3>Simplifique la gestión de sus documentos</h2>
                        <div class="separator line-separator">♦</div>
                </div>

                <div class="button-get-started">
                    <a href="{{route('login')}}" target="_blank" class="btn btn-white btn-fill btn-lg ">
                        Iniciar sesión
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="section">
    <div class="container">
        <div class="row">
            <div class="title-area">
                <h2>Nuestros servicios</h2>
                <div class="separator separator-danger">✻</div>
                <p class="description">Sena <Gestion></Gestion> es un Software Web con la que podrá manejar toda la documentación de su empresa de manera digital, consultando en cuestión de segundos cualquier expediente que necesite, sin importar el lugar donde se encuentre. .</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-graph1"></i>
                    </div>
                    <h3>Información en tiempo real</h3>
                    <p class="description">Sin pérdida de tiempo, ajustado a la realidad de mercado para que siempre estés adelante.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-note2"></i>
                    </div>
                    <h3>Para cualquier documento</h3>
                    <p class="description">Compatibilidad con diferentes plataformas de contenidos (Ms Office, PDF, imágenes, etc)</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-search"></i>
                    </div>
                    <h3>Flexibilidad</h3>
                    <p class="description">Clasificación de documentación a la medida de la organización y motor de búsquedas ágil y robusto</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section section-our-team-freebie">
    <div class="parallax filter filter-color-black">
        <div class="image" style="background-image:url('{{asset('welcome/assets/img/header-2.jpeg')}}')">
        </div>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="title-area">
                        <h2>Benefícios</h2>
                        <div class="separator separator-danger">✻</div>
                        <p class="description">Reduce el tiempo en la consulta de tus documentos e impulsa la productividad de tus equipos de trabajo.</p>
                    </div>
                </div>

                <div class="team">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-member">
                                        <div class="content">
                                            <div class="avatar avatar-danger">
                                                <img alt="..." class="img-circle" src="{{asset('welcome/assets/img/faces/chip.svg')}}"/>
                                            </div>
                                            <div class="description">
                                                <h3 class="title">Estandarización de procesos</h3>
                                                <p class="small-text">.</p>
                                                <p class="description">Una solución que tiene como base la sistematización de procesos, implementada en la organización por medio de una fuerte estandarización del equipo. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-member">
                                        <div class="content">
                                            <div class="avatar avatar-danger">
                                                <img alt="..." class="img-circle" src="{{asset('welcome/assets/img/faces/open-book.svg')}}"/>
                                            </div>
                                            <div class="description">
                                                <h3 class="title">Información Integrada, segura</h3>
                                                <p class="small-text">.</p>
                                                <p class="description">Toda la información de forma clara y ágil, beneficiando los tiempos de toma de decisión y finalización de procesos con toda la seguridad que le proporciona Sena Gestion.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-member">
                                        <div class="content">
                                            <div class="avatar avatar-danger">
                                                <img alt="..." class="img-circle" src="{{asset('welcome/assets/img/faces/computer.svg')}}"/>
                                            </div>
                                            <div class="description">
                                                <h3 class="title">Acceso a multiples plataformas</h3>
                                                <p class="small-text">.</p>
                                                <p class="description">Con un solo usuario se mantiene conectado en multiples devices y tiene acceso ilimitado a toda la información y los contenidos de Sena gestion. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section section-our-clients-freebie">
    <div class="container">
        <div class="title-area">
            <h5 class="subtitle text-gray">Here are some</h5>
            <h2>¿Por qué elegirnos?</h2>
            <div class="separator separator-danger">∎</div>
        </div>

        <ul class="nav nav-text" role="tablist">
            <li class="active">
                <a href="#testimonial1" role="tab" data-toggle="tab">
                    <div class="image-clients">
                        <img alt="..." class="img-circle" src="{{asset('welcome/assets/img/faces/saf.svg')}}"/>
                    </div>
                </a>
            </li>
            <li>
                <a href="#testimonial2" role="tab" data-toggle="tab">
                    <div class="image-clients">
                        <img alt="..." class="img-circle" src="{{asset('welcome/assets/img/faces/buscar.svg')}}"/>
                    </div>
                </a>
            </li>
            <li>
                <a href="#testimonial3" role="tab" data-toggle="tab">
                    <div class="image-clients">
                        <img alt="..." class="img-circle" src="{{asset('welcome/assets/img/faces/control.svg')}}"/>
                    </div>
                </a>
            </li>
        </ul>


        <div class="tab-content">
            <div class="tab-pane active" id="testimonial1">
                <p class="description">
                    Nuestro Software de Gestión Documental te permitirá manejar digitalmente todos los expedientes, archivos y demás contenidos de tu empresa. Así podrás automatizar los procesos de recepción, captura y distribución de documentos entre todas las sedes y funcionarios. Además, eliminarás las tediosas actividades manuales de búsqueda de documentos que normalmente absorben día a día el tiempo y la energía de tus equipos de trabajo. Ahora, todos en la empresa podrán centrarse en funciones que aumenten la productividad e impulsen la innovación
                </p>
            </div>
            <div class="tab-pane" id="testimonial2">
                <p class="description">
                    Nuestra búsqueda inteligente te permitirá entre millones de documentos encontrar en segundos el ejemplar que necesites. De igual forma, podrás filtrar por: Usuario que cargó el documento al sistema, Tipo o Serie documental al que pertenece el documento y/o fecha de creación del mismo. Adicionalmente, podrás indexar documentos con metadatos para hacer búsquedas específicas. Nuestra plataforma está en capacidad de ejecutar búsquedas con especificaciones cómo : “Hojas de Vida de Ingenieros Industriales, mujeres, con experiencia entre 2-3 años y escolaridad Magister”.
                </p>
            </div>
            <div class="tab-pane" id="testimonial3">
                <p class="description">
                    Maneja un estricto y detallado control de acceso a los documentos para que los usuarios sólo puedan acceder a la documentación que según las responsabilidades de su cargo pueden manipular. De la misma manera, se podrán definir permisos de sólo consulta, creación, modificación y/o eliminación por cada tipo de documento.Maneja de forma ordenada las Tablas de Retención y Cuadros de Clasificación Documental. Clasifica la documentación de tu empresa por tipos, departamentos y oficinas productoras.De esta manera tendrás de manera estructurada toda la información
                </p>
            </div>

        </div>

    </div>
</div>


<div class="section section-small section-get-started">
    <div class="parallax filter">
        <div class="image"
             style="background-image: url('{{asset('welcome/assets/img/office-1.jpeg')}}')">
        </div>
        <div class="container">
            <div class="title-area">
                <h2 class="text-white">¡Sigamos Conectados!</h2>
                <div class="separator line-separator">♦</div>
                <p class="description">No dude en contactarnos por cualquier consulta que se le presente. Nuestro equipo de expertos le responderá a la brevedad.</p>
            </div>

            <div class="button-get-started">
                <a href="#gaia" class="btn btn-danger btn-fill btn-lg">Contactenos</a>
            </div>
        </div>
    </div>
</div>


<footer class="footer footer-big footer-color-black" data-color="black">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="info">
                    <h5 class="title">Company</h5>
                    <nav>
                        <ul>
                            <li>
                                <a href="#">Sennova</a></li>
                            <li>
                                <a href="#">Sena</a>
                            </li>
                            <li>
                                <a href="#">Tecnoparque</a>
                            </li>
                            <li>
                                <a href="#">Sobre nosotros</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-1 col-sm-4">
                <div class="info">
                    <h5 class="title"> Ayuda y apoyo</h5>
                    <nav>
                        <ul>
                            <li>
                                <a href="#">Contáctenos</a>
                            </li>
                            <li>
                                <a href="#">Cómo funciona</a>
                            </li>
                            <li>
                                <a href="#">Términos y condiciones</a>
                            </li>
                            <li>
                                <a href="#">Política de la compañía</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1 col-sm-4">
                <div class="info">
                    <h5 class="title">Suguenos en:</h5>
                    <nav>
                        <ul>
                            <li>
                                <a href="#" class="btn btn-social btn-facebook btn-simple">
                                    <i class="fa fa-facebook-square"></i> Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-social btn-dribbble btn-simple">
                                    <i class="fa fa-dribbble"></i> Instagram
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-social btn-twitter btn-simple">
                                    <i class="fa fa-twitter"></i> Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-social btn-reddit btn-simple">
                                    <i class="fa fa-google-plus-square"></i> Google+
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <hr>
        <div class="copyright">
            © <script> document.write(new Date().getFullYear()) </script> Sena
        </div>
    </div>
</footer>

</body>

<!--   core js files    -->
<script src="{{asset('welcome/assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('welcome/assets/js/bootstrap.js')}}" type="text/javascript"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="{{asset('welcome/assets/js/modernizr.js')}}"></script>

<!--  script for google maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="{{asset('welcome/assets/js/gaia.js')}}"></script>

</html>
