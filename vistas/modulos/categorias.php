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
          <table class="table table-bordered table-striped dt-responsive tablas "width="100%">
            <thead>
              <tr>
                <th style="width:25px">#</th>
                <th>Categoria</th>
                <th style="width:350px">Acciones</th>
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
                        <td class="text-uppercase">'.$value["categoria"].'</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>
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
              <button type="button" style="background: #605CA8;" class="close" data-dismiss="modal">&times;</button>
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
              <button type="button" class="btn btn-default pull-left" style="background: #605CA8; color:#fafafa;" data-dismiss="modal">Salir</button>
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

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: #605CA8; color:white;">

          <button type="button" style="background: #605CA8; color:white; " class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                 <input type="hidden"  name="idCategoria" id="idCategoria" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" style="background: #605CA8; color:white;" data-dismiss="modal">Salir</button>

          <button type="submit" style="background: #605CA8; color:white;"class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();

?>
