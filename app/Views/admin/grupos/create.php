<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

    <div class="">
        <h2 class="mt-5">Registrar carrera</h2>


        <form class="mb-5" action="<?= base_url('admin/grupos'); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label" for="clave">Clave del grupo:</label>
                        <input class="form-control" type="text" id="clave" name="clave" required>
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombre del grupo:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" required>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Selecionar periodo escolar:</label>
                        <select name="periodo_escolar" id="">
                            <?php foreach ($pescolares as $pe): ?>
                            <option value="<?= $pe['id'] ?>"><?= $pe['nombre'] ?> [<?= $pe['fecha_inicio'] . ' - ' . $pe['fecha_fin'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"></div>
                </div>
            </div>
            

            <div class="row mb-3 mt-5">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </div>
            </div>
            
        </form>
    </div>



    <?= $this->endSection() ?>