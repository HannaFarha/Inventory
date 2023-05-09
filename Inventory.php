
<?php 
//Eltern Klasse Inventory 

class Inventory{
	//alle Variablen
	private $product_type;
	private $brand;
	private $production_date;
	private $product_name;
	private $arrival_date;
	private $storage_date="";
	
	private $duration;
	private $usagee;
	private $size;
	private $color;
	private $din_norm;
	private $layers;
	private $length;
	private $properties;
	private $particularities;
	private $medical_standard;
	private $quantity_packaging;
	private $quantity_box;
	private $quantity_carton;
	private $project_number;
	private $stock_single_packaging;
	private $stock_boxes;
	private $stock_carton;
	private $count_palettes;
	private $prices_category_id;
	private $carton_dimensions;
	private $project_types_id;
	private $per_single_packaging;
	private $total_quantity;
	private $images_id;
	private $storage_location_id;
	private $m_id;
	private $material_id;
	private $p_id;
	private $purchasing_per_100;
	private $purchasing_price_single;
	private $purchasing_price_box;
	private $purchasing_price_per_carton;
	private $purchasing_price_total_amount;
	private $purchasing_per_individual_package;
	private $boxes_sold;
	private $sell_price_box_target;
	private $sell_price_total_target;
	private $margin_box_target;
	private $sell_price_single;
	private $sell_price_box;
	private $margin_sell_price_box;
	private $margin_sell_price_boxes;
	private $mat_name;
	private $pt_id;
	private $sell_price_total_amount;
	private $quantity_per_carton;
	private $quantity_per_box;
	

	private $i_id;
	

public function __construct($data = array()){
		$this->setData($data);
	}
	public function setData(array $data){
		if($data){
			foreach($data as $key => $val){	
				$setterName = 'set'.ucfirst($key);
				if(method_exists($this, $setterName)){
					$this->$setterName($val);
				}
			}
		}
	}
	 //GET                             
	 
	public function getProduct_type(){return $this->product_type;}
	public function getBrand(){return $this->brand;}

	public function getProduction_date(){return $this->production_date;}
	public function getProduct_name(){return $this->product_name;}
	public function getArrival_date(){return $this->arrival_date;}
	public function getStorage_date(){return $this->storage_date;}
	public function getQuantity_per_carton(){return $this->quantity_per_carton;}
	public function getQuantity_per_box(){return $this->quantity_per_box;}
	public function getStorage_location_id(){return $this->storage_location_id;}
	public function getDuration(){return $this->duration;}
	public function getUsage(){return $this->usagee;}
	public function getSize(){return $this->size;}
	public function getColor(){return $this->color;}
	public function getDin_norm(){return $this->din_norm;}
	public function getLayers(){return $this->layers;}
	public function getLength(){return $this->length;}
	public function getProperties(){return $this->properties;}
	public function getParticularities(){return $this->particularities;}
	public function getMedical_standard(){return $this->medical_standard;}
	public function getQuantity_packaging(){return $this->quantity_packaging;}
	public function getQuantity_box(){return $this->quantity_box;}
	public function getQuantity_carton(){return $this->quantity_carton;}
	public function getProject_number(){return $this->project_number;}
	public function getStock_single_packaging(){return $this->stock_single_packaging;}
	public function getStock_boxes(){return $this->stock_boxes;}
	public function getStock_carton(){return $this->stock_carton;}
	public function getCount_palettes(){return $this->count_palettes;}
	public function getPrices_category_id(){return $this->prices_category_id;}
	public function getCarton_dimensions(){return $this->carton_dimensions;}
	public function getProject_types_id(){return $this->project_types_id;}
	public function getPer_single_packaging(){return $this->per_single_packaging;}
	public function getTotal_quantity(){return $this->total_quantity;}
	public function getImages_id(){return $this->images_id;}
	//public function getStorage_location_id(){return $this->storage_location_id;}
	public function getMaterial_id(){return $this->material_id;}
	public function getSur_name2(){return $this->sur_name2;}
	public function getMid_id(){return $this->mid_id;}
	public function getPurchasing_per_100(){return $this->purchasing_per_100;}
	public function getPurchasing_price_single(){return $this->purchasing_price_single;}
	public function getPurchasing_price_box(){return $this->purchasing_price_box;}
	public function getPurchasing_price_per_carton(){return $this->purchasing_price_per_carton;}
	public function getPurchasing_price_total_amount(){return $this->purchasing_price_total_amount;}
	public function getPurchasing_per_individual_package(){return $this->purchasing_per_individual_package;}
	
