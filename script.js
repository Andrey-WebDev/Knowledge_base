function saveClick(){
	$(".saveResult").on("click", function(){
		$editedBlock = $(this).parent(".block_content");
		//var blockText = $editedBlock.html();
		
		var frameContent = $(this).parent(".block_content").find("iframe").contents().find("body").html();
		var blockCode = $(this).parent(".block_content").data("block");
		var blockID = $(this).parent(".block_content").data("id");
		
		$.ajax({
			url: '/knowledge_base/ajax_edit_blocks.php',
			type: 'POST',
			data: {
				HTML: frameContent,
				SAVE: "Y",
				BLOCK_CODE: blockCode,
				BLOCK_ID: blockID
			},
			success: function(html){
				$editedBlock.html(html);
				$editedBlock.parent(".col").find(".edit_col").show();
				//result=$.parseJSON(html);

				/* $('.layout').html (html);
				console.log(html); */
			}
		})
		
		console.log(frameContent);
		console.log(blockCode);
		
		//CODE: blockCode, 
	})
}

function editCol(){
	$(".edit_col").on("click", function(){
		
		var $editedBlock = $(this).parent(".col").find(".block_content");
		var blockText = $editedBlock.html();
		
		//console.log(blockText);
		
		/* console.log(blockCode);
		console.log(blockCode); */
		
		$.ajax({
			url: '/knowledge_base/ajax_edit_blocks.php',
			type: 'POST',
			data: {
				TEXT: blockText
			},
			success: function(html){
				$editedBlock.html(html);
				$editedBlock.parent(".col").find(".edit_col").hide();
				saveClick();
				//result=$.parseJSON(html);

				/* $('.layout').html (html);
				console.log(html); */
			}
		})
	})
}

$(document).ready(function(){
	$('.thumbs').on('click',function(){
		if(!$(this).hasClass("goHome")){
			//console.log($(this).data('id'));
			var elemID = $(this).data('id');
			var elemCODE = $(this).data('code');
			$.ajax({
				url: '/knowledge_base/ajax.php',
				type: 'POST',
				data: {
					ID: elemID, CODE: elemCODE
				},
				success: function(html){
					//console.log(html);
					//result=$.parseJSON(html);
					//$('.col1').find('.text').html(result.MEH_TSEH);
					//$('.col2').find('.text').html(result.KUZ_TSEH);
					//$('.col3').find('.text').html(result.SALES_DEPORT);
					//$('.layout').find('.brand_name') .html (result.NAME);
					$('.layout').html (html);
					editCol();
					//console.log(html);
				}
			})
		}
	})

	editCol();
	
	$('#menu').find('li').on('mouseenter',function(){
		var $submenu = $(this).find('ul');
		var pos=$(this).offset();
		var submenuitems = $submenu.find('li').length;
		if(submenuitems > 0){
			//console.log(pos.top - submenuitems * 50);
			$submenu.css("top", "-"+ submenuitems * 45+"px");
		}
	})
	
	$(".showAddNews").on("click", function(){
		$(".add_news").fadeToggle();
	})
	
	$(".saveNewsButton").on("click", function(){
		var frameContent = $(this).parent(".add_news").find("iframe").contents().find("body").html();
		var Name = $(this).parent(".add_news").find("input[name='news_name']").val();
		var iBlock = $(this).parent(".add_news").find("input[name='IBLOCK']").val();
		
		//console.log(Name);
		
		$.ajax({
			url: '/knowledge_base/addNews.php',
			type: 'POST',
			data: {
				NAME: Name, TEXT: frameContent, IBLOCK: iBlock
			},
			success: function(res){
				var data = $.parseJSON(res);
				if(data.STATUS == "OK"){
					$(".add_news").fadeToggle();
				}
				alert(data.TEXT);
			}
		})
	})
})
