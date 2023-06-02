<?php 
    require_once("controllers/menu.php");
    include("views/header.php");
    
    
    if(isset($_SESSION['id_usuario'])){
        include('views/menu2.php');
    }else{
        include('views/menu.php');
    }
    
?>

<h1 class="text-center">Nuestro menú</h1>


<section id="menu" class="mov">
<div class="row">
       <?php 
            $dataTipo = $menu->getTipo();
            $data = $menu->get();
            foreach($dataTipo as $key => $tipo):
                
       ?>
            <h2><?php echo $tipo['nombre'].'s'; ?></h2> 
            <div class="row" id="menuc">
                <?php
                    foreach($data as $key => $platillo):
                        if($platillo['id_tipoplatillo']==$tipo['id_tipoplatillo']):
                ?>

                
                        <div class="col-md-4">
                            <div class="card bg-transparent border my-3 my-md-0">
                                <img src="<?php echo '../'.$platillo['imagen'];?>" alt="<?php echo $platillo['imagen'];?>" class="rounded-0 card-img-top mg-responsive">
                                <div class="card-body">
                                    <h1 class="text-center mb-4"><a href="#" class="badge badge-primary"><?php echo '$'.$platillo['precio'].' c/u';?></a></h1>
                                    <h4 class="pt20 pb20"><?php echo $platillo['nombre'];?></h4>
                                    <?php if(isset($_SESSION['id_usuario'])): ?>
                                        <?php if (in_array('cliente', $_SESSION['roles'])): ?>
                                    <a class="btn btn-lg btn-primary" href="kart.php">Pedir</a>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <a class="btn btn-lg btn-primary" href="login.php">Pedir</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                

                <?php
                    endif;
                    endforeach;
                ?>
            </div>
        <?php
            endforeach;
        ?>
<section>



