<?php
    include("conexion.php");
    include("partials/headRegistro.php");
?>


    <div class="signup-form">
        
    <form name="form1" method="post" action="">
            <h2>Registrate Como :</h2>
            
            <div class="form-group">
              <input type="button" onclick=" location.href='register.php' " value="Particular" name="btnParticular"  class="btn btn-primary btn-lg" /> 
           
              <input type="button" onclick=" location.href='registroEmpresa.php' " value="Empresa" name="btnEmpresa"  class="btn btn-primary btn-lg" /> 
            </div>
            <a href="login.php" class="pull-right">Volver</a>

            
       
    </div>

    </form>

</body>
</html>