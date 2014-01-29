<?php
//Security functions
// function clean($str)
// {
//     if(get_magic_quotes_gpc())
// 	{
// 		$str = stripslashes($str);
// 	}
	
// 	$str = str_replace("'","&#39;",$str);
//     $str = str_replace('"','&quot;',$str);
//     $str = str_replace("`",'&#96;',$str);
     
	
// 	if (function_exists('mysql_real_escape_string'))
//     $str = mysql_real_escape_string($str);
//     else
//     $str = mysql_escape_string($str);
   
//     return trim($str);
// }

// function check_if_integer($int)
// {
//     $int = clean($int);
//     if(is_numeric($int)===false)
//     return false;
//     settype($int, "integer");
//     if(is_int($int) && $int>0 && $int!='')
//     return true;
//     return false;
// }

/***************************************************************************/

//Getting header data
function get_header_data(){

	$query = "SELECT *
	          FROM appearance_header
	          WHERE appearance_header_site = 'treid_in_zafon' ";

	 $result = mysql_query($query);
	
	mysql_query('SET NAMES "utf8" ');

	if(!$result)
		return false;

	if(mysql_num_rows($result)==0)
		return false;

	$row = mysql_fetch_array($result, MYSQL_ASSOC);


	return  $row;  

}

//Updating header data
function update_header($phone,$fax,$address){


	$query = "UPDATE appearance_header
 			SET 
			 appearance_header_phone = '".$phone."',
			 appearance_header_fax = '".$fax."',
			 appearance_header_address ='".$address."'
			 WHERE appearance_header_site = 'treid_in_zafon' ";

	mysql_query('SET NAMES "utf8" ');
	//die($query);
	$result = mysql_query($query);

	if(!$result)
		return false;
	else
		return true;

}



/**************************************************************************/


// GETTING PAGES NAMES
function get_pages_names_for_check(){

	$query = "SELECT *
			  FROM pages 
			  ";
	//die($query);
	$result = mysql_query($query);
	
	mysql_query('SET NAMES "utf8" ');

	if(!$result)
		return false;

	if(mysql_num_rows($result)==0)
		return false;

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){

		$pages_array[] = $row;
	}

	return  $pages_array;
}


//Deleting page without name function 
function del_page_without_name($page_id){

	$query = "DELETE FROM pages WHERE pages_name = '' AND pages_id = ".$page_id." LIMIT 1";
	//die($query);
	mysql_query('SET NAMES utf8');

	$result = mysql_query($query);

	if(!$result)
		return false;
	else
		return true;


}



// GETTING PAGES NAMES
function get_pages_names(){

	$query = "SELECT *
			  FROM pages 
			  WHERE pages_parrent_id = 0";
	//die($query);
	$result = mysql_query($query);
	
	mysql_query('SET NAMES "utf8" ');

	if(!$result)
		return false;

	if(mysql_num_rows($result)==0)
		return false;

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){

		$pages_array[] = $row;
	}

	return  $pages_array;
}

//GETTING CHILDREN
function get_children_pages($parrent_id){

	// $parrent_id = check_if_integer($parrent_id);

	$query = "SELECT *
	          FROM pages
	          WHERE pages_parrent_id =".$parrent_id;

	 $result = mysql_query($query);
	
	mysql_query('SET NAMES "utf8" ');

	if(!$result)
		return false;

	if(mysql_num_rows($result)==0)
		return false;

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){

		$pages_children[] = $row;
	}

	return  $pages_children;     
}


//Geting parents of pages
function get_parents_pages($child_id){

	// $child_id = check_if_integer($child_id);

	$query = "SELECT pages_name ,pages_id,pages_parrent_id
	          FROM pages
	          WHERE pages_id =".$child_id;

	 $result = mysql_query($query);
	
	mysql_query('SET NAMES "utf8" ');

	if(!$result)
		return false;

	if(mysql_num_rows($result)==0)
		return false;

	$row = mysql_fetch_array($result, MYSQL_ASSOC);


	return  $row;     
}


//GETTING one page data
function get_one_page($page_id){

	// $page_id = check_if_integer($page_id);

	$query = "SELECT page.* , parent.pages_name as parent_name
			  FROM pages as page LEFT JOIN pages as parent
			  ON page.pages_parrent_id = parent.pages_id
			  WHERE page.pages_id =".$page_id;

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	$row = mysql_fetch_array($result ,MYSQL_ASSOC);

	return $row;
}

