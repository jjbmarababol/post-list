//https://docs.google.com/document/d/17UJB0gm1oJU-w-7rMiW6azFUFtuokTiRRihFMHrnXJw/edit
var Posts = {
	delete : function(url, id){
		$.post(base_url + url, { postId : id, controller : "delete" }, function(data){
			if(data.response == "Success"){
				$("#row"+id).fadeOut("fast");
			}
		},"json");
	},
	updateInsert: function(url, formData){
		var ending = $("input[class=field-ending]:checked").map(function() {
			return $(this).data("value");
		}).get().join(" and ");
		$("#ending").val(ending+"!");

		$.post(base_url + url, $(formData).serialize(), function(data){
			if(data.response == "Success") {
				M.toast({html: data.message ,classes: "green white-text",displayLength:500,completeCallback:function(){
					window.location.href='?p=dashboard';
				}});
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
		Posts.updateInsert("/controllers/postController.php","#postForm");
	});
	
});