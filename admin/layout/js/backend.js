$(function(){
  'use strict';

    // convert password field to text field on hover

   var field = $('#pass');
    $('.show-pass').hover(function(){
        field.attr('type','text');
    }, function(){
        field.attr('type','password');
    });
	
	//$('.main-blocks .block span').hide();
	$('.main-blocks .block').hover(function(){
		//$(this).find('span').fadeIn("slow");
		$(this).find('.fa').css("color","#1abc9c");
		$(this).css("box-shadow","0 2px 5px #333");
	},$('.main-blocks .block').hover(function(){/*$('.main-blocks .block span').hide();*/$(this).find('.fa').css("color","");$(this).css("box-shadow","none");}));

	// edit admin data using ajax
	$(".edit_user").click(function(){
		var id = $(".id").val();
		var user = $(".user").val();
		var pass = $(".pass").val();
		var full = $(".full").val();
		var email = $(".email").val();
		if(user == ''){
			alert("يجب ادخال الاسم");
			$('.user').css("border","1px solid red").focus();
			$('.pass').css("border","1px solid #ccc");
			$('.email').css("border","1px solid #ccc");
			$('.full').css("border","1px solid #ccc");
		
		}else if(pass == ''){
			alert("يجب ادخال كلمة المرور");
			$('.pass').css("border","1px solid red").focus();
			$('.user').css("border","1px solid #ccc");
			$('.email').css("border","1px solid #ccc");
			$('.full').css("border","1px solid #ccc");
		}else if(email == ''){
			alert("يجب ادخال البريد");
			$('.email').css("border","1px solid red").focus();
			$('.pass').css("border","1px solid #ccc");
			$('.user').css("border","1px solid #ccc");
			$('.full').css("border","1px solid #ccc");
		}else if(full == ''){
			
			alert("يجب ادخال الاسم");
			$('.full').css("border","1px solid red").focus();
			$('.pass').css("border","1px solid #ccc");
			$('.email').css("border","1px solid #ccc");
			$('.user').css("border","1px solid #ccc");

		}else{
			
			$.ajax({
			url:"edit_user.php",
			method:"post",
			data:{id:id, user:user, pass:pass, full:full, email:email},
			success:function(data){
				alert(data);
			}
			
			});

			
		}
		
		
		
	}); // end of editing admin data

	$("#update").click(function(){
		
		var form = $("#myform");
		$.ajax({
			url:"update_cnt_data.php",
			method:"post",
			data:form.serialize(),
			success:function(data){
				alert(data);
			}
			
			});
		
	});
	
	//show confirm message on delete center
	$('.confirm').click(function(){
		return confirm('هل تريد حزف هذا السجل ؟');
		
	});
	
	// add new center to database using ajax
	$(".add").click(function(){
		var myform = $("#new_cnt");
		
		$.ajax({
			url:"insert_center.php",
			method:"post",
			data:myform.serialize(),
			success:function(data){
				$("#new_cnt")[0].reset(); // delete form data after submit
				alert(data);
			}
		});
		
	});
	
	// add new news
	$("form#news").submit(function(e){
		e.preventDefault();
		var data = new FormData($(this)[0]);
		var title = $("#title").val();
		var news = $("#text").val();
		var img = $("#img").val();
		if(title == ''){
			alert("يجب ادخال العنوان");
			$("#title").css("border","1px solid red").focus();
		}else if(news == ''){
			alert("يجب ادخال الخبر");
			$("#title").css("border","1px solid #ccc");
		}else if(img == ''){
			alert("يجب اختيار الصوره");
		}else{
		$.ajax({
			url:"insert_news.php",
			type:"post",
			data:data,
			cache: false,
			contentType: false,
			processData: false,
			success:function(data){
				alert(data);
				$("#news")[0].reset();
			}
		});
		}
	});
	// edit news 
	$("form#update_news").submit(function(e){
		e.preventDefault();
		var data = new FormData($(this)[0]);
		$.ajax({
			url:"update_news.php",
			type:"post",
			data:data,
			cache: false,
			contentType: false,
			processData: false,
			success:function(data){
				alert(data);
			}
			
		});
	});
	// add new trainer
	$("form#new_trainer").submit(function(e){
		e.preventDefault();
		var data = new FormData($(this)[0]);
		$.ajax({
			url:"insert_trainer.php",
			type:"post",
			data:data,
			cache: false,
			contentType: false,
			processData: false,
			success:function(data){
				alert(data);
				$("#new_trainer")[0].reset();
			}
		});
	});
	//update trainer
	$("form#update_trainer").submit(function(e){
		e.preventDefault();
		var data = new FormData($(this)[0]);
		$.ajax({
			url:"update_trainer.php",
			type:"post",
			data:data,
			cache: false,
			contentType: false,
			processData: false,
			success:function(data){
				$(".callback").val() = data;
			}
			
		});
	});
	
	// add new user
	$("form#add_user").submit(function(e){
		e.preventDefault();
		var data = new FormData($(this)[0]);
		$.ajax({
			url:"insert_user.php",
			type:"post",
			data:data,
			cache: false,
			contentType: false,
			processData: false,
			success:function(data){
				alert(data);
				$("#add_user")[0].reset();
			}
		});
	});
	//add message to database with ajx
	$("form#message").submit(function(e){
		e.preventDefault();
		alert("good");
	})
});



		
