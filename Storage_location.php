     
	    <?php 
			class Storage_location{

				private $sl_id;
				private $location;
				
				
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
				
				

				public function getSl_id(){return $this->sl_id;}
				public function getLocation(){return $this->location;}



	 
	 
	 //storage_location Table
			public static function insertStorage_location($db,$data){
		$query = $db->prepare('
		insert into `storage_location`(`location`)values (
	
			"'.$data["location"].'"
			);');
		$query->execute($data);
		$lastid = $db->lastInsertId();
		return $lastid;
			}
			
	public static function getStorage_location($db, $id){
		$query = $db->query("SELECT	
		
		sl_id,
		location
		FROM storage_location
		
		WHERE sl_id = $id
		
		;");
		$query->setFetchMode(PDO::FETCH_CLASS, "Storage_location", array()); 
		$data = $query->fetchAll();
		return $data;
	}
	
		public static function updateStorage_location($db,$data){
				vd($data);
		$query = $db->prepare("
		UPDATE storage_location SET
		
		location=:ort_update
		WHERE sl_id=:sl_id_update
		");
		$query->bindValue(":ort_update", $data['location'], PDO::PARAM_STR);
		$query->bindValue(":sl_id_update", $data['sl_id'], PDO::PARAM_INT);
		
		$query->execute();
		
}
public static function deleteStorage_location ($db, $id){
		$query = $db->query("delete
		
		FROM storage_location
		WHERE sl_id=$id
		;");
		$query->execute();
	}
	
	
			}?>