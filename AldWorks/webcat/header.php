	<!-- Header -->
		<div id="header">
			
			<!-- Logo Container -->
			<div class="logo_container left">
				

				<!-- Logo  -->
				<div class="logo ">
					
				<?php

					$path = $_SERVER['SCRIPT_FILENAME'];
					$file = basename($path);
						// echo'<pre>';
						// print_r($file);
						// echo'</pre>';
						
					$img ='';	
					if($file == 'images_stock_list.php' || $file == 'pages_list.php' || $file == 'pages_edit.php'){

							
						$img = '../';

					}else if($file == 'main_page.php' || $file == 'custum_header.php'){

						$img = '';
						
					}else if($file == 'cars_list.php'){

						$img = '../../';
							
						}

						echo '<img src="'.$img.'img/logo.png" />';
							
						?>



				<!-- <img src="img/logo.png" /> -->


				</div><!-- Logo  ends -->


			</div><!-- Logo Container ends -->


			<!-- Log status container -->
			<div class="log_status_container right rtl">
				
				<div class="log_status">
					
					<div class="inner_log_status">
							
							<div style="width:250px;padding-right:10px;" class="log_admin">שלום 
								<span style="font-size:16px;text-decoration:underline;color:#ffffff;padding-right:15px;">


									<?php 

								

										echo $admin;



									 ?>


							</span>
							</div>
								<br /	>
							<div>
								
								<?php


									$path = $_SERVER['SCRIPT_FILENAME'];
									$files = basename($path);
									$links ='';

									if($files == 'images_stock_list.php' || $files == 'pages_list.php' || $files == 'pages_edit.php'){

											
											$links = '../index.php';

										}else if($files == 'main_page.php' || $files == 'custum_header.php'){

											$links = 'index.php';
											
										}else if($files == 'cars_list.php'){

											$links = '../../index.php';
											
										}

										echo '<button  class=" exit_btn btn btn-default "><a href="'.$links.'?logout">יציאה</a></button>';

								?>


							</div>

					</div>
				</div>


			</div><!-- Log status container ends -->



<div class="clear_both"></div>


		</div><!-- Header end-->