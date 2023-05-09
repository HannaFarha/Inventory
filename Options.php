<?php 
class Options{
	private $option_name;
	private $option_value;
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
	public function getName(){return $this->option_name;}
	public function getValue(){return $this->option_value;}
	public function setName($option_name){$this->option_name = $option_name;}
	public function setValue($option_value){$this->option_value = $option_value;}
	public static function getOptionen($db){
		$query = $db->query("
		SELECT
		option_name,
		option_value
		FROM options
		;");
		$query->setFetchMode(PDO::FETCH_CLASS, "Options", array());
		$data = $query->fetchAll();
		return $data;
	}
	public static function updateOptionen($db, $daten){
		$query = $db->prepare("
		UPDATE options SET
		option_value=:valueUpdate
		WHERE option_name=:nameUpdate
		;");
		$query->bindValue(":nameUpdate", $daten['option_name'], PDO::PARAM_STR);
		$query->bindValue(":valueUpdate", $daten['option_value'], PDO::PARAM_STR);
		$query->execute();
	}
	public static function getNameValue($db, $option_value){
		$sql = "SELECT
		option_value
		FROM options
		WHERE option_name='".$option_value."';";
		$query = $db->prepare($sql);
		$query->execute();
		$data = "";
		if($query->rowCount() == 1){
			while($row = $query->fetch()){
				$data = $row['option_value'];
			}
		}
		return $data;
	}
}
?>