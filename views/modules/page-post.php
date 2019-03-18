<?php
	include ('config/config.php');
	include('library/lib_posts.php');
	$posts = new lib_posts(); 
	$postId = (isset($_REQUEST['id']) && !empty($_REQUEST['id']) ? $_REQUEST['id'] : null);
	$postDetails= (array) json_decode($posts->getpostRow($postId));
?>
<div class="row">
	<div class="col s12 m8 offset-m2">
		<div class="row center">
			<div class="card-panel theme-darkgrey-bg white-text">
				<h4 class="center"><?=$postDetails['text']?></h4>
			</div>
			<h5><?=$postDetails['radio']?> <?=$postDetails['checkbox']?></h5>
		</div>
	</div>
</div>
