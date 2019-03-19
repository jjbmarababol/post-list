<?php
	include ('config/config.php');
	include('library/lib_posts.php');
	$posts = new lib_posts(); 
?>

<div class="container">
	<div class="row">
		<div class="col s12 m8 offset-m2">
			<h3 class="center">Post Form</h3>
			<p class="mute-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.</p>
			<div class="card-panel transparent frosted floating">
				<div class="col s12 ">
					<div class="row">
						<form id="postForm" method="post" action="javascript:void(0);" enctype="multipart/form-data">
							<input type="hidden" name="controller" id="controller" value="updateInsert" class="post-field">
							<input type="hidden" name="ending" id="ending" class="post-field">
							<input type="hidden" name="newId" id="newId" class="post-field">
						
							<div class="input-field col s12">
								<i class="material-icons prefix">comment</i>
								<input id="text" name="mtitle" type="text" class="validate post-field" data-length="50" required>
								<label for="text">Textbox</label>
								<span class="helper-text" data-error="Wrong!" data-success="Correct!">Max Characters: 50</span>
							</div>
							<div class="input-field col s12">
								<label class="active">Radio Buttons</label>
								<p>
									<label>
										<input name="intro" type="radio" value="Hi" checked />
										<span>Hi</span>
									</label>
								</p>
								<p>
									<label>
										<input name="intro" type="radio" value="Hello" />
										<span>Hello</span>
									</label>
								</p>
							</div>
							<div class="input-field col s12">
								<label class="active">Radio Buttons</label>
								<p>
									<label>
										<input class="field-ending" type="checkbox" data-value="World" checked />
										<span>World!</span>
									</label>
								</p>
								<p>
									<label>
										<input class="field-ending" type="checkbox" data-value="Web" />
										<span>Web!</span>
									</label>
								</p>
							</div>
							<div class="file-field input-field col s12">
								<div class="btn theme-grey-bg">
									<span>File</span>
									<input type="file" name="imageUrl" accept="image/*">
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col s12 center">
									<button type="submit" class="btn btn-large theme-grey-bg white-text waves-effect waves-light"><i class="material-icons left">save</i>Save</button>
								</div>
							</div>
						 </form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!--End postd Panel -->

		</div>
	</div>
</div>