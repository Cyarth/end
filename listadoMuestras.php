
<?php session_start(); ?>
 
 <?php
 if(!isset($_SESSION['valid'])) {
     header('Location: login.php');
 }
 ?>
 
 <?php
 //including the database connection file
 include_once("conexion.php");
  
 //fetching data in descending order (lastest entry first)
 $registros = mysqli_query($mysqli, "SELECT * from analisismuestras");
 ?>
 

     <h1>Lista de Muestras a Procesar</h1>
 
     <table width='80%' border=0>
     <tr bgcolor='#CCCCCC'>
         <td>Codigo de Usuario</td>
         <td>Codigo de Muestra </td>
         <td>Accion</td>
     </tr>
     
 <?php
 
 
 
 
 
 while ($reg = mysqli_fetch_array($registros)) {
     echo "<tr>";
     echo "<td>".$reg['particularCod']."</td>";
     echo "<td>".$reg['idAnalisis']."</td>";
   
     echo "<td>  <a href=procesar.php>Procesar </a></td> ";
     echo "</tr>";
  
     }
 
 ?> 
 
 </table>
 </body>
 </html>