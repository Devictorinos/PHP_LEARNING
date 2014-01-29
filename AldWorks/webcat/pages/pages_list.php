<?php

require_once "../php/db_connect.php";//Data Base Connect
require_once "../php/functions.php";//Functions
include "../php/messages.php";//Session Messages

if(isset($_SESSION['user_name'])){

$admin = $_SESSION['user_name'];
}else{
die('NO');
}


if (isset($_GET['pid'])) { // Get PAGE NUMBER from URL vars if it is present
    $page_id = preg_replace('#[^0-9]#i', '', $_GET['pid']); // filter everything but numbers for security(new)
 	}
  else { // If the pid URL variable is not present force it to be value of page number 1
     $page_id = 1;
 } 

// Call of functions
$pages_names = get_pages_names();//Getting pages
$pages_counts = get_count_pages();//Getting  count of pages and active status
$pages_for_check = get_pages_names_for_check();//getting pages names for check if empty name

// foreach($pages_for_check as $pagke => $pagval){

//  				if($pagval['pages_name'] == ''){

//  					if(isset($_SESSION['last_id'])){
 						
// 				 	$last_page = $_SESSION['last_id'];

// 				 	del_page_without_name($last_page);


// 				 //	$page = $_SERVER['PHP_SELF'];
// 				//	$sec = "0.0";
// 					//header("Refresh: $sec; url = $page");
// 				 	unset($_SESSION['last_id']);
// 				 	header("Cache-Control: no-cache");
// 				 }

// 				 	}
// }


