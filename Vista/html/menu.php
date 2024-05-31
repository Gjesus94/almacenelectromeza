<nav class="navbar navbar-expand-lg bg-warning text-white">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?accion=inicio">Inicio</a>
                </li> 
                <?php if ($roles == 1) { ?>
                 <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=categoria">Categoria</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=producto">Productos</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=cliente">Cliente</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=ventas">Ventas</a>
                    </li>

                <?php } ?>
        
                <?php if ($roles == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=productocatalogo">Catalogo</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=carrito">Carrito</a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=miscompras">Mis Compras</a>
                    </li>

                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#perfil">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?accion=salir">Salir</a>
                </li>


            </ul>
        </div>
    </div>
</nav>

<!--LOGIN-->

<div class="modal fade" id="perfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h6 class="modal-title">ACTUALIZACIÓN DE CUENTA</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=clienteactualizar">
                    <div class="mb-3">
                        <label for="data" class="form-label">Identificación:</label>
                        <input type="hidden" class="form-control form-control-sm" id="c_id" name="c_id" value="<?php echo $perfil["c_id"]; ?>" placeholder="Ingrese información" required>
                        <input type="number" class="form-control form-control-sm" id="c_identificacion" name="c_identificacion" value="<?php echo $perfil["c_identificacion"]; ?>" placeholder="Ingrese información" required>
                        <input type="hidden" class="form-control form-control-sm" id="c_identificacionvieja" name="c_identificacionvieja" value="<?php echo $perfil["c_identificacion"]; ?>" placeholder="Ingrese información" required>

                    </div>
                    <div class="mb-3">
                        <label for="data" class="form-label">Nombres:</label>
                        <input type="text" class="form-control form-control-sm" id="c_nombres" name="c_nombres" value="<?php echo $perfil["c_nombres"]; ?>" placeholder="Ingrese información" required>
                    </div>
                    <div class="mb-3">
                        <label for="data" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control form-control-sm" id="c_apellidos" name="c_apellidos" value="<?php echo $perfil["c_apellidos"]; ?>" placeholder="Ingrese información" required>
                    </div>
                    <div class="mb-3">
                        <label for="data" class="form-label">Celular:</label>
                        <input type="number" class="form-control form-control-sm" id="c_celular" name="c_celular" value="<?php echo $perfil["c_celular"]; ?>" placeholder="Ingrese información" required>
                    </div>

                    <div class="mb-3">
                        <label for="data" class="form-label">Email:</label>
                        <input type="email" class="form-control form-control-sm" id="c_correo" name="c_correo" value="<?php echo $perfil["c_correo"]; ?>" placeholder="Ingrese información" required>
                    </div>

                    <div class="mb-3">
                        <label for="data" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control form-control-sm" id="c_contrasena" name="c_contrasena" value="<?php echo $perfil["c_contrasena"]; ?>" placeholder="Ingrese información" required>
                    </div>

                    <center><button type="submit" class="btn btn-warning btn-sm">Actualizar&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div class="titulo">
    Bienvenido (a): <?php echo $perfil["c_apellidos"]." ".$perfil["c_nombres"]; ?>
</div>
<br>
