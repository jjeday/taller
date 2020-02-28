<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="<?php echo base_url()?>app/templates/front2/img/slides/1.jpg" alt="" />
                <div class="flex-caption container">
                    <h3>QUE ES LO MEJOR PARA TI</h3> 
					<p>Acabar tu carrera a tiempo. Tenemos el orgullo de ense&ntilde;ar <br />a nuestros estudiantes</p> 
					<a href="<?php echo site_url('cursos'); ?>" class="btn btn-theme">Ver los cursos</a>
                </div>
              </li>
              <li>
                <img src="<?php echo base_url()?>app/templates/front2/img/slides/2.jpg" alt="" />
                <div class="flex-caption container">
                    <h3>PREPARACI&Oacute;N PARA INGRESAR A LA UNIVERSIDAD</h3> 
					<p>
                    
                    En los cursos te proporcionaremos t&eacute;cnicas y m&eacute;todos que favorezcan tus habilidades 
                   <br/> y aptitudes para tener un mejor desempe&ntilde;o en tu ex&aacute;men de admisi&oacute;n.
                   
                    </p> 
					<a href="<?php echo site_url('cursos'); ?>" class="btn btn-theme">Ver los cursos</a>
                </div>
              </li>
              <li>
                <img src="<?php echo base_url()?>app/templates/front2/img/slides/1.jpg" alt="" />
                <div class="flex-caption container">
                    <h3>REFORZAMIENTO ACAD&Eacute;MICO</h3> 
					<p>Dirigido a alumnos de secundaria. Contamos con un grupo de docentes <br />
                    que te dar&aacute;n una ense&ntilde;anza perzonalizada.</p> 
					<a href="<?php echo site_url('cursos'); ?>" class="btn btn-theme">Ver los cursos</a>
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
    
    
	</section>
    
    
    <!--
    		<section class="aboutUs">
	<div class="container">

        
        <div class="row">
  <div class="col-lg-2">
    <div style="font-weight: bold; font-size: 27px;">TU TEMA</div>
  </div>
  <div class="col-lg-10">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
  </div>
</div>
	
	</div>
	</section> -->
    
    

    
    
    
    <section class="txt-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="aligncenter"><h1 class="aligncenter">NUESTROS CURSOS</h1>
                Los mejores cursos que ofrecemos
                </div>
				
			</div>
		</div>
	</div>
	</section>
	
	
	<section id="content">
	

	<div class="container">
		<div class="row">
                <div class="features">
                    
                    <?php 
                        if(isset($courses))
                        {
                            foreach($courses as $item){
                    ?>
                                
                                
                    <div class="col-md-4 col-sm-6 wow fadeInUp animated" data-wow-duration="300ms" data-wow-delay="0ms" style="visibility: visible; -webkit-animation-duration: 300ms; -webkit-animation-delay: 0ms;">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-bullseye"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a style="text-decoration: none;" href="<?php echo site_url('cursos/').$item->slug?>"><?php echo strtoupper($item->titulo);?></a></h4>
                                <p><?php echo substr(strip_tags($item->contenido),0,100);?></p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->            
                                
                                
                    <?php
                            }
                        }
                    ?>
                        
                    
                </div>
            </div>	 
	 

	</div>
	</section>
	
		<section class="aboutUs">
	<div class="container">

		<div class="row">
							<div class="col-md-10">
								<h2>TOMA EL PRIMER PASO PARA APRENDER CON NOSOTROS</h2>
								
                                <p>
                                
                                Hemos dise&ntilde;ado y clasificado los cursos adecuadamente para todos los niveles, 
                                asegurando maximizar la capacidad del estudiante. 
                                Usted encontrar&aacute; muchas cosas interesantes en el curso. 
                                Comencemos a descubrir ahora mismo!
                                
                                </p>
                                
        
                                <div class="space"></div>
							</div>
							<div class="col-md-2">
								<p>
                                
                                <br /><br />
                                <a href="<?php echo site_url('cursos'); ?>" class="btn btn-theme">VER LOS CURSOS</a>
                                </p>
								
                                
							</div>
						</div>
	
	</div>
	</section>
    
    
    
    
	<section id='events'>
	<div class="container">
	<div class="row">
			<div class="col-md-12">
				<div class="aligncenter"><h2 class="aligncenter">NUESTROS TUTORIALES</h2>
                
                Lee nuestros tutoriales y no te quedes sin saber nada. 
                Queremos que lo aprendas y saques el m&aacute;ximo provecho a tu curso de inter&eacute;s. 
                Adem&aacute;s te ense&ntilde;aremos a resolver ejercicios modelo y algunos trucos poco conocidos.
                
                </div><br>
			</div>
		</div>
	<div class="row">
    
    
                        <?php 
                        if(isset($tutoriales))
                        {
                            foreach($tutoriales as $item){
                                
                        ?>
                                
                           <div class="col-md-4">
                            <div class="post3">
                            <span class="overlay-img">
                            </span>
                                <a style="text-decoration: none;" href="<?php echo site_url('blog/').strtolower($item->categoria_denominacion.'/'.$item->slug);?>">
                                <img alt="<?php echo $item->titulo;?>" src="<?php echo base_url()?>uploads/<?php echo $item->icon;?>" />
                                
                                    <h3><?php echo strtoupper($item->titulo);?></h3>
                                </a>
                                
                                <p><?php echo substr(strip_tags($item->contenido),0,100);?></p>
                                
                            </div>
                           </div>
                                
                    <?php
                            }
                        }
                    ?>
    
            </div>
	</div>
	</section>
