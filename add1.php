<?php
session_start();
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
<title>Agregar Material</title>
<?php include("partials/nav.php") ?>
    
    <form action="add.php" method="post" name="form1" enctype="multipart/form-data" class="col">
        <table class="table table-bordered">
                
            <tr> 
                <td>Nombre</td>
                <td><input id="name" type="text" name="name" placeholder="Nombre del material"></td>
            </tr>
            <tr> 
                <td>Cantidad</td>
                <td><input   type="text" name="qty" placeholder="Cantidad ingresados"></td>
            </tr>
            <tr>
                <td>Tipo de inventario </td>
                <td>
                    <select name="tipo">
                            <option value="Panol" >Panol</option>
                            <option value="Punto estudiantil">Punto estudiantil</option>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>Foto</td>
                <td>
                        <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="photo">
                                <label class="custom-file-label" for="customFile">Elige una imagen</label>
                            </div>
                </td>
            </tr>
        </table>
        <input type="submit" name="Submit" value="Guardar">
    </form>
</body>
</html>