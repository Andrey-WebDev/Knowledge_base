function createPrint(){
	$(".printButton").on("click", function(){
		window.print();
	})
}

$(document).ready(function() {
	$(".edit").on("click", function(){
		var $item = $(this).parents(".menu_item");
		var key = $item.data("src");
		win = window.open("/knowledge_base/saveMenu.php?KEY="+key+"ACTION=EDIT", "edit Menu", "width=900,height=500,location=no");
	});

	$(".add").on("click", function(){
		win = window.open("/knowledge_base/saveMenu.php?ACTION=ADD", "edit Menu", "width=900,height=500,location=no");
	})

	//$(".menu_item_link").on("click", function(){
		/*var src = $(this).parents(".menu_item").data("src");
		var ItemName = $(this).text();
		var file = "/knowledge_base/pages_instructions/page"+src+".php";

		$.get(file, "", function(data, textStatus, jqXHR){
			if(textStatus == "success"){
				$.fancybox.close();

				$.fancybox.open(
					'<div class="popupItemContent">\
						<h1>'+ItemName+'</h1>\
						<p>'+data+'</p>\
						<div class="printButton">Печать</div>\
					</div>\
					');

				createPrint();
			}
		});*/

		$(".fancybox").fancybox({
		    width  : 600,
		    height : 300,
		    type   :'iframe'
		});
	//})
});