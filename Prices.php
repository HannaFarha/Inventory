<?php 
//Kind Klasse
class Prices{
	//Variablen
	private $purchasing_per_100;
	private $purchasing_price_single;
	private $purchasing_price_box;
	private $purchasing_price_per_carton;
	private $purchasing_price_total_amount;
	private $purchasing_per_individual_package;
	private $sell_price_box_target;
	private $sell_price_total_target;
	private $margin_box_target;
	private $sell_price_single;
	private $sell_price_box;
	private $margin_sell_price_box;
	private $margin_total_sold_boxes;
	private $total_sell_price;
	private $sell_price_total_amount;
	private $margin_total_box_target;
	
	
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
	
	//Get
	public function getPurchasing_per_100(){return $this->purchasing_per_100;}
	public function getPurchasing_price_single(){return $this->purchasing_price_single;}
	public function getPurchasing_price_box(){return $this->purchasing_price_box;}
	public function getPurchasing_price_per_carton(){return $this->purchasing_price_per_carton;}
	public function getPurchasing_price_total_amount(){return $this->purchasing_price_total_amount;}
	public function getPurchasing_per_individual_package(){return $this->purchasing_per_individual_package;}
	public function getSell_price_box_target(){return $this->sell_price_box_target;}
	public function getSell_price_total_target(){return $this->sell_price_total_target;}
	public function getMargin_box_target(){return $this->margin_box_target;}
	public function getMargin_total_box_target(){return $this->margin_total_box_target;}
	public function getSell_price_single(){return $this->sell_price_single;}
	public function getSell_price_box(){return $this->sell_price_box;}
	public function getMargin_sell_price_box(){return $this->margin_sell_price_box;}
	public function getMargin_sell_price_boxes(){return $this->margin_total_sold_boxes;}
    public function getSell_price_total_amount(){return $this->sell_price_total_amount;}
	public function getTotal_sell_price(){return $this->total_sell_price;}
//	public function getP_id(){return $this->p_id;}
	//price Table
	public static function insertPrices($db,$data){
		if($data["purchasing_per_100"] == null){
			$data["purchasing_per_100"] = 0;
		}
		if($data["purchasing_price_single"] == null){
			$data["purchasing_price_single"] = 0;
		}
		if($data["purchasing_price_box"] == null){
			$data["purchasing_price_box"] = 0;
		}
		if($data["purchasing_price_per_carton"] == null){
			$data["purchasing_price_per_carton"] = 0;
		}
		if($data["purchasing_price_total_amount"] == null){
			$data["purchasing_price_total_amount"] = 0;
		}
		if($data["purchasing_per_individual_package"] == null){
			$data["purchasing_per_individual_package"] = 0;
		}
		if($data["sell_price_box_target"] == null){
			$data["sell_price_box_target"] = 0;
		}
		if($data["sell_price_total_target"] == null){
			$data["sell_price_total_target"] = 0;
		}
		if($data["margin_box_target"] == null){
			$data["margin_box_target"] = 0;
		}
		if($data["margin_total_box_target"] == null){
			$data["margin_total_box_target"] = 0;
		}
		if($data["sell_price_single"] == null){
			$data["sell_price_single"] = 0;
		}
		if($data["sell_price_box"] == null){
			$data["sell_price_box"] = 0;
		}
		if($data["margin_sell_price_box"] == null){
			$data["margin_sell_price_box"] = 0;
		}
		if($data["margin_total_sold_boxes"] == null){
			$data["margin_total_sold_boxes"] = 0;
		}
		if($data["sell_price_total_amount"] == null){
			$data["sell_price_total_amount"] = 0;
		}
		if($data["total_sell_price"] == null){
			$data["total_sell_price"] = 0;
		}
		//einfügen in Prices
		$query = $db->prepare('
		insert into `prices`
		(
			`purchasing_per_100`,
			`purchasing_price_single`,
			`purchasing_price_box`,
			`purchasing_price_per_carton`,
			`purchasing_price_total_amount`,
			`purchasing_per_individual_package`,
			`sell_price_box_target`,
			`sell_price_total_target`,
			`margin_box_target`,
			`margin_total_box_target`,
			`sell_price_single`,
			`sell_price_box`,
			`margin_sell_price_box`,
			`margin_total_sold_boxes`,
			`sell_price_total_amount`,
			`total_sell_price`
		)
		values (
			"'.$data["purchasing_per_100"].'",
			"'.$data["purchasing_price_single"].'",
			"'.$data["purchasing_price_box"].'",
			"'.$data["purchasing_price_per_carton"].'",
			"'.$data["purchasing_price_total_amount"].'",
			"'.$data["purchasing_per_individual_package"].'",
			"'.$data["sell_price_box_target"].'",
			"'.$data["sell_price_total_target"].'",
			"'.$data["margin_box_target"].'",
			"'.$data["margin_total_box_target"].'",
			"'.$data["sell_price_single"].'",
			"'.$data["sell_price_box"].'",
			"'.$data["margin_sell_price_box"].'",
			"'.$data["margin_total_sold_boxes"].'",
			"'.$data["sell_price_total_amount"].'",
			"'.$data["total_sell_price"].'"
		);');
		$query->execute($data);
		$lastid = $db->lastInsertId();
		return $lastid;
	
	}
	// eingefügte Elmente auslesen 
		public static function getPrices($db, $id){
		$query = $db->query("SELECT
		purchasing_per_100,
		purchasing_price_single,
		purchasing_price_box,
		purchasing_price_per_carton,
		purchasing_price_total_amount,
		purchasing_per_individual_package,

		sell_price_box_target,
		sell_price_total_target,
		margin_box_target,
		margin_total_box_target,
		sell_price_single,
		sell_price_box,
		margin_sell_price_box,
		margin_total_sold_boxes,
		sell_price_total_amount,
		total_sell_price
		FROM prices
		WHERE p_id=$id
		;");
		$query->setFetchMode(PDO::FETCH_CLASS, "Prices", array()); 
		$data = $query->fetchAll();
		return $data;
}
//ändern 
	public static function updatePrice($db,$data,$sid){
		
		$query = $db->prepare("
		UPDATE prices SET
		
		purchasing_per_100=:kauf_100,
		purchasing_price_single=:kauf_preis_single,
		purchasing_price_box=:kauf_preis_box,
		purchasing_price_per_carton=:kauf_preis_karton,
		purchasing_price_total_amount=:kauf_preis_menge,
		purchasing_per_individual_package=:kauf_package,
		sell_price_box_target=:verkauf_pries_box_ziel,
		sell_price_total_target=:verkauf_preis_total_ziel,
		margin_box_target=:spanne_box_ziel,
		margin_total_box_target=:spanne_total_box_zeil,
		sell_price_single=:verkauf_preis_single,
		sell_price_box=:verkauf_preis_box,
		margin_sell_price_box=:spanne_verkauf_preis_box,
		margin_total_sold_boxes=:spanne_total_verkau_boxen,
		sell_price_total_amount=:verkauf_preis_total_menge,
		total_sell_price=:total_verkauf_price
		
	WHERE `p_id`=:p_id_update
		");
		//$query->bindValue(":p_id_update", $data['p_id'], PDO::PARAM_INT);
		$query->bindValue(":kauf_100", $data['purchasing_per_100'], PDO::PARAM_INT);
		$query->bindValue(":kauf_preis_single", $data['purchasing_price_single'], PDO::PARAM_INT);
		$query->bindValue(":kauf_preis_box", $data['purchasing_price_box'], PDO::PARAM_INT);
		$query->bindValue(":kauf_preis_karton", $data['purchasing_price_per_carton'], PDO::PARAM_INT);
		$query->bindValue(":kauf_preis_menge", $data['purchasing_price_total_amount'], PDO::PARAM_INT);
		$query->bindValue(":kauf_package", $data['purchasing_per_individual_package'], PDO::PARAM_INT);
		$query->bindValue(":verkauf_pries_box_ziel", $data['sell_price_box_target'], PDO::PARAM_INT);
		$query->bindValue(":verkauf_preis_total_ziel", $data['sell_price_total_target'], PDO::PARAM_INT);
		$query->bindValue(":spanne_box_ziel", $data['margin_box_target'], PDO::PARAM_INT);
		$query->bindValue(":spanne_total_box_zeil", $data['margin_total_box_target'], PDO::PARAM_INT);
		$query->bindValue(":verkauf_preis_single", $data['sell_price_single'], PDO::PARAM_INT);
		$query->bindValue(":verkauf_preis_box", $data['sell_price_box'], PDO::PARAM_INT);
		$query->bindValue(":spanne_verkauf_preis_box", $data['margin_sell_price_box'], PDO::PARAM_INT);
		$query->bindValue(":spanne_total_verkau_boxen", $data['margin_total_sold_boxes'], PDO::PARAM_INT);
		$query->bindValue(":verkauf_preis_total_menge", $data['sell_price_total_amount'], PDO::PARAM_INT);
		$query->bindValue(":total_verkauf_price", $data['total_sell_price'], PDO::PARAM_INT);
		$query->bindValue(":p_id_update", $sid, PDO::PARAM_INT);
		$query->execute();
	}
	//löschen
public static function deletePrices ($db,$id){
		$query = $db->query("delete
		
		FROM prices
		WHERE p_id=$id
		;");
		$query->execute();
		
		
	}
}
?>