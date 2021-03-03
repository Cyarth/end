<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}?> 
    
    <?php
    include_once("conexion.php");
    include("partials/headRegistro.php");
    if(isset($_POST['Enviar'])) {

       

         $rutEmpleado = $_POST['rutEmpleado'];
         $name = $_POST['name'];
         $pass = $_POST['password'];
         
         $categoria = $_POST['categoria'];


       
          $emp= mysqli_query($mysqli, "INSERT INTO empleado (rutEmpleado,name,password, categoria) VALUES
            ('$rutEmpleado','$name',md5('$pass'),'$categoria')")
            or die("Could not execute the insert query.");
            
            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='index.php'>Inicio</a>";
            header("Location: index.php");
        }


     else {
?>
    <div class="signup-form">
        
        <form name="form3" method="post" action="">
            <h2>Registro Empleados</h2>
           
            <hr>
            <div class="form-group">
            <input type="text" class="form-control" name="rutEmpleado"   placeholder="Rut"  required="required"></div>

            <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Nombre" required="required"></div>

            <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required"></div>
           
            
            <div class="form-group">
                Tipo de Empleado <br>
            <SELECT NAME="categoria">
                   <OPTION VALUE="receptorMuestras" SELECTED>Receptor De Muestras
                   <OPTION VALUE="tecnicoLaboratorio">Tecnico de Laboratorio
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