<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<table width="85%">
  <tbody>
    <tr>
      <td>
      <h2>Orden alfab&eacute;tico</h2>
      </td>
      <td>
      <h2>Orden Cronol&oacute;gico</h2>
      </td>
    </tr>
    <tr>
      <td>
      <ul>
        <?php foreach($albums_alfa as $item):?>
        <li><a title="<?php echo $item->Titulo_album;?>" href="<?php echo site_url('albumes/'.$item->slug);?>" title="<?php echo $item->Titulo_album;?>"><?php echo $item->Titulo_album;?></a></li>
        <?php endforeach;?>
      </ul>
      <ul>
      </ul>
      </td>
      <td>
      <ul>
<?php foreach($albums_anio as $item):?>
        <li><a title="<?php echo $item->Titulo_album;?>" href="<?php echo site_url('albumes/'.$item->slug);?>">(<?php echo $item->Anio_album;?>) <?php echo $item->Titulo_album;?></a></li>
        <?php endforeach;?>
      </ul>
      </td>
    </tr>
  </tbody>
</table>


</dl>

