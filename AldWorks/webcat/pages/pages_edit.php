<?php

require_once "../php/db_connect.php";//Data Base Connect
require_once "../php/functions.php";//Functions
include "../php/messages.php";//Session Messages

if(isset($_SESSION['user_name'])){

$admin = $_SESSION['user_name'];
}else{
die('NO');
}

$pages_types = get_types();//Getting pages types
$pages_parents = get_all_options();//Getting pages parents
$pages_names = get_pages_names();//Getting pages


if (isset($_GET['pid'])) { // Get PAGE NUMBER from URL vars if it is present

    $page_id = preg_replace('#[^0-9]#i', '', $_GET['pid']); // filter everything but numbers for security(new)
 	
 	}else { // If the pid URL variable is not present force it to be value of page number 1
    
     header('location: ../index.php');
} 
	
	


	//Getting update page date
	 $date = Date('d-m-y h:m:s');
 	$datetime = strtotime($date);


if(isset($_POST['back_btn'])){

	if(isset($_SESSION['preview'])){
		unset($_SESSION['preview']);
	}

	$one_page_data = get_one_page($page_id);

	$id = $one_page_data['pages_id'];
	$name = $one_page_data['pages_name_preview'];
	$title = $one_page_data['pages_title_preview'];
	$order = $one_page_data['pages_order'];
	$type = $one_page_data['pages_type_preview'];
	$content = $one_page_data['pages_preview_content'];
	$meta_title = $one_page_data['pages_meta_title'];
	$meta_descr = $one_page_data['pages_meta_descr'];
	$meta_key = $one_page_data['pages_meta_keywords'];

}else{

	$one_page_data = get_one_page($page_id);

	$id = $one_page_data['pages_id'];
	$name = $one_page_data['pages_name'];
	$title = $one_page_data['pages_title'];
	$order = $one_page_data['pages_order'];
	$type = $one_page_data['pages_type'];
	$content = $one_page_data['pages_content'];
	$meta_title = $one_page_data['pages_meta_title'];
	$meta_descr = $one_page_data['pages_meta_descr'];
	$meta_key = $one_page_data['pages_meta_keywords'];

}

//$one_page_data = get_one_page($page_id);//Getinf one page data

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>עדכון דף</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css" media="screen"/>
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css" media="screen"/>
	<link rel="stylesheet" href="../css/glyphicons.css" media="screen"/>
	<link rel="stylesheet" href="../css/style.css" media="screen"/>
	<script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="../js/modernizr.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="../tinymce/jquery.tinymce.min.js"></script>
	<script type="text/javascript" src="../js/functions.js"></script>
	<script type="text/javascript">

		 tinymce.init({
		 	selector:'.editp_content',
		 	width: 800,
	        height:400,
	        content_css : "../tinymce/tinycss.css",
	        plugins: " image print code insertdatetime media link nonbreaking  charmap  preview fullscreen directionality advlist  lists textcolor",
		 	

		   toolbar1: " insertfile print | undo redo | styleselect | ltr rtl | bold italic hr nonbreaking | alignleft aligncenter alignright alignjustify  | bullist numlist outdent indent | charmap |    ",
	       toolbar2: "  link image media | forecolor ",
           toolbar3: " code fullscreen preview ",

       

		 	language : 'he_IL'

		 });
	</script>
	<script type="text/javascript">

	$(document).ready(function(){


		
		 when_document_ready();//loadin all functions

		 setTimeout("$('.message').slideUp(500)",5000);


	});//End doc ready function



	</script>

</head>
<body>

	<!-- Wrapper -->
	<div id="wrapper">

		
	<?php

		include '../header.php';
	?>

