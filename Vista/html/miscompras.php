<?php include_once 'header.php'; ?>
<?php
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
                        <th>Factura</th>
                        <th>Valor</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                        <th>Factura</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($mostrarinformacion)) {
                        foreach ($mostrarinformacion as $dato) {
                            ?>
                            <tr>
                                <td><?php echo $dato["v_factura"] ?></td>
                                <td style="text-align: right;"><?php echo number_format($dato["v_total"], 0, ",", "."); ?></td>
                                  <td style="text-align: right;"><?php echo $dato["v_fecha"] ?></td>
                                <td style="text-align: right;"><?php echo $dato["v_hora"] ?></td>
                                <?php if($dato["v_estado"] ==1){ ?>
                                <td style="color:orange; font-weight: bold; text-align: center;">FACTURADO</td>
                                <?php }elseif ($dato["v_estado"] ==2) {?>
                                <td style="color:blue; font-weight: bold; text-align: center;">ENVIADO</td>
                                <?php }elseif ($dato["v_estado"] ==3) {?>
                                <td style="color:green; font-weight: bold; text-align: center;">ENTREGADO</td>
                                <?php }?>
                                <td><center> <a type="button" class="btn btn-warning btn-sm" href="index.php?accion=factura&f=<?php echo $dato["v_factura"] ?>" target="_blank"> <i class="fa-solid fa-eye"></i></a></center>


                              

                        </tr>
                        <?php
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