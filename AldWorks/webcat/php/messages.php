<?php


// LOGIN MESSAGE //
if(isset($_SESSION['user_name'])){

	$user_message = '<div class="message alert alert-success">שלום '.$_SESSION['user_name'].' המערכת לשרותך</div>';
	

}else{

	$user_message ='';

}

// CARS MESSAGES //

//add car message
if(isset($_SESSION['add_car'])){

	$add_car_message = '<div class="message alert alert-success">'.$_SESSION['add_car'].'</div>';
	unset($_SESSION['add_car']);

}else{

	$add_car_message ='';

}

//error add car message
if(isset($_SESSION['error_add_car'])){

	$error_add_car_message = '<div class="message alert alert-success">'.$_SESSION['error_add_car'].'</div>';
	unset($_SESSION['error_add_car']);

}else{

	$error_add_car_message ='';

}

//delete car message
if(isset($_SESSION['del_car'])){

	$del_car_message = '<div class="message alert alert-success">'.$_SESSION['del_car'].'</div>';
	unset($_SESSION['del_car']);

}else{

	$del_car_message ='';

}

//error delete car message
if(isset($_SESSION['error_del_car'])){

	$error_del_car_message = '<div class="message alert alert-success">'.$_SESSION['error_del_car'].'</div>';
	unset($_SESSION['error_del_car']);

}else{

	$error_del_car_message ='';

}


//וupdate car message
if(isset($_SESSION['car_update'])){

	$update_car_message = '<div class="message alert alert-success">'.$_SESSION['car_update'].'</div>';
	unset($_SESSION['car_update']);

}else{

	$update_car_message ='';

}

//error update car message
if(isset($_SESSION['error_car_update'])){

	$error_update_car_message = '<div class="message alert alert-success">'.$_SESSION['error_car_update'].'</div>';
	unset($_SESSION['error_car_update']);

}else{

	$error_update_car_message ='';

}



// PAGES MESSAGES //

//ERROR fast edit pages message
if(isset($_SESSION['error_fe_child'])){
	$error_fe_pages_message = '<div class="message alert alert-danger">'.$_SESSION['error_fe_child'].'</div>';
	unset($_SESSION['error_fe_child']);
}
else{

	$error_fe_pages_message='';

}


//fast edit pages message
if(isset($_SESSION['fe_update'])){
	$fedit_page_message = '<div class="message alert alert-success">'.$_SESSION['fe_update'].'</div>';
	unset($_SESSION['fe_update']);
}
else{

	$fedit_page_message='';

}




//ERROR change parent message
if(isset($_SESSION['error_children_'])){
	$error_children_message = '<div class="message alert alert-danger">'.$_SESSION['error_children_'].'</div>';
	unset($_SESSION['error_children_']);
}
else{

	$error_children_message='';

}




//edit page message
if(isset($_SESSION['edit_page'])){
	$edit_page_message = '<div class="message alert alert-success">'.$_SESSION['edit_page'].'</div>';
	unset($_SESSION['edit_page']);
}
else{

	$edit_page_message='';

}

//ERROR UPDATE  page message
if(isset($_SESSION['error_edit_page'])){
	$error_update_page_message = '<div class="message alert alert-danger">'.$_SESSION['error_edit_page'].'</div>';
	unset($_SESSION['error_edit_page']);
}
else{

	$error_update_page_message ='';

}


//delete page message
if(isset($_SESSION['del_page'])){

	$del_page_message = '<div class="message alert alert-success">'.$_SESSION['del_page'].'</div>';
	unset($_SESSION['del_page']);
}

else{

	$del_page_message ='';
}

//error deleting page message
if(isset($_SESSION['del_page_error'])){
	$error_del_page_message = '<div class="message alert alert-danger">'.$_SESSION['del_page_error'].'</div>';
	unset($_SESSION['del_page_error']);
}
else{

	$error_del_page_message='';

}


// ERROR ADD page message
if(isset($_SESSION['add_error'])){
	$error_add_page_message = '<div class="message alert alert-danger">'.$_SESSION['add_error'].'</div>';
	unset($_SESSION['add_error']);
}
else{

	$error_add_page_message='';

}

//ADD page message
if(isset($_SESSION['add_page'])){
	$add_page_message = '<div class="message alert alert-success">'.$_SESSION['add_page'].'</div>';
	unset($_SESSION['add_page']);
}
else{

	$add_page_message='';

}


// IMAGES MESSAGES //

//update image message
if(isset($_SESSION['update_image'])){
	$update_image_message = '<div class="message alert alert-success">'.$_SESSION['update_image'].'</div>';
	unset($_SESSION['update_image']);
}
else{

	$update_image_message='';

}

//error update image message
if(isset($_SESSION['error_update_image'])){
	$error_update_image_message = '<div class="message alert alert-danger">'.$_SESSION['error_update_image'].'</div>';
	unset($_SESSION['error_update_image']);
}
else{

	$error_update_image_message='';

}

//error delete image message
if(isset($_SESSION['error_image_del'])){
	$error_del_image_message = '<div class="message alert alert-danger">'.$_SESSION['error_image_del'].'</div>';
	unset($_SESSION['error_image_del']);
}
else{

	$error_del_image_message='';

}

//delete image message
if(isset($_SESSION['image_del'])){
	$del_image_message = '<div class="message alert alert-success">'.$_SESSION['image_del'].'</div>';
	unset($_SESSION['image_del']);
}
else{

	$del_image_message='';

}


// update header message
if(isset($_SESSION['update_header'])){

	$update_heaqder_message = '<div class="message alert alert-success">'.$_SESSION['update_header'].'</div>';
	unset($_SESSION['update_header']);

}else{

	$update_heaqder_message ='';

}

//error update header message
if(isset($_SESSION['update_header_error'])){

	$error_update_heaqder_message = '<div class="message alert alert-danger">'.$_SESSION['update_header_error'].'</div>';
	unset($_SESSION['update_header_error']);

}else{

	$error_update_heaqder_message ='';

}
?>