<?php  date_default_timezone_set('Europe/Madrid'); ?>
<footer>
	<div class="container">
	    <div class="row">
            <div class="col-xs-2">
                <img src="images/puppies_256x181.png" alt="puppies.png" title="Puppies S.L." class="logo" />
            </div>
            <div class="col-xs-6">
                <p>Puppies S. L. - Calle Valdemorillo, 51. Polígono Industrial Ventorro del Cano (Alcorcón)</p>
            </div>
            <div class="col-xs-4 fecha-hora">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
                    <input type="text" class="form-control" value="<?php echo (date("d/m/Y")); ?>" disabled="disabled" />
                    <span class="input-group-addon"><i class="fa fa-clock-o fa-lg"></i></span>
                    <input type="text" class="form-control" id="reloj-footer" disabled="disabled" />
                </div>
            </div>
        </div>
    </div>
</footer>