//getting all of types orders and parrents
function get_all_options(){
	$query = "SELECT  options.pages_type,
					 options.pages_id,
					 options.pages_order,
					 parent.pages_name
	          FROM pages as options 
	          LEFT JOIN pages as parent
	          ON options.pages_id = parent.pages_id";

	mysql_query('SET NAMES "utf8" ');	 

	$result = mysql_query($query);
	

	if(!$result)
		return false;

	if(mysql_num_rows($result)==0)
		return false;

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){

		$pages_children[] = $row;
	}

	return  $pages_children; 
}


//Getting all types
function get_types(){
	$query = "SELECT DISTINCT pages_type FROM pages";

	mysql_query('SET NAMES "utf8" ');	          
	
	$result = mysql_query($query);


	if(!$result)
		return false;

	if(mysql_num_rows($result)==0)
		return false;

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){

		$pages_types[] = $row;
	}

	return  $pages_types; 
}

//Getting all pages and all active pages
function get_count_pages(){

	$query = "SELECT COUNT(p.pages_id) as pages_count , COUNT(a.pages_id)as active_pages  
			  FROM pages as p LEFT JOIN pages as a
              ON a.pages_status = p.pages_status
              AND p.pages_id = a.pages_id
              AND a.pages_status = 'active'  
	";

	mysql_query('SET NAMES "utf8" ');	          
	
	$result = mysql_query($query);


	if(!$result)
		return false;

	if(mysql_num_rows($result)==0)
		return false;

	$row = mysql_fetch_array($result, MYSQL_ASSOC);

		
	

	return  $row; 

}

//Function ADD NEW PAGE to main content
function add_page($date){

	$query = " INSERT INTO pages (
				pages_nice_id,
				pages_order,
				pages_type,
				pages_type_preview,
				pages_status,
				pages_name,
				pages_name_preview,
				pages_title,
				pages_title_preview,
				pages_content,
				pages_preview_content,
				pages_meta_title,
				pages_meta_descr,
				pages_meta_keywords,
				pages_create_date,
				pages_update_date
				)
				VALUES(
				'',
				'',
				'',
				'',
				'active',
				 '',
				 '',
				 '',
				 '',
				 '',
				 '',
				 '',
				 '',
				 '',
				 '".$date."',
				 ''
				 )";

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	else
		return true;
}

//Add child page 
function add_child_page($page_id,$date){

	// $page_id = check_if_integer($page_id);

	$query = " INSERT INTO pages (
				pages_nice_id,
				pages_order,
				pages_type,
				pages_type_preview,
				pages_status,
				pages_name,
				pages_name_preview,
				pages_title,
				pages_title_preview,
				pages_content,
				pages_parrent_id,
				pages_preview_content,
				pages_meta_title,
				pages_meta_descr,
				pages_meta_keywords,
				pages_create_date,
				pages_update_date
				)
				VALUES(
				'',
				'',
				'',
				'',
				'active',
				 '',
				 '',
				 '',
				 '',
				 '',
				 ' ".$page_id." ',
				 '',
				 '',
				 '',
				 '',
				 '".$date."',
				 ''
				 ) " ;

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	else
		return true;
}

//Function that deleting page
function delete_page($page_id){

	// $page_id = check_if_integer($page_id);

	$query = " DELETE FROM pages WHERE pages_id = ".$page_id." LIMIT 1";

	mysql_query('SET NAMES utf8');

	$result = mysql_query($query);

	if(!$result)
		return false;
	else
		return true;
}


//function get childrens count of new parent
function get_children_count($parent_id){

	$query = "SELECT count(pages_id) as children

				FROM pages
				WHERE pages_parrent_id =".$parent_id;

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	$row = mysql_fetch_array($result,MYSQL_ASSOC);

		return $row;

}



function check_if_child_exist($pages_parent_id,$pages_id){

	$query = "SELECT pages_name 

				FROM pages 
                                
				WHERE pages_id = '".$pages_parent_id."'
				AND pages_parrent_id =".$pages_id;
 //die($query);
	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);


	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	$row  = mysql_fetch_array($result,MYSQL_ASSOC);

		return $row;

	}



