$(document).ready(function(){

/*ЛЕВОЕ МЕНЮ */
$("#menu").on("click","a", function (event) {
        //отменяем стандартную обработку нажатия по ссылке
        event.preventDefault();
 
        //забираем идентификатор бока с атрибута href
        var id  = $(this).attr('href'),
 
        //узнаем высоту от начала страницы до блока на который ссылается якорь
            top = $(id).offset().top;
         
        //анимируем переход на расстояние - top за 1500 мс
        $('body,html').animate({scrollTop: top}, 200);

});



var anchors = [];
var currentAnchor = -1;
var isAnimating  = false;

$(function(){
    
    function updateAnchors() {
        anchors = [];
        $('.separator').each(function(i, element){
            anchors.push( $(element).offset().top );
        });
    }
    
    $('body').on('mousewheel', function(e){
        e.preventDefault();
        e.stopPropagation();
        if( isAnimating ) {
            return false;
        }
        isAnimating  = true;
        // Increase or reset current anchor
        if( e.originalEvent.wheelDelta >= 0 ) {
            currentAnchor--;
        }else{
            currentAnchor++;
        }
        if( currentAnchor > (anchors.length - 1) 
           || currentAnchor < 0 ) {
            currentAnchor = 0;
        }
        isAnimating  = true;
        $('html, body').animate({
            scrollTop: parseInt( anchors[currentAnchor] )
        }, 500, 'swing', function(){
            isAnimating  = false;
        });
    });

    updateAnchors();   
    
});
/*ЛЕВОЕ МЕНЮ */

/*ИНИЦИАЛИЗАЦИЯ ТУЛТИПОВ*/
$('[data-toggle="tooltip"]').tooltip();
/*ИНИЦИАЛИЗАЦИЯ ТУЛТИПОВ*/

//Выделение выбранного пункта меню
/*$("#menu > a").click(function(){
  $(".active").removeClass("active");//Удаляем класс у прошлого выделенного
  $(this).addClass("active");//добовляем класс
});*/


/*

$( ".schedule_tabs div p" ).hover(
  function() {
    $( this ).addClass( "hover" );
  }, function() {
    $( this ).removeClass( "hover" );
  }
);

*/

/*ХОВЕР ДЛЯ ОТДЕЛА ПРОДАЖ*/
$(".schedule_tabs div p").hover(function() {
    if ($( this ).attr("class") == "not_relevant") {
        $( this ).addClass( "not_relevant_bg" );
    }

    else if (
        $( this ).attr("class") != "not_relevant") 
    {
        $( this ).removeClass( "not_relevant_bg" );
    }
    if (
        $( this ).attr("class") == "relevant") {
        $( this ).addClass( "relevant_bg" );
    }
    else if (
        $( this ).attr("class") != "relevant") 
    {
        $( this ).removeClass( "relevant_bg" );
    }
});

/*ХОВЕР ДЛЯ ОТДЕЛА ПРОДАЖ*/

/*ДОП МЕНЮ РЕМОНТА А/М*/


$( "div.repair>div.schedule_tabs div" ).each(function(){
$(this).on("mouseenter", function(e){
        $(this).children('.repair_menu').css('width',$(this).css('width'));
    $(this).children('.repair_menu').fadeIn(10);

});
});

$( "div.repair div.schedule_tabs div" ).each(function(){
    $(this).on("mouseleave", function(e){
    $(this).find('.repair_menu').fadeOut(10);

});
});

/*ДОП МЕНЮ РЕМОНТА А/М*/

$( ".edit_block" ).on("mouseenter", function(){
    $(this).parent('.col-sm-4').addClass('edit_col');
});

$( ".edit_block" ).on("mouseleave", function(){
    $(this).parent('.col-sm-4').removeClass('edit_col');
});


});// конец скрипта