<?php session_start(); ?>
<html>
<head>
    <title>Login</title>
</head>
 
<body>
<?php
include("conexion.php");
include("partials/headLogin.php");
if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);
 
    if($user == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.php'>Go back</a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
        or die("Could not execute the select query.");
        
        $row = mysqli_fetch_assoc($result);
        
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
        } else {
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
        <form name="form1" method="post" action="">
            <h2 class="text-center">Log in</h2>  
            <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Usuario" required="required">
            </div>
            <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required="required">
            </div>
            <div class="form-group">
                    <button type="submit"  name="submit" class="btn btn-primary btn-block">Entrar</button>
            </div>    
            <div class="clearfix">
                    <label class="pull-left checkbox-inline"><input type="checkbox"> Recuerdame</label>
                    <a href="register.php" class="pull-right">Registrate</a>
            </div>   
        </form>
    </div>
<?php
}
?>
</body>
</html>