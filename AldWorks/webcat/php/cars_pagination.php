<?php

if (isset($_GET['cars'])) { //Setting images pages URL 
    $pn = preg_replace('#[^0-9]#i', '', $_GET['cars']); // filter everything but numbers for security(new) 
 	} 
 else { // If the pid URL variable is not present force it to be value of page number 1
     $pn = 1;
 } 


// TODO INSERT PAGINATION IN TO FUNCTION


////////////// QUERY THE PAGES WITH IMAGES  LIKE YOU NORMALLY WOULD

 $query = " SELECT  c.* , i.images_repository_src
			FROM  cars as c LEFT JOIN images_repository as i
            ON c.cars_id = i.images_repository_car_id
            AND i.images_repository_cover = 'yes'
			ORDER BY c.cars_id DESC" ;
			
						

 mysql_query(' SET NAMES "utf8" ');

 $result = mysql_query($query);

 // if(!$result) 	return false;

 $nr = mysql_num_rows($result);//Getting total number rows from data base 

 //Setting how many items show per page
 $items_per_page = 15;

 //Get the value of the last page in the pagination
 $last_page = ceil($nr / $items_per_page);

 //Be sure URL variable $pn(Page number) no lower than page 1 and no higher than #last_page
 if($pn < 1){//if page number less than 1
 	$pn = 1;
 }
 else if($pn > $last_page){//if page number higher than last page,he becomes last page
 	$pn = $last_page;
 }


 //Creating numbers  to click between the next and back buttons
 $center_pages = "";
 $sub1 = $pn - 1;
 $sub2 = $pn - 2;
 $add1 = $pn + 1;
 $add2 = $pn + 2;

 if($pn == 1){
 	$center_pages.='<li class="active"><a>' . $pn . '</a></li>';
 	$center_pages.='<li><a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&cars=' . $add1 . '">'.$add1.'</a></li> ';
 }

 else if($pn == $last_page){
 	$center_pages .= '<li><a href="'.$_SERVER['PHP_SELF'] . '?pid='.$page_id.'&cars='. $sub1 . '">'.$sub1.'</a></li>';
 	$center_pages .= '<li class="active"><a>' . $pn . '</a></li>';
 }
 else if($pn > 2 && $pn < ($last_page -1)){
 	$center_pages .= '<li> <a href="' . $_SERVER['PHP_SELF'] .'?pid='.$page_id.'&cars=' . $sub2 . '">' . $sub2 . '</a></li>';
 	$center_pages .= '<li><a href="' . $_SERVER['PHP_SELF'] .'?pid='.$page_id.'&cars=' . $sub1 . '">' . $sub1 . '</a></li>';
 	$center_pages .= '<li class="active"><a>' . $pn . '</a></li>';
	$center_pages .= '<li> <a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&cars=' . $add1 . '">' . $add1 . '</a></li>';
	$center_pages .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&cars='. $add2 . '">' . $add2 . '</a></li>';

 }
 else if($pn > 1 && $pn < $last_page){
 	$center_pages .= '<li> <a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&cars=' . $sub1 . '">' . $sub1 .'</a></li>';
 	$center_pages .= '<li class="active"><a>' . $pn . '</a></li>';
 	$center_pages .= '<li> <a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&cars=' . $add1 . '">' . $add1 . '</a></li>';
 }

 //This line sets the "LIMIT" range .......the 2 values we place to choose a range of rows from database in our query

 $limit = 'LIMIT ' .($pn - 1) * $items_per_page. ',' .$items_per_page; 

// Now we are going to run the same query as above but this time add $limit onto the end of the SQL syntax
// $query2 is what we will use to fuel our while loop statement below
 $query2 = "SELECT  c.* , i.images_repository_src
			FROM  cars as c LEFT JOIN images_repository as i
            ON c.cars_id = i.images_repository_car_id
            AND i.images_repository_cover = 'yes'
			ORDER BY c.cars_id DESC $limit";

 mysql_query(' SET NAMES "utf8" ');

 $result2 = mysql_query($query2);
	
 // if(!$result2)
 // 	return false;

if(!$result2){
	$no_cars =  'no cars';
	$pagination_display = "";
	$output_list = "";
	}

else{

$pagination_display = "";// Initialize the pagination output variable

// This code runs only if the last page variable is not equal to 1, if it is only 1 page we require no paginated links to display
if($last_page != "1"){
	    // This shows the user what page they are on, and the total number of pages
	$pagination_display .= '<span id="pages_numbers" class="label label-success"> עמוד <strong>' . $pn . '</strong> מ ' . $last_page . '</span>';

	 //If we are not on page 1 we can place the Back button
	 // if($pn != 1){
	 // 	$previous = $pn - 1;
	 // }
	 $previous = $pn - 1;
	 $pagination_display .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&cars=' . $previous . '">&laquo;</a></li> ';

	  // This shows the user what page they are on, and the total number of pages
	 $pagination_display .= '<li>' . $center_pages . '</li>';
	// If we are not on the very last page we can place the Next button
 	// if($pn != $last_page){
 	// 	$next_page = $pn + 1;
 	// 	$pagination_display .= ' <li><a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&cars=' . $next_page . '">&raquo;</a></li>';
 	// }

 		$next_page = $pn + 1;
 		$pagination_display .= ' <li><a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&cars=' . $next_page . '">&raquo;</a></li>';

 }



// Build the Output Section Here
 $output_list = "";


	$no_cars ='';
	$div = '';
 while($row = mysql_fetch_array($result2,MYSQL_ASSOC)){

 	
 	$car_id = $row['cars_id'];
 	$car_name = $row['cars_name'];
 	$car_model = $row['cars_model'];
 	$image_src = $row['images_repository_src'];
 	$car_year = $row['cars_year'];


 	$image = '';
 	$year = '';


 	if(!$image_src){

 		$image = '<img width="80" height="45"  src="../../images/no_images.png" >';
 	}else{
 		$image = '<img  src="../../images_stock/server/php/files/thumbnail/'.$image_src.'" alt="">';
 	}



 	if(!$car_year){

 		$year = '';
 	}else{
 		$year = 'שנת &nbsp;'.$car_year.'&nbsp;&nbsp;&nbsp;&nbsp;';
 	}

 	
	 $output_list .= ' <tr>
					<td>
						<div class="car_thumbnail left">
						
							'.$image.'
						
						</div>

						<div  class="car_thumbnail_info left">
							<div style="color:#4169E1;font-weight:bold;" class="car_thumbnail_name right">  '.$car_name.'</div>
							<div style="color:#B92222;" class="car_thumbnail_model right"> '.$car_model.'&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div style="color:#FF4500;" class="car_thumbnail_model right"> '.$year.'</div>
								<div class="clear_both"></div>
						</div>
						<div class="car_thumbnail_options right"> 

								<button id="car_edit" car="'.$car_id.'" type="button" class="edit_car_btn btn btn-warning btn-sm img_stock_btns "><i class="glyphicon glyphicon-edit"></i>&nbsp;<a href="javascript:void(0);">ערוך</a></button>
								
							    <button id="car_del" type="button" class="btn btn-danger btn-sm img_stock_btns "><i class="glyphicon glyphicon-trash black"></i>&nbsp;<a  href="javascript:confirm_delete('.$car_id.')">מחק</a>


						</div>

						<div class="clear_both"></div>
					</td>
				</tr> ';
}

}

?>