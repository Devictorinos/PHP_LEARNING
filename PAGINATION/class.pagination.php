<?php

		
	class Pagination
	{
		public $data;

		public function Paginate($values,$per_page){

			$totla_values = count($values);

			if(isset($_GET['page'])){
				$current_page = $_GET['page'];
			}else{
				$current_page = 1;
			}

			$counts = ceil($totla_values / $per_page);

			$param1 = ($current_page-1) * $per_page;


			$this->data = array_slice($values,$param1,$per_page);

			for($x=1;$x<=$counts;$x++)
			{
				$numbers[] = $x;
			}

			return $numbers;

		}

		public function fetchResult(){
		
			$resultValues = $this->data;
			return $resultValues;
		}

	}

	$pag = new Pagination();
	$data = array("hey","hellow","hi","what");
	$numbers = $pag->Paginate($data,1);

	$result = $pag->fetchResult();

	echo '<a href="?page='.($_GET['page']-1).'">prev</a>';

	foreach ($numbers as $num ) {
		echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$num.'">'.$num.'</a>';
	}
echo '<a href="?page='.($_GET['page']+1).'">next</a>';
	foreach ($result as $rkey => $rval) {
		echo '<div>'.$rval.'</div>';
	}

?>