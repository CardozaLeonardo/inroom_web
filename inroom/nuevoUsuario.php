<?php 
   
   include('loginRedirect.php');
   include('includes.php');
   include_once './vendor/autoload.php';

   $roles = new RolModelo();

   $loader = new Twig_Loader_Filesystem('./template');
   $title = "InRoom | Nuevo Producto";
   $username = "Anonymous";
   $twig = new Twig_Environment($loader, []);

   $sm = new SessionModelo();
   $userMod = new UserModelo();
   $usr = new User();
   $ss = $sm->getSession($_COOKIE['inroom_session']);
   $id_user = $ss->__GET('id_user');
   $usr = $userMod->getUser($id_user);
   $username = $usr->__GET('user');

   if($usr->__GET('photo_url') == null)
   {
       $photo = "assets/faces/8.jpg";
   }else{
       $photo = $usr->__GET('photo_url');
   }


?>


<!doctype html>
<html class="no-js" lang="en">
    <!-- Renderizando el head -->
    <?php echo $twig->render('head.html', compact('title')); ?>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                
                <?php echo $twig->render('navbar.html', compact('username','photo')); ?>

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
                        <h3 class="subtitle"> Nuevo Usuario </h3>
                    </div>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-8">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Registre un producto </h3>
                                    </div>
                                    <form role="form" name="nuevoProducto" method="POST" action="control/User.control.php">
                                        <input name="action" type="hidden" value="1">
                                        <input id="opc"name="opc" type="hidden" value="1">
                                        
                                        <div class="form-group">
                                            <label class="control-label">Nombres</label>
                                            <input required name="nombres" type="text" class="form-control boxed">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Apellidos</label>
                                            <input required name="apellidos" type="text" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Usuario</label>
                                            <input id="usernameField" required name="username" type="text" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Correo electrónico</label>
                                            <input id="emailField" required name="email" type="email" class="form-control boxed">
                                            <!-- <span class="has-error">Este correo ya está registrado</span> -->
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Roles</label>
                                            <select required id="roles" name="roles" class="form-control">
                                                <option value="">Seleccionar</option>
                                            <?php foreach($roles->getRoles() as $r): ?>
                                                <option value="<?php echo $r->__GET('id_rol'); ?>"><?php echo $r->__GET('rol'); ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <input type="hidden" id="rolesList" name="rolesList" value="">

                                        <div class="rolCont">
                                            
                                        </div>

                                        <button id="btnAgregarRol" type="button" class="btn btn-primary">Agregar</button>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="control-label">Contraseña</label>
                                            <input required id="password" name="password" placeholder="Ingrese contraseña" type="password" class="form-control boxed">
                                        <!-- </div>

                                        <div class="form-group"> -->
                                            <br>
                                            <input required id="passwordConf" name="passwordConf" placeholder="Repita la contraseña" type="password" class="form-control boxed">
                                        </div>

                                        <br>

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