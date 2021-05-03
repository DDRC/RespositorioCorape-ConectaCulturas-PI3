<?php

use function PHPSTORM_META\type;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    //coneccion con la base de datos
        require_once("conection.php");
    //recuperacion de datos desde android
    $ident=$_POST['Identificador'];
    $title=$_POST['Titulo'];
    $Depiction=$_POST['Descripcion'];
    $BelongTo=$_POST['NacionalidadoPueblo'];
    $KindOf=$_POST['TipoArchivo'];
    $Public=$_POST['Publicado'];
    $Tematicas=$_POST['TagsTematicas'];
    $SaberNombre=$_POST['NombreSaber'];
    $imagen=$_POST['Imagen'];
    if($KindOf=="Imagen"){
        $rutaImagen="C:/xampp/htdocs/wordpress/wp-content/uploads/Saberes/Imagenes/$SaberNombre";
        $rutaImagenRelatica="../wordpress/wp-content/uploads/Saberes/Imagenes/$SaberNombre";    
    }elseif($KindOf=="Video"){
        $rutaImagen="C:/xampp/htdocs/wordpress/wp-content/uploads/Saberes/Videos/$SaberNombre";
        $rutaImagenRelatica="../wordpress/wp-content/uploads/Saberes/Videos/$SaberNombre";    
    }elseif($KindOf=="Audio"){
        $rutaImagen="C:/xampp/htdocs/wordpress/wp-content/uploads/Saberes/Audios/$SaberNombre";
        $rutaImagenRelatica="../wordpress/wp-content/uploads/Saberes/Audios/$SaberNombre";    
    }elseif($KindOf=="Texto"){
        $rutaImagen="C:/xampp/htdocs/wordpress/wp-content/uploads/Saberes/Textos/$SaberNombre";
        $rutaImagenRelatica="../wordpress/wp-content/uploads/Saberes/Textos/$SaberNombre";    
    
    }
    
    file_put_contents($rutaImagenRelatica,base64_decode($imagen));
    $bitesIMG=file_get_contents($rutaImagenRelatica);
    
        $query="UPDATE `wp_android` SET Titulo='$title',Descripcion='$Depiction',NacionalidadoPueblo='$BelongTo',
        TipoArchivo='$KindOf',Publicado='$Public',TagsTematicas='$Tematicas',NombreSaber='$SaberNombre',RutaSaber='$rutaImagen'  WHERE ID='$ident';";
        $result=mysqli_query($coneccion,$query);

        if ($result) {
            echo "actualizo el registro";
        }else{
            echo "error";
        }
        /*if ($coneccion->affected_rows > 0) {
            if ($result==TRUE) {
                echo "actualizo el registro";
            }else{
                echo "error";
            }
            
        }else{
            
            echo "No encontraron resultados";
        }*/
    }
    mysqli_close($coneccion);
?>