<title>Lista Materiales</title>
<?php session_start(); include("partials/nav.php");?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php

include_once("conexion.php");
$material_x_pagina=8;
//$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
$result = mysqli_query($mysqli, "SELECT * FROM products where inventario = 'Panol'");
if (isset($result)) {
    $row_cnt = mysqli_num_rows($result);

}
$pagina= ceil($row_cnt/$material_x_pagina);
?>
 
<html>
<head>
    <title>Homepage</title>
</head>
 
<body>

    <?php
        if(!$_GET){
            header('location:viewPanol.php?pagina=1');
        }
        ;
    ?>

    <?php
     $iniciar = ($_GET['pagina']-1)*$material_x_pagina;
     $result2 = mysqli_query($mysqli, "SELECT * FROM products where inventario = 'Panol' LIMIT $iniciar,$material_x_pagina");
    while($res = mysqli_fetch_array($result2)) {    
        
        echo "<div id=\"card\" class=\"card\" style=\"width: 18rem;\">";
        echo "<img class=\"card-img-top\" src=".$res['photo']." width=\"100\" heigth=\"100\" alt=\"Card image cap\">'";
        echo "<div class=\"card-body\">";
        echo "<h5 class=\"card-title\">".$res['name']."</h5>";
        echo "</div>";
            echo "<ul class=\"list-group list-group-flush\">";
            echo"<li class=\"list-group-item\">Cantidad : ".$res['qty']."</li>";
            echo  "<li class=\"list-group-item\">Ubicado en : ".$res['inventario']."</li>";
            echo "</ul>";
            echo "<div class=\"card-body\">";
            echo "<a href=\"addReserva1.php?qty=$res[qty]\"> <button type=\"button\" class=\"btn btn-success\">Agregar reserva</button></a> <br><br>
                    <a href=\"edit.php?id=$res[id]\"><button type=\"button\" class=\"btn btn-warning\">Editar</button></a> 
                    <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Estas seguro de eliminar este producto?')\"><button type=\"button\" class=\"btn btn-danger\">Eliminar</button></a></td>";;
                echo"</div>";
        echo"</div>";     
    }
    ?> 
    <nav class="mt-5 ml-5" aria-label="Page navigation example">
  <ul class="pagination">
  <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : '' ?>
    ">
        <a class="page-link" href="viewPanol.php?pagina=<?php echo $_GET['pagina']-1 ?>">
            Anterior
        </a>
    </li>
    <?php for ($i=0; $i < $pagina; $i++) :?>
    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
        <a class="page-link" href="viewPanol.php?pagina=<?php echo $i+1 ?>">
            <?php echo $i+1 ?>
        </a>
    </li>
    <?php endfor ?>
    <li class="page-item <?php echo $_GET['pagina']>=$pagina? 'disabled' : '' ?>
    ">
        <a class="page-link" href="viewPanol.php?pagina=<?php echo $_GET['pagina']+1 ?>">
            Siguiente
        </a>
    </li>
  </ul>
</nav>
</body>
</html>