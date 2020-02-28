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
							<div class="col-md-9">
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
                            
                            <div class="col-md-3">
                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.10";
                              fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                            <div class="fb-page" data-href="https://www.facebook.com/EstudianteGauss/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/EstudianteGauss/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/EstudianteGauss/">Academia Gauss</a></blockquote></div>
								                        
                        <h3>Art&iacute;culos recientes</h3>
                        <ul class="list2">
                        
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

					</div>
									
				</div>
	</section>
