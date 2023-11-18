<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>


    <h1>Horarios</h1>
    <a class="btn btn-primary mb-3" href="<?= site_url('admin/programacion/create') ?>">Asignar Horario</a>
    <a class="btn btn-primary mb-3" href="<?= site_url('admin/programacion/createxd') ?>">Asignar horario por docente</a>
    <table class="table table-justify table-bordered table-stripped">
        <tr>
            <th>ID</th>
            <th>Materia ID</th>
            <th>Docente ID</th>
            <th>Carrera ID</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Día Semana</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($programacion as $programa) : ?>
            <tr>
                <td><?= $programa['id']; ?></td>
                <td><?= $programa['asignatura']; ?></td>
                <td><?= $programa['docente']; ?></td>
                <td><?= $programa['carrera']; ?></td>
                <td>
                    <?= $programa['dia_semana1'] ?>
                    <?= $programa['hora_inicio1']; ?>
                    <?= $programa['hora_fin1'] ?>
                </td>
                <td>
                    <?= $programa['dia_semana2'] ?>
                    <?= $programa['hora_inicio2']; ?>
                    <?= $programa['hora_fin2'] ?>
                </td>

                <td>
                    <a href="/programacion/edit/<?= $programa['id']; ?>">Editar</a>
                    <a href="/programacion/delete/<?= $programa['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    
    <?= $this->endSection(); ?>