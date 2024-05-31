<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<div class="container">
        <div class="card-body">
            <center>
            <img src="Vista/imagen/icono.png" alt="...">
                <h3 class="card-text">  
                    BIENVENIDO(A) : <strong><?php echo $perfil["c_apellidos"]." ".$perfil["c_nombres"] ?></strong>
                </h3>
            </center>
        </div>
    </div>
<?php include_once 'footer.php'; ?>
