<div id="wrapper">
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
            <?php if(isset($titulo))
                                {?>
				<h2 class="pageTitle"><?php echo $titulo;?></h2>
    
            <?php
                                }
                                
            ?>
			</div>
		</div>
	</div>
	</section>
    
    
    
	<section id="content">
	<div class="container">
	<div class="row">
    
    
                        <?php 
                        if(isset($entradas))
                        {
                            foreach($entradas as $item){
                                
                        ?>
                                
                           <div class="col-md-4">
                            <div class="post3">
                                <a style="text-decoration: none;" href="<?php echo site_url('/cursos/').strtolower($item->slug);?>">
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

