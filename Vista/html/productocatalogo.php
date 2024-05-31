<?php include_once 'header.php'; ?>
<?php
$titulo = 'CATALOGO DE ELECTROMEZA';
?>
<?php include_once 'menu.php'; ?>
<div class="container">

    <div class="card">
        <div class="card-header bg-warning text-white">
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> - <?php echo $titulo; ?>            </strong>
        </div>
        <div class="card-body">

            <table id="datatablesSimple" class="display table table-bordered table-hover">
                <tbody>
                    <?php
                    if (!empty($mostrarinformacion)) {
                        $cantidad = 1;
                        foreach ($mostrarinformacion as $dato) {
                            ?>

                            <?php if (($cantidad % 2) != 0) { ?><tr>
                                    <td>
                                        <div class = "card">
                                            <div class="card-header bg-warning text-white">
                                                <h6 class="card-title"><?php echo $dato["p_nombre"] ?></h6>
                                            </div>
                                            <div class="card-body">
                                                <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=carritoguardar">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="container">
                                                                <img src="<?php echo $dato["p_imagen"] ?>" width="200px" height="200px" alt="...">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="hidden" id="v_usuarioFK" name="v_usuarioFK" value="<?php echo $perfil["c_id"]; ?>" required>
                                                            <input type="hidden" id="v_productoFK" name="v_productoFK" value="<?php echo $dato["p_id"]; ?>" required>
                                                            <input type="hidden" id="v_precio" name="v_precio" value="<?php echo $dato["p_precio"]; ?>" required>
                                                            <input type="hidden" id="v_cantidad" name="v_cantidad" value="<?php echo $dato["p_cantidad"]; ?>" required>
                                                            <p><strong>Categoria: <?php echo $dato["c_categoria"] ?> </p>
                                                            <p><strong> Descripción: </strong></p>
                                                            <p style="text-align: justify;"><?php echo $dato["p_descripcion"] ?></p>
                                                            <p>PRECIO : <strong style="color:orange"> $ <?php echo number_format($dato["p_precio"], 0, ",", ".");?> COP</strong></p>
                                                            <p>CANTIDAD DISPONIBLE : <strong style="color:orange"><?php echo $dato["p_cantidad"] ?></strong></p>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control form-control-sm" id="v_nuevacantidad" name="v_nuevacantidad" placeholder="Ingrese información" required>
                                                            </div>
                                                            <center><button type="submit" class="btn btn-outline-dark btn-sm">Agregar al Carrito&nbsp; &nbsp; <i class="fa-solid fa-cart-shopping"></i></button></center>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <div class = "card">
                                            <div class="card-header bg-warning text-white">
                                                <h6 class="card-title"><?php echo $dato["p_nombre"] ?></h6>
                                            </div>
                                            <div class="card-body">
                                                <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=carritoguardar">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="container">
                                                                <img src="<?php echo $dato["p_imagen"] ?>" width="200px" height="200px" alt="...">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="hidden" id="v_usuarioFK" name="v_usuarioFK" value="<?php echo $perfil["c_id"]; ?>" required>
                                                            <input type="hidden" id="v_productoFK" name="v_productoFK" value="<?php echo $dato["p_id"]; ?>" required>
                                                            <input type="hidden" id="v_precio" name="v_precio" value="<?php echo $dato["p_precio"]; ?>" required>
                                                            <input type="hidden" id="v_cantidad" name="v_cantidad" value="<?php echo $dato["p_cantidad"]; ?>" required>
                                                            <p><strong>Categoria: <?php echo $dato["c_categoria"] ?> </p>
                                                            <p><strong> Descripción: </strong></p>
                                                            <p style="text-align: justify;"><?php echo $dato["p_descripcion"] ?></p>
                                                            <p>PRECIO : <strong style="color:orange"> $ <?php echo number_format($dato["p_precio"], 0, ",", "."); ?> COP</strong></p>
                                                            <p>CANTIDAD DISPONIBLE : <strong style="color:orange"><?php echo $dato["p_cantidad"] ?></strong></p>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control form-control-sm" id="v_nuevacantidad" name="v_nuevacantidad" placeholder="Ingrese información" required>
                                                            </div>
                                                            <center><button type="submit" class="btn btn-outline-dark btn-sm">Agregar al Carrito&nbsp; &nbsp; <i class="fa-solid fa-cart-shopping"></i></button></center>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php
                            $cantidad = $cantidad + 1;
                        }
                    }
                    ?>

                </tbody>
            </table>                
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>

<script src="Vista/js/script.js" crossorigin="anonymous"></script>
<script src="Vista/js/simple-datatables.js" crossorigin="anonymous"></script>