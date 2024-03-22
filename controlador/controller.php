<?php

if (isset($_REQUEST['guardarproducto'])) {
    include_once "../../wholemart1.2/modelo/nuevo_producto.php";
}
    else {
        ?>
    
            <div class="alert alert-danger" role="alert">
                ERROR AL GUARDAR.
            </div>
            <?php
            
        }
        ?>