<!-- *************************************************************** -->

	


	<!-- Message container -->
	<div class="message_container">

		<!-- Message div -->
		<!-- <div class="message alert alert-success"> -->

			 <?php

				 echo $error_update_page_message;
				 echo $add_page_message;
				 echo $error_children_message;

			 ?>
			
		<!-- </div> --><!-- Message div ends -->


	</div><!-- Message container ends -->





		<!-- Main content -->
		<div id="main_content">
			
		<!-- Links -->
		<div class="links_container left">
			
			<div class="links_header">
				
				אפשרויות
			</div>

			<div class="links">
		

				<?php

					include '../options.php';

				?>


			</div><!-- Links  ends -->

				 <?php

				 	include '../cms_nav.php';

				 ?>

			</div><!-- Links container ends -->


	
		<!-- Content -->
		<div class="content left">

				<!-- Header of edit pages -->
				<div class="pages_edit_header">
					
					<div class="pages_edit_title left">
						
					עריכת דף
					</div>

					<div class="pages_edit_preview left">

				


				<form  id="update_page" action="pages_update.php" method="POST" name="update_page">

					
<!-- 					<form  id="update_page" action="#" method="POST" name="update_page" >
 -->	
						<input id="preview" name="submit_prev" type="submit" value="תצוגה מקדימה" class=" btn btn-preview-spin" style="margin-top:3px;"></input>
						
					</div>