if(isset($_SESSION['preview'])){
	unset($_SESSION['preview']);
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>רשימת דפים</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css" media="screen"/>
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css" media="screen"/>
	<link rel="stylesheet" href="../css/glyphicons.css" media="screen"/>
	<link rel="stylesheet" href="../css/style.css" media="screen"/>
	<script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="../js/modernizr.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="../js/functions.js"></script>
	<script type="text/javascript">
		



	$(document).ready(function(){

		when_document_ready();//load page functions

		setTimeout("$('.message').slideUp(500)",5000);



	});//End doc ready function


	function confirm_delete(page_id){

		var answer = confirm('למחוק את הדף סופית???');
		if(answer){

			location.href="pages_delete.php?pid="+ page_id;
		}else{
			
		}		

	}


	
		

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

			
			 <?php 

				 echo $error_add_page_message;
				 echo $error_del_page_message;
				 echo $edit_page_message;
				 echo $del_page_message;
				 echo $error_children_message;
				 echo $error_fe_pages_message;
				 echo $fedit_page_message;

			 ?>
			

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
					<!-- Content header container -->
			<div class="content_header_container ">
				
			
			<!-- Div header pages list -->
			<div class="header_pages_list left">
				
				<div class="total_pages  left">

					<div class="total badge">
						
						<?php echo 'דפים '.$pages_counts['pages_count'];?>


					</div>
					<div class="total badge">
						
						<?php echo 'פעילים '.$pages_counts['active_pages'];?>
					

					</div>
					
	
				</div>
				<div class="pages_list_title left">
					
						רשימת דפים

					<button type="button" class="btn btn-primary btn-sm left add_new_page right">
						<a href="pages_add.php">הוסף דף</a>
					</button>

				</div>

			</div><!-- Div header pages list ends -->


			<!-- Div header pages options -->
			<div class="header_pages_options left">
				
				אפשרויות דפים

			</div><!-- Div header pages options ends -->


<div class="clear_both"></div>


			</div><!-- Content header container ends -->
			

			<!-- Pages list content -->
			<div class="inner_pages_list_content left">
				
	
<?php

			foreach($pages_names as $pkey=>$pval){

				if($pval['pages_update_date'] == false){

					$update_date = '';

				}else{

				$update_date_from_db = $pval['pages_update_date'];
 				$update_date = date('y/m/d', $update_date_from_db);
 				}

 				$create_date_from_db = $pval['pages_create_date'];
 				if($create_date_from_db == 0){
 					$create_date = '';
 				}else{
 				$create_date = date('y/m/d', $create_date_from_db);
 				}
 				//print_r($datetimeStr);
				$children = get_children_pages($pval['pages_id']);//Getting pages children

				echo '<div class="page_info_container">';

				//Div with icon
				echo '<div class="active_icon left">';

						if($pval['pages_status'] == "active"){

				       echo'  <img id="'.$pval['pages_id'].'" status="active" src="../images/yes.png" alt="">';
				     
				     }
				     else
				     {
				       echo'<img id="'.$pval['pages_id'].'" status="deactive" src="../images/no.png" alt="">';
				     }    
				      echo '</div>';

				//Div with page name
				echo '<div class="page_name left" id="'.$pval['pages_id'].'">';
				echo '<span class="glyphicons bookmark pg_name">'.$pval['pages_name'].'</span>';

				//Link to show children

				// if($children != false){				
				// echo '<a href="#" class="links_to_children" id="'.$pval['pages_id'].'" >תת דפים</a>';
				// }

				echo '</div>';

				echo '<div class="page_date left">';
				echo '<span class="date_titles">פורסם : </span> '.$create_date.' <br />';
				echo '<span class="date_titles">עודכן : </span> '.$update_date.'';
				echo '</div>';



				//Page options
				echo '<div class="page_edit_options left">

								
						<span class="edit_page_options">

							<!--<a href="pages_child_add.php?pid='.$pval['pages_id'].'">הוסף תת דף</a>--> 
							<a href="pages_edit.php?pid='.$pval['pages_id'].'"> ערוך</a> |
							<a href="../../index.php?pid='.$pval['pages_id'].'" target="blank">לצפות</a> ';

							?>
							<?php

							// Condition that show delete link if page is not a home page or dont have a children /
							if($pval['pages_id'] == 1 || $children == true){

							}
							else{
						echo '| <a  href="javascript:confirm_delete('.$pval['pages_id'].')">מחק</a>';
					}
						echo '</span>';

					echo ' </div>';

				echo '<div class="clear_both"></div>';
						
					

					if($children != false){
							//First children div 
						foreach($children as $ckey=>$cval){


							if($pval['pages_name'] == ''){

						 	$last_page = $_SESSION['last_id'];
		 				 	del_page_without_name($last_page);
						 	$page = $_SERVER['PHP_SELF'];
							$sec = "0.0";
							header("Refresh: $sec; url = $page");
						 	unset($_SESSION['last_id']);

						 	}



							if($cval['pages_update_date'] == false){

								$update_date = '';

							}else{

							$update_date_from_db = $cval['pages_update_date'];
			 				$update_date = date('y/m/d', $update_date_from_db);
			 				}

			 				$create_date_from_db = $cval['pages_create_date'];

			 				if($create_date_from_db == false){

			 					$create_date = '';
			 				}else{

			 				$create_date = date('y/m/d', $create_date_from_db);
			 				}

							$second_children = get_children_pages($cval['pages_id']);//Getting second children


								echo '<div class="children_page_info_container" id="'.$pval['pages_id'].'">';
								
								//Div with icon
								echo '<div style="padding-left:10px;" class="active_icon left">';

											if($cval['pages_status'] == "active"){

											       echo'  <img width="38" id="'.$cval['pages_id'].'" status="active" src="../images/yes.png" alt="">';
											     
											     }
											     else
											     {
											       echo'<img width="38" id="'.$cval['pages_id'].'" status="deactive" src="../images/no.png" alt="">';
											     } 									 

									  echo '</div>';

								//Div with page name
								echo '<div class="page_name left" id="'.$cval['pages_id'].'"> ';
								echo '<span class="glyphicons file pg_name">-'.$cval['pages_name'].'</span>';

								//Link to show children	
								if($second_children != false){
									echo '<a href="#" class="links_to_children" id="'.$cval['pages_id'].'" >תת דפים</a>';
								}
								echo '</div>';


								echo '<div class="page_date left">';
								echo '<span class="date_titles">פורסם : </span> '.$create_date.' <br />';
								echo '<span class="date_titles">עודכן : </span> '.$update_date.'';
								echo '</div>';


								//Page options
								echo '<div class="page_edit_options left">
												
												<span class="edit_page_options">
													<a href="pages_child_add.php?pid='.$cval['pages_id'].'">הוסף תת דף</a> | 
													<a href="pages_edit.php?pid='.$cval['pages_id'].'"> ערוך</a> |
													<a href="#">לצפות</a>  ';

													?>
													<?php

														// Condition that show delete link if page is not have children //
														if($second_children){

														}
														else{

													echo ' | <a  href="javascript:confirm_delete('.$cval['pages_id'].')">מחק</a>';
												}

										echo '</span>';				


								echo '</div>';

								echo '<div class="clear_both"></div>';


								if($second_children != false){

									foreach($second_children as $sckey=>$scval){

									if($scval['pages_update_date'] == false){

										$update_date = '';

									}else{

									$update_date_from_db = $scval['pages_update_date'];
					 				$update_date = date('y/m/d', $update_date_from_db);
					 				}

						 				$create_date_from_db = $scval['pages_create_date'];
						 				if($create_date_from_db == false){
						 					$create_date = '';
						 				}else{
						 				$create_date = date('y/m/d', $create_date_from_db);
						 				}

										$third_children = get_children_pages($scval['pages_id']);//Getting third children


											echo'<div class=" children_page_info_container" id="'.$cval['pages_id'].'">';
																					
											//Div with icon	
											echo '<div style="padding-left:15px;" class="active_icon left">';

												if($scval['pages_status'] == "active"){

											       echo'  <img width="35"id="'.$scval['pages_id'].'" status="active" src="../images/yes.png" alt="">';
											     
											     }
											     else
											     {
											       echo'<img width="35" id="'.$scval['pages_id'].'" status="deactive" src="../images/no.png" alt="">';
											     } 		

											echo '</div>';

											//Div with page name		
											echo '<div class="page_name left" id="'.$scval['pages_id'].'"> ';
											echo '<span class="glyphicons more_items pg_name">--'.$scval['pages_name'].'</span>';

											//Link to show children
											if($third_children != false){
												echo '<a href="#" class="links_to_children" id="'.$scval['pages_id'].'">תת דפים</a>';
											}
											echo '</div>';


											echo '<div class="page_date left">';
											echo '<span class="date_titles">פורסם : </span>'.$create_date.' <br />';
											echo '<span class="date_titles">עודכן : </span>'.$update_date.'';
											echo '</div>';


											//Page options	
											echo '<div class="page_edit_options left">
														
														<span class="edit_page_options">
															<a href="pages_child_add.php?pid='.$scval['pages_id'].'">הוסף תת דף</a> | 
															<a href="pages_edit.php?pid='.$scval['pages_id'].'"> ערוך</a> |
															<a href="#">לצפות</a> ';

														// Condition that show delete link if page is not have children //
														if($third_children){

														}
														else{

														echo '| <a  href="javascript:confirm_delete('.$scval['pages_id'].')">מחק</a>';
														}
														
														echo '</span>';			


											echo '</div>';
								

											echo '<div class="clear_both"></div>';



										if($third_children != false){

											foreach ($third_children as $tckey => $tcval) {

											if($tcval['pages_update_date'] == false){

											$update_date = '';

											}else{

											$update_date_from_db = $tcval['pages_update_date'];
							 				$update_date = date('y/m/d', $update_date_from_db);
							 				}

								 				$create_date_from_db = $tcval['pages_create_date'];
								 				if($create_date_from_db == false){
								 					$create_date = '';
								 				}else{
								 				$create_date = date('y/m/d', $create_date_from_db);
								 				}


												$fourth_children = get_children_pages($tcval['pages_id']);//Getting fourth children

												echo '<div class="children_page_info_container" id="'.$scval['pages_id'].'">';
													
												//Div with icon																	
												echo '<div style="padding-left:20px;" class="active_icon left">';
													if($tcval['pages_status'] == "active"){

												       echo'  <img width="33" id="'.$tcval['pages_id'].'" status="active" src="../images/yes.png" alt="">';
												     
												     }
												     else
												     {
												       echo'<img width="33" id="'.$tcval['pages_id'].'" status="deactive" src="../images/no.png" alt="">';
												     } 													

											     echo '</div>';

												//Div with page name
												echo '<div class="page_name left" id="'.$tcval['pages_id'].'"> ';
												echo '<span class="glyphicons sort pg_name">---'.$tcval['pages_name'].'</span>';

												//Link to show children	
												if($fourth_children != false){
													echo '<a href="#" class="links_to_children" id="'.$tcval['pages_id'].'">תת דפים</a>';
												}
												echo '</div>';


												echo '<div class="page_date left">';
												echo '<span class="date_titles">פורסם : </span> '.$create_date.' <br />';
												echo '<span class="date_titles">עודכן : </span> '.$update_date.'';
												echo '</div>';


												//Page options	
												echo '<div class="page_edit_options left" >
														
														<span class="edit_page_options">
															<a href="pages_child_add.php?pid='.$tcval['pages_id'].'">הוסף תת דף</a> | 
															<a href="pages_edit.php?pid='.$tcval['pages_id'].'"> ערוך</a> |
															<a href="#">לצפות</a>';
															
														// Condition that show delete link if page is not have children //
														if($fourth_children){

														}
														else{

														echo '| <a  href="javascript:confirm_delete('.$tcval['pages_id'].')">מחק</a>';
														}

													echo '</span>';				


												echo '</div>';
								

												echo '<div class="clear_both"></div>';




														if($fourth_children != false){


															foreach($fourth_children as $fckey=>$fcval){

																if($fcval['pages_update_date'] == false){

																$update_date = '';

																}else{

																$update_date_from_db = $fcval['pages_update_date'];
												 				$update_date = date('y/m/d', $update_date_from_db);
												 				}

												 				$create_date_from_db = $fcval['pages_create_date'];
												 				if($create_date_from_db == 0){
												 					$create_date = '';
												 				}else{
												 				$create_date = date('y/m/d', $create_date_from_db);
												 				}

																echo '<div class="children_page_info_container" id="'.$tcval['pages_id'].'">';
																	
																//Div with icon	
																echo '<div style="padding-left:25px;" class="active_icon left">';
																	if($fcval['pages_status'] == "active"){

																       echo'  <img width="30" id="'.$fcval['pages_id'].'" status="active" src="../images/yes.png" alt="">';
																     
																     }
																     else
																     {
																       echo'<img width="30" id="'.$fcval['pages_id'].'" status="deactive" src="../images/no.png" alt="">';
																     } 																	
																echo '</div>';

																//Div with page name	
																echo '<div class="page_name left" id="'.$fcval['pages_id'].'"> ';
																echo '<span class="glyphicons sampler pg_name">----'.$fcval['pages_name'].'</span>';

																//Link to show children
																//echo '<a href="#" class="links_to_children" id="'.$fcval['pages_id'].'">Children</a>';

																echo '</div>';

																echo '<div class="page_date left">';
																echo '<span class="date_titles">פורסם : </span> '.$create_date.' <br />';
																echo '<span class="date_titles">עודכן : </span> '.$update_date.'';
																echo '</div>';

																//Page options
																echo '<div class="page_edit_options left">
																		
																		<span class="edit_page_options">

																			<a href="pages_edit.php?pid='.$fcval['pages_id'].'">ערוך</a> |
																			<a href="#">לצפות</a> |
																			<a  href="javascript:confirm_delete('.$fcval['pages_id'].')">מחק</a>
																		</span>				


																	</div>';
												

																echo '<div class="clear_both"></div>';


																//fourth children div ends
																echo '</div>';

															}


														}//End condition  fourth children != fals

    /////////////////////////////////////////////////////////////////////////////////////////

													// Third child div ends
													echo '</div>';
													
												}


											}//End condition third children != false

    /////////////////////////////////////////////////////////////////////////////////////////

										//Second child container ends
										echo '</div>';

									}
								

								}//End condition of second children != false

	/////////////////////////////////////////////////////////////////////////////////////////					

						echo '</div>';// First child container ends

					}

				}// End condition IF children != false

	//////////////////////////////////////////////////////////////////////////////////////////

				echo '</div>';//main div close

			}

?>


					

 









 


			</div><!-- Pages list content ends -->

			<!-- Pages options content -->
			<div class="inner_pages_options_content right">
			

				<!-- Div with fast editing options -->
				<div class="fast_editing_container">


					<!-- Content with fast editing options -->
					<div class="panel panel-info fast_editing_content">
						

						<div class="panel-heading fast_editing_header">
							<h5>עדכון מהיר</h5>
						</div>


						<!-- Inner fast Editing content  -->
						<div class="editing_content">


							<div class="title_container">

								<span class="editing_pages_container_title "
								>עדכון מהיר של דפים </span>
		
							</div>
						 
						 <!-- Div that show pages to edit -->
						 	<div class="fast_editing_pages rtl">
						 			
						 		<span  >בחר דף</span>&nbsp;&nbsp;&nbsp;&nbsp;

						 		<select  name="fast_editing_pages " id="editing_page">
						 		
									<option value="0"></option>

									<?php

										foreach($pages_names as $fepkey=>$feval){

											$children = get_children_pages($feval['pages_id']);//Getting pages children
											

											
											echo '<option page_child="'.$feval['pages_id'].'" page_family="'.$feval['pages_id'].'" page_parent="'.$feval['pages_parrent_id'].'" value="'.$feval['pages_id'].'">'.$feval['pages_name'].'</option>';


										if($children != false){
										
											foreach($children as $feckey=>$fecval){

												$second_children = get_children_pages($fecval['pages_id']);//Getting second children

												echo '<option page_child="'.$fecval['pages_id'].'" page_family="'.$feval['pages_id'].'" page_parent="'.$fecval['pages_parrent_id'].'" value="'.$fecval['pages_id'].'">&nbsp;&nbsp;&nbsp;'.$fecval['pages_name'].'</option>';

												if($second_children != false){
													

													foreach($second_children as $fesckey=>$fescval){

														$third_children = get_children_pages($fescval['pages_id']);//Getting third children

														echo '<option page_child="'.$fescval['pages_id'].'" page_family="'.$feval['pages_id'].'" page_parent="'.$fescval['pages_parrent_id'].'" value="'.$fescval['pages_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$fescval['pages_name'].'</option>';


															if($third_children != false){

																foreach($third_children as $fetckey=>$fetcval){

																$fourth_children = get_children_pages($fetcval['pages_id']);//Getting fourth children

																echo '<option page_child="'.$fetcval['pages_id'].'" page_family="'.$feval['pages_id'].'" page_parent="'.$fetcval['pages_parrent_id'].'" value="'.$fetcval['pages_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$fetcval['pages_name'].'</option>';

																	if($fourth_children !=false){

																		foreach($fourth_children as $fefckey=>$fefcval){

																			echo '<option page_child="'.$fefcval['pages_id'].'" page_family="'.$feval['pages_id'].'" page_parent="'.$fefcval['pages_parrent_id'].'" value="'.$fefcval['pages_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$fefcval['pages_name'].'</option>';


																		}//End foreach that show fourth children

																	}//End condition that show fourth children
		
		///////////////////////////////////////////////////////////////////////////////

																}//End foreach showing third children


															}//End condition show third children

//////////////////////////////////////////////////////////////////////////////////////													

													}//End foreach second child
													

												}//End condition that show second children

//////////////////////////////////////////////////////////////////////////////////////



											}//End foreach first child

											
										}//End condition of show first children

//////////////////////////////////////////////////////////////////////////////////////

										}//End foreach of main pages


									?>

						


						 		</select>

				

							<!-- Div with pages content -->
							<div class="fast_mp_pages_content">

								<table id="fast_edit_table">
									
									<input type="hidden" name="page_id" id="faste_page_id">

									<tr>
										<td>
											<span >שם :</span>
										</td>	
										
										<td><input class="feditp_input" type="text" name="page_name" id="faste_page_name"/></td>
									</tr>
									<tr>
										<td>
												<span>כותרת :</span>
										</td>
										<td>
												<input class="feditp_input" type="text" name="page_title" id="faste_page_title"/>
										</td>
									</tr>
									<tr>
										<td>
												<span>סדר :</span>
											</td>
										<td>
											<input class="feditp_input" type="text" name="page_order" id="faste_page_order"/>
										</td>
									</tr>
									<!-- <tr>
											<td>
												<span>הורה :</span>
											</td>
										<td>
											<input class="feditp_input" type="text" parent_id="" current_parent_id="" name="page_parent" id="faste_page_parent"/>
										</td>
									</tr> -->
									<!-- <tr>
										<td>
											<span>בחר הורה חדש :</span>
										</td>
										<td>
											<select  name="fast_editing_parrents_pages " id="choose_parrent_page">
								 		
											<option value=""></option> -->

											<?php

					// 										foreach($pages_names as $ppkey=>$ppval){

					// 											$children = get_children_pages($ppval['pages_id']);//Getting pages children

					// 											echo '<option id="'.$ppval['pages_id'].'" page_family="'.$ppval['pages_id'].'" parent_id="'.$ppval['pages_parrent_id'].'" value="'.$ppval['pages_name'].'">'.$ppval['pages_name'].'</option>';


					// 										if($children != false){

																

					// 											foreach($children as $pckey=>$pcval){
																	
					// 												$second_children = get_children_pages($pcval['pages_id']);//Getting second children

					// 												echo '<option id="'.$pcval['pages_id'].'" page_family="'.$ppval['pages_id'].'" parent_id="'.$pcval['pages_parrent_id'].'" value="'.$pcval['pages_name'].'">&nbsp;&nbsp;&nbsp;'.$pcval['pages_name'].'</option>';

					// 												if($second_children != false){
																		

					// 													foreach($second_children as $psckey=>$pscval){

					// 														$third_children = get_children_pages($pscval['pages_id']);//Getting third children

					// 														echo '<option id="'.$pscval['pages_id'].'" page_family="'.$ppval['pages_id'].'" parent_id="'.$pscval['pages_parrent_id'].'" value="'.$pscval['pages_name'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$pscval['pages_name'].'</option>';
																									

					// 															if($third_children ){

					// 																foreach($third_children as $ptckey=>$ptcval){

					// 															//	$fourth_children = get_children_pages($ptcval['pages_id']);//Getting fourth children

					// 																echo '<option id="'.$ptcval['pages_id'].'" page_family="'.$ppval['pages_id'].'" parent_id="'.$ptcval['pages_parrent_id'].'" value="'.$ptcval['pages_name'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$ptcval['pages_name'].'</option>';

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
											
								


								 		<!-- 	</select>
								 		</td>

									</tr> -->
									
							</table>

							<button  class="btn btn-xs btn-custom-fast fast_update_ptn right"    id="fe_btn"/>עדכן</button>
							<span class="fe_loader right"><img src="../images/fast_edit.gif" /></span>
<div class="clear_both"></div>							

							</div><!-- Div with pages content ends -->



<div class="clear_both"></div>
							



						 	</div><!-- Div that show pages to edit ends -->

				<div class="fe_message alert alert-warning">
					
					!!!עדכון בתהליך  </br>
					
			
				<div class="progress progress-striped active">
				  <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
				   
				  </div>
				</div>

				</div>

				

						</div><!-- Inner fast Editing content  ends -->



					</div><!-- Content with fast editing options ends -->

				</div><!-- Container with fast editing options ends -->




			</div><!-- Pages options content ends -->

<div class="clear_both"></div>

		</div><!-- Content ends -->

		<div class="clear_both"></div>
	








		</div><!-- Main content ends -->


		<!-- Footer -->
		<div class="footer">
		


		</div><!-- Footer ends -->


	</div><!-- Wrapper end -->



</body>
</html>