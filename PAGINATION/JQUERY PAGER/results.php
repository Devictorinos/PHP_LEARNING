<?php

$host = 'localhost';
$name = 'root';
$pass= '';

$data = 'pagernat';


try{

	$db = new PDO("mysql:host=localhost;dbname=pagernat", $name ,$pass);

}catch(PDOException $e){

echo $e->getMessage();

}

	

$query = "SELECT * FROM `pages` WHERE `pages_id` > :val  ";	

$stmt = $db->prepare($query);

$stmt->bindValue(':val', $_POST['searchnumber']);

$row = $stmt->execute();
//var_dump($row);
//die($query);
echo '<div id="upper"></div>';
echo "<table border='1'>";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

	echo '<tr class="row"><td>';
	echo $row['pages_name'];
	echo '</td></tr>';
}

echo "</table>";

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

	<script type="text/javascript">

	$(document).ready(function(){

		//declaring variables
		var page = 1;
		var perpage = 3;
		var items = $('.row').length;
		var pagelast = Math.ceil(items/perpage);

		//Set page

		function setpage(page){

			$('.row').slice(0,page * perpage).hide();
			$('.row').slice(page * perpage - perpage, page * perpage).show();
			$('.row').slice(page * perpage).hide();
			$('.pagedispaly').html('page ' + page);


			if(page == pagelast){

				$('.showing').html('Displayng' + ((page * perpage) - (perpage - 1)) + ' - ' + items);
			}else{

			$('.showing').html('Displayng' + ((page * perpage) - (perpage - 1)) + ' - ' + (page * perpage));


			}
			

		}

		

		//next button
		$('.next').click(function(){
			if(page < pagelast){
				$('.links.link_'+page).attr('href' , '#');
			page ++;
			$('.links.link_'+page).removeAttr('href' , '#');
			setpage(page);
		}
		
		})


		$('.prev').click(function(){

			if(page > 1){
				$('.links.link_'+page).attr('href' , '#');
				page--;
				$('.links.link_'+page).removeAttr('href' , '#');
			setpage(page);
			}
			
		})


		//generate page links
		for(x = 1; x<=pagelast;x++){

			if(x==1){

				$('.pages').append(' <a class="links link_ '+ x + '">' + x +'</a> ');

			}else{

				$('.pages').append(' <a href="#" class=" links link_'+ x +'">'+ x +'<a/> ');
			} 

		}


		//links functions
		$('.links').click(function(){

			$('.links.link_' + page).attr('href','#');

			page = $(this).html();

			$('.links.link_' + page).removeAttr('href','#');

			setpage(page);

		})

		//display total items
		if(items == null){
			items = zero
		}
		$('.total').html(items + 'total');

		$('#buttonwrap').clone(true, true).appendTo('#upper');

		setpage(1);

		
	})
    
	</script>

</head>
<body>
	

	<div id="buttonwrap">
	<div class="pagedispaly"><br/></div>
	<div class="showing"><br/></div>
	<div class="total"><br/></div>
	<span class="pages"></span>
	
		<br/>
	<button type="button" class="prev">previous</button>
	<button type="button" class="next">next</button>
</div>


</body>
</html>