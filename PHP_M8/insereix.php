<?php 
  include "accionsInsereix.php";
?>

<body>
  <div class="container">
      <div class="jumbotron ">
        <h1><i class="fas fa-cat"></i> Llista de la compra</h1>      
        <p><?php echo $titol ?></p>
      </div>
      <p></p>      
      <button type="button" class="btn btn-outline-secondary buttonGran" ><a  class ="btn btn-sm" href="index.php">Tornar</a></button>
      <p></p>
  </div>

  <div class="container">
    <h2>Producte <?php echo $nou;?> </h2>

    <form method="post" action=<?php echo $action; ?>>
      <div class="form-group">
        <input type="hidden" class="form-control" id="id" name="id" value= <?php echo $id ; ?> >
      </div>
      <div class="form-group"> 
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" placeholder="Nom del producte" name="nom" required value= <?php echo $nom; ?> > 
      </div>
      <div class="form-group">
        <label for="preu">Preu</label>
        <input type="text" class="form-control" id="preu" placeholder="Preu del producte" name="preu" required value= <?php echo $preu; ?> >
      </div>
      <div class="form-group">
        <label for="quantitat">Quantitat</label>
        <input type="text" class="form-control" id="quantitat" placeholder="Quantitat de producte" name="quantitat" required value= <?php echo $quantitat; ?> >
        <p></p>
      </div>    

      <button type="submit" value="crea" class="btn btn-primary" ><span class="fas  fa fa-check-square"></span></button>

    </form>
  </div>

</body>

<?php 
  include "footer.php";
?>