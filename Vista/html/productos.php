<?php include_once 'header.php'; ?>
<?php
$titulo = 'PRODUCTO';
?>

<?php include_once 'menu.php'; ?>
<div class="container">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> - <?php echo $titulo; ?>  
                &nbsp; &nbsp;     <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#agregar"><strong>Nuevo&nbsp; &nbsp; <i class="fa-solid fa-plus"></i></strong></button>
                &nbsp; &nbsp;     &nbsp; &nbsp;   <a href="index.php?accion=reporteproductos" class="btn btn-light btn-sm" target="_blank"> <strong>Reporte &nbsp; &nbsp; <i class="fa-regular fa-file-pdf"></i></strong></a>
            </strong>
        </div>

        <div class="card-body">
            <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-white">
                            <h5 class="modal-title">NUEVO REGISTRO DEL <?php echo $titulo; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=productoguardar" data-form="save" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="data" class="form-label">Código:</label>
                                            <input type="text" class="form-control form-control-sm" id="p_codigo" name="p_codigo" placeholder="Ingrese información" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="data" class="form-label">Nombre:</label>
                                            <input type="text" class="form-control form-control-sm" id="p_nombre" name="p_nombre" placeholder="Ingrese información" required>
                                        </div>
                                    </div>   
                                    <div class="col-12">

                                        <div class="mb-3">
                                            <label for="data" class="form-label">Categoria:</label>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="p_categoriaFK" id="p_categoriaFK">
                                                <?php
                                                if (!empty($mostrarcategoria)) {
                                                    foreach ($mostrarcategoria as $info) {
                                                        ?>
                                                        <option value="<?php echo $info["c_id"]; ?>"><?php echo $info["c_categoria"]; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="data" class="form-label">Descripción:</label>
                                            <textarea class="form-control" name="p_descripcion" id="p_descripcion" rows="3" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="data" class="form-label">Precio:</label>
                                            <input type="number" class="form-control form-control-sm" id="p_precio" name="p_precio" placeholder="Ingrese información" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="data" class="form-label">Cantidad:</label>
                                            <input type="number" class="form-control form-control-sm" id="p_cantidad" name="p_cantidad" placeholder="Ingrese información" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Imagen:</label>
                                            <input type="file" class="form-control form-control-sm" id="foto" name="foto" placeholder="Ingrese la Foto" accept="image/png, image/jpeg" required>
                                        </div>
                                    </div>

                                </div>
                                <center><button type="submit" class="btn btn-dark btn-sm">Guardar&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>


            <table id="datatablesSimple" class="display table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($mostrarinformacion)) {
                        foreach ($mostrarinformacion as $dato) {
                            ?>
                            <tr>
                                <td><?php echo $dato["p_codigo"] ?></td>
                                <td><?php echo $dato["p_nombre"] ?></td>
                                <td><?php echo $dato["c_categoria"] ?></td>
                                <td><?php echo $dato["p_descripcion"] ?></td>
                                <td style="text-align: center;"><?php echo $dato["p_cantidad"] ?></td>
                                <td style="text-align: right;"><?php echo $dato["p_precio"] ?></td>
                                <td><img src="<?php echo $dato["p_imagen"] ?>" width="50px" height="50px"/></td>
                                <!---ACTUALIZR--->

                                <td>

                        <center> <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Actualizar<?php echo $dato["p_id"]; ?>">
                                <i class="fa-solid fa-pencil"></i>
                            </button></center>
                        <div class="modal fade" id="Actualizar<?php echo $dato["p_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning text-white">
                                        <h6 class="modal-title">ACTUALIZAR DATO DEL <?php echo $titulo; ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                            <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=productoactualizar" data-form="save" enctype="multipart/form-data">
                                                <input type="hidden" id="p_id" name="p_id" value="<?php echo $dato["p_id"]; ?>" required>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">Código:</label>
                                                            <input type="text" class="form-control form-control-sm" id="p_codigo" name="p_codigo" value="<?php echo $dato["p_codigo"]; ?>" placeholder="Ingrese información" required>
                                                            <input type="hidden" class="form-control form-control-sm" id="p_codigoviejo" name="p_codigoviejo" value="<?php echo $dato["p_codigo"]; ?>" placeholder="Ingrese información" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">Nombre:</label>
                                                            <input type="text" class="form-control form-control-sm" id="p_nombre" name="p_nombre" value="<?php echo $dato["p_nombre"]; ?>" placeholder="Ingrese información" required>
                                                        </div>
                                                    </div>    


                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">Categoria: </label>
                                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="p_categoriaFK" id="p_categoriaFK">
                                                                <?php
                                                                $idcursossqlcategoria = 'SELECT * FROM categoria';
                                                                foreach ($pdopag->query($idcursossqlcategoria) as $infoup) {
                                                                    if ($infoup["c_id"] == $dato["p_categoriaFK"]) {
                                                                        ?>
                                                                        <option value="<?php echo $infoup["c_id"]; ?>" selected><?php echo $infoup["c_categoria"]; ?></option>
                                                                    <?php } else { ?>
                                                                        <option value="<?php echo $infoup["c_id"]; ?>"><?php echo $infoup["c_categoria"]; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">Descripción:</label>
                                                            <textarea class="form-control" name="p_descripcion" id="p_descripcion" rows="3" value="<?php echo $dato["p_descripcion"]; ?>" required><?php echo $dato["p_descripcion"]; ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">Precio:</label>
                                                            <input type="number" class="form-control form-control-sm" id="p_precio" name="p_precio" placeholder="Ingrese información" value="<?php echo $dato["p_precio"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">Cantidad:</label>
                                                            <input type="number" class="form-control form-control-sm" id="p_cantidad" name="p_cantidad" placeholder="Ingrese información" value="<?php echo $dato["p_cantidad"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                            <label for="foto" class="form-label">Imagen:</label>
                                                            <input type="file" class="form-control form-control-sm" id="foto" name="foto" placeholder="ingrese la Foto">
                                                            <input type="hidden" class="form-control form-control-sm" id="fotovieja" name="fotovieja" value="<?php echo $dato["p_imagen"]; ?>">

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

                        <!-- ELIMININAR  -->
                        <td>

                        <center> <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Eliminar<?php echo $dato["p_id"]; ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </button></center>
                        <div class="modal fade" id="Eliminar<?php echo $dato["p_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning text-white">
                                        <h6 class="modal-title">ELIMINAR DATO DEL <?php echo $titulo; ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=productoeliminar">
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $dato["p_id"] ?>" />
                                            <input type="hidden" class="form-control form-control-sm" name="foto" value = "<?php echo $dato["p_imagen"]; ?>">
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
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>

<script src="Vista/js/script.js" crossorigin="anonymous"></script>
<script src="Vista/js/simple-datatables.js" crossorigin="anonymous"></script>