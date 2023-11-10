<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <h2>Asignaturas de la Carrera</h2>

    <div>
        <table id="example" class="table table-striped table-justify">
            <thead>
            <tr>
                <th>Clave</th>
                <th>Asignatura</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($asignaturasxc as $axc): ?>
                <tr>
                    <td><?= $axc['clave']; ?></td>
                    <td><span class="text-uppercase"><?= $axc['asignatura']?></span></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


<?= $this->endSection() ?>