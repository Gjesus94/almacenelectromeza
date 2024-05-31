<?php
date_default_timezone_set('America/Bogota');
$hora = date("H:i:s");
$fecha = date("Y-m-d");
$titulopagina = "ELECTROMEZA";

ob_start();
?>
<style>
    table{
        width: 100%;
        font-family: 'Arial';
    }
    th, td {
        border: 0.5px solid;
        font-family: 'Arial';
    }
</style>

<table>
    <thead style="text-align: center; background-color: #182951; color: white;  font-family: 'Arial';">
        <tr style="text-align: center; ">
            <td style="width: 66.6666%; height: 78px;" colspan="8">
                <p style="text-align: center; font-weight: bold"><?php echo $titulopagina ?></p>
            </td>
        </tr>
    </thead>
    <thead style="text-align: center; background-color: orange; color: white;">
        <tr style="text-align: center; ">
            <td colspan="8">
                <strong>REPORTE DE PRODUCTOS</strong>
            </td>
        </tr>
    </thead>
    <thead style="text-align: center; ">
        <tr>
            <th  style="width: 20%;">Código</th>
            <th style="width: 50%;">Nombre</th>
            <th style="width: 30%;">Categoria</th>
            <th style="width: 50%;">Descripción</th>
            <th style="width: 10%;">Cantidad</th>
            <th style="width: 20%;">Precio</th>

        </tr>
    </thead>

    <tbody>

        <?php
        if (!empty($mostrarinformacion)) {
            foreach ($mostrarinformacion as $dato) {
                ?>
                <tr>
                    <td style="width: 20%;"><?php echo $dato["p_codigo"] ?></td>
                    <td  style="width: 50%;"><?php echo $dato["p_nombre"] ?></td>
                    <td style="width: 30%;"><?php echo $dato["c_categoria"] ?></td>
                    <td style="width: 50%;"><?php echo $dato["p_descripcion"] ?></td>
                    <td style="text-align: center;" style="width: 10%;" style="width: 10%;"><?php echo $dato["p_cantidad"] ?></td>
                    <td style="text-align: right;" style="width: 20%;" style="width: 20%;"><?php echo $dato["p_precio"] ?></td>
                <?php
                }
            }
            ?>  
    </tbody>
</table>


<p>Impresion de reporte: <?php echo $fecha . " - " . $hora ?></p>
<p style="font-size: 12px;color:orange; "><?php echo $titulopagina; ?></p>
<?php
$html = ob_get_clean();

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter', '');

$dompdf->render();
$dompdf->stream("reporteproducto.pdf", array("Attachment" => true));
// Guardamos a PDF
?>;



