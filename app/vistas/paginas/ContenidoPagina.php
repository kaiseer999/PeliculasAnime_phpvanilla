<?php require_once(RUTA_APP . '\vistas\inc\Adminheader.php'); ?>



<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">IdAnime</th>
                <th scope="col">Video</th>
                <th scope="col">TipoVideo</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($datos['videos'] as $videos) : ?>  

            <tr class="">
            <td><?php echo $videos->IdAnime?></td>
            <td><?php echo $videos->NombreVideo?></td>
            <td><?php echo $videos->TipoVideo?></td>




            
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>











<?php require_once(RUTA_APP . '\vistas\inc\Adminfooter.php'); ?>
