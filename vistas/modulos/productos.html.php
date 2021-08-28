 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
            <button class="btn btn-primary" style="background: #605CA8;" data-toggle="modal" data-target="#modalAgregarProducto">
              Agregar Producto
            </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas"width="100%">
            <thead>
              <!-- <tr>
                <th style="width:10px">Id</th>
                <th>Imagen</th>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Precio Compra</th>
                <th>Precio de Venta</th>
                <th>Agregado</th>
                <th>Acciones</th>
              </tr> -->
            
            </thead>

            <tbody>

            <?php

                $item = null;
                $valor = null;

                $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

                foreach($productos as $key => $value){

                    echo '
                    <tr>
                    <td>'.($key+1).'</td>
                    <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail " width="40px"></td>
                    <td>'.$value["codigo"].'</td>
                    <td>'.$value["descripcion"].'</td>';
                    
                    $item = "id";
                    $valor = $value["id_categorias"];

                    $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                    echo '


                    <td>'.$categoria["categoria"].'</td>
                    <td>'.$value["stock"].'</td>
                    <td>'.$value["unidades_caja"].'</td>
                    <td>'.$value["precio_caja"].'</td>
                    <td>'.$value["precio_compra"].'</td>
                    <td>'.$value["precio_venta"].'</td>
                    <td>'.$value["fecha"].'</td>
            
                    <td>
                      <div class="btn-group">
                      
                        <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                      </div>
                    </td>
                  </tr>
                    
                    ';
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

  <!-- Ventana modal -->
  <div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Contenido de Modal -->
      <div class="modal-content">

        <form role="form" method="POST"  enctype="multipart/form-data">
      <!-- modal-header -->
            <div class="modal-header" style="background: #605CA8; color:white;">
              <button type="button" style="background: #605CA8;" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Agregar Producto</h4>
            </div>
            <!--Modal-Body  -->
            <div class="modal-body">
              <div class="box-body">
              <!-- Entrada de Formulario -->
              <!-- Codigo de Producto -->
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-code"></i></span>
                      <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar Codigo" required>
                    
                    </div>
                  </div>
              <!--  Entrada de Descripcion -->
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                      <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar Usuario" required>
                    
                    </div>
                  </div>


                  <!-- Entrada seleccion de Categoria -->
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      <select name="nuevaCatagoria" class="form-contorl input-lg">
                        <option value="">Seleccionar Categoria</option>
                        <option value="Cervezas">Cervezas</option>
                        <option value="abarroteria">abarroteria</option>
                        <option value="bebidas">bebidas</option>              
                      </select>
                    </div>
                  </div>

                    <!--  Entrada de Stock -->
                    <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-chek"></i></span>
                      <input type="number" class="form-control input-lg" name="nuevoStock" min ="0" placeholder="Ingrese Stock" required>
                    
                    </div>
                  </div>

                  <!--  Entrada de Precio de compra -->
                  <div class="form-group row">
                    <div class="col-xs-6">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                        <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" min ="0" placeholder="Ingrese Precio de Compra" required>
                      </div>
                    </div>  
          
                  

                  
                   <!--  Entrada de Precio de venta -->
                   <div class="col-xs-6">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                        <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" min ="0" placeholder="Ingrese Precio de Venta" required>
                      
                      </div>

                      <br>
                      <!-- CheckBox para Porcentaje  -->
                      <div class="col-xs-6">
                        <div class="form-group">

                          <label>

                            <input type="checkbox" class="minimal porcentaje" checked>
                            Utilizar Porcentaje

                          </label>
                        </div>

                      </div>

                      <!-- Entrada para Porcentaje  -->

                      <div class="col-xs-6" style="padding:0px;">
                        <div class="input-group">
                          <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                          <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>


                  <!-- Entradad para Subir Imagen -->
                  <div class="form-group">
                    <div class="panel">Subir Imagen</div>
                    <input type="file" id="nuevaImagen" name="nuevaImagen">
                    <p class="help-block">Peso Máximo de la foto 2 MB</p>
                      <img src="vistas/img/productos/default/anonymous.png" class="img-thumbail" width="100px" alt="">
                  </div>


              </div>
              <p></p>
            </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" style="background: #605CA8; color:#fafafa;" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary" style="background: #605CA8;">Guardar producto</button>
          </div>

          <?php
            // $crearUsuario = new ControladorUsuarios();
            // $crearUsuario -> ctrCrearUsuario();
          ?>
        </form> 
      </div>
    </div>
  </div>

  <!-- ventana Modal fin -->

  