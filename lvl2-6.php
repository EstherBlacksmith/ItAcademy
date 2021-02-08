<?php
require "sprints.php";
?>
		<div class="container-fluid bg-3 lvl2-6">
			<h4>Sprint 6</h4>
			<br>
			<div class="row">
				<div class="col">
					<h4>Exercici 1</h4>
					<div >
						<p>Per jugar a "l'amagatall"  se'ns ha demanat un programa que compti fins a 10. Però la persona que comptarà és una mica tramposa y ho farà comptant de dos en dos. Crea una funció que compti fins a 10, de 2 en 2, mostrant cada número del compte per pantalla.</p>
					</div>
				</div>

				<div class="col">
					<h4>Exercici 2</h4>
					<div >
						<p>Imagina't que volem que conti fins a un número diferent de 10. Programa la funció per a que el final del compte estigui parametritzat.</p>
					</div>
				</div>
				<div class="col">
					<h4>Exercici 3</h4>
					<div>
						<p> Per a prevenir oblits al utilitzar la nostra meravellosa funció "amagatall" establirem un paràmetre per defecte a 10 en la funció que s'encarrega de fer aquest compte.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt>
								<code>
									function amagatall1(){ <br>
										$numero = 0; <br>
										while($numero <= 10){ <br>
											$numero = $numero + 2; <br>
												echo $numero." "; <br>
										} <br>
									} <br>
								</code>
							</dt>
							<dd> <?php amagatall1(); ?> </dd>
						</dl>
					</div>
				</div>
				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt>
								<code>
									function amagatall2($limit){ <br>
										$numero = 0; <br>
										while($numero <= $limit){ <br>
											echo $numero." "; <br>
											$numero = $numero + 2; <br>

										} <br>
									} <br>
									amagatall2(21); <br>
								</code>
							</dt>
							<dd> <?php amagatall2(21); ?></dd>
						</dl>
					</div>
				</div>
				<div class="col">
					<div class = "bg-secondary  text-white">
						<dl>
							<dt>
								<code>

									function comptar2($limit = 10){ <br>
										$numero = 0; <br>
										while($numero < $limit){ <br>
												echo $numero." "; <br>
												$numero = $numero + 2; <br>
										} <br>
									} <br>
									comptar2(23); <br>
								</code>
							</dt>
							<dd> <?php comptar2(23); ?></dd>
						</dl>
					</div>
				</div>
			</div>
		</div>


<?php
require "footer.php";
?>