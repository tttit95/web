$(document).ready(function(){
	setInterval(function(){
		if($("#introduce span").text() == "GOT IT"){
			$("#a1").text("MORE ABOUT ME");
		}else{
			$("#a1").text("GOT IT");
		}
	},1000);
	alert($("#a1").text());
	/*setInterval(function(){
		$("#a2").html("<a href="" id='a1'><span>MORE ABOUT ME</span></a>");
	},1000);
	return false;*/
});