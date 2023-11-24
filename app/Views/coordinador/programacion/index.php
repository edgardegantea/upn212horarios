<?= $this->extend('template/bodyCoordinador') ?>

<?= $this->section('content') ?>


    <h1>Horarios</h1>
    <a class="btn btn-primary mb-3" href="<?= site_url('coordinador/programacion/create') ?>">Asignar Horario</a>
    <a class="btn btn-primary mb-3" href="<?= site_url('coordinador/programacion/createxd') ?>">Asignar horario por docente</a>
    <table id="example" class="table table-justify table-bordered table-stripped">
        <thead>
            <th>ID</th>
            <th>ASIGNATURA</th>
            <th>DOCENTE</th>
            <th>CARRERA</th>
            <th>HORARIO</th>
            <th>Acciones</th>
        </thead>

        <tbody>
        <?php foreach ($programacion as $programa) : ?>
            <tr>
                <td><?= $programa['id']; ?></td>
                <td><?= $programa['materia_id']; ?></td>
                <td><span class="text-uppercase"><?= $programa['docente']; ?></span></td>
                <td><?= $programa['carrera']; ?></td>
                <td class="text-center">
                    <?php if ($programa['dia_semana1'] == 1): ?>
                        Lunes
                    <?php elseif ($programa['dia_semana1'] == 2): ?>
                        Martes
                    <?php elseif ($programa['dia_semana1'] == 3): ?>
                        Miércoles
                    <?php elseif ($programa['dia_semana1'] == 4): ?>
                        Jueves
                    <?php elseif ($programa['dia_semana1'] == 5): ?>
                        Viernes
                    <?php else: ?>
                        Sábado
                    <?php endif; ?>

                    <p>
                        <?= $programa['hora_inicio1']; ?> -
                        <?= $programa['hora_fin1'] ?>
                    </p>

                    <hr>
                    <?php if ($programa['dia_semana2'] == 1): ?>
                        Lunes
                    <?php elseif ($programa['dia_semana2'] == 2): ?>
                        Martes
                    <?php elseif ($programa['dia_semana2'] == 3): ?>
                        Miércoles
                    <?php elseif ($programa['dia_semana2'] == 4): ?>
                        Jueves
                    <?php elseif ($programa['dia_semana2'] == 5): ?>
                        Viernes
                    <?php else: ?>
                        Sábado
                    <?php endif; ?>
                    <p>
                        <?= $programa['hora_inicio2']; ?> -
                        <?= $programa['hora_fin2'] ?>
                    </p>

                </td>

                <td>
                    <a href="/coordinador/programacion/edit/<?= $programa['id']; ?>">Editar</a>
                    <a href="/coordinador/programacion/delete/<?= $programa['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

        <tfoot>
        <th>ID</th>
        <th>ASIGNATURA</th>
        <th>DOCENTE</th>
        <th>CARRERA</th>
        <th>HORARIO</th>
        <th>Acciones</th>
        </tfoot>

    </table>

    
    <?= $this->endSection(); ?>