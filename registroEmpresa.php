<?php
    include("conexion.php");
    include("partials/headRegistro.php");
    if(isset($_POST['submit'])) {

        $rutEmpresa = $_POST['rutEmpresa'];
        $name = $_POST['name'];
        $pass = $_POST['password'];
        $direccionEmpresa = $_POST['direccionEmpresa'];


         
 
        if($rutEmpresa== "" || $name == "" || $pass == "" || $direccionEmpresa == "" ) {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='register.php'>Go back</a>";
        } else {
            mysqli_query($mysqli, "INSERT INTO empresa (rutEmpresa, name, password, direccionEmpresa) VALUES
            ('$rutEmpresa','$name', md5('$pass'), '$direccionEmpresa') ")
            or die("Could not execute the insert query.");
            
            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='login.php'>Login</a>";
            header("Location: login.php");
        }
    } else {
?>
    <div class="signup-form">
        
        <form name="form2" method="post" action="">
            <h2>Registrate</h2>
            <p>Por favor, rellene este formulario para crear una cuenta!</p>
            <hr>
            <div class="form-group">
            <input type="text" class="form-control" name="rutEmpresa" placeholder="Rut" required="required"></div>

            <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Nombre Empresa" required="required"></div>

            <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="password" required="required"></div>
           
            <div class="form-group">
                <input type="text" class="form-control" name="direccionEmpresa" placeholder="Direccion" required="required">
            </div> 
            
            <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group">
               <button type="submit" name="submit" class="btn btn-primary btn-lg">Sign Up</button>
            </div>
            </form>
            <div class="hint-text">Already have an account? <a href="login.php">Login here</a></div>
            
        </form>
    </div>
    <?php
    }
    ?>
</body>
</html>