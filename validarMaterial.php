<?php

    if(isset($_POST['submit'])){
        if(strlen($name) > 10 ){
            echo"<p class='error'>* El nombre es muy largo </p>";
        }
    }

?>