<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">UPN 212 Teziutlán</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= site_url('admin/'); ?>">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= site_url('admin/usuarios'); ?>">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= site_url('admin/carreras'); ?>">Carreras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= site_url('admin/docentes'); ?>">Docentes</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Otras acciones</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>

        <a class="btn btn-light" href="<?= site_url('logout'); ?>">Cerrar sesión</a>
      </div>
    </div>
  </nav>


  <hr>
    Adecuaciones y restricciones
  <hr>
    En vista de docentes agregar botones de aprobación y rechazo con observaciones (enviar notificación a coordinador y subdirector académico).
  <hr>
    El subdirector académico debe aprobar o rechazar las cargas (con observaciones), modificar.
  <hr>
    Modalidades: licenciatura: cuatrimestre, licenciatura en sábado: trimestral, maestrías: cuatrimestre
  <hr>
    Habilitar y/o desahibilitar por periodo de tiempo y por indicación directa del subdirector académico.
  <hr>
    Imprimir y/o descargar comprobante de evaluación docente
  <hr>
    Vistas para cada usuario
  <hr>


  <div class="container">
    <h1 class="">Hoja de asignación de materias</h1>
    <p>Coordinador: <strong>Fermín</strong></p>
    <table class="table table-justified table-striped table-bordered">
      <thead>
        <th>HORARIO</th>
        <th>LUNES</th>
        <th>MARTES</th>
        <th>MIÉRCOLES</th>
        <th>JUEVES</th>
        <th>VIERNES</th>
        <th>SÁBADO</th>
      </thead>
      <tbody>
        <tr>
          <td>8-9</td>
          <td><button class="btn btn-primary">Asignar</button></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td>LEPPMIBR, docente, materia</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>18-19</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>19-20</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>

      </tbody>
    </table>
  </div>


  <hr>


  <div class="container">
    <h1 class="">Hoja de resumen de asignación de materias</h1>
    <p>Coordinador: <strong>Fermín</strong></p>
    <h3>Docente: <strong>Edgar Degante</strong></h3>

    <table class="table table-justified table-striped table-bordered">
      <thead>
        <th>HORARIO</th>
        <th>LUNES</th>
        <th>MARTES</th>
        <th>MIÉRCOLES</th>
        <th>JUEVES</th>
        <th>VIERNES</th>
        <th>SÁBADO</th>
      </thead>
      <tbody>
        <tr>
          <td>8-9</td>
          <td>LEPPMIBR, docente, materia, g1, g2, g3</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td>LEPPMIBR, docente, materia</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8-9</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>18-19</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>19-20</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>

      </tbody>
    </table>
  </div>


