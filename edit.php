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
    
    $name = $_POST['name'];
    $qty = $_POST['qty'];  
    
    // checking empty fields
    if(empty($name) || empty($qty)) {                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($qty)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }      
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE products SET name='$name', qty='$qty' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $qty = $res['qty'];
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
  
    
    <form name="form1" method="post" action="edit.php">
        <aside>

        <table border="1">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Quantity</td>
                <td><input type="text" name="qty" value="<?php echo $qty;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>

        </aside>
        
    </form>
</body>
</html>