<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}?> 
    
    <?php
    include_once("conexion.php");
    include("partials/headRegistro.php");
    if(isset($_POST['Enviar'])) {

       
         $tipo = $_POST['tipo'];
         $nombre = $_POST['nombre'];

        
       
          $tipoA= mysqli_query($mysqli, "INSERT INTO tipoanalisis (tipo,nombre) VALUES
            ('$tipo','$nombre')")
            or die("Could not execute the insert query.");
            
            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='login.php'>Login</a>";
            header("Location: login.php");
        }


     else {
?>
    <div class="signup-form">
        
        <form name="form1" method="post" action="">
            <h2>Muestra</h2>
           
              
            <div class="form-group">
                Tipo de Muestra <br>
            <SELECT NAME="tipo">
                   <OPTION VALUE="deteccionMicotoxinas" SELECTED>Deteccion Micotoxinas
                   <OPTION VALUE="deteccionMetalesPesados">deteccionMetalesPesados
                   <OPTION VALUE="deteccionPlaguicidas">deteccionPlaguicidas
                   <OPTION VALUE="deteccionMareaRoja">deteccionMareaRoja
                   <OPTION VALUE="deteccionBacteriasNocivas">deteccionBacteriasNocivas
                </select>


            </div>

            <div class="form-group">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre Muestra" required="required"></div>
            
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