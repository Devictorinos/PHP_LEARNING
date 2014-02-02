<?php

	//landing pages pagination

	//getting count of rows

	$query = $db->prepare("SELECT `id` FROM `files` ");
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	$rows_count = $query->rowCount();

	$per_page =10;//this is number of result that displayed per page

	$last_page = ceil($rows_count/$per_page);//setting the number of last page

	if($last_page < 1){$last_page = 1;}

	$pagenum = 1;

	if(isset($_GET['pn'])) { $pagenum = preg_replace('#[^0-9]#i', '' , $_GET['pn']); }

	if($pagenum < 1 )$pagenum = 1;
	else if($pagenum > $last_page)$pagenum = $last_page;

	$limit = " LIMIT ".($pagenum - 1) * $per_page.",".$per_page;//setting limit

	//getting output list from db
	$query2 = $db->prepare(" SELECT `id`, `image`

							FROM `files`
							ORDER BY `id` DESC
							$limit");

	$query2->execute();

	$count_pages = '<span style="font-size:14px;" class="label label-default">Pages '.$rows_count.'</span> ';
	$paging = " Page $pagenum of $last_page";

	$paginationControls = '';

	if($last_page != 1){

		if($pagenum > 1){

			$previous = $pagenum - 1;

			$paginationControls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">prev</a>&nbsp; &nbsp;</li>';

			for($i = $pagenum - 2; $i < $pagenum; $i++)
			{			
				if($i > 0){$paginationControls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a>&nbsp;&nbsp;</li>';}			
			}

		}
		
		$paginationControls .= '<li><a style="background:#428BCA;color:#ffffff;" href="javascript:void(0);">'.$pagenum.'</a>&nbsp;&nbsp;</li>';

		for($i = $pagenum + 1; $i < $last_page; $i++)
		{
			$paginationControls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a>&nbsp;&nbsp;</li>';

			if($i >= $pagenum +2) break;
		}

		if($pagenum != $last_page){

			$next = $pagenum + 1;

		$paginationControls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">next</a>&nbsp; &nbsp;</li>';

		}

	}



	$Outputlist = "";//setting putput list variable
	while($row = $query2->fetch(PDO::FETCH_ASSOC)){

	//var_dump($row);	

	$id = $row['id'];
	$name = $row['image'];
	
	$thumbs = explode("/",$name);


	//var_dump($thumbs);

	$thumbsPath = $thumbs[3]."/".$thumbs[4]."/".$thumbs[5];

	$Outputlist .= '<tr class="">

                  <td>
                         
                     
                      <a type="button" class="btn btn-xs btn-default" href="images_del.php?pid='.$id.'&pn='.$pagenum.'&folder='.$name.'" onclick=" return checkConfirm();"><span class="glyphicon glyphicon-trash"></span></a>
                 </td>

                 

                  <td class="name-block">
                    <p id="page_'.$id.'" data-container="body"   class="text-primary">
                      <img width="60" src="../../'.$thumbsPath.'" alt="" />
                    </p>
                  </td>

                  <td>
                    
                  </td>
                  <td>

                     

                  </td>
                   <td>

                   

                  </td></tr>';
		}









?>