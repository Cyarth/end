




<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}?> 



<?php

        //including the database connection file
       include_once("conexion.php");
  
    
    ?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['tipo', 'CantidadPPM'],
           
          
          <?php
         
              

               $registros = mysqli_query($mysqli, "SELECT * from procesar");
           while ($reg = mysqli_fetch_array($registros)) {
            $tipoA = $reg['tipoA'];
            $cantidadPPM=$reg['cantidadPPM'];
            $idA=$reg['idA'];
           ?>    
           

          ['<?php echo $tipoA;?>', '<?php echo $cantidadPPM;?>'],
        
         <?php }?> 

        
       
         

        
        ]);

            

        var options = {
          chart: {
            title: 'Grafica Reporte de Muestras ',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 98%; height: 500px;"></div>
  </body>
</html>