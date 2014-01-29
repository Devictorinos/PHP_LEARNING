<?php

require_once "php/db_connect.php";//Data Base Connect
require_once "php/functions.php";//Functions
include "php/messages.php";//Session Messages


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
$header = get_header_data();//getting header data

//var_dump($header);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>עדכון ראש הדף</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" media="screen"/>
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" media="screen"/>
	<link rel="stylesheet" href="css/glyphicons.css" media="screen"/>
	<link rel="stylesheet" href="css/style.css" media="screen"/>
	<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<script type="text/javascript">



	$(document).ready(function(){

		when_document_ready();//load page functions

		setTimeout("$('.message').slideUp(500)",3000);

	});//End doc ready function


	function confirm_delete(page_id){

		var answer = confirm('are you sure???');
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

		include 'header.php';
	?>

<!-- *************************************************************** -->

	


	<!-- Message container -->
	<div class="message_container">
		<?php

			echo $update_heaqder_message;
			echo $error_update_heaqder_message;
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

					include 'options.php';

				?>



			</div><!-- Links  ends -->

			<?php

				include 'cms_nav.php';

			?>

		</div><!-- Links container ends -->


	
		<!-- Content -->
		<div class="content left">
					<!-- Content header container -->
			<div class="content_header_container ">
				
				
				<div class="custum_header_title left rtl">
					
						שינוי של ראש הדף	

				</div>



<div class="clear_both"></div>


			</div><!-- Content header container ends -->
			

			<!-- Pages list content -->
			<div class="inner_custum_header_content left rtl">


				<form method="POST" action="header_update.php" name="custum_header">
					
				<table id="custum_header_tbl">
					
					<tr>
						<td>
							<lable>שינוי מספר טלפון : </lable>
						</td>
						<td>
							<input class="custum_header_input" type="text" name="phone" value="<?php echo $header['appearance_header_phone'];?>">
						</td>
					</tr>
					<tr>
						<td>
							<lable>שינוי מספר הפקס : </lable>
						</td>
						<td>
							<input class="custum_header_input" type="text" name="fax" value="<?php echo $header['appearance_header_fax'];?>">
						</td>
					</tr>
					<tr>
						<td>
							<lable>שינוי של כתובת : </lable>
						</td>
						<td>
							<input class="custum_header_input" type="text" name="address" value="<?php echo $header['appearance_header_address'];?>">
						</td>
					</tr>
					<tr>
						
						<td>
							<input class="btn btn-primary" type="submit" value="Update">
						</td>
					</tr>



				</table>




				</form>


			

			</div><!-- Pages list content ends -->


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