	public function getBoxes_sold(){return $this->boxes_sold;}
	public function getSell_price_box_target(){return $this->sell_price_box_target;}
	public function getSell_price_total_target(){return $this->sell_price_total_target;}
	public function getMargin_box_target(){return $this->margin_box_target;}
	public function getSell_price_single(){return $this->sell_price_single;}
	public function getSell_price_box(){return $this->sell_price_box;}
	public function getMargin_sell_price_box(){return $this->margin_sell_price_box;}
	public function getMargin_sell_price_boxes(){return $this->margin_sell_price_boxes;}

	public function getMat_name(){return $this->mat_name;}
	public function getPt_id(){return $this->pt_id;}
	public function getI_id(){return $this->i_id;}
	public function getImage_name(){return $this->image_name;}
	public function getImage_name2(){return $this->image_name2;}
	public function getPath(){return $this->path;}
	public function getPath2(){return $this->path2;}
	public function getSl_id(){return $this->sl_id;}
	public function getlocation(){return $this->location;}
	public function getId(){return $this->id;}
	public function getWhatsapp(){return $this->whatsapp;}
	public function getWebsite(){return $this->website;}
	public function getUst_id(){return $this->ust_id;}
	public function getDocumente(){return $this->documente;}
	public function getIp(){return $this->ip;}
	public function getContakt(){return $this->contakt;}
	public function getLocked_until(){return $this->locked_until;}
	public function getA_id(){return $this->a_id;}
	public function getS_id(){return $this->s_id;}
	public function getR_id(){return $this->r_id;}
	public function getC_id(){return $this->c_id;}
	public function getContinent(){return $this->continent;}
	public function getSn_id(){return $this->sn_id;}
	public function getOption_name(){return $this->option_name;}
	public function getOption_value(){return $this->option_value;}
	public function getU_id(){return $this->u_id;}
	public function getUser_id(){return $this->user_id;}
	public function getUser_name(){return $this->user_name;}
	public function getUser_pass(){return $this->user_pass;}
	public function getUser_email(){return $this->user_email;}
	public function getUser_logins(){return $this->user_logins;}
	public function getUser_role(){return $this->user_role;}
	public function getUser_rights(){return $this->user_rights;}
	public function getUser_locked(){return $this->user_locked;}
	public function getUser_leader(){return $this->user_leader;}
	public function getUser_key(){return $this->user_key;}
	public function getUser_firstname(){return $this->user_first_name;}
	public function getUser_lastname(){return $this->user_lastname;}
	public function getSur_name(){return $this->sur_name;}
	public function getFore_name(){return $this->fore_name;}
	public function getFacebook(){return $this->facebook;}
	public function getTwitter(){return $this->twitter;}
	public function getPhone(){return $this->phone;}
	public function getMobile(){return $this->mobile;}
	public function getTitle(){return $this-title;}
	public function getStreet(){return $this->street;}
	public function getPosition(){return $this->position;}
	public function getEmail(){return $this->email;}
	public function getCountry(){return $this->country;}
	public function getFax(){return $this->fax;}
	public function getCompany(){return $this->company;}
	public function getSupplier(){return $this->supplier;}
	public function getTarget_sale_of_price_total_amount(){return $this->target_sale_of_price_total_amount;}
	public function getTarget_sale_of_price_per_box(){return $this->target_sale_of_price_per_box;}
	
