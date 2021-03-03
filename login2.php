
<html>
<head>
    <title>Login</title>
</head>
 
<body>

<?php
include("conexion.php");
include("partials/headLogin.php");

if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);
 
    if($name == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.php'>Go back</a>";
    } else {
     
        $result2 = mysqli_query($mysqli, "SELECT * FROM empresa WHERE name='$name' AND password=md5('$pass')")
        or die("Could not execute the select query.");
        
        $row = mysqli_fetch_assoc($result2);
     
        
        if(is_array($row) && !empty($row)) {
            $validuser = $row['name'];
            $_SESSION['valid'] = $validuser;
            session_start();
        
            $_SESSION['codigoEmpresa'] = $row['codigoEmpresa'];

           

        }  
      
        
        else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        }
 
        if(isset($_SESSION['valid'])) {
            header('Location: index.php');            
        }

       
    }
} else {
?>
    <div class="login-form">
        <form name="form2" method="post" action="">
            <h2 class="text-center">Log in</h2>  

            <div class="form-group">
              <input type="button" onclick=" location.href='login.php' " value="Particular" name="btnParticular"  class="btn btn-primary btn-lg" /> 
             
              <input type="button" onclick=" location.href='login2.php' " value="Empresa" name="btnEmpresa"  class="btn btn-primary btn-lg" /> 
              </div>
              
            <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nombre / Nombre Empresa" required="required">
            </div>
            <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                    <button type="submit"  name="submit" class="btn btn-primary btn-block">Entrar</button>
            </div>    
            <div class="clearfix">
                    <label class="pull-left checkbox-inline"><input type="checkbox"> Recuerdame</label>
                    <a href="registrarComo.php" class="pull-right">Registrate</a>
            </div>   
        </form>
    </div>
<?php
}
?>
</body>
</html>