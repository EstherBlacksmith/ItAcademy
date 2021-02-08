<?php
require "sprints.php";
?>
		<div class="container-fluid bg-3 lvl3-6">
			<h4>Sprint 6</h4>
			<br>
			<div class="row">
				<div class="col">
					<h4>Exercici 1</h4>
					<div >
						<p>Ens han demanat un llistat amb tots els anys on es van produir jocs olímpics desde 1960 (Roma, inclós) fins al 2016 (Río de Janeiro,també inclós). Programa un bucle que mostri per pantalla els anys olímpics dins de l'interval esmentat.</p>
					</div>
				</div>
				<div class="col">
					<h4>Exercici 2</h4>
					<div >
						<p>Imagina que som a una botiga on es ven: <br>
							Xocolata: 1 euro <br>
							Xiclets: 0.50 euros <br>
							Carmels: 1.50 euros <br>
						    Implementa un programa que permeti afegir càlculs a un total de compres d'aquest tipus. Per exemple, que si comprem: <br>
						    2 xocolates, 1 de xiclets i 1 de carmels, tinguem un programa que permeti anar afegint els subtotals a un total, tal que així, <br>
						    funció(2 xocolates) + funció(1 de xiclets) + funció(1 de carmels) = 2+0.5+1.5 <br>
						    Sent per tant el total, 4.</p>
					</div>
				</div>
				<div class="col">
					<h4>Exercici 3</h4>
					<div >
						<p>La criba d'Eratóstenes és un algoritme pensat per a trobar nombres primers dins d'un interval donat. Basats en l'informació de l'enllaç adjunt, implementa la criba d'Eratóstenes dins d'una funció, de tal forma que poguem invocar la funció per a un número concret.</p>
					</div>
				</div>
			</div>
			<div class ="row">
				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt>
								<code>
									function olimpics(){ <br>
										for ($olimpiada = 1960; $olimpiada <= 2016; $olimpiada = $olimpiada + 4){ <br>
												echo $olimpiada." "; <br>
											} <br>
										} <br>
									echo caixaBotiga(2,1,1); <br>
								</code>
							</dt>
						</dl>
						<?php  olimpics(); ?>
					</div>
				</div>
				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt>
									<code>
									function caixaBotiga($xocQuantitat = 2,  $xicQuantitat = 1, $carQuantitat = 1){ <br>
										//Array amb els valors dels productes <br>
										$arrayCAixa = array("xocolata" => 1, "xiclets" => 0.5, "caramels" => 1 ); <br>
										foreach( $arrayCAixa as $producte => $valor) { <br>
											$totalCaixa = $xocQuantitat *  $valor; <br>
											$totalCaixa = $totalCaixa + ($xicQuantitat * $valor); <br>
											$totalCaixa = $totalCaixa + ($carQuantitat * $valor); <br>
										} <br>
										return "El total és ".  $totalCaixa; <br>
									}<br>
									echo caixaBotiga(2,1,1); <br>
								</code>
							</dt>
						</dl>
						<?php echo caixaBotiga(2,1,1); ?>
					</div>
				</div>
				<div class="col">
					<div class = "bg-secondary text-white">
						<dl>
							<dt>
								<code>
									function Eratostenes($numMax,$numActual){ <br>
										//Obtindre la llista de números <br>
										for($i=2;$i<$numMax;$i++) <br>
										{ <br>
										  $llistaPrimers[$i]=true; <br>
										} <br>
										<br>
										//Fer que el 2 sigui el primer número primer <br>
										$llistaPrimers[2]=true; <br>
										<br>
										//Recorrer los números y para cada uno <br>
										for ($ii=2;$ii<$numMax;$ii++){ <br>
											//Si el quadrat del número actual es major que el número final, sortim <br>
											if ($ii**2 < $numMax){ <br>
											  //Si és primer: recorrer los múltiples y marcar-los como no primer <br>
											  if ($llistaPrimers[$ii] == true){ <br>
											    for ($i=$ii*$ii;$i<$numMax;$i+=$ii){ <br>
											       $llistaPrimers[$i] = false; <br>
											    } <br>
											  } <br>
											} <br>
										} <br>
										//Mostrem els primers <br>
										echo "Primers: "; <br>
										for ($ii = 2; $ii < $numMax; $ii++){ <br>
										  if ($llistaPrimers[$ii] == true){ <br>
										    echo $ii." "; <br>
										  } <br>
										} <br>
									} <br>
								</code>
							</dt>
							<dd><?php
								$numMax = 50;
								$numActual = 2;
								Eratostenes($numMax,$numActual);
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
