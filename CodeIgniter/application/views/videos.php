<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="principal" style="text-align: center;">
	<h3>&Uacute;ltimos videos</h3>
    
<?php foreach($items as $item):?>

<li>
<a target="_blank" title="Video de <?php echo $item->titulo;?>" href="https://www.youtube.com/watch?v=<?php echo $item->codigo;?>"><img width="170px" height="140px" src="//i.ytimg.com/vi/<?php echo $item->codigo;?>/hqdefault.jpg" border="0" alt=""/><br /><?php echo $item->titulo;?></a></li>


    <?php endforeach;?>
    
    </ul>
    </div>
    