<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>

    <div class="container">
        <h2 class="mt-5">Crear Usuario</h2>


        <form class="mb-5" action="<?= site_url('/admin/carreras/store'); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="row mb-3">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombre:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="descripcion">Información adicional:</label>
                        <input class="form-control" type="text" id="descripcion" name="descripcion" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3 mt-5">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </div>
            </div>
            
        </form>
    </div>
</body>
</html>
