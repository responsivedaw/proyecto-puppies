<?php  date_default_timezone_set('Europe/Madrid'); ?>
<footer>
	<div class="container">
	    <div class="row">
            <div class="col-xs-2 logo-footer">
                <img src="images/puppies_256x181.png" alt="puppies.png" title="Puppies S.L." />
            </div>
            <div class="col-xs-5 col-xs-offset-1 empresa-footer">
                <p>PUPPIES S.L.<br/>C/ Valdemorillo 51 - Pol. Ind. Ventorro del Cano<br/>Alcorcón</p>
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