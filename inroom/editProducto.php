<?php 
   
   include('includes.php');

   $tipoModEmp = new TipoProductoModelo();

   if(isset($_GET['user']))
   {
       $userRec = new ProductoModelo();
       $user = $userRec->getProducto($_GET['user']);

   }else{
       header('Location: /inroom');
   }

   


?>


<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> InRoom | Nuevo Producto </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
            }
        </script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        
    </head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <div class="header-block header-block-search">
                        <form role="search">
                            <div class="input-container">
                                <i class="fa fa-search"></i>
                                <input type="search" placeholder="Search">
                                <div class="underline"></div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="notifications new">
                                <a href="" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <sup>
                                        <span class="counter">8</span>
                                    </sup>
                                </a>
                                <div class="dropdown-menu notifications-dropdown-menu">
                                    <ul class="notifications-container">
                                        <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img" style="background-image: url('assets/faces/3.jpg')"></div>
                                                </div>
                                                <div class="body-col">
                                                    <p>
                                                        <span class="accent">Zack Alien</span> pushed new commit: <span class="accent">Fix page load performance issue</span>. </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img" style="background-image: url('assets/faces/5.jpg')"></div>
                                                </div>
                                                <div class="body-col">
                                                    <p>
                                                        <span class="accent">Amaya Hatsumi</span> started new task: <span class="accent">Dashboard UI design.</span>. </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img" style="background-image: url('assets/faces/8.jpg')"></div>
                                                </div>
                                                <div class="body-col">
                                                    <p>
                                                        <span class="accent">Andy Nouman</span> deployed new version of <span class="accent">NodeJS REST Api V3</span>
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <footer>
                                        <ul>
                                            <li>
                                                <a href=""> View All </a>
                                            </li>
                                        </ul>
                                    </footer>
                                </div>
                            </li>
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')">
                                    </div>
                                    <span class="name"> John Doe </span>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-user icon"></i> Profile </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-bell icon"></i> Notifications </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-gear icon"></i> Settings </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="login.html">
                                        <i class="fa fa-power-off icon"></i> Logout </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo">
                                    <span class="l l1"></span>
                                    <span class="l l2"></span>
                                    <span class="l l3"></span>
                                    <span class="l l4"></span>
                                    <span class="l l5"></span>
                                </div> Modular Admin
                            </div>
                        </div>
                        <nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i> Dashboard </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-th-large"></i> Items Manager <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="items-list.html"> Items List </a>
                                        </li>
                                        <li>
                                            <a href="item-editor.html"> Item Editor </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-area-chart"></i> Charts <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="charts-flot.html"> Flot Charts </a>
                                        </li>
                                        <li>
                                            <a href="charts-morris.html"> Morris Charts </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-table"></i> Tables <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="static-tables.html"> Static Tables </a>
                                        </li>
                                        <li>
                                            <a href="responsive-tables.html"> Responsive Tables </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="active">
                                    <a href="forms.html">
                                        <i class="fa fa-pencil-square-o"></i> Forms </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-desktop"></i> UI Elements <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="buttons.html"> Buttons </a>
                                        </li>
                                        <li>
                                            <a href="cards.html"> Cards </a>
                                        </li>
                                        <li>
                                            <a href="typography.html"> Typography </a>
                                        </li>
                                        <li>
                                            <a href="icons.html"> Icons </a>
                                        </li>
                                        <li>
                                            <a href="grid.html"> Grid </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-file-text-o"></i> Pages <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="login.html"> Login </a>
                                        </li>
                                        <li>
                                            <a href="signup.html"> Sign Up </a>
                                        </li>
                                        <li>
                                            <a href="reset.html"> Reset </a>
                                        </li>
                                        <li>
                                            <a href="error-404.html"> Error 404 App </a>
                                        </li>
                                        <li>
                                            <a href="error-404-alt.html"> Error 404 Global </a>
                                        </li>
                                        <li>
                                            <a href="error-500.html"> Error 500 App </a>
                                        </li>
                                        <li>
                                            <a href="error-500-alt.html"> Error 500 Global </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-sitemap"></i> Menu Levels <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="#"> Second Level Item <i class="fa arrow"></i>
                                            </a>
                                            <ul class="sidebar-nav">
                                                <li>
                                                    <a href="#"> Third Level Item </a>
                                                </li>
                                                <li>
                                                    <a href="#"> Third Level Item </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"> Second Level Item </a>
                                        </li>
                                        <li>
                                            <a href="#"> Second Level Item <i class="fa arrow"></i>
                                            </a>
                                            <ul class="sidebar-nav">
                                                <li>
                                                    <a href="#"> Third Level Item </a>
                                                </li>
                                                <li>
                                                    <a href="#"> Third Level Item </a>
                                                </li>
                                                <li>
                                                    <a href="#"> Third Level Item <i class="fa arrow"></i>
                                                    </a>
                                                    <ul class="sidebar-nav">
                                                        <li>
                                                            <a href="#"> Fourth Level Item </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> Fourth Level Item </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="screenful.html">
                                        <i class="fa fa-bar-chart"></i> Agile Metrics <span class="label label-screenful">by Screenful</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://github.com/modularcode/modular-admin-html">
                                        <i class="fa fa-github-alt"></i> Theme Docs </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <footer class="sidebar-footer">
                        <ul class="sidebar-menu metismenu" id="customize-menu">
                            <li>
                                <ul>
                                    <li class="customize">
                                        <div class="customize-item">
                                            <div class="row customize-header">
                                                <div class="col-4">
                                                </div>
                                                <div class="col-4">
                                                    <label class="title">fixed</label>
                                                </div>
                                                <div class="col-4">
                                                    <label class="title">static</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Sidebar:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Header:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Footer:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customize-item">
                                            <ul class="customize-colors">
                                                <li>
                                                    <span class="color-item color-red" data-theme="red"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-orange" data-theme="orange"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-green active" data-theme=""></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-seagreen" data-theme="seagreen"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-blue" data-theme="blue"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-purple" data-theme="purple"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <a href="">
                                    <i class="fa fa-cog"></i> Customize </a>
                            </li>
                        </ul>
                    </footer>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content forms-page">
                    <div class="title-block">
                        <h3 class="title"> Forms </h3>
                        <p class="title-description"> Sample form elements </p>
                    </div>
                    <div class="subtitle-block">
                        <h3 class="subtitle"> Actualizar Producto </h3>
                    </div>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-8">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Ingrese los datos </h3>
                                    </div>
                                    <form role="form" name="nuevoProducto" method="POST" action="control/Producto.control.php">
                                        <input name="action" type="hidden" value="2">
                                        <input id="opc"name="opc" type="hidden" value="1">
                                        <input name="id_producto" type="hidden" value="<?php echo $user->__GET('id_producto'); ?>">
                                        <div class="form-group">
                                            <label class="control-label">Descripcion</label>
                                            <input require value="<?php echo $user->__GET('descripcion'); ?>" name="descripcion" type="text" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Tipo de producto</label>
                                            <select required id="tipoProducto" name="tipoProducto" class="form-control">
                                                <option value="">Seleccionar</option>
                                            <?php foreach($tipoModEmp->listarTipoPro() as $r): ?>
                                                <option value="<?php echo $r->__GET('id_tipoProducto'); ?>"><?php echo $r->__GET('tipoProducto'); ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Costo</label>
                                            <input id="costo" value="<?php echo $user->__GET('costo'); ?>" name="costo" placeholder="C$ 00.00" type="text" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Precio</label>
                                            <input required value="<?php echo $user->__GET('precio'); ?>" name="precio" placeholder="C$ 00.00" type="number" class="form-control boxed" min="1" step=".01">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Impuesto</label>
                                            <input name="impuesto" value="<?php echo $user->__GET('impuesto'); ?>" placeholder="C$ 00.00" type="text" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Marca</label>
                                            <input id="marca" name="marca" value="<?php echo $user->__GET('marca'); ?>" type="text" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Fecha de vencimiento</label>
                                            <input id="vencimiento" name="vencimiento" value="<?php echo $user->__GET('fecha_vencimiento'); ?>" placeholder="DD/MM/YYYY" type="date" class="form-control boxed">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Stock</label>
                                            <input id="stock" name="stock" value="<?php echo $user->__GET('stock'); ?>" placeholder="0" type="number" class="form-control boxed" min="0" step="1">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Código de barras</label>
                                            <input id="codigoBarras"name="codigoBarras" value="<?php echo $user->__GET('codigo_barra'); ?>" type="text" class="form-control boxed">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar</button>
                                        
                                    </form>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Underlined Inputs Validation </h3>
                                    </div>
                                    <form role="form">
                                        <div class="form-group has-success">
                                            <label class="control-label">Input with success</label>
                                            <input type="text" class="form-control underlined">
                                            <span class="has-success">Success message.</span>
                                        </div>
                                        <div class="form-group has-warning">
                                            <label class="control-label">Input with warning</label>
                                            <input type="text" class="form-control underlined">
                                            <span class="has-warning">Warning message.</span>
                                        </div>
                                        <div class="form-group has-error">
                                            <label class="control-label">Input with error</label>
                                            <input type="text" class="form-control underlined">
                                            <span class="has-error">Error message.</span>
                                        </div>
                                        <div class="form-group has-success  has-feedback">
                                            <label class="control-label">Input with success icon</label>
                                            <input type="text" class="form-control underlined">
                                            <span class="fa fa-check form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-warning  has-feedback">
                                            <label class="control-label">Input with warning icon</label>
                                            <input type="text" class="form-control underlined">
                                            <span class="fa fa-exclamation form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-error  has-feedback">
                                            <label class="control-label">Input with error icon</label>
                                            <input type="text" class="form-control underlined">
                                            <span class="fa fa-times form-control-feedback"></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-6">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Boxed Inputs </h3>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label class="control-label">Input Text</label>
                                            <input type="text" class="form-control boxed">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Input Password</label>
                                            <input type="password" class="form-control boxed">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Placeholder Input</label>
                                            <input type="text" class="form-control boxed" placeholder="Placeholder text">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Disabled Input</label>
                                            <input type="text" disabled="disabled" class="form-control boxed" placeholder="Disabled input text">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Static control</label>
                                            <p class="form-control-static boxed">email@example.com</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Readonly Input</label>
                                            <input type="text" readonly="readonly" class="form-control boxed" value="Readonly input text">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Textarea</label>
                                            <textarea rows="3" class="form-control boxed"></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Boxed Inputs Validation </h3>
                                    </div>
                                    <form role="form">
                                        <div class="form-group has-success">
                                            <label class="control-label">Input with success</label>
                                            <input type="text" class="form-control boxed">
                                            <span class="has-success">Success message.</span>
                                        </div>
                                        <div class="form-group has-warning">
                                            <label class="control-label">Input with warning</label>
                                            <input type="text" class="form-control boxed">
                                            <span class="has-warning">Warning message.</span>
                                        </div>
                                        <div class="form-group has-error">
                                            <label class="control-label">Input with error</label>
                                            <input type="text" class="form-control boxed">
                                            <span class="has-error">Error message.</span>
                                        </div>
                                        <div class="form-group has-success  has-feedback">
                                            <label class="control-label">Input with success icon</label>
                                            <input type="text" class="form-control boxed">
                                            <span class="fa fa-check form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-warning  has-feedback">
                                            <label class="control-label">Input with warning icon</label>
                                            <input type="text" class="form-control boxed">
                                            <span class="fa fa-exclamation form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-error  has-feedback">
                                            <label class="control-label">Input with error icon</label>
                                            <input type="text" class="form-control boxed">
                                            <span class="fa fa-times form-control-feedback"></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-6">
                                <div class="card card-block">
                                    <div class="title-block">
                                        <h3 class="title"> Radio Types </h3>
                                    </div>
                                    <form role="form">
                                        <div class="form-group">
                                            <label class="control-label">Radios</label>
                                            <div>
                                                <label>
                                                    <input class="radio" name="radios" type="radio">
                                                    <span>Option one</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="radio" type="radio" name="radios" checked="checked">
                                                    <span>Option two checked</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="radio" type="radio" name="disabled-radios" disabled="disabled" checked="checked">
                                                    <span>Option three checked and disabled</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="radio" type="radio" name="disabled-radios" disabled="disabled">
                                                    <span>Option four disabled</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Inline Radios</label>
                                            <div>
                                                <label>
                                                    <input class="radio" name="inline-radios" type="radio">
                                                    <span>a</span>
                                                </label>
                                                <label>
                                                    <input class="radio" name="inline-radios" type="radio">
                                                    <span>b</span>
                                                </label>
                                                <label>
                                                    <input class="radio" name="inline-radios" type="radio">
                                                    <span>c</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Squared Radios</label>
                                            <div>
                                                <label>
                                                    <input class="radio squared" name="squared-radios" checked="checked" type="radio">
                                                    <span>Checked</span>
                                                </label>
                                                <label>
                                                    <input class="radio squared" name="squared-radios" type="radio">
                                                    <span>Unchecked</span>
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-block">
                                    <div class="title-block">
                                        <h3 class="title"> Checkbox Types </h3>
                                    </div>
                                    <form role="form">
                                        <div class="form-group">
                                            <label class="control-label">Checkboxes</label>
                                            <div>
                                                <label>
                                                    <input class="checkbox" type="checkbox">
                                                    <span>Option one</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="checkbox" type="checkbox" checked="checked">
                                                    <span>Option two checked</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="checkbox" type="checkbox" disabled="disabled" checked="checked">
                                                    <span>Option three checked and disabled</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="checkbox" type="checkbox" disabled="disabled">
                                                    <span>Option four disabled</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Inline Checkboxes</label>
                                            <div>
                                                <label>
                                                    <input class="checkbox" type="checkbox">
                                                    <span>a</span>
                                                </label>
                                                <label>
                                                    <input class="checkbox" type="checkbox">
                                                    <span>b</span>
                                                </label>
                                                <label>
                                                    <input class="checkbox" type="checkbox">
                                                    <span>c</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Rounded Checkboxes</label>
                                            <div>
                                                <label>
                                                    <input class="checkbox rounded" checked="checked" type="checkbox">
                                                    <span>Checked</span>
                                                </label>
                                                <label>
                                                    <input class="checkbox rounded" type="checkbox">
                                                    <span>Unchecked</span>
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="subtitle-block">
                        <h3 class="subtitle"> Bootstrap Inputs </h3>
                    </div>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-6">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Default Bootstrap Inputs </h3>
                                    </div>
                                    <form role="form">
                                        <fieldset class="form-group">
                                            <label class="control-label" for="formGroupExampleInput">Input Text</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label class="control-label" for="formGroupExampleInput2">Input Password</label>
                                            <input type="password" class="form-control" id="formGroupExampleInput2">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label class="control-label" for="formGroupExampleInput3">Placeholder input</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Placeholder text">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label class="control-label" for="formGroupExampleInput4">Disabled input</label>
                                            <input type="text" disabled="disabled" class="form-control" id="formGroupExampleInput4" placeholder="Disabled input text">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label class="control-label" for="formGroupExampleInput5">Static control</label>
                                            <p class="form-control-static" id="formGroupExampleInput5">email@example.com</p>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label class="control-label" for="formGroupExampleInput6">Readonly input</label>
                                            <input type="text" readonly="readonly" class="form-control" id="formGroupExampleInput6" value="Readonly input text">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label class="control-label" for="formGroupExampleInput7">Textarea</label>
                                            <textarea rows="3" class="form-control" id="formGroupExampleInput7"></textarea>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Default Bootstrap Inputs Validation </h3>
                                    </div>
                                    <form role="form">
                                        <div class="form-group has-success">
                                            <label class="control-label">Input with success</label>
                                            <input type="text" class="form-control">
                                            <span class="has-success">Success message.</span>
                                        </div>
                                        <div class="form-group has-warning">
                                            <label class="control-label">Input with warning</label>
                                            <input type="text" class="form-control">
                                            <span class="has-warning">Warning message.</span>
                                        </div>
                                        <div class="form-group has-error">
                                            <label class="control-label">Input with error</label>
                                            <input type="text" class="form-control">
                                            <span class="has-error">Error message.</span>
                                        </div>
                                        <div class="form-group has-success  has-feedback">
                                            <label class="control-label">Input with success icon</label>
                                            <input type="text" class="form-control">
                                            <span class="fa fa-check form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-warning  has-feedback">
                                            <label class="control-label">Input with warning icon</label>
                                            <input type="text" class="form-control">
                                            <span class="fa fa-exclamation form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-error  has-feedback">
                                            <label class="control-label">Input with error icon</label>
                                            <input type="text" class="form-control">
                                            <span class="fa fa-times form-control-feedback"></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-6">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Input Groups </h3>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label class="control-label">Input Text</label>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Some text here">
                                            </div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Some text here">
                                                <span class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </span>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Some text here">
                                                <span class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Input Sizing</label>
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Username">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Username">
                                            </div>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-block">
                                    <div class="panel-title-block">
                                        <h3 class="title"> Custom Bootstrap Select/File </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="subtitle-block">
                        <h3 class="subtitle"> Input Sizing </h3>
                    </div>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-6">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Control Sizing </h3>
                                    </div>
                                    <form role="form">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Default input">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control form-control-lg">
                                                <option>Option one</option>
                                                <option>Option two</option>
                                                <option>Option three</option>
                                                <option>Option four</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Option one</option>
                                                <option>Option two</option>
                                                <option>Option three</option>
                                                <option>Option four</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control form-control-sm">
                                                <option>Option one</option>
                                                <option>Option two</option>
                                                <option>Option three</option>
                                                <option>Option four</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Column sizing </h3>
                                    </div>
                                    <form role="form">
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder=".col-6">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder=".col-6">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2">
                                                <input type="text" class="form-control" placeholder=".col-2">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" placeholder=".col-3">
                                            </div>
                                            <div class="col-7">
                                                <input type="text" class="form-control" placeholder=".col-7">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2">
                                                <input type="text" class="form-control" placeholder=".col-2">
                                            </div>
                                            <div class="col-2 col-offset-1">
                                                <input type="text" class="form-control" placeholder=".col-2">
                                            </div>
                                            <div class="col-2 col-offset-2">
                                                <input type="text" class="form-control" placeholder=".col-2">
                                            </div>
                                            <div class="col-2 col-offset-1">
                                                <input type="text" class="form-control" placeholder=".col-2">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-3">
                                                <input type="text" class="form-control" placeholder=".col-3">
                                            </div>
                                            <div class="col-4 col-offset-1">
                                                <input type="text" class="form-control" placeholder=".col-4">
                                            </div>
                                            <div class="col-3 col-offset-1">
                                                <input type="text" class="form-control" placeholder=".col-3">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-4">
                                                <input type="text" class="form-control" placeholder=".col-4">
                                            </div>
                                            <div class="col-3 col-offset-3">
                                                <input type="text" class="form-control" placeholder=".col-3">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" class="form-control" placeholder=".col-2">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-3">
                                                <input type="text" class="form-control" placeholder=".col-3">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" placeholder=".col-3">
                                            </div>
                                            <div class="col-5 col-offset-1">
                                                <input type="text" class="form-control" placeholder=".col-5">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="subtitle-block">
                        <h3 class="subtitle"> Form Layouts </h3>
                    </div>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-6">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Basic Forms </h3>
                                    </div>
                                    <form role="form">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Forms Using the Grid </h3>
                                    </div>
                                    <form>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 form-control-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 form-control-label">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-success">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Inline Forms </h3>
                                    </div>
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword3">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Remember me </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
                <footer class="footer">
                    <div class="footer-block buttons">
                        <iframe class="footer-github-btn" src="https://ghbtns.com/github-btn.html?user=modularcode&repo=modular-admin-html&type=star&count=true" frameborder="0" scrolling="0" width="140px" height="20px"></iframe>
                    </div>
                    <div class="footer-block author">
                        <ul>
                            <li> created by <a href="https://github.com/modularcode">ModularCode</a>
                            </li>
                            <li>
                                <a href="https://github.com/modularcode/modular-admin-html#get-in-touch">get in touch</a>
                            </li>
                        </ul>
                    </div>
                </footer>
                <div class="modal fade" id="modal-media">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Media Library</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="modal-body modal-tab-container">
                                <ul class="nav nav-tabs modal-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a>
                                    </li>
                                </ul>
                                <div class="tab-content modal-tab-content">
                                    <div class="tab-pane fade" id="gallery" role="tabpanel">
                                        <div class="images-container">
                                            <div class="row">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                        <div class="upload-container">
                                            <div id="dropzone">
                                                <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                    <div class="dz-message-block">
                                                        <div class="dz-message needsclick"> Drop files here or click to upload. </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Insert Selected</button>
                            </div> -->
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