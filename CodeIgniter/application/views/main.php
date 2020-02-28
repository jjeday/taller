<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>       <table cellpadding="15">
  <tbody>
    <tr valign="top">
      <td width="33%">
      <h2>Canciones conocidas</h2>
      <ul>
      
      <?php  echo $canciones?>
      
      </ul>
      
      </td>
      <td width="33%">
      <h2>Redes sociales</h2>
      
      <ul>
      <li><a href="https://www.youtube.com/user/DarioBonsoir" target="_blank">YouTube DarioBonsoir</a></li>
      <li><a href="https://www.youtube.com/user/MCCANWAY" target="_blank">YouTube Ramon Augusto ADM</a></li>
      <li><a href="https://www.facebook.com/groups/1531287430512547/?ref=bookmarks" target="_blank">FB: Amigos a los que les gusta Salvatore ADAMO</a></li>
      
      </ul>
      
      
      <p></p>
      </td>
      <td width="33%">
      <h2>B&uacute;squeda</h2>
      <form action="<?php echo site_url('busqueda');?>" method="post" name="search"> <input id="entryfield"
 name="busqueda" value="" size="25" maxlength="40" type="text"> <input
 value="Encontrar!" type="submit"/>
        <p><label for="entryfield">Puede buscar por el t&iacute;tulo o letra de la cancion.</label></p>
      </form>
      </td>
    </tr>
  </tbody>
</table>