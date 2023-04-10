<?php
session_start();
if(isset($_SESSION['admin'])){
include("header.php");       
    $nro1 = rand(0, 9);
    $nro2 = rand(0, 9);
    $nro3 = rand(0, 9);
    $letra = array('a', 'h', 'g', 'l', 'd', 'm', 'k');
    $simbolo = array('%', '$', '/', '@', '#');
    $mezcla_letra = rand(0, 6);
    $mezcla_simbolo = rand(0, 4);
    $_SESSION['codigo_captcha'] = $nro1 . $letra[$mezcla_letra] . $nro2 . $simbolo[$mezcla_simbolo] . $nro3;
    ?>

        <section class= "contenedor_carga">
            <h3> Carga de Componentes</h3>
            <form action="cargar_componente.php" method="post" class= "formulario" enctype="multipart/form-data">
                <input type="text" name="nombre" required placeholder="Nombre">
                <input type="text" name="apellido" required placeholder="Apellido">
                <input type="text" name="funcion" required placeholder="Funcion">
                <input type="file" name="imagen" required placeholder="Imagen">
                <textarea name="descripcion"  cols="19" rows="10"></textarea>
                <select name="estado" id="">
                    <option value="En Proceso"> En Proceso </option>
                    <option value="Finalizado"> Finalizado </option>
                </select>            
                <img src="captcha.php">
                <input type="text" name="captcha" placeholder="Ingresa Captcha">
                <input type="submit" value="Cargar Componente">
            </form>           
        </section>
        <?php 
         
         if (isset ($_GET['error_codigo'])){            
            echo "<h3> Codigo de verificacion incorrecto </h3>";
        }
        if (isset ($_GET['ok'])){              
            echo "<h3> Componente Cargado con Exito </h3>";
        } 
        if (isset ($_GET['error'])){              
            echo "<h3> Imagen incorrecta. Verifique formato y el tamaño (max200kb) </h3>";
        }  
        ?>
        
        <?php
        }else{
           header("Location:index.php");
        } 
         ?>    
        </body>
        </html>
