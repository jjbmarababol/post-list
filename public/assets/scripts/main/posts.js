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
		// var rawData = $(formData).serializeArray();
		// var output = [];
		// rawData.forEach(function(item) {
		// 	var existing = output.filter(function(v, i) {
		// 		return v.name == item.name;
		// 	});
		// 	if (existing.length) {
		// 		var existingIndex = output.indexOf(existing[0]);
		// 		output[existingIndex].value = output[existingIndex].value.concat(item.value);
		// 	} else {
		// 		if (typeof item.value == 'string')
		// 		item.value = [item.value];
		// 		output.push(item);
		// 	}
		// });
		$.post(base_url + url, $(formData).serialize(), function(data){
			if(data.response == "Success") {
				M.toast({html: "Success! Nice one.",classes: "green white-text"});
				Posts.resetForm();
			}else{
				M.toast({html: "Failed! Plate Number Already Exists.",classes: "red llighten-1 white-text"});
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