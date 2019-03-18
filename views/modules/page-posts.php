<?php
	include ('config/config.php');
	include('library/lib_posts.php');
	$posts = new lib_posts(); $x = 1; 
?>

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="valign-wrapper">
				<div class="col s12 m8">
					<h3 class="valign-wrapper grey-text text-darken-3"><i class="material-icons medium left">home</i>Posts List</h3>
				</div>
				<div class="col s12 m4">
					<a href="?p=form" class="btn btn-large waves-effect waves-light  theme-grey-bg white-text right hide-on-small-only"><i class="material-icons left">add</i>Enlist New post</a>
					

				</div>
			</div>
			<div class="postd-panel transparent frosted floating">
				<div class="col s12">
					<div class="row">
						<table class="table responsive-table highlight dataTable no-footer">
							<thead>
								<tr class="hide-on-med-and-down">
									<th>No.</th>
										<th>Post Title</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($posts->showPosts() as $key => $row): ?>
											<tr id="row<?=$row['mId'] ?>">
												<td><?=$x++;?></td>
												<td>
													<p class="blue-text text-darken-4 bold"><a href="?p=post&id=<?=$row['mId'];?>" class="tooltipped"  data-position="right" data-tooltip="View Profile"><i class="material-icons left grey-text text-darken-3">email</i><?=$row['mtitle'] ?></a></p>
												</td>
												
											</tr>
									<?php endforeach;?>
								</tbody>
						</table>
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!--End postd Panel -->
		</div>
	</div>
</div>
<div class="fixed-action-btn">
  <a href="?p=form-post" class="btn btn-floating pulse btn-large waves-effect waves-light  theme-grey-bg white-text right hide-on-med-and-up show-on-small "><i class="material-icons left">add</i></a>
 </div>