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
            <button class="btn btn-primary" style="background: #605CA8;" data-toggle="modal" data-target="#modalAgregarUsuario">
              Agregar Usuario
            </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
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
  <div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Contenido de Modal -->
      <div class="modal-content">

        <form role="form" method="POST"  enctype="multipart/form-data">
      <!-- modal-header -->
            <div class="modal-header" style="background: #605CA8; color:white;">
              <button type="button" style="background: #605CA8;" class="close" data-simiss="modal">&times;</button>
              <h4 class="modal-title">Agregar Usuario</h4>
            </div>
            <!--Modal-Body  -->
            <div class="modal-body">
              <div class="box-body">
              <!-- Entrada de Formulario -->
              <!-- Nombre -->
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>
                    
                    </div>
                  </div>
              <!--  Entrada de Usuario -->
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"></i></span>
                      <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" required>
                    
                    </div>
                  </div>

                  <!-- Entrada de PWD -->

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                      <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>
                    
                    </div>
                  </div>

                  <!-- Entrada seleccion de Perfil -->
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="nuevoPerfil" class="form-contorl input-lg">
                        <option value="">Seleccionar Perfil</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Especial">Especial</option>
                        <option value="Administrador">Vendedor</option>
                      
                      </select>
                    </div>
                  </div>


                  <!-- Entradad para Subir Foto -->
                  <div class="form-group">
                    <div class="panel">Subir Foto</div>
                    <input type="file" id="nuevaFoto" name="nuevaFoto">
                    <p class="help-block">Peso Máximo de la foto 200 MB</p>
                      <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbail" width="100px" alt="">
                  </div>


              </div>
              <p></p>
            </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" style="background: #605CA8; color:#fafafa;" dtat-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary" style="background: #605CA8;">Guardar Usuario</button>
          </div>

          <?php
            $crearUsuario = new ControladorUsuarios();
            $crearUsuario -> ctrCrearUsuario();
          ?>
        </form> 
      </div>
    </div>
  </div>

  <!-- ventana Modal fin -->

  