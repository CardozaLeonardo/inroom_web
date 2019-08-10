<?php 
   
   include('includes.php');
   include_once './vendor/autoload.php';

   $tipoModEmp = new TipoHabitacionModelo();

   $loader = new Twig_Loader_Filesystem('./template');
   $title = "InRoom | Nueva Habitacion";

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
                        <h3 class="subtitle"> Nueva Habitacion </h3>
                    </div>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-8">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Registre una habitación </h3>
                                    </div>
                                    <form role="form" name="nuevaHabitacion" method="POST" action="control/Habitacion.control.php">
                                        <input name="action" type="hidden" value="1">
                                        <div class="form-group">
                                            <label class="control-label">Número</label>
                                            <input name="numero" type="text" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Tipo de habitación</label>
                                            <select name="tipoHabitacion" class="form-control">
                                            <?php foreach($tipoModEmp->listarTipoHab() as $r): ?>
                                                <option value="<?php echo $r->__GET('id_tipoHabitacion'); ?>"><?php echo $r->__GET('descripcion'); ?></option>
                                            <?php endforeach; ?>
                                            </select>
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
    </body>
</html>