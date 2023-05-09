	
	   <?php 
			class Middleman{

				private $sur_name2;
				private $fore_name2;
				private $company;
				private $mid_id;
		//		private $mi_id;
				
				
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
					

				public function getSur_name2(){return $this->sur_name2;}
				public function getFore_name2(){return $this->fore_name2;}
				public function getCompany(){return $this->company;}
				public function getMid_id(){return $this->mid_id;}
				//public function getMi_id(){return $this->mi_id;}



	//middleman Table
			public static function insertMiddleman($db,$data){
		$query = $db->prepare('
		insert into `middleman`(`sur_name2`,`fore_name2`,`company`,`mid_id`)values (
			"'.$data["sur_name2"].'",
			"'.$data["fore_name2"].'",
			"'.$data["company"].'",
			"'.$data["mid_id"].'"
			
		
			
					);');
		$query->execute($data);
		$lastid = $db->lastInsertId();
		return $lastid;
			}
			
			public static function getMiddleman($db, $id){
		$query = $db->query("SELECT
		sur_name2,
		fore_name2,
		mid_id,
		company
		FROM middleman
		WHERE mi_id=$id;");
		$query->setFetchMode(PDO::FETCH_CLASS, "Middleman", array()); 
		$data = $query->fetchAll();
		return $data;
	}
	
	public static function updateMiddleman($db, $data,$sid){
			
		$query = $db->prepare("
		UPDATE middleman SET
		sur_name2=:nach_name,
		fore_name2=:vor_name,
		company=:unternehmen,
		mid_id=:meid_id
		
		WHERE mi_id=:mi_id_update
		;");
		
		//$query->bindValue(":mi_id_update", $data['mi_id'], PDO::PARAM_INT);
		
		$query->bindValue(":nach_name", $data['sur_name2'], PDO::PARAM_STR);
		$query->bindValue(":vor_name", $data['fore_name2'], PDO::PARAM_STR);
		$query->bindValue(":unternehmen", $data['company'], PDO::PARAM_STR);
		$query->bindValue(":meid_id", $data['mid_id'], PDO::PARAM_INT);
			$query->bindValue(":mi_id_update", $sid, PDO::PARAM_INT);
		$query->execute();
	}
		
		public static function deleteMiddleman($db, $id){
		$query = $db->query("delete
		
		FROM middleman
		WHERE mi_id=$id
			;");
		$query->execute();
		
		
		}
			}
		?>