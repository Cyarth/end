<?php session_start(); include("partials/nav.php");?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("conexion.php");
 
if(isset($_POST['Submit'])) {    
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $tipo = $_POST['tipo'];
    $photo = $_FILES['photo']["name"];
    $ruta = $_FILES['photo']["tmp_name"];
    $destino="fotos/".$photo;
    copy($ruta,$destino);
    $loginId = $_SESSION['id'];

   
        
    // checking empty fields
    if(empty($name) || empty($qty) || empty($photo)) {                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }else {
            if (strlen($name) > 1) {
                echo"<font color='red'>El nombre es muy largo</font><br/>";
            }
        }

        if(empty($tipo)) {
            echo "<font color='red'>Tipo field is empty.</font><br/>";
        }
        
        if(empty($qty)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }else {
            if (is_numeric($qty)) {
                echo "<font color='red'>La cantidad no un numero</font><br/>";
            }
        }
        
        if(empty($photo)) {
            echo "<font color='red'>Photo field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = mysqli_query($mysqli, "INSERT INTO products(name, qty, inventario, photo, login_id) VALUES('$name','$qty','$tipo','$destino', '$loginId')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='view.php'>View Result</a>";
        header("Location: view.php");
    }
}
?>
</body>
</html>