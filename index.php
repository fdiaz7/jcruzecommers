<?php require_once('php/cabecera.php')?>
<?php include('php/config.php')?>
<?php
//Conexion a la Base de Datos
$conexion = mysqli_connect($server,$user,"",$databesetienda);

//Primera peticion a la base, seleccionamo los productos
$peticion = "SELECT * FROM productos WHERE stock > 0 ";

//obtenemo el resultado de la consulta
$result = mysqli_query($conexion,$peticion);

//convierto la consulta en un Array asociativo e itero sobre el
while($fila = mysqli_fetch_array($result)){
    //HTML para pintar en la pantalla
    echo "<article>";
    $peticion2 = "SELECT * FROM imagenesproductos WHERE idproducto = ".$fila['id']." LIMIT 1";
    $result2 = mysqli_query($conexion, $peticion2 );
    while($fila2 = mysqli_fetch_array($result2)){
        echo "<img src='photo/".$fila2['imagen']."' width=100px>";
    };
    echo "<br>";
    echo "<a href='preducto.php?id=".$fila['id']."'><h3>".$fila['nombre']." "."</h3></a>";
    echo "<p>".$fila['descripcion']." "."</p>";
    echo "<p> Precio: $".$fila['precio']."</p>";
    //Query de imagenes
   
    //Botones info / comprar
    echo "<br>";
    echo "<br>";
    // el href lleva a productos.php 
    echo "<a href='producto.php?id=".$fila['id']."'><button  class='btn btn-primary botoninfo'>Mas informacion</button></a>";
    echo "<button  class='btn btn-success botoncompra' value='".$fila['id']."'>Comprar Ahora</button>";
    echo "</article>";
    echo "<br>";
};
mysqli_close($conexion);
?>
<?php require_once('php/footer_page.php')?>
