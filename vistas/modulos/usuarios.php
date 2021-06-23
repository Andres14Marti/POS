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
                <th style="width:10px">Id</th>
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

            <?php

              $item = null;
              $valor = null;

              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

              foreach($usuarios as $key => $value){
                echo '<tr>
                        <td>'.$value["id"].'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["usuario"].'</td>';

                        if($value["foto"] != ""){
                          echo '<td><img src="'.$value["foto"].'" class="img-thumbnail " width="40px" alt="perfil"></td>';
                        }else{
                          echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail " width="40px" alt="perfil"></td>';
                        }

                        echo '<td>'.$value["perfil"].'</td>';

                          if($value["estado"] != 0){

                            echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                          }else{

                            echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                          }             

                          echo '<td>'.$value["ultimo_login"].'</td>
                          <td>

                            <div class="btn-group">
                                
                              <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                              <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

                            </div>  

                          </td>

                        </tr>';
              }


            ?>

            
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

  <!--

    Ventana modal  AGREGAR USUARIO
    
    -->
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
                        <option value="Vendedor">Vendedor</option>
                      
                      </select>
                    </div>
                  </div>


                  <!-- Entradad para Subir Foto -->
                  <div class="form-group">
                    <div class="panel">Subir Foto</div>
                    <input type="file" class="nuevaFoto" name="nuevaFoto">
                    <p class="help-block">Peso Máximo de la foto 2 MB</p>
                      <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbail previsualizar" width="100px" alt="">
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
<!-- 
  ############################################## 
  ############################################## 
      
  -->


  <!--

    Ventana modal  EDITAR USUARIO
    
    -->
    <div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Contenido de Modal -->
      <div class="modal-content">

        <form role="form" method="POST"  enctype="multipart/form-data">

      <!-- modal-header -->
            <div class="modal-header" style="background: #605CA8; color:white;">
              <button type="button" style="background: #605CA8;" class="close" data-simiss="modal">&times;</button>
              <h4 class="modal-title">Editar Usuario</h4>
            </div>

            <!--Modal-Body  -->
            <div class="modal-body">
              <div class="box-body">
              <!-- Entrada de Formulario -->
              <!-- Nombre -->
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
                    
                    </div>
                  </div>


              <!--  Entrada de Usuario -->
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"></i></span>
                      <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value=""  readonly>
                    
                    </div>
                  </div>

                  <!-- Entrada de PWD -->

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                      <input type="password" class="form-control input-lg" name="editarPassword" placeholder=" nueva contraseña">
                      <input type="hidden" id="passwordActual" name="passwordActual">
                    
                    </div>
                  </div>

                  <!-- Entrada seleccion de Perfil -->
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="editarPerfil" class="form-contorl input-lg">
                        <option value="" id="editarPerfil"></option>
                        <option value="Administrador">Administrador</option>
                        <option value="Especial">Especial</option>
                        <option value="Vendedor">Vendedor</option>
                      
                      </select>
                    </div>
                  </div>


                  <!-- Entradad para Subir Foto -->
                  <div class="form-group">
                    <div class="panel">Subir Foto</div>
                    <input type="file" class="nuevaFoto" name="editarFoto">
                    <p class="help-block">Peso Máximo de la foto 2 MB</p>
                      <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbail previsualizar" width="100px" alt="">
                      <input type="hidden" name="fotoActual" id="fotoActual">
                  </div>


              </div>
              <p></p>
            </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" style="background: #605CA8; color:#fafafa;" dtat-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary" style="background: #605CA8;">Modificar Usuario</button>
          </div>

          <?php
             $editarUsuario = new ControladorUsuarios();
             $editarUsuario -> ctrEditarUsuario();
          ?>
        </form> 
      </div>
    </div>
  </div>

  <!-- ventana Modal fin -->

  <!-- Borra Usuarios -->

      <?php

      $borrarUsuario = new ControladorUsuarios();
      $borrarUsuario -> ctrBorrarUsuario();

    ?> 