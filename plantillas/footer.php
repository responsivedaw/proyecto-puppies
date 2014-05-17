<footer>
	<div class="container">
		<div class="logo"><!--imagen logo-->
			<img src="images/puppies_256x181.png" alt="puppies.png" title="Puppies S.L." width="256" height="181">
		</div>
		<div class="direccion">
			<p>Puppies S. L. - Calle Valdemorillo, 51. Polígono Industrial Ventorro del Cano (Alcorcón)</p>
		</div>
		<div class="reloj">
			<form name="form_reloj">
			<input type="text" name="reloj" onfocus="window.document.form_reloj.reloj.blur()">
			</form>
		</div>
		<div class="fecha">
			<p><?php  date_default_timezone_set('Europe/Madrid');echo (date("d-m-Y")); ?></p>
		</div>
		<div class="float-reset"></div>
	</div>
</footer>