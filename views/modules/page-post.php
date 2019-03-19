<?php
	include ('config/config.php');
	include('library/lib_posts.php');
	$posts = new lib_posts(); 
	$postId = (isset($_REQUEST['id']) && !empty($_REQUEST['id']) ? $_REQUEST['id'] : null);
	$postDetails= (array) json_decode($posts->getpostRow($postId));
?>
<div class="row">
	<div class="col s12 m8 offset-m2">
		<div class="row">
			<div class="card-panel theme-darkgrey-bg white-text">
				<div class="row">
					<div class="col s12 center">
						<h1><i class="material-icons medium title-icon">email</i>&nbsp;<?=$postDetails['mtitle']?></h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m6">
					 <img class="materialboxed responsive-img" src="<?=URI::picturePath(($postDetails['imageurl'])? $postDetails['imageurl'] : 'default.png')?>">
				</div>
				<div class="col s12 m6">
					<div class="card-panel transparent center">
						<h5><?=$postDetails['intro']?> <?=$postDetails['ending']?></h5>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

<div class="row">
	<div class="col s12 m8 offset-m2">
		<div class="row">
				<div class="col s12 m6 center-align">
					<a href="?p=form" class="btn btn-large waves-effect waves-light theme-grey-bg white-text hide-on-small-only"><i class="material-icons left">add</i>Add New Post</a>
				</div>
				<div class="col s12 m6 center-align">
					<a href="?p=dashboard" class="btn btn-large waves-effect waves-light theme-grey-bg white-text hide-on-small-only"><i class="material-icons left">arrow_left</i>Back to List</a>
				</div>
			</div>
	</div>
</div>
