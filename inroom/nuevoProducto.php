<?php 
   
   include('includes.php');
   include_once './vendor/autoload.php';

   $user = new TipoProductoModelo();

   $loader = new Twig_Loader_Filesystem('./template');
   $title = "InRoom | Nuevo Producto";

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
                                        <h3 class="title"> Registre un producto </h3>
                                    </div>
                                    <form role="form" name="nuevoProducto" method="POST" action="control/Producto.control.php">
                                        <input name="action" type="hidden" value="1">
                                        <input id="opc"name="opc" type="hidden" value="1">
                                        
                                        <div class="form-group">
                                            <label class="control-label">Descripcion</label>
                                            <input required value="" name="descripcion" type="text" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Tipo de producto</label>
                                            <select required id="tipoProducto" name="tipoProducto" class="form-control">
                                                <option value="">Seleccionar</option>
                                            <?php foreach($user->listarTipoPro() as $r): ?>
                                                <option value="<?php echo $r->__GET('id_tipoProducto'); ?>"><?php echo $r->__GET('tipoProducto'); ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Costo</label>
                                            <input id="costo" value="" name="costo" placeholder="C$ 00.00" type="text" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Precio</label>
                                            <input required value="" name="precio" placeholder="C$ 00.00" type="number" class="form-control boxed" min="1" step=".01">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Impuesto</label>
                                            <input name="impuesto" value="" placeholder="C$ 00.00" type="text" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Marca</label>
                                            <input id="marca" name="marca" value="" type="text" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Fecha de vencimiento</label>
                                            <input id="vencimiento" name="vencimiento" value="" placeholder="DD/MM/YYYY" type="date" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Stock</label>
                                            <input id="stock" name="stock" value="" placeholder="0" type="number" class="form-control boxed" min="0" step="1">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Código de barras</label>
                                            <input id="codigoBarras"name="codigoBarras" value="" type="text" class="form-control boxed">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                                        
                                    </form>
                                </div>
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
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>