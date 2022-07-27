$(function(){
  'use strict';
  // slide show 
	$('.carousel').carousel({
	  interval: 6000,
	  pause: "false"
	});

	$(".navbar-collapse").hide();
	$(".navbar-toggle").click(function(){
		$(".navbar-collapse").slideToggle();
	});
	
	//back to top button
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function(){scrollFunction()};
	function scrollFunction(){
		if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
	}
	
	$('.back-to-top').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 1000);
		return false;
	});
	
	//send message ajax
	$("form#message").submit(function(e){
		e.preventDefault();	
		var data = new FormData($(this)[0]);
			$.ajax({
				url:"message_ajax.php",
				type:"post",
				data:data,
				cache: false,
				contentType: false,
				processData: false,
				success:function(data){
					alert(data);
					$("#message")[0].reset();
				}
				
				});		
		
	});
	
	//signin ajax 
	
	$("form#signin").submit(function(e){
		e.preventDefault();		
		var data = new FormData($(this)[0]);
		$.ajax({
			url:"login-ajax.php",
			type:"post",
			data:data,
			cache: false,
			contentType: false,
			processData: false,
			success:function(data){
				$(".callback").html(data);
				$("#signin")[0].reset();
			}
		});
	});
	
	
	//logo slider for partiners(imageslider)
	$('.js-imageslider').imageslider({
		slideItems: '.my-slider-item',
		slideContainer: '.my-slider-list',
		slideDistance: 5,
		resizable: true,
		pause: true
	});
	
	//footer 
	
	    var iframe = $('.main-content iframe')[0],
        menu_links = $('.items li a'),
        selected_link,
        href;


    $(window).on('hashchange', function() {

        if(window.location.hash){
            href = window.location.hash.substring(1);
            selected_link = $('a[href$="'+href+'"]');

            // Check if the hash is valid - it should exist as one of the menu items.
            if(selected_link.length){
                iframe.contentWindow.location.replace(href + '.html');

                menu_links.removeClass('active');
                selected_link.addClass('active');
            }
        }
        else{
            iframe.contentWindow.location.replace('Footer-with-logo.html');
            menu_links.removeClass('active');
            $(menu_links[0]).addClass('active');
        }

    });


    if(window.location.hash){
        $(window).trigger('hashchange');
    }


    menu_links.on('click', function (e) {
        e.preventDefault();

        window.location.hash = $(this).attr('href');
    });


    $('#template-select').on('change', function (e) {
        e.preventDefault();

        window.location.hash = $(this).find(':selected').data('href');
    });
	
	//google map hide and show
	
	$(".map-section .heading").click(function(){
		
		if ( $(".map").css('display') == 'none' ){
			// element is hidden
			$(".map").fadeIn();
		}else{
			$(".map").fadeOut();
		}
		$(this).find(".text").toggle();

	});
	
	//navbar mobile toggle
	$(".mobile-menu").hide();
	$(".navbar-toggle").click(function(){
		$(".mobile-menu").slideToggle();
	});
	
	//navbar mobile sub-menu
	 $('.mob-dropdown').click(function(){
		 $(this).find(".mob-sub-menu").slideToggle("slow");
		 $(this).find(".arraw").toggle();
	 });
	 
	
	//side menu collapse
	
	 $('.list-group-title').click(function(){
		 $(this).parent().find(".list-group-item").slideToggle("slow");
		 $(this).find(".arraw").toggle();
	 });
	 
	 //drop down menu
	 $('.dropdown').hover(function(){$(this).find('.sub-menu').fadeIn();$(this).css({"background":"#06517a","color":"#fff"})},function(){$(this).find('.sub-menu').fadeOut();$(this).css({"background":"#0c73aa","color":"#95cfe8"})});
});



		

