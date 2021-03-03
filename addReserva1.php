
<?php
session_start();
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}

?>
<title>Agregar Reserva</title>
<?php  include("partials/nav.php");?>

    <form action="addReserva.php" method="post" name="form1" enctype="multipart/form-data">
        <table class="table table-bordered">
            <tr> 
                <td>Nombre Alumno : </td>
                <td><input type="text" name="nombre" placeholder="Ingrese nombre"></td>
            </tr>
            <tr>
                <td>rut Alumno :</td>
                <td><input type="number" name="rut" placeholder="rut"></td>
            </tr>
            <tr> 
                <td>Email Alumno : </td>
                <td><input type="text" name="email" placeholder="Ingrese email"></td>
            </tr>
            <tr> 
                <td>Numero Celular</td>
                <td><input type="tel" name="numero" placeholder="Ingrese numero"></td>
            </tr>
            <tr>
                <td>Fecha de entrega :</td>
                <td><input type="date" name="fechaReserva"></td>
            </tr>
            <tr>
                <td>Cantidad a reservar :</td>
                <td><input type="number" name="cantidad" placeholder="Cantidad a reservar"></td>
            </tr>
                
        </table>
        <input button onclick="suma()" type="submit" name="Enviar" value="Guardar">
    </form>
</body>
</html>