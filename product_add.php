<!-- PHP funktion insert daten in db (insertInventory) supplier_save -->

	<?php
	$id="";
	
	//da wird diesen funktionen beim Klick auf Speichern aufgerufen
if(isset($_POST['supplier_save'])){
	
	
	
	
	$data = array(
		"image_name" => $_POST["image_name"],
		"image_name2" => $_POST["image_name2"],
		"path" => $_POST["path"],
		"path2" => $_POST["path2"],
		"location"=>$_POST["location"],
		"sur_name2"=>$_POST["sur_name2"],
		"fore_name2"=>$_POST["fore_name2"],
		"company"=>$_POST["company"],
		"mid_id"=>$_POST["mid_id"],
		
		"purchasing_per_100"=>$_POST["purchasing_per_100"],
		"purchasing_price_single"=>$_POST["purchasing_price_single"],
		"purchasing_price_box"=>$_POST["purchasing_price_box"],
		"purchasing_price_per_carton"=>$_POST["purchasing_price_per_carton"],
		"purchasing_price_total_amount"=>$_POST["purchasing_price_total_amount"],
		"purchasing_per_individual_package"=>$_POST["purchasing_per_individual_package"],
		"sell_price_box_target"=>$_POST["sell_price_box_target"],
		"sell_price_total_target"=>$_POST["sell_price_total_target"],
		"margin_box_target"=>$_POST["margin_box_target"],
		"margin_total_box_target"=>$_POST["margin_total_box_target"],
		"sell_price_single"=>$_POST["sell_price_single"],
		"sell_price_box"=>$_POST["sell_price_box"],
		"margin_sell_price_box"=>$_POST["margin_sell_price_box"],
		"margin_total_sold_boxes"=>$_POST["margin_total_sold_boxes"],
		"sell_price_total_amount"=>$_POST["sell_price_total_amount"],
		"total_sell_price"=>$_POST["total_sell_price"]
		
		
		
		
		
	);
	$lastPCatID = Images::insertImages($db,$data);
 
	$lastPricesID = Prices::insertPrices($db,$data);
	$storage_location_id = Storage_location::insertStorage_location($db,$data);
	
	

	$middleman_id =Middleman::insertMiddleman($db,$data);
	$id =Inventory::insertInventory($db,$_POST, $lastPricesID, $storage_location_id, $lastPCatID);
	Prices::insertPrices($db,$data);
	// seite wechseln mit php
	header("Location: ?page=product&do=edit&id=".$id);
}

	
	?>

