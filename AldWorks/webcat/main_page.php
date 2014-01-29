<?php

require_once "php/db_connect.php";//Data Base Connect
require_once "php/functions.php";//Data Base Connect
include "php/messages.php";//Session Messages
	
// echo'<pre>';
// print_r($_SERVER);
// echo'</pre>';

// $path = $_SERVER['SCRIPT_FILENAME'];
// $file = basename($path);
// echo'<pre>';
// print_r($file);
// echo'</pre>';

//echo $_SESSION['user_name'];


// if(isset($_SESSION['user_name'])){
// 	unset($_SESSION['error_pass']);
// 	unset($_SESSION['error_user']);


// }

if(isset($_SESSION['user_name'])){

$admin = $_SESSION['user_name'];
}else{
die('NO');
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>עמוד ראשי</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" media="screen"/>
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" media="screen"/>
	<link rel="stylesheet" href="css/glyphicons.css" media="screen"/>
	<link rel="stylesheet" href="css/style.css" media="screen"/>
	<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>

	<script type="text/javascript">

	$(document).ready(function(){


		when_document_ready();//loading functions

		setTimeout("$('.message').slideUp(500)",5000);

	});//End doc ready function



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
	<div class="message_container rtl">

		<?php echo $user_message;?>

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



		</div><!-- Links container ends -->


	
		<!-- Content -->
		<div class="content left">


			<!-- Content header container -->
			<div class="content_header_container ">
				
				<div class="website_content_title left">
						תוכן אתר
			
				</div>


				<!-- website modules title -->
				<div class="website_modules_title left">
					
						
						מודולי האתר

					

				</div><!-- website modules title ends -->



<div class="clear_both"></div>


			</div><!-- Content header container ends -->
			

			<!--  Inner content -->
			<div class="inner_content">

			
				<!-- Div with inf of web site contents -->
				<div class="website_content left">
					
					<table class="table table-striped table-hover">
					
					<tr>
						<td>
							<div class="titles_list glyphicons file">דפים</div>
							<div class="titles_buttons">
								
								<button type="button" class="btn btn-info btn-small btn_mp" ><a href="pages/pages_list.php">לדפים</a></button>
							
							</div>
						</td>
					</tr>
					<tr>
					<!-- 	<td>
							<div class="titles_list glyphicons globe_af">SEO</div>
							<div class="titles_buttons">
								
								<button type="button" class="btn btn-info btn-small btn_mp" ><a href="pages/pages_list.html">To SEO</a></button>
							
							</div>

						</td> -->
					</tr>
					<tr>
						<td><div class="titles_list glyphicons picture">מחסן תמונות</div>
							<div class="titles_buttons">
								
								<button type="button" class="btn btn-info btn-small btn_mp" ><a href="images_stock/images_stock_list.php">לתמונות</a></button>
							
							</div>
						</td>
					</tr>
				<!-- 	<tr>
						<td>
							<div class="titles_list">5</div>
							<div class="titles_buttons">
								
								<button type="button"class="btn btn-info btn-small btn_mp" ><a href="pages/pages_list.html">To 5</a></button>
							
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="titles_list">7</div>
							<div class="titles_buttons">
								
								<button type="button"class="btn btn-info btn-small btn_mp" ><a href="pages/pages_list.html">To 7</a></button>
							
							</div>
						</td>
					</tr> -->
					</table>


<div class="clear_both"></div>


				</div><!-- Div with inf of web site contents eds -->

				<!-- Div with info of web site modules -->
				<div class="website_modules left">

					<table class="table table-striped table-hover">
					
					<tr>
						<!-- <td>
							<div class="titles_list glyphicons notes">News</div>
							<div class="titles_buttons">
								
								<button type="button" class="btn btn-info btn-small btn_mp" ><a href="pages/pages_list.html">To News</a></button>
							
							</div>
						</td>
					</tr> -->
					<!-- <tr>
						<td>
							<div class="titles_list glyphicons book">Articles</div>
							<div class="titles_buttons">
								
								<button type="button" class="btn btn-info btn-small btn_mp" ><a href="pages/pages_list.html">To Articles</a></button>
							
							</div>
						</td>
					</tr> -->
					<tr>
						<td>
							<div class="titles_list glyphicons cars">מכוניות</div>
							<div class="titles_buttons">
								
								<button type="button" class="btn btn-info btn-small btn_mp" ><a href="moduls/cars/cars_list.php">למכוניות</a></button>
							
							</div>
						</td>
					</tr>
					<!-- <tr>
						<td>
							<div class="titles_list glyphicons road">Moto Gallery</div>
							<div class="titles_buttons">
								
								<button type="button" class="btn btn-info btn-small btn_mp" ><a href="pages/pages_list.html">To Moto</a></button>
							
							</div>
						</td>
					</tr> -->
					<!-- <tr>
						<td>
							<div class="titles_list glyphicons display">Youtube Gallery</div>
							<div class="titles_buttons">
								
								<button type="button" class="btn btn-info btn-small btn_mp" ><a href="pages/pages_list.html">To Youtube</a></button>
							
							</div>
						</td>
					</tr> -->


					</table>

<div class="clear_both;"></div>

				</div><!-- Div with info of web site modules ends -->

			</div><!--  Inner content  ends -->

		</div><!-- Content ends -->



<div class="clear_both"></div>




		</div><!-- Main content ends -->


		<!-- Footer -->
		<div class="footer">
		


		</div><!-- Footer ends -->


	</div><!-- Wrapper end -->

</body>
</html>