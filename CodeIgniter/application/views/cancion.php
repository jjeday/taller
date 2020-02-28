<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php foreach($items as $item):?>
<li><a title="Letra de la cancion <?php echo $item->Titulo_cancion;?>" href="<?php echo site_url('albumes/'.$item->slugalbum.'/'.$item->slugcancion);?>"><?php echo $item->Titulo_cancion;?></a></li>
<?php endforeach;?>