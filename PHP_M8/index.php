
<?php
 require "funcionsEx1.php";
 include "cabecera.html";
?>

<body>
	<div class="container">
	  <div class="jumbotron ">

	    <h1> <i class="fas fa-cat"></i> Llista de la compra</h1>      
	    <p>Aquí tens el que has anat comprant aquesta setmana</p> 

	  </div>
	  <p></p>      
	  <button type="button" class="btn btn-outline-secondary buttonGran" ><a  class ="btn" href="insereix.php">Nou producte</a></button>
	  <p></p>
	</div>

<div class ="container">
<tbody>
	<table id="selectedColumn" class="table table-striped table-hover table-info table-bordered">
		<thead>
   			<tr>   		
	      		<th scope="col">Nom producte</th>	      		
	      		<th scope="col">Preu</th>
	      		<th scope="col">Quantitat</th>
	      		<th scope="col">Total</th>
	      		<th scope="col">Edita</th>
	      		<th scope="col">Elimina</th>
    		</tr>
  		</thead>
		<tr>
			<?php 

			$compra -> mostrar(); 	
			$longitud = count($compra-> arrayCompra);

			for ($i=1; $i <= $longitud ; $i++) { 
			?>		
			
			 <th scope="row"> <?php  echo $compra-> arrayCompra [$i]['nom'] ;?> </th>
			 <td> <?php echo $compra-> arrayCompra [$i]['preu'] ;?> </td>
			 <td> <?php echo $compra-> arrayCompra [$i]['quantitat'];?> </td>
			 <td> <?php echo $compra-> arrayCompra [$i]['total'] ;?> </td>
			 <td><a class="btn-warning" <?php echo "href=insereix.php?id=".$compra-> arrayCompra [$i]['id']; ?> role="button">
			 		<button type="submit" value="edita" title = "Edita" class="btn  btn-warning"><i class="fas fa-pen"></i></button>
			 	 </a>
			</td>
			 <td><a class="btn-warning" <?php echo "href=eliminar.php?id=".$compra-> arrayCompra [$i]['id']; ?> role="button"><button type="submit" value="elimina" title= "Elimina" class="btn btn-danger"><i class="fas  fa-times-circle"></i></button></a></td>
   		</tr>

    <?php }  ?>

    	<tr>
    		<th colspan="3" class="table-active">Total</th>
     		<td><?php echo $compra -> mostraTotalGeneral(); ?>  </td>
    	</tr>
    </table>
</tbody>

</div>




<?php 
	include "footer.php";
?>