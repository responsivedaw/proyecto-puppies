<div class="panel panel-success">
<!-- Default panel contents -->
    <div class="panel-heading">
        <i class="fa fa-info-circle fa-lg"></i>
        <?php 
        if (isset($_POST['alta'])){
        echo ' CATEGORIA CREADA CORRECTAMENTE ';
        } elseif (isset($_POST['modificar'])){
        echo ' CATEGORIA ACTUALIZADA CORRECTAMENTE ';
        } else {
        echo ' CATEGORIA ELIMINADA CORRECTAMENTE ';
        }      
        ?>
        <i class="fa fa-info-circle fa-lg"></i>
    </div>
    <div class="panel-body">
        <div class="row">
        <table class="table col-md-10">
            <tr class="success">
                <th>Código:</th>
                <th>Denominación</th>
                <th>Descripción</th>
            </tr>
            <tr>
                <td><?php echo (isset($insertado))?$insertado:$datos['id_categoria']; ?></td>
                <td><?php echo $datos['denom_categoria']; ?></td>
                <td><?php echo $datos['desc_categoria']; ?></td>
            </tr>
            <tr class="success">
                <th colspan="7">Observaciones</th>
            </tr>
            <tr>
                <td><?php echo $datos['notas_categoria']; ?></td>
            </tr>
        </table>
        </div>
        <div class="line-break"></div>
        <p class="center-block"><a href="./categorias.php" title="VOLVER" class="btn btn-success"><i class="fa fa-undo fa-lg"></i> VOLVER</a></p>
    </div>
</div>