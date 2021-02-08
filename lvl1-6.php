<?php
require "sprints.php";
?>

		<div class="container-fluid bg-3 lvl1-6">
			<h4>Sprint 6</h4>
			<br>
			<div class="row">
				<div class="col">
					<h4>Exercici 1</h4>
					<div >
						<p>Programa la funció "resta" que, donats dos paràmetres ens retorni la resta dels dos números.</p>
					</div>
				</div>

				<div class="col">
					<h4>Exercici 2</h4>
					<div>
						<p>Programa una lògica que, donat un número qualsevol(per exemple,la teva edat) <br> ens digui si és parell o imparell mitjançant un missatge per pantalla.</p>
					</div>

				</div>
				<div class="col">
					<h4>Exercici 3</h4>
					<div >
						<p> Agafa la lògica de l'exercici 2 i encapsulala en una funció de nom parell_o_imparell. Invoca aquesta funció per a comprovar que funciona correctament.  </p>
					</div>

				</div>
				<div class="col">
					<h4>Exercici 4</h4>
					<div >
						<p> Programa un bucle que compti fins a 10, mostrant cada  número per pantalla. </p>
					</div>

				</div>
			</div>

			<div class="row">
				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt>
								<code>
								function resta($num1,$num2){ <br>
									return  $num1 - $num2; <br>
								} <br>
								echo resta(82,6); <br>

								</code>
							</dt>
						<dd>
							 <?php echo resta(82,6); ?>
						</dd>

						</dl>
					</div>
				</div>
				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt><code>
									$numEntrada = 2; <br>
									$parellSenar = " és par."; <br>
									if (($numEntrada%2!==0) ){ <br>
										$parellSenar = " és impar."; <br>
									} <br>
									echo "El número ".$numEntrada.$parellSenar; <br>

							</code></dt>
							<dd> <?php echo "El número ".$numEntrada.$parellSenar; ?></dd>
						</dl>
					</div>
				</div>
				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt>
								<code>
									function parell_o_imparell($numEntrada){ <br>
									$parellSenar = " és par."; <br>
									if (($numEntrada%2!==0) ){ <br>
										$parellSenar = " és impar."; <br>
									} <br>
									echo "El número ".$numEntrada.$parellSenar; <br>
								} <br>

								</code>
							</dt>
							<dd> <?php echo parell_o_imparell($numEntrada); ?></dd>
						</dl>
					</div>
				</div>

				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt>
								<code>
									for ($numero = 1; $numero<= 10; $numero++){ <br>
										echo $numero." "; <br>
									}
								</code>
							</dt>
							<dd> <?php
									for ($numero = 1; $numero<= 10; $numero++){
										echo $numero." ";
									}
								?>

							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

<?php
require "footer.php";
?>
