<?php include_once 'header.php'; ?>
<?php
$titulo = 'VENTAS GENERALES';
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
                        <th>Factura</th>
                        <th>Identificación</th>
                        <th>Cliente</th>
                        <th>Valor</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                        <th>Cambiar</th>

                        <th>Factura</th>

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
                                <td><?php echo $dato["v_factura"] ?></td>
                                <td><?php echo $dato["c_identificacion"] ?></td>
                                <td><?php echo $dato["c_nombres"] . " " . $dato["c_apellidos"] ?></td>
                                <td style="text-align: right;"><?php echo number_format($dato["v_total"], 0, ",", "."); ?></td>
                                <td style="text-align: right;"><?php echo $dato["v_fecha"] ?></td>
                                <td style="text-align: right;"><?php echo $dato["v_hora"] ?></td>
                                <?php if ($dato["v_estado"] == 1) { ?>
                                    <td style="color:orange; font-weight: bold; text-align: center;">FACTURADO</td>
                                <?php } elseif ($dato["v_estado"] == 2) { ?>
                                    <td style="color:blue; font-weight: bold; text-align: center;">ENVIADO</td>
                                <?php } elseif ($dato["v_estado"] == 3) { ?>
                                    <td style="color:green; font-weight: bold; text-align: center;">ENTREGADO</td>
                                <?php } ?>


                                <td>

                        <center> <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Actualizar<?php echo $dato["v_factura"]; ?>">
                                <i class="fa-solid fa-pencil"></i>
                            </button></center>
                        <div class="modal fade" id="Actualizar<?php echo $dato["v_factura"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning text-white">
                                        <h6 class="modal-title">ACTUALIZAR ESTADO</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body">
                                            <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=ventasactualizar" data-form="save" enctype="multipart/form-data">
                                                <input type="hidden" id="v_factura" name="v_factura" value="<?php echo $dato["v_factura"]; ?>" required>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">Categoria: </label>
                                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="v_estado" id="v_estado">
                                                                <?php if ($dato["v_estado"] == 1) { ?>
                                                                    <option value="1" selected>FACTURADO</option>
                                                                    <option value="2" >ENVIADO</option>
                                                                    <option value="3" >ENTREGADO</option>

                                                                <?php } elseif ($dato["v_estado"] == 2) { ?>
                                                                    <option value="1" >FACTURADO</option>
                                                                    <option value="2" selected>ENVIADO</option>
                                                                    <option value="3" >ENTREGADO</option>
                                                                <?php } elseif ($dato["v_estado"] == 3) { ?>
                                                                    <option value="1" >FACTURADO</option>
                                                                    <option value="2">ENVIADO</option>
                                                                    <option value="3">ENTREGADO</option>
                                                                <?php } ?>


                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <center><button type="submit" class="btn btn-dark btn-sm">Actualizar&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
                                            </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>


                        <td><center> <a type="button" class="btn btn-warning btn-sm" href="index.php?accion=factura&f=<?php echo $dato["v_factura"] ?>" target="_blank"> <i class="fa-solid fa-eye"></i></a></center>




                        </tr>
                        <?php
                    }
                }
                ?>

                </tbody>
            </table>   
            <hr>
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

        </div>
    </div>
</div>


<?php include_once 'footer.php'; ?>

<script src="Vista/js/script.js" crossorigin="anonymous"></script>
<script src="Vista/js/simple-datatables.js" crossorigin="anonymous"></script>