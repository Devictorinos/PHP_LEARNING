


<ul id="main_options" class="list-group links_top_list">
<!-- 	  <li class="list-group-item admin" >
		  <a href="#">Admin</a>
	  </li>
	  <li class="list-group-item users">
	  	  <a href="#">Users</a>
	  </li>
	  <li class="list-group-item settings">
	 	  <a href="#">Settings</a>
	  </li> -->
	  <li id="appearance" class="list-group-item appearance">	
	  	  <a  href="#">מראה החצוני</a>
		
				<ul id="appearance_list" class="list-group links_top_list appearance_list">



					<li class="list-group-item appearance_arrow">

						<?php

						$path = $_SERVER['SCRIPT_FILENAME'];
						$file = basename($path);
						// echo'<pre>';
						// print_r($file);
						// echo'</pre>';
						$link = '';
						
						if($file == 'images_stock_list.php' || $file == 'pages_list.php' || $file == 'pages_edit.php'){

							
							$link = '../custum_header.php';

						}else if($file == 'main_page.php' || $file == 'custum_header.php'){

							$link = 'custum_header.php';
							
						}else if($file == 'cars_list.php'){

							$link = '../../custum_header.php';
							
						}

						echo '<a href="'.$link.'">ראש הדף</a>';
							
						?>



						
					</li>
					

				</ul>

      </li>
</ul>