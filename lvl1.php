<?php
require "sprint5.php";
?>

		<div class="container-fluid bg-3 lvl1">
			<br>
			<div class="row">
				<div class="col">
					<h4>Exercici 1</h4>
					<div >
						<p>Defineix una variable de cada tipus: integer,double,string i boolean. Després, imprimeix-les per pantalla.</p>
					</div>

				</div>

				<div class="col">
					<h4>Exercici 2</h4>
					<div >
						<p>Crea una altra variable string. Després:
							<br>Imprimeix per pantalla el tamany(longitud) del dos strings.
							<br>Imprimeix per pantalla el dos strings però en ordre invers de caràcters.
							<br>Imprimeix la concatenació dels dos strings. </p>
						</div>

					</div>
					<div class="col">
						<h4>Exercici 3</h4>
						<div >
							<p> Crea una constant que inclogui el teu nom i imprimeix-la per pantalla.  </p>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class = "bg-secondary text-white">
							<dl>
								<dt>Integer</dt>
								<dd> <?php echo $numInt; ?></dd>
								<dt>Double</dt>
								<dd><?php echo $numDouble; ?></dd>
								<dt>String</dt>
								<dd><?php echo $varString; ?></dd>
								<dt>Boolean</dt>
								<dd><?php echo $varBoolean; ?></dd>
							</dl>
						</div>
					</div>
					<div class="col">
						<div class = "bg-secondary text-white">
							<dl>
								<dt>Tamany string primera</dt>
								<dd> <?php echo $tamanyPrimera; ?></dd>
								<dt>Tamany string segona</dt>
								<dd><?php echo $tamanySegona; ?></dd>
								<dt>String primera del revés</dt>
								<dd><?php echo $primeraReves; ?></dd>
								<dt>String segona del revés</dt>
								<dd><?php echo $segonaReves; ?></dd>
								<dt>Strings concatenats</dt>
								<dd><?php echo $stringConcatenats; ?></dd>
							</dl>
						</div>
					</div>
					<div class="col">
						<div class = "bg-secondary text-white">
							<dl>
								<dt>Constant</dt>
								<dd> <?php echo NOM; ?></dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
<?php
require "footer.php";
?>
