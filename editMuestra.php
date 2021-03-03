<?php session_start(); include("partials/nav.php");?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
// including the database connection file
include_once("conexion.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
         $fechaRecepcion = $_POST['fechaRecepcion'];
         $temperaturaMuestra = $_POST['temperaturaMuestra'];
         $cantidadMuestra = $_POST['cantidadMuestra'];
         
         $codPar = $_SESSION['codigoParticular'];

         $tipo = $_POST['tipo'];
         $nombre = $_POST['nombre'];

    
    // checking empty fields
    if(empty($fechaRecepcion) || empty($temperaturaMuestra)) {                
        if(empty($fechaRecepcion)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($temperaturaMuestra)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }      
    } else {    
        //updating the table
         $result = mysqli_query($mysqli, "UPDATE analisismuestras SET fechaRecepcion='$fechaRecepcion', 
          temperaturaMuestra='$temperaturaMuestra',
          cantidadMuestra='$cantidadMuestra', particularCod='$codPar',
          tipo='$tipo', nombre='$nombre' WHERE idAnalisis=$idAnalisis");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: admin.php");
    }
}
?>
<?php
//getting id from url
$idAnalisis = $_GET['idAnalisis'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE idAnalisis=$idAnalisis");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    
    $fechaRecepcion = $res['fechaRecepcion'];
    $temperaturaMuestra = $res['temperaturaMuestra'];
    $cantidadMuestra = $res['cantidadMuestra'];
    
    $codPar = $res['codigoParticular'];

    $tipo = $res['tipo'];
    $nombre = $res['nombre'];

}
?>

<html>
<head>    
    <title>Edit Data</title>
</head>
 <style>
     aside{
         margin-top: 100px;
         height: 400px;
         margin-left: 700px;
     }
     table{
         margin: 100px;
         display: inline-block;
         float: center;
     }
 </style>
<body>
  
    
    <form name="form1" method="post" action="editMuestra.php">
        <aside>

       

           <div class="form-group">
              <input type="date" class="form-control" name="fechaRecepcion"     required="required">
              </div>

            <div class="form-group">
            <input type="number" class="form-control" name="temperaturaMuestra" placeholder="Temperatura" required="required"></div>

            <div class="form-group">
            <input type="number" class="form-control" name="cantidadMuestra" placeholder="cantidadMuestra" required="required"></div>
           

                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <input type="submit" name="update" value="Update"></td>
         



                <SELECT NAME="tipo">
                   <OPTION value="<?php echo $tipo;?>" SELECTED><?php echo $tipo;?>
                </select>


            </div>

            <div class="form-group">
            <input type="text" class="form-control" name="nombre" value="<?php echo $nombre;?>" required="required"></div>
            
            <div class="form-group">
               <button type="submit" name="Enviar" class="btn btn-primary btn-lg">Sign Up</button>
            </div> 



        </aside>
        
    </form>
</body>
</html>