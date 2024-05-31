<?php include_once 'headerinicio.php'; ?>
<?php
$titulopagina = 'CATALOGO DE ELECTROMEZA';
?>
<div class="container">
    <br>
    <div class="card">
        <div class="card-header bg-warning text-white">
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> </strong>
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
                                                <form ROLE="FORM" METHOD="POST">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="container">
                                                                <img src="<?php echo $dato["p_imagen"] ?>" width="200px" height="200px" alt="...">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <p><strong>Categoria: <?php echo $dato["c_categoria"] ?> </p>
                                                            <p><strong> Descripción: </strong></p>
                                                            <p style="text-align: justify;"><?php echo $dato["p_descripcion"] ?></p>
                                                            <p>PRECIO : <strong style="color:orange"> $ <?php echo $dato["p_precio"] ?> COP</strong></p>
                                                            <p>CANTIDAD DISPONIBLE : <strong style="color:orange"><?php echo $dato["p_cantidad"] ?></strong></p>
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
                                                <form ROLE="FORM" METHOD="POST">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="container">
                                                                <img src="<?php echo $dato["p_imagen"] ?>" width="200px" height="200px" alt="...">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <p><strong>Categoria: <?php echo $dato["c_categoria"] ?> </p>
                                                            <p><strong> Descripción: </strong></p>
                                                            <p style="text-align: justify;"><?php echo $dato["p_descripcion"] ?></p>
                                                            <p>PRECIO : <strong style="color:orange"> $ <?php echo $dato["p_precio"] ?> COP</strong></p>
                                                            <p>CANTIDAD DISPONIBLE : <strong style="color:orange"><?php echo $dato["p_cantidad"] ?></strong></p>
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