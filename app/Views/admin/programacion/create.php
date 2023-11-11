<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

<h1>Asignación de horarios</h1>

<form>
    <div class="form-group">
        <label for="carrera">Carrera:</label>
        <select class="form-control" name="carrera" id="carrera">
            <?php foreach ($carreras as $carrera): ?>
                <option value="<?= $carrera['id'] ?>"><?= $carrera['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="asignatura">Asignatura:</label>
        <select class="form-control" name="asignatura" id="asignatura" disabled>
            <!-- Aquí se cargarán las asignaturas dependiendo de la carrera seleccionada -->
        </select>
    </div>

    <div class="form-group">
        <label for="docente">Docente:</label>
        <select class="form-control" name="docente" id="docente" disabled>
            <!-- Aquí se cargarán las asignaturas dependiendo de la carrera seleccionada -->
        </select>
    </div>

    <div class="form-group">
        <label for="hora_inicio">Hora de Inicio:</label>
        <input class="form-control" type="time" name="hora_inicio" id="hora_inicio">
    </div>


    <div class="form-group">
        <label for="hora_fin">Hora de Fin:</label>
        <input class="form-control" type="time" name="hora_fin" id="hora_fin">
    </div>

    <div class="form-group">
        <label for="grupo">Grupo:</label>
        <input class="form-control" type="text" name="grupo" id="grupo">
    </div>


    <div class="form-group">
        <label for="dia_semana">Día de la Semana:</label>
        <select class="form-control" name="dia_semana" id="">
            <option value="1">Lunes</option>
            <option value="2">Martes</option>
            <option value="3">Miércoles</option>
            <option value="4">Jueves</option>
            <option value="5">Viernes</option>
            <option value="6">Sábado</option>
        </select>
    </div>

    <div class="form-group">
        <label for="modalidad">Modalidad:</label>
        <input class="form-control" type="text" name="modalidad" id="modalidad">
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>

</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#carrera').change(function () {
            var carreraId = $(this).val();

            // Hacer una solicitud Ajax para obtener las asignaturas de la carrera seleccionada
            $.ajax({
                url: '<?= base_url('admin/programacion/getAsignaturasByCarrera/') ?>' + carreraId,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    var options = '<option value="">Seleccionar Asignatura</option>';

                    for (var i = 0; i < response.length; i++) {
                        options += '<option value="' + response[i].id + '">' + response[i].clave_asignatura + ' ' +  response[i].nombre_asignatura + '</option>';
                    }

                    $('#asignatura').html(options);
                    $('#asignatura').prop('disabled', false);
                },
                error: function (error) {
                    console.log(error);
                }
            });

            // Hacer una solicitud Ajax para obtener los docentes de la carrera seleccionada
            $.ajax({
                url: '<?= base_url('admin/programacion/getDocentesByCarrera/') ?>' + carreraId,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    var options = '<option value="">Seleccionar Docente</option>';

                    for (var i = 0; i < response.length; i++) {
                        options += '<option value="' + response[i].id + '">' + response[i].nombre + ' ' + response[i].apaterno + ' ' + response[i].amaterno + '</span></option>';
                    }

                    $('#docente').html(options);
                    $('#docente').prop('disabled', false);
                },
                error: function (error) {
                    console.log(error);
                }
            });

        });


    });


</script>


<?= $this->endSection(); ?>
