<?php @ob_start(); include('config/view.php'); include('config/URI.php'); 

	$page = (isset($_REQUEST['p']) && !empty($_REQUEST['p']) ? $_REQUEST['p'] : 'dashboard');
	$styles	= [
			"vendor/materialize.min",
			"vendor/dataTables.material.min",
			"vendor/sweetalert2.min",
			"main/global",
	];  
	$scripts = [	
			"vendor/jquery.min",
			"vendor/materialize.min",
			"vendor/sweetalert2.all.min",
			"vendor/dataTables.material.min",
			"main/global",
	];
	switch ($page) {
		case 'dashboard':
			array_push($scripts,"main/posts");
			$data    = [
					'title' =>  "Post List", 
					"active" => "posts",
					'scripts'=>$scripts,
					'styles'=>$styles,
				     ];
			$content = "modules/page-posts";
		break;
		case 'post':
			array_push($scripts,"main/posts");
			$data    = [
					'title' =>  "Post", 
					"active" => "posts",
					'scripts'=>$scripts,
					'styles'=>$styles,
				     ];
			$content = "modules/page-post";
		break;
		case 'form':
			array_push($scripts,"main/posts");
			$data    = [
					'title' =>  "Form", 
					"active" => "form-post",
					'scripts'=>$scripts,
					'styles'=>$styles,
				     ];
			$content = "modules/form-posts";
		break;
		default:
			$data    = [
					'title' => "Error 404", 
					"active" => "Oopsie",
					'scripts'=>$scripts,
					'styles'=>$styles
				     ];
			$content = "modules/page-error";
		break;
	}
view::make("layouts/content");
?>