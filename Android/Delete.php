<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //coneccion con la base de datos
        require_once("conection.php");
    //recuperacion de datos desde android
    $ident=$_POST['ID'];
    
        $query="DELETE FROM `wp_android` WHERE ID='$ident';";
        $result=mysqli_query($coneccion,$query);
        if ($result) {
            echo "se elimino correctamente";
        }

        /*if ($coneccion->affected_rows > 0) {
            if ($result==TRUE) {
                echo "se elimino correctamente";
            }
            
        }else{
            echo "No hay nada para eliminar";
        }*/
    }
    mysqli_close($coneccion);
?>