<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}
div.gallery:hover {
  border: 1px solid #777;
}
div.gallery img {
  width: 100%;
  height: auto;
}
div.desc {
  padding: 15px;
  text-align: center;
}
.in {display:none}
</style>
<br>
<script><!-- Der JS-Code ermöglicht die Tab-Funktion --> 
$(document).ready(function(){
	$(".nav-tabs a").click(function(){
		$(this).tab('show');
	});
	$(function() {
		$('.multiselect-ui').multiselect({
			includeSelectAllOption: true
		});
	});		
	/*product_type2*/
	
	/* Select in product_type2. Man gelangt je nach Wahl zu den Drop-Down Taschen,Masken oder Handschuhe  */
    $('#product_type2').change(function(){
        if($('#product_type2').val() == '1') {
            $('#bags').show();
			$('#masks').hide(); 
			$('#gloves').hide(); 
			/*#ptcol*/
			$( '#ptcol' ).addClass( "col-sm-2" );
			$( '#product_type2').addClass("col-sm-2" );
			$( '#ptcol' ).removeClass( "col-sm-5" );
        } 
		else if ($('#product_type2').val() == '2') {
			$('#masks').show();
			$('#bags').hide();
			$('#gloves').hide();  
			/*#ptcol*/
			$( '#ptcol' ).addClass( "col-sm-2" );
			$( '#product_type2').addClass("col-sm-2" );
			$( '#ptcol' ).removeClass( "col-sm-5" );
		}
		else if ($('#product_type2').val() == '3') {
            $('#bags').hide(); 
			$('#masks').hide(); 
			$('#gloves').show();
			$( '#ptcol' ).addClass( "col-sm-2" );
			$( '#product_type2').addClass("col-sm-2" );
			$( '#ptcol' ).removeClass( "col-sm-5" );
		}else {
            $('#bags').hide(); 
			$('#masks').hide(); 
			$('#gloves').hide(); 
			$( '#ptcol' ).addClass( "col-sm-5" );
			$( '#product_type2').addClass("col-sm-2" );
			$( '#ptcol' ).removeClass( "col-sm-2" );
			
        } 
	});
});
</script>
<!-- Ein sich anpassender Container mit einem linksseitigen Menü.  -->
<form method="post">
<div class="container-fluid menuleft">
	<h2>Produkt Anlegen</h2>		
	<div class="form-group row col-md-12">		
		<ul class="nav nav-tabs">
		 <li role="presentation" class="active"><a data-toggle="tab" href="#image_name">Bilder</a></li>  
		  <li role="presentation" ><a data-toggle="tab" href="#bearbeiten">Bearbeiten</a></li>
		  <li role="presentation"><a data-toggle="tab" href="#price">Preise</a></li>	  
		  <li role="presentation"><a data-toggle="tab" href="#suppliers">Lieferanten</a></li>
		  <li role="presentation"><a data-toggle="tab" href="#middleman">Zwischenlieferanten</a></li>
		 
		</ul>
	</div> 
	<div class="tab-content">
	<!-- Bearbeiten-Tab -->
		<div id="bearbeiten"  class="tab-pane fade">
			<div class="form-group row col-md-12">				
				<label class="col-sm-1 form-control-label">Produktname:</label>
				<div class="col-sm-3">
					<input type="text" name="product_name" maxlength="60" placeholder="Produktname" id="product_name" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Produkttyp:</label>
				<div class="col-sm-3">
					<input type="text" name="product_type" maxlength="60" placeholder="Produkttyp" id="product_type" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Material:</label>
				
				<div class="col-sm-3">
					<select  name="material_id" class="form-control" >
						<option value="test">test</option>
						<option value="test2">test2</option>
						<option value="test3">test3</option>
						<option value="test4">test4</option>
					</select>
				</div>
				
			</div>	
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Marke:</label>
				<div class="col-sm-3">
					<input type="text" name="brand" maxlength="60" placeholder="Marke" id="brand" class="form-control" value="">
				</div>
				
				<label class="col-sm-1 form-control-label">Farbe:</label>
				<div class="col-sm-3">
					<input type="text" name="color" maxlength="60" placeholder="Farbe" id="color" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Projektnummer:</label>
				<div class="col-sm-3">
					<input type="text" name="project_number" maxlength="60" placeholder="Projektnummer" id="project_number" class="form-control" value="">
				</div>
			</div>	
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Länge:</label>
				<div class="col-sm-3">
					<input type="text" name="length" maxlength="60" placeholder="Länge" id="length" class="form-control" value="">
				</div>
				
				<label class="col-sm-1 form-control-label">Ankunft im Lager:</label>
				<div class="col-sm-3">
					<input type="text" name="arrival_date" maxlength="60" placeholder="Ankunft im Lager" id="arrival_date" class="form-control" value="">
				</div>	
				<label class="col-sm-1 form-control-label">Menge je Einzelpackung:</label>
				<div class="col-sm-3">
					<input type="text" name="per_single_packaging" maxlength="60" placeholder="Menge je Einzelpackung" " id="per_single_packaging" class="form-control" value="">
				</div>				
			</div>	
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">DIN-Norm:</label>
				<div class="col-sm-3">
					<input type="text" name="din_norm" maxlength="60" placeholder="DIN-Norm" id="din_norm" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Haltbarkeit:</label>
				<div class="col-sm-3">
					<input type="text" name="duration" maxlength="60" placeholder="Haltbarkeit" id="duration" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Anwendungsdauer:</label>
				<div class="col-sm-3">
					<input type="text" name="usagee" maxlength="60" placeholder="Anwendungsdauer" id="usagee" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Eigenschaften:</label>
				<div class="col-sm-3">
					<input type="text" name="properties" maxlength="60" placeholder="Eigenschaften" id="properties" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Menge Einzelpackungen:</label>
				<div class="col-sm-3">
					<input type="text" name="quantity_packaging" maxlength="60" placeholder="Menge Einzelpackungen" id="quantity_packaging" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Besonderheiten / Schutz gegen:</label>
				<div class="col-sm-3">
					<input type="text" name="particularities" maxlength="60" placeholder="Besonderheiten / Schutz gegen" id="particularities" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Menge Boxen:</label>
				<div class="col-sm-3">
					<input type="text" name="quantity_box" maxlength="60" placeholder="Menge Boxen" id="quantity_box" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Menge je Box:</label>
				<div class="col-sm-3">
					<input type="text" name="quantity_per_box" maxlength="60" placeholder="Menge je Box" id="quantity_per_box" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Anzahl der Schichten:</label>
				<div class="col-sm-3">
					<input type="text" name="layers" maxlength="60" placeholder="Anzahl der Schichten" id="layers" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Menge je Karton:</label>
				<div class="col-sm-3">
					<input type="text" name="quantity_per_carton" maxlength="60" placeholder="Menge je Karton" id="quantity_per_carton" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Größe:</label>
				<div class="col-sm-3">
					<input type="text" name="size" maxlength="60" placeholder="Größe" id="size" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Lagerbestand Einzelpackungen:</label>
				<div class="col-sm-3">
					<input type="text" name="stock_single_packaging" maxlength="60" placeholder="Lagerbestand Einzelpackungen" id="stock_single_packaging" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Lagerbestand Boxen:</label>
				<div class="col-sm-3">
					<input type="text" name="stock_boxes" maxlength="60" placeholder="Lagerbstand Boxen" id="stock_boxes" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Lagerbestand Karton:</label>
				<div class="col-sm-3">
					<input type="text" name="stock_carton" maxlength="60" placeholder="Lagerbstand Karton" id="stock_carton" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Lagerbestand Paletten:</label>
				<div class="col-sm-3">
					<input type="text" name="count_palettes" maxlength="60" placeholder="Lagerbstand Paletten" id="count_palettes" class="form-control" value="">
				</div>
			</div>	
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Kartonmaß:</label>
				<div class="col-sm-3">
					<input type="text" name="carton_dimensions" maxlength="60" placeholder="Kartonmaß" id="carton_dimensions" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Lagerort:</label>
				<div class="col-sm-3" >
					<select id="location" name="location" class="form-control" >
						<option value="0">Auswählen</option>
						<option value="Büro">Büro</option>
						<option value="Lager Intern">Lager Intern</option>
						<option value="Lager Extern">Lager Extern</option>
					</select>
				</div>
				<label class="col-sm-1 form-control-label">Produktionsdatum:</label>
				<div class="col-sm-3">
					<input  <input type="datetime-local"  name="production_date" maxlength="60" placeholder="Produktionsdatum" id="production_date" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Medizinischer Standard:</label>
				<div class="col-sm-3">
					<input type="text" name="medical_standard" maxlength="60" placeholder="Medizinischer Standard" id="medical_standard" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Anzahl Kartons:</label>
				<div class="col-sm-3">
					<input type="text" name="quantity_carton" maxlength="60" placeholder="Lagerbstand Paletten" id="quantity_carton" class="form-control" value="">
				</div>
				
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Gesamtanzahl:</label>
				<div class="col-sm-3">
					<input type="text" name="total_quantity" maxlength="60" placeholder="Gesamtanzahl" id="total_quantity" class="form-control" value="">
				</div>
				
					<label class="col-sm-1 form-control-label">Lageungsdatum:</label>
				<div class="col-sm-3">
					<input  type="datetime-local" name="storage_date" maxlength="60" placeholder="storage_date" id="total_quantity" class="form-control" value="">
				</div>
			</div>
			
		</div><!-- Tab-Bearbeiten Ende-->
		<!-- Hier beginnt Preis-Tab-->
		<div id="price" class="tab-pane fade">
			<div class="form-group row col-md-12">	
				<label class="col-sm-1 form-control-label">Einkaufspreis je Stück:</label>
				<div class="col-sm-3">
					<input type="text" name="purchasing_price_single" maxlength="60" placeholder="Einkaufspreis je Stück" id="purchasing_price_single" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Einkaufspreis je Box:</label>
				<div class="col-sm-3">
					<input type="text" name="purchasing_price_box" maxlength="60" placeholder="Einkaufspreis je Box" id="purchasing_price_box" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Einkaufspreis je Karton:</label>
				<div class="col-sm-3">
					<input type="text" name="purchasing_price_per_carton" maxlength="60" placeholder="Einkaufspreis je Karton" id="purchasing_price_per_carton" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Einkaufspreis je Einzelpackung:</label>
					<div class="col-sm-3">
						<input type="text" name="purchasing_per_individual_package" maxlength="60" placeholder="Einkaufspreis je Einzelpackung" id="purchasing_per_individual_package" class="form-control" value="">
					</div>
				<label class="col-sm-1 form-control-label">Einkaufspreis je 100 Stück:</label>
					<div class="col-sm-3">
						<input type="text" name="purchasing_per_100" maxlength="60" placeholder="Einkaufspreis je 100 Stück" id="purchasing_per_100" class="form-control" value="">
					</div>				
				<label class="col-sm-1 form-control-label">Einkaufspreis gesamt:</label>
					<div class="col-sm-3">
						<input type="text" name="purchasing_price_total_amount" maxlength="60" placeholder="Einkaufspreis gesamt" id="purchasing_price_total_amount" class="form-control" value="">
					</div>
			</div>
			<div class="form-group row col-md-12">	
				<label class="col-sm-1 form-control-label">Verkaufspreis je Stück:</label>
					<div class="col-sm-3">
						<input type="text" name="sell_price_single" maxlength="60" placeholder="Verkaufspreis je Stück" id="sell_price_single" class="form-control" value="">
					</div>
				<label class="col-sm-1 form-control-label">Zielverkaufspreis je Box:</label>
					<div class="col-sm-3">
						<input type="text" name="sell_price_box_target" maxlength="60" placeholder="Zielverkaufspreis je Box" id="sell_price_box_target" class="form-control" value="">
					</div>
				<label class="col-sm-1 form-control-label">Zielverkaufspreis gesamt:</label>
					<div class="col-sm-3">
						<input type="text" name="sell_price_total_target" maxlength="60" placeholder="Zielverkaufspreis gesamt" id="sell_price_total_target" class="form-control" value="">
					</div>
			</div>
			<div class="form-group row col-md-12">	
				<label class="col-sm-1 form-control-label">Marge je Box PLAN:</label>
					<div class="col-sm-3">
						<input type="text" name="margin_box_target" maxlength="60" placeholder="Marge je Box PLAN" id="margin_box_target" class="form-control" value="">
					</div>
				<label class="col-sm-1 form-control-label">Marge Boxen gesamt PLAN:</label>
					<div class="col-sm-3">
						<input type="text" name="margin_total_box_target" maxlength="60" placeholder="Marge Boxen gesamt PLAN" id="margin_total_box_target" class="form-control" value="">
					</div>
				<label class="col-sm-1 form-control-label">Marge Gesamt alle Boxen PLAN:</label>
					<div class="col-sm-3">
						<input type="text" name="margin_sell_price_box" maxlength="60" placeholder="Marge Gesamt alle Boxen PLAN" id="margin_sell_price_box" class="form-control" value="">
					</div>
			</div>
			<div class="form-group row col-md-12">	
				<label class="col-sm-1 form-control-label">Verkaufspreis je Box IST:</label>
				<div class="col-sm-3">
					<input type="text" name="sell_price_box" maxlength="60" placeholder="Verkaufspreis je Box IST" id="sell_price_box" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Verkaufspreis Gesamt IST:</label>
				<div class="col-sm-3">
					<input type="text" name="total_sell_price" maxlength="60" placeholder="Einkaufspreis je Box" id="total_sell_price" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Marge Gesamt verkaufte Boxen IST:</label>
				<div class="col-sm-3">
					<input type="text" name="sell_price_total_amount" maxlength="60" placeholder="sell_price_total_amount" id="sell_price_total_amount" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Marge Gesamt verkaufte Boxen IST:</label>
				<div class="col-sm-3">
					<input type="text" name="margin_total_sold_boxes" maxlength="60" placeholder="margin_total_sold_boxes" id="margegesamtverkaufteboxenist" class="form-control" value="">
				</div>
			</div>
		</div>
		<!-- Hier beginnt Lieferanten-Tab -->
		<div id="suppliers" class="tab-pane fade">
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Lieferanten Nr.:</label>
				<div class="col-sm-5">
						<input type="text" name="sup_id" id="sup_id" class="form-control" value="" disabled> 
				</div>
				<label class="col-sm-1 control-label" for="rolename">Dienstl.:</label>
				<div class="col-sm-5">
					<select id="service" name="service" class="multiselect-ui form-control" multiple="multiple">
						<option value="speditionswesen">Speditionswesen</option>
						<option value="fiskalverzollung">Fiskalverzollung</option>
						<option value="verzollung">Verzollung</option>
						<option value="zertifizierung">Zertifizierung,Prüfung,Testen</option>
						<option value="behoerden">Behörden,Ämter,Institutionen</option>
					</select>
				</div>
			</div>
		<div class="form-group row col-md-12">
			<label class="col-sm-1 form-control-label">Produktyp:</label>
				<div class="col-sm-5" id="ptcol">
					<select id="product_type2" name="product_type2" class="form-control" >
						<option value="0">Auswählen</option>
						<option value="1">Tasche</option>
						<option value="2">Maske</option>
						<option value="3">Handschuhe</option>
					</select>
				</div>
			<div id="bags" style="display: none" >
				<label class="col-sm-1 control-label" for="rolename">Taschen:</label>
				<div class="col-sm-2">
					<select id="bags2" class="multiselect-ui form-control" multiple="multiple">
						<option value="Autopflege">Autopflege Tasche</option>
						<option value="BaumwollEinfach">Baumwoll Zuziehnbeutel(Einfach)</option>
						<option value="BaumwollRucksack">Baumwoll Zuziehnbeutel(Rucksack)</option>
						<option value="Baumwollnetz">Baumwollnetz</option>
						<option value="Baumwolltasche">Baumwolltasche</option>
						<option value="Bettaufbewahrungstasche">Bettaufbewahrungstasche</option>
						<option value="BoxLebensmittel">Box - Lebensmittel Präsentation</option>
						<option value="Broschüre">Broschüre</option>
						<option value="Canvas Baumwolltasche">Canvas Baumwolltasche</option>
						<option value="Folientragetasche">DKT Folientragetasche</option>
						<option value="Einkaufsnetztasche">Einkaufsnetztasche</option>
						<option value="Faltbare Einkaufstasche">Faltbare Einkaufstasche</option>
						<option value="Faltbarer Rucksack">Faltbarer Rucksack</option>
						<option value="Filztasche">Filztasche</option>
						<option value="Flaschentasche">Flaschentasche</option>
						<option value="Food Verpackung">Food Verpackung</option>
						<option value="Geschenkverpackung">Geschenkverpackung,Luxus</option>
						<option value="Gurtbänder">Gurtbänder,Elastische Bänder,Spitzen,Seile,Fransen,Kordeln,dekorative Streifen,Schmalgewebe</option>
						<option value="Hunde">Hunde Kot Beutel</option>
						<option value="Isoliertaschen">Isoliertaschen</option>
						<option value="tomatoFaltbareres">Faltbarer Rucksack</option>
						<option value="mozarella">Filztasche</option>
						<option value="mushrooms">Flaschentasche</option>
						<option value="pepperoni">Food Verpackung</option>
					</select>
				</div>
			</div>
			<div id="masks" style="display: none" >
			<label class="col-sm-1 control-label" for="rolename">Masken:</label>
				<div class="col-sm-2">
					<select id="masks2" class="multiselect-ui form-control" multiple="multiple">
						<option value="Autopflege2">Autopflege Tasche</option>
						<option value="Fiskalverzollung">Fiskalverzollung</option>
						<option value="Verzollung">Verzollung</option>
						<option value="Prüfung">Zertifizierung,Prüfung,Testen</option>
						<option value="Ämter">Behörden,Ämter,Institutionen</option>
					</select>
				</div>
			</div>
			<div id="gloves" style="display: none" >
				<label class="col-sm-1  control-label" for="rolename">Handschuhe:</label>
				<div class="col-sm-2" >
					<select id="gloves2"  class="multiselect-ui form-control" multiple="multiple">
						<option value="tomatoes">Autopflege Tasche</option>
						<option value="mozarella">Fiskalverzollung</option>
						<option value="mushrooms">Verzollung</option>
						<option value="pepperoni">Zertifizierung,Prüfung,Testen</option>
						<option value="onions">Behörden,Ämter,Institutionen</option>
					</select>
				</div>
			</div>
				<label class="col-sm-1 form-control-label">Firma:</label>
			<div class="col-sm-5">
				<input type="text" name="firma" maxlength="60" placeholder="Firma" id="firma" class="form-control" value="">
			</div>
		</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Standardmaterialien:</label>
				<div class="col-sm-5">
					<select id="standardmaterial2" class="multiselect-ui form-control" multiple="multiple">
						<option value="tomatoes">Speditionswesen</option>
						<option value="mozarella">Fiskalverzollung</option>
						<option value="mushrooms">Verzollung</option>
						<option value="pepperoni">Zertifizierung,Prüfung,Testen</option>
						<option value="onions">Behörden,Ämter,Institutionen</option>
					</select>
				</div>
				<label class="col-sm-1 form-control-label">Zertifikate:</label>
				<div class="col-sm-5">
					<select id="certificates2" class="multiselect-ui form-control" multiple="multiple">
						<option value="tomatoes">Speditionswesen</option>
						<option value="mozarella">Fiskalverzollung</option>
						<option value="mushrooms">Verzollung</option>
						<option value="pepperoni">Zertifizierung,Prüfung,Testen</option>
						<option value="onions">Behörden,Ämter,Institutionen</option>
					</select>
				</div>	
			</div>
			<div class="form-group row col-md-12">
			<label class="col-sm-1 form-control-label">Druckverfahren:</label>
				<div class="col-sm-5">
				<select id="druckverfahren" class="multiselect-ui form-control" multiple="multiple">
					<option value="tomatoes">Speditionswesen</option>
					<option value="mozarella">Fiskalverzollung</option>
					<option value="mushrooms">Verzollung</option>
					<option value="pepperoni">Zertifizierung,Prüfung,Testen</option>
					<option value="onions">Behörden,Ämter,Institutionen</option>
				</select>
				</div>
				<label class="col-sm-1 form-control-label">Sperren für:</label>
				<div class="col-sm-5">
				<select id="sperren" class="multiselect-ui form-control" multiple="multiple">
					<option value="tomatoes">Projekte</option>
				</select>
				</div>
			</div>
			<div class="form-group row col-md-12">
			<label class="col-sm-1 form-control-label">Anrede / Vorname:</label>
			<div class="col-sm-2">
				<select name="heading" id="heading" class="multiselect-ui form-control" multiple="multiple">
					<option value="woman">Speditionswesen</option>
					<option value="man">Fiskalverzollung</option>
				</select>
				</div>
				<div class="col-sm-3">
					<input type="text" name="forename" maxlength="60" placeholder="Vorname" id="forename" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Nachname:</label>
				<div class="col-sm-5">
					<input type="text" name="surname" maxlength="60" placeholder="Nachname" id="surname" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Position:</label>
				<div class="col-sm-5">
					<input type="text" name="position" maxlength="60" placeholder="Position" id="position" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Titel:</label>
				<div class="col-sm-5">
					<input type="text" name="title" maxlength="60" placeholder="Titel" id="title" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Strasse:</label>
				<div class="col-sm-5">
					<input type="text" name="street" maxlength="60" placeholder="Strasse" id="street" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Nr.:</label>
				<div class="col-sm-5">
					<input type="text" name="number" maxlength="60" placeholder="Nr." id="number" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">PLZ:</label>
				<div class="col-sm-5">
					<input type="text" name="p_c" maxlength="60" placeholder="PLZ" id="p_c" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Ort:</label>
				<div class="col-sm-5">
					<input type="text" name="location" maxlength="60" placeholder="Ort" id="location" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
			<label class="col-sm-1 form-control-label">Land:</label>
				<div class="col-sm-5">
					<input type="text" name="country" maxlength="60" placeholder="land" id="country" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Kontinent:</label>
				<div class="col-sm-5">
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Europa
					<span class="caret"></span></button>
					<ul class="dropdown-menu">
					  <li><a href="#">Afrika</a></li>
					  <li><a href="#">Asien</a></li>
					  <li><a href="#">Australien</a></li>
					  <li><a href="#">Europa</a></li>
					  <li><a href="#">Nordamerika</a></li>
					  <li><a href="#">Südamerika</a></li>
					</ul>
				</div>
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Telefone:</label>
				<div class="col-sm-5">
					<input type="text" name="phone" maxlength="60" placeholder="Telefone" id="phone" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">E-Mail*:</label>
				<div class="col-sm-5">
					<input type="text" name="email" maxlength="60" placeholder="E-Mail" id="email" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Mobil:</label>
				<div class="col-sm-5">
					<input type="text" name="mobile" maxlength="60" placeholder="Mobil" id="mobile" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Fax:</label>
				<div class="col-sm-5">
					<input type="text" name="fax" maxlength="60" placeholder="Fax" id="fax" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Skype:</label>
				<div class="col-sm-5">
					<input type="text" name="skype" maxlength="60" placeholder="Skype" id="skype" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Facebook:</label>
				<div class="col-sm-5">
					<input type="text" name="facebook" maxlength="60" placeholder="Facebook" id="facebook" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Twitter:</label>
				<div class="col-sm-5">
					<input type="text" name="twitter" maxlength="60" placeholder="Twitter" id="twitter" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Whatsapp:</label>
				<div class="col-sm-5">
					<input type="text" name="whatsapp" maxlength="60" placeholder="Whatsapp" id="whatsapp" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Website:</label>
				<div class="col-sm-5">
					<input type="text" name="website" maxlength="60" placeholder="Website" id="website" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Ust. ID:</label>
				<div class="col-sm-5">
					<input type="text" name="ustid" maxlength="60" placeholder="Ust. ID" id="ustid" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Dokumente:</label>
				<div class="col-sm-5">
					<input type="text" name="document" maxlength="60" placeholder="Dokumente" id="document" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Vorl.:</label>
				<div class="col-sm-5">
					<input type="text" name="model" maxlength="60" placeholder="Vorlage" id="model" class="form-control" value="">
				</div>
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Kommentar:</label>
				<div class="col-sm-11">
				  <textarea class="form-control" rows="5" name="comment"  id="comment"></textarea>
				</div>
			</div>
		</div>
			<!-- Hier beginnt Zwischenlieferanten-Tab -->
		<div id="middleman" class="tab-pane fade">
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">Kontaktperson:</label>
				<label class="col-sm-1 form-control-label">Vorname:</label>
				<div class="col-sm-3">
					<input type="text" name="fore_name2" maxlength="60" placeholder="Vorname" id="fore_name2" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Nachname:</label>
				<div class="col-sm-3">
					<input type="text" name="sur_name2" maxlength="60" placeholder="Nachname" id="sur_name2" class="form-control" value="">
				</div>	
			</div>
			<div class="form-group row col-md-12">
				<label class="col-sm-1 form-control-label">		   </label>
				<label class="col-sm-1 form-control-label">Firma:</label>
				<div class="col-sm-3">
					<input type="text" name="company" maxlength="60" placeholder="Firma" id="company" class="form-control" value="">
				</div>
				<label class="col-sm-1 form-control-label">Zwischenlieferanten-Nr.:</label>
				<div class="col-sm-3">
					<input type="text" name="mid_id" maxlength="60" placeholder="Zwischenlieferanten-Nr" id="mid_id" class="form-control" value="">
				</div>
			</div>
			<!-- Lieferanten Id hinzufügen? -->
		</div>
		<!-- Hier beginnt Bilder-Tab -->
		<div id="image_name" class="tab-pane fade in active" >
		
		<div class="form-group row col-md-12">
		
		
		<form  action="product_add.php" method="post"  enctype="multipart/form-data">
 
			</div>
