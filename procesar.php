<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}?> 
    
    <?php
    include_once("conexion.php");
    include("partials/headRegistro.php");
    if(isset($_POST['Enviar'])) {

       

         $idAnalisis =  $_POST['idAnalisis'];
         $tipoAnalisis = $_POST['tipo'];
         $cantidadPPM = $_POST['cantidadPPM'];
         $estado =  $_POST['estado'];
       
            

       
          $aa= mysqli_query($mysqli, "INSERT INTO procesar (idA,tipoA,cantidadPPM,estado) VALUES
            ('$idAnalisis','$tipoAnalisis','$cantidadPPM','$estado')")
            or die( "Error en la Query");
            
            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='index.php'>Index</a>";
            header("Location: index.php");
        }


     else {
?>
    <div class="signup-form">
        

        <form name="form1" method="post" action="">
            <h2>Procesar</h2>
              <div class="form-group">

              
                      

       <?php


        //including the database connection file
       include_once("conexion.php");
  
    
      //fetching data in descending order (lastest entry first)
      $registros = mysqli_query($mysqli, "SELECT * from analisismuestras");
       ?>
      
        <?php
           while ($reg = mysqli_fetch_array($registros)) {
           
         $idAnalisis= $reg['idAnalisis'];
         $tipo = $reg['tipo'];
         $particularCod=$reg['particularCod'];

          
  
      }
       ?> 
            <div class="form-group">
          Codigo:  <input type="text" name="idAnalisis" value="<?php echo $idAnalisis;?>">
            </div>

            <div class="form-group">
          Codigo:  <input type="text"  value="<?php echo $particularCod;?>">
            </div>



            <div class="form-group">
          Tipo de Analisis:<input type="text" name="tipo" value="<?php echo $tipo;?>">
            </div>

            <div class="form-group">
         cantidadPPM :<input type="number" class="form-control" name="cantidadPPM" required="required">
            </div>
 
            <div class="form-group">
               Estado <br>
            <SELECT NAME="estado">
                   <OPTION VALUE="enProceso" SELECTED>En proceso
                   <OPTION VALUE="terminado">Terminado
                </select>


            </div>
            
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