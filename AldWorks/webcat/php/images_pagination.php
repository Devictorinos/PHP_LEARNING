<?php

if (isset($_GET['pic_id'])) { //Setting images pages URL 
    $pn = preg_replace('#[^0-9]#i', '', $_GET['pic_id']); // filter everything but numbers for security(new) 
 	} 
 else { // If the pid URL variable is not present force it to be value of page number 1
     $pn = 1;
 } 

// TODO INSERT PAGINATION IN TO FUNCTION

////////////// QUERY THE PAGES WITH IMAGES  LIKE YOU NORMALLY WOULD

 $query = " SELECT i.*,c.images_catigorys_name as catigory_name
			FROM  images_repository as i LEFT JOIN images_catigorys as c
            ON c.images_catigorys_id = i.images_repository_catigory_id
			ORDER BY images_repository_id" ;
			
			
			

 mysql_query(' SET NAMES "utf8" ');

 $result = mysql_query($query);

 // if(!$result) 	return false;

 $nr = mysql_num_rows($result);//Getting total number rows from data base 



 //Setting how many items show per page
 $items_per_page = 11;

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
 	$center_pages.='<li><a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&pic_id=' . $add1 . '">'.$add1.'</a></li> ';
 }

 else if($pn == $last_page){
 	$center_pages .= '<li><a href="'.$_SERVER['PHP_SELF'] . '?pid='.$page_id.'&pic_id='. $sub1 . '">'.$sub1.'</a></li>';
 	$center_pages .= '<li class="active"><a>' . $pn . '</a></li>';
 }
 else if($pn > 2 && $pn < ($last_page -1)){
 	$center_pages .= '<li> <a href="' . $_SERVER['PHP_SELF'] .'?pid='.$page_id.'&pic_id=' . $sub2 . '">' . $sub2 . '</a></li>';
 	$center_pages .= '<li><a href="' . $_SERVER['PHP_SELF'] .'?pid='.$page_id.'&pic_id=' . $sub1 . '">' . $sub1 . '</a></li>';
 	$center_pages .= '<li class="active"><a>' . $pn . '</a></li>';
	$center_pages .= '<li> <a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&pic_id=' . $add1 . '">' . $add1 . '</a></li>';
	$center_pages .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&pic_id='. $add2 . '">' . $add2 . '</a></li>';

 }
 else if($pn > 1 && $pn < $last_page){
 	$center_pages .= '<li> <a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&pic_id=' . $sub1 . '">' . $sub1 .'</a></li>';
 	$center_pages .= '<li class="active"><a>' . $pn . '</a></li>';
 	$center_pages .= '<li> <a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&pic_id=' . $add1 . '">' . $add1 . '</a></li>';
 }

 //This line sets the "LIMIT" range .......the 2 values we place to choose a range of rows from database in our query

 $limit = 'LIMIT ' .($pn - 1) * $items_per_page. ',' .$items_per_page; 

// Now we are going to run the same query as above but this time add $limit onto the end of the SQL syntax
// $query2 is what we will use to fuel our while loop statement below
 $query2 = "SELECT i.*,c.images_catigorys_name as catigory_name
			FROM  images_repository as i LEFT JOIN images_catigorys as c
                        ON c.images_catigorys_id = i.images_repository_catigory_id
			ORDER BY images_repository_id DESC $limit";

 mysql_query(' SET NAMES "utf8" ');

 $result2 = mysql_query($query2);
	
 // if(!$result2)
 // 	return false;

if(!$result2){
	$no_pics =  'no pics';
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
	 $pagination_display .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&pic_id=' . $previous . '">&laquo;</a></li> ';

	  // This shows the user what page they are on, and the total number of pages
	 $pagination_display .= '<li>' . $center_pages . '</li>';
	// If we are not on the very last page we can place the Next button
 	// if($pn != $last_page){
 	// 	$next_page = $pn + 1;
 	// 	$pagination_display .= ' <li><a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&pic_id=' . $next_page . '">&raquo;</a></li>';
 	// }

 		$next_page = $pn + 1;
 		$pagination_display .= ' <li><a href="' . $_SERVER['PHP_SELF'] . '?pid='.$page_id.'&pic_id=' . $next_page . '">&raquo;</a></li>';

 }



// Build the Output Section Here
 $output_list = "";


	$no_pics ='';

 while($row = mysql_fetch_array($result2,MYSQL_ASSOC)){

 	
 	$images_id = $row['images_repository_id'];
 	$images_title = $row['images_repository_title'];
 	$images_slider = $row['images_repository_slider'];
 	$images_cover = $row['images_repository_cover'];
 	$image_src = $row['images_repository_src'];
 	$image_name = $row['images_repository_name'];
 	$image_catigory = $row['images_repository_catigory_id'];
 	$ctigory_name = $row['catigory_name'];

 	if($images_slider == "yes"){
 		$slider = '<img src="../images/slider.png" title="תמונת סליידר" alt="תמונת סליידר">';
 	}else{
 		$slider = '';
 	}
////////////////////////////////
 	if($images_cover == "yes"){
 		$cover = '<img src="../images/cover.png" title="תמונת כיסוי" alt="תמונת כיסוי">';
 	}else{
 		$cover = '';
 	}


	 $output_list .= ' <tr>
					<td>
						<div class="img_thumbnail left">
							<img id='.$images_id.' src="server/php/files/thumbnail/'.$image_src.'" alt="'.$images_title.'" title="'.$images_title.'">
						</div>

						<div class="img_thumbnail_info left rtl">
							<div class="img_thumbnail_name left"> <span style="color:#3A81BF;">שם תמונה</span> : '.$image_name.'</div>
							<div class="img_thumbnail_catigory left"><span style="color:#3A81BF;">קטגוריה :</span> '.$ctigory_name.'</div>'.$slider.'&nbsp;'.$cover .'
								<div class="clear_both">

								</div>
						</div>
						<div class="img_thumbnail_options right"> 
								
								<button id="img_stock_edit" img_id="'.$images_id.'" type="button" class=" img_stck_edit btn btn-warning btn-sm img_stock_btns "><i class="glyphicon glyphicon-edit"></i>&nbsp;<a href="javascript:void(0);">ערוך</a></button>
								
							    <button id="img_stock_del" type="button" class="btn btn-danger btn-sm img_stock_btns "><i class="glyphicon glyphicon-trash black"></i>&nbsp;<a href="javascript:img_del('.$images_id.',\''.$image_src.'\',\''.$pn.'\')">מחק</a></button>


						</div>

						<div class="clear_both"></div>
					</td>
				</tr> ';
}

}

?>