<!-- Start cSlider -->
            <div id="da-slider" class="da-slider">
                <div class="triangle"></div>
                <!-- mask elemet use for masking background image -->
                <div class="mask"></div>
                <!-- All slides centred in container element -->
                <div class="container">
                    <?php 
                        if(isset($inicio))
                        {
                            foreach($inicio as $item){
                    ?>

                    <div class="da-slide">
                        <h2 class="fittext2"><?php echo strtoupper($item->titulo);?></h2>
                        <h4><?php echo strtoupper($item->etiqueta);?></h4>
                        <p><?php echo substr(strip_tags($item->contenido),0,100);?></p>
                        <a href="#" class="da-link button">VER MÁS</a>
                        <div class="da-img">
                            <img src="<?php echo base_url()?>uploads/<?php echo strtoupper($item->icon);?>" alt="image01" width="320">
                        </div>
                    </div>
                     
                    <?php
                            }
                        }
                    ?>
                    <!-- Start first slide -->
                    <div class="da-slide">
                        <h2 class="fittext2">Repuestos</h2>
                        <h4>Calidad & Confianza</h4>
                        <p>La calidad es una herramienta básica e importante para una propiedad inherente de cualquier cosa que permite 
                            que la misma sea comparada con cualquier otra de su misma especie. 
                            La palabra calidad tiene múltiples significados. De forma básica. </p>
                        <a href="#" class="da-link button">VER MÁS</a>
                        <div class="da-img">
                            <img src="<?php echo base_url()?>app/templates/soluciones2/images/moto1.png" alt="image01" width="720">
                        </div>
                    </div> 

                    <div class="da-slide">
                        <h2>Repuestos</h2>
                        <h4>Pasion</h4>
                        <p>Le damos un sentido especial a lo que hacemos, colocando entusiasmo y alegría en cada una de nuestras acciones. 
                            Estamos comprometidos con nuestro trabajo, nuestros compañeros y clientes.</p>
                        <a href="#" class="da-link button">VER MÁS</a>
                        <div class="da-img">
                            <img src="<?php echo base_url()?>app/templates/soluciones2/images/moto2.png" width="320" alt="image02">
                        </div>
                    </div>

                    <div class="da-slide">
                        <h2>AUTOPARTES</h2>
                        <h4>CONFIABLES</h4>
                        <p>Exportamos motos y motopartes desde Europa y en los ultima decada logramos posicionarnos en la elite
                            debido a nuestra confiabilidad transmitida a mas de 12 millones de clientes a lo largo de todo el mundo.
                        </p>
                        <a href="#" class="da-link button">VER MÁS</a>
                        <div class="da-img">
                            <img src="<?php echo base_url()?>app/templates/soluciones2/images/moto3.png" width="320" alt="image03">
                        </div>
                    </div-->

                    <!-- Start third slide -->
                    <!-- Start cSlide navigation arrows -->
                    <div class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </div>
                    <!-- End cSlide navigation arrows -->
                </div>
            </div>

            <!-- Service section start -->
        <div class="section primary-section" id="service">
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <h1>NUESTROS SERVICIOS</h1>
                    <!-- Section's title goes here -->
                    <p>Contamos con una amplia variedad de repuestos de Motos de 2 y 3 ruedas que facilitan al cliente 
                        tomar una mejor decisión de compra.</p>
                    <!--Simple description for section goes here. -->
                    
                </div>
                <div class="row-fluid">

                    <?php 
                        if(isset($servicios))
                        {
                            foreach($servicios as $item){
                    ?>
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="<?php echo base_url()?>uploads/<?php echo strtoupper($item->icon);?>" alt="<?php echo strtoupper($item->titulo);?>">
                            </div>
                            <h3><?php echo strtoupper($item->titulo);?></h3>
                            <p><?php echo substr(strip_tags($item->contenido),0,100);?></p>
                        </div>
                    </div>
                     
                    <?php
                            }
                        }
                    ?>

                    
                    
                </div>
            </div>
        </div>

        <!-- Service section end -->

        <!-- Portfolio section start -->
        <div class="section secondary-section " id="portfolio">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1>CATALOGO</h1>
                    <p>Encuentra la mayor variedad de respuestos para tu motocicleta. Además, podrás conocer las últimas novedades,
                     promociones y tips de nuestros colaboradores.</p>
                </div>
                <ul class="nav nav-pills">
                    <li class="filter" data-filter="all">
                        <a href="#noAction">TODOS</a>
                    </li>
                    <li class="filter" data-filter="web">
                        <a href="#noAction">SERIE</a>
                    </li>
                    <li class="filter" data-filter="photo">
                        <a href="#noAction">LARGOS</a>
                    </li>
                    <li class="filter" data-filter="identity">
                        <a href="#noAction">EMERGENCIA</a>
                    </li>
                </ul>
                <!-- Start details for portfolio project 1 -->
                <div id="single-project">

                    <?php 
                        if(isset($catalogo))
                        {
                            foreach($catalogo as $item){
                    ?>
                    
                    <div id="slidingDiv" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="<?php echo base_url()?>uploads/<?php echo strtoupper($item->icon);?>" alt="project 1" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3><?php echo strtoupper($item->titulo);?></h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Marca</span><?php echo strtoupper($item->marca);?></div>
                                    <div>
                                        <span>Medidas</span><?php echo strtoupper($item->medida);?></div>
                                    <div>
                                        <span>Colores</span><?php echo strtoupper($item->etiqueta);?></div>
                                    <div>
                                        <span>Pagina web</span>http://escaleras.com</div>
                                </div>
                                <p><?php echo substr(strip_tags($item->contenido),0,100);?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>
                    
                    <ul id="portfolio-grid" class="thumbnails row">

                        <?php 
                            if(isset($catalogo))
                            {
                                foreach($catalogo as $item){
                        ?>

                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="<?php echo base_url()?>uploads/<?php echo strtoupper($item->icon);?>" alt="project 1">
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3><?php echo strtoupper($item->titulo);?></h3>
                                <p>115 cm x 120 cm</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                         
                        <?php
                                }
                            }
                        ?>

                        <!--li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/Portfolio01.png" alt="project 1">
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Escalera Dinamica 36</h3>
                                <p>115 cm x 120 cm</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/Portfolio02.png" alt="project 2">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv1">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Escalera Dinamica 37</h3>
                                <p>135 cm x 120 cm.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/Portfolio03.png" alt="project 3">
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv2">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Escalera Morpho</h3>
                                <p>115 cm x 150 cm</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/Portfolio04.png" alt="project 4">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv3">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Escalera Oniro</h3>
                                <p>135 cm x 120 cm.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/Portfolio05.png" alt="project 5">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv4">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Escalera Auto</h3>
                                <p>115 cm x 150 cm</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/Portfolio06.png" alt="project 6">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv5">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Escalera Phenomena</h3>
                                <p>135 cm x 120 cm.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/Portfolio07.png" alt="project 7" />
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv6">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Escalera Plus</h3>
                                <p>155 cm x 160 cm.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/Portfolio08.png" alt="project 8">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv7">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Escalera EN</h3>
                                <p>135 cm x 120 cm.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/Portfolio09.png" alt="project 9">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv8">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Escalera Simmetria</h3>
                                <p>155 cm x 160 cm</p>
                                <div class="mask"></div>
                            </div>
                        </li-->
                    </ul>
                </div>
            </div>
        </div>
        <!-- Portfolio section end -->

        <!-- About us section start -->
        <div class="section primary-section" id="about">
            <div class="triangle"></div>
            <div class="container">
                <div class="title">
                    <h1>NOSOTROS</h1>
                    <p>Hace 21 años DERCO llegó al Perú y, a lo largo de este tiempo, ha logrado posicionarse como uno de los grupos
                         automotrices más importantes y con mayor potencial de desarrollo del país. Desde 1997 somos líderes en el sector
                          automotriz y maquinarias, y contamos con el respaldo de un sólido grupo económico con operaciones en Chile, 
                          Bolivia, Colombia y Perú.</p>
                </div>
                <div class="row-fluid team">

                    <?php 
                        if(isset($nosotros))
                        {
                            foreach($nosotros as $item){
                    ?>

                    <div class="span4" id="first-person">
                        <div class="thumbnail">
                            <img src="<?php echo base_url()?>uploads/<?php echo $item->image_head;?>" alt="team 1">
                            <h3><?php echo $item->etiqueta;?></h3>
                          
                            <div class="mask">
                                <h2><?php echo $item->titulo;?></h2>
                                <p><?php echo $item->contenido;?></p>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                            }
                        }
                    ?>

                    <!--div class="span4" id="first-person">
                        <div class="thumbnail">
                            <img src="<?php echo base_url()?>app/templates/soluciones2/images/Team1.png" alt="team 1">
                            <h3>Repuestos</h3>
                          
                            <div class="mask">
                                <h2>Repuestos Importados</h2>
                                <p>Junto a estas tres opciones, se entrega al Cliente un informe en el que se plasman al detalle los tres proyectos y se le recomienda contratar el que más se ajusta a sus necesidades. El informe incluye la siguiente información</p>
                            </div>
                        </div>
                    </div>

                    <div class="span4" id="second-person">
                        <div class="thumbnail">
                            <img src="<?php echo base_url()?>app/templates/soluciones2/images/Team2.png" alt="team 1">
                            <h3>Escaleras</h3>
                            
                            <div class="mask">
                                <h2>Disctribuidor autorizado SICOS</h2>
                                <p>Presupuestos: Una vez contrastados los productos en distintas Compañías, se seleccionan tres proyectos según establece la Ley de mediación 26/2006, en los que se recogen las mejores opciones.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4" id="third-person">
                        <div class="thumbnail">
                            <img src="<?php echo base_url()?>app/templates/soluciones2/images/Team3.png" alt="team 1">
                            <h3>Autopartes</h3>
                            
                            <div class="mask">
                                <h2>Toyota y Diesel</h2>
                                <p>Que estamos dotados de la autorización administrativa de la DGS para desempeñar la actividad como Correduría.</p>
                            </div>
                        </div>
                    </div-->
                </div>

                <div class="about-text centered">
                    <h3>Sobre nuestro servicio</h3>
                    <p>Nuestro compromiso de calidad va dirigido a obtener la satisfacción total de nuestros clientes.
                         En Derco, nos comprometemos a cumplir con los compromisos adquiridos durante la venta de unidades,
                          repuestos y servicio técnico de los rubros en los que participamos. Orientamos nuestra gestión hacia
                           la mejora continua de los procesos y el desarrollo integral de nuestros colaboradores.</p>
                </div>
              
            </div>
        </div>
        <!-- About us section end -->
        <div class="section secondary-section">
            <div class="triangle"></div>
            <div class="container centered">
                <p class="large-text">En Derco hacemos que la vida avance</p>
                <a href="#" class="button">CONTACTANOS YA</a>
            </div>
        </div>
        <!-- Client section start -->
        <!-- Client section start -->
        <div id="clients">
            <div class="section primary-section">
                <div class="triangle"></div>
                <div class="container">
                    <div class="title">
                        <h1>¿Que dicen Nuestros Clientes?</h1>
                        <p>Nuestros clientes satisfechos con nuestros repuestas y escaleras</p>
                    </div>
                    <div class="row">
                        <?php 
                            if(isset($client))
                            {
                                foreach($client as $item){
                        ?>

                        <div class="span4">
                            <div class="testimonial">
                                <p>"<?php echo $item->comment;?>"</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="<?php echo base_url()?>uploads/<?php echo $item->image;?>" class="centered" alt="client 1">
                                    <strong><?php echo $item->name;?> 
                                        <small><?php echo $item->company;?></small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                                }
                            }
                        ?>

                        <!--div class="span4">
                            <div class="testimonial">
                                <p>"Ha sido de mucha utilidad, la calidad es excelente lo recomiendo completamente"</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="<?php echo base_url()?>app/templates/soluciones2/images/Client1.png" class="centered" alt="client 1">
                                    <strong>Juan Quispe 
                                        <small>Yura</small>
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="testimonial">
                                <p>"Escuchamos tus inquietudes y estudiamos tus necesidades. Esto nos permitirá elaborar un estudio totalmente pormenorizado y a medida."</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="<?php echo base_url()?>app/templates/soluciones2/images/Client2.png" class="centered" alt="client 2">
                                    <strong>Carlos Mamani
                                        <small>Toyota</small>
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="testimonial">
                                <p>"Compañías: una vez elaborado este estudio, nos dirigimos a las Compañías con las que trabajamos para buscarte el producto que se adecua a tus necesidades y las coberturas específicas."</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="<?php echo base_url()?>app/templates/soluciones2/images/Client3.png" class="centered" alt="client 3">
                                    <strong>Edilberto Rodriguez
                                        <small>Michelin</small>
                                    </strong>
                                </div>
                            </div>
                        </div-->
                    </div>
                    <p class="testimonial-text">
                        "La perfección y la excelencia es nuestro lema, para nuestro servicio"
                    </p>
                </div>
            </div>
        </div>
        
        <div id="providers" class="section third-section">
            <div class="container centered">
                <div class="sub-section">
                    <div class="title clearfix">
                        <div class="pull-left">
                            <h3>Nuestros Proveedores</h3>
                        </div>
                        <ul class="client-nav pull-right">
                            <li id="client-prev"></li>
                            <li id="client-next"></li>
                        </ul>
                    </div>
                    <ul class="row client-slider" id="clint-slider">
                        <?php 
                            if(isset($proveedores))
                            {
                                foreach($proveedores as $item){
                        ?>

                        <li>
                            <a href="">
                                <img src="<?php echo base_url()?>uploads/<?php echo $item->image_head;?>" alt="client logo 1">
                            </a>
                        </li>
                        
                        <?php
                                }
                            }
                        ?>

                        <!--li>
                            <a href="">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/clients/ClientLogo01.png" alt="client logo 1">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/clients/ClientLogo02.png" alt="client logo 2">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/clients/ClientLogo03.png" alt="client logo 3">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/clients/ClientLogo04.png" alt="client logo 4">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/clients/ClientLogo05.png" alt="client logo 5">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/clients/ClientLogo02.png" alt="client logo 6">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="<?php echo base_url()?>app/templates/soluciones2/images/clients/ClientLogo04.png" alt="client logo 7">
                            </a>
                        </li-->
                    </ul>
                </div>
            </div>
        </div>



            







            





