
      <body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
      <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menuclient.php">Nuestro menú</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/imgs/logo.svg" class="brand-img" alt="">
                <span class="brand-txt">Food Hut</span>
            </a>
            <ul class="navbar-nav">
            <?php if (in_array('cliente', $_SESSION['roles'])):?> 
                              <li class="nav-item">
                                 <a class="nav-link" href="sucursales.php">Contáctanos</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="kart.php">Comprar</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="pedidobyuser.php">Pedidos</a>
                              </li>
                              <?php endif;?> 
                <li class="nav-item">
                <?php if(isset($_SESSION)): ?>
                              <?php if (in_array('administracion', $_SESSION['roles'])): ?> 
                                 <div >
                                    <a class="nav-link" href="indexadmin.php">Dashboard</a>
                                 </div>
                              <?php endif;?>
                           <?php endif; ?>
                </li>
                <li class="nav-item">
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                  <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <img src="<?php echo(isset($_SESSION['photo'][0])?$_SESSION['photo'][0]:''); ?>" alt="<?php echo(isset($_SESSION['photo'][0])?$_SESSION['photo'][0]:'');?>"height="64px", width="64px" class="redonded-circle"></img>
                                             <?php
                                             echo(isset($_SESSION['nombrecli'] [0])?$_SESSION['nombrecli'] [0]:'');
                                             ?>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-dark">
                                       <?php if (in_array('cliente', $_SESSION['roles'])):?> 
                                            <li><a class="dropdown-item" href="clientebyuser.php?action=getone&id=<?php echo $_SESSION['id_usuario'];?>">
                                                    <span >Mi perfil</span></a></li>
                                       <?php endif;?>
                                       <?php if (in_array('cliente', $_SESSION['roles'])):?> 
                                            <li><a class="dropdown-item" href="facturas.php?id=<?php echo $_SESSION['id_usuario'] ?>">
                                                    <span >Mi historial</span></a></li>
                                       <?php endif;?>
                                       <?php if (in_array('administracion', $_SESSION['roles'])): ?> 
                                            <li><a class="dropdown-item" href="personal.php?action=getOne&id_usuario=<?php echo $_SESSION['id_usuario'];?>">
                                                    <span >Mi perfil</span></a></li>
                                       <?php endif;?>
                                             <li><a class="dropdown-item" href="configpassword.php">
                                                    <span >Cambiar contraseña</span></a></li>       
                                            <li><a class="dropdown-item" href="login.php?action=logout">
                                                    <span >Cerrar sesion</span></a></li>
                     </ul>
                  </li>
                  </ul>
               </div>
                </li>
                <li class="nav-item">
                    <div class="col-3">
                    &nbsp;
                     </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <div col="row" id="sep">
    &nbsp;
</div>
