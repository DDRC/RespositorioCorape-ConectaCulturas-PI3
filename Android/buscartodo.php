<?php
//COMPRUEBA EL TIPO DE PETICION
if($_SERVER["REQUEST_METHOD"]=="POST"){
//coneccion con la base de datos
    require_once("conection.php");
//recuperacion de datos desde android
    
    $query="SELECT Titulo,TipoArchivo,NacionalidadoPueblo,ID FROM `wp_android`;";
    $result=mysqli_query($coneccion,$query);
    $array=[];
    if ($result->num_rows>0) {
        while ($row=mysqli_fetch_assoc($result)) {
            //$array=$row ;
            array_push($array,$row);
            //echo $row['Titulo']."<br>";
        }
        echo (json_encode($array));
    }else{
        echo "No encontraron resultados";
    }
}
mysqli_close($coneccion);
?>