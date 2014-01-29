function when_document_ready(){

	//show options function
	 $('#main_options li ').hover(function(){

		 	if( $('#main_options li ').is(':animated')){
		 		return;
		 	}

			var this_id = $(this).attr('id')	

			console.log(this_id)

			$('ul#'+this_id+'_list').fadeIn(600);
			
		 },function(){
		 	
		 	if( $('#main_options li ').is(':animated')){
		 		return;
		 	}
		 	var this_id = $(this).attr('id')
		 	$('ul#'+this_id+'_list').fadeOut(300);


		 });//show options function ends




	//Changing status of pages
		$('.active_icon img').on('click',function(){

		var this_id = this.id;
		var new_status;
		var this_status = $(this).attr('status');
		
		if( this_status == "active") new_status = "deactive";
		else                         new_status = "active";

		$.ajax({
 
				url:'pages_active.php?rnd=' + Math.floor(Math.random()*111),
				type:'POST',
				cache:false,//clear cashe for request data fron data base ,not for cashe
				data:'page_id=' + this_id + '&page_status=' + new_status,
				dataType:'html',
				beforSend:function(){
				  	
				 },
				success:function(my_msg){

					if(this_status == 'active'){				
				     $('.active_icon img[id="'+this_id+'"]').attr({"status":"deactive"});
				     $('.active_icon img[id="'+this_id+'"]').attr({"src":"../images/no.png"});

				 	}

				 	else{
					     $('.active_icon img[id="'+ this_id +'"]').attr({"status":"active"});
					     $('.active_icon img[id="'+ this_id +'"]').attr({"src":"../images/yes.png"});

				 	}
				 },
				error: function(e){
					
					 console.log('problem with sending Data');
				 },
				complete: function(){
				   
				 },
				timeout: 3000


 
 			});// end ajax function


	})// End changin status  function





	//Function show links to pages children
	$('.page_name').mouseover(function(){

				

	var page_id = this.id;

	//console.log(page_id)
	$('.page_name a[id="'+page_id+'"]').css({"visibility":"visible"});

	});


	$('.page_name, .page_name a').mouseout(function(e){



		var page_id = this.id;
		$('.page_name a[id="'+page_id+'"]').css({"visibility":"hidden"});




	});// End Function That show links to children

	





	//Show pages children function
	$('.page_name a').click(function(e){

	e.preventDefault();

	var child_id = this.id;

	if($('div#'+child_id+'.children_page_info_container').is(':animated')){ return;}
	// alert(child_id)
	 $('div#'+child_id+'.children_page_info_container').slideToggle();

	});// End of show children function



	//Function that show fast editing page data
	$('#editing_page').on('click',function(){

	var page_data = $(this).val();

	//console.log(page_data)


	$.ajax({
 
				url:'json_getdata.php?rnd=' + Math.floor(Math.random()*111),
				type:'POST',
				cache:false,//clear cashe for request data fron data base ,not for cashe
				data:'page_id=' + page_data,
				dataType:'json',
				beforSend:function(){
				  	
				 },
				success:function(my_msg){

				$('#faste_page_id').val(my_msg.pages_id);
				$('#faste_page_name').val(my_msg.pages_name);
				$('#faste_page_title').val(my_msg.pages_title);
				$('#faste_page_order').val(my_msg.pages_order);
				$('#faste_page_parent').val(my_msg.parent_name);


				

				 },
				error: function(e){
					
					 console.log('problem with sending Data');
				 },
				complete: function(){
				   	console.log('success');
				 },
				timeout: 3000


 
 			});// end ajax function

////////////////////////////////////////////////////////////////
		


		// Function that hidding tha page and his parent
		$("#editing_page").change(function(){
			//var this_page_id = $(this).find('option:selected').attr('page_child');
			var this_parent_id = $(this).find('option:selected').attr('page_parent');
			var this_family_id = $(this).find('option:selected').attr('page_family');
			// var parent_page_id = $(this).find('option:selected').attr('page_parent');
			//console.log(this_parent_id)

			//If parent id  = 0 that mean this page is one of main pages
			if(this_parent_id == 0){
			
			    $('#faste_page_parent').attr({'parent_id':this_parent_id});
				$('#choose_parrent_page option').attr({'disabled':'disabled'});

			}else{

				
		 
			 $('#faste_page_parent').attr({'parent_id':this_parent_id});//inserting parent Id
			 $('#faste_page_parent').attr({'current_parent_id':this_parent_id});//inserting current parent id
			
			 $("#choose_parrent_page option").removeAttr("disabled")
			

			var this_page = $(this).find('option:selected').val();//Getting page id
			var parent_page = $(this).find('option:selected').attr('page_parent');//Getting parent id
			
			// $("#choose_parrent_page option#"+this_page).attr({"disabled":"disabled"})
			// $("#choose_parrent_page option#"+parent_page).attr({"disabled":"disabled"})
			$("#choose_parrent_page option[page_family="+this_family_id+"]").attr({"disabled":"disabled"})

		}

		});//End hide page and his paret function



});//End of fast edeting page content click function




// Function that choose parent and insert him to the parent field
 $('#choose_parrent_page').on('change' ,function(){

		 	var parent = $(this).find('option:selected').val();
		 	var parent_id = $(this).find('option:selected').attr('id');
		 	var current_parent_id = $('#faste_page_parent').attr('current_parent_id');
			
			// console.log(current_parent_id)
			// console.log(parent_id)	

		 	 $('#faste_page_parent').val(parent);
			 $('#faste_page_parent').attr({'parent_id':parent_id});
			

		 });//End function that choose parent and insert him to the parent field
		



	//Page search function
		$('#img_stock_search_page_btn').on('click' , function(){

			var page_nm = $('#pages_search').val();

			
			location.href = 'images_stock_list.php?pid=1&pic_id=' + page_nm;


		});//End of search page function


	//Show edit img div function
		
		$('.img_stck_edit').on('click',function(){

		$('#edit_stock_img').fadeIn(300);	

		var image_id = $(this).attr('img_id');


		$.ajax({
 
				url:'get_image_info.php?rnd=' + Math.floor(Math.random()*111),
				type:'POST',
				cache:false,//clear cashe for request data fron data base ,not for cashe
				data:'image_id=' + image_id ,
				dataType:'json',
				beforSend:function(){
				  	
				 },
				success:function(my_msg){
					$('#stock_img_id').val(my_msg.images_repository_id);
					$('#slider_checkbox').val(my_msg.images_repository_slider);
					$('#cover_checkbox').val(my_msg.images_repository_cover);
					$('#img_name_field').val(my_msg.images_repository_name);
					$('#img_title_field').val(my_msg.images_repository_title);
					$('#img_descr_field').val(my_msg.images_repository_description);
					$('#catigory_id').val(my_msg.images_catigorys_id);
					$('#car_id').val(my_msg.images_repository_car_id);
					console.log($('#slider_checkbox').val())
					// $('#slider_checkbox').attr({'id':''})
				var slider = my_msg.images_repository_slider;
				var cover = my_msg.images_repository_cover;

				
				//Condition of checkboxes of image types
				



				if(slider == "yes"){


					$('#slider_checkbox').prop("checked", true);
					
						$('#slider_checkbox').on('change',function(){

							var slider_field = $('#slider_checkbox');

							if(slider_field.val() == "yes"){

								$('#slider_checkbox').val('no');

							}else if(slider_field.val()=="no"){

								$('#slider_checkbox').val('yes');
							}


						});
					

				}else if(slider == "no"){

					$('#slider_checkbox').prop("checked", false);

					$('#slider_checkbox').on('change',function(){

							var slider_field = $('#slider_checkbox');

							if(slider_field.val() == "no"){

								$('#slider_checkbox').val('yes');

							}else if(slider_field.val()=="yes"){

								$('#slider_checkbox').val('no');
							}

						});

					
					
				}

				if(cover == "yes"){

					$('#cover_checkbox').prop("checked", true);

						$('#cover_checkbox').on('change',function(){

							var cover_field = $('#cover_checkbox');

							if(cover_field.val()=="yes"){

								$('#cover_checkbox').val('no');

							}else if(cover_field.val()=="no"){

								$('#cover_checkbox').val('yes');
							}

						});
					
				}else if(cover == "no"){

					 $('#cover_checkbox').prop("checked", false);

					 	$('#cover_checkbox').on('change',function(){

							var cover_field = $('#cover_checkbox');

							if(cover_field.val()=="no"){

								$('#cover_checkbox').val('yes');

							}else if(cover_field.val()=="yes"){

								$('#cover_checkbox').val('no');
							}

						});
					 
				}




				//Condition of option selected of image catigory

				var catigory = my_msg.images_repository_catigory_id;

				// console.log(catigory)

				$('#image_catigory option#'+catigory).prop("selected", true);


				//Condition of option select image car

				var car = my_msg.images_repository_car_id;

				$('#image_car option#'+car).prop("selected", true);	
				 
				 },
				error: function(e){
					
					 console.log('problem with sending Data');
				 },
				complete: function(){
				   
				 },
				timeout: 3000


 
 			});// end ajax function


		});// end of Show edit img div function


		// Change catigory value function to get a new catigory id
		$('#image_catigory').on('change', function(){

			var new_catigory_id = $(this).find('option:selected').attr('id');				

			$('#catigory_id').val(new_catigory_id);


		});

		// Change car value function to get a new car id
		$('#image_car').on('change',function(){

			var new_car_id =  $(this).find('option:selected').attr('id');

		$('#car_id').val(new_car_id);
			// console.log($('#car_id').val())


		});



	
	//function close edit image div
	$('.close_edit_img').on('click',function(){


		$('#edit_stock_img').fadeOut(600);

	});



	$('#slider_checkbox').on('click',function(){

		var a = $(this).val();
		console.log(a)
	})






// Function that update page data with ajax
		$('#fe_btn').on('click',function(){	

				
			var page_id = $('#editing_page').find('option:selected').attr('page_child');
			var page_name = $('#faste_page_name').val();
			var page_title = $('#faste_page_title').val();
			var page_order = $('#faste_page_order').val();
			//var page_parent = $('#faste_page_parent').attr('parent_id');

			if(!page_id){
				return;
			}

			$.ajax({
 
				url:'ajax_pages_update.php?rnd=' + Math.floor(Math.random()*111),
				type:'POST',
				cache:false,//clear cashe for request data fron data base ,not for cashe
				data:'page_id=' + page_id +
					 '&page_name=' + page_name +
				     '&page_title=' + page_title + 
				     '&page_order=' + page_order,
				     
				dataType:'html',
				beforSend:function(){
				  		$('.fe_loader').css({"visibility":"visible"});
				 },
				success:function(my_msg){
						
				


						$('.fe_loader').css({"visibility":"hidden"});

				   		$('.fe_message').fadeIn(600, function(){
							$('.fe_message').delay(3000).fadeOut(600,function(){
								window.location.reload();
							});
						});				
				 },
				error: function(e){
					
					$('.fe_message').removeClass('alert-warning');
					$('.fe_message').addClass('alert-danger');
					$('.fe_message').html('!!!יש בעיה עם שליחת נתונים')
					$('.fe_message').fadeIn(600, function(){
					$('.fe_message').delay(3000).fadeOut(600);
					//window.location.reload();
					});
				 },
				complete: function(){

				

				 },
				timeout: 5000


 
 			});// end ajax function






		})//  end of Function that update page data with ajax








	//Function that insert Parent name into parent field when choosing a new parent
		$('#selected_parent').on('change',function(){

			var parent = $(this).find('option:selected').val();
			var parent_id = $(this).find('option:selected').attr('id');
		
			$('#page_parent').val(parent);
			$('#page_parent_id').val(parent_id);

		
		});// End of function that changing parent .

		//  Function that disable to select currwnt page and his parent
		$(function(){

			var page_id = $('#page_id').val();
			var parent_id = $('#page_parent_id').val();
			var parent_family_id = $('#current_page').attr('parent');
			//console.log(parent_id);

			var page_family = $('select#selected_parent option#'+parent_family_id).attr('page_family');
			//console.log(page_family);
			//console.log(parent_id)

			//function disabling change parent option to all family tree
			$('#selected_parent').on('click',function(){
				 $('#selected_parent option[page_family='+page_family+']').attr({'disabled':'disabled'});
			});//function disabling change parent option to all family tree ends
			

			if(parent_id ==0){

				$('#selected_parent option').attr({'disabled':'disabled'});

			}else{

				$('#selected_parent option').removeAttr("disabled");
			}
			//$("#selected_parent option[page_family="+this_family_id+"]").attr({"disabled":"disabled"})
		//$('#selected_parent option#'+page_id).attr({'disabled':'disabled'});
		//	$('#selected_parent option#'+parent_id).attr({'disabled':'disabled'});

		});//End Function that disable to select currwnt page and his parent



		$('#selected_type').on('change',function(){

			var type = $(this).find('option:selected').val();

			$('#page_type').val(type);
			
		});//End of function that changin type





//Show edit img div function
		
		$('.edit_car_btn').on('click',function(){

		$('#edit_car').fadeIn(300);	

		var car_id = $(this).attr('car');

		
		$.ajax({
 
				url:'get_json_car_data.php?rnd=' + Math.floor(Math.random()*111),
				type:'POST',
				cache:false,//clear cashe for request data fron data base ,not for cashe
				data:'car_id=' + car_id ,
				dataType:'json',
				beforSend:function(){
				  	
				 },
				success:function(my_msg){

					$('#car_id').val(my_msg.cars_id);
					$('#car_name').val(my_msg.cars_name);
					$('#car_model').val(my_msg.cars_model);
					$('#car_year').val(my_msg.cars_year);
					$('#car_hand').val(my_msg.cars_hand);
					$('#car_engine').val(my_msg.cars_engine_size);
					$('#car_transmission').val(my_msg.cars_transmission);
					$('#car_kilometers').val(my_msg.cars_kilometers);
					
				 
				 },
				error: function(e){
					
					 console.log('problem with sending Data');
				 },
				complete: function(){
				   
				 },
				timeout: 3000


 
 			});// end ajax function


	

				  
				


		// Hiding edit car div
		$('.close_edit_car').on('click',function(){
			
			$('#edit_car').fadeOut(600);

		});


		});// end of Show edit img div function



	$('#add_car').click(function(){

		location.href = 'cars_add.php';

	});


	$('#refresh_btn').click(function(){

		window.location.reload();

	});


}