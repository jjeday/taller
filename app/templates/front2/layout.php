<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php if(isset($titulo)){echo $titulo;}?></title>
		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=5, minimum-scale=1" />
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
    
        
    

		<!-- css -->
		<link href="<?php echo base_url()?>app/templates/front2/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>app/templates/front2/css/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="<?php echo base_url()?>app/templates/front2/css/jcarousel.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>app/templates/front2/css/flexslider.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>app/templates/front2/js/owl-carousel/assets/owl.carousel.css" rel="stylesheet">
		<link href="<?php echo base_url()?>app/templates/front2/css/style.css" rel="stylesheet" />

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	</head>
	<body>
		<div id="wrapper" class="home-page">
			<!-- start header -->
			<header>
				<div class="navbar navbar-default navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo site_url(); ?>">
								<img height="65px" width="185px" src="<?php echo base_url()?>app/images/logo.png" alt="logo"/>
							</a>
						</div>
						<div class="navbar-collapse collapse ">
							<ul class="nav navbar-nav">
								<li class=""><a href="<?php echo site_url(); ?>">INICIO</a></li>
								<li><a href="<?php echo site_url('blog'); ?>">BLOG</a></li>
								<li><a href="<?php echo site_url('cursos'); ?>">CURSOS</a></li>
                                <li><a href="<?php echo site_url('blog/tutoriales'); ?>">TUTORIALES</a></li>
								<li><a href="<?php echo site_url('nosotros'); ?>">NOSOTROS</a></li>
								<li><a href="<?php echo site_url(); ?>?class=FormContacto">CONTACTO</a></li>
								<!--<li><a href="contact.html"><i class="fa fa-shopping-cart"></a></i></li>-->
							</ul>
						</div>
					</div>
				</div>

				<div class="top-bar top-bar-right">
					<div class="container">
						<div class="row" style="margin-bottom: 0px;">
							<div class="col-md-12">
								<aside>
									<ul class="top-bar-info">
										<li><a href="mailto:cienciaspuras.gauss@gmail.com"><i class="fa fa-plane"></i> cienciaspuras.gauss@gmail.com</a></li>
										<li><i class="fa fa-whatsapp">WS:</i>966 700 350   <i class="fa fa-clock-o"></i> LUNES - DOMINGO</li>
									</ul>
								</aside>
							</div>
						</div>
					</div>
				</div>


			</header>
			<!-- end header -->


			<?php

			if(isset($contenido)){
			echo $contenido;
			}

			?>

			<footer>
				<div class="container">
					<div class="row">
						<div class="col-lg-3">
							<div class="widget">
								<h5 class="widgetheading">UBICANOS</h5>
								<address>
									AV. INDEPENDENCIA <br />
									472 SEGUNDO PISO <br />
									FRENTE A LA UNSA</address>
								<p>
									<i class="icon-phone"></i> 054 61 44 32 <br>
									<i class="icon-phone"></i> Cel. 966 700 350 <br>
									<i class="icon-envelope-alt"></i> cienciaspuras.gauss@gmail.com
								</p>

							</div>
						</div>
						<div class="col-lg-3">
							<div class="widget">
								<div id="fb-root"></div>
								<script>(function(d, s, id)
										{
											var js, fjs = d.getElementsByTagName(s)[0];
											if (d.getElementById(id)) return;
											js = d.createElement(s); js.id = id;
											js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.10";
											fjs.parentNode.insertBefore(js, fjs);
										}(document, 'script', 'facebook-jssdk'));</script>
								<div class="fb-page" data-href="https://www.facebook.com/EstudianteGauss/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/EstudianteGauss/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/EstudianteGauss/">Academia Gauss</a></blockquote></div>
							
							</div>
						</div>
						<div class="col-lg-3">
							<div class="widget">
								<h5 class="widgetheading">ULTIMOS ART&Iacute;CULOS</h5>
								<ul class="link-list">
									<?php
									if(isset($recent))
									{
									foreach($recent as $item){
									echo '<li><a href="'.site_url('blog/').strtolower($item->categoria_denominacion.'/'.$item->slug).'">'.$item->titulo.'</a></li>';
									}
									}
									?>

								</ul>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="widget">
								<h5 class="widgetheading">HORARIO DE ATENCI&Oacute;N</h5>
								<ul class="link-list">
									<li>LUNES: 7:30 AM - 8:00PM</li>
									<li>MARTES: 7:30 AM - 8:00PM</li>
									<li>MIERCOLES: 7:30 AM - 8:00PM</li>
									<li>JUEVES: 7:30 AM - 8:00PM</li>
									<li>VIERNES: 7:30 AM - 8:00PM</li>
									<li>SABADO: 8:00 AM - 4:00PM</li>
									<li>DOMINDO: 8:00 AM - 4:00PM</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div id="sub-footer">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="copyright">
									<p>
										<span>&copy; Asociaci&oacute;n de ciencias puras Gauss</span>
										|
										<a href="http://webthemez.com" target="_blank">WebThemez</a>
										<span>&copy;</span><a href="http://webthemez.com" target="_blank">WebThemez</a>
									</p>
								</div>
							</div>
							<div class="col-lg-6">
								<ul class="social-network">
									<li><a href="https://www.facebook.com/EstudianteGauss/" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
		<!-- javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="<?php echo base_url()?>app/templates/front2/js/jquery.js"></script>
		<script src="<?php echo base_url()?>app/templates/front2/js/jquery.easing.1.3.js"></script>
		<script src="<?php echo base_url()?>app/templates/front2/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>app/templates/front2/js/jquery.fancybox.pack.js"></script>
		<script src="<?php echo base_url()?>app/templates/front2/js/jquery.fancybox-media.js"></script>
		<script src="<?php echo base_url()?>app/templates/front2/js/portfolio/jquery.quicksand.js"></script>
		<script src="<?php echo base_url()?>app/templates/front2/js/portfolio/setting.js"></script>
		<script src="<?php echo base_url()?>app/templates/front2/js/jquery.flexslider.js"></script>
		<script src="<?php echo base_url()?>app/templates/front2/js/animate.js"></script>
		<script src="<?php echo base_url()?>app/templates/front2/js/custom.js"></script>
		<script src="<?php echo base_url()?>app/templates/front2/js/owl-carousel/owl.carousel.js"></script>
	</body>
</html>