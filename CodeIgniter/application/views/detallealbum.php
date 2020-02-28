<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<img width="300px" height="200px" src="<?php echo base_url("index.php/imagenes/".url_title($album->slug)."")?>.jpg" Longdesc="Este album se realizó en 1970. Su autor fue salvatore adamo" title="Caratula del disco <?php echo $album->Titulo_album?>" alt="Lista de canciones del disco <?php echo $album->Titulo_album?>" style="float:right">

<ol>
<?php foreach($canciones as $item):?>
        <li><a title="Letra de la cancion <?php echo $item->Titulo_cancion;?>" href="<?php echo site_url('albumes/'.$item->slugalbum.'/'.$item->slugcancion);?>"><?php echo $item->Titulo_cancion;?></a></li>
        <?php endforeach;?>
</ol>
</dl>

<em>&Eacute;ste &aacute;lbum fue editado en <?php echo $anio;?>. <?php echo $autor;?>
 </em>

<br>
<hr />

<?php if(isset($cancion)){    
    echo "<h3>$cancion->Titulo_cancion</h3>";
    echo  nl2br($cancion->Letra_cancion);
    echo '<br><hr>';
    echo '<iframe style="border: 0px;" width="0px" height="0px" src="'.base_url("index.php/c/".url_title($cancion->idCanciones)).'"></iframe>';
}?>