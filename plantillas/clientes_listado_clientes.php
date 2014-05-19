<h2 class="">LISTADO CLIENTES <span class="label label-default"><?php echo sizeof($resultados); ?></span></h2>
<br/>
<table style="font-size:12px;" class="table table-striped table-condensed table-bordered">
<tr>
<th>Cód.</th>
<th>Nombre</th>
<th>Apellidos</th>
<th>NIF</th>
<th>Fecha Nac.</th>
<th>Sexo</th>
<th>C.Postal</th>
<th>Tfno. 01</th>
<th>Email</th>
<th>Borrar</th>
<th>Visualizar</th>
</tr>
<?php foreach ($resultados as $cliente): ?>
<tr>
<td><?php echo $cliente['id_cliente']; ?></td>
<td><?php echo $cliente['nombre_cliente']; ?></td>
<td><?php echo $cliente['apellidos_cliente']; ?></td>
<td><?php echo $cliente['nif_cliente']; ?></td>
<td><?php echo formatear_fecha($cliente['fnac_cliente']); ?></td>
<td><?php echo strtoupper($cliente['sexo_cliente']); ?></td>
<td><?php echo $cliente['cpostal_cliente']; ?></td>
<td><?php echo $cliente['tfno1_cliente']; ?></td>
<td><?php echo $cliente['email_cliente']; ?></td>
<td><a href="./clientes.php?borrar=true&id_cliente=<?php echo $cliente['id_cliente']; ?>" title="BORRAR" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-lg"></i>&nbsp;BORRAR</a></td>
<td><a href="./clientes.php?visualizar=true&id_cliente=<?php echo $cliente['id_cliente']; ?>" title="IR A FICHA" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i>&nbsp;FICHA</a></td>
</tr>
<?php endforeach; ?>
</table>
<div class="center-block">
<p class="center-block"><a href="./clientes.php" title="VOLVER" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a></p>
</div>
