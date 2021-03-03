<?php session_start();
 include("partials/nav.php");
?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<html>
<head>
    <title>Add Reserva</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("conexion.php");
//AGREGAMOS EL ALUMNO
if(isset($_POST['Enviar'])) {    
    $nombre = $_POST['nombre'];
    $rut = $_POST['rut'];
    $email = $_POST['email'];
    $ncelular = $_POST['numero'];
    $fecha = $_POST['fechaReserva'];
    $cantidad= $_POST['cantidad'];
    $loginId = $_SESSION['id'];
    $cantidadRestar = $_GET['qyt'];
    if($cantidad>$cantidadRestar) {
        echo" La cantidad ingresada en mayor al producto.";
    }
    $cantidadRestada= $cantidadRestar-$cantidad;


    if(empty($nombre) || empty($email) || empty($cantidad) || empty($ncelular) || empty($fecha) || empty($rut)) {                
        if(empty($nombre)) {
            echo "<font color='red'>Nombre field is empty.</font><br/>";
        }
        if(empty($cantidad)) {
            echo "<font color='red'>Cantidad field is empty.</font><br/>";
        }

        if(empty($rut)) {
            echo "<font color='red'>Rut field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
        if(empty($ncelular)) {
            echo "<font color='red'>Cellphone number field is empty.</font><br/>";
        }

        if(empty($fecha)) {
            echo "<font color='red'>Date field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = mysqli_query($mysqli, "INSERT INTO reserva(nombreAlumno, rut, emailAlumno, numeroCel, cantidad, fechaEntrega, loginId) 
        VALUES('$nombre','$rut','$email','$ncelular', '$cantidad', '$fecha','$loginId')");


        
        
        echo "<font color='green'>Data added successfully.";
        header("Location: viewReserva.php");
    }
}
?>
</body>
</html>
        