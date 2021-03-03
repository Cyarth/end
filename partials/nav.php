<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title></title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<script src="../js/validar.js"></script>
<body>
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light ">
        <a href="index.php" class="navbar-brand"><img src="fotos/duoc.png" width="200" heigth="200" >  |</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link active">Inicio</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Stock</a>
                    <div class="dropdown-menu">
                        <a href="add1.php" class="dropdown-item">Agregar</a>
                        <a href="viewPanol.php" class="dropdown-item">Ver inventario pañol</a>
                        <a href="viewPunto.php" class="dropdown-item">Ver inventario Punto Estudiantil</a>
                        <a href="view.php" class="dropdown-item">Ver todo</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Reservas</a>
                    <div class="dropdown-menu">
                        <a href="viewReservaUser.php" class="dropdown-item">Ver mis reservas</a>
                        <a href="viewReserva.php" class="dropdown-item">Ver todas las reservas</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Reportes</a>
                    <div class="dropdown-menu">
                        <a href="reportMaterial.php" class="dropdown-item">Materiales</a>
                        <a href="reportReserva.php" class="dropdown-item">Reservas</a>
                    </div>
                </div>
            </div>
            <div class="navbar-nav">
                <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
        </div>
    </nav>