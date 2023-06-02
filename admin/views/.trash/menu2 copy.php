
      <header>
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.php"><img src="../images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                        <div class="center-desk">
                           &nbsp;
                        </div>
                        <div class="center-desk">
                           <?php if(isset($_SESSION)): ?>
                              <?php if (in_array('administracion', $_SESSION['roles'])): ?> 
                                 <div >
                                    <a class="read_more"href="indexadmin.php">Modo Admin.</a>
                                 </div>
                              <?php endif;?>
                           <?php endif; ?>
                        </div>



                        
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                        
                           <ul class="navbar-nav mr-auto">
                           <?php if (in_array('cliente', $_SESSION['roles'])):?> 
                              <li class="nav-item">
                                 <br>
                                 <a class="nav-link" href="kart.php">Comprar</a>
                              </li>
                              <li class="nav-item">
                                 <br>
                                 <a class="nav-link" href="pedidobyuser.php">Pedidos</a>
                              </li>
                              <?php endif;?>   
                              <li class="nav-item">
                              <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span >
                                             <img src="<?php echo(isset($_SESSION['photo'][0])?$_SESSION['photo'][0]:''); ?>" alt="<?php echo(isset($_SESSION['photo'][0])?$_SESSION['photo'][0]:'');?>"height="64px", width="64px" class="redonded-circle"></img>
                                             <?php
                                             echo(isset($_SESSION['nombrecli'] [0])?$_SESSION['nombrecli'] [0]:'');
                                             ?>
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu">
                                          
                                        <?php if (in_array('cliente', $_SESSION['roles'])):?> 
                                            <li><a class="dropdown-item" href="clientebyuser.php?action=getone&id=<?php echo $_SESSION['id_usuario'];?>">
                                                    <span >Mi perfil</span></a></li>
                                       <?php endif;?>
                                       <?php if (in_array('cliente', $_SESSION['roles'])):?> 
                                            <li><a class="dropdown-item" href="facturas.php?id=<?php echo $_SESSION['id_usuario'] ?>">Facturas
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
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>

      <section class="banner_main_temp">
<div class="container-fluid">
   
</div>
</section>

<br>