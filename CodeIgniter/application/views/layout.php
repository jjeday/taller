<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>  
<?php 
$ico = base_url('media/bn.jpg');
if(!isset($image)){
    $image = base_url('media/bn.jpg');
}

?>
    <meta property="og:title" content="<?php echo $title?>" />
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo current_url(); ?>" />
    <meta property="og:image" content="<?php echo $image?>" />
    <meta property="og:site_name" content="SalvatoreAdamo.TK" />
    <meta property="fb:admins" content="661092090" />
    
    
    <link rel="icon" type="image/jpg" href="<?php echo $ico?>" />
    <meta name="Description" content="<?php echo $description;?>" />
    <meta name="keywords" content="adamo, salvatore adamo, adamo salvatore, adamo chansons, musica adamo, salvatore adamo grandes exitos, cerfs volants, adamo mi gran noche, adamo es mi vida, salvatore adamo es mi vida, adamo canciones, salvatore adamo videos, musica salvatore adamo, mi gran noche adamo, zanzibar, je reviens, salvatore adamo canciones, adamo mis manos en tu cintura, canciones salvatore adamo, amour, sites de rencontres amoureuses, cherche amour, amours, chansons d'amour, les plus belles chansons, chanson amour, musique amour, chanson romantique, belle chanson, chansons amour, adamo paroles, discografia adamo, salvatore adamo discografia, adamo discografia, salvatore adamo lyrics, salvatore adamo letras, chanson adamo, salvator adamo, chansons adamo, cd adamo, adamo discographie, adamo chanson, adamo en español, adamo tombe la neige, salvatore adamo tombe la neige, la neige tombe, salvatore adamo inch allah, adamo inch'allah, inch'allah, adamo c'est ma vie, adamo c'est ma vie, vous permettez monsieur, la nuit adamo, la nuit, adamo vous permettez monsieur, tombe la neige paroles"/>
  
  <title><?php echo $title?></title>
  <style type="text/css">@import "<?php echo base_url();?>/lyricstyle.css";</style>
  
</head>
<body>
<script type="text/javascript">
  <!--
  function validateForm() {
    if (document.search.pattern.value.length < 3) {
      alert("Please enter at least one word with 3 letters.")
      return false
    }
    else
      return true
   }
  //-->
</script>
<div id="content">
<h1><a href="<?php echo site_url();?>">Salvatore Adamo</a></h1>
<h3><u><?php echo $titulo_pagina?></u></h3>
<div class="navi">
<a href="<?php echo site_url();?>">P&aacute;gina de inicio</a> |
<a href="<?php echo site_url('canciones-de-salvatore-adamo-por-idiomas');?>">&Iacute;ndice de canciones por idiomas</a> |
<a href="<?php echo site_url('canciones-de-salvatore-adamo');?>">&Iacute;ndice de canciones A-Z</a> | <a
 href="<?php echo site_url('albumes');?>">&Iacute;ndice de albumes</a> | 
 <a href="<?php echo site_url('busqueda');?>">B&uacute;squeda de canciones</a>
 </div>

<?php echo $content; ?>
<br>
<br>
<br>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-103889475-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>