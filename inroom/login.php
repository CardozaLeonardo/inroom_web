<?php 

   include('includes.php');
   include_once './vendor/autoload.php';


   $loader = new Twig_Loader_Filesystem('./template');
   $title = "InRoom | Iniciar Sessión";

   $twig = new Twig_Environment($loader, []);


?>


<!doctype html>
<html class="no-js" lang="en">
<?php echo $twig->render('head.html', compact('title')); ?>
    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo">
                                <span class="l l1"></span>
                                <span class="l l2"></span>
                                <span class="l l3"></span>
                                <span class="l l4"></span>
                                <span class="l l5"></span>
                            </div> ModularAdmin
                        </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-center">LOGIN TO CONTINUE</p>
                        <form  action="control/Login.control.php" method="POST" novalidate="OFF">
                          <?php if(isset($_GET['status'])): ?>
                            <div class="form-group has-error">
                                <label for="username">Username</label>
                                <input type="text" class="form-control underlined" name="username"  placeholder="Your email address" required>
                            </div>
                            <div class="form-group has-error">
                                <label for="password">Password</label>
                                <input type="password" class="form-control underlined" name="password" id="password" placeholder="Your password" required>
                                
                                <span class="has-error">Usuario o contraseña incorrecta.</span>
                                
                            </div>
                          <?php else: ?>
                            <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control underlined" name="username"  placeholder="Your email address" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control underlined" name="password" id="password" placeholder="Your password" required>
                                    
                                        <!-- <span class="has-error">Usuario o contraseña incorrecta.</span> -->
                                    
                                </div>
                          <?php endif ?>
                            <div class="form-group">
                                <label for="remember">
                                    <input class="checkbox" id="remember" type="checkbox">
                                    <span>Remember me</span>
                                </label>
                                <a href="reset.html" class="forgot-btn pull-right">Forgot password?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">Login</button>
                            </div>
                            <div class="form-group">
                                <p class="text-muted text-center">Do not have an account? <a href="signup.html">Sign Up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center">
                    <!-- <a href="index.html" class="btn btn-secondary btn-sm"> -->
                        <!-- <i class="fa fa-arrow-left"></i> Back to dashboard </a> -->
                </div>
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