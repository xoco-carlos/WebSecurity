<?php
/**
 * Implements hook_menu()
 */
function restget_menu() {
    $items['test'] = array(
        'title' => 'Test',
        'page callback' => 'restget_page',
        'access callback' => TRUE,
        'type' => MENU_NORMAL_ITEM
    );
    return $items;
}
/**
 * Get the element as object
 * @param $uri the URI to get
 * @return object
 */
function _get_element() {
    // Get the arrays with all the articles.
    $uri = "http://192.168.1.68/drupal/?q=json";
    $response = file_get_contents($uri); 
    $prueba=json_decode($response,TRUE);
    // This will return an array, if you want an object, use json_decode($response) directly. 
    return $prueba;
}
/**
 * Page callback
 */
function restget_page() {
    $element = _get_element();
		$noArt=count($element);
		for ($i = 0 ;$i < $noArt; $i++){
			echo "<H1>Titulo: ". $element[$i]['title']."</H1><br>";
			echo "<H2>Autor: ". $element[$i]['Name']."</H2><br>";
			echo "<H2>Fecha: ". $element[$i]['Post date']."</H2><br>";
			echo "<p>". $element[$i]['Contenido']."</p><br>";
			echo "<img src='". $element[$i]['field_image']."'/><br>";
		}
    return 1;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            restget_page();
        ?>
    </body>
</html>
