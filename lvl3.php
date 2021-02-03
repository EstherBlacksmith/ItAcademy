<?php
require "sprint5.php";
?>

		<div class="container-fluid bg-3 lvl3">
			<br>
			<div class="row">
				<div class="col">
					<h4>Exercici 1</h4>
					<div >
						<p>Imprimeix per pantalla (valor a valor) l'array resultant del nivell anterior.</p>
					</div>
				</div>
				<div class="col">
					<h4>Exercici 2</h4>
					<div >
						<p>Escriure un programa PHP que realitzi lo següent: <br>
						Declarar dues variables X e Y de tipus int, dues variables N i M de tipous double i assigna a cada una un valor.  <br>
						A continuació, mostra per pantalla, per a X e Y:</p>
					</div>
				</div>
				<div class="col">
					<h4>Exercici 3</h4>
					<div >
						<p>Per a N i M, lo mateix:</p>
					</div>
				</div>
			</div>
			<div class ="row">
				<div class="col">
					<div class = "bg-secondary text-white">
						<?php  valorAValor($resultat); ?>
					</div>
				</div>
				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt>El valor de cada variable</dt>
							<dd><?php	echo $X ;
									    echo $Y;?> </dd>
							<dt>La suma</dt>
							<dd><?php echo $sumaXY; ?></dd>
							<dt>La resta</dt>
							<dd><?php  echo $restaXY; ?></dd>
							<dt>El producte</dt>
							<dd><?php echo $producteXY; ?></dd>
							<dt>La divisió</dt>
							<dd><?php  echo $divisioXY; ?></dd>
							<dt>El mòdul</dt>
							<dd><?php  echo $modulXY; ?></dd>
						</dl>
					</div>
				</div>
				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt>El valor de cada variable</dt>
							<dd> <?php	echo $N;
										echo $M;?></dd>
							<dt>La suma</dt>
							<dd><?php echo $sumaMN ; ?></dd>
							<dt>La resta</dt>
							<dd><?php  echo $restaMN; ?></dd>
							<dt>El producte</dt>
							<dd><?php echo $producteMN; ?></dd>
							<dt>La divisió</dt>
							<dd><?php  echo $divisioMN; ?></dd>
							<dt>El mòdul</dt>
							<dd><?php  echo $modulMN; ?></dd>
						</dl>

						<p>I per a totes les variables(X,Y,N,M)</p>
						<dl>
							<dt>El doble de cada variable</dt>
							<dd> <?php echo $dobleX ;
									   echo	$dobleY;
									   echo	$dobleM;
									   echo $dobleN;?></dd>
							<dt>La suma de totes les variables</dt>
							<dd><?php echo $sumaTotes ; ?></dd>
							<dt>El producte de totes les variables</dt>
							<dd><?php echo $producteTotes; ?></dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

<?php
require "footer.php";
?>
