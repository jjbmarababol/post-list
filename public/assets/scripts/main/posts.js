	//https://docs.google.com/document/d/17UJB0gm1oJU-w-7rMiW6azFUFtuokTiRRihFMHrnXJw/edit
var Posts = {
	delete : function(url, id){
		$.post(base_url + url, { postId : id, controller : "delete" }, function(data){
			if(data.response == "Success"){
				$("#row"+id).fadeOut("fast");
			}
		},"json");
	},
	updateInsert: function(url, formData,a){
		var ending = $("input[class=field-ending]:checked").map(function() {
			return $(this).data("value");
		}).get().join(" and ");
		$("#ending").val(ending+"!");

				
		$.post(base_url + url, $(formData).serialize(), function(data){
			if(data.response == "Success") {
				$("#newId").val(data.currentId['LAST_INSERT_ID()']);
				M.toast({html: data.message ,classes: "green white-text",displayLength:500,completeCallback:function(){
						if($("#imageUrl").val() != "") {
							$.ajax({
								url: base_url+"/library/upload.php",
								type: "POST",
								dataType : "json",
								data:  new FormData(a),
								contentType: false,
								cache: false,
								processData:false,
								success: function(data) {
									window.location.href='?p=dashboard';
						   		 }
							});
						} else window.location.href='?p=dashboard';
					}
				});
			}else{
				M.toast({html:  data.message ,classes: "red llighten-1 white-text"});
			}
		},"json");
	},
	resetForm: function(){
		$("#postForm").trigger("reset");
		$(".post-field").val('');
		$("#controller").val("updateInsert");
	}
}


$(document).ready(function(){
	
	$("select[required]").css({display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});
	$(document).on("submit","#postForm",function(){
		const testElement = document.getElementById("text");
		if(!testElement.classList.contains('invalid')) {
			Posts.updateInsert("/controllers/postController.php","#postForm",this);
		}else{
			M.toast({html:  "Incorrect Text Field! Please try again." ,classes: "red llighten-1 white-text"});
		}

	});
	
});