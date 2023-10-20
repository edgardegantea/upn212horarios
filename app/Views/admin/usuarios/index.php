    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">


<div class="container mt-5">
    
    <h2>Usuarios del sistema</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2" href="<?= site_url('admin/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('admin/usuarios/new'); ?>">Nuevo</a>    
    </div>

    <table class="table table-striped table-justify">
        <thead>
            <th>Nombre del usuario</th>
            <th>Tipo de usuario</th>
            <th>Username</th>
            <th>Correo electrónico</th>
            <th>Sexo</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            
            <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['nombre'] . ' ' . $usuario['apaterno'] . ' ' . $usuario['amaterno'] ?></td>
                    <td>
                        <?php if($usuario['rol'] == 'admin'): ?>
                            Administrador
                        <?php elseif($usuario['rol'] == 'coordinador'): ?>
                            Coordinador
                        <?php elseif($usuario['rol'] == 'docente'): ?>
                            Docente
                        <?php else: ?>
                            Alumno
                        <?php endif; ?>
                    </td>
                    <td><?= $usuario['username']; ?></td>
                    <td><?= $usuario['email']; ?></td>
                    <td>
                        <?php if($usuario['sexo'] == 'f'): ?>
                            Mujer
                        <?php else: ?>
                            Hombre
                        <?php endif; ?>
                    </td>
                    <td>
                        
                        <form class="display-none" method="post" action="<?= base_url('admin/usuarios/'.$usuario['id']); ?>" id="usuarioDeleteForm<?=$usuario['id']?>">
                            <input type="hidden" name="_method" value="DELETE"/>
                            <a href="javascript:void(0)" onclick="deleteUsuario('usuarioDeleteForm<?=$usuario['id']; ?>')" class="btn btn-sm btn-danger" title="Eliminar registro">Eliminar</a>
                        </form>

                        <!-- <span class="fas fa-trash"></span> -->
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


</div>



<script>
    function deleteUsuario(formId) {
        var confirm = window.confirm('Esta operación no se puede revertir. ¿Desea continuar?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>
