<?php

//Delet Button kann alle Elemente löschen, die die Gleiche Id haben aus Datenbank 
if(isset($_POST['deleter'])){
	$id = $_POST["deleter"];
	Inventory::deleteInventory($db,$id);
	Prices::deletePrices ($db, $id);
	Images::deleteImages($db,$id);
	Middleman::deleteMiddleman($db, $id);
}
 ?>

<!--Refresh Button, um die seite zu aktualisiern -->
<div class="row">
  <div class="col-md-1"> <!-- Refresh-->
	<div class="container">
		<a href="?page=daschboard"><button type="button" class="btn btn-info" >Refresh</button></a>
	</div></div>
	
  <div class="col-md-2">   <!-- Dropdown-->
	<div class="dropdown">
		<!--<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Dropdown
			<span class="caret"></span></button>
			<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">alles</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">artikelnummer</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">produktname</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">produkttyp</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">produktname</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">bezeichnung</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">haltbarkeit</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">größe</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">besonderheiten</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">lagerort</a></li>
			</ul>-->
	</div></div>
  <div class="col-md-4">  
  <!--Suche Button-->
  <form method="post" >
    <div class="form-group">
      <input placeholder="Suche nach Produkt Name" name="term" type="text" class="form-control" id="usr">
    </div>
	<input class="btn btn-success" type="submit" name="such" value="Suche" /> 
  </div>
  <div class="col-md-3"></div></form>
</div>
<div class="row">
  <div class="col-md-1">
  <div class="container">
  <h2>Lagerbestand</h2>  
 

<!--in dieser Tabelle wird alle Daten aus Datenbank gezeigt -->
<center>
<tbody>
  <table class="table table-bordered" style = " background-color: #ccffff;border: 3px solid black;font-family:arial, lucida console;">
    <thead>
      <tr>
	  <th>Kategorie ID </th>
        <th>Produk Typ</th>
        <th>Marke</th>
		<th>Produktions Datum</th>
		<th>Produkt Name</th>
		<th>Ankunfts Datum</th>
		<th>Lager Datum</th>
		<th>Größe</th>
		<th>Farbe</th>
		<th>DIN-Norm</th>
		<th>Länge</th>
		<th>medizinischer Standard</th>
		<th>Mengen Verpackung</th>
		<th>Menge Box</th>
		<th>Menge Karton</th>
		<th>Projekt Nummer</th>
		<th>Lager Einzelverpackung</th>
		<th>Lager Boxen</th>
		<th>Lager Karton</th>
		<!--<th>Karton Abmessungen</th>-->
		<th>pro Einzelverpackung</th>
		<th>Gesamt Stückzahl</th>
		<th>Bearbeitung</th>
		<th>Löschen</th>
		
		
		
	  </tr>
    </thead>
    <tbody>
	
	<?php
	
	
	
	if(isset($_POST['such'])){
	
		$term=$_POST["term"];
		$sql4=Inventory::getInventorysearch($db,$term);
		//die Daten werden mit foreach hilfe nacheinander gezeigt
		foreach($sql4 as $row2):	
	?>


<!--die zeigt gesuchte Daten-->
	<form method="post">
      <tr style = "border: 3px solid black;">
	<td><?= htmlspecialchars($row2['category_id']) ?> </td>
        <td><?= htmlspecialchars($row2['product_type']) ?> </td>
        <td><?= htmlspecialchars($row2['brand']) ?> </td>
        <td><?= htmlspecialchars($row2['production_date']) ?> </td>
        <td><?= htmlspecialchars($row2['product_name']) ?> </td>
        <td><?= htmlspecialchars($row2['arrival_date']) ?> </td>
        <td><?= htmlspecialchars($row2['storage_date']) ?> </td>
        <td><?= htmlspecialchars($row2['size']) ?> </td>
        <td><?= htmlspecialchars($row2['color']) ?> </td>
        <td><?= htmlspecialchars($row2['din_norm']) ?> </td>
        <td><?= htmlspecialchars($row2['length']) ?> </td>
        <td><?= htmlspecialchars($row2['medical_standard']) ?> </td>
        <td><?= htmlspecialchars($row2['quantity_packaging']) ?> </td>
        <td><?= htmlspecialchars($row2['quantity_box']) ?> </td>
        <td><?= htmlspecialchars($row2['quantity_carton']) ?> </td>
        <td><?= htmlspecialchars($row2['project_number']) ?> </td>
        <td><?= htmlspecialchars($row2['stock_single_packaging']) ?> </td>
        <td><?= htmlspecialchars($row2['stock_boxes']) ?> </td>
       <!-- <td><?= htmlspecialchars($row2['stock_carton']) ?> </td>-->
        <td><?= htmlspecialchars($row2['carton_dimensions']) ?> </td>
        <td><?= htmlspecialchars($row2['per_single_packaging']) ?> </td>
        <td><?= htmlspecialchars($row2['total_quantity']) ?> </td>
	
	 <td></div>
	 <!-- mit diesem Button kann man die gesuchte Daten bearbeiten--> 
  <div class="col-md-3"><button type="button" class="btn btn-success" name="update" onclick="window.open('http://192.168.1.222/warehousing/?page=product&do=edit&id=<?php echo htmlspecialchars($row2['category_id']); ?>')">Bearbeiten</button></div> </td>  
  <td> </div>
  <div class="col-md-3">
  <!--mit diesem Butten wird die Daten, die gleichen Id haben gelöscht--> 
  <button type="submit"  class="btn btn-danger custom2" name="deleter" value="<?php echo htmlspecialchars($row2['category_id']); ?> ">Delete <span class="fas fa-times" aria-hidden="true"></span></td></button>
      
		<?php
		//hier ist die ende von foreach 
	 endforeach
	 ;}?>
	 
		
	
	
	<?php
	// alle gespeicherte  Daten aus Datenbank zeigen
	$sql2=Inventory::getInventory($db);
	

	foreach ($sql2 as $row) :
	
	
	
   // $sql3=Inventory::updateInventory($db,$data);
