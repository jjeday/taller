<div id="wrapper">
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
            <?php if(isset($articulo))
                                {?>
				<h2 class="pageTitle"><?php echo $articulo->titulo;?></h2>
    
            <?php
                                }
                                
            ?>
			</div>
		</div>
	</div>
	</section>
    
    
    
	<section id="content">
	<div class="container">
					
					<div class="about">
					
						<div class="row"> 
							<div class="col-md-12">
								<div class="about-logo">
                                
                                <?php 
                                
                                if(isset($articulo))
                                {?>
                                <h3><?php echo $articulo->titulo;?></h3>
                                    <?php echo $articulo->contenido;?>
                                <?php
                                }
                                
                                ?>
								</div>
								
							</div>
                                             
                            
						</div>

					</div>
									
	</div>
	</section>
