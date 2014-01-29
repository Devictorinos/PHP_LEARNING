<?php

require_once "../../php/db_connect.php";//Data Base Connect
require_once "../../php/functions.php";//Functions
include "../../php/messages.php";//Session Messages

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

$cars_statistic = get_car_statistic(); //Getting cars statistic


include "../../php/cars_pagination.php";//cars list pagination

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>רשימת מכוניות</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css" media="screen"/>
	<link rel="stylesheet" href="../../css/bootstrap-theme.min.css" media="screen"/>
	<link rel="stylesheet" href="../../css/glyphicons.css" media="screen"/>
	<link rel="stylesheet" href="../../css/style.css" media="screen"/>

	<script type="text/javascript" src="../../js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="../../js/modernizr.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="../../js/functions.js"></script>


<script type="text/javascript">

$(document).ready(function(){

	when_document_ready();//loading all functions


	<?php

		//error update header message
		if(isset($_SESSION['new_car'])){

			echo '$(".edit_car_btn[car='.$_SESSION['new_car'].']").trigger("click")';

			unset($_SESSION['new_car']);

		}

	?>


	setTimeout("$('.message').slideUp(500)",3000);




});//End doc ready function



	function confirm_delete(car_id){

		var answer = confirm('למחוק את המכונית סופית???');
		if(answer){

			location.href="cars_del.php?pid="+ car_id;
		}else{
			
		}		

	}

</script>

</head>
<body>

	<!-- Wrapper -->
	<div id="wrapper">

		
	<?php

		include '../../header.php';
	?>

<!-- *************************************************************** -->

	


	<!-- Message container -->
	<div class="message_container">

			<?php

				echo $add_car_message;
				echo $error_add_car_message;
				echo $del_car_message;
				echo $error_del_car_message;
				echo $update_car_message;
				echo $error_update_car_message;
				
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

					include '../../options.php';

				?>



			</div><!-- Links  ends -->
	
				 <?php

				 	include '../../cms_nav.php';

				 ?>

		</div><!-- Links container ends -->


		<!-- Cars container -->
		<div class=" cars_container left">
			<!-- Cars header -->
			<div class="cars_header">

				<button style="margin:10px  0 0 15px;" type="button" class="btn btn-primary btn-xs left " id="add_car">הוסף אוטו</button>
					רשימת מכוניות

			</div><!-- end Cars header -->

			<!-- Cars content  -->
			<div class="cars_content">
				



				<!-- Cars inner content -->
				<div class=" cars_inner_content left">

					<!-- Pagination of Cars -->
					<div class=" cars_pagination_container">


						<div class="cars_pagination  left">
							
								<ul class="pagination">
							<!-- 	  <li class="disabled"><a href="#">&laquo;</a></li>
								  <li class="active" ><a href="#">1</a></li>
								  <li><a href="#">2</a></li>
								  <li><a href="#">3</a></li>
								  <li><a href="#">4</a></li>
								  <li><a href="#">5</a></li>
								  <li><a href="#">&raquo;</a></li> -->
								  <?php echo $pagination_display; ?>
								</ul>

								

						</div>


						<div class="car_search right">
							<form action="#" method="POST">
						<!-- 	<input type="text" class="car_search form-control"   placeholder="Search Car" />
							<button id="car_search_btn" type="button" class="btn btn-default  ">חפש</button>
 -->
							<input id="pages_search" type="text" class="car_page_search form-control"   placeholder="חפש עמוד" />
							<button id="car_search_page_btn" type="button" class="btn btn-default  ">חפש</button>
							</form>
						</div>

<div class="clear_both"></div>


					</div><!-- Pagination of Cars ends -->



				

		
			<table class="table table-striped thumbnail_car table-hover">

				<?php echo $no_cars;?>
				<?php print $output_list ;?>	
				
			</table>

				


			<div id="edit_car">
					<button style="position:absolute;right:5px;top:5px;" class=" close_edit_car btn btn-danger btn-xs">x</button>
					<form action="cars_update.php" method="POST" name="image_stock_edit_form">
						<input type="hidden" name="car_id" id="car_id" value="">
					<br/>
					<table id="img_stock_edit_table" class="rtl">
						
						<tr>
							<td>שם :</td>
							<td>
								<input id="car_name" class="edit_car_fields" type="text" name="car_name" placeholder="שם הרכב" />
							</td>
						</tr>
						<tr>
							<td>דגם :</td>
							<td>
								<input id="car_model" class="edit_car_fields" type="text" name="car_model" placeholder="דגם רכב" />
							</td>
						</tr>
						<tr>
							<td>שנה :</td>
							<td>
								<input id="car_year" class="edit_car_fields" type="text" name="car_year" placeholder="שנה" />
							</td>
						</tr>
						<tr>
							<td>יד :</td>
							<td>
								<input id="car_hand" type="text" class="edit_car_fields" name="car_hand" placeholder="יד" value="">
				
						    </td>
						</tr>
						<tr>
							<td>נפח מנוע :</td>
							<td>
								<input id="car_engine" type="text" class="edit_car_fields" name="car_engine" placeholder="נפח מנוע" value="" />
							
							</td>
						</tr>
						<tr>
							<td>גיר :</td>
							<td>
								<input id="car_transmission" type="text" class="edit_car_fields" name="car_transmission" placeholder="גיר" value="" />
							
							</td>
						</tr>
						<tr>
							<td>קילומטראז :</td>
							<td>
								<input id="car_kilometers" type="text" class="edit_car_fields" name="car_kilometers" placeholder="קילומטראז" value="" />
							
							</td>
						</tr>
						
						<tr>
							<td><br ><input class="btn btn-success btn-xs" type="submit" value="עדכן"></input>
							
						</tr>



					</table>




					</form>
				

				</div>


				</div><!-- Cars inner content ends -->

				<!-- Cars statistic -->
				<div class="images_stock_statistic left">

					<div class="img_stock_statistic_header">
							
							סטטיסטיקה

					</div>

					<div class="cars_statistic_content">
						
						<div class="cars_counts">
								<span class="img_stock_count rtl">
									
									מכוניות : <span class="badge"><?php echo $cars_statistic['cars']?></span>

								</span>

							
						</div>
					</div>


				</div><!-- Cars statistic ends -->
				
			
<div class="clear_both"></div>


			</div><!-- Cars content ends -->

		</div><!-- Cars container ends -->
	
	<div class="clear_both"></div>	

		</div><!-- Main content ends -->


		<!-- Footer -->
		<div class="footer">
		


		</div><!-- Footer ends -->


	</div><!-- Wrapper end -->



</body>
</html>