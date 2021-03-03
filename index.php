<?php session_start(); ?>
<title>DUOC RESERVAS | SEDE MAIPU</title>
<?php include("partials/nav.php"); ?>
    
    <?php
    if(isset($_SESSION['valid'])) {            
        include("conexion.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>         
    <div class="container mb-5 ">
            <div class="row">
                <div class="col-lg-4 ">
                <label class="label">Bienvenid@ <?php echo $_SESSION['name'] ?>
                <?php echo $_SESSION['id'] ?> ! </label>
                </div>
            </div>     
    </div>  

    <div class="jumbotron jumbotron-fluid col-lg-5 mt-5 ml-5 pt-5 ">
        <div class="container">
            <h1 class="display-4">Bienvenido <?php echo $_SESSION['name'] ?> </h1>
            <a href="viewMaterialUser.php">
                <p class="lead mt-3 ">Ver materiales subidos por mi</p>
            </a>
            <a href="viewReservaUser.php">
                <p class="lead mt-3">Ver reservas hechas por mi</p>
            </a>
            
        </div>
    </div>
    
    <?php    
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
    }
    ?>
    
</body>
</html>