<?php session_start(); include("partials/nav.php"); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
$nombre=$_SESSION['name'];
?>
 
<?php
//including the database connection file
include_once("conexion.php");
$material_x_pagina=8;

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products");
if (isset($result)) {
    $row_cnt = mysqli_num_rows($result);

}
$pagina= ceil($row_cnt/$material_x_pagina);
?>
 
<html>
<head>
    <title>REPORTE MATERIAL</title>
</head>
<?php
        if(!$_GET){
            header('location:reportMaterial.php?pagina=1');
        }
        ;
    ?>
<table class="table table-bordered">
<thead>
    <tr>
        <th>Nombre material</th>
        <th>Cantidad</th>
        <th>Inventario</th>
        <th>Foto</th>
        <th>Nombre quien agrego el material </th>
    </tr> 
</thead>
    <tbody>

    <?php
        $iniciar = ($_GET['pagina']-1)*$material_x_pagina;
        $result2 = mysqli_query($mysqli, "SELECT * FROM products LIMIT $iniciar,$material_x_pagina");
    while($res = mysqli_fetch_array($result2)) {        
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['qty']."</td>";
        echo "<td>".$res['inventario']."</td>";
        echo "<td>".'<img src="'.$res['photo'].'" width="100" heigth="100">'."</td>";   
        echo "<td>".$nombre."</>";
             
    }
    ?>
</table>   
<nav class="mt-5 ml-5" aria-label="Page navigation example">
  <ul class="pagination">
  <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : '' ?>
    ">
        <a class="page-link" href="reportMaterial.php?pagina=<?php echo $_GET['pagina']-1 ?>">
            Anterior
        </a>
    </li>
    <?php for ($i=0; $i < $pagina; $i++) :?>
    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
        <a class="page-link" href="reportMaterial.php?pagina=<?php echo $i+1 ?>">
            <?php echo $i+1 ?>
        </a>
    </li>
    <?php endfor ?>
    <li class="page-item <?php echo $_GET['pagina']>=$pagina? 'disabled' : '' ?>
    ">
        <a class="page-link" href="reportMaterial.php?pagina=<?php echo $_GET['pagina']+1 ?>">
            Siguiente
        </a>
    </li>
  </ul>
</nav>
</body>
</html>