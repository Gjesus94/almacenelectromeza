<?php include_once 'header.php';?>
<?php
$titulo = 'FACTURA';
?>
<br>
    <div class="container">
    <div class="card">
        <div class="card-header bg-warning text-white">
              <?php 
              $factura = $mostrarfactura->fetch(PDO::FETCH_ASSOC);
              ?>
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> - <?php echo $titulo; ?>
                No. <?php echo $factura["v_factura"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;DATOS: <?php echo $factura["c_nombres"]." ".$factura["c_apellidos"]; ?>
                
                &nbsp;&nbsp;&nbsp;&nbsp;ESTADO: &nbsp;
                
                  <?php if ($factura["v_estado"] == 1) { ?>
                                    <strong style="color:orange; font-weight: bold; text-align: center;">FACTURADO</strong>
                                <?php } elseif ($factura["v_estado"] == 2) { ?>
                                    <strong style="color:blue; font-weight: bold; text-align: center;">ENVIADO</strong>
                                <?php } elseif ($factura["v_estado"] == 3) { ?>
                                    <strong style="color:green; font-weight: bold; text-align: center;">ENTREGADO</strong>
                                <?php } ?>
                                    
            </strong>
        </div>

        <div class="card-body">
            <table class="display table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Imagen</th>
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
                                <td><img src="<?php echo $dato["p_imagen"] ?>" width="100px" height="100px"/></td>                               
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
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>

<script src="Vista/js/script.js" crossorigin="anonymous"></script>
<script src="Vista/js/simple-datatables.js" crossorigin="anonymous"></script>