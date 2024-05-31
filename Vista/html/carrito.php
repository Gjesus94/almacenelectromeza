<?php include_once 'header.php'; ?>


<?php
$sqlcantidad = "SELECT COUNT(*) FROM venta WHERE v_clienteFK = '".$perfil["c_id"]."' AND v_estado = 0";
$query = $pdopag->query($sqlcantidad);
$cantidad = $query->fetchColumn();
$titulo = 'MI CARRITO';
?>

<?php include_once 'menu.php'; ?>
<div class="container">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> - <?php echo $titulo; ?>
            </strong>
        </div>

        <div class="card-body">
            <table id="datatablesSimple" class="display table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Imagen</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    if (!empty($mostrarinformacion)) {
                        foreach ($mostrarinformacion as $dato) {
                            $total = $total + $dato["v_total"];
                            ?>
                            <tr>
                                <td><?php echo $dato["p_codigo"] ?></td>
                                <td><?php echo $dato["p_nombre"] ?></td>
                                <td><?php echo $dato["p_descripcion"] ?></td>
                                <td style="text-align: center;"><?php echo $dato["v_cantidad"] ?></td>
                                <td style="text-align: right;"><?php echo number_format($dato["v_precio"], 0, ",", "."); ?></td>
                                <td style="text-align: right;"><?php echo number_format($dato["v_total"], 0, ",", "."); ?></td>

                                <td><img src="<?php echo $dato["p_imagen"] ?>" width="50px" height="50px"/></td>                               
                                <!-- ELIMININAR  -->
                                <td>

                        <center> <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Eliminar<?php echo $dato["v_id"]; ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </button></center>
                        <div class="modal fade" id="Eliminar<?php echo $dato["v_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning text-white">
                                        <h6 class="modal-title">ELIMINAR DATO DEL <?php echo $titulo; ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=carritoeliminar">
                                            <input type="hidden" class="form-control" id="v_id" name="v_id" value="<?php echo $dato["v_id"] ?>" />
                                            <input type="hidden" class="form-control" id="v_productoFK" name="v_productoFK" value="<?php echo $dato["v_productoFK"] ?>" />
                                            <input type="hidden" class="form-control" id="p_cantidad" name="p_cantidad" value="<?php echo $dato["p_cantidad"] ?>" />
                                            <input type="hidden" class="form-control" id="v_cantidad" name="v_cantidad" value="<?php echo $dato["v_cantidad"] ?>" />
                                            <h6>¿Desea eliminar la información?</h6>
                                            <center><button type="submit" class="btn btn-dark btn-sm">Eliminar&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>

                        </tr>
                        <?php
                    }
                }
                ?>

                </tbody>
            </table>   
            

            <table  class="display table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Valores</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $iva = ($total * 19) / 100;
                    $subtotal = $total - $iva;
                    ?>
                    <tr style="text-align: right;">
                        <td>Sub Total</td>
                        <td>$ <?php echo number_format($subtotal, 0, ",", "."); ?></td>
                    </tr>
                    <tr style="text-align: right;">
                        <td>Iva 19%</td>
                        <td>$ <?php echo number_format($iva, 0, ",", "."); ?></td>
                    </tr>
                     <tr style="text-align: right;">
                        <td>Total a Pagar %</td>
                        <td><strong>$ <?php echo number_format($total, 0, ",", "."); ?></strong></td>
                    </tr>

                </tbody>
            </table> 
            <div>
                <?php if($cantidad != 0) { ?>
                <center> <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#facturar"><strong>Facturar&nbsp; &nbsp;<i class="fa-solid fa-dollar-sign"></i></strong></button></center>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

  <div class="modal fade" id="facturar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-white">
                            <h5 class="modal-title">FACTURAR COMPRA</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=carritofacturar" data-form="save" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <p style="text-align: justify;">Al Validar la facturación de la compra, usted legalmente esta realizando el proceso para pagar la factura de la CONTRAENTREGA del producto o productos, que esta adquieriendo.<br><br>
                                                Si desea CONTINUAR de clic en FACTURAR de lo Contrario de clic en cancelar (Cerrar) y elimine los productos del carrito de compra. <br><br>
                                                Una vez facturada dirigirse a MIS COMPRA y podrá visualizar los estados de sus compras.
                                            </p>
                                            <input type="hidden" class="form-control form-control-sm" id="v_usuarioFK" name="v_usuarioFK" value="<?php echo $perfil["c_id"]; ?>" placeholder="Ingrese información" required>
                                        </div>
                                    </div>
                                   
                                </div>
                                <center><button type="submit" class="btn btn-dark btn-sm">FACTURAR&nbsp; &nbsp; <i class="fa-solid fa-dollar-sign"></i></button></center>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

<?php include_once 'footer.php'; ?>

<script src="Vista/js/script.js" crossorigin="anonymous"></script>
<script src="Vista/js/simple-datatables.js" crossorigin="anonymous"></script>