<!DOCTYPE html>
<!--
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
-->
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php if(isset($titulo)){echo $titulo;}?></title>

        <meta name="description" content="<?php if(isset($description)){echo $description;}?>" />
        <meta name="author" content="Ren&aacute;n Dar&iacute;o Gonzales Apaza" />
        <meta name="keywords" content="" />

        <!--fb-->
        <meta property="og:title" content="<?php if(isset($titulo)){echo $titulo;}?>" />
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="<?php echo current_url(); ?>" />
        <meta property="og:image" content="<?php if(isset($img)){echo $img;}?>" />
        <meta property="og:site_name" content="<?php if(isset($site_name)){echo $site_name;}?>" />
        <meta property="og:image:width" content="720"/>
        <meta property="og:image:height" content="405"/>
        
        <meta name="robots" content="index,follow"/>
        <meta name="googlebot" content="index, follow"/>
        
        <!--tw-->
        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:site" content="@academiagauss"/>
        <meta name="twitter:title" content="<?php if(isset($titulo)){echo $titulo;}?>"/>
        <meta name="twitter:description" content="<?php if(isset($description)){echo $description;}?>"/>
        <meta name="twitter:image" content="<?php if(isset($img)){echo $img;}?>"/>











        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>app/templates/soluciones2/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>app/templates/soluciones2/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>app/templates/soluciones2/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>app/templates/soluciones2/css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>app/templates/soluciones2/css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>app/templates/soluciones2/css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>app/templates/soluciones2/css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>app/templates/soluciones2/images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>app/templates/soluciones2/images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>app/templates/soluciones2/images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>app/templates/soluciones2/images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="<?php echo base_url()?>app/templates/soluciones2/images/ico/favicon.ico">
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="<?php echo base_url()?>app/templates/soluciones2/images/logo.png" width="120" height="40" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li class="active"><a href="#home">Inicio</a></li>
                            <li><a href="#service">Servicios</a></li>
                            <li><a href="#portfolio">Catalogo</a></li>
                            <li><a href="#about">Nosotros</a></li>
                            <li><a href="#clients">Clientes</a></li>
                            <li><a href="#providers">Proveedores</a></li>
                            <li><a href="#contact">Ubicanos</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>

        <!-- Start home section -->
        <div id="home">
            <?php

            if(isset($contenido)){
            echo $contenido;
            }

            ?>
        </div>





        <!-- End home section -->
        

        <!-- Contact section start -->
        <div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>UBICANOS</h1>
                        <p>Puedes encontrarnos en urb, lambramani A-15,al costado del estadio </p>
                    </div>
                </div>
                <div class="map-wrapper">
                    <div class="map-canvas" id="map-canvas">Cargando Mapa...</div>
                    <div class="container">
                       
                    </div>
                </div>
                <div class="container">
                    <div class="span9 center contact-info">
                        <p>Urbanizacion Lambramani A-15, al costado del estadio </p>
                        <p class="info-mail">sdpparts@somemail.com</p>
                        <p>+51 45 45 45</p>
                        <p>943 70 15 12</p>
                        <div class="title">
                            <h3>SDP SOLUCIONES DIESEL</h3>
                        </div>
                    </div>
                    <div class="row-fluid centered">
                        <ul class="social">
                            <li>
                                <a href="">
                                    <span class="icon-facebook-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-twitter-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-linkedin-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-pinterest-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-dribbble-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-gplus-circled"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact section edn -->
        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; Desarrollado por: <a href="http://www.devaqpgroup.com">DEVAQP</a>, <a href="http://devaqpgroup.com">Visitanos</a></p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="<?php echo base_url()?>app/templates/soluciones2/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>app/templates/soluciones2/js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>app/templates/soluciones2/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>app/templates/soluciones2/js/modernizr.custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>app/templates/soluciones2/js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>app/templates/soluciones2/js/jquery.cslider.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>app/templates/soluciones2/js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>app/templates/soluciones2/js/jquery.inview.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1AWOuARSiYX7cvIeZ2S8dh_dh3eSy0dA&amp;v=3.26&amp;callback=vueGoogleMapsInit" async="" defer=""></script>
        <script async="" defer="" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="<?php echo base_url()?>app/templates/soluciones2/js/app.js"></script>
    </body>
</html>