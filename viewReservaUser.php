
<?php

session_start();

if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
$idUser=$_SESSION['id'];
include_once("conexion.php");
include("partials/nav.php");
$reserva_x_pagina=8;


$result = mysqli_query($mysqli, "SELECT * FROM reserva where loginId = '$idUser'");
if (isset($result)) {
    $row_cnt = mysqli_num_rows($result);

}
$pagina= ceil($row_cnt/$reserva_x_pagina);
?>

<?php
        if(!$_GET){
            header('location:viewReservaUser.php?pagina=1');
        }
        ;
    ?>
 
<table class="table table-bordered">
<thead>
    <tr>
        <th>Nombre Alumno</th>
        <th>Rut</th>
        <th>Email</th>
        <th>Numero Celular</th>
        <th>Cantidad a reservar</th>
        <th>Fecha reserva</th>
        <th>Fecha Entrega</th>
        <th>Accion</th>
    </tr> 
</thead>
    <tbody>

    <?php
    $iniciar = ($_GET['pagina']-1)*$reserva_x_pagina;
    $result2 = mysqli_query($mysqli, "SELECT * FROM reserva where loginId = '$idUser' LIMIT $iniciar,$reserva_x_pagina");
    while($res = mysqli_fetch_array($result2)) {        
        echo "<tr>";
        echo "<td>".$res['nombreAlumno']."</td>";
        echo "<td>".$res['rut']."</td>";
        echo "<td>".$res['emailAlumno']."</td>";
        echo "<td>".$res['numeroCel']."</td>";
        echo "<td>".$res['cantidad']."</td>";
        echo "<td>".$res['fechaReserva']."</td>";  
        echo "<td>".$res['fechaEntrega']."</td>"; 
        echo "<td><a href=\"deleteMyReserva.php?idReserva=$res[idReserva]\" onClick=\"return confirm('Estas seguro de eliminar esta reserva?')\">Eliminar</a></td>";
    }
    ?>
</tbody>
</table>  
<nav class="mt-5 ml-5" aria-label="Page navigation example">
  <ul class="pagination">
  <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : '' ?>
    ">
        <a class="page-link" href="viewReservaUser.php?pagina=<?php echo $_GET['pagina']-1 ?>">
            Anterior
        </a>
    </li>
    <?php for ($i=0; $i < $pagina; $i++) :?>
    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
        <a class="page-link" href="viewReservaUser.php?pagina=<?php echo $i+1 ?>">
            <?php echo $i+1 ?>
        </a>
    </li>
    <?php endfor ?>
    <li class="page-item <?php echo $_GET['pagina']>=$pagina? 'disabled' : '' ?>
    ">
        <a class="page-link" href="viewReservaUser.php?pagina=<?php echo $_GET['pagina']+1 ?>">
            Siguiente
        </a>
    </li>
  </ul>
</nav>   
</body>
</html>