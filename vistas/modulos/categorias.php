<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Categorias
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Categorias</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
            <button class="btn btn-primary" style="background: #605CA8;" data-toggle="modal" data-target="#modalAgregarCategoria">
              Agregar Categorias
            </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th style="width:10px">Id</th>
                <th>Categoria</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>

            <?php

              $item = null;
              $valor = null;

              $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

              foreach($categorias as $key => $value){

                echo ' <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["categoria"].'</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger"><i class="fa fa-times"></i></button>
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

<!-- // =============================================================================
    //  Ventana Modal Categoria Agregar
    // =============================================================================
-->
  <div id="modalAgregarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog"> 

      <!-- Contenido de Modal -->
      <div class="modal-content">

        <form role="form" method="POST">
      <!-- modal-header -->
            <div class="modal-header" style="background: #605CA8; color:white;">
              <button type="button" style="background: #605CA8;" class="close" data-simiss="modal">&times;</button>
              <h4 class="modal-title">Agregar Categoria</h4>
            </div>
            <!--Modal-Body  -->
            <div class="modal-body">
              <div class="box-body">
              <!-- Entrada de Formulario -->
              <!-- Nombre -->
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      <input type="text" class="form-control input-lg" id = "nuevaCategoria"name="nuevaCategoria" placeholder="Ingresar Nombre de categoria" required>
                    
                    </div>
                </div>
              </div>
              <p></p>
            </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" style="background: #605CA8; color:#fafafa;" dtat-dismiss="modal">Salir</button>
              <button type="submit" class="btn btn-primary" style="background: #605CA8;">Guardar Categoria</button>
          </div>

          <?php

            $crearCategoria = new ControladorCategorias();
            $crearCategoria -> ctrCrearCategoria();

          ?>
        </form> 
      </div>
    </div>
  </div>

  <!-- ventana Modal fin -->