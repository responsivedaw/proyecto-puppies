<div class="panel panel-success">
<!-- Default panel contents -->
    <div class="panel-heading">
        <i class="fa fa-info-circle fa-lg"></i>
        <?php 
        if (isset($_POST['alta'])){
        echo ' MASCOTA CREADA CORRECTAMENTE ';
        } elseif (isset($_POST['modificar'])){
        echo ' MASCOTA ACTUALIZADA CORRECTAMENTE ';
        } else {
        echo ' MASCOTA ELIMINADA CORRECTAMENTE ';
        }      
        ?>
        <i class="fa fa-info-circle fa-lg"></i>
    </div>
    <div class="panel-body">
        <div class="row">
        <table class="table col-md-10">
            <tr class="success">
                <th>Código:</th>
                <th colspan="2">Nombre</th>
                <th>#Chip</th>
                <th>Cód. Cliente</th>
                <th>Fecha Alta</th>
            </tr>
            <tr>
                <td><?php echo $datos['id_mascota']; ?></td>
                <td colspan="2"><?php echo $datos['nombre_mascota']; ?></td>
                <td><?php echo $datos['chip_mascota']; ?></td>
                <td><?php echo $datos['id_cliente']; ?></td>
                <td><?php echo $datos['falta_mascota']; ?></td>
            </tr>
            <tr class="success">
                <th>Sexo</th>
                <th colspan="2">Raza</th>
                <th>Fecha Nac.</th>
                <th>Peso</th>
                <th>Cartilla Vacunas</th>
            </tr>
            <tr>
                <td><?php echo strtoupper($datos['genero_mascota']); ?></td>
                <td colspan="2"><?php echo $datos['raza_mascota']; ?></td>
                <td><?php echo $datos['fnac_mascota']; ?></td>
                <td><?php echo $datos['peso_mascota']; ?></td>
                <td><?php echo ($datos['librovac_mascota']==1)?'SI':'NO'; ?></td>
            </tr>
            <tr class="success">
                <th colspan="7">Observaciones</th>
            </tr>
            <tr>
                <td colspan="7"><?php echo $datos['notas_mascota']; ?></td>
            </tr>
        </table>
        </div>
        <div class="line-break"></div>
        <p class="center-block"><a href="./mascotas.php" title="VOLVER" class="btn btn-success"><i class="fa fa-undo fa-lg"></i> VOLVER</a></p>
    </div>
</div>