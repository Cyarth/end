
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
 

     <h1>ADMINISTRAR</h1>
 
     <table width='80%' border=0>
     <tr bgcolor='#CCCCCC'>
         <td>ID Analisis </td>
         <td>Fecha de Recepcion  </td>
         <td> Temperatura De Muestra </td>
         <td> Cantidad De Muestra  </td>
         <td> Codgio Particular  </td>
         <td> Tipo de Analisis  </td>
         <td> Nombre de Analisis </td>
         <td> Acciones  </td>
     </tr>
     
 <?php
 
 
 
 
 
 while ($reg = mysqli_fetch_array($registros)) {
     echo "<tr>";
     echo "<td>".$reg['idAnalisis']."</td>";
     echo "<td>".$reg['fechaRecepcion']."</td>";
     echo "<td>".$reg['temperaturaMuestra']."</td>";
     echo "<td>".$reg['cantidadMuestra']."</td>";
     echo "<td>".$reg['particularCod']."</td>";
     echo "<td>".$reg['tipo']."</td>";
     echo "<td>".$reg['nombre']."</td>";
   
    echo "<td><a href=\"actualizar.php?codigoParticular=$reg[particularCod]\">Editar</a> | <a href=\"delete.php?codigoParticular=$reg[particularCod]\" onClick=\"return confirm('Estas seguro de borrar esta vivienda?')\">Eliminar</a></td>";
     echo "</tr>";
  
     }
 
 ?> 
 
 </table>
 </body>
 </html>