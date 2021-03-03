<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}?> 
    
    <?php
    include_once("conexion.php");
    include("partials/headRegistro.php");
    if(isset($_POST['Enviar'])) {

       

         $fechaRecepcion = $_POST['fechaRecepcion'];
         $temperaturaMuestra = $_POST['temperaturaMuestra'];
         $cantidadMuestra = $_POST['cantidadMuestra'];
         
         $codPar = $_SESSION['codigoParticular'];

         $tipo = $_POST['tipo'];
         $nombre = $_POST['nombre'];
       
            
        
          

       
          $aa= mysqli_query($mysqli, "INSERT INTO analisismuestras (fechaRecepcion,temperaturaMuestra,cantidadMuestra, particularCod, tipo,nombre) VALUES
            ('$fechaRecepcion','$temperaturaMuestra','$cantidadMuestra','$codPar','$tipo','$nombre')")
            or die( "Error en la Query");
            
            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='index.php'>Index</a>";
            header("Location: index.php");
        }


     else {
?>
    <div class="signup-form">
        






        <form name="form1" method="post" action="recepcionMuestra.php">
            <h2>Muestra</h2>
              <div class="form-group">


              
                      
              <div class="form-group">
              <input type="date" class="form-control" name="fechaRecepcion"   placeholder="Fecha"  required="required">
              </div>

            <div class="form-group">
            <input type="number" class="form-control" name="temperaturaMuestra" placeholder="Temperatura" required="required"></div>

            <div class="form-group">
            <input type="number" class="form-control" name="cantidadMuestra" placeholder="cantidadMuestra" required="required"></div>
           
            

            <?php


//including the database connection file
include_once("conexion.php");


//fetching data in descending order (lastest entry first)
$registros = mysqli_query($mysqli, "SELECT * from tipoanalisis");
?>

     <?php
       while ($reg = mysqli_fetch_array($registros)) {
   
       $tipo= $reg['tipo'];

       $nombre = $reg['nombre'];
     

      }
      ?>


            <SELECT NAME="tipo">
                   <OPTION value="<?php echo $tipo;?>" SELECTED><?php echo $tipo;?>
                </select>


            </div>

            <div class="form-group">
            <input type="text" class="form-control" name="nombre" value="<?php echo $nombre;?>" required="required"></div>
            
            <div class="form-group">
               <button type="submit" name="Enviar" class="btn btn-primary btn-lg">Sign Up</button>
            </div>
            </form>
            
            
        </form>
    </div>
    <?php
    }
    ?>
</body>
</html>