	public function getSold_boxes(){return $this->sold_boxes;}
	public function getMargin_total_all_boxes_target(){return $this->margin_total_all_boxes_target;}
	public function geTtarget_margin_total_amount_all_boxes(){return $this->target_margin_total_amount_all_boxes;}
	public function getTotal_sell_price(){return $this->total_sell_price;}
	public function getMargin_total_amount_all_boxes(){return $this->margin_total_amount_all_boxes;}
	public function getSell_price_total_amount(){return $this->sell_price_total_amount;}
	
	
	//einfügen in Inventory
	public static function insertInventory($db,$data,$lastPricesID,$lastSTLID,$lastPCatID){
		//automatisch einfügen, wenn die Leer sind, Fehler vermeiden  
		if($data["carton_dimensions"] == null){
			$data["carton_dimensions"] = 0;
		}
		if($data["production_date"] == null){
			$data["production_date"] = date('Y-m-d H:i:s');
		}
		if($data["arrival_date"] == null){
			$data["arrival_date"] = date('Y-m-d H:i:s');
		}
		if($data["storage_date"] == null){
			$data["storage_date"] = date('Y-m-d H:i:s');
		}
		if($data["quantity_packaging"] == null){
			$data["quantity_packaging"] = 0;
		}
		if($data["quantity_box"] == null){
			$data["quantity_box"] = 0;
		}
		if($data["quantity_carton"] == null){
			$data["quantity_carton"] = 0;
		}
		if($data["stock_single_packaging"] == null){
			$data["stock_single_packaging"] = 0;
		}
		if($data["stock_boxes"] == null){
			$data["stock_boxes"] = 0;
		}
		if($data["stock_carton"] == null){
			$data["stock_carton"] = 0;
		}
		if($data["count_palettes"] == null){
			$data["count_palettes"] = 0;
		}
		if($data["per_single_packaging"] == null){
			$data["per_single_packaging"] = 0;
		}
		if($data["total_quantity"] == null){
			$data["total_quantity"] = 0;
		}
		if($data["quantity_per_carton"] == null){
			$data["quantity_per_carton"] = 0;
		}
		if($data["quantity_per_box"] == null){
			$data["quantity_per_box"] = 0;
		}

		//insertInventory wurde in product_add Datei benutzt, um Daten einzufügen und die Letzte Id zu erkannen
		$query = $db->prepare('INSERT INTO `inventory` (
			`product_type`,
			`brand`,
			`production_date`,
			`product_name`,
			`arrival_date`,
			`storage_date`,
			`duration`,
			`usagee`,
			`size`,
			`color`,
			`din_norm`,
			`layers`,
			`length`,
			`properties`,
			`particularities`,
			`medical_standard`,
			`quantity_packaging`,
			`quantity_box`,
			`quantity_carton`,
			`project_number`,
			`stock_single_packaging`,
			`stock_boxes`,
			`stock_carton`,
			`count_palettes`,
			`prices_category_id`,
			`carton_dimensions`,
				
			`per_single_packaging`,
			`total_quantity`,
			`images_id`,
			`storage_location_id`,
			`material_id`,
			`quantity_per_carton`,
			`quantity_per_box`
		)
		values
		(
			"'.$data["product_type"].'",
			"'.$data["brand"].'",
			"'.$data["production_date"].'",
			"'.$data["product_name"].'",
			"'.$data["arrival_date"].'",
			"'.$data["storage_date"].'",
			"'.$data["duration"].'",
			"'.$data["usagee"].'",
			"'.$data["size"].'",
			"'.$data["color"].'",
			"'.$data["din_norm"].'",
			"'.$data["layers"].'",
			"'.$data["length"].'",
			"'.$data["properties"].'",
			"'.$data["particularities"].'",
			"'.$data["medical_standard"].'",
			"'.$data["quantity_packaging"].'",
			"'.$data["quantity_box"].'",
			"'.$data["quantity_carton"].'",
			"'.$data["project_number"].'",
			"'.$data["stock_single_packaging"].'",
			"'.$data["stock_boxes"].'",
			"'.$data["stock_carton"].'",
			"'.$data["count_palettes"].'",
			"'.$lastPricesID.'",
			"'.$data["carton_dimensions"].'",
			
			"'.$data["per_single_packaging"].'",
			"'.$data["total_quantity"].'",
			"'.$lastPCatID.'",
			"'.$lastSTLID.'",
			"'.$data["material_id"].'",
			"'.$data["quantity_per_carton"].'",
			"'.$data["quantity_per_box"].'"
		
		);');
		$query->execute();
		$lastid = $db->lastInsertId();
		return $lastid;
	}

//getInventoryall  alle Inventory Daten aus Datenbank auslesen
	public static function getInventoryall($db,$id){
		
		$query = $db->query("SELECT
			`product_type`,
			`brand`,
			`production_date`,
			`product_name`,
			`arrival_date`,
			`storage_date`,
			`duration`,
			`usagee`,
			`size`,
			`color`,
			`din_norm`,
			`layers`,
			`length`,
			`properties`,
			`particularities`,
			`medical_standard`,
			`quantity_packaging`,
			`quantity_box`,
			`quantity_carton`,
			`project_number`,
			`stock_single_packaging`,
			`stock_boxes`,
			`stock_carton`,
			`count_palettes`,
			`prices_category_id`,
			`carton_dimensions`,
			`product_types_id`,
			`per_single_packaging`,
			`total_quantity`,
			`images_id`,
			`storage_location_id`,
			`material_id`,
			`quantity_per_carton`,
			`quantity_per_box`
		FROM inventory 
		WHERE `category_id`= $id
		;");
		$query->setFetchMode(PDO::FETCH_CLASS, "Inventory", array()); 
		$data = $query->fetchAll();
		return $data;
}
//getInventory damit wurde in dashboard Datei die wichtige Produkteinfo gezeigt  
public static function getInventory($db){
		
		$query = $db->query("SELECT
			`category_id`,
			`product_type`,
			`brand`,
			`production_date`,
			`product_name`,
			`arrival_date`,
			`storage_date`,
			`size`,
			`color`,
			`din_norm`,
			`length`,
			`medical_standard`,
			`quantity_packaging`,
			`quantity_box`,
			`quantity_carton`,
			`project_number`,
			`stock_single_packaging`,
			`stock_boxes`,
			`stock_carton`,
			`carton_dimensions`,
			`per_single_packaging`,
			`total_quantity`

		FROM inventory
		 ORDER BY category_id DESC
		;");
		//$query->setFetchMode(PDO::FETCH_CLASS, "Inventory", array()); 
		$data = $query->fetchAll();
		return $data;
}
		
		//getInventorysearch wurde in Suchbutton verwendet
		public static function getInventorysearch($db,$term){
		
		$query = $db->query("SELECT
			`category_id`,
			`product_type`,
			`brand`,
			`production_date`,
			`product_name`,
			`arrival_date`,
			`storage_date`,
			`size`,
			`color`,
			`din_norm`,
			`length`,
			`medical_standard`,
			`quantity_packaging`,
			`quantity_box`,
			`quantity_carton`,
			`project_number`,
			`stock_single_packaging`,
			`stock_boxes`,
			`stock_carton`,
			`carton_dimensions`,
			`per_single_packaging`,
			`total_quantity`

		FROM inventory 
		WHERE product_name  LIKE '%".$term."%';
		");
		$data = $query->fetchAll();
		return $data;
}

// updateInventory  kann man damit gegebene Info ändern  
	public static function updateInventory($db,$data,$sid){
			if($data["storage_date"] == ""){
			$data["storage_date"] = NULL;
		}
		if($data["arrival_date"] == ""){
			$data["arrival_date"] = NULL;
		}
		if($data["production_date"] == ""){
			$data["production_date"] = NULL;
		}
		
		
		$query = $db->prepare("
		UPDATE inventory SET
	
		storage_date=:speicherdaten,
		duration=:dauer,
		product_type=:produktart,
		particularities=:besonderheiten,
		count_palettes=:anzahlpaletten,
		arrival_date=:ankommdatum,
		properties=:eigenschaft,
		brand=:marke,
		product_name=:produktname,
		size=:groesse,
		color=:farbe,
		din_norm=:dinnorm,
		layers=:schichten,
		medical_standard=:medizinischerstandard,
		quantity_packaging=:mengenverpackung,
		quantity_box=:mengenbox,
		quantity_carton=:mengenkarton,
		project_number=:projektnummer,
		stock_single_packaging=:stocksingleverpackung,
		stock_boxes=:stockboxen,
		stock_carton=:stockkarton,
		carton_dimensions=:kartonmessungen,
		per_single_packaging=:prosingleverpackung,
		total_quantity=:totalmengen,
		length=:laenge,
		quantity_per_carton=:mengejekarton,
		quantity_per_box=:mengejebox,
		usagee=:anwendungdauer,
		material_id=:mid,
		storage_location_id=:speicherort,
		production_date=:produktionsdatum
	
		WHERE `category_id`=:kategoryid
		;");
		$query->bindValue(":produktart", $data['product_type'], PDO::PARAM_STR);
		$query->bindValue(":marke", $data['brand'], PDO::PARAM_STR);
		$query->bindValue(":produktname", $data['product_name'], PDO::PARAM_STR);
		$query->bindValue(":groesse", $data['size'], PDO::PARAM_STR);
		$query->bindValue(":farbe", $data['color'], PDO::PARAM_STR);
		$query->bindValue(":dinnorm", $data['din_norm'], PDO::PARAM_STR);
		$query->bindValue(":schichten", $data['layers'], PDO::PARAM_STR);
		$query->bindValue(":medizinischerstandard", $data['medical_standard'], PDO::PARAM_STR);
		$query->bindValue(":mengenverpackung", $data['quantity_packaging'], PDO::PARAM_STR);
		$query->bindValue(":mengenbox", $data['quantity_box'], PDO::PARAM_STR);
		$query->bindValue(":mengenkarton", $data['quantity_carton'], PDO::PARAM_STR);
		$query->bindValue(":projektnummer", $data['project_number'], PDO::PARAM_STR);
		$query->bindValue(":stocksingleverpackung", $data['stock_single_packaging'], PDO::PARAM_STR);
		$query->bindValue(":stockboxen", $data['stock_boxes'], PDO::PARAM_STR);
		$query->bindValue(":stockkarton", $data['stock_carton'], PDO::PARAM_INT);
		$query->bindValue(":kartonmessungen", $data['carton_dimensions'], PDO::PARAM_STR);
		$query->bindValue(":prosingleverpackung", $data['per_single_packaging'], PDO::PARAM_STR);
		$query->bindValue(":totalmengen", $data['total_quantity'], PDO::PARAM_STR);
		$query->bindValue(":dauer", $data['duration'], PDO::PARAM_STR);
		$query->bindValue(":eigenschaft", $data['properties'], PDO::PARAM_STR);
		$query->bindValue(":besonderheiten", $data['particularities'], PDO::PARAM_STR);
		$query->bindValue(":anzahlpaletten", $data['count_palettes'], PDO::PARAM_INT);
		$query->bindValue(":produktionsdatum", $data['production_date'], PDO::PARAM_STR);
		$query->bindValue(":ankommdatum", $data['arrival_date'], PDO::PARAM_STR);
		$query->bindValue(":speicherdaten", $data['storage_date'], PDO::PARAM_STR);
		$query->bindValue(":laenge", $data['length'], PDO::PARAM_STR);
		
		$query->bindValue(":mengejekarton", $data['quantity_per_carton'], PDO::PARAM_INT);
		$query->bindValue(":mengejebox", $data['quantity_per_box'], PDO::PARAM_INT);
		$query->bindValue(":mid", $data['material_id'], PDO::PARAM_STR);
		$query->bindValue(":anwendungdauer", $data['usagee'], PDO::PARAM_STR);
		$query->bindValue(":speicherort", $data['storage_location_id'], PDO::PARAM_STR);
		$query->bindValue(":kategoryid", $sid, PDO::PARAM_INT);
		$query->execute();
	}

//deleteInventory damit kann man die gegebne Elemente Löschen
	public static function deleteInventory($db, $id){
		$query = $db->query("delete
		
		FROM inventory
		WHERE category_id=$id
		;");
		$query->execute();
		
		return $id;
	}
}

	?>
	
	
