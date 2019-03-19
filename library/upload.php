<?php include "../config/URI.php";?>
<?php
	 $dbHost = 'localhost';
	 $dbUser = 'root';
	 $dbPass = '';						
	 $dbName = 'testdb'; 
	try {
		$conn = new PDO("mysql:host={$dbHost};dbname={$dbName};", $dbUser, $dbPass);
	}
	catch(Exception $e){
		die("Error: ". $e->getMessage());
	} 
?>
<?php
$valid_extensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
$path = '../public/uploads/';
if(isset($_FILES['imageUrl']))
{
	$img = $_FILES['imageUrl']['name'];
	$tmp = $_FILES['imageUrl']['tmp_name'];
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));  // get uploaded file's extension
	$final_image = rand(1000,1000000).$img; // can upload same image using rand function
	
	if(in_array($ext, $valid_extensions)) // check's valid format
	{					
		$path = $path.$final_image;	
		if(move_uploaded_file($tmp,$path)) // $path = $path.strtolower($final_image);	
		{	
			$sql = $conn->query("UPDATE marababol SET imageurl = '".$final_image."' WHERE  mId='".$_REQUEST['newId']."'");
			if($sql){
				$response = [ "response" => "success", "message" => "Image successfully uploaded!"];
			}
		}
	}  else {
		$response = ["response" => "invalid", "message" => "Invalid file.please try again!"];
	}
	echo json_encode($response);
}else{
		$response = ["response" => "invalid", "message" => "Way image"];
		echo json_encode($response);
}
?>