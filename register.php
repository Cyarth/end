
    <?php
    include("conexion.php");
    include("partials/headRegistro.php");
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
 
        if($user == "" || $pass == "" || $name == "" || $email == "") {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='register.php'>Go back</a>";
        } else {
            mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
            or die("Could not execute the insert query.");
            
            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='login.php'>Login</a>";
            header("Location: login.php");
        }
    } else {
?>
    <div class="signup-form">
        
        <form name="form1" method="post" action="">
            <h2>Registrate</h2>
            <p>Por favor, rellene este formulario para crear una cuenta!</p>
            <hr>
            <div class="form-group"><input type="text" class="form-control" name="name" placeholder="Nombre" required="required"></div>
           
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Correo" required="required">
            </div> 
            <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Usuario" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Contraseña" >
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