<div class="clear:both;"></div>

				</div><!-- Header of edit pages ends -->
					
		
				<!--  Content of edit pages -->
				<div class="inner_content_pages_edit">


				<input id="page_id" class="editp_input" type="hidden" name="page_id"  value="<?php echo $id?>"/>
				<input id="page_date" class="editp_input" type="hidden" name="page_date"  value="<?php echo $datetime;?>"/>	
				<table class="update_pages rtl">
					
					<tr>
						<td><label for="name">שם :</label></td>
						<td>							
							<input id="current_page" page_family="" parent="<?php echo $one_page_data['pages_parrent_id'];?>" class="editp_input" type="text" name="page_name" placeholder="שם הדף" value="<?php echo $name;?>"/>
						</td>
					</tr>
					<tr>
						<td><label for="title">כותרת :</label></td>
						<td>
							<input id="page_title" class="editp_input" type="text" name="page_title" placeholder="כותרת" value="<?php echo $title?>"/>
						</td>
					</tr>
					<tr>
						<td><label for="order">סדר :</label></td>
						<td>
							<input id="page_order" class="editp_input" type="text" name="page_order"  value="<?php echo $order;?>"/>
						</td>
					</tr>
					<tr>
						<td><label for="type">סוג :</label></td>
						<td>
							<input id="page_type" class="editp_input" type="text" name="page_type"  value="<?php echo $type?>"/>
								&nbsp;&nbsp;&nbsp;&nbsp;<label for="type">בחר סוג :</label>&nbsp;
							<select name="selected_type" id="selected_type" class="editp_select">
								<option value="type"></option>

								<?php

									foreach($pages_types as $ptkey=>$ptval){
									

										echo '<option value="'.$ptval['pages_type'].'" >'.$ptval['pages_type'].'</option>';
									}

								?>									

							</select>
						</td>
					</tr>
					<tr>
						<!-- <td><label for="parrent">הורה :</label></td>
						<td>
							<input id="page_parent_id" class="editp_input" type="hidden" name="page_parent_id"  value="<?php// echo $one_page_data['pages_parrent_id'];?>"/>
						
							<input id="page_parent" class="editp_input" type="text" name="page_parent"  value="<?php// echo $one_page_data['parent_name'];?>"/> -->

							<!-- &nbsp;&nbsp;&nbsp;&nbsp;<label for="type">בחר הורה :</label>&nbsp;
								<select name="parrent" id="selected_parent" class="editp_select">
											<option  value=""></option>
											<option id="0" value="">אין הורה</option> -->

											<?php

					// 										foreach($pages_names as $ppkey=>$ppval){



					// 											$children = get_children_pages($ppval['pages_id']);//Getting pages children

					// 											echo '<option id="'.$ppval['pages_id'].'" page_family="'.$ppval['pages_id'].'" parent_id="'.$ppval['pages_parrent_id'].'" value="'.$ppval['pages_name'].'">'.$ppval['pages_name'].'</option>';


					// 										if($children != false){

																

					// 											foreach($children as $pckey=>$pcval){
																	
					// 												$second_children = get_children_pages($pcval['pages_id']);//Getting second children

					// 												echo '<option id="'.$pcval['pages_id'].'" page_family="'.$ppval['pages_id'].'" parent_id="'.$pcval['pages_parrent_id'].'"  value="'.$pcval['pages_name'].'">&nbsp;&nbsp;&nbsp;'.$pcval['pages_name'].'</option>';

					// 												if($second_children != false){
																		

					// 													foreach($second_children as $psckey=>$pscval){

					// 														$third_children = get_children_pages($pscval['pages_id']);//Getting third children

					// 														echo '<option id="'.$pscval['pages_id'].'" page_family="'.$ppval['pages_id'].'" parent_id="'.$pscval['pages_parrent_id'].'"  value="'.$pscval['pages_name'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$pscval['pages_name'].'</option>';
																									

					// 															if($third_children ){

					// 																foreach($third_children as $ptckey=>$ptcval){

					// 															//	$fourth_children = get_children_pages($ptcval['pages_id']);//Getting fourth children

					// 																echo '<option id="'.$ptcval['pages_id'].'" page_family="'.$ppval['pages_id'].'" parent_id="'.$ptcval['pages_parrent_id'].'"  value="'.$ptcval['pages_name'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$ptcval['pages_name'].'</option>';

					// 																//	if($fourth_children !=false){

					// 																//		foreach($fourth_children as $pfckey=>$pfcval){

					// 																	//		echo '<option value="parrent">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$pfcval['pages_name'].'</option>';


					// 																	//	}//End foreach that show fourth children

					// 																//	}//End condition that show fourth children
							
					// 		///////////////////////////////////////////////////////////////////////////////

					// 																}//End foreach showing third children


					// 															}//End condition show third children

					// //////////////////////////////////////////////////////////////////////////////////////													

					// 													}//End foreach second child
																		

					// 												}//End condition that show second children

					// //////////////////////////////////////////////////////////////////////////////////////



					// 											}//End foreach first child

																
					// 										}//End condition of show first children

					// //////////////////////////////////////////////////////////////////////////////////////

					// 										}//End foreach of main pages


												?>
								

					<!-- 		</select>
						</td>
					</tr> -->
					<tr>
						<td valign="top"><label for="content">תוכן הדף :</label></td>

						<td>
								
							
							<textarea  id="page_content" name="page_content" class="editp_content"><?php echo $content;?></textarea>
							          
          
						</td>
						
					</tr>
					<tr>
						<td><label for="name">כותרת לקידום :</label></td>
						<td>							
							<input  class="editp_input" type="text" name="page_meta_title" placeholder="כותרת מטא" value="<?php echo $meta_title;?>"/>
						</td>
					</tr>
					<tr>
						<td><label for="name">תאור לקידום :</label></td>
						<td>							
							<textarea type="text" class="page_meta_descr" name="page_meta_desc" placeholder="תאור דף מטא" ><?php echo $meta_descr;?></textarea>
						</td>
					</tr>
					<tr>
						<td><label for="name">מילות מפתח :</label></td>
						<td>							
							<input  class="meta_keywords" type="text" name="page_meta_keywords" placeholder="מילות מפתח" value="<?php echo $meta_key;?>"/>
						</td>
					</tr>
					<tr>						
						<td>
							<input id="update" name="submit" class="btn btn-update-spin" type="submit" value="עדכן">
						</td>
					</tr>



				</table>
					
			</form>
		

				</div><!--  Content of edit pages ends -->



		</div><!-- Main content ends -->

<div class="clear_both"></div>

		<!-- Footer -->
		<div class="footer">
		


		</div><!-- Footer ends -->


	</div><!-- Wrapper end -->

</body>
</html>