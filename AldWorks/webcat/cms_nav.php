							<!-- CMS navigation -->
			<div class="cms_nav rtl">
				<div class="links_header cms_nav_header">
				
				CMS נווט
				</div>
				
				<ul id="nav_ul" class="list-group links_top_list">

				<?php

						$path = $_SERVER['SCRIPT_FILENAME'];
						$file = basename($path);
						// echo'<pre>';
						// print_r($file);
						// echo'</pre>';
						$link = '';
						
						if($file == 'pages_list.php'){

							$link =  '
										  <li class="list-group-item" >
											<a href="../main_page.php">לעמוד ראשי</a>
									      </li>
									      <li class="list-group-item">
					                        <a href="../images_stock/images_stock_list.php">לתמונות</a>
				                    	  </li>
				                    	  <li class="list-group-item ">
				                        	<a href="../moduls/cars/cars_list.php">למחוניות</a>
					                      </li>
				                      ';

						}else if($file == 'pages_edit.php'){

								$link ='
										  <li class="list-group-item" >
											<a href="../main_page.php">לעמוד ראשי</a>
										  </li>
										  <li class="list-group-item ">
										   <a href="pages_list.php">לרשימת דפים</a>
										  </li>
										  <li class="list-group-item">
										    <a href="../images_stock/images_stock_list.php">לתמונות</a>
										  </li>
										  <li class="list-group-item ">
										   <a href="../moduls/cars/cars_list.php">למחוניות</a>
										  </li>
						                ';


						}else if($file == 'main_page.php'){

							$link = '';
							
						}else if($file == 'cars_list.php'){

							$link = '
										  <li class="list-group-item" >
											<a href="../../main_page.php">לדף ראשי</a>
										  </li>
										  <li class="list-group-item">
										    <a href="../../pages/pages_list.php">לדפים</a>
										  </li>
										  <li class="list-group-item ">
										   <a href="../../images_stock/images_stock_list.php">לתמונות</a>
										  </li>
				                    ';
							
						}else if($file == 'images_stock_list.php'){

							$link = '
										  <li class="list-group-item" >
											<a href="../main_page.php">לדף ראשי</a>
										  </li>
										  <li class="list-group-item">
										    <a href="../pages/pages_list.php">לרשימת דפים</a>
										  </li>
										  <li class="list-group-item ">
										   <a href="../moduls/cars/cars_list.php">למכוניות</a>
										  </li>
				                    ';
						}else if($file == 'custum_header.php'){

							$link = '  <li class="list-group-item" >
										 <a href="main_page.php">לעמוד ראשי</a>
									   </li>
									   <li class="list-group-item">
										    <a href="pages/pages_list.php">לרשימת דפים</a>
									   </li>
									   <li class="list-group-item">
									     <a href="images_stock/images_stock_list.php">לתמונות</a>
									   </li>
									   <li class="list-group-item ">
									     <a href="moduls/cars/cars_list.php">למכוניות</a>
									   </li>';	


						}

						echo $link;
							
						?>



				<!-- <ul id="nav_ul" class="list-group links_top_list">
				  <li class="list-group-item" >
					<a href="../main_page.php">לעמוד ראשי</a>
				  </li>
				  <li class="list-group-item">
				    <a href="../images_stock/images_stock_list.php">לתמונות</a>
				  </li>
				  <li class="list-group-item ">
				   <a href="../moduls/cars/cars_list.php">למחוניות</a>
				  </li>
				</ul> -->

		</ul>

			</div><!-- end of CMS navigation -->