//Function that update page data
function update_pages($pages_id,$pages_name,$pages_title,$pages_order,$pages_type,$pages_content,$page_nice_url,$pages_meta_title,$pages_meta_descr,$pages_meta_keywords,$page_update_date){


	
			$query = "UPDATE pages SET 
			 pages_name = '".$pages_name."',
			 pages_name_preview = '".$pages_name."',
			 pages_nice_id = '".$page_nice_url."',
			 pages_order = '".$pages_order."',
			 pages_type = '".$pages_type."',
			 pages_type_preview = '".$pages_type."',
			 pages_title = '".$pages_title."',
			 pages_title_preview = '".$pages_title."',
			 pages_content = '".$pages_content."',
			 pages_preview_content = '".$pages_content."',
			 pages_meta_title = '".$pages_meta_title."',
			 pages_meta_descr = '".$pages_meta_descr."',
			 pages_meta_keywords = '".$pages_meta_keywords."',
			 pages_update_date ='".$page_update_date."'
			 WHERE pages_id = ".$pages_id."";

		     mysql_query('SET NAMES "utf8" ');

			 $result = mysql_query($query);

			 if(!$result)
				return false;
			 else
				return true;

		
	
			 mysql_query('SET NAMES "utf8" ');

			 $result = mysql_query($query);

			 if(!$result)
				return false;
			 else
				return true;

}



/*** PAGE  RREVIEW FUNCTION ***/


function get_preview_content(){

	

}



//function update preview fields
function update_preview($pages_id,$pages_name,$pages_title,$pages_order,$pages_type,$pages_content){


			$query = "UPDATE pages SET 
			
			 pages_name_preview = '".$pages_name."',
			 pages_title_preview = '".$pages_title."',
			 pages_order = '".$pages_order."',
			 pages_type_preview = '".$pages_type."',
			 pages_preview_content = '".$pages_content."'
			 WHERE pages_id = ".$pages_id."";
			 
			
		     mysql_query('SET NAMES "utf8" ');

			 $result = mysql_query($query);

			 if(!$result)
				return false;
			 else
				return true;

		
	
			 mysql_query('SET NAMES "utf8" ');

			 $result = mysql_query($query);

			 if(!$result)
				return false;
			 else
				return true;



}

////////////////////////////// IMAGES FUNCTIONS ///////////////////////////////////

//Function get images list
function get_images_list(){

	$query = "SELECT * FROM images_repository";

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){

			$images_array[] = $row;
	}

	return $images_array;
}

//Function that delete images
function images_del($image_id){

	// $image_id = check_if_integer($image_id);

	$query = "DELETE FROM images_repository 
			  WHERE images_repository_id = ".$image_id." LIMIT 1";

	mysql_query('SET NAMES utf8');

	$result = mysql_query($query);

	if(!$result)
		return false;
	else
		return true;
}


// Function get statistic images
function get_img_statistic(){

	$query = "SELECT count(DISTINCT i.images_repository_id) as imgs_count ,
	                 count(DISTINCT c.images_catigorys_name) as catigorys_count
			 FROM images_repository as i ,images_catigorys as c";

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	$row = mysql_fetch_array($result,MYSQL_ASSOC);

		return $row;
	
}

//Getting imgs catigorys
function get_imgs_catigorys(){

	$query = "SELECT * 
			  FROM    images_catigorys ";

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){

			$catigorys_array[] = $row;
	}

	return $catigorys_array;
}

//Getting count images of each catigory
function get_imgs_of_each_catigorys($catigory_id){

	// $catigory_id = check_if_integer($catigory_id);

	$query = "SELECT count(images_repository_id) as images
			  FROM    images_repository 
			  WHERE images_repository_catigory_id =".$catigory_id;

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	$row = mysql_fetch_array($result,MYSQL_ASSOC);

	return $row;
}


//Function get catigory names
function get_catigorys_names(){

	$query = "SELECT * FROM images_catigorys";

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){

			$catigorys_array[] = $row;
	}

	return $catigorys_array;

}

//function get cars names
function get_cars_names(){

	$query = "SELECT * FROM cars ORDER BY cars_id DESC";

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){

			$cars[] = $row;
	}

	return $cars;

}





//function Update images 
function update_images($image_name,$image_title,$image_descr,$image_catigory,$image_car,$image_slider,$image_cover,$image_id){

	$query = " UPDATE images_repository SET 

	images_repository_name = '".$image_name."',
	images_repository_title	= '".$image_title."',
	images_repository_description = '".$image_descr."',
	images_repository_catigory_id = '".$image_catigory."',
	images_repository_car_id = '".$image_car."',
	images_repository_slider = '".$image_slider."',
	images_repository_cover = '".$image_cover."'

	WHERE images_repository_id = ".$image_id."";
	//die($query);

	mysql_query('SET NAMES "utf8"');

	$result = mysql_query($query);

	if(!$result)
		return false;
	else
		return true;

}



