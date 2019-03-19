var imagepath = "";
var skillAttrCounter = 2;
var Hero = {
	transition: function(a){
		var text = $(a).text();
		$(".heroDiv").hide();
		if(text == "Add New Hero"){
		$("#heroFormDiv").fadeIn("fast");
		$(a).text("Back");
		}else{
		$("#tbl_hero").fadeIn("fast");
		$(a).text("Add New Hero");
		}
		return false;
	},
	getList : function(url){
		$.get(base_url + url, { keyword : ""}, function(data){ 
			$("#tbl_hero").html("").append(data); },"html");
	},
	delete : function(url, id){
		$.post(base_url + url, { uid : id, controller : "delete" }, function(data){
			if(data.response == "success"){
				$("#row"+id).fadeOut("fast");
				Hero.getList('/views/admin/list-hero.php');
			}
		},"json");
	},
	updateInsert: function(url, formData,a){
			$.post(base_url + url, $(formData).serialize(), function(data){
				if(data.response == "success") {
					$("#alerting .content").text(data.message);
					$("#alerting .header").text(data.response);
					if(imagepath != $("#addImage").val() && $("#addImage").val() != "") {
					$.ajax({
							url: base_url+"/library/upload.php",
							type: "POST",
							dataType : "json",
							data:  new FormData(a),
							contentType: false,
							cache: false,
							processData:false,
							success: function(data) {
								if(data.response =='invalid') return false;
								Hero.getList('/views/admin/list-hero.php');
					   		 }
					  	 });
					}
				}else{
					$("#alerting .content").text(data.message);
					$("#alerting .header").text(data.response);
					Hero.getList('/views/admin/list-hero.php');
					Hero.resetForm();
					Hero.transition("#heroBtn");	
					return false;
				}
				Hero.getList('/views/admin/list-hero.php');
				Hero.resetForm();
				Hero.transition("#heroBtn");	
			},"json");
		},
	getHero: function(url,id,controller){
		$.get(base_url + url, { uid : id,controller : controller }, function(data){ 
			$("#heroId").val(data.heroId);
			$("#heroNameField").val(data.heroName);
			$("#heroAttrField").val(data.attrId);
			$("#heroAttkTypeField").val(data.attkTypeId);
			$("#heroDescField").val(data.herodesc);
			$("#allRoles").val(data.roles);
			$("#addHeroStrPoints").val(data.strpoints);
			$("#addHeroAgiPoints").val(data.agipoints);
			$("#addHeroIntPoints").val(data.intpoints);
			$("#addHeroBaseHealth").val(data.health);
			$("#addHeroMana").val(data.mana);
			$("#addHeroDamage").val(data.damage);
			$("#addHeroArmor").val(data.armor);
		 	imagepath = "public/upload/hero/"+data.image;
			$("#imgpreview").attr("src",imagepath).fadeIn("slow");
			$("#addHeroMovementSpeed").val(data.movementSpeed);
			$.each($("input:checkbox.addHeroRole"),function(a){ 
				if(Hero.searchWord($("#allRoles").val(),$(this).val())){
					$(this).prop("checked",true);
				}
			});
		},"json");
	},
	searchWord: function (s, word){
		return new RegExp( '\\b' + word + '\\b', 'i').test(s);
	},
	resetForm:function(){
		$("#heroForm").trigger("reset");
		$("#controller").val("updateInsert");
		$("#uploadtype").val("hero");
		$("#imgpreview").show().attr("src","public/upload/hero/default.png");
		$("#heroId").val("");
		$("#allRoles").val("");
	}
}

$(document).ready(function(){
	$(document).on("change","#addImage",function(event){
	    $("#imgpreview").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
	});
	$(document).on("submit","#heroForm",function(e){
		Hero.updateInsert("/app/admin/heroController.php","#heroForm",this);
		$("#alerting").modal('show');	

	});
	$(document).on("click","#heroBtn",function(){
		Hero.transition("#heroBtn");
		Hero.resetForm();
	});

});
$(document).on("click", ".hero", function(){
	var type= $(this).data("type");
	if(type == "edit"){
		Hero.transition("#heroBtn");
		Hero.getHero("/app/admin/heroController.php", $(this).data("id"), $(this).data("controller"));	
	}else if(type == "delete"){
		if(confirm("Delete this data?")) {
			Hero.delete("/app/admin/heroController.php", $(this).data("id"));
			return false;
		}else return false;
	}else return false;
});
    $(document).on("click",".addHeroRole",function(){
	var roles = [];
	$.each($("input:checkbox:checked.addHeroRole"),function(a){ roles.push($(this).val());});
	$("#allRoles").val(roles);
  });