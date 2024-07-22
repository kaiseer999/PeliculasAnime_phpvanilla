<?php

//Para redireccionar a una pagina

function redireccionar($pagina){

    header('Location: ' . RUTA_URL . $pagina);
    
}

?>