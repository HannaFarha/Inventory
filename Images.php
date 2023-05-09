<?php 
//Kind Klasse 
class Images{
	//Private Variablen 
	private $image_name;
	private $image_name2;
	private $path;
	private $path2;
				
				
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
					

	
	public function getImage_name(){return $this->image_name;}
	public function getImage_name2(){return $this->image_name2;}
	public function getPath(){return $this->path;}
	public function getPath2(){return $this->path2;}





	//images Table
	//einfügen 
	public static function insertImages($db,$data){
		$query = $db->prepare('INSERT INTO
			`images`(
				image_name,
				image_name2,
				path,
				path2
			)
			values
			(
				"'.$data["image_name"].'",
				"'.$data["image_name2"].'",
				"'.$data["path"].'",			
				"'.$data["path2"].'"			
			);');
		$query->execute($data);
		$lastid = $db->lastInsertId();
		return $lastid;
	}
	
	//auslesen
	public static function getImages($db, $id){
		$query = $db->query("SELECT
		i_id,
		image_name,
		image_name2,
		path,
		path2
		FROM images
		WHERE i_id=$id
		;");
		$query->setFetchMode(PDO::FETCH_CLASS, "Images", array()); 
		$data = $query->fetchAll();
		return $data;
	}
	
		
	public static function updateImages($db, $data,$sid){
	
		$query = $db->prepare("
		UPDATE images SET
		image_name=:bild_name_update,
		image_name2=:bild_name2_update,
		path=:pfad_update,	
		path2=:pfad2_update	
		WHERE i_id=:i_id_update
		;");
		$query->bindValue(":bild_name_update", $data['image_name'], PDO::PARAM_STR);
		$query->bindValue(":bild_name2_update", $data['image_name2'], PDO::PARAM_STR);
		$query->bindValue(":pfad_update", $data['path'], PDO::PARAM_STR);
		$query->bindValue(":pfad2_update", $data['path2'], PDO::PARAM_STR);
		$query->bindValue(":i_id_update", $sid, PDO::PARAM_INT);
		$query->execute();
	}
	//löschen
	public static function deleteImages ($db, $id){
		$query = $db->query("delete
		
		FROM images
		WHERE i_id=$id
		;");
		$query->execute();
		
	
	}
}
?>