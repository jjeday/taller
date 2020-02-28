<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h2>Resultado</h2>
      <form action="<?php echo site_url('busqueda');?>" method="post" name="search"
 onsubmit="return validateForm()"> <input id="entryfield"
 name="busqueda" value="<?php echo $cadena;?>" size="25" maxlength="40" type="text"> <input
 value="Encontrar!" type="submit"/>
        <p><label for="entryfield">Puede buscar por el t&iacute;tulo o letra de la cancion.</label></p>
      </form>
<table width="100%">
  <tbody>
    <?php foreach($canciones as $item):?>
      <tr>
      <td>
      <img width="300px" height="200px" src="<?php echo base_url("index.php/imagenes/".url_title($item['slugalbum'])."")?>.jpg" Longdesc="Este &aacute;lbum se realiz&oacute; en <?php echo $item['Anio_album']?>. Su autor fue <?php echo $item['Nombre_artista']?>" title="Caratula del disco <?php echo $item['Titulo_album']?>" alt="Letra de la canci&oacute;n <?php echo $item['Titulo_cancion']?>" />
      </td>
      <td>
      
      <h3><a title="Letra de la cancion <?php echo $item['Titulo_cancion'];?>" href="<?php echo site_url('albumes/'.$item['slugalbum'].'/'.$item['slugcancion']);?>"><?php echo $item['Titulo_cancion'];?></a>
      </h3>
      &Aacute;lbum: <a title="<?php echo $item['Titulo_album'];?>" href="<?php echo site_url('albumes/'.$item['slugalbum']);?>" title="<?php echo $item['Titulo_album'];?>"><?php echo $item['Titulo_album'];?></a>
      <?php echo $item['Anio_album'];?>
      <br />
      <p><?php echo str_replace("\r\n", ' ',substr($item['Letra_cancion'], 0, 300));?></p>

      </td></tr>
      <?php endforeach; ?>
    
  </tbody>
</table>