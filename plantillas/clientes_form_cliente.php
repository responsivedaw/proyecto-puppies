<div class="form-clientes">
<form action="" name="clientes" class="" method="post">
    <div class="row">
        <div class="form-group col-md-2">
            <label for="id_cliente" class="col-md-5">CÓDIGO:</label>
            <input type="text" name="id_cliente" id="id_cliente" class="form-control" maxlength="6" <?php echo (isset($_GET['visualizar']))?'readonly="readonly"':''; ?> <?php echo (isset($cliente['id_cliente']))?'value="'.$cliente['id_cliente'].'"':''; ?>/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <label for="nif_cliente">NIF/NIE:</label>
            <input type="text" name="nif_cliente" id="nif_cliente" maxlength="10" class="form-control" placeholder="12345678P" <?php echo (isset($cliente['nif_cliente']))?'value="'.$cliente['nif_cliente'].'"':''; ?> />
        </div>
        <div class="col-md-5">
            <label for="nombre_cliente">Nombre:</label>
            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" placeholder="Introduzca un nombre" <?php echo (isset($cliente['nombre_cliente']))?'value="'.$cliente['nombre_cliente'].'"':''; ?> />
        </div>
        <div class="col-md-5">
            <label for="apellidos_cliente">Apellidos:</label>
            <input type="text" name="apellidos_cliente" id="apellidos_cliente" class="form-control" placeholder="Introduzca los Apellidos" <?php echo (isset($cliente['apellidos_cliente']))?'value="'.$cliente['apellidos_cliente'].'"':''; ?> />
        </div>
    </div>
</form>
<div class="clearfix"></div>
</div>