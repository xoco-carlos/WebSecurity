<?php
	include 'getdrupal.php';
	$articulo = new Articulos;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <script src="js/jquery-1.9.1.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/mosaico.js"></script>
        <link rel="stylesheet" href="css/mosaico.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <div class="barra">
            <ul id="tope">
                <li><a href="login.php">Acceder</a></li>
                <li><a href="contenido.php">Lista de Contenido</a></li>
            </ul>
        </div>
        </br></br></br>
        <div id="vertical-margin">
        <div class="column">
          <div class="portlet">
            <div class="portlet-header"><?php echo $articulo->getTitulo(1); ?></div>
            <div class="portlet-content">
                <a title=" <?php echo $articulo->getTitulo(1); ?> " href="articulo.php?art=1">
                    <img src=" <?php echo $articulo->getImagen(1); ?> " width="130px" height="140px"/>
                </a>  
            </div>
          </div>
         <div class="portlet">
            <div class="portlet-header"><?php echo $articulo->getTitulo(2); ?></div>
            <div class="portlet-content">
                <a title=" <?php echo $articulo->getTitulo(2); ?> " href="articulo.php?art=2">
                    <img src=" <?php echo $articulo->getImagen(2); ?> " width="130px" height="140px"/>
                </a>  
            </div>
          </div>
         <div class="portlet">
            <div class="portlet-header"><?php echo $articulo->getTitulo(3); ?></div>
            <div class="portlet-content">
                <a title=" <?php echo $articulo->getTitulo(3); ?> " href="articulo.php?art=3">
                    <img src=" <?php echo $articulo->getImagen(3); ?> " width="130px" height="140px"/>
                </a>  
            </div>
          </div>  
        </div>
            </div>
        <div class="column">
 
          <div class="portlet">
            <div class="portlet-header"><?php echo $articulo->getTitulo(4); ?></div>
            <div class="portlet-content">
                <a title=" <?php echo $articulo->getTitulo(4); ?> " href="articulo.php?art=4">
                    <img src="<?php echo $articulo->getImagen(4); ?>" width="130px" height="140px"/>
                </a>  
            </div>
          </div>
         <div class="portlet">
            <div class="portlet-header"><?php echo $articulo->getTitulo(5); ?></div>
            <div class="portlet-content">
                <a title=" <?php echo $articulo->getTitulo(5); ?> " href="articulo.php?art=5">
                    <img src="<?php echo $articulo->getImagen(5); ?>" width="130px" height="140px"/>
                </a>  
            </div>
          </div>
         <div class="portlet">
            <div class="portlet-header"><?php echo $articulo->getTitulo(6); ?></div>
            <div class="portlet-content">
                <a title=" <?php echo $articulo->getTitulo(6); ?> " href="articulo.php?art=6">
                    <img src="<?php echo $articulo->getImagen(6); ?>" width="130px" height="140px"/>
                </a>  
            </div>
          </div>  
        </div>
        <div class="column">
 
          <div class="portlet">
            <div class="portlet-header"><?php echo $articulo->getTitulo(7); ?></div>
            <div class="portlet-content">
                <a title=" <?php echo $articulo->getTitulo(7); ?> " href="articulo.php?art=7">
                    <img src="<?php echo $articulo->getImagen(7); ?>" width="130px" height="140px"/>
                </a>  
            </div>
          </div>
         <div class="portlet">
            <div class="portlet-header"><?php echo $articulo->getTitulo(8); ?></div>
            <div class="portlet-content">
                <a title=" <?php echo $articulo->getTitulo(8); ?> " href="articulo.php?art=8">
                    <img src="<?php echo $articulo->getImagen(8); ?>" width="130px" height="140px"/>
                </a>  
            </div>
          </div>
         <div class="portlet">
            <div class="portlet-header"><?php echo $articulo->getTitulo(9); ?></div>
            <div class="portlet-content">
                <a title=" <?php echo $articulo->getTitulo(9); ?> " href="articulo.php?art=9">
                    <img src="<?php echo $articulo->getImagen(9); ?>" width="130px" height="140px"/>
                </a>  
            </div>
          </div>  
        </div>
 
    </body>
</html>
