
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
 $registros = mysqli_query($mysqli, "SELECT * from procesar");
 ?>
 

     <h1>Busqueda de Muestras </h1>
 
     <table width='80%' border=0>
     <tr bgcolor='#CCCCCC'>
         <td>Codigo Analisis</td>
         <td>Estado </td>
     </tr>
     
 <?php
 
 
 
 
 
 while ($reg = mysqli_fetch_array($registros)) {
     echo "<tr>";
     echo "<td>".$reg['idA']."</td>";
     echo "<td>".$reg['estado']."</td>";
   
    
  
     }
 
 ?> 
 
 </table>
 </body>
 </html>