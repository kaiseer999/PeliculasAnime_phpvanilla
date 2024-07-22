<?php require_once(RUTA_APP . '\vistas\inc\Adminheader.php'); ?>



<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">NombreUsuario</th>
                <th scope="col">Contraseña</th>
                <th scope="col">CorreoElectronico</th>
                <th scope="col">Rol</th>

            </tr>
        </thead>
        <tbody>
        <?php foreach($datos['usuario'] as $user) : ?>  

            <tr class="">
            <td><?php echo $user->NombreUsuario?></td>
            <td><?php echo $user->Contraseña?></td>
            <td><?php echo $user->CorreoElectronico?></td>
            <td><?php echo $user->Rol?></td>
            <td>
            <button class="btn btn-primary" onclick="location.href=''">
                Editar
            </button>
            </td>
            <td>
                <button class="btn btn-danger" onclick="location.href=''">
                    Eliminar
                </button>
            </td>




            
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>











<?php require_once(RUTA_APP . '\vistas\inc\Adminfooter.php'); ?>