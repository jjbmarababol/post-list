<?php 
	class lib_posts extends Config {
		private $DB;
		private $table =	[
				"posts" => "posts"
				];
		function __construct(){
			$this->DB = $this->DB_CONNECT();
		}
		public function showPosts(){
			$data = [];
			$sql = $this->DB->query("SELECT * FROM ".$this->table['posts']);
			while ($row = $sql->fetch(PDO::FETCH_ASSOC)) $data[] = $row; 
			return $data;
		}
		
		public function getPostRow($postId){
			$sql   = $this->DB->prepare("SELECT * FROM ".$this->table['posts']." WHERE postId = :postId");
			$sql->execute([":postId" => $postId ]);
			return json_encode($sql->fetch(PDO::FETCH_ASSOC));
		}

		public function insertUpdatePost($data = []){
			$postData = [ 
				":textbox" => $data['textbox'],
				":radiobutton" => $data['radiobutton'],
				":imageUrl" => $data['imageUrl'],
				":checkbutton" => $data['checkbutton']
				 ];
			$sql   = $this->DB->prepare("INSERT INTO ".$this->table['posts']." (textbox, radiobutton, imageUrl, checkbutton) VALUES (:textbox, :radiobutton,  :imageUrl, :checkbutton)");
			$sql->execute($postData);
			$response = ["response" => "Success", "message" => "Post successfully saved!"];	
			return json_encode($response);
		}
	}
?>