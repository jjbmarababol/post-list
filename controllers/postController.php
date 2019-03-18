<?php include '../../config/config.php' ?>
<?php include('../../library/lib_posts.php'); ?>
<?php 
	$posts = new lib_posts();
	switch ($_REQUEST['controller']) {
		case 'delete':
			echo $posts->deletePost($_REQUEST['postId']);
			break;
		case 'updateInsert':
			echo $posts->insertUpdatePost($_REQUEST);
			break;
		case 'getRow':
			echo $posts->getPostRow($_REQUEST["postId"]);
			break;
		default:break;
	}

 ?>