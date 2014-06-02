<h2 class="">LISTADO MASCOTAS <span class="label label-default"><?php echo sizeof($mascotas); ?></span></h2>
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
<th>Borrar</th>
<th>Visualizar</th>
</tr>
<?php foreach ($mascotas as $mascota): ?>
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
<td><a href="./mascotas.php?borrar=true&id_mascota=<?php echo $mascota['id_mascota']; ?>" title="BORRAR" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-lg"></i>&nbsp;BORRAR</a></td>
<td><a href="./mascotas.php?visualizar=true&id_mascota=<?php echo $mascota['id_mascota']; ?>" title="IR A FICHA" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i>&nbsp;FICHA</a></td>
</tr>
<?php endforeach; ?>
</table>
<div class="center-block">
<p class="center-block"><a href="./mascotas.php" title="VOLVER" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a></p>
</div>