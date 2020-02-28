<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<dt id="<?php echo $letra?>"><?php echo $letra?></dt>
<?php foreach($items as $item):?>
<dd><a title="Letra de la cancion <?php echo $item->Titulo_cancion;?>" href="<?php echo site_url('albumes/'.$item->slugalbum.'/'.$item->slugcancion);?>"><?php echo $item->Titulo_cancion;?></a></dd>
<?php endforeach;?>