//Function update cars
function update_cars($car_name,$car_model,$car_hand,$car_year,$car_engine,$car_transm,$car_kilometers,$car_id){

	$query = " UPDATE cars SET 

	cars_name = '".$car_name."',
	cars_model	= '".$car_model."',
	cars_hand = '".$car_hand."',
	cars_year = '".$car_year."',
	cars_engine_size = '".$car_engine."',
	cars_transmission = '".$car_transm."',
	cars_kilometers = '".$car_kilometers."'

	WHERE cars_id = ".$car_id."";
	//die($query);

	mysql_query('SET NAMES "utf8"');

	$result = mysql_query($query);

	if(!$result)
		return false;
	else
		return true;

}


//Function ADD NEW car to main content
function add_car(){

	$query = " INSERT INTO cars (
				cars_id,
				cars_name,
				cars_model,
				cars_year,
				cars_hand,
				cars_engine_size,
				cars_transmission,
				cars_kilometers
				)
				VALUES(
				'',
				'',
				'',
				 '',
				 '',
				 '',
				 '',
				 ''
				 )";

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	else
		return true;
}


//Function that deleting page
function delete_car($car_id){

	 // $car_id = check_if_integer($car_id);

	$query = " DELETE FROM cars WHERE cars_id = ".$car_id." LIMIT 1";

	mysql_query('SET NAMES utf8');

	$result = mysql_query($query);

	if(!$result)
		return false;
	else
		return true;
}

//Geting cars count for statistic
function get_car_statistic(){
	$query = "SELECT count(cars_id) as cars
			  FROM    cars ";
			  

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	$row = mysql_fetch_array($result,MYSQL_ASSOC);

	return $row;	
}

//////////////////////////////JSON & AJAX FUNCTIONS ///////////////////////////////

//Function that changin status of pages
function change_status($pages_status,$pages_id){

	// $pages_status = clean($pages_status);
	// $pages_id = check_if_integer($pages_id);


	$query = " UPDATE pages
			   SET  pages_status = '".$pages_status."'
			   WHERE pages_id = ".$pages_id;
			  // die($query);
	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	else 
		return true;

}

//Function that get data with jason to fast edit page
function get_page_data_json($page_id){

	// $page_id = check_if_integer($page_id);

	$query ="SELECT child.*,parent.pages_name as parent_name

		FROM pages as child 
		LEFT JOIN pages as parent
		ON child.pages_parrent_id = parent.pages_id
		WHERE child.pages_id = ".$page_id;

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	$row = mysql_fetch_array($result,MYSQL_ASSOC);

	return $row;

}


//Function that update Page data
function fast_page_update($page_name,$page_title,$page_order,$page_id,$page_nice_url,$datetime){


		$query = " UPDATE pages SET 
		pages_name = '".$page_name."',
		pages_name_preview = '".$page_name."',
		pages_nice_id = '".$page_nice_url."',
		pages_title = '".$page_title."',
		pages_title_preview = '".$page_title."',
		pages_order = '".$page_order."',
		pages_update_date = '".$datetime."'

		WHERE pages_id = '".$page_id."'";

		mysql_query('SET NAMES "utf8" ');
		$result = mysql_query($query);
		//die($result);
		if(!$result)
			return false;
		else
		return true;

}

//Getting 1 image data
function get_one_image_data($image_id){

	// $image_id = check_if_integer($image_id);

	$query = "SELECT i.* , c.* , cat.*

			  FROM images_repository as i LEFT JOIN cars as c 
			  ON i.images_repository_car_id = c.cars_id LEFT JOIN images_catigorys as cat
			  ON i.images_repository_catigory_id = cat.images_catigorys_id
			  WHERE i.images_repository_id =".$image_id;

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	$row = mysql_fetch_array($result,MYSQL_ASSOC);

		return $row;

}


//function get one car data
function get_car_data($car_id){

	$query = "SELECT *

			  FROM cars WHERE cars_id = ".$car_id;

	mysql_query('SET NAMES "utf8" ');

	$result = mysql_query($query);

	if(!$result)
		return false;
	if(mysql_num_rows($result)==0)
		return false;

	$row = mysql_fetch_array($result,MYSQL_ASSOC);

		return $row;

}

?>