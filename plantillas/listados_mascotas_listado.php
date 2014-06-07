<h2 class="">LISTADO BÚSQUEDA MASCOTAS <span class="label label-default"><?php echo sizeof($resultados); ?></span></h2>
<br/>
<table style="font-size:12px;" class="table table-striped table-condensed table-bordered">
    <tr>
        <th>Cód.</th>
        <th>Nombre</th>
        <th>Raza</th>
        <th>#Chip</th>
        <th>Fecha Nac.</th>
        <th>Sexo</th>
        <th>Peso</th>
        <th>Cliente</th>
        <th>F.Alta</th>
    </tr>
    <?php foreach ($resultados as mascota): ?>
    <tr>
        <td><?php echo $mascota['id_mascota']; ?></td>
        <td><?php echo $mascota['nombre_mascota']; ?></td>
        <td><?php echo $mascota['raza_mascota']; ?></td>
        <td><?php echo $mascota['chip_mascota']; ?></td>
        <td><?php echo formatear_fecha($mascota['fnac_mascota']); ?></td>
        <td><?php echo strtoupper($mascota['genero_mascota']); ?></td>
        <td><?php echo $mascota['peso_mascota']; ?></td>
        <td><?php echo $mascota['id_cliente']." - ".$mascota['nombre_cliente']." ".$mascota['apellidos_cliente']; ?></td>
    <td><?php echo formatear_fecha($mascota['falta_mascota']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<div class="center-block">
    <p class="center-block">
        <a href="./mascotas.php?imprimir=true&id_mascota=<?php echo $mascota['id_mascota']; ?>" title="IMPRIMIR" class="btn btn-success"><i class="fa fa-print fa-lg"></i>&nbsp;IMPRIMIR</a>
        <a href="./mascotas.php?exportar=true&id_mascota=<?php echo $mascota['id_mascota']; ?>" title="EXPORTAR" class="btn btn-success"><i class="fa fa-save fa-lg"></i>&nbsp;EXPORTAR</a>
        <a href="./listados.php" title="VOLVER" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a>
    </p>
</div>
