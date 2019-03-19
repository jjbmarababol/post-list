<?php 
	class lib_posts extends Config {
		private $DB;
		private $table =	[
				"marababol" => "marababol"
				];
		function __construct(){
			$this->DB = $this->DB_CONNECT();
		}
		public function showPosts(){
			$data = [];
			$sql = $this->DB->query("SELECT * FROM ".$this->table['marababol']);
			while ($row = $sql->fetch(PDO::FETCH_ASSOC)) $data[] = $row; 
			return $data;
		}
		
		public function getPostRow($mId){
			$sql   = $this->DB->prepare("SELECT * FROM ".$this->table['marababol']." WHERE mId = :mId");
			$sql->execute([":mId" => $mId ]);
			return json_encode($sql->fetch(PDO::FETCH_ASSOC));
		}

		public function insertUpdatePost($data = []){
			$postData = [ 
				":intro" => $data['intro'],
				":ending" => $data['ending'],
				":mtitle" => $data['mtitle']
				 ];
					$sql  = $this->DB->prepare("INSERT INTO ".$this->table['marababol']." (intro, ending, mtitle)VALUES(:intro,:ending,:mtitle)");
					$sql->execute($postData);
					$getCurrentId = $this->DB->query("SELECT LAST_INSERT_ID()");

					$response = ["response" => "Success", "message" => "Post successfully saved!", "currentId"=>$getCurrentId->fetch(PDO::FETCH_ASSOC)];
					return json_encode($response);
		}
	}
?>