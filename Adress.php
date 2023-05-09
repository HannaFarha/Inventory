

		<?php 
			class Address{

          	private $a_id;
          	private $s_id;
          	private $p_id;
          	private $r_id;
          	private $c_id;
          	private $continent;
          	private $sn_id;
			
			
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
			
			
		public function getA_id(){return $this->a_id;}
		public function getS_id(){return $this->s_id;}
		public function getP_id(){return $this->p_id;}
		public function getR_id(){return $this->r_id;}
		public function getC_id(){return $this->c_id;}
		public function getContinent(){return $this->continent;}
		public function getSn_id(){return $this->sn_id;}
			



				//address Table
			public static function insertAddress($db,$data){
		$query = $db->prepare('
		insert into "address"(`a_id`,`s_id`,`p_id`,`r_id`,`c_id`,`continent`,`sn_id`)values (
			"'.$data["a_id"].'",
			"'.$data["s_id"].'",
			"'.$data["p_id"].'",
			"'.$data["r_id"].'",
			"'.$data["c_id"].'",
			"'.$data["continent"].'",
			"'.$data["sn_id"].'",
		
			
					);');
		$query->execute();
			}	
	public static function getAdress($db, $id){
		$query = $db->query("SELECT
		a_id,
		s_id,
		p_id,
		r_id,
		c_id,
		continent,
		sn_id
		
		FROM adress
		;");
		$query->setFetchMode(PDO::FETCH_CLASS, "Address", array()); 
		$data = $query->fetchAll();
		return $data;
	}
			
			}
			?>