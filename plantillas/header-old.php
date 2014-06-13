<header>
    <div class="container">
    <nav>
        <div class="row">
        <div id="home-buttons" class="col-md-2">
            <ul>
               <li><a href="home.php"><img src="images/inicio100.png" alt="INICIO" title="INICIO" width="40"></a></li>
			   
			   <!-- AÑADIR ESTA LINEA -->
               <li><a href="configuracion.php"><img src="images/config100.png" alt="configuracion" title="CONFIGURACION" width="40"></a></li>
				<!--  -->
				
		   </ul>
           </div>
          <div id="general-buttons" class="col-md-5 col-md-offset-1">
              <ul>
                    <li><a href="clientes.php"><img src="images/clientes100.png" alt="clientes" title="CLIENTES" width="40"></a></li>
                    <li><a href="mascotas.php"><img src="images/mascotas100.png" alt="mascotas" title="MASCOTAS" width="40"></a></li>
                    <li><a href="almacen.php"><img src="images/almacen100.png" alt="almacen" title="ALMACEN" width="40"></a></li>
					
					<!-- AÑADIR ESTA LINEA -->
                    <li><a href="images/prototipos/facturacion.jpg"><img src="images/facturacion100.png" alt="facturacion" title="FACTURACION" width="40"></a></li>
                    <!--  -->
					
					<li><a href="images/prototipos/agenda.php"><img src="images/agenda100.png" alt="agenda" title="AGENDA" width="40"></a></li>
                     <!--  -->
					
					<li><a href="listados.php"><img src="images/listados100.png" alt="listados" title="LISTADOS" width="40"></a></li>
                </ul>
           </div>
          <div id="session-buttons" class="col-md-3 col-md-offset-1">
              <ul>
                  <li style="width:auto;"><?php echo (isset($_SESSION['nombre_usuario']))?($_SESSION['nombre_usuario']):("Invitado"); ?></li>
                  <li><a href="./logout.php"><img src="images/salir100.png" alt="salir" title="SALIR" width="40"></a></li>
              </ul>
          </div>
     </div>    
    </nav>
    <div class="float-reset"></div>
    </div>        
</header>