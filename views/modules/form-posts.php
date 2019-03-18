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
						<form id="postForm" method="post" action="javascript:void(0);">
							<input type="hidden" name="controller" id="controller" value="updateInsert" class="post-field">
						
							<div class="input-field col s12">
								<i class="material-icons prefix">comment</i>
								<input id="text" name="textbox" type="text" class="validate post-field" data-length="50">
								<label for="text">Textbox</label>
								<span class="helper-text" data-error="Wrong!" data-success="Correct!">Max Characters: 50</span>
							</div>
							<div class="input-field col s12">
								<i class="material-icons prefix">comment</i>
								<input id="text" name="imageUrl" type="text" class="validate post-field" data-length="50">
								<label for="text">Textbox</label>
								<span class="helper-text" data-error="Wrong!" data-success="Correct!">Max Characters: 50</span>
							</div>
							<div class="input-field col s12">
								<label class="active">Radio Buttons</label>
								<p>
									<label>
										<input name="radiobutton" type="radio" value="Hi" checked />
										<span>Hi</span>
									</label>
								</p>
								<p>
									<label>
										<input name="radiobutton" type="radio" value="Hello" />
										<span>Hello</span>
									</label>
								</p>
							</div>

							<div class="input-field col s12">
								<label class="active">Radio Buttons</label>
								<p>
									<label>
										<input name="checkbutton" type="checkbox" value="World" checked />
										<span>World!</span>
									</label>
								</p>
								<p>
									<label>
										<input name="checkbutton" type="checkbox" value="Web" />
										<span>Web!</span>
									</label>
								</p>
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