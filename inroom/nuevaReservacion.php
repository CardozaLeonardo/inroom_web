<?php 
   
   include('includes.php');
   include_once './vendor/autoload.php';

   $tipoModEmp = new TipoProductoModelo();
   $tipoHabMod = new TipoHabitacionModelo();
   $habMod = new HabitacionModelo();
   $reservMod = new ReservacionModelo();
   $title = "InRoom | Nueva Reservación";

   $loader = new Twig_Loader_Filesystem('./template');

   $twig = new Twig_Environment($loader, []);


?>


<!doctype html>
<html class="no-js" lang="en">
    <!-- Renderizando el head -->
    <?php echo $twig->render('head.html', compact('title')); ?>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                
                <?php echo $twig->render('navbar.html'); ?>

                <?php echo $twig->render('sidebar.html'); ?>
                
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content forms-page">
                    <div class="title-block">
                        <h3 class="title"> Forms </h3>
                        <p class="title-description"> Sample form elements </p>
                    </div>
                    <div class="subtitle-block">
                        <h3 class="subtitle"> Nuevo Producto </h3>
                    </div>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-8">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Registre un reservación </h3>
                                    </div>
                                    <form role="form" name="nuevoProducto" method="POST" action="control/Producto.control.php">
                                        <input name="action" type="hidden" value="1">
                                        <div class="form-group">
                                            <label class="control-label">Número de reservación</label>
                                            <input id="numberReserv" name="numberReserv" value="<?php echo $reservMod->getNewNumber(); ?>" type="text" class="form-control boxed">
                                        </div>
                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label">Tipo de habitación</label>
                                            <select id="selecTipoHab" name="tipoProducto" class="form-control">
                                                <?php foreach($tipoHabMod->listarTipoHab() as $r): ?>
                                                    <option value="<?php echo $r->__GET('id_tipoHabitacion'); ?>"><?php echo $r->__GET('descripcion'); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Seleccione</label>
                                            <select id="selectRoom" name="habitacion" class="form-control">
                                                <?php foreach($habMod->getHabitaciones() as $r): ?>
                                                    <option value="<?php echo $r->__GET('id_habitacion'); ?>"><?php echo $r->__GET('numero'); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        
                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label">Hora de entrada</label>
                                            <input id="horaEntrada" type="time" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Fecha de entrada</label>
                                            <input id="fechaEntrada" placeholder="DD/MM/YYYY" type="date" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Hora de salida</label>
                                            <input id="horaSalida" type="time" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Fecha de salida</label>
                                            <input id="fechaSalida" placeholder="DD/MM/YYYY" type="date" class="form-control boxed">
                                        </div>

                                        <button id="btnAddRoom" type="button" class="btn btn-primary">Agregar habitación</button>
                                        <br><br><br>
                                        <div class="table-flip-scroll">
                                                <table id="tblProductos" class="table table-striped table-bordered table-hover flip-content">
                                                    <thead class="flip-header">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Descripcion</th>
                                                            <th>Costo</th>
                                                            <th>Precio</th>
                                                            <th>Tipo</th>
                                                            <th>Marca</th>
                                                            <th>Impuesto</th>
                                                            <th>Vencimiento</th>
                                                            <th>Código de barras</th>
                                                            <th>Opciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($productoMod->getProductos() as $r): ?>
                                                        <tr>
                                                           <td><?php echo $r->__GET('id_producto'); ?></td>
                                                           <td><?php echo $r->__GET('descripcion'); ?></td>
                                                           <td><?php echo $r->__GET('costo'); ?></td>
                                                           <td><?php echo $r->__GET('precio'); ?></td>
                                                           <td><?php echo $r->__GET('tipoProducto'); ?></td>
                                                           <td><?php echo $r->__GET('marca'); ?></td>
                                                           <td><?php echo $r->__GET('impuesto'); ?></td>
                                                           <td><?php echo $r->__GET('fecha_vencimiento'); ?></td>
                                                           <td><?php echo $r->__GET('codigo_barra'); ?></td>
                                                            <td>
                                                                <a title="Editar" href="editProducto.php?user=<?php echo $r->__GET('id_producto'); ?>">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                &nbsp;&nbsp;
                                                                <a title="Eliminar" href="control/Producto.control.php?user=<?php echo $r->__GET('id_producto'); ?>">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                     <?php endforeach; ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                                        
                                    </form>
                                </div>
                            </div>

                            <div id="rooms-list" class="col-md-4 bg-white">
                                <div class="subtitle-block">
                                    <h3 class="subtitle text-center"> Habitaciones</h3>
                                </div>

                                <!-- <div class="col-12 room-item">
                                    <p>K-12</p>
                                    <i id="remove-room" class="fa fa-times delete-room"></i>

                                </div> -->
                            </div>
                            
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div class="modal fade" id="confirm-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><i class="fa fa-warning"></i> Alert</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to do this?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>

        <script src="DataTables/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
        <!-- DATATABLE -->
  <script src="DataTables/DataTables-1.10.18/js/jquery.dataTables.js"></script>

  <!-- DATATABLE buttons -->
  <script src="DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>

  <!-- js Datatable buttons print -->
  <script src="DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
  <script src="DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>

   <!-- js Datatable buttons pdf -->
  <script src="DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>

  <!-- js Datatable buttons excel -->
  <script src="DataTables/JSZip-2.5.0/jszip.min.js"></script>

  <script>
    $(document).ready(function (){
      $('#tblProductos').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'pdf',
        'excel',
        'print'
        ]

      });
    });

        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
        <script src="js/reservacion.js"></script>
    </body>
</html>