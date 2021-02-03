<?php
require "sprint5.php";
?>
		<div class="container-fluid bg-3 lvl2">
			<br>
			<div class="row">
				<div class="col">
					<h4>Exercici 1</h4>
					<div >
						<p>Crea dos arrays, un que inclogui 5 integers, i un altre que inclogui 3 integers.</p>
					</div>
				</div>

				<div class="col">
					<h4>Exercici 2</h4>
					<div >
						<p>Afegeix un valor més a l'array que conté 3 integers.</p>
						</div>
					</div>
					<div class="col">
						<h4>Exercici 3</h4>
						<div>
							<p> Mescla els dos arrays i imprimeix el tamany de l'array resultant per pantalla.</p>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt >Array primer</dt>
							<dd> <?php print_r($arrayUn); ?></dd>
							<dt>Array segón</dt>
							<dd><?php  print_r($arrayDos); ?></dd>
						</dl>
					</div>
				</div>
				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt>Array amb més valors</dt>
							<dd> <?php  print_r($arrayTres); ?></dd>
						</dl>
					</div>
				</div>
				<div class="col">
					<div class = "bg-secondary  text-white">
						<dl>
							<dt>Array resultant</dt>
							<dd> <?php print_r($resultat); ?></dd>
							<dt>Tamany de l'array</dt>
							<dd> <?php echo $numResultat; ?></dd>
						</dl>
					</div>
				</div>
			</div>
		</div>


<?php
require "footer.php";
?>