<center>
			 <label>Wählen Sie eine `Bild (*.JPG,PNG, usw.) von Ihrem Rechner aus.</label>
			
</form><br>

		<form <!--action="views/upload.php" method="post" enctype="multipart/form-data"--> 
			<i style= "color:grey;" >Bild hochladen</i>
		  <input class="btn btn-info" type="file" name="BildZumHochladen2" id="BildZumHochladen2"  size="50" accept="image/gif,image/jpeg,image/png"><br>
		  <input class="btn btn-info" type="file" name="BildZumHochladen" id="BildZumHochladen"  size="50" accept="image/gif,image/jpeg,image/png"><br>
		  
		 <input class="btn btn-info" style="width:100px"  type ="submit" name="upload" value="hochladen"><!--<a data-toggle="tab" href="#image_name"></a>-->
		
		</form>
				</center><br><br>
				
		
		
<?php
$dirPath="";
$BildZumHochladen="";
$bild="";
$nichtbild="";
$vorhanden="";
$groß="";
$nichthochgeladen="";
$hochgeladen="";
$bildart="";
$fehler="";
$path="";
$image_name="";
if(isset($_POST['upload'])){
	

 // $image_name = $_POST['image_name'];
//  vd($_FILES);
 // $img= $_FILES['path'];
   $dir = './';
     $filename = strval(time()) . ".svg";
        // 15000337384984.svg
        $newFile = $dir . "/" . $filename;
	if(!defined('ROOTPATH')){
		define('ROOTPATH', $_SERVER["DOCUMENT_ROOT"]);
	}

$dirPath = ROOTPATH."/warehousing/gallery/";
//echo $dirPath;


if(strtoupper(substr(php_uname('s'), 0, 3)) !== 'WIN'){
$oldmask = umask(0);
if(!file_exists($dirPath)){
mkdir($dirPath, 0777, true);
}
umask($oldmask);
}else{
if(!file_exists($dirPath)){
mkdir($dirPath, 0777, true);
}
}


$target_file = $dirPath . basename($_FILES["BildZumHochladen"]["name"]);
$BildZumHochladen= htmlspecialchars( basename( $_FILES["BildZumHochladen"]["name"]));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["BildZumHochladen"]["tmp_name"]);
  if($check !== false) {
    $bild= "<p><font color=Green>Es ist ein Bild - TOP! -<font></p> " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
   $nichtbild= "Es ist kein Bild - SCHLECHT!";
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  $vorhanden= " <p><font color=red>Fehler: Bildname bereits vorhanden.<font></p>";
  $uploadOk = 0;
}


if ($_FILES["BildZumHochladen"]["size"] > 5000000) {
  $groß="<p><font color=red>Fehler: Dein Bild ist zu groß!<font></p>";
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $bildart= "<p><font color=red>Fehler: Es gehen nur JPG, JPEG, PNG & GIF Bilder<font></p>";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  $nichthochgeladen= " Bild wurde nicht Hochgeladen.";


} else {
  if (move_uploaded_file($_FILES["BildZumHochladen"]["tmp_name"], $target_file)) {
   $hochgeladen= "Bild ". htmlspecialchars( basename( $_FILES["BildZumHochladen"]["name"])). " hochgeladen.";
	
  } else {
    $fehler= "Es gab einen Fehler";
  }
}
	
}

	?>
	
	
	
	
	<?php
$dirPath="";
$BildZumHochladen2="";
$bild2="";
$nichtbild2="";
$vorhanden2="";
$groß2="";
$nichthochgeladen2="";
$hochgeladen2="";
$bildart2="";
$fehler2="";
$path="";
$image_name="";
if(isset($_POST['upload'])){
	

 // $image_name = $_POST['image_name'];
//  vd($_FILES);
 // $img= $_FILES['path'];
   $dir = './';
     $filename = strval(time()) . ".svg";
        // 15000337384984.svg
        $newFile = $dir . "/" . $filename;
	if(!defined('ROOTPATH')){
		define('ROOTPATH', $_SERVER["DOCUMENT_ROOT"]);
	}

$dirPath = ROOTPATH."/warehousing/gallery/";
//echo $dirPath;


if(strtoupper(substr(php_uname('s'), 0, 3)) !== 'WIN'){
$oldmask = umask(0);
if(!file_exists($dirPath)){
mkdir($dirPath, 0777, true);
}
umask($oldmask);
}else{
if(!file_exists($dirPath)){
mkdir($dirPath, 0777, true);
}
}


$target_file = $dirPath . basename($_FILES["BildZumHochladen2"]["name"]);
$BildZumHochladen2= htmlspecialchars( basename( $_FILES["BildZumHochladen2"]["name"]));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["BildZumHochladen2"]["tmp_name"]);
  if($check !== false) {
    $bild2= "<p><font color=Green>Es ist ein Bild - TOP! -<font></p> " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
   $nichtbild2= "Es ist kein Bild - SCHLECHT!";
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  $vorhanden2= " <p><font color=red>Fehler: Bildname bereits vorhanden.<font></p>";
  $uploadOk = 0;
}


if ($_FILES["BildZumHochladen2"]["size"] > 5000000) {
  $groß2="<p><font color=red>Fehler: Dein Bild ist zu groß!<font></p>";
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $bildart2= "<p><font color=red>Fehler: Es gehen nur JPG, JPEG, PNG & GIF Bilder<font></p>";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  $nichthochgeladen2= " Bild wurde nicht Hochgeladen.";


} else {
  if (move_uploaded_file($_FILES["BildZumHochladen2"]["tmp_name"], $target_file)) {
   $hochgeladen2= "Bild ". htmlspecialchars( basename( $_FILES["BildZumHochladen2"]["name"])). " hochgeladen.";
	
  } else {
    $fehler2= "Es gab einen Fehler";
  }
}
		
}

	?>
	
	
	
	
	
	
	
	<?php
$sql2=Inventory::getInventory($db);

	foreach ($sql2 as $row) :
	
	?>

	<p><?  htmlspecialchars($row['category_id']) ?></p>
	<?php endforeach ?>
	
	
	
	
<label class="col-sm-1 form-control-label">Name Bild1:</label>
				<div class="col-sm-3">
					<input type="text" name="image_name" maxlength="60" placeholder="Name" id="image_name" class="form-control" value="<?php if ($BildZumHochladen2==null){echo "kein Foto ausgewählt";}  echo  $BildZumHochladen2;?>">
					
				</div>
				<label class="col-sm-1 form-control-label">Pfad1:</label>
				<div class="col-sm-3">
					<input style="width:700px"; type="text" name="path" maxlength="60" placeholder="Pfad" id="path" class="form-control" value="<?php  
					/*if ($dirPath == null){
					echo "kein Foto ausgewählt";}*/
	  echo $dirPath ,$BildZumHochladen2; ?>">
				</div>
				
				
				
				<br><br><br><br>
				
				
				
			<label class="col-sm-1 form-control-label">Name Bild2:</label>
				<div class="col-sm-3">
					<input type="text" name="image_name2" maxlength="60" placeholder="Name" id="image_name2" class="form-control" value="<?php if ($BildZumHochladen==null){echo "kein Foto ausgewählt";}  echo  $BildZumHochladen;?>">
				</div>
				
				
				
				
				<label class="col-sm-1 form-control-label">Pfad2:</label>
				<div class="col-sm-3">
					<input style="width:700px"; type="text" name="path2" maxlength="60" placeholder="Pfad2" id="path2" class="form-control" value="<?php  
					/*if ($dirPath == null){
					echo "kein Foto ausgewählt";}*/
	  echo $dirPath,$BildZumHochladen ; ?>">
				</div><br>
				<br>
				<br>
				<br>
				
				
				
			<div <?php if($BildZumHochladen2==null){ ?>  class="in"<?php ;}else { ?> style="width:200px;height:250px;" class="gallery"><?php ;}?>
			  <a target="_blank" href="http://192.168.1.222/warehousing/gallery/<?php echo $BildZumHochladen2; ?>">
				<img  src="gallery/<?php if($BildZumHochladen2==null){echo "kein Bild ausgewählt";}else{  echo  $BildZumHochladen2;}?>" alt="Bild1" width="800" height="600"></a>
			  <div class="desc"><?php echo $BildZumHochladen2; ?></div>
			</div>
			<div <?php if($BildZumHochladen==null){ ?>  class="in"<?php ;}else { ?> style="width:200px;height:250px;" class="gallery"><?php ;}?>
			  <a target="_blank" href="http://192.168.1.222/warehousing/gallery/<?php echo $BildZumHochladen; ?>">
				<img src="gallery/<?php if($BildZumHochladen==null){echo "kein Bild ausgewählt";}else{ echo  $BildZumHochladen;}?>" alt="Bild2" width="800" height="600"></a>
			  <div class="desc"><?php echo $BildZumHochladen; ?></div>
			</div>
			

	</br></br></br></br></br>
		</br></br></br></br></br></br>
		<br>
		<br>
		
		<p style="font-size:25px;" class="btn btn-info">Erste Bild</p>
		<p><?php echo $bild2?></p>
	<p><?php echo $nichtbild2?></p>
	<p><?php echo $vorhanden2?></p>
	<p><?php echo $groß2?></p>
	<p><?php echo $nichthochgeladen2?></p>
	<p><?php echo $bildart2?></p>
	<p style="color:blue" ><?php echo $hochgeladen2?></p>
	<p><?php echo $fehler2?></p>
	
		<p style="font-size:25px;" class="btn btn-info">Zweite Bild</p>
		<p><?php echo $bild?></p>
	<p><?php echo $nichtbild?></p>
	<p><?php echo $vorhanden?></p>
	<p><?php echo $groß?></p>
	<p><?php echo $nichthochgeladen?></p>
	<p><?php echo $bildart?></p>
	<p style="color:blue" ><?php echo $hochgeladen?></p>
	<p><?php echo $fehler?></p>
	
		</div>
	
	<!-- Tab-Ende -->
		<!-- hier kommt ein Button hin -->
		<div class="form-group row">
			<div class="col-lg-3 col-md-4 col-sm-5 col-xs-7">
				<button  class="btn btn-success custom2" id="BildZumHochladen" name="supplier_save" > <?php echo _lang('Speichern	'); ?> 
					<span class="fas fa-save" aria-hidden="true"></span>
					
				</button>
			</div>
		</div>
</div><!-- Ende -->
</form>
