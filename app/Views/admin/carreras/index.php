<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

<?php $this->docentesCarrerasModel = new \App\Models\DocentesCarrerasModel(); ?>
<?php $this->carrerasAsignaturasModel = new \App\Models\CarrerasAsignaturasModel(); ?>



<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<div class="">
    
    <h2>Carreras</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('admin/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('admin/carreras/new'); ?>">Nuevo</a>    
    </div>

    <table id="example" class="table table-striped table-justify">
        <thead>
            <th>CARRERAS</th>
            <th>TIPO</th>
            <th>DOCENTES</th>
            <th>ASIGNATURAS</th>
            <th>ACCIONES</th>
        </thead>
        <tbody>

            <?php foreach($carreras as $carrera): ?>
                <tr>
                    <td><?= $carrera['nombre']; ?></td>
                    <td><?= $carrera['tipo']; ?></td>
                    <td>
                        <a class="btn btn-sm btn-secondary mr-1" href="<?= base_url('admin/carreras/asignarDocentes/'.$carrera['id']); ?>">Agregar docentes</a>
                        <!-- Enlace para ver docentes adscritos -->
                        <a class="btn btn-sm btn-secondary mr-1" href="<?= base_url('admin/carreras/vdxc/'.$carrera['id']); ?>">Ver <?= count($this->docentesCarrerasModel->where('carrera', $carrera['id'])->findAll()); ?> docentes</a>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-secondary mr-1" href="<?= base_url('admin/carreras/asignarAsignaturas/'.$carrera['id']); ?>">Agregar Asignaturas</a>
                        <!-- Enlace para ver docentes adscritos -->
                        <a class="btn btn-sm btn-secondary mr-1" href="<?= base_url('admin/carreras/vaxc/'.$carrera['id']); ?>">Ver <?= count($this->carrerasAsignaturasModel->where('carrera', $carrera['id'])->findAll()); ?> asignaturas</a>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url('admin/carreras/'.$carrera['id'].'/edit'); ?>" class="btn btn-sm btn-light me-md-2 mr-1"><i class="fas fa-edit"></i></a>
                            <form class="display-none" method="post" action="<?= base_url('admin/carreras/'.$carrera['id']); ?>" id="carreraDeleteForm<?=$carrera['id']?>">
                                <input type="hidden" name="_method" value="DELETE"/>
                                <a href="javascript:void(0)" onclick="deleteCarrera('carreraDeleteForm<?=$carrera['id']; ?>')" class="btn btn-sm btn-danger" title="Eliminar registro"><i class="fas fa-trash"></i></a>
                            </form>
                        </div>
                        
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
        <tfoot>
            <th>CARRERAS</th>
            <th>TIPO</th>
            <th>DOCENTES</th>
            <th>ASIGNATURAS</th>
            <th>ACCIONES</th>
        </tfoot>
    </table>


</div>



<script>
    function deleteCarrera(formId) {
        var confirm = window.confirm('Esta operación no se puede revertir. ¿Desea continuar?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection() ?>