?>
<form method="post">
      <tr style = "border: 3px solid black;">
	   <td><?= htmlspecialchars($row['category_id']) ?> </td>
        <td><?= htmlspecialchars($row['product_type']) ?> </td>
        <td><?= htmlspecialchars($row['brand']) ?> </td>
        <td><?= htmlspecialchars($row['production_date']) ?> </td>
        <td><?= htmlspecialchars($row['product_name']) ?> </td>
        <td><?= htmlspecialchars($row['arrival_date']) ?> </td>
        <td><?= htmlspecialchars($row['storage_date']) ?> </td>
        <td><?= htmlspecialchars($row['size']) ?> </td>
        <td><?= htmlspecialchars($row['color']) ?> </td>
        <td><?= htmlspecialchars($row['din_norm']) ?> </td>
        <td><?= htmlspecialchars($row['length']) ?> </td>
        <td><?= htmlspecialchars($row['medical_standard']) ?> </td>
        <td><?= htmlspecialchars($row['quantity_packaging']) ?> </td>
        <td><?= htmlspecialchars($row['quantity_box']) ?> </td>
        <td><?= htmlspecialchars($row['quantity_carton']) ?> </td>
        <td><?= htmlspecialchars($row['project_number']) ?> </td>
        <td><?= htmlspecialchars($row['stock_single_packaging']) ?> </td>
        <td><?= htmlspecialchars($row['stock_boxes']) ?> </td>
       <!-- <td><?= htmlspecialchars($row['stock_carton']) ?> </td>-->
        <td><?= htmlspecialchars($row['carton_dimensions']) ?> </td>
        <td><?= htmlspecialchars($row['per_single_packaging']) ?> </td>
        <td><?= htmlspecialchars($row['total_quantity']) ?> </td>
		
		
		
		
        <td></div>
  <div class="col-md-3"><button type="button" class="btn btn-success" name="update" onclick="window.open('http://192.168.1.222/warehousing/?page=product&do=edit&id=<?php echo htmlspecialchars($row['category_id']); ?>')">Bearbeiten</button></div> </td>  
  <td> </div>
  <div class="col-md-3">
  <button type="submit"  class="btn btn-danger custom2" name="deleter" value="<?php echo htmlspecialchars($row['category_id']); ?> ">Löschen <span class="fas fa-times" aria-hidden="true"></span></td></button>
      
		
		<?php endforeach ?>
		
		
			  
      </tr>

    </tbody>
  </table>
 

</div>
   </center>
  
  </div>
</div>
</form >