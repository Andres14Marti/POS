 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
              Agregar Usuario
            </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>estado</th>
                <th>Ultimo login</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>

            <tr>
              <td>1</td>
              <td>Usuario Administrador</td>
              <td>admin</td>
              <td><img src="vistas/img/default/anonymous.png" class="img-thumbnail " width="40px" alt="perfil"></td>
              <td>Administrador</td>
              <td><button class="btn btn-success btn-xs">Activado</button></td>
              <td>2021-04-04 03:09:10</td>
              <td>
                <div class="btn-group">
                
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Ventana modal -->


  <!-- ventana Modal fin -->

  <div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Contenido de Modal -->
      <div class="modal-content">
      <!-- modal-header -->
        <div class="modal-header">
          <button type="button" class="close" data-simiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <!--Modal-Body  -->
        <div class="modal-body">
          <p>Algo mas</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" dtat-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>