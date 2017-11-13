<?php

/*
Program layout - english

-	how many dots we have so far?
-	if we need more - get x and y
-	check array if we have those points already
-	if not - add to list

*/

	//init variables
	$newPlotPoint_x =0;
	$newPlotPoint_y = 0;
	$plotPoint_array = [];

	//how many dots we have so far?
	while(count($plotPoint_array)<100){
		//Get x and y points
		$newPlotPoint_x = rand(0,1000);
		$newPlotPoint_y = rand(0,1000);
		$plot_status=false;
		
		//check array
		foreach ($plotPoint_array as $plotPoint){
			//check if plot exists
			if($plotPoint[0]==$newPlotPoint_x&&$plotPoint[1]==$newPlotPoint_y){
				//if found - ignore entry
				$plot_status=true;
			}
		}
		
		//if plot points are not found - insert them into array
		if(!$plot_status){
			array_push($plotPoint_array,[$newPlotPoint_x,$newPlotPoint_y]);
			$plotPoint_array++;	
		}
	}
	print_r($plotPoint_array);

?>


