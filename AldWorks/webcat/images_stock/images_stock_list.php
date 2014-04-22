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


include "../php/images_pagination.php";//images list pagination

// Call of functions
$pages_names = get_pages_names();//Getting pages

$images_list = get_images_list();//Getting images list

$count_imgs = get_img_statistic(); // Getting images statistc

$imgs_catigorys = get_imgs_catigorys();// Getting images catigorys

$catigorys_names = get_catigorys_names();//Getting catigorys names

$cars_names = get_cars_names();// Getting cars names 

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>רשימת תמונות</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css" media="screen"/>
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css" media="screen"/>
	<link rel="stylesheet" href="../css/glyphicons.css" media="screen"/>
	<link rel="stylesheet" href="../css/style.css" media="screen"/>

	<script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="../js/modernizr.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="../js/functions.js"></script>




	<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>

<script type="text/javascript">



	$(document).ready(function(){

		when_document_ready();//loading all functions

	setTimeout("$('.message').slideUp(500)",3000);


	$('#add_file').on('click' , function(){

		$('.upl_cont').css({"display":"block"})

	})

	});//End doc ready function


//Function to accept delet images
	function img_del(image_id,image_src,page_id){

	answer = confirm('למחוק תמונה סופית ??? כל המידע הקשורה לתמונה תמחק ');
	if(answer){
		location.href = 'images_delete.php?img_id=' + image_id + '&file=' + image_src +'&pid=' + page_id;	
	}
	else{
		
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

				echo $update_image_message;
				echo $error_update_image_message;
				echo $error_del_image_message;
				echo $del_image_message;
				
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


		<!-- Images stock container -->
		<div class="images_stock_container left">
			<!-- Image stock header -->
			<div class="images_stock_header">
				
			<button id="refresh_btn" style="margin:8px 0 0 5px;" class="btn btn-primary btn-xs left">לראות תוצאות</button>		מחסן תמונות

			</div><!-- Image stock header -->

			<!-- Images stock content  -->
			<div class="images_stock_content">
				
				<!-- Upload images div -->
				<div class="multiple_img_upload">
					






		<div class="container ">
   
				    <!-- The file upload form used as target for the file upload widget -->
				    <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
				        <!-- Redirect browsers with JavaScript disabled to the origin page -->
				        <noscript><input type="hidden" name="redirect" value="http://blueimp.github.io/jQuery-File-Upload/"></noscript>
				        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
				        <div class="row fileupload-buttonbar upload_buttons">
				            <div class="col-lg-7">
				                <!-- The fileinput-button span is used to style the file input field as button -->
				                <span class="btn btn-success fileinput-button">
				                    <i class="glyphicon glyphicon-plus"></i>
				                    <span>הוסף תמונה...</span>
				                    <input id="add_file" type="file" name="files[]" multiple>
				                </span>
				                <button type="submit" class="btn btn-primary start">
				                    <i class="glyphicon glyphicon-upload"></i>
				                    <span>התחל העלאה</span>
				                </button>
				                <button type="reset" class="btn btn-warning cancel">
				                    <i class="glyphicon glyphicon-ban-circle"></i>
				                    <span>בטל העלאה</span>
				                </button>
				                <button type="button" class="btn btn-danger delete">
				                    <i class="glyphicon glyphicon-trash"></i>
				                    <span>מחיקה</span>
				                </button>
				                <input type="checkbox" class="toggle">
				                <!-- The loading indicator is shown during file processing -->
				                <span class="fileupload-loading"></span>
				            </div>
				            <!-- The global progress information -->
				            <div class="col-lg-5 fileupload-progress fade">
				                <!-- The global progress bar -->
				                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
				                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>

				                </div>
				                <!-- The extended global progress information -->
				                <div class="progress-extended">&nbsp;</div>
				            </div>
				        </div>

					 <div class="uploader_container upl_cont">   

				        <!-- The table listing the files available for upload/download -->
				        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
				   

					 </div>   
				    </form>

				    <br>
   
		</div>
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            {% if (file.error) { %}
                <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <p class="size">{%=o.formatFileSize(file.size)%}</p>
            {% if (!o.files.error) { %}
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            {% } %}
        </td>
        <td>
            {% if (!o.files.error && !i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
            </p>
            {% if (file.error) { %}
                <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                <i class="glyphicon glyphicon-trash"></i>
                <span>Delete</span>
            </button>
            <input type="checkbox" name="delete" value="1" class="toggle">
        </td>
    </tr>
{% } %}
</script>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="http://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
<!-- blueimp Gallery script -->
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->






				</div><!-- Upload images div ends -->


				<!-- Images stock inner content -->
				<div class="images_stock_inner_content left">

					<!-- Pagination of images stock -->
					<div class="img_stock_pagination_container ">


						<div class="img_stock__pagination  left">
							
								<ul class="pagination ">
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


						<div class="img_stock__search right">
							<form action="#" method="POST">
							<!-- <input type="text" class="img_stock_search form-control"   placeholder="Search Image" />
							<button id="img_stock_search_btn" type="button" class="btn btn-default  ">חפש</button> -->

							<input id="pages_search" type="text" class="img_stock_page_search form-control right"   placeholder="חפש עמוד" />
							<button id="img_stock_search_page_btn" type="button" class="btn btn-default right ">חפש</button>
							</form>
						</div>

<div class="clear_both"></div>


					</div><!-- Pagination of images stock ends -->



				

		
			<table class="table table-striped thumbnail_img table-hover  ">

				<?php echo $no_pics;?>
				<?php print $output_list ;?>	
				
			</table>

				<div id="edit_stock_img">
					<button style="position:absolute;right:5px;top:5px;" class=" close_edit_img btn btn-danger btn-xs">x</button>
					<form action="images_update.php" method="POST" name="image_stock_edit_form">
						<input type="hidden" name="stock_img_id" id="stock_img_id" value="">
					<table id="img_stock_edit_table" class="rtl">
						
						<tr>
							<td>שם :</td>
							<td>
								<input id="img_name_field" class="edit_img_fields" type="text" name="image_name" placeholder="שם תמונה" />
							</td>
						</tr>
						<tr>
							<td>כותרת :</td>
							<td>
								<input id="img_title_field" class="edit_img_fields" type="text" name="image_title" placeholder="כותרת תמונה" />
							</td>
						</tr>
						<tr>
							<td valign="top">תאור :</td>
							<td>
								<textarea id="img_descr_field" class="edit_img_te"  name="image_desc" placeholder="תאור תמונה" ></textarea>
							</td>
						</tr>
						<tr>
							<td>קטגוריה :</td>
							<td>
								<input id="catigory_id" type="hidden" name="image_catigory_id" value="">
								<select name="image_catigory" id="image_catigory">
									<option value="" id="0"></option>
									<?php

									foreach($catigorys_names as $cakey=>$caval){

										echo '<option catigory_id="" id="'.$caval['images_catigorys_id'].'" value="'.$caval['images_catigorys_name'].'">'.$caval['images_catigorys_name'].'</option>';

									}


									?>

							    </select>
						    </td>
						</tr>
						<tr>
							<td>תמונה של אוטו :</td>
							<td>
								<input id="car_id" type="hidden" name="image_car_id" value="" />
								<select name="image_car" id="image_car">
									<option value="" id="0"></option>
									<?php

										foreach($cars_names as $carkey=>$carval){

											echo '<option id="'.$carval['cars_id'].'" value="'.$carval['cars_name'].'">'.$carval['cars_name'].''.$carval['cars_model'].'</option>';
										}

									?>
							    </select>
							</td>
						</tr>
						<tr>
							<td valign="top">סוג תמונה :</td>
							<td>
								<input id="slider_checkbox" type="checkbox" name="images_slider" value="">&nbsp;&nbsp;תמונת סליידר<br>
								<input id="cover_checkbox" type="checkbox" name="images_cover" value="">&nbsp;&nbsp;תמונת כסוי
							</td>
						</tr>
						<tr>
							<td><br ><input class="btn btn-success btn-xs" type="submit" value="עדכן"></input>
							
						</tr>



					</table>




					</form>
				

				</div>


				</div><!-- Images stock inner content ends -->

				<!-- Images stock statistic -->
				<div class="images_stock_statistic left">

					<div class="img_stock_statistic_header">
							
							סטטיסטיקה

					</div>

					<div class="img_stock_statistic_content">
						
						<div class="img_stock_counts">
								<span class="img_stock_count">
									
									תמונות : <span class="badge"><?php echo $count_imgs['imgs_count'] ?></span>

								</span>

								<span class="img_stock_catigorys">

									קטגוריות : <span class="badge"><?php echo $count_imgs['catigorys_count'] ?></span>
									
								</span>
						</div>
						<br />
						<br />

<!-- 						<div class="choose_img_catigory list-group">
 -->
<!-- 							<h4 id="choose_cat_title" class="label label-primary">בחר קטגוריה</h4>
 -->
							<?php
/*
								foreach($imgs_catigorys as $ctkey=>$ctval){

									$images_count = get_imgs_of_each_catigorys($ctval['images_catigorys_id']);

									
									echo '<a class="catigory_link list-group-item" href="#">'.$ctval['images_catigorys_name'].'<span class="badge">'.$images_count['images'].'</span></a>';

								}*/


							?>
				
						<!-- <a class="catigory_link list-group-item" href="#">Catigory 1 <span class="badge">14</span></a>
						<a class="catigory_link list-group-item active" href="#">Catigory 2 <span class="badge">14</span></a>
						<a class="catigory_link list-group-item" href="#">Catigory 3 <span class="badge">14</span></a>
						<a class="catigory_link list-group-item" href="#">Catigory 4 <span class="badge">14</span></a>
						<a class="catigory_link list-group-item" href="#">Catigory 5 <span class="badge">14</span></a>
						<a class="catigory_link list-group-item" href="#">All Stock <span class="badge">256</span></a> -->
						

<!-- 						</div>
 -->						


					</div>


				</div><!-- Images stock statistic ends -->
				
			
<div class="clear_both"></div>


			</div><!-- Images stock content ends -->

		</div><!-- Images stock container ends -->
	
	<div class="clear_both"></div>	

		</div><!-- Main content ends -->


		<!-- Footer -->
		<div class="footer">
		


		</div><!-- Footer ends -->


	</div><!-- Wrapper end